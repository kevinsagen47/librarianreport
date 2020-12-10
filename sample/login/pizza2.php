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

$login = 'logout.php?login=login_stu.php';


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


//max-width: 100%;
  
  //min-width: 400px; 
  /*
  [class*="col-"] {
  float: left;
  padding: 15px;
} 
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

@media only screen and (max-width: 768px) {
   For mobile phones: 
  [class*="col-"] {
    width: 100%;
  }
}
  */
  //<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
echo '
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="user-scalable = yes">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>





<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>工讀生每日工作報告表</title>


<style>

.content {
 
  margin: auto;
}

table {
  border-collapse: collapse;

}

.center{
  margin-left:auto; 
  margin-right:auto;
}

th, td {
  max-width:300px;
  word-wrap:break-word;
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
}

tr:nth-child(even){background-color: #e6e6e6}

th {
  background-color: #ff4000;
  color: white;
}



</style>


</head>
<body>
';
//echo "<p>".$_SESSION['login']['name']."</p>";
//echo "<p>".$_SESSION['login']['account']."</p>";

// max-width: 500px;

//style="width:400px

//<input type="date" name="Date"  >
//w3-display-topmiddle 
echo '



  <div class="w3-card-4 w3-center content" style="width:600px">
    <div style="text-align:center" class="w3-container w3-brown" >
      <h2>工讀生每日工作報告表</h2>
    </div>
    <form class="w3-container" action="PDOsubmit.php" method="post" ;">
        <br>
        
        <p>
        <div align="left">
        <label class="w3-text-brown"><b> 姓名: </b></label></div>
        <input class="w3-input w3-border w3-sand" type="text" name="name" value="'.$_SESSION['login']['name'].'"readonly>
        <br>
        <div align="left">
        <label class="w3-text-brown"><b> 學號: </b></label></div>
        <input class="w3-input w3-border w3-sand" type="text" name="ID" value="'.$_SESSION['login']['account'].'" readonly>
        <br>
        </p>
        <p><div align="left">
        <label class="w3-text-brown"><b>日期 &ensp;&emsp;:</label>
        <input type="date" name="Date"  required>
        

        <br>
        <label class="w3-text-brown"> 工讀時間: </label>
        <input class="w3-light-grey" type="time" name="start" required>
        <label class="w3-text-brown"> — </label>
        <input class="w3-light-grey" type="time" name="end" required>
        
        
        <br>
        
        <label class="w3-text-brown"> 工作內容:      </label>
        <textarea class="w3-input w3-border w3-light-grey" type="text" name="Task" required ></textarea>
        <br>
        <label class="w3-text-brown"> 交辦館員: </label>
      
        <input class="w3-input w3-border w3-light-grey" type="text" name="Assigned_by" required>
        
        <br>
        <label class="w3-text-brown">  預計完工期限: </label>
        <input class="w3-input w3-border w3-light-grey" type="text" name="Expected_Completion"required>
        </b>
        <br>
        <br>
        
        <label class="w3-text-brown">  晚上進館人數: </label>
        <input class="w3-input w3-border w3-light-grey" type="number" name="night" maxlength="2" size="2" min="0" max="99">
        </b>
        <br>
        <br>
        <label class="w3-text-brown"> 備註: </label>
        <textarea class="w3-input w3-border w3-light-grey" type="text" name="Comment"></textarea>
        </b>
        </p>
        </div>
        <p>
        <input type="submit">
        </p>
        <p>
        <input type="button" onclick="javascript:window.location.replace(\''.$login.'\');" value="登出">
        </p>
    </form>
  </div>
  
  <script>
  $(".textTest input").keyup(function () {
    if ($(this).val().match(/[\u3040-\u30ff\u3400-\u4dbf\u4e00-\u9fff\uf900-\ufaff\uff66-\uff9f]+/g)) {
        
    }
    else alert("Only Chinese Characters");
  });
  </script>

  
  ';

  




echo'<p></p>';

$servername = "localhost";
$username = "kevin0623";
$password = "@lis-kevin-0623,.";
$dbname = "kevin0623";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//WHERE 'ID'='".$_SESSION['login']['account']."'


$sql = "SELECT ID,No, Date, start,end, Task, Assigned_by,
     Expected_Completion,night, Comment
      
       FROM Members 
       
       WHERE ID='".$_SESSION["login"]["account"]."'

       ORDER BY No DESC";
$result = $conn->query($sql);

/*

  table, th, td {
    border: 1px solid black;}
    */


if ($result->num_rows > 0) {
  echo '
  <div class="container"style="width:1400px">
  <div class="table-responsive">
  <table class="table center">
    <tr>
    <th style="width:108px">日期</th>
    <th style="width:125px">工讀時間</th>
    <th style="width:100px">長度</th>
    <th style="width:150px">工作內容</th>
    <th style="width:80px">交辦館員</th>
    <th style="width:80px">預計完工期限</th>
    <th style="width:70px">晚上進館人數</th>
    <th>備註</th>
    <th>刪除</th>
    </tr>';
  // output data of each row


  $e = new DateTime('00:00');
  $f = clone $e;


  //echo "Total interval : ", $Tinterval->format("%H:%I"), "\n";

  while($row = $result->fetch_assoc()) {
    
    
    //$assigned_time = "$row[start]";
    //$completed_time= "$row[end]";   
    //$datedate=date("Y-m-d",strtotime($_POST["Date"]));
    $start_time=date("H:i",strtotime($row["start"]));
    $end_time=date("H:i",strtotime($row["end"]));
    $d1 = new DateTime($start_time);
    $d2 = new DateTime($end_time);
    $interval = $d2->diff($d1);
    
    
    $e->add($interval);
    $Tinterval=$f->diff($e);
    //echo "Total interval : ", $f->diff($e)->format("%H:%I"), "\n";
    //echo "Total interval : ", $Tinterval->format("%H:%I"), "\n";
    echo 
    "<tr>
        <td>".$row["Date"]."</td>
        <td>".$row["start"]."—".$row["end"]."</td>
        <td>".$interval->format("%H時%I分")."</td>
        <td><pre>".$row["Task"]."</pre></td>
        <td>".$row["Assigned_by"]."</td>
        <td>".$row["Expected_Completion"]."</td>
        <td>".$row["night"]."</td>
        <td><pre>".$row["Comment"]."</td> </pre>
        <td><a href='delete.php?id=".$row['No']."'
        class='delete' data-confirm='Are you sure to delete this item?'> 
        delete</a></td>
    </tr>";
  }
  echo '</table></div></div>';
    } 
else {
  echo "0 results";
    }
    echo "
    <div style='text-align:center' class='w3-container w3-green' >
    <font size='+2'>
    終數: ", $f->diff($e)->format("%d天%H小時%I分鐘"), "\n
    </font>
    </div>";
$conn->close();



echo"<p></p>
<script>
var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
deleteLinks[i].addEventListener('click', function(event) {
event.preventDefault();

var choice = confirm(this.getAttribute('data-confirm'));

if (choice) {
  window.location.href = this.getAttribute('href');
}
});
}
</script>


</body>
</html>";




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