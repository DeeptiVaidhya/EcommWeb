<div class="common_banner">
<div class="item active inner_pages">
   <img src="<?php echo base_url('assets/img/cart.jpg');?>" alt=" ">
   <div class="theme-container container">
      <div class="caption-text">
         <div class="cart_banner">
            <div class="inner_bg">
               <h3>Forget Password</h3>
            </div>
         </div>
      </div>
   </div>
</div>
<br>
<br>
<div class="container">
        <div id="code"></div>
      <!-- <form action="<?= base_url() ?>Login/forget" method="post"> -->
        <div class="row">
          <div class="col-sm-4 col-md-offset-3">
              <input type="email" id="email1" name="reset_email" class="form-control" placeholder="Enter Your Email" required><br>
            <button class="btn btn-danger" id="reset">Reset Password</button>
      <!-- </form> -->
          </div>
      </div>
</div>
<br>
<br>

       <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('#reset').click(function(){
     // alert('hii');
      var email= $('#email1').val();

      //alert(email);
       $.post("<?= base_url() ?>Login/forget", {email: email}, function(result){
    
     $('#code').html(result);
  });
     
    })
  })
</script>