<?php
  include 'header.php';
  include 'db.php';
  if(!isset($_SESSION['schoollg']))
  {
  	header('location:school-login.php');
  }
?>

&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
<a href="#viewStudents" class="btn btn-info btn-lg" data-toggle="collapse">View Students</a>
<div id="viewStudents" class="collapse">
<table class="table table-striped table-hover" id="detailtable">
<thead>
  <tr>

    <th>Date</th>
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
    <th>Committee Result</th>
  </tr>
</thead>
<tbody>
<?php
        $id1 = $_SESSION['schoollg'];
       $sql = "SELECT * FROM `students` WHERE school='$id1'";
       $res = mysqli_query($conn, $sql);
       if($res && mysqli_num_rows($res) >0 )
       {
         while($row = mysqli_fetch_assoc($res))
         {
?>
  <tr>
   
  <td><?php echo $row['date'] ?></td>
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
  <td><?php if(!empty($row['sis'])){ echo $row['sis'] ;} else { echo "Private Student";} ?></th>
  <td><?php echo $row['dob'] ?></td>
  <td><?php echo $row['S_n'] ?></td>
  <td><?php echo $row['M_n'] ?></td>
  <td><?php echo $row['F_n'] ?></td>
  <td><?php echo $row['C_s'] ?></td>
  <td><?php echo $row['total'] ?></td>
  <td><?php echo $row['comm'] ?></td>
  <td><?php echo $row['res']; ?></td>
  <td><?php echo $row['batchno'] ?></td>
  <td><?php echo $row['status'] ?></td>
      </tr>
  <?php 
       }
     }
     else
     {
  ?>
           <h1 align="center">No Record found</h1>
   <?php
    }
   ?>
    </tbody>
  </table> 
   <button type="submit" name="download" id="dl" class="bnt btn-info pull-right btn-lg">Download</button>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/css/tableexport.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/js/tableexport.min.js"></script>
<script>
 $(document).on('click', '#dl', function(event){

  $("#detailtable").tableExport();
  console.log('hello');

 });