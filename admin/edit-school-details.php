<?php
include '../db.php';
include '../header.php';
  if(!isset($_SESSION['adminmail']))
  {
  	header('location:a-dashboard.php');
  }

  if(isset($_GET['id']))
  { 
  	   $row = '';
       $id = $_GET['id'];
       if(!empty($id))
       {
          $get  ="SELECT * FROM `schools` WHERE id='$id'";
          $resp =mysqli_query($conn, $get);
          if($resp && mysqli_num_rows($resp) > 0)
          {
          	$row = mysqli_fetch_assoc($resp);
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


<form class="form-horizontal" action="update-ps.php" method="post">
  <fieldset>
   <div class="form-group">
     <label for="inputSchooName" class="col-lg-2 control-label">School Name</label>
     <div class="col-lg-10">
       <input type="text" name="school" class="form-control" id="inputEmail" value="<?php echo $row['schoolname'] ?>" required>
       <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
     </div>
   </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Princinpal Email</label>
      <div class="col-lg-10">
        <input type="email" name="Pemail" class="form-control" id="inputEmail" value="<?php echo $row['Pemail'] ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputCoordinator" class="col-lg-2 control-label">Coordinator</label>
      <div class="col-lg-10">
        <input type="email" name="Cemail" class="form-control" id="inputPassword" value="<?php echo $row['Coordinator'] ?>"  required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputSectorSpecailist" class="col-lg-2 control-label">Sector Specialist</label>
      <div class="col-lg-10">
        <input type="email" name="SSemail" class="form-control" id="inputPassword" value="<?php echo $row['SectorSpecialist'] ?>"  required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputSectorSpecailist" class="col-lg-2 control-label">School Password</label>
      <div class="col-lg-10">
        <input type="password" name="pass" class="form-control" id="inputPassword" value="<?php echo $row['pass'] ?>"  required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" name="update" class="btn btn-primary">Save</button>
      </div>
    </div> 
  </fieldset>
</form>