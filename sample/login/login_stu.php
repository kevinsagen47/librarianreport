<?php
require_once 'etd-qa-session.php';
require_once 'etd-sso-auth.php';
require_once 'adminlte_login.php';

use nsysu\lis\templates\adminlte_login;

/**
 * (2020-09-16) 先檢查是否有 POST 資訊，有 POST 資訊進入 SSO 開始認證。
 */
(isset($_POST['account']))  ? $id = $_POST['account']  : $id = null;
(isset($_POST['password'])) ? $pw = $_POST['password'] : $pw = null;
(isset($_POST['role']))     ? $ro = $_POST['role']     : $ro = 'none';

/**
 * (2020-09-16) dump 參數 $id 與 $pw 資料內容
 */
//var_dump($id);
//var_dump($pw);

if ($id !== null && $pw !== null) {
    /**
     * (2020-09-16) sso 認證
     */
    $rc_sso = sso_auth('stu', $id, $pw);
    if ($rc_sso !== '' && count($rc_sso) > 1) {
        config_session($rc_sso, $pw, $ro);

        /**
         * 檢查登入的角色
         */
        (isset($_SESSION['login']['role'])) ? $role = $_SESSION['login']['role'] : $role = 'stu';
        //var_dump($role);
        identify_role($role, $_SESSION['login']);

    }  else {
        clear_session();
    }
}

/**
 * (2020-09-16) 檢查登入的 session 使否存在，存在直接跳入系統
 */
/*$url = array('chk' => 'login', 'org' => '#', 'dest' => 'in2system.php');*/
//$url = array('chk' => 'login', 'org' => '#', 'dest' => 'in2system.php');
$url = array('chk' => 'login', 'org' => '#', 'dest' => 'pizza2.php');
check_session($url);

/**
 * (2020-09-16) 設定 form action 的參數
 */
$header = array('script' => '<script>var goto=\'login_stu.php\'</script>');
$content = array('content' => '<input type="hidden" id="role" name="role" value="stu" >');
$footer = array();

/**
 * (2020-09-16) 套用 AdminLTE Login 的樣式
 */
$test = new adminlte_login();
$test->html_header($header);
$test->html_content($content);
$test->html_footer($footer);

/**
 * (2020-09-16) dump SESSSION['login'] 資料內容
 */
//isset($_SESSION['login']) ? var_dump($_SESSION['login']) : var_dump('');

/**
 * (2020-09-16) 顯示登入錯誤訊息
 */
if ($id !== null && $pw !== null) {
    if ($rc_sso !== '' && count($rc_sso) > 1) {

    }  else {
        error_message();
    }
}