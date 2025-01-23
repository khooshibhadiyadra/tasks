<?php 
session_start();
?>

<html>
<body>
    <?php 
    session_unset();
    session_destroy();
    if(session_destroy==true){
        echo "session is destroyed";
    }
    ?>
    
</body>
</html>