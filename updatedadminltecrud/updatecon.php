<?php
//model
include 'conn.php';
class DB_CON
{

    private $dbh;
    function __construct()
    {
        $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbh = $con;
        if (mysqli_connect_errno()) {
            echo "failed" . mysqli_connect_error();
        }
    }
    public function fetchonerecord($id)
    {
        $oneresult = mysqli_query($this->dbh, "select * from mvcdata where id=$id");
        return $oneresult;
    }
}
