<?php
include '../db.php';
session_start();
if(isset($_POST['schoollog']))
{
   $email = $_POST['email'];
   $pass  = $_POST['pass'];

   if(!empty($email) && !empty($pass))
   {

   	  $sql = "select * from `schools` WHERE email='$email' AND pass ='$pass'";
   	  $res = mysqli_query($conn, $sql);
   	  $row = mysqli_fetch_assoc($res);
   	  if($res && mysqli_num_rows($res) > 0)
   	  {

   	  if($row['email']==$email && $row['pass']==$pass)
   	  {
   	  	      $_SESSION['schoolmail']=$email;
   	  	      //print_r($_SESSION['adminmail']);
   	  	      header('location:dashboard.php');
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
	header('location:admin.php');
}


?>