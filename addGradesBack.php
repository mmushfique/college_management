
<?php
    include "dbCon.php";

    //Load all subjects when student is selected
    if(isset($_POST["stu"])){
        $student=$_POST["stu"];

        $sqlStu="SELECT * FROM student WHERE id='$student'";
        $resultStu=mysqli_query($con,$sqlStu);
        $rowStu=mysqli_fetch_array($resultStu) ;   
        $course=$rowStu[2];

        $sqlSub="SELECT code,name FROM subject WHERE course='$course'";
        $resultSub=mysqli_query($con,$sqlSub);
        $arrSub=array();
            while($rowSub=mysqli_fetch_array($resultSub)) {   
                $arrSub[]=$rowSub[0]."-".$rowSub[1];
                // foreach($rowStu as $row){
                //     $arr[]=$row;}
            }     
        echo json_encode($arrSub);

       
    //Check whether there is data in the related course table 
    } else if(isset($_POST["stud"])){
        
        $sub=$_POST["sub"];
        $subCode=explode("-",$sub);
        $sqlStu="SELECT * FROM subject WHERE code='$subCode[0]'";
        $resultStu=mysqli_query($con,$sqlStu);
        $rowStu=mysqli_fetch_array($resultStu); 

        $stud=$_POST["stud"];
        $cus=$rowStu[3];
        $year=$rowStu[4];
        $sem=$rowStu[5];

        //$sqlStu="SELECT studentID FROM `$cus` WHERE studentID='$stud'";
        $sqlStu="SELECT studentID FROM `$cus` WHERE yearno='$year' AND semester='$sem' AND studentID='$stud'";
        $resultStu=mysqli_query($con,$sqlStu);
        $data=mysqli_num_rows($resultStu); 
        echo $data;
    }
            //above are for ajax posts





        //save the grades of the student if any new grade is added
    else if(isset($_POST["btnSub"])){
        $subject=$_POST["subject"];
        $subCode=explode("-",$subject);
        $sqlYS="SELECT * FROM subject WHERE code='$subCode[0]'";
        $resultYS=mysqli_query($con,$sqlYS);
        $rowYS=mysqli_fetch_array($resultYS) ;
        $course=$rowYS[3];
        $year=$rowYS[4];
        $sem=$rowYS[5];

        $stuid=$_POST["student"];     
        $marks=$_POST["marks"];
        $marks=calGrade($marks); 

        $query="INSERT INTO `$course`(`yearno`,`semester`,`studentID`,`$subject`) VALUES('$year','$sem','$stuid','$marks');";
        mysqli_query($con,$query);
        header("Location:addGradesToStudent.php");
 

        //Update the grades of the student if any new grade is added or updated
    } else if(isset($_POST["btnUpd"])){
        $subject=$_POST["subject"];
        $subCode=explode("-",$subject);
        $sqlYS="SELECT * FROM subject WHERE code='$subCode[0]'";
        $resultYS=mysqli_query($con,$sqlYS);
        $rowYS=mysqli_fetch_array($resultYS) ;
        $course=$rowYS[3];
        $year=$rowYS[4];
        $sem=$rowYS[5];

        $stuid=$_POST["student"];
        $marks=$_POST["marks"];  
        $marks=calGrade($marks);

        $query="UPDATE `$course` SET `$subject`='$marks' WHERE studentID='$stuid' AND yearno='$year' AND semester='$sem'";
        mysqli_query($con,$query);
        header("Location:addGradesToStudent.php");
    }


// Calculate the grade///////////////////////////////////////
function calGrade($avg){
    if($avg>=0&&$avg<=30)
        $grade="F";
    else if($avg>=30&&$avg<=50)
        $grade="S";
    else if($avg>50&&$avg<=60)
        $grade="C";
    else if($avg>60&&$avg<=70)
        $grade="B";
    else if($avg>75&&$avg<=100)
        $grade="A";
        
    return $grade;
}


?>


