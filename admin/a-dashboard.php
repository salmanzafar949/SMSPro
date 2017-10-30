<?php
include '../header.php';
include '../db.php';
if(!isset($_SESSION['adminmail']))
{
	header('location:../index.php');
}
?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/css/tableexport.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/js/tableexport.min.js"></script> -->
<div class="container">
   <h2> Admin Dashboard </h2>
   <div class="alert alert-success" id="response" <?php if(@empty($_SESSION['resp']) && !@isset($_SESSION['resp'])) {?> style="display:none" <?php 
 }?>>
     <?php
        if(!@empty($_SESSION['resp'] && @isset($_SESSION['resp'])))
        {
              print_r($_SESSION['resp']);
        }
     ?>
   </div>
  </diV>

  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
  <a href="#demo" class="btn btn-info btn-lg" data-toggle="collapse">Add Professional School stream</a>
  
  <div id="demo" class="collapse"> <br>
    <!-- Button trigger modal -->
    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<button type="button" class="btn btn-primary btn-lg" align="center" data-toggle="modal" data-target="#myModal">
  View Schools
</button> <br>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">School List</h4>
      </div>
      <div class="modal-body">
      <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>sr#</th>
      <th>School Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
   <?php
    $i =0;
     $sql = "SELECT * FROM `schools`";
     $res = mysqli_query($conn, $sql);
     if($res && mysqli_num_rows($res) > 0)
     {
       while($row=mysqli_fetch_assoc($res))
       {
         $i++;
        ?>
        
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php  echo $row['schoolname']; ?></td>
      <td><a href="edit-school-details.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Edit</a> <a href="delete-school-details.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php

       }
     }
   ?>
    </tbody>
</table>
      </div>
    </div>
  </div>
