<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

</head>
<body>


        <header>

            <div class="toggle"></div>
            <ul class="navigation">

            
            

            <?php
                include "dbCon.php";
                session_start();
                if(!empty($_SESSION["role"])){
                  //This echo is to call the username and role
                        echo "<li><a href='index.php' style='--i:1;'>Home</a></li>";
                        echo "<li><a href='#'> Welcome&nbsp;<b> " .$_SESSION["user"]."</b></a></li>" ;
                        
                        
                    if(($_SESSION["role"])=="ADMIN"){
                      //echo for the ADMIN pages only
                      
                        echo "<li><a href='manageLecturer.php'>Manage Lecturer</a></li>";
                        echo "<li><a href='manageCourse.php'>Manage Courses</a></li>"; 
                        echo "<li><a href='manageSubject.php'>Manage Subjects</a></li>";                   
                    }
    
                    else if(($_SESSION["role"])=="LECTURER"){
                      //echo for the LECTURER pages only
                        echo "<li><a href='#' style='--i:1;'>Home</a></li>";
                        echo "<li><a href='manageSubject.php'>Manage Subjects</a></li>";
                        echo "<li><a href='manageStudent.php'>Manage Students</a></li>";
                        echo "<li><a href='addGradesTostudent.php'>Add Grades</a></li>";
                    }

                    ///echo for logout
                    echo " <li><a href='logout.php'>LOGOUT</a></li>";
                }
                else{
                  // echo if not logged in
                    echo  "<li><a href='index.php' style='--i:1;'>Home</a></li>
                           <li><a href='Blog.php' style='--i:2;'>Blog</a></li>
                           <li><a href='about.php' style='--i:3;'>About</a></li>
                           <li><a href='Contact_us.php' class='active' style='--i:4;'>Conact us</a></li>
                           <li><a href='viewCourses.php' style='--i:5;'>Courses</a></li>
                           <li><a href='viewGrades.php' style='--i:6;'>Results</a></li>
                           <li><a href='login.php' style='--i:7;'>Login</a> ";
                }
          
          ?>
         
              </ul>
  
        </header>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Nunito', sans-serif;
} 

/* section {
    position: relative;
    width: 100%;
    min-height: 100vh;
    padding: 80px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    overflow: hidden;
}  */

header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1000;
}

header .logo {
    position: relative;
    color: #ff5e8e;
    display: inline-block;
    font-size: 3em;
    text-decoration: none;
    font-weight: 800;
    letter-spacing: 0.5em;
    opacity: 0;
    animation: slide_left 0.5s linear forwards;
    animation-delay: 0.2s;
}

@keyframes slide_left {
    0% {
        transform: translateX(-100px);
        opacity: 0;
    }
    100% {
        transform: translateX(0px);
        opacity: 1;
    }
}

header ul {
    position: relative;
    display: flex;
}

header ul li {
    list-style: none;
}

header ul li a {
    display: inline-block;
    color: #0169b2;
    font-weight: 600;
    font-size: 1.1em;
    margin-left: 10px;
    display: inline-block;
    padding: 8px 18px;
    text-decoration: none;
    user-select: none;
    opacity: 0;
    animation: slide_top 0.5s linear forwards;
    animation-delay: calc(0.2s * var(--i));
}

@keyframes slide_top {
    0% {
        transform: translateY(100px);
        opacity: 0;
    }
    100% {
        transform: translateX(0px);
        opacity: 1;
    }
}

header ul li a.active,
header ul li a:hover {
    background: #0169b2;
    color: #fff;
    border-radius: 30px;
}
</style>
</body>
</html>
