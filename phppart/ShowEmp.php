<!DOCTYPE html>
<html>
  <style>
     body{
                    background-color: whitesmoke;
                }
                table{
                    width: 40%;
                    height: 5%;
                    border: 1px;
                    border-radius: 05px; 
                    padding: 8px 15px 8px 15px;
                    margin: 10px 0px 15px 0px;
                    box-shadow: 1px 1px 2px 1px grey;
                }
  </style>
<head>
  <title>Display all records from Database</title>
</head>
<body>

<h2>Employee Details</h2>

<table border="8">
  <tr>
    <td>Emp_Fname</td>
    <td>Emp_Lname</td>
    <td>Phone</td>
    <td>Email</td>
    <td>Position</td>
    
  </tr>

<?php

include "conc.php"; // Using database connection file here

$dbRecords = mysqli_query($con , "SELECT * FROM employee"); // fetch data from database

while($data = mysqli_fetch_array($dbRecords))
{
?>
  <tr>
    <td><?php echo $data['Emp_Fname']; ?></td>
    <td><?php echo $data['Emp_Lname']; ?></td>
    <td><?php echo $data['Phone']; ?></td>
    <td><?php echo $data['Email']; ?></td>
    <td><?php echo $data['Position']; ?></td>
    
  </tr>	
<?php
}
?>
</table>

</body>
</html>