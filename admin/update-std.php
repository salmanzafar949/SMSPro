<?php
if(!isset($_SESSION['adminmail']))
{
	header('location:a-dashboard.php');
}
if(isset($_POST['saved']))
{
	 $id     = $_POST['id'];
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
     $batch  = $_POST['batchnumber'];
     $status = $_POST['status'];
     if(!empty($school))
     {
        if($S_type==$type)
        {
        	$sql = "UPDATE `students` SET school='$school',S_type='$S_type',sis='$sis',fname='$fname',dob='$dob',S_n='$S_n',M_n='$M_n',F_n='$F_n',Nlsh='$Nlsh',C_s='$C_s',P_name='$P_name',p_email='$p_email',p_no='$p_no',eng='$eng',maths='$maths',Nvr='$Nvr',total='$total',comm='$comm',res='$res',date='$date' WHERE id='$id'";
        	$res = mysqli_query($conn, $sql);
        	if($resp && mysqli_affected_rows($resp) > 0 )
      		{
           		 $_SESSION['resp']="Failed to update the Student info";
           		 header('location:a-dashboard.php');
          
       		}
            else
           {
              $_SESSION['resp']="Student info Updated Successfully";
              header('location:a-dashboard.php');
           }
 
        }
        else
        {
             header('location:a-dashboard.php');
        }
      }
      else
      {
      	header('location:a-dashboard.php');
      }

}
else
{
  header('location:index.php');
}
?>
