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

<h2>Feedback Details</h2>

<table border="8">
  <tr>
    <td>Cfirstname</td>
    <td>Clastname</td>
    <td>Email</td>
    <td>feedback</td>

  </tr>

<?php

include "conc.php"; // Using database connection file here

$dbRecords = mysqli_query($con , "SELECT * FROM feedback"); // fetch data from database

while($data = mysqli_fetch_array($dbRecords))
{
?>
  <tr>
    <td><?php echo $data['Cfirstname']; ?></td>
    <td><?php echo $data['Clastname']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><?php echo $data['feedback']; ?></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>