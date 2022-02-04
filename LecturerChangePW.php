<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
    <?php
        include "header.php";

     //Check whether user is logged in to the system and let to the page
    if(($_SESSION["role"])=="LECTURER"){
    ?>
 </head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>

        <div class="container">
            <div class="inner">
                <div class="row">
                <div class="col-md-3">
                </div>
                    <div class="col-md-6">
                    <h1>Change password</h1>
                       <!--  <form action="#" method="post"> -->
                            <div class="form-group">
                            You are changing the password of <input class="form-control"  id="email" value='<?php echo $_SESSION["username"]?>'  readonly>
                            </div>
                            <div class="form-group">
                                <label>Enter old password</label>
                                <input class="form-control"  type="password" place-holder="Enter current password" required id="pwCrnt"  >
                            </div>
                            <div class="form-group">
                                <label>Enter new password</label>
                                <input class="form-control" type="password" place-holder="Enter new password" required id="pw1"  >
                            </div>
                            <div class="form-group">
                                <label>Re-enter password</label>
                                <input class="form-control" type="password" place-holder="Re-enter password" required id="pw2" >
                                <small></small>
                            </div>

                            <div class="form-group">
                            <small id="error"></small>
                            </div>

                            <input class="btn btn-primary" type="submit" id="btnUpd" name="btnUpd" value="update">

                        <!-- </form> -->
                    </div>
                   
                      

</div>
</div>

<?php
    }   //closed the if statement of the if statement checking the logged user
    else{
        header("Location:error.html");
    }
   ?>

   <script>

    btnUpd.addEventListener('click', function (e) {
    e.preventDefault();
    error.style.visibility = "hidden"
    
    if (pw1.value != pw2.value || pw2.value=="") setError(pw2, "Passwords do not match", e);
    else    setSuccess(pw2);
    });

    function setError(inputName, errmessage, e) {
        e.preventDefault();
        let parentDiv = inputName.parentElement;
        parentDiv.querySelector('small').innerText = "*"+errmessage;
        parentDiv.querySelector('small').style.visibility = "visible"
        inputName.className = "form-control failed"
    }

    function setSuccess(inputName) {
        let parentDiv = inputName.parentElement;
        parentDiv.querySelector('small').style.visibility = "hidden"
        inputName.className = "form-control success"

        let email=document.getElementById("email").value;
        let pwOld=document.getElementById("pwCrnt").value;
        let pw=document.getElementById("pw2").value;
        user={email:email,pwOld:pwOld,pw:pw};

        //Update the password when success
        $.ajax({
                type: 'POST',
                data:user ,
                url: 'pwChangeBack.php'
            }).done(function (result) {
                //console.log(result);
                error.innerText="*"+result;
                error.style.visibility = "visible"
                if("Succesfully password updated"===result){
                    pwCrnt.value="";
                    pw1.value="";
                    pw2.value="";
                }
            }).fail(function () {
                alert("Something Went Wrong");
            });
    }
    
   </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
