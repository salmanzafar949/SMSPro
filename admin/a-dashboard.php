<?php
include '../header.php';
include '../db.php';
if(!isset($_SESSION['adminmail']))
{
	header('location:../index.php');
}
?>
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
           <div class="col-lg-10 col-lg-offset-2">
             <button type="reset" class="btn btn-default">Cancel</button>
             <button type="submit" name="Add" class="btn btn-primary">Save</button>
           </div>
         </div> <br>
         <div class="form-group">
           <label for="inputSectorSpecailist" class="col-lg-2 control-label">CC</label>
           <div class="col-lg-10">
             <input type="email" name="emails" class="form-control" id="inputPassword" placeholder="Email"  required>
           </div>
         </div>
       </fieldset>
     </form>
  </div>
    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
    <a href="#viewStudents" class="btn btn-info btn-lg" data-toggle="collapse">View Students</a>
    <div id="viewStudents" class="collapse">
    <table class="table table-striped table-hover ">
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
      <tr>
        <?php
           $sql = "SELECT * FROM `students`";
           $res = mysqli_query($conn, $sql);
           if($res && mysqli_num_rows($res) >0 )
           {
             while($row = mysqli_fetch_assoc($res))
             {
               ?>
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
      <td>Batch No</td>
      <td>Committee Result</td>
      <td>
          <a class="btn btn-primary" href="#">Edit</a>
          <a class="btn btn-danger" href="#">Delete</a>
          <a class="btn btn-success" href="#">View</a></td>
      <?php 
           }
         }
      ?>
      </tr>
        </tbody>
      </table> 
       <button type="submit" class="bnt btn-info pull-right btn-lg">Download</button>

    </div>
     &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<a href="#SendBatches" class="btn btn-info btn-lg" data-toggle="collapse">Send Batches</a>
    <div id="SendBatches" class="collapse">
      <div class="container">
         <form class="form from-horizontal" action="" method="">
           <div class="form-group">
            <label for="inputBatch" class="col-lg-2 control-label">Batch Number</label>
            <div class="col-lg-10">
              <select name="batchnumber" class="form-control" required>
                <option value="">1</option>
                <option value="">1</option>
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
            <th>Number if Approved Students</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>School Name</td>
            <td>Number of Approved students</td>
          </tr>
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