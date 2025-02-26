<?php
//model
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'admin123');
define('DB_NAME', 'mvccrud');
$id = intval($_GET['id']);
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

    public function insert($first_name, $last_name, $email, $hashedpassword, $hashedpassword2, $phone, $address, $gender, $hobbies, $country, $profile_image)
    {
        $ret = mysqli_query($this->dbh, "insert into mvcdata(first_name,last_name,email,password,confirm_password,phone,address,gender,hobbies,country,profile_image) 
values ('$first_name','$last_name','$email','$hashedpassword','$hashedpassword2','$phone','$address','$gender','$hobbies','$country','$profile_image')");
        return  $ret;
    }
    public function fetchdata()
    {
        $result = mysqli_query($this->dbh, "select * from mvcdata");
        return $result;
    }
    public function fetchonerecord($id)
    {
        $oneresult = mysqli_query($this->dbh, "select * from mvcdata where id=$id");
        return $oneresult;
    }
    public function update($first_name, $last_name, $email, $phone, $address, $gender, $hobbies, $country, $profile_image, $id)
    {
        $updatedquery = mysqli_query($this->dbh, "update mvcdata set first_name='$first_name',last_name='$last_name',email='$email',phone='$phone',
        address='$address',gender='$gender',hobbies='$hobbies',country='$country',profile_image='$profile_image'where id=$id");
        return $updatedquery;
    }
    public function delete($id)
    {
        $deletedquery = mysqli_query($this->dbh, "delete from mvcdata where id=$id");
        return $deletedquery;
    }
}
