<?php
include '../header.php';
include '../db.php';
if(!isset($_SESSION['adminmail']))
{
	header('location:../index.php');
}
if(isset($_POST['Add']))
{
  $s_name = $_POST['school'];
  $Pemail = $_POST['Pemail'];
  $Cemail = $_POST['Cemail'];
  $SSemail = $_POST['SSemail'];

  if(!empty($s_name) && !empty($Pemail) && !empty($Cemail) && !empty($SSemail))
  {
          $sql = "SELECT * FROM `schools` WHERE schoolname='$s_name'";
          $res = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($res);
          if($res && mysqli_num_rows($res) > 0)
          {
          	      echo "<div class='alert alert-info'>";
                  echo "School has already been Registered";
                  echo "</div>";
                // if($row['schoolname'] == $s_name)
                // {
                //   echo "<div class='alert alert-info'>";
                //   echo "School has already been Registered";
                //   echo "</div>";
                // }
                // else
                // {
                      
                // }
          }
          else
          {
          	$sql1 = "INSERT INTO `schools`(schoolname, Pemail, Coordinator, SectorSpecialist) VALUES('$s_name','$Pemail', '$Cemail', '$SSemail')";
                      $res = mysqli_query($conn, $sql1);
                      if($res && mysqli_affected_rows($conn) > 0)
                      {
                             $_SESSION['resp']="School Added SuccessFully";
                             header('location:a-dashboard.php');
                      }
                      else
                      {
                             echo "<div class='alert alert-danger'>";
                             echo "Failed To Add School";
                             echo "</div>";
                      }
          	// echo '<div class="alert alert-danger">';
          	// echo "Ooops Something went wrong";
          	// echo "</div>";
          }
  }
  else
  {
     echo '<div class="alert alert-Danger">';
     echo "Please fill All the fields";
     echo '</div>';
  }
}
else
{
 header('location:../index.php');
}


?>
