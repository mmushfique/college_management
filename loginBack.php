<?php
session_start();
include "dbCon.php";

 if(!empty($_POST["btnLogin"])){
     $user=$_POST["username"];
     $pass=$_POST["password"];
   
    $sql="SELECT * FROM admin WHERE username='$user' AND password='$pass'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
        
        //pass the logged user
        $_SESSION["username"]=$user;
        //pass the role
        $detail=mysqli_fetch_array($result);
        $_SESSION["user"]=$detail[0];
	    $_SESSION["role"]="ADMIN";
        header("Location:manageCourse.php");
    } else{
        $sql2="SELECT * FROM lecturer WHERE email='$user' AND password='$pass' AND status='1'";
        $result2=mysqli_query($con,$sql2);
        if(mysqli_num_rows($result2) > 0){
            //pass the logged user
            $_SESSION["username"]=$user;
            //pass the role
            $detail=mysqli_fetch_array($result2);
            $_SESSION["user"]=$detail[1];
            $_SESSION["role"]="LECTURER";
            header("Location:manageStudent.php");
        }
        else{
           header("Location:login.php");
        }
    }  
}
?>