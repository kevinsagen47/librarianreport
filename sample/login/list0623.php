<?php 

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
  <div class="w3-card-4 w3-center content" style="width:400px">
    <div style="text-align:center" class="w3-container w3-brown" >
      <h2>工讀生每日工作報告表</h2>
    </div>
    </div>
  <div class="container">
  <div class="table-responsive">
  <table class="table center">
    <tr>
        <th>Name</th>
        <th>日期</th>
        <th>工讀時間</th>
        <th>工作內容</th>
        <th>交辦館員</th>
        <th>預計完工期限</th>
        <th>晚上進館人數</th>
        <th>備註</th>
    </tr>';
  // output data of each row

  while($row = $result->fetch_assoc()) {
    echo 
    "<tr>
        <td>".$row["name"]."</td>
        <td>".$row["Date"]."</td>
        <td>".$row["start"]."—".$row["end"]."</td>
        <td>".$row["Task"]."</td>
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

echo'
<p>
<button onclick="goBack()">Back</button>
</p>
<script>
function goBack(){
    window.history.back();
}
</script>';
echo"
</body>
</html>";

?>