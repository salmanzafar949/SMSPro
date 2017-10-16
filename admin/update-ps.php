<?php
  include '../db.php';
  session_start();
  if(!isset($_SESSION['adminmail']))
  {
  	header('location:a-dashboard.php');
  }

  if(isset($_POST['update']))
  {
  	$id      = $_POST['id'];
  	$s_name  = $_POST['school'];
  	$Pemail  = $_POST['Pemail'];
  	$Cemail	 = $_POST['Cemail'];
  	$SSemail = $_POST['SSemail'];
  	$pass    = $_POST['pass'];
  	if(!empty($id) && !empty($s_name) && !empty($Pemail) && !empty($Cemail) && !empty($SSemail) && !empty($pass))
  	{
       $updt = "UPDATE `schools` SET schoolname='$s_name', Pemail ='$Pemail', Coordinator='$Cemail', SectorSpecialist='$SSemail', pass='$pass' WHERE id='$id'";
       $resp = mysqli_query($conn, $updt);
       if($resp && mysqli_affected_rows($resp) > 0 )
       {
            $_SESSION['resp']="Failed to update the School info";
            header('location:a-dashboard.php');
          
       }
       else
       {
          $_SESSION['resp']="School info Updated Successfully";
          header('location:a-dashboard.php');
       }
  	}
  	else
  	{
  		header('location:edit-school-details.php');
  	}
  }
  else
  {
  	header('location:a-dashboard.php');
  }
?>