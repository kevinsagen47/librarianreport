<?php
$paoz = array(
    'username' => 'paoz',
    'password' => 'dgpa2040',
    'db' => 'oci:dbname=(description=(address=(protocol=tcp)(host=140.117.13.225)(port=1521))(connect_data=(service_name=dgsvr5)));charset=utf8'
);

/**
 * PDO 資料庫連線
 * https://www.php.net/manual/en/class.pdo.php
 */
try {
    $paoz_conn = new PDO($paoz['db'], $paoz['username'], $paoz['password']);
    var_dump($paoz_conn);
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
    $unicod = '1%';
    $sql = 'select * from v_leader where unicod like (:unicod) order by unicod asc';

    // prepare sql command
    $sth = $paoz_conn->prepare($sql);

    // bindParam
    $sth->bindParam(':unicod',$unicod,PDO::PARAM_STR);

    // execute
    $sth->execute();

    // fetch data
    $row = $sth->fetchAll(PDO::FETCH_ASSOC);

    // dump data
    var_dump($row);

} catch (PDOException $e) {
    die($e->getMessage());
}