<?php
include 'header.php';
include 'db.php';
?>
<div class="container" <?php if(!@isset($_SESSION['succ'])){ ?> style="display:none" <?php } ?>>
  <div class="row">
    <div class="col-lg-5 col-lg-offset-5">
      <h2 class="alert alert-success" >
        <?php
           print_r($_SESSION['succ']);
        ?>
      </h2>
    </div>
  </div>
</div>
<form class="form-horizontal" action="add-std.php" method="post">
  <fieldset>
    <legend>Public Form</legend>
    <div class="form-group">
     <label for="inputBatch" class="col-lg-2 control-label">Professional stream school</label>
     <div class="col-lg-10">
       <select name="school" class="form-control" required="">
      <?php
        $sql = "select id,schoolname from `schools`";
        $res = mysqli_query($conn, $sql);
        if($res && mysqli_num_rows($res) > 0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
               
        ?>
         <option value="<?php echo $row['id']; ?>"><?php echo $row['schoolname']; ?></option>
         <?php
            }
       }
    ?>
       </select>
     </div>
    </div>
     <div class="form-group">
      <label class="col-lg-2 control-label">Student Current School type</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="S_type" id="public" value="public" required="">
            Public
          
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="S_type" id="private" value="private" required="">
            Private
          </label>
        </div>
      </div>
    </div>
     <div class="form-group">
      <label class="col-lg-2 control-label">SIS NO</label>
      <div class="col-lg-10">
      <input type="text" class="form-control" name="sis" placeholder="Your SIS NO">
      <h6 class="alert alert-danger">Fill if your school type is public</h6>
    </div>
     </div>
     <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Students Full Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" name="fname" placeholder="Name" required="">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Date of Birth</label>
      <div class="col-lg-10">
        <input type="date" class="form-control" id="inputEmail" name="dob" placeholder="" required="">
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Students Nationality</label>
      <div class="col-lg-10">
        <select class="form-control" id="select" name="S_n" required="">
          <option value="1">1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Mother's Nationality</label>
      <div class="col-lg-10">
        <select class="form-control" id="select" name="M_n" required="">
          <option value="1">1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>

     <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Father's Nationality</label>
      <div class="col-lg-10">
        <select class="form-control" name="F_n" id="select" required="">
          <option value="1">1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Nearest LandMark to Students Home</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputPassword" placeholder="" name="Nlsh" required="">
      </div>
    </div>
      
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label"> Current School Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputPassword" placeholder="" name="C_s" required="">
      </div>
    </div>
     
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label"> Parents Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="P_name" placeholder="" name="P_name" required="">
      </div>
    </div>
    
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label"> Parents Email</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" id="inputPassword" placeholder="" name="p_email" required="">
      </div>
    </div>
    
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">parents Mobile</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputPassword" placeholder="" name="p_no">
      </div>
    </div>
      <legend>Test Results</legend>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label"> English</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="inputPassword" placeholder="" name="eng" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Maths</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="inputPassword" placeholder="" name="maths" required="">
        </div> 
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Non Verbal Reasoning</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="inputPassword" placeholder="" name="Nvr" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Total</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="inputPassword" placeholder="" name="total" required="">
        </div>
      </div>
      
      <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Comments</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="inputPassword" placeholder="" name="comm" required="">
        </div>
      </div>

      <div class="form-group">
       <label for="select" class="col-lg-2 control-label">Result</label>
       <div class="col-lg-10">
         <select class="form-control" name="res" id="select" required="">
          <option>Select</option>
           <option value="0"> Recomended </option>
           <option value="1"> Not Recomended </option>
         </select>
       </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" name="saved" class="btn btn-primary">Submit Application</button>
      </div>
    </div>
  </fieldset>
</form>