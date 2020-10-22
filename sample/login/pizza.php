<?php
require_once 'etd-qa-session.php';

/**
 * (2020-09-18) 檢查是否系統
 * (1) 已登入系統 (存在 session 資訊) , 停留在此系統頁面。
 * (2)
 */
$url = array('chk' => 'admin', 'org' => '#', 'dest' => 'login.php');
check_session($url);

//isset($_SESSION['login']) ? var_dump($_SESSION['login']) : var_dump('');

// echo '<a href=\'logout.php\' >logout</a>';
// echo '<a href="javascript:window.location.replace(\'logout.php\');" >logout</a>';

$login = 'logout.php?login=login.php';
switch ($_SESSION['login']['role']) {
    case 'stu': {
        $login = 'logout.php?login=login_stu.php';
    }  break;
    case 'tch': {
        $login = 'logout.php?login=login_tch.php';
    }  break;
}

















echo '<a href="javascript:window.location.replace(\''.$login.'\');" >logout</a>';
echo "<p>".$_SESSION['login']['name']."</p>";
echo "<p>".$_SESSION['login']['account']."</p>";


?>



<!DOCTYPE html>
<html>




<section class="container grey-text">
    <h4 class="center"> Add a Pizza </h4>
    <form class="white" action="" method="">
        <label>Email:</label>
        <input type="text" name="email">
        <label> Pizza title:</label>
        <input type="text" name="title">
        <label> Ingredient:</label>
        <input type="text" name="email">
    </form>
</section>

</html>