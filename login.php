<!DOCTYPE html>
<html>
<?php

include "header2.php";
$error=null;
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
                   $error="Username-or-password-is-incorrect";
                   //header("Location:login.php");
                }
            }  
        }

if (empty($_SESSION["username"])) {
?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet">
    </head>

    <body>
    
    <div id="login-page">
         <br>
  <div class="login">
    <h2 class="login-title">Login</h2>
    <p class="notice">Please login to access the system</p>
    
    <form action="login.php" method="post" class="form-login">
      <label for="email">E-mail</label>
      <div class="input-email">
        <i class="fas fa-envelope icon"></i>
        <input type="text" placeholder="Username" name="username" required>
        
      </div>
      <label for="password">Password</label>
      <div class="input-password">
        <i class="fas fa-lock icon"></i>
        <input type="password" placeholder="Password" name="password" required>
        
      </div>
      <div class="checkbox">
        <label for="remember">
          <input type="checkbox" name="remember">
          Remember me
        </label>
      </div>
      <input type="submit" value="Login" name="btnLogin"></i>
    </form>
    <a href="#">Forgot your password?</a>
    <input style="border: none;color:red" type="text" value=<?php echo $error ?> >
    <div class="created">
      <p>Created by <a href=#>Group 5</a></p>
    </div>
  </div>
  <div class="background">
    <h1>Welcome To Advanced Technological Institute Kegalle</h1>
  </div>
</div>
  
    </body>

<?php
} else {
    header("Location:index.php");
}
?>
</body>
<!--styleeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee-->
<style>
    * {
  box-sizing: border-box;
}
body {
  margin: 0;
  font-family: sans-serif;
}
a {
  color: #666;
  font-size: 14px;
  display: block;
}
.login-title {
  text-align: center;
}
#login-page {
  display: flex;
}
.notice {
  font-size: 13px;
  text-align: center;
  color: #666;
}
.login {
  width: 30%;
  height: 100vh;
  background: #fff;
  padding: 70px;
}
.login a {
  margin-top: 25px;
  text-align: center;
}
.form-login {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  align-content: center;
}
.form-login label {
  text-align: left;
  font-size: 13px;
  margin-top: 10px;
  margin-left: 20px;
  display: block;
  color: #666;
}
.input-email,
.input-password {
  width: 100%;
  background: #ededed;
  border-radius: 25px;
  margin: 4px 0 10px 0;
  padding: 10px;
  display: flex;
}
.icon {
  padding: 4px;
  color: #666;
  min-width: 30px;
  text-align: center;
}
input[type="text"],
input[type="password"] {
  width: 100%;
  border: 0;
  background: none;
  font-size: 16px;
  padding: 4px 0;
  outline: none;
}
input[type="submit"] {
  width: 100%;
  border: 0;
  border-radius: 25px;
  padding: 14px;
  background: #008552;
  color: #fff;
  display: inline-block;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  margin-top: 10px;
  transition: ease all 0.3s;
}
input[type="submit"]:hover {
  opacity: 0.9;
}
.background {
  width: 70%;
  padding: 40px;
  height: 100vh;
  background: linear-gradient(
      60deg,
      rgba(158, 189, 19, 0.5),
      rgba(0, 133, 82, 0.7)
    ),
    url("https://cdn.pixabay.com/photo/2016/03/09/09/22/workplace-1245776_960_720.jpg")
      center no-repeat;
  background-size: cover;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-end;
  justify-content: flex-end;
  align-content: center;
  flex-direction: row;
}
.background h1 {
  max-width: 420px;
  color: #fff;
  text-align: right;
  padding: 0;
  margin: 0;
}
.background p {
  max-width: 650px;
  color: #1a1a1a;
  font-size: 15px;
  text-align: right;
  padding: 0;
  margin: 15px 0 0 0;
}
.created {
  margin-top: 40px;
  text-align: center;
}
.created p {
  font-size: 13px;
  font-weight: bold;
  color: #008552;
}
.created a {
  color: #666;
  font-weight: normal;
  text-decoration: none;
  margin-top: 0;
}
.checkbox label {
  display: inline;
  margin: 0;
}

</style>

</html>