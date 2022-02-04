<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add grades</title>
    <?php
        include "header.php";
        $record[0]=null;$record[1]=null;$record[2]=null;
     //Check whether user is logged in to the system and let to the page
    if(($_SESSION["role"])=="LECTURER"){
    ?>

    <!--************************Design begins of add Grades*******************-->
</head>
<body>
<br>
    <br>
    <br>
    <br>
<form action="addGradesBack.php" method="POST">
   <center><h1>Add grades to the student.</h1></center>
   
   <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                    <h3> Add Grades</h3>

                    <form action="addGradesBack.php" method="POST">
                        <!-- Select student -->
                        <div class="form-group" >
                        <label>Select registration number</label>
                        <select class="form-control" name="student" id="stu" onChange="stuSelected()">
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
                        

    <!-- Select subject -->
    <div class="form-group" id="subDiv">
    </div> 


    <div class="form-group" id="markDiv">
    
</div>


    </div><!--  close cloumn div-->
</div>
</div>
        </form>



    <?php
    }   //closed the if statement of the if statement checking the logged user
    else{
        header("Location:error.html");
    }
   ?>

    <script src="grades.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>