<?php
require_once 'etd-qa-session.php';



$servername = "localhost";
$username = "kevin0623";
$password = "@lis-kevin-0623,.";
$dbname = "kevin0623";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
/*
$sql = "INSERT INTO Members (name, ID,Time length,Task,Assigned by,Expected Completion,Comment)
VALUES ('Kevin', 'B063011059','8', 'sleep','myself','never','this is a test!!!!')";
*/
$datedate=date("Y-m-d",strtotime($_POST["Date"]));

$stmt = $conn->prepare("INSERT INTO 
        Members (name,ID,start,end,Task,Assigned_by
                ,Expected_completion,Date,night,Comment)
VALUES (    :name,:ID
            ,:start,:end
            ,:Task,:Assigned_by
            ,:Expected_Completion,:date
            ,:night,:Comment)");
 
$stmt->bindParam(':name',$_POST["name"]);
$stmt->bindParam(':ID',$_POST["ID"]);
$stmt->bindParam(':start',$_POST["start"]);
$stmt->bindParam(':end',$_POST["end"]);
$stmt->bindParam(':Task',$_POST["Task"]);
$stmt->bindParam(':Assigned_by',$_POST["Assigned_by"]);
$stmt->bindParam(':Expected_Completion',$_POST["Expected_Completion"]);
$stmt->bindParam(':date',$datedate);
$stmt->bindParam(':night',$_POST["night"]);
$stmt->bindParam(':Comment',$_POST["Comment"]);


$stmt->execute();

 /*
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
*/
echo "New record created successfully";
echo'
<p>
<button onclick="goBack()">Submit Another Response</button>
</p>
<script>
function goBack(){
    window.history.back();
}
</script>';


} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;


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
