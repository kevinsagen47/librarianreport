<?php
/*require_once 'acad_conn.php';
require_once 'paoz_conn.php';

use nsysu\variables\acad\acad;
use nsysu\variables\paoz\paoz;*/

require_once 'dbs_conn.php';
use nsysu\database\dbs_conn;

/**
 * 設定 sso 的認證資料
 * @param array $rc_sso
 * @param string $passwd
 * @param string $role
 */
function config_session($rc_sso = array(), $passwd, $role) {
    /**
     * start session
     */
    if (!isset($_SESSION)) {
        session_name('ETD_QA');
        session_set_cookie_params("3600");  //  1 hour
        session_start();
    }

    if (isset($rc_sso[0])) {
        $_SESSION['login']['status']    = 'ok';
        (isset($rc_sso[0])) ? $_SESSION['login']['account'] = $rc_sso[0] : $_SESSION['login']['account'] = null;        // 學號 , 員工編號
        (isset($rc_sso[14])) ? $_SESSION['login']['deg_cod'] = $rc_sso[14] : $_SESSION['login']['deg_cod'] = null;      // 學位
        (isset($role)) ?  $_SESSION['login']['role'] = $role : $_SESSION['login']['role'] = 'none';                     // 角色
        // (isset($passwd)) ?  $_SESSION['login']['passwd'] = $passwd : $_SESSION['login']['passwd'] = null;            // 密碼



        $_SESSION['login']['name']      = $rc_sso[1];   // 姓名
        $_SESSION['login']['idno']      = $rc_sso[2];   // 身分證號
        $_SESSION['login']['pkind']     = $rc_sso[3];   // 屬性 , 99 => 學生
        // $_SESSION['login']['grpno']     = $rc_sso[4];   // 群組代號
        $_SESSION['login']['unicod1']   = $rc_sso[5];   // 一級單位代號
        $_SESSION['login']['dpt_desc1'] = $rc_sso[6];   // 一級單位名稱
        // $_SESSION['login']['unicod2']   = $rc_sso[7];   // 二級單位代號
        // $_SESSION['login']['dpt_desc2'] = $rc_sso[8];   // 二級單位名稱
        $_SESSION['login']['leave']     = $rc_sso[9];   // 是否離職
        $_SESSION['login']['titcod']    = $rc_sso[10];  // 職稱編號
        $_SESSION['login']['title']     = $rc_sso[11];  // 職稱名稱
        $_SESSION['login']['email']     = $rc_sso[12];  // 電子信箱
        // $_SESSION['login']['poftel']    = $rc_sso[13];  // 辨公室電話
    }
}


/**
 * 檢查是否登入系統
 * (1) 如果已經登入系統 , 且存在 SESSION 資訊 , 直接跳轉到系統的頁面。
 * (2) 如果尚未登入系統 , 直接跳轉到登入的頁面。
 * @param array $url
 */
function check_session($url = array('chk' => 'login', 'org' => '#', 'dest' => '#')) {
    /**
     * start session
     */
    if (!isset($_SESSION)) {
        session_name('ETD_QA');
        session_set_cookie_params("3600");  //  1 hour
        session_start();
    }

    /**
     * 檢查是否 sso 認證
     */
    /*$redirect = '#';
    if (isset($_SESSION['login']['status'])) {
        ($_SESSION['login']['status'] === 'ok') ? $redirect = $url['dest'] : $redirect = $url['org'];
    }  else {
        $redirect = $url['org'];
    }*/

    /**
     * 轉址
     */
    switch ($url['chk']) {
        case 'login':
        {
            if (isset($_SESSION['login']['status'])) {
                if ($_SESSION['login']['status'] === 'ok') {
                    header('Location:' . $url['dest']);
                }
            }
        }  break;
        case 'admin':
        case 'logout':
        {
            if (isset($_SESSION['login']['status'])) {
                if ($_SESSION['login']['status'] === 'ok') {

                }  else {
                    header('Location:' . $url['dest']);
                }
            }  else {
                header('Location:' . $url['dest']);
            }
        }  break;
    }
}

