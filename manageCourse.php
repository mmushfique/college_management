<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Manage Courses</title>
    
    <?php
        include "header.php";
    ?>
    
    <!--*******************PHP codes to manage course********************************-->
    <?php
        //include "dbCon.php";
        //session_start();
        $record[0]=null;$record[1]=null;$record[2]=null;

        //Search button
        if(isset($_POST["btnSearch"])){ 
            $id=$_POST["searchid"];                          
            $sql="SELECT * FROM course WHERE id='$id' OR name='$id'";
            $result=mysqli_query($con, $sql);
            $record=mysqli_fetch_array($result);
        }

        //Save button
        else if(isset($_POST["btnSub"])){
            $id=$_POST["id"];
            $name=$_POST["name"];
            $dur=$_POST["dur"]; 
            $query="INSERT INTO course VALUES('$id','$name','$dur');";
            mysqli_query($con,$query);
            $sql="CREATE TABLE `$name` (yearno VARCHAR(10) NOT NULL,
            semester VARCHAR(10) NOT NULL,studentID varchar(20) NOT NULL, PRIMARY KEY (yearNo,semester,studentID));";
            mysqli_query($con,$sql);
         }

         //when edit is pressed set values to the textboxes
        else if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql="SELECT * FROM course WHERE id='$id'";
            $result=mysqli_query($con, $sql);
            $record=mysqli_fetch_array($result);
        }

        //Delete button
        else if(isset($_GET["DelID"])){
        $id=$_GET["DelID"];
        //select the name of the deleting course
        $select="SELECT name FROM course WHERE id='$id'";
        $result=mysqli_query($con,$select);
        $re=mysqli_fetch_array($result);
        $course=$re[0];   

        //Delete the course
        $query="DELETE FROM course WHERE id='$id'";
        mysqli_query($con,$query);

        //delete the complete course table
        $sql="DROP TABLE `$course`";
        mysqli_query($con,$sql);

         //delete students following the course 
         $sqlStu="DELETE FROM student WHERE course='$course'";
         mysqli_query($con,$sqlStu);

        }

        //Update button
        else if(isset($_POST["btnUpd"])){
        $id=$_POST["id"];
        $name=$_POST["name"];
        $dur=$_POST["dur"];         
        $query="UPDATE course SET id='$id',name='$name',dur='$dur' WHERE id='$id'";
        mysqli_query($con,$query);
    }

    else if(isset($_POST["btnClr"])){
        $record[0]=null;$record[1]=null;$record[2]=null;
    }
        
    //Check whether user is logged in to the system and let to the page
    if(($_SESSION["role"])=="ADMIN"){
    ?>


     <!--************************Design begins of manage course*******************-->
</head>
<body>
  <br>
  <br>
  <br>
  <br>
<center><h1>Manage Course</h1></center>

       <form class="form-inline" action="manageCourse.php" method="post">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="searchid" style="margin-left:110px">
            <input id="button" type="submit" value="SUBMIT" name="btnSearch">
        </form>
            
   
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-md-3">
                        <h3> Add Course</h3>
                        <form action="manageCourse.php" method="post">
                            <div class="form-group">
                                <label>Course ID</label>
                                <input class="form-control"  type="number" place-holder="Course ID" required name="id" id="idCus" value='<?php echo $record[0]?>'>
                                <small id="error"></small>
                              </div>
                            <div class="form-group">
                                <label>Course name</label>
                                <input class="form-control"  place-holder="Course Name" required name="name" value='<?php echo $record[1]?>'>
                            </div>
                            <div class="form-group">
                                <label>Duration</label>
                                <input class="form-control"  place-holder="Course Duration" required name="dur" value='<?php echo $record[2]?>'>
                            </div>
                            
                            <a href="#"  value="save" class="btn0 btn-white0 btn-animate0"><button name="btnSub" id="btnSub" type="submit" style="background: transparent;border: 5px solid transparent" >SAVE</button></a>
                            <a href="#"  value="update" class="btn1 btn-white1 btn-animate1"><button name="btnUpd" id="btnUpd" type="submit" style="background: transparent;border: 5px solid transparent">UPDATE</button></a>
                            <a href="#" value="reset" class="btn2 btn-white2 btn-animate2"><button  name="btnClr" type="submit" style="background: transparent;border: 5px solid transparent">RESET</button></a>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <h3 class="CIFD">Course Information From Database</h3>
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th scope="col">Course ID</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                            <!--Display the course details in the table-->
                           <?php
                            $sql="SELECT * FROM course";
                            $result=mysqli_query($con, $sql);
                            while($row=mysqli_fetch_array($result)){
                                echo "<tr>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[2]</td>
                                <td><a href='manageCourse.php?id=$row[0]'>Edit</a></td>
                                <td><a href='manageCourse.php?DelID=$row[0]'>Delete</a></td>
                                </tr>";
                            }
                            ?>

                            </tbody>
                        </table>
</div>
</div>
</div>
</div>

    
<style>
        * {
            font-family: 'Roboto', sans-serif;
        }


        input[type="submit"] {
            outline: none;
            height: 40px;
            text-align: center;
            width: 130px;
            margin-left: 10px;
            border-radius: 40px;
            background: #fff;
            border: 2px solid #1ecd97;
            color: #1ecd97;
            letter-spacing: 1px;
            text-shadow: 0;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        input[type="submit"]:hover {
            color: white;
            background: #1ecd97;
        }

        input[type="submit"]:active {
            letter-spacing: 2px;
        }

        .onclic {
            width: 40px;
            border-color: #bbb;
            border-width: 3px;
            font-size: 0;
            border-left-color: #1ecd97;
            animation: rotating 2s 0.25s linear infinite;
        }

        .onclic:after {
            content: "";
        }

        .onclic:hover {
            color: #1ecd97;
            background: white;
        }

        .validate {
            font-size: 13px;
            color: white;
            background: #1ecd97;
        }

        .validate:after {
            font-family: 'FontAwesome';
            content: "\f00c";
        }

        @keyframes rotating {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

</style>

<!-- ##############################################################
############################################################## -->

<style>  
    
.CIFD
    {
      margin-left: 70px;
    }
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    margin-left: 70px;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

</style>

<!-- ##############################################################
############################################################## -->

<style>


.btn0:link,
.btn0:visited {
  text-transform: uppercase;
  text-decoration: none;
  padding: 5px 10px;
  text-align-last: center;
  display: inline-block;
  margin-left: -30px;
  border-radius: 100px;
  transition: all 0.2s;
  height: 40px;
  width: 100px;
  position: absolute;
}

.btn0:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.btn0:active {
  transform: translateY(-1px);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.btn-white0 {
  background-color: #2ACAEA;
  color: #444444;
}

.btn0::after {
  content: "";
  display: inline-block;
 height: 40px;
  width: 100px;
  text-align-last: center;
  border-radius: 100px;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  transition: all 0.4s;
}

.btn-white0::after {
  background-color: #fff;
}

.btn0:hover::after {
  transform: scaleX(1.4) scaleY(1.6);
  opacity: 0;
}

.btn-animated0 {
  -webkit-animation: moveInBottom 5s ease-out;
          animation: moveInBottom 5s ease-out;
  -webkit-animation-fill-mode: backwards;
          animation-fill-mode: backwards;
}

@-webkit-keyframes moveInBottom {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0px);
  }
}

@keyframes moveInBottom {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0px);
  }
}
</style>

<!-- ##############################################################
############################################################## -->

<style>


.btn1:link,
.btn1:visited {
  text-transform: uppercase;
  text-decoration: none;
  margin-left: 75px;
 text-align-last: center;
 padding: 5px 10px;
   height: 40px;
  width: 100px;
  display: inline-block;
  border-radius: 100px;
  transition: all 0.2s;
  position: absolute;
}

.btn1:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.btn1:active {
  transform: translateY(-1px);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.btn-white1 {
  background-color: #2ACAEA;
  color: #444444;
}

.btn1::after {
  content: "";
  display: inline-block;
  text-align-last: center;
  height: 40px;
  width: 100px;
  border-radius: 100px;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  transition: all 0.4s;
}

.btn-white1::after {
  background-color: #fff;
}

.btn1:hover::after {
  transform: scaleX(1.4) scaleY(1.6);
  opacity: 0;
}

.btn-animated1 {
  -webkit-animation: moveInBottom 5s ease-out;
          animation: moveInBottom 5s ease-out;
  -webkit-animation-fill-mode: backwards;
          animation-fill-mode: backwards;
}

@-webkit-keyframes moveInBottom {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0px);
  }
}

@keyframes moveInBottom {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0px);
  }
}
</style>

<!-- ##############################################################
############################################################## -->

<style>


.btn2:link,
.btn2:visited {
  text-transform: uppercase;
  margin-left: 180px;
  text-decoration: none;
  text-align-last: center;
  padding: 5px 10px;
  display: inline-block;
   height: 40px;
  width: 100px;
  border-radius: 100px;
  transition: all 0.2s;
  position: absolute;
}

.btn2:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.btn2:active {
  transform: translateY(-1px);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.btn-white2 {
  background-color: #2ACAEA;
  color: #444444;
}

.btn2::after {
  content: "";
  display: inline-block;
   height: 40px;
  width: 100px;
  border-radius: 100px;
  text-align-last: center;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  transition: all 0.4s;
}

.btn-white2::after {
  background-color: #fff;
}

.btn2:hover::after {
  transform: scaleX(1.4) scaleY(1.6);
  opacity: 0;
}

.btn-animated2 {
  -webkit-animation: moveInBottom 5s ease-out;
          animation: moveInBottom 5s ease-out;
  -webkit-animation-fill-mode: backwards;
          animation-fill-mode: backwards;
}

@-webkit-keyframes moveInBottom {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0px);
  }
}

@keyframes moveInBottom {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0px);
  }
}
</style>

</style>

<?php
    }   //closed the if statement of the if statement checking the logged user
    else{
        header("Location:error.html");
    }
   ?>

<!-- <script>

btnSub.addEventListener('click', function (e) {
  e.preventDefault();
error.style.visibility = "hidden"

if (Number.isInteger(id.value)) setSuccess(id); 
else    setError(id, "Use integer values", e);


function setError(inputName, errmessage, e) {
    e.preventDefault();
    error.innerText = "*"+errmessage;
    error.style.visibility = "visible"
    inputName.className = "form-control failed"
}

function setSuccess(inputName) {
    error.style.visibility = "hidden"
    inputName.className = "form-control success"
}
});

btnUpd.addEventListener('click', function (e) {
  e.preventDefault();
error.style.visibility = "hidden";

if (Number.isInteger(idCus.value)) setSuccess(idCus); 
else    setError(idCus, "Use integer values", e);


function setError(inputName, errmessage, e) {
    e.preventDefault();
    error.innerText = "*"+errmessage;
    error.style.visibility = "visible";
    inputName.className = "form-control failed";
}

function setSuccess(inputName) {
    error.style.visibility = "hidden";
    inputName.className = "form-control success";
}
});

</script> -->
</body>
</html>
