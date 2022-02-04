<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View grades</title>
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
                    <!-- Select student -->
                    <div class="form-group" >
                        <label>Filter results by</label>
                        <select class="form-control" id="filter"  onChange="filterFunc()">
                            <option></option>
                            <option>Student</option>
                            <option>Subject</option>
                        </select>
                    </div> 
                    </div>
                    </div>

 <div class="row" > 
<!--*****************************************Student*****************************************-->

<div class="col-md-3" id="studentFilter">
<form action="lecturerViewGrade.php" method="post">
                
                <!-- Select student -->
                <div class="form-group" id="stuDiv">
                <label>Select registration number</label>
                <select class="form-control" name="student" id="student" required>
                    <?php
                        echo "<option></option>";
                        $sqlStu="SELECT id FROM student";
                        $resultStu=mysqli_query($con,$sqlStu);
                        while($rowStu=mysqli_fetch_array($resultStu)) {    
                            echo "<option>$rowStu[0]</option>";
                        }
                    ?>
                    </select>
                </div> 
                <div class="form-group">
                                <label>Select for which year</label>
                                <select class="form-control" name="year" required>
                                <option></option>
                                <option>First year</option>
                                <option>Second year</option>
                                <option>Third year</option>
                                <option>Fourth year</option>
                                <option>Fifth year</option>
                                 </select>
                            </div>
                            <div class="form-group">
                                <label>Select for which semester</label>
                                <select class="form-control" name="sem" required>
                                <option></option>
                                <option>First semester</option>
                                <option>Second semester</option>
                                 </select>
                            </div>
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit"  value="Search" name="btnSearchStu">
            </form>


            </div> 
<div class="col-md-6" id="table" >
                
<?php
                         if(isset($_POST["btnSearchStu"])){
                            $student=$_POST["student"];
                            $year=$_POST["year"];
                            $sem=$_POST["sem"];     
                        ?>
                        
                        <table class="styled-table" >
                            <thead class="bg-light">
                                <tr>
                                   <?php 
                                   echo "<h3 class='CIFD'>".$student."</h3>";
                                    ?>
                                    
                         </tr>
                        <?php
                            //get the course of the student
                            $sql="SELECT * FROM student WHERE id='$student'";
                            $result=mysqli_query($con,$sql);
                            $row=mysqli_fetch_array($result) ;   
                            $course=$row[2];

                           $sqlSub="SELECT * FROM subject WHERE yearno='$year' AND semester='$sem' AND course='$course'";
                           $reSub=mysqli_query($con,$sqlSub);
                           $subjectsArr=array();
                            while($row = mysqli_fetch_array($reSub)){
                                $subjectsArr[]=$row[0]."-".$row[1];
                            } 
                        ?>
                        
                            <tbody>
                            
                        
                            <?php
                            //get the course of the student
                            $sql="SELECT * FROM student WHERE id='$student'";
                            $result=mysqli_query($con,$sql);
                            $row=mysqli_fetch_array($result) ;   
                            $course=$row[2];

                            //To display the specific semester of a given student
                            $sqlStuData="SELECT * FROM `$course` WHERE yearno='$year' AND semester='$sem' AND studentID='$student'";
                            $result=mysqli_query($con,$sqlStuData); 
                            if(mysqli_num_rows($result)){
                            while($rowStu = mysqli_fetch_assoc($result)){
                                
                                echo "<tr><td>Year</td><td>".$rowStu['yearno']."</td></tr>";  
                                echo "<tr><td>Semester</td><td>".$rowStu['semester']."</td></tr>";
                                echo "<tr><td>Year</td><td>".$rowStu['studentID']."</td></tr>";
                                foreach($subjectsArr as $s){
                                    echo "<tr><td>".$s."</td>";
                                    if(isset($rowStu[$s])){
                                        echo "<td>".$rowStu[$s]."</td></tr>";
                                    }
                                    else{
                                        echo "<td>Marks not assigned</td>";
                                    }
                                }
                            }

                         } else{
                                echo "<h3 class='CIFD'>No marks updated yet</h3>";
                            }
                           
                           

                         } //closed if statement
                            ?> 
                            
                             </tbody>
                        </table>
  

                </div>
                        </div>
<!--*****************************************Student end*****************************************-->
<!--*****************************************Subject*****************************************-->

<div class="col-md-3" id="subjectFilter">
<form action="lecturerViewGrade.php" method="post">
                
                <!-- Select student -->
                <div class="form-group" >
                <label>Select subject</label>
                <select class="form-control" name="subject" id="subject" required>
                    <?php
                        echo "<option></option>";
                        $sqlSub="SELECT * FROM subject";
                        $resultSub=mysqli_query($con,$sqlSub);
                        while($rowSub=mysqli_fetch_array($resultSub)) {    
                            echo "<option>$rowSub[0]-$rowSub[1]</option>";
                        }
                    ?>
                    </select>
                </div> 
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit"  value="Search" name="btnSearchSub">
            </form>


            </div> 
<div class="col-md-6" id="table2">
                
                        <?php
                         if(isset($_POST["btnSearchSub"])){
                            $subject=$_POST["subject"];
                            $subCode=explode("-",$subject);
                            //get the course of the student
                            $sql="SELECT * FROM subject WHERE code='$subCode[0]'";
                                $result=mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($result);  
                                    $course=$row[3]; 
                                    $year=$row[4];
                                    $sem=$row[5];                             
                        ?>
                        
                        <table class="styled-table">
                            <thead class="bg-light">
                                <tr>
                                    <?php echo "<h3 class='CIFD'>".$subject."</h3>"?>
                                </tr>
                                <tr>
                                <th scope="col">StudentID</th>
                                <th scope="col">Result</th>

                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            //To dispaly all the results of a given student
                            $sqlStuData="SELECT * FROM `$course` WHERE yearno='$year' AND semester='$sem'";
                            $result=mysqli_query($con,$sqlStuData);
                            if(mysqli_num_rows($result)){
                           
                                while($rowSub=mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                            echo "<td>".$rowSub["studentID"]."</td>";
                                        if(isset($rowSub[$subject])){
                                            echo "<td>".$rowSub[$subject]."</td>";
                                        }else{
                                            echo "<td>Marks not assigned</td>";
                                        }
                                    echo "</tr>";
                                } 
                            } else{
                                echo "<h3 class='CIFD'>No marks updated yet</h3>";
                            }
                            
                         } //closed if statement
                            ?>
                        </tbody>
                        </table>
  

                </div>
                        </div>





<!--*****************************************Subject end*****************************************-->



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




<script>
    function display(){
        studentFilter.style.display = "none";
        subjectFilter.style.display = "none";
        
    }
    display();

    function filterFunc(){
   
    let category=filter.options[filter.selectedIndex].value;
    if(category=="Student") {
        display();
        table2.style.display = "none";
        studentFilter.style.display = "inline";
    }else if(category=="Subject") {
        display();
        table.style.display = "none";
        subjectFilter.style.display = "inline";
    }

} 
    </script>



    <?php
    }   //closed the if statement of the if statement checking the logged user
    else{
        header("Location:error.html");
    }
   ?>
</body>
</html>