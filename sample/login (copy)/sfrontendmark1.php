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

$login = 'logout.php?login=stablemark1.php';



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



echo "<p> This is stable Mark 1 </p>";
echo "<p> Student's Daily Activity Report Form </p>";
//echo "<p>".$_SESSION['login']['name']."</p>";
//echo "<p>".$_SESSION['login']['account']."</p>";





//<input type="date" name="Date"  >
echo '
<form action="submitmark1.php" method="post">
    <br>
    
    <p>
    <label> Name: </label>
    <input type="text" name="name" value="'.$_SESSION['login']['name'].'"readonly>
    <br>
    <label> ID: </label>
    <input type="text" name="ID" value="'.$_SESSION['login']['account'].'" readonly>
    <br>
    </p>
    <p>
    <label> Date: </label>
    <input type="date" name="Date"  >
    
    <br>
    <label> Time Length: </label>
    <input type="text" name="Time_length" maxlength="1" size="1">
    <br>
    <label> Task:      </label>
    <input type="text" name="Task">
    <br>
    <label> Assigned by: </label>
    <input type="text" name="Assigned_by">
    <br>
    <label> Expected Completion: </label>
    <input type="text" name="Expected_Completion">
    
    <br>


    <input type="submit">


</form>
'



;



echo '<a href="javascript:window.location.replace(\''.$login.'\');" >Logout</a>';
?>