</div> 
<br>
     <form class="form-horizontal" action="Add-ps.php" method="post">
       <fieldset>
        <div class="form-group">
          <label for="inputSchooName" class="col-lg-2 control-label">School Name</label>
          <div class="col-lg-10">
            <input type="text" name="school" class="form-control" id="inputEmail" placeholder="School Name" required>
          </div>
        </div>
         <div class="form-group">
           <label for="inputEmail" class="col-lg-2 control-label">Pricinpal Email</label>
           <div class="col-lg-10">
             <input type="email" name="Pemail" class="form-control" id="inputEmail" placeholder="Email" required>
           </div>
         </div>
         <div class="form-group">
           <label for="inputCoordinator" class="col-lg-2 control-label">Coordinator</label>
           <div class="col-lg-10">
             <input type="email" name="Cemail" class="form-control" id="inputPassword" placeholder="Email"  required>
           </div>
         </div>
         <div class="form-group">
           <label for="inputSectorSpecailist" class="col-lg-2 control-label">Sector Specialist</label>
           <div class="col-lg-10">
             <input type="email" name="SSemail" class="form-control" id="inputPassword" placeholder="Email"  required>
           </div>
         </div>
         <div class="form-group">
           <label for="inputSectorSpecailist" class="col-lg-2 control-label">School Password</label>
           <div class="col-lg-10">
             <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="password"  required>
           </div>
         </div>
         <div class="form-group">
           <div class="col-lg-10 col-lg-offset-2">
             <button type="reset" class="btn btn-default">Cancel</button>
             <button type="submit" name="Add" class="btn btn-primary">Save</button>
           </div>
         </div> <br>
         <div class="form-group" id="emls">
           <label for="inputSectorSpecailist" class="col-lg-2 control-label">CC</label>
           <div class="col-lg-10">
             <input type="email" name="emails" id="emails" multiple class="form-control" id="inputPassword" placeholder="Email"  required>
           </div>
         </div>
       </fieldset>
     </form>
  </div>
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
        <th>View/Edit</th>
      </tr>
    </thead>
    <tbody>
    <?php
           $sql = "SELECT * FROM `students`";
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
      <td>
         <form action="../approval.php" method="post">
         <input type="hidden" value="<?php echo $row['id']?>" name="id">
         <select name="batchnumber" class="form-control" required>
          <option value="">selectone</option>
                <option value="Batch 1" <?php if($row['batchno']=="Batch 1"){ echo "Selected";} ?>>Batch 1</option>
                <option value="Batch 2" <?php if($row['batchno']=="Batch 2"){ echo "Selected";} ?>>Batch 2</option>
                <option value="Batch 3" <?php if($row['batchno']=="Batch 3"){ echo "Selected";} ?>>Batch 3</option>
                <option value="Batch 4" <?php if($row['batchno']=="Batch 4"){ echo "Selected";} ?>>Batch 4</option>
                <option value="Batch 5" <?php if($row['batchno']=="Batch 5"){ echo "Selected";} ?>>Batch 5</option>
                <option value="Batch 6" <?php if($row['batchno']=="Batch 6"){ echo "Selected";} ?>>Batch 6</option>
                <option value="Batch 7" <?php if($row['batchno']=="Batch 7"){ echo "Selected";} ?>>Batch 7</option>
                <option value="Batch 8"<?php if($row['batchno']=="Batch 8"){ echo "Selected";} ?>>Batch 8</option>
                <option value="Batch 9" <?php if($row['batchno']=="Batch 9"){ echo "Selected";} ?>>Batch 9</option>
                <option value="Batch 10" <?php if($row['batchno']=="Batch 10"){ echo "Selected";} ?>>Batch 10</option>
                <option value="Batch 11" <?php if($row['batchno']=="Batch 11"){ echo "Selected";} ?>>Batch 11</option>
                <option value="Batch 12" <?php if($row['batchno']=="Batch 12"){ echo "Selected";} ?>>Batch 12</option>
                <option value="Batch 13" <?php if($row['batchno']=="Batch 13"){ echo "Selected";} ?>>Batch 13</option>
                <option value="Batch 14" <?php if($row['batchno']=="Batch 14"){ echo "Selected";} ?>>Batch 14</option>
                <option value="Batch 15" <?php if($row['batchno']=="Batch 15"){ echo "Selected";} ?>>Batch 15</option>
                <option value="Batch 16" <?php if($row['batchno']=="Batch 16"){ echo "Selected";} ?>>Batch 16</option>
                <option value="Batch 17" <?php if($row['batchno']=="Batch 17"){ echo "Selected";} ?>>Batch 17</option>
                <option value="Batch 18" <?php if($row['batchno']=="Batch 18"){ echo "Selected";} ?>>Batch 18</option>
                <option value="Batch 19" <?php if($row['batchno']=="Batch 19"){ echo "Selected";} ?>>Batch 19</option>
                <option value="Batch 20" <?php if($row['batchno']=="Batch 20"){ echo "Selected";} ?>>Batch 20</option>
                <option value="Batch 21" <?php if($row['batchno']=="Batch 21"){ echo "Selected";} ?>>Batch 21</option>
                <option value="Batch 22" <?php if($row['batchno']=="Batch 22"){ echo "Selected";} ?>>Batch 22</option>
                <option value="Batch 23" <?php if($row['batchno']=="Batch 23"){ echo "Selected";} ?>>Batch 23</option>
                <option value="Batch 24" <?php if($row['batchno']=="Batch 24"){ echo "Selected";} ?>>Batch 24</option>
                <option value="Batch 25" <?php if($row['batchno']=="Batch 25"){ echo "Selected";} ?>>Batch 25</option>
                <option value="Batch 26" <?php if($row['batchno']=="Batch 26"){ echo "Selected";} ?>>Batch 26</option>
                <option value="Batch 27" <?php if($row['batchno']=="Batch 27"){ echo "Selected";} ?>>Batch 27</option>
                <option value="Batch 28" <?php if($row['batchno']=="Batch 28"){ echo "Selected";} ?>>Batch 28</option>
                <option value="Batch 29" <?php if($row['batchno']=="Batch 29"){ echo "Selected";} ?>>Batch 29</option>
                <option value="Batch 30" <?php if($row['batchno']=="Batch 30"){ echo "Selected";} ?>>Batch 30</option>
                <option value="Batch 31" <?php if($row['batchno']=="Batch 31"){ echo "Selected";} ?>>Batch 31</option>
                <option value="Batch 32" <?php if($row['batchno']=="Batch 32"){ echo "Selected";} ?>>Batch 32</option>
                <option value="Batch 33" <?php if($row['batchno']=="Batch 33"){ echo "Selected";} ?>>Batch 33</option>
                <option value="Batch 34" <?php if($row['batchno']=="Batch 34"){ echo "Selected";} ?>>Batch 34</option>
                <option value="Batch 35" <?php if($row['batchno']=="Batch 35"){ echo "Selected";} ?>>Batch 35</option>
                <option value="Batch 36" <?php if($row['batchno']=="Batch 36"){ echo "Selected";} ?>>Batch 36</option>
                <option value="Batch 37" <?php if($row['batchno']=="Batch 37"){ echo "Selected";} ?>>Batch 37</option>
                <option value="Batch 38" <?php if($row['batchno']=="Batch 38"){ echo "Selected";} ?>>Batch 38</option>
                <option value="Batch 39" <?php if($row['batchno']=="Batch 39"){ echo "Selected";} ?>>Batch 39</option>
                <option value="Batch 40" <?php if($row['batchno']=="Batch 40"){ echo "Selected";} ?>>Batch 40</option>
              </select>
              <button class="form-control" name="add-batch">Submit</button>
              </form>
              </td>
      <td>
      <form action="../approval.php" method="post">
      <input type="hidden" value="<?php echo $row['id']?>" name="id">
      <select name="status" class="form-control" required>
      <option value="">Selectone </option>
      <option value="approved" <?php if($row['status']=="approved"){ echo "Selected";} ?>>Approved</option>
      <option value="reject" <?php if($row['status']=="reject"){ echo "Selected";} ?>>Reject</option>
      </select>
      <button class="form-control" name="add-status">Submit</button>
      </form>
      </td>
      <td>
          <a class="btn btn-primary" href="edit-student.php?id=<?php echo $row['id'];?>">Edit</a>
          <a class="btn btn-danger" href="delete-student.php?id=<?php echo $row['id']; ?>">Delete</a>
          <a class="btn btn-success" href="view-details-of-student.php?id=<?php echo $row['id']; ?>">View</a></td>
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
    </div>
     &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<a href="#SendBatches" class="btn btn-info btn-lg" data-toggle="collapse">Send Batches</a>
    <div id="SendBatches" class="collapse">
      <div class="container">
         <form class="form from-horizontal" action="" method="">
           <div class="form-group">
            <label for="inputBatch" class="col-lg-2 control-label">Batch Number</label>
            <div class="col-lg-10">
              <select name="batchnumber" class="form-control" required>
                 <option value="">selectOne</option>
                <option value="Batch 1">Batch 1</option>
                <option value="Batch 2">Batch 2</option>
                <option value="Batch 3">Batch 3</option>
                <option value="Batch 4">Batch 4</option>
                <option value="Batch 5">Batch 5</option>
                <option value="Batch 6">Batch 6</option>
                <option value="Batch 7">Batch 7</option>
                <option value="Batch 8">Batch 8</option>
                <option value="Batch 9">Batch 9</option>
                <option value="Batch 10">Batch 10</option>
                <option value="Batch 11">Batch 11</option>
                <option value="Batch 12">Batch 12</option>
                <option value="Batch 13">Batch 13</option>
                <option value="Batch 14">Batch 14</option>
                <option value="Batch 15">Batch 15</option>
                <option value="Batch 16">Batch 16</option>
                <option value="Batch 17">Batch 17</option>
                <option value="Batch 18">Batch 18</option>
                <option value="Batch 19">Batch 19</option>
                <option value="Batch 20">Batch 20</option>
                <option value="Batch 21">Batch 21</option>
                <option value="Batch 22">Batch 22</option>
                <option value="Batch 23">Batch 23</option>
                <option value="Batch 24">Batch 24</option>
                <option value="Batch 25">Batch 25</option>
                <option value="Batch 26">Batch 26</option>
                <option value="Batch 27">Batch 27</option>
                <option value="Batch 28">Batch 28</option>
                <option value="Batch 29">Batch 29</option>
                <option value="Batch 30">Batch 30</option>
                <option value="Batch 31">Batch 31</option>
                <option value="Batch 32">Batch 32</option>
                <option value="Batch 33">Batch 33</option>
                <option value="Batch 34">Batch 34</option>
                <option value="Batch 35">Batch 35</option>
                <option value="Batch 36">Batch 36</option>
                <option value="Batch 37">Batch 37</option>
                <option value="Batch 38">Batch 38</option>
                <option value="Batch 39">Batch 39</option>
                <option value="Batch 40">Batch 40</option>
              </select>
            </div>
           </div>
           <div class="form-group">
             <div class="col-lg-10 col-lg-offset-2">
               <button type="submit" name="send" class="btn btn-primary">Send</button>
             </div>
           </div>
         </form>
      </div>
    </div>
     &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<a href="#Report" class="btn btn-danger btn-lg" data-toggle="collapse">Report</a>
    <div id="Report" class="collapse">
      <div class="container">
      <table class="table table-striped table-hover ">
        <thead>
          <tr>

            <th>Professional Stream School</th>
            <th>Number of Approved Students</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $school ='';
          $sql = "SELECT COUNT(*), school FROM `students` WHERE status ='approved' "; 
          $res = mysqli_query($conn, $sql);
          if($res && mysqli_num_rows($res)>0)
          {
            while($row=mysqli_fetch_assoc($res))
            {
               $school = $row['school'];
              ?>
            
          <tr>
            <td><?php
                
                 $schslc = "SELECT schoolname FROM `schools` WHERE id ='$school'";
                 $resp =mysqli_query($conn, $schslc);
                 
                 if($resp && mysqli_num_rows($resp) > 0)
                 {
                    $schoolnow = mysqli_fetch_assoc($resp);
                    echo $schoolnow['schoolname'];
                 }
                  
             ?></td>
            <td><?php echo $row['COUNT(*)']; ?></td>
          </tr>
          <?php  
              

            }
          }
        ?>
            </tbody>
          </table> 
    </div>
  </div>
<!-- <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>sr#</th>
      <th>School Name</th>
      <th>School Sector</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Test</td>
      <td>Public</td>
      <td><a href="#" class="btn btn-success">Approve</a> <a href="#" class="btn btn-danger">Reject</a>
        <a href="#" class="btn btn-primary">View</a>
      </td>
    </tr> -->
    <!-- <tr>
      <td>2</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="info">
      <td>3</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="success">
      <td>4</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="danger">
      <td>5</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="warning">
      <td>6</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="active">
      <td>7</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr> -->
  <!-- </tbody>
</table>  -->
<script src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
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
// function myFunction() {
//     var x = document.getElementById("emails").multiple;
    // document.getElementById("emls").innerHTML = x;
}
</script>
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