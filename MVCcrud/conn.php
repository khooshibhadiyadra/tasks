<?php
// include database connection file
include_once("function.php");
//Object
$updatedata=new DB_con();
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];
//Function Calling
$sql=$updatedata->update($fname,$lname,$emailid,$contactno,$address,$userid);
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>";
}
?>