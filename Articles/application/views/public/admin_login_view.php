<?php include_once('public_header.php'); ?>

<div class="container">
<!-- <form class="form-horizontal"> -->
	<?php echo form_open('login/admin_login', ['class' =>'form-horizontal']); ?>
  <fieldset>
    <legend style="font-size: 25px; color: blue">Admin Login</legend>

    

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">User Name</label>
      <div class="col-lg-6">
        <input type="text" name="username" class="form-control" placeholder="Please Enter Your User Name..." 
        value="<?php echo set_value('username');?>" > <!-- set_value() is codeig.. functo keep correct value in field see documentation  -->

        <div> <?php echo form_error("username");?></div>

      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-6">
        <input type="password" name="password" class="form-control" placeholder="Please Enter Your Password..." 
        value="<?php echo set_value('password');?>" >

        <div> <?php echo form_error("password");?> </div>

    </div>
  	</div> <!-- end of form-group -->
  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>
  </fieldset>
</form>

<?php if($error = $this->session->flashdata('login_failed')): ?>
    <div class="row">
    <div class="col-lg-6">
    <div style="margin-left: 100px" class="alert alert-dismissible alert-danger">
      <?php echo $error; ?>
    </div>
    </div> <!-- end of coi-6 -->
    </div> <!-- end of row -->
<?php endif; ?>

</div>

<?php include_once('public_footer.php'); ?>