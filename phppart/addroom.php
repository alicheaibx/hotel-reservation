<?php
require "conc.php";

if( isset($_POST['room_Number']) && isset($_POST['Nb_of_Person']) && isset( $_POST['room_Type'] ) 
&& isset($_POST['price']) && isset($_POST['room_Rank'] ) && isset($_POST['detial'] ) )
{
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$RoomNumber = $_POST['room_Number'];
		$Nb_of_Person = $_POST['Nb_of_Person'];
		$Type=$_POST['room_Type'];
        $Price=$_POST['price'];
		$Rank = $_POST['room_Rank'];
		$detial = $_POST['detial'];
		

		if(empty($RoomNumber)&&empty($Nb_of_Person)&&empty($Type)&&empty($Price)
        &&empty($Rank)&&empty($detial))
		{
			echo"fields are empty";
		}
		else{
			
					
					# code...
					
					$sql = "SELECT * FROM room WHERE `room_Number`= '$RoomNumber'";
					echo"$Type, $Rank";
			
			}
	}	
	$result = mysqli_query($con, $sql);
	if (!$result) {
		die("query failed");
	
	}
	$resultCheck=mysqli_num_rows($result);
	$response = array();

	if(mysqli_num_rows($result) > 0)
	{
		$code = "add_failed";
		$message = "Room already exist...";
		header("Location: ../htmlpart/admin.html ");
		exit();
	}
	else
	{	
		echo "result is empty";
		
		$sql = "INSERT INTO `room`(`room_Number`, `room_Type`, `room_Rank`, `Nb_of_Person`, `price`, `Status` , `detials`) 
		VALUES ('$RoomNumber','$Type','$Rank','$Nb_of_Person','$Price','avialable','$detial')";
	
		$result = mysqli_query($con,$sql);
	
		if ( !$result ) {
			die( 'insert query failed' );
		} else {
			$code = "Room_added";
			$message = "The Room is added";
			// Warning is from line 36 an37
			header("Location: ../htmlpart/admin.html ");
			exit();
		}
		
	}
} 
else {
	echo "please enter all the fields";
}

mysqli_close($con);

?>