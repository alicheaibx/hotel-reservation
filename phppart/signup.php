<?php

require 'conc.php';
if ( isset( $_POST['Firstname'] ) && isset( $_POST['Lastname'] ) && isset( $_POST['Email'] ) 
&& isset( $_POST['Phone'] ) && isset( $_POST['Password'] )  && isset( $_POST['confirm-Password'] ) )
{
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Firstname = $_POST['Firstname'];
		$Lastname = $_POST['Lastname'];
		$Email=$_POST['Email'];
		$Phone = $_POST['Phone'];
		$Password= $_POST['Password'];
		$confirmPassword= $_POST['confirm-Password'];
		if(empty($Firstname)||empty($Lastname)||empty($Phone)||empty($Email)||empty($Password)||empty($confirmPassword))
		{
			echo"fullname and phone is empty";
		}
		else{
			
					
					# code...
					
					$sql = "SELECT * FROM customer WHERE `Email` = '$Email'";
					echo"$Firstname , $Lastname";
			
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
		$code = "reg_failed";
		$message = "User already exist...";
		header("Location: ../htmlpart/signup.html ");
			exit();
	}
	else
	{	
		echo "result is empty";
		
		$sql = "INSERT INTO `customer`(`id`, `Firstname`, `Lastname`, `Phone`, `Email`, `Password`)
		 VALUES (' ','$Firstname','$Lastname','$Phone','$Email','$Password')";
	
		$result = mysqli_query($con,$sql);
	
		if ( !$result ) {
			die( 'insert query failed' );
		} else {
			$code = "reg_success";
			$message = "User registered. Now you can login...";
			// Warning is from line 36 an37
			header("Location: ../htmlpart/login.html ");
			exit();
		}
		
	}
} 
else {
	echo "please enter all the fields";
}

mysqli_close($con);

?>