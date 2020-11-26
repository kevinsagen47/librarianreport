<?php

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

//WHERE 'ID'='".$_SESSION['login']['account']."'
//WHERE ID='".$_SESSION["login"]["account"]."'


/*
echo'
<div class="container">
  <div class="table-responsive">
  <table class="table center">
    <tr>
        <th>日期</th>
        </tr>';

        
while($row = $result->fetch_assoc()) {
  echo 
  "<tr>
      <td>".$row["name"]."</td>
      </tr>";
    }
*/
/*
$query = "SELECT 1";
$result = $mysqli->query($query);
$followingdata = $result->fetch_assoc()
*/
/*
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

*/



/*
$in_name_sql = "SELECT DISTINCT name FROM Members";
$name_resultttt = $conn->query($in_name_sql);
$name_result=$name_resultttt->fetch_assoc();
*/
$sql = "SELECT DISTINCT name
      
       FROM Members 
       
    

       ORDER BY No DESC";
$result = $conn->query($sql);
  

//echo''.$name_result[0].'';

$name_list='';
/*
for($i=1;$i<=$name_result[0];$i++){
  $name_list.='<label class="radio-inline">
  <input type="radio" id="in_name" name="in_name" value="'.$name_result[$i]->in_name.'">'.$name_result[$i]->in_name.'</label>';
}
*/
while($row = $result->fetch_assoc()) {
  $name_list.=
  '<label class="radio-inline">
  <input type="radio" id="in_name" name="in_name" value="'.$row["name"].'">'.$row["name"].'</label><br>';
    }


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

<form class="w3-container" action="list0623.php" method="post" ;">
<p><div align="left">
<label class="w3-text-brown"><b>日期 &ensp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;:</label>
<input type="date" name="Date" ></p>

<p><div align="left">
<label class="w3-text-brown"><b>Month &ensp;&emsp;&emsp;&ensp;&ensp;:</label>
<input type="month" name="month"></p>


<label for="in_name" class="w3-text-brown">Student Name &ensp;:&ensp;</label>
<label class="radio-inline"><br>
<p>

<input type="radio" id="in_name" name="in_name" value="*" checked> All</label><br>
'.$name_list.'<br>
</p>
</p>
<p></p>
<p>
        <input type="submit">
        </p>
</form>
</div>
';
?>