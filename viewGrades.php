<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Results</title>
    <?php
        include "header.php";
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
                
                    <form action="viewGrades.php" method="post">
                
                        <!-- Select student -->
                        <div class="form-group" id="stuDiv">
                        <label>Select your registration number</label>
                        <select class="form-control" name="student" id="student" >
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
                                <select class="form-control" name="sem">
                                <option></option>
                                <option>First semester</option>
                                <option>Second semester</option>
                                 </select>
                            </div>
                        <input id="button" type="submit" value="Search" name="btnSearch">

                   
                    </form>
</div>


                <div class="col-md-6">
                <h1 class="yr">Your results</h1>
                        <?php
                         if(isset($_POST["btnSearch"])){
                            $student=$_POST["student"];
                            $year=$_POST["year"];
                            $sem=$_POST["sem"];     
                        ?>
                        
                        <table class="styled-table">
                            <thead>
                                <tr>
                                   <?php 
                                   echo "<center><h3>".$student."</h3></center>";
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
                                //echo "<th scope='col'>".$row[0]."-".$row[1]."</th>";
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
                                echo "<tr><td>Register No</td><td>".$rowStu['studentID']."</td></tr>";
                                foreach($subjectsArr as $s){
                                    echo "<tr><td>".$s."</td>";
                                    echo "<td>".$rowStu[$s]."</td></tr>";
                                }
                            }

                         } else{
                                echo "<h3>No marks updated yet</h3>";
                            }
                           
                           

                         } //closed if statement
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

<style>
    
    .yr
    {
        margin-left: 50px;
    }

    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    margin-left: 50px;
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
</body>
</html>