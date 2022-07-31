<?php
require "conc.php";
if( isset($_POST['Cfirstname'])&&isset($_POST['Clastname'])&&isset($_POST['email'])&&isset($_POST['feedback']) )
{
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Cfirstname = $_POST['Cfirstname'];
		$Clastname	 = $_POST['Clastname'];
		$Email=$_POST['email'];
        $feedback=$_POST['feedback'];
		
		if(empty($Cfirstname)&&empty($Clastname)&&empty($Email)&&empty($feedback))
		{
			echo"fields are empty";
		}
		else{
			
					
					# code...
					
					$sql = "SELECT * FROM feedback WHERE `email`= '$Email'";
					echo"$Cfirstname, $Clastname";
			
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
		$message = "Feedback already exist...";
		header("Location: ../htmlpart/contact_us.html ");
		exit();
	}
	else
	{	
		echo "result is empty";
		
		$sql = "INSERT INTO `feedback`(`Cfirstname`, `Clastname`, `email`, `feedback`) 
        VALUES ('$Cfirstname','$Clastname','$Email','$feedback')";
	
		$result = mysqli_query($con,$sql);
	
		if ( !$result ) {
			die( 'insert query failed' );
		} else {
			$code = "Feedback_added";
			$message = "The Feedback is added";
			// Warning is from line 36 an37
			header("Location: ../htmlpart/contact_us.html ");
		exit();
		}
		
	}
} 
else {
	echo "please enter all the fields";
}

mysqli_close($con);

?>