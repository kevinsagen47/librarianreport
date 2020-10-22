<?php
require_once 'etd-qa-session.php';



$servername = "localhost";
$username = "kevin0623";
$password = "@lis-kevin-0623,.";
$dbname = "kevin0623";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
/*
$sql = "INSERT INTO Members (name, ID,Time length,Task,Assigned by,Expected Completion,Comment)
VALUES ('Kevin', 'B063011059','8', 'sleep','myself','never','this is a test!!!!')";
*/
$datedate=date("Y-m-d",strtotime($_POST["Date"]));

$sql = "INSERT INTO Members (name,ID,start,end,Task,Assigned_by,Expected_completion,Date,night,Comment)
VALUES ('".$_POST["name"]."','".$_POST["ID"]."','".$_POST["start"]."','".$_POST["end"]."'
,'".$_POST["Task"]."','".$_POST["Assigned_by"]."','".$_POST["Expected_Completion"]."'
,'".$datedate."','".$_POST["night"]."','".$_POST["Comment"]."')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo'
<p>
<button onclick="goBack()">Submit Another Response</button>
</p>
<script>
function goBack(){
    window.history.back();
}
</script>';



mysqli_close($conn);


/*

    <p>
    <label> Time Length: </label>
    <input type="text" name="Time_length">
    <br>
    <label> Task:      </label>
    <input type="text" name="Task">
    <br>
    <label> Assigned by: </label>
    <input type="text" name="Assigned_by">
    <br>
    <label> Expected Completion: </label>
    <input type="text" name="Expected_Completion">
    */
?>
