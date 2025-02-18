<?php
include 'conn.php';

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $deletedata = new DB_con();
    $sql = $deletedata->delete($id);
    if($sql)
    {
    echo "<script>alert('Deleted successfully');</script>";
    echo "<script>window.location.href='index.php'</script>";
    }
}