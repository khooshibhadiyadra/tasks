<?php
$nameArr = json_decode($_POST["name"]);
$emailArr = json_decode($_POST["email"]);
$con=mysqli_connect("localhost","root","admin123","school");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
for ($i = 0; $i < count($nameArr); $i++) {
if(($nameArr[$i] != "")){ /*not allowing empty values and the row which has been removed.*/
$sql="INSERT INTO user_data (Name, email)
VALUES
('$nameArr[$i]','$emailArr[$i]')";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
}
}
Print "Data added Successfully !";
mysqli_close($con);
?>