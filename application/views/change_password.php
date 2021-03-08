<?php 
   ?>
<div class="common_banner">
<div class="item active inner_pages">
  <img src="http://15.206.103.57/kids_ecom/assets/img/cart.jpg" alt=" ">                      
  <div class="theme-container container">
    <div class="caption-text">
      <div class="cart_banner">
        <div class="inner_bg">
        <h3>Change Password</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<form action="<?= base_url() ?>login/changePassword" method="post">
   <div class="container" >
      <?php if(!empty($result)) {   ?>
      <div>
         <?= $result ?>
      </div>
      <?php } ?>
      <?php  if(!empty($this->session->userdata('change_user'))) {  ?>
      <input type="hidden" name="user_id" class="form-control" value="<?= $this->session->userdata('change_user') ?>">
      <?php } ?>
      <div class="row">
         <div class="col-sm-12" >
            <div class="form-group">
               <label>Enter New Password</label><br>
               <input type="password" name="password1" class="form-control">
               <?php if(form_error('password1')) { ?>
               <div class="alert alert-danger"><?= form_error('password1') ?></div>
               <?php } ?>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="form-group">
               <label>Confirm New Password</label><br>
               <input type="password" name="password2" class="form-control">
               <?php if(form_error('password2')) { ?>
               <div class="alert alert-danger"><?= form_error('password2') ?></div>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-12">
         <div class="form-group login_btn">
            <button class="btn btn-primary">Change Password</button>
         </div>
      </div>
   </div>
   </div>
</form>