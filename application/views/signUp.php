<style>
[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
    width: 47rem;
}
</style>


<div class="common_banner">
            <div class="inner_bg">
               <h3>Sign Up</h3>
               <hr> 
            </div>
         </div>

<br>
<br>
<br>
<br>
<br>
<br>

<!-- Email,Phone Number,Email Id,Full Name,User Type,User Birth Day,User Profile,User City,Password,Password Confirmation -->

<section>
    <h1 style="text-align:center;"> User Registration</h1>

    
<div class="container " style="width:90rem; margin-left:19rem;" >
    <?php if(!empty($result)){ ?>
    <div class="alert alert-danger"><?= $result; ?></div>
    <?php  } ?>
    <form action="<?= base_url() ?>Login/signUpProcess" method="post"  enctype='multipart/form-data'>
    
  <div class="row">
    <div class="col-sm-4">
	
  <div class="form-group">
    <label for="name">User Name:</label>
    <input type="text" name="user_name" class="form-control" id="email">
    <?php echo form_error('user_name', '<div class="alert alert-danger">', '</div>'); ?>
  </div>
  <div class="form-group">
    <label for="email">User Email:</label>
    <input type="email" name="user_email" class="form-control" id="pwd">
     <?php echo form_error('user_email', '<div class="alert alert-danger">', '</div>'); ?>
  </div>
  <div class="form-group">
    <label for="number">User Phone Number:</label>
    <input type="text" name="user_phone" class="form-control" id="email">
    <?php echo form_error('user_phone', '<div class="alert alert-danger">', '</div>'); ?>
  </div>
  <div class="form-group">
    <label for="pwd">User Full Name:</label>
    <input type="text" name="user_full" class="form-control" id="pwd">
    <?php echo form_error('user_full', '<div class="alert alert-danger">', '</div>'); ?>
  </div>
   <div class="form-group">
    <label for="name">User Type Id:</label>
    <input type="text" name="user_type" class="form-control" id="email">
    <?php echo form_error('user_type', '<div class="alert alert-danger">', '</div>'); ?>
  </div>
</div>

    <div class="col-sm-4">
    
 
  <div class="form-group">
    <label for="email">User Birth Date:</label>
    <input type="date" name="user_birth" class="form-control" id="datepicker">
    <?php echo form_error('user_birth', '<div class="alert alert-danger">', '</div>'); ?>
  </div>
  <!-- <div class="form-group">
    <label for="number">Upload Your Image:</label>
    <input type="file" name="user_profile" class="form-control" id="email">
   <?php //echo form_error('user_profile', '<div class="alert alert-danger">', '</div>'); ?> 
  </div> -->
  <div class="form-group">
    <label for="pwd">User City:</label>
    <input type="text" name="user_city" class="form-control" id="pwd">
    <?php echo form_error('user_city', '<div class="alert alert-danger">', '</div>'); ?>
  </div>
   <div class="form-group">
    <label for="pwd">Set Password:</label>
    <input type="text" name="user_spassword" class="form-control" id="pwd">
    <?php echo form_error('user_spassword', '<div class="alert alert-danger">', '</div>'); ?>
  </div>
   <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="text" name="user_cpassword" class="form-control" id="pwd">
    <?php echo form_error('user_cpassword', '<div class="alert alert-danger">', '</div>'); ?>
  </div>
</div>
</div>
  <!-- <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="user" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="pass" class="form-control" id="pwd">
  </div> -->
 
  <div style="">
  <button type="submit" class="btn btn-primary">Submit</button> <br><br>
  <a style="margin-left:18rem;" href="<?= base_url() ?>Login">Already have an account</a>
</div>



</form>
</div>


</section>