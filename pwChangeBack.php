<?php
        include "dbCon.php";
        session_start();

        if(isset($_POST["email"])){
            $email=$_POST["email"];
            $pwOld=$_POST["pwOld"];
            $pw=$_POST["pw"];
            //verify wheher it is from the same user
            if(($_SESSION["username"])==$email){
                $sql="SELECT id FROM lecturer WHERE email='$email' AND password='$pwOld'";
                $result=mysqli_query($con,$sql);
                $id=mysqli_fetch_array($result);
                if(mysqli_num_rows($result) > 0){
                    $sqlUpd="UPDATE lecturer SET password='$pw' WHERE id='$id[0]'";
                    mysqli_query($con,$sqlUpd);
                    echo "Succesfully password updated";
                }else{
                    echo "Your current password is incorrect";
                }
            }else{
                echo "You are updating a wrong user";
            }
            
        }

?>