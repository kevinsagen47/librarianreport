<?php
$acad = array(
    'username' => 'acad',
    'password' => 'aszx3211',
    'db' => 'oci:dbname=(description=(address=(protocol=tcp)(host=140.117.13.225)(port=1521))(connect_data=(service_name=dgsvr5)));charset=utf8'
);

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
    $syear = '108';
    $sem = '2';
    $sql = 'select * from sco_thesis_net where syear in (:syear) and sem in (:sem) order by syear asc, sem asc, stuid asc';

    // prepare sql command
    $sth = $acad_conn->prepare($sql);

    // bindParam
    $sth->bindParam(':syear',$syear,PDO::PARAM_STR);
    $sth->bindParam(':sem',$sem,PDO::PARAM_STR);

    // execute
    $sth->execute();

    // fetch data
    $row = $sth->fetchAll(PDO::FETCH_ASSOC);

    // dump data
    var_dump($row);

} catch (PDOException $e) {
    die($e->getMessage());
}