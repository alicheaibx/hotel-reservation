<!DOCTYPE html>
<html>
  
<head>
  <title>Display all records from Database</title>
</head>
<body>

<h2>Room Details</h2>

<?php

include "conc.php"; // Using database connection file here

$dbRecords = mysqli_query($con , "SELECT * FROM room"); // fetch data from database

while($data = mysqli_fetch_array($dbRecords))
{
    
?>
<div>  <?php echo'RoomNumber:'; echo$data['room_Number']; ?></div>
<div>  <?php echo'Type:'; echo$data['room_Type'];?></div>
<div>  <?php echo'Rank:'; echo$data['room_Rank'];?></div>
<div>  <?php echo'Number of Person:'; echo$data['Nb_of_Person'];?></div>
<div>  <?php echo'Price:'; echo$data['price'];?></div>
<div>  <?php echo'Status:'; echo $data['Status'];?></div>
<div>  <?php echo'Detials:'; echo$data['detials'];?></div>

<div>
    <form>
    <input id="booknow" type="submit" name="Booknow" value="Booknow">
    </form>
</div>

  
<?php
}
?>


</body>
</html>