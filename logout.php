<?php
session_start();
if(isset($_SESSION['schoollg']) && !empty($_SESSION['schoollg']))
{
     session_destroy();
     session_unset($_SESSION['resp']);
     header('location:index.php');
}
else
{
	header('location:index.php');
}


?>