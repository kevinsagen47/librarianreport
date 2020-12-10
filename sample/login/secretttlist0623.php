<?php 
session_start();

if (isset($_SESSION['permission'])) {
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
  max-width:500px;
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


$servername = "localhost";
$username = "kevin0623";
$password = "@lis-kevin-0623,.";
$dbname = "kevin0623";
$datedate=date("Y-m-d",strtotime($_POST["Date"]));
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



echo $_POST["month"];
echo" , ";
echo $datedate;
echo" , ";
echo $_POST["in_name"];
echo"<p></p>";
//WHERE ID='".$_SESSION["login"]["account"]."'

$filter_sql='';



$filter_sql.=" AND Date LIKE '%".$_POST["month"]."%'";

$AAND=' AND';
if($datedate!="1970-01-01"){
  $filter_sql.=" AND Date ='".$datedate."'";
}
//else if($_POST["in_name"]!='*')$filter_sql.=" name='".$_POST["in_name"]."'";


if($_POST["in_name"]!='*'){
  $filter_sql.="$AAND name='".$_POST["in_name"]."'";
}

//WHERE 'ID'='".$_SESSION['login']['account']."'
//WHERE ID='".$_SESSION["login"]["account"]."'
echo'<p></p>';
//echo $filter_sql;
$sql = "SELECT name,ID,No, Date, start,end, Task, Assigned_by,
     Expected_Completion,night, Comment,Permission
      
       FROM Members 
       
       WHERE 1 $filter_sql

       ORDER BY Date DESC";
$result = $conn->query($sql);

echo"<p></p>";
/*

  table, th, td {
    border: 1px solid black;}
    */

//
if ($result->num_rows > 0) {
  echo '
<p>
<div style="text-align:center" >
<form action ="list_index.php">
<button type="submit" name="back" class="btn-primary">上一頁</button>
</form>
</p>
</div>

  <div class="w3-card-4 w3-center content" style="width:400px">
    <div style="text-align:center" class="w3-container w3-brown" >
      <h2>工讀生每日工作報告表</h2>
    </div>
    </div>
  <div class="container"style="width:1800px">
  <div class="table-responsive">
  <table class="table center">
    <tr>
        <th style="width:50px">Name</th>
        <th style="width:108px">日期</th>
        <th style="width:125px">工讀時間</th>
        <th style="width:60px">長度</th>
        <th style="width:150px">工作內容</th>
        <th style="width:80px">交辦館員</th>
        <th style="width:80px">預計完工期限</th>
        <th style="width:70px">晚上進館人數</th>
        <th>備註</th>
        
        </tr>';
  // output data of each row

  $e = new DateTime('00:00');
  $f = clone $e;

  while($row = $result->fetch_assoc()) {
    $start_time=date("H:i",strtotime($row["start"]));
    $end_time=date("H:i",strtotime($row["end"]));
    $d1 = new DateTime($start_time);
    $d2 = new DateTime($end_time);
    $interval = $d2->diff($d1);
    $e->add($interval);
    $Tinterval=$f->diff($e);
    
    echo 
    "<tr>
        <td>".$row["name"]."</td>
        <td>".$row["Date"]."</td>
        <td>".$row["start"]."—".$row["end"]."</td>
        <td>".$interval->format("%H時%I分")."</td>
        <td><pre>".$row["Task"]."</pre></td>
        <td>".$row["Assigned_by"]."</td>
        <td>".$row["Expected_Completion"]."</td>
        <td>".$row["night"]."</td>
        <td><pre>".$row["Comment"]."</td> </pre>
    </tr>";
  }
  echo '</table></div></div>';
    } 
else {
  echo "0 results";
    }
$conn->close();
echo "
<div style='text-align:center' class='w3-container w3-green' >
<font size='+2'>
終數: ", $f->diff($e)->format("%d天 %H小時 %I分鐘"), "\n
</font>
</div>";
echo'
<p>
<div style="text-align:center" >
<form action ="list_index.php">
<button type="submit" name="back" class="btn-primary">上一頁</button>
</form>
</p>';
echo"
</body>
</html>";}
else{
  header("Location: list_index.php");
  exit();
}

?>