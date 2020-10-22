<?php
$etd_available = array(
    'username' => 'root',
    'password' => 'lIb,eTd!2453;',
    'db' => 'mysql:host=140.117.121.23;dbname=etd_available;port=3306;charset=utf8'
);

/**
 * PDO 資料庫連線
 * https://www.php.net/manual/en/class.pdo.php
 */
try {
    $etd_available_conn = new PDO($etd_available['db'], $etd_available['username'], $etd_available['password']);
    var_dump($etd_available_conn);
}  catch (PDOException $e) {
    die($e->getMessage());
}

/**
 * PDO::setAttribute
 * https://www.php.net/manual/en/pdo.setattribute.php
 */
try {
    $etd_available_conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);  // 屬性名 屬性值 陣列以關聯陣列返回
}  catch (PDOException $e) {
    die($e->getMessage());
}

/**
 * PDO::prepare
 * https://www.php.net/manual/en/pdo.prepare.php
 */
try {
    $year = '108';
    $semester = '2';
    $sql = 'select * from etd_main where year in (:year) and semester in (:semester) limit 0, 2';

    // prepare sql command
    $sth = $etd_available_conn->prepare($sql);

    // bindParam
    $sth->bindParam(':year',$year,PDO::PARAM_STR);
    $sth->bindParam(':semester',$semester,PDO::PARAM_STR);

    // execute
    $sth->execute();

    // fetch data
    $row = $sth->fetchAll(PDO::FETCH_ASSOC);

    // dump data
    var_dump($row);

} catch (PDOException $e) {
    die($e->getMessage());
}