<?php
include '../db.php';
session_start();
if(isset($_POST['adminlog']))
{
   $email = $_POST['email'];
   $pass  = $_POST['pass'];

   if(!empty($email) && !empty($pass))
   {

   	  $sql = "select * from `admin` WHERE email='$email' AND pass ='$pass'";
   	  $res = mysqli_query($conn, $sql);
   	  $row = mysqli_fetch_assoc($res);
   	  if($res && mysqli_num_rows($res) > 0)
   	  {

   	  if($row['email']==$email && $row['pass']==$pass)
   	  {
   	  	      $_SESSION['adminmail']=$email;
   	  	      //print_r($_SESSION['adminmail']);
   	  	      header('location:a-dashboard.php');
   	  }
   	  else
   	  {
   	  	echo "Login Failed";
   	  }
   	  }
   	  else
   	  {
   	  	echo "no record found";
   	  }

   }
   else
   {

   	 echo "Please Fill all the fields";
   }

}
else
{
	header('location:../index.php');
}


?>