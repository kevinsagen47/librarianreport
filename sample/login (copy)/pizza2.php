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


///////BELOW IS SUBMIT FUNCTION/////////////////////////
/*

Table name : Members
No
Time submitted
name
ID
Date
Time length
Task
Assigned by
EXpected Completion
Comment
Permission
*/






//$sql ="SELECT * FROM 'e"




$month=date('m');
$day=date('d');
$year=date('Y');
$today = $year . '-'.$month.'-'.$day;





////////SUBMIT FUNCTIONNNNNNNNNNNNNN/////////////////



echo "<p> This Is Stable V1.1 </p>";
//echo "<p>".$_SESSION['login']['name']."</p>";
//echo "<p>".$_SESSION['login']['account']."</p>";





//<input type="date" name="Date"  >
echo '
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-display-topmiddle w3-center" style="width:400px;">
<div class="w3-card-4">
  <div style="text-align:center" class="w3-container w3-brown">
    <h2>工讀生每日工作報告表</h2>
  </div>
  
<form class="w3-container" action="pizzasubmit.php" method="post">
    <br>
    
    <p>
    <div align="left">
    <label class="w3-text-brown"><b> 姓名: </b></label></div>
    <input class="w3-input w3-border w3-sand" type="text" name="name" value="'.$_SESSION['login']['name'].'"readonly>
    <br>
    <div align="left">
    <label class="w3-text-brown"><b> 學好: </b></label></div>
    <input class="w3-input w3-border w3-sand" type="text" name="ID" value="'.$_SESSION['login']['account'].'" readonly>
    <br>
    </p>
    <p>
    <label class="w3-text-brown"><b>日期 :</label>
    <input type="date" name="Date"  >
    
    <br>
    <label class="w3-text-brown"> 工讀時間: </label>
    <input class="w3-light-grey" type="text" name="Time_length" maxlength="4" size="4">
    <label class="w3-text-brown"> 小時 </label>
    <br>
    <div align="left">
    <label class="w3-text-brown"> 工作內容:      </label>
    <input class="w3-input w3-border w3-light-grey" type="text" name="Task">
    <br>
    <label class="w3-text-brown"> 交辦館員: </label>
    <input class="w3-input w3-border w3-light-grey" type="text" name="Assigned_by">
    <br>
    <label class="w3-text-brown">  預計完工期限: </label>
    <input class="w3-input w3-border w3-light-grey" type="text" name="Expected_Completion">
    </b>
    <br>
    <br>
    <label class="w3-text-brown"> 備註: </label>
    <textarea class="w3-input w3-border w3-light-grey" type="text" name="Comment">
    </textarea>
    </b>
    </p>
    </div>
    <p>
    <input type="submit">
    </p>

</form>
</div>'



;



echo '<a href="javascript:window.location.replace(\''.$login.'\');" >Logout</a>';
?>

<!--
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
-->