<?php
   include "con.php";

   $query = "SELECT * FROM users";
   $result= mysqli_query($conn, $query);
   $result_array = [];

   if(mysqli_num_rows($result) > 0){
    foreach($result as $row){
        array_push($result_array,$row);
    }
    header('Content-type: application/json');
    echo json_encode($result_array);
   }
   else{
    echo $return = "<h4>No Record Found </h4>";
   }

   

   