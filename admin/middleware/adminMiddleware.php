<?php
    include("../functions/myfunction.php");
    if(isset($_SESSION['auth'])){
        if($_SESSION['role_as'] != 1){
            redirect('../index.php','Success');
        }
        else{
            redirect('../login.php','Failer');
        }
    }
?>