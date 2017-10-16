<?php
  include '../db.php';
  include '../header.php';
  if(!isset($_SESSION['adminmail']))
  {
     header('location:a-dashboard.php');
  }

  if(isset($_GET['id']))
  {
        $id = $_GET['id'];
        if(!empty($id))
        {
           $get = "SELECT * FROM `students` WHERE id='$id'";
           $res = mysqli_query($conn, $get);
           if($res && mysqli_num_rows($res) > 0)
           {
                $row= mysqli_fetch_assoc($res);
           }
           else
           {
           	  $_SESSION['resp']="No Record Found..student not exist";
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
 <title>Student Detail View</title>
 <a href="a-dashboard.php" class="pull pull-left">Go back</a>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
        <th>Date</th>
        <th>Full Name</th>
        <th>Committee Result</th>
        <th>Professional stream School</th>
        <th>SIS Number</th>
        <th>Date of birth</th>
        <th>Students Nationality</th>
        <th>Mothers Nationality</th>
        <th>Fathers Nationality</th>
        <th>Current School name</th>
        <th>Test Results-total</th>
        <th>Interview Comments</th>
        <th>Result</th>
        <th>Batch No</th>
        <th>Parents Name</th>
        <th>Parents Email</th>
        <th>Parents No</th>
        <th>English</th>
        <th>Maths</th>
        <th>Non Verbal Reasoning</th>
        
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $row['date'] ?></td>
      <td><?php echo $row['fname'] ?></td>
      <td><?php
               $id   = $row['school']; 
               $sc   = "SELECT schoolname from `schools` WHERE id='$id'";
               $resp = mysqli_query($conn, $sc);
               if($resp && mysqli_num_rows($res) > 0 )
               {
                   $schoolname = mysqli_fetch_assoc($resp);
                   echo $schoolname['schoolname'];
               }  
       ?></td>
      <td><?php if(!empty($row['sis'])){ echo $row['sis'] ;} else { echo "Private Student";} ?></td>
      <td><?php echo $row['dob'] ?></td>
      <td><?php echo $row['S_n'] ?></td>
      <td><?php echo $row['M_n'] ?></td>
      <td><?php echo $row['F_n'] ?></td>
      <td><?php echo $row['C_s'] ?></td>
      <td><?php echo $row['total'] ?></td>
      <td><?php echo $row['comm'] ?></td>
      <td><?php echo $row['res']; ?></td>
      <td><?php if(!empty($row['batchno'])){echo $row['batchno'];} else{ echo "Pending"; } ?></td>
      <td><?php if(!empty($row['status'])){echo $row['status'];} else{ echo "Pending"; } ?></td>
      <td><?php echo $row['P_name']; ?></td>
      <td><?php echo $row['p_email']; ?></td>
      <td><?php echo $row['p_no']; ?></td>
      <td><?php echo $row['eng']; ?></td>
      <td><?php echo $row['maths']; ?></td>
      <td><?php echo $row['Nvr']; ?></td>
    </tr>
     </tbody>
</table> 