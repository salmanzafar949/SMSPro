<?php
include 'header.html';
session_start();
if(!isset($_SESSION['schoolmail']))
{
	header('location:login.php');
}
?>