<?php
session_start();
include 'connectDB.php';

if(isset($_GET['token'])){

    $token = $_GET['token'];
    $queryupdate = "update user set status='active' where token='$token' ";

    $query = mysqli_query($con, $queryupdate);


    if($query){
        if(isset($_SESSION['message'])){
            $_SESSION['message'] = "Account updated!";
            header('location:./user/signin.php');
        }
        else{
            $_SESSION['message'] = "You are logged out!";
            header('location:./user/signin.php');
        }
       
    }
    else{
        $_SESSION['message'] = "Account not updated!";
        header('location:./user/signup.php');
    }
}
?>