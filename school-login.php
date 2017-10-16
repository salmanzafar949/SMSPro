<?php

include 'header.php';
include 'db.php';
if(isset($_POST['school-log']))
{
	$pass = $_POST['pass'];
	$sql  = "SELECT * FROM `schools` WHERE pass = '$pass'";
	$res  = mysqli_query($conn, $sql);
	if($res && mysqli_num_rows($res) > 0)
	{
		   $row=mysqli_fetch_assoc($res);
           $_SESSION['schoollg'] = $row['id'];
           header('location:s-dashboard.php');
	}
	else
	{
		echo "<div class='alert alert-danger'>";
		echo "Inavlid password";
		echo "</div>";
	}
}
else
{

}
?>
<form class="form-horizontal" action="" method="post">
  <fieldset>
    <legend>Login</legend>
   <!--  <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div> -->
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password" required="">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" name="school-log" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>



?>