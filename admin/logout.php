<?php
session_start();
if(isset($_SESSION['adminmail']) && !empty($_SESSION['adminmail']))
{
     session_destroy();
     session_unset($_SESSION['resp']);
     header('location:../index.php');
}
else
{
	header('location:../index.php');
}


?>