
<!--<div class="item active inner_pages">-->
<!--  <img src="http://15.206.103.57/kids_ecom/assets/img/cart.jpg" alt=" ">                      -->
<!--  <div class="theme-container container">-->
<!--    <div class="caption-text">-->
<!--      <div class="cart_banner">-->
<!--        <div class="inner_bg">-->
<!--        <h3>Sign Up</h3>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<div class="container signup_form">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <?php $attributes = array("name" => "signupform");
            echo form_open("Login/signUpProcess", $attributes);?>
            <!-- <legend>Signup</legend> -->
            
            <div class="form-group">
                <label for="name">First Name</label>
                <input class="form-control" name="firstname" placeholder="First Name" type="text" value="<?php echo set_value('firstname'); ?>" />
                <span class="text-danger"><?php echo form_error('firstname'); ?></span>
            </div>  
            <!-- <div class="form-group">
                <label for="name">First Name</label>
                <input class="form-control" name="username" placeholder="username" type="text" value="<?php echo set_value('username'); ?>" />
                <span class="text-danger"><?php echo form_error('username'); ?></span>
            </div>  -->        
            
            <div class="form-group">
                <label for="name">Last Name</label>
                <input class="form-control" name="lastname" placeholder="Last Name" type="text" value="<?php echo set_value('lastname'); ?>" />
                <span class="text-danger"><?php echo form_error('lastname'); ?></span>
            </div>
        
            <div class="form-group">
                <label for="email">Email ID</label>
                <input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
                <span class="text-danger"><?php echo form_error('email'); ?></span>
            </div>

            <div class="form-group">
                <label for="email">Phone No</label>
                <input class="form-control" name="phone" placeholder="Phone No" type="text" value="<?php echo set_value('phone'); ?>" />
                <span class="text-danger"><?php echo form_error('phone'); ?></span>
            </div>

            <div class="form-group">
                <label for="subject">Password</label>
                <input class="form-control" name="password" placeholder="password" type="password" />
                <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>

            <div class="form-group">
                <label for="subject">Confirm Password</label>
                <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />
                <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
            </div>

            <div class="form-group sugn_up_btn">
                <button name="submit" type="submit" class="btn btn-info">Signup</button>
                <button onclick="window.location.href='<?php echo base_url('/'); ?>'" name="cancel" type="reset" class="btn btn-info">Cancel</button>
                <p>Already have an account? <a href="<?=  base_url()?>login" class="login_signup">Login</a></p>

                
            </div>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
   
</div>

