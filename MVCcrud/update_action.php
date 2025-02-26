<?php 
include_once("con.php");
$updatedata=new DB_CON();
if(isset($_POST['update'])){
    $id=intval($_GET['id']);
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];

}

