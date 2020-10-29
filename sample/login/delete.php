<?php
$id = $_GET['id'];

echo "$id";
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
$servername = "localhost";
$username = "kevin0623";
$password = "@lis-kevin-0623,.";
$dbname = "kevin0623";


// sql to delete a record
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//WHERE 'ID'='".$_SESSION['login']['account']."'

$sql = "DELETE FROM Members WHERE No = $id";

//$result = $conn->query($sql);

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: pizza2.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}

?>