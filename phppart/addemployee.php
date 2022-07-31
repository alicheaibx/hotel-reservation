<?php
require "conc.php";
if( isset($_POST['firstname']) && isset($_POST['lastname']) && isset( $_POST['Email'] ) 
&& isset($_POST['Phone']) && isset($_POST['Facebook']) && isset( $_POST['Instagram'] ) 
&& isset( $_POST['Twitter'] ))
{
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Emp_Fname = $_POST['firstname'];
		$Emp_Lname = $_POST['lastname'];
		$Email=$_POST['Email'];
        $Phone=$_POST['Phone'];
		$Facebook = $_POST['Facebook'];
		$Instagram= $_POST['Instagram'];
        $Twitter= $_POST['Twitter'];
		if(empty($Emp_Fname)&&empty($Emp_Lname)&&empty($Email)&&empty($Phone)
        &&empty($Facebook)&&empty($Instagram)&&empty($Twitter))
		{
			echo"fields are empty";
		}
		else{
			
					
					# code...
					
					$sql = "SELECT * FROM employee WHERE `Email`= '$Email'";
					echo"$Emp_Fname, $Emp_Lname";
			
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
		$message = "Employee already exist...";
		header("Location: ../htmlpart/admin.html ");
		exit();
	}
	else
	{	
		echo "result is empty";
		
		$sql = "INSERT INTO `employee`(`Emp_Fname`, `Emp_Lname`, `Phone`, `Email`, `Facebook`, `Instagram`, `Twitter`, `position`) 
		VALUES ('$Emp_Fname','$Emp_Lname','$Phone','$Email','$Facebook','$Instagram','$Twitter','Emp')";
	
		$result = mysqli_query($con,$sql);
	
		if ( !$result ) {
			die( 'insert query failed' );
		} else {
			$code = "employee_added";
			$message = "The employee is added";
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