<?php  
include 'db.php';
include 'header.php';
if(isset($_POST['saved']))
{
     $school = $_POST['school'];
     $S_type = $_POST['S_type'];
     $sis    = $_POST['sis'];
     $fname  = $_POST['fname'];
     $dob    = $_POST['dob'];
     $S_n    = $_POST['S_n'];
     $M_n    = $_POST['M_n'];
     $F_n    = $_POST['F_n'];
     $Nlsh   = $_POST['Nlsh'];
     $C_s    = $_POST['C_s'];
     $P_name = $_POST['P_name'];
     $p_email= $_POST['p_email'];
     $p_no   = $_POST['p_no'];
     $eng    = $_POST['eng'];
     $maths  = $_POST['maths'];
     $Nvr    = $_POST['Nvr'];
     $total  = $_POST['total'];
     $comm   = $_POST['comm'];
     $res    = $_POST['res'];
     $date   = date('Y/m/d');
     $type   = "public"; 

     if(!empty($school))
     {
        if($S_type==$type)
        {
                if(!empty($sis))
                {
                   $select = "SELECT * FROM `students` WHERE sis ='$sis'";
                   $resp = mysqli_query($conn, $select);
                   if($resp && mysqli_num_rows($resp) > 0 )
                   {
                     $_SESSION['succ']="Student with the same Sis already exist";
                     header('location:index.php');
                   }
                   else
                   {

                    $sql = "INSERT INTO `students`(school,S_type,sis,fname,dob,S_n,M_n,F_n,Nlsh,C_s,P_name,p_email,p_no,eng,maths,Nvr,total,comm,res,date) VALUES('$school','$S_type','$sis','$fname','$dob','$S_n','$M_n','$F_n','$Nlsh','$C_s','$P_name','$p_email','$p_no',
                    '$eng','$maths','$Nvr','$total','$comm','$res','$date')";
                    $res = mysqli_query($conn, $sql);
                    if($res &&  mysqli_affected_rows($conn) > 0 )
                    {
                             $_SESSION['succ']="You Application has been submited successfully";
                             header('location:index.php');
                    }
                    else
                    {
                                       $_SESSION['succ']="Failed to submit the Apllication";
                                        header('location:index.php');
                    }
                   }
                }
                else
                { 
                    $_SESSION['succ']="Sis Cannot be empty";
                    header('location:index.php');
                }
        }
        else
        {
            $sql = "INSERT INTO `students`(school,S_type,sis,fname,dob,S_n,M_n,F_n,Nlsh,C_s,P_name,p_email,p_no,eng,maths,Nvr,total,comm,res,date) VALUES('$school','$S_type','$sis','$fname','$dob','$S_n','$M_n','$F_n','$Nlsh','$C_s','$P_name','$p_email','$p_no',
            '$eng','$maths','$Nvr','$total','$comm','$res','$date')";
            $res = mysqli_query($conn, $sql);
            if($res &&  mysqli_affected_rows($conn) > 0 )
            {
                      $_SESSION['succ']="You Application has been submited successfully";
                      header('location:index.php');
            }
            else
            {
               $_SESSION['succ']="Failed to submit the Apllication";
               header('location:index.php');
            }
        }
     }
     else
     {
       echo "<div class='alert alert-danger'>";
       echo " Fill all the fields";
       echo "</div>";
     }

}
else
{
  header('location:index.php');
}


?>