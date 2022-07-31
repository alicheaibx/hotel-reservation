<?php
require "conc.php";

if( isset($_POST['Email']) )
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Email = $_POST['Email'];
    }


    $sql = "DELETE FROM `employee` WHERE `Email`= '$Email' ";

    if ($con->query($sql) === TRUE) {
      header("Location: ../htmlpart/admin.html ");
		  exit();
    } else {
      echo "Error deleting record: " . $conn->error;
    }
}  
    $con->close();

?>