<?php
require_once 'adminlte.php';
require_once 'dts_param.php';
require_once 'acad_conn.php';

use nsysu\lis\templates\adminlte;

/**
 * PDO 資料庫連線
 * https://www.php.net/manual/en/class.pdo.php
 */
try {
    $acad_conn = new PDO($acad['db'], $acad['username'], $acad['password']);
    var_dump($acad_conn);
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
    (isset($_GET['syear'])) ? $syear = $_GET['syear'] : $syear = '109';
    (isset($_GET['sem'])) ? $sem = $_GET['sem'] : $sem = '2';
    (isset($_GET['stuid'])) ? $stuid = $_GET['stuid'] : $stuid = '%';

    $sql = 'select * from sco_thesis_net where syear like (:syear) and sem like (:sem) and stuid like (:stuid) order by syear asc, sem asc, stuid asc';

    // prepare sql command
    $sth = $acad_conn->prepare($sql);

    // bindParam
    $sth->bindParam(':syear',$syear,PDO::PARAM_STR);
    $sth->bindParam(':sem',$sem,PDO::PARAM_STR);
    $sth->bindParam(':stuid',$stuid,PDO::PARAM_STR);

    // execute
    $sth->execute();

    // fetch data
    $row = $sth->fetchAll(PDO::FETCH_ASSOC);

    // dump data
    var_dump($row);

} catch (PDOException $e) {
    die($e->getMessage());
}