/**
 * 登出後清除所有 SESSION 資訊
 */
function clear_session() {
    /**
     * start session
     */
    if (!isset($_SESSION)) {
        session_name('ETD_QA');
        session_set_cookie_params("3600");  //  1 hour
        session_start();
    }

    unset($_SESSION['login']);

    setcookie(session_id(), "", time() - 3600);
    session_destroy();
    session_write_close();
}

/**
 * pop error message
 */
function error_message() {
    echo '<script>$.fancybox.open(\'<div class="message"><h1 class="text-info" >Error Message</h1><h3 class="text-danger" >Can not login<h3></div>\');</script>';
}

/**
 * 檢查登入腳色
 * @param $role
 * @param $login
 */
function identify_role($role, &$login) {
    /*$acad = array(
        'username' => 'acad',
        'password' => 'aszx3211',
        'db' => 'oci:dbname=(description=(address=(protocol=tcp)(host=140.117.13.225)(port=1521))(connect_data=(service_name=dgsvr5)));charset=utf8'
    );

    $paoz = array(
        'username' => 'paoz',
        'password' => 'dgpa2040',
        'db' => 'oci:dbname=(description=(address=(protocol=tcp)(host=140.117.13.225)(port=1521))(connect_data=(service_name=dgsvr5)));charset=utf8'
    );*/

    $dbs = new dbs_conn();

    if (isset($login['account'])) {
        switch ($role) {
            case 'stu': {
                /**
                 * PDO 資料庫連線
                 * https://www.php.net/manual/en/class.pdo.php
                 */
                try {
                    $acad_conn = new PDO($dbs->acad['db'], $dbs->acad['username'], $dbs->acad['password']);
                    // var_dump($acad_conn);
                }  catch (PDOException $e) {
                    die($e->getMessage());
                }

                /**
                 * PDO::setAttribute
                 * https://www.php.net/manual/en/pdo.setattribute.php
                 */
                try {
                    $acad_conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);  // 屬性名 屬性值 陣列以關聯陣列返回
                }  catch (PDOException $e) {
                    die($e->getMessage());
                }

                /**
                 * PDO::prepare
                 * https://www.php.net/manual/en/pdo.prepare.php
                 */
                try {
                    /**
                     *
                     */
                    (isset($login['account'])) ? $account = $login['account'] : $account = 'null';

                    $sql = 'select * from stu_main where stuid like (:account) and deg_cod in (\'M\', \'N\', \'O\', \'P\') order by stuid asc';

                    // prepare sql command
                    $sth = $acad_conn->prepare($sql);

                    // bindParam
                    $sth->bindParam(':account',$account,PDO::PARAM_STR);

                    // execute
                    $sth->execute();

                    // fetch data
                    $row = $sth->fetchAll(PDO::FETCH_ASSOC);
                    if (count($row) >= 1) {
                        $login['role'] = 'stu';
                    }

                    unset($acad_conn);
                    // dump data
                    /*var_dump(count($row));
                    var_dump($row);*/
                } catch (PDOException $e) {
                    die($e->getMessage());
                }

            }  break;
            case 'tch': {
                /**
                 * (1) 查 sco_member_net 的身分
                 */
                /**
                 * PDO 資料庫連線
                 * https://www.php.net/manual/en/class.pdo.php
                 */
                try {
                    $acad_conn = new PDO($dbs->acad['db'], $dbs->acad['username'], $dbs->acad['password']);
                    // var_dump($acad_conn);
                }  catch (PDOException $e) {
                    die($e->getMessage());
                }

                /**
                 * PDO::setAttribute
                 * https://www.php.net/manual/en/pdo.setattribute.php
                 */
                try {
                    $acad_conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);  // 屬性名 屬性值 陣列以關聯陣列返回
                }  catch (PDOException $e) {
                    die($e->getMessage());
                }

                /**
                 * PDO::prepare
                 * https://www.php.net/manual/en/pdo.prepare.php
                 */
                try {
                    /**
                     * 找出在 sco_member_net 的資訊內容 -> unicod + name
                     */
                    (isset($login['idno'])) ? $idno = $login['idno'] : $idno = 'null';

                    $sql = 'select v1.*, v2.*
                            from (select x1.*, trim(x1.unicod||\' \'||x1.name) as u_name_1 from (select idno, name, unicod from tch_all_view group by idno, name, unicod) x1) v1
                               , (select trim(unit||\' \'||member_name) as u_name_2 from sco_member_net group by unit, member_name) v2
                            where v1.u_name_1 = v2.u_name_2 and v1.idno like (:idno) order by v1.idno,  v1.name, v1.unicod';

                    // prepare sql command
                    $sth = $acad_conn->prepare($sql);

                    // bindParam
                    $sth->bindParam(':idno',$idno,PDO::PARAM_STR);

                    // execute
                    $sth->execute();

                    // fetch data
                    $row = $sth->fetchAll(PDO::FETCH_ASSOC);
                    if (count($row) >= 1) {
                        $login['role'] = 'tch';
                        // var_dump($row);
                        for ($i = 0; $i < count($row); $i += 1) {
                            $login['teacher'][$i]['title'] = $login['title'];
                            $login['teacher'][$i]['key'] = $row[$i][strtoupper('u_name_2')];
                        }
                    }

                    unset($acad_conn);
                    // dump data
                    /*var_dump(count($row));
                    var_dump($row);*/
                } catch (PDOException $e) {
                    die($e->getMessage());
                }

                /**
                 * (2) 查 v_leader 的身分
                 */
                /**
                 * PDO 資料庫連線
                 * https://www.php.net/manual/en/class.pdo.php
                 */
                try {
                    $paoz_conn = new PDO($dbs->paoz['db'], $dbs->paoz['username'], $dbs->paoz['password']);
                    // var_dump($paoz_conn);
                }  catch (PDOException $e) {
                    die($e->getMessage());
                }

                /**
                 * PDO::setAttribute
                 * https://www.php.net/manual/en/pdo.setattribute.php
                 */
                try {
                    $paoz_conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);  // 屬性名 屬性值 陣列以關聯陣列返回
                }  catch (PDOException $e) {
                    die($e->getMessage());
                }

                /**
                 * PDO::prepare
                 * https://www.php.net/manual/en/pdo.prepare.php
                 */
                try {
                    /**
                     * 找出在 v_leader 的資訊內容 -> unicod
                     */
                    (isset($login['idno'])) ? $idno = $login['idno'] : $idno = 'null';

                    $sql = 'select unicod, idno, empno, name, rolname
                            from v_leader
                            where ( unicod like (\'1%\')
                                 or unicod in (\'0A00\', \'0C10\', \'0C20\', \'0C30\', \'0G00\', \'0K00\') )
                              and idno like (:idno)';

                    // prepare sql command
                    $sth = $paoz_conn->prepare($sql);

                    // bindParam
                    $sth->bindParam(':idno',$idno,PDO::PARAM_STR);

                    // execute
                    $sth->execute();

                    // fetch data
                    $row = $sth->fetchAll(PDO::FETCH_ASSOC);
                    if (count($row) >= 1) {
                        $login['role'] = 'tch';
                        // var_dump($row);
                        for ($i = 0; $i < count($row); $i += 1) {
                            $login['leader'][$i]['title'] = $row[$i][strtoupper('rolname')];
                            $login['leader'][$i]['key'] = $row[$i][strtoupper('unicod')];
                        }
                    }

                    unset($paoz_conn);
                    // dump data
                    /*var_dump(count($row));
                    var_dump($row);*/
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            }  break;
            case 'acad': {

            }  break;
            case 'dpt': {

            }  break;
            case 'adm': {

            }  break;
        }
    }  else {

    }
}
