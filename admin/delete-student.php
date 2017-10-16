<?php

include '../db.php';
session_start();
if(!isset($_SESSION['adminmail']))
{
   header('location:../index.php');
}

if(isset($_GET['id']))
{ 
   

	$id = $_GET['id'];
	// echo $id;
	// die();
    if(!empty($id))
    {
	 $del  ="DELETE FROM `students` WHERE id='$id'";
	 $resp =mysqli_query($conn, $del);
	 if($resp && mysqli_affected_rows($res) > 0)
	 {
          $_SESSION['resp']="Record Not Found";
          header('location:a-dashboard.php');
	 } 
	 else
	 {
         
         $_SESSION['resp']="Student Deleted SuccessFully";
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

?>