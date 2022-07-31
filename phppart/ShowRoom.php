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
    <td>room_Number</td>
    <td>room_Type</td>
    <td>room_Rank</td>
    <td>Nb_of_Person</td>
    <td>price</td>
    

  </tr>

<?php

include "conc.php"; // Using database connection file here

$dbRecords = mysqli_query($con , "SELECT * FROM room"); // fetch data from database

while($data = mysqli_fetch_array($dbRecords))
{
?>
  <tr>
    <td><?php echo $data['room_Number']; ?></td>
    <td><?php echo $data['room_Type']; ?></td>
    <td><?php echo $data['room_Rank']; ?></td>
    <td><?php echo $data['Nb_of_Person']; ?></td>
    <td><?php echo $data['price']; ?></td>
    
  </tr>	
<?php
}
?>
</table>

</body>
</html>