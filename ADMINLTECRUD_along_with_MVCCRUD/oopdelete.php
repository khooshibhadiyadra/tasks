<?php
include 'oopcon.php';

if(isset($_GET['id']))
{
    $iid=$_GET['id'];
    $deletedata = new DB_CON();
    $sql = $deletedata->delete($id);
    if($sql)
    {
    echo "<script>alert('Deleted successfully');</script>";
    echo "<script>window.location.href='index.php'</script>";
    }
}