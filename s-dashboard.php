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
  <td><?php if(!empty($row['batchno'])){echo $row['batchno'];} else{ echo "Pending"; } ?></td>
  <td><?php if(!empty($row['status'])){echo $row['status'];} else{ echo "Pending"; } ?></td>
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
  <script src="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script>
  $(document).ready(function() {
      $('#detailtable').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              // 'copy', 'csv', 'excel', 'pdf', 'print'
              'excel'
          ]
      } );
  } );


 // $(document).on('click', '#download', function(event){

 //  $("#detailtable").tableExport();

 // });
</script>