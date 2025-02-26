<?php 
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','admin123');
define('DB_DATABASE','crudphp');
class DB_con{
    private $dbh;
    function __construct(){
        $con=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $this->dbh=$con;
        if(mysqli_connect_errno()){
            echo "failed".mysqli_connect_error();
        }
    }
    public function insert($first_name,$last_name,$email,$password,$confirm_password,$gender,$language,$subject,$profile_image){
        $insertquery=mysqli_query($this->dbh,"insert into data(first_name,last_name,email,password,confirm_password,gender,language,subject,profile_image) 
        VALUES('$first_name','$last_name','$email','$password','$confirm_password','$gender','$language','$subject','$profile_image')");
        return $insertquery;
      
    }
   

    public function fetchdata(){
        $result=mysqli_query($this->dbh,"select * from data");
        return $result;
    }

    public function fetchonerecord($id){
        $fetchrecord=mysqli_query($this->dbh,"select * from data where id=$id");
        return $fetchrecord;
    }
    public function update($first_name,$last_name,$email,$gender,$language,$subject,$profile_image,$id){
        $updaterecord=mysqli_query($this->dbh,"update data set first_name='$first_name',last_name='$last_name',email='$email',
        gender='$gender',language='$language',subject='$subject',profile_image='$profile_image' where id='$id'");
        return $updaterecord;
    }
    public function delete($id){
        $deletequery=mysqli_query($this->dbh,"delete from data where id=$id");
        return $deletequery;
    }
    public function filterTable($first_name, $id) {
        $query = "SELECT * FROM data WHERE 1=1";
        
        if (!empty($first_name)) {
            $query .= " AND first_name LIKE '%$first_name%'";
        }
        
        if (!empty($id)) {
            $query .= " AND id = $id";
        }
        $filterresult = mysqli_query($this->dbh, $query);
        return $filterresult;
    }
    

}
