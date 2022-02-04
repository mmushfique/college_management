<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Courses</title>
    <?php
        include "header.php";
    ?>
</head>
<body>
    <br>
    <br>
    <br>
    <br>
<center><h1>View course details</h1></center>
   
   <div class="container">
            <div class="inner">
                <div class="row">
                <div class="col-md-3">
</div>
                <div class="col-md-6">
<center><table class="styled-table">
                            <thead>
                                <tr>
                                    <th scope="col">Course ID</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Duration</th>

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
                            </tr>";
                            }
                            ?>
                        
                            </tbody>
                        </table></center>
                        </div>

                        
</div>
</div>

<style>
    
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
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