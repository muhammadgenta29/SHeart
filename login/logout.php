<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "server.php";
        $logout_id = mysqli_real_escape_string($konek, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($konek, "UPDATE user SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: login.php");
            }
        }else{
            header("location: daftar.php");
        }
    }else{  
        header("location: login.php");
    }
?>