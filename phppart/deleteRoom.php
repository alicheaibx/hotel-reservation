<?php
require "conc.php";

if( isset($_POST['room_Number']) )
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$RoomNumber = $_POST['room_Number'];
    }


    $sql = "DELETE FROM `room` WHERE `room_Number`= '$RoomNumber' ";

    if ($con->query($sql) === TRUE) {
      header("Location: ../htmlpart/admin.html ");
		  exit();
    } else {
      echo "Error deleting record: " . $conn->error;
      echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    }
}  
    $con->close();
  
?>