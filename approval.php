<?php
session_start();
include 'db.php';
if(!isset($_SESSION['adminmail']))
{
    header('location:index.php');
}

if(isset($_POST['add-batch']))
{
    $id    = $_POST['id'];
    $batch = $_POST['batchnumber'];
    if(!empty($id) && !empty($batch))
    {
       $sql ="UPDATE `students` SET batchno ='$batch' WHERE id ='$id'";
       $res = mysqli_query($conn, $sql);
       if($res && mysqli_affected_rows($conn) > 0 )
       {
           $_SESSION['resp'] = "Batch no alloted to the student";
           header('location:admin/a-dashboard.php');
       }
       else
       {
           $_SESSION['resp'] = "Failed to allot batch no to the student";
           header('location:admin/a-dashboard.php');
       }
    }

}
elseif(isset($_POST['add-status']))
{
        $id    = $_POST['id'];
        $status = $_POST['status'];
        if(!empty($id) && !empty($status))
        {
           $sql ="UPDATE `students` SET status ='$status' WHERE id ='$id'";
           $res = mysqli_query($conn, $sql);
           if($res && mysqli_affected_rows($conn) > 0 )
           {
               $_SESSION['resp'] = "Status updated sucessfully";
               header('location:admin/a-dashboard.php');
           }
           else
           {
               $_SESSION['resp'] = "Failed to update the status";
               header('location:admin/a-dashboard.php');
           }
        }
}
else
{
    header('location:admin/a-dashboard.php');
}

?>