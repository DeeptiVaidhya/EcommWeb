<!--<div class="item active inner_pages">-->
<!--  <img src="<?php echo base_url('assets/img/cart.jpg');?>" alt=" ">                      -->
<!--  <div class="theme-container container">-->
<!--    <div class="caption-text">-->
<!--      <div class="cart_banner">-->
<!--        <div class="inner_bg">-->
<!--        <h3>Donate</h3>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!--<div class="service_all">-->




<div class="container no-padding mt30 contant_content">
   <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="contact_left">
         <p><i class="fa fa-map-marker" aria-hidden="true"></i><b>Vardhaman Enterprises:Plot No.101/A, 1st Floor,Road No:70, Journalist Colony, Jubilee Hills, Hyderabad, Telangana 500033</b></p>
         <p><i class="fa fa-phone" aria-hidden="true"></i><b>9898989898 / 9898989898</b></p>
         <p><i class="fa fa-envelope" aria-hidden="true"></i><b>Demo@gmail.com</b></p>
        </div>
      </div>
         <div class="col-md-6">
        <?php  if(!empty($this->session->flashdata('result'))){ ?>
        <div class="alert alert-success"><?= $this->session->flashdata('result') ?></div>
      <?php } ?>
         <div class="page-header contact_right_form" id="top">
            <!-- Contact form -->
            <form action="<?= base_url() ?>Donate" method="post" enctype="multipart/form-data">

               <div class="wrap-input2 validate-input">
                  <input class="wrap-input2 validate-input" type="text" name="first_name" value="<?= set_value('first_name') ?>" placeholder="First Name" required>
                 <?= form_error('first_name') ?>
               </div>

               <div class="wrap-input2 validate-input">
                  <input class="wrap-input2 validate-input" type="text" name="last_name" value="<?= set_value('last_name') ?>" placeholder="Last Name" required>
                 <?= form_error('last_name') ?>
               </div>

               <div class="wrap-input2 validate-input">
                  <input class="wrap-input2 validate-input" type="text" name="email" value="<?= set_value('email') ?>" placeholder="Email Address" required>
                 <?= form_error('email') ?>
               </div>

               <div class="wrap-input2 validate-input">
                  <input class="wrap-input2 validate-input" type="text" name="phone_number" value="<?= set_value('phone_number') ?>" placeholder="Phone Number" required>
                 <?= form_error('phone_number') ?>
               </div>
               
               <div class="col-sm-6">
							<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" id="male" value="male" name="gender">
								<label class="custom-control-label" for="male">Male</label>
								<input type="radio" class="custom-control-input" value="female" id="female" name="gender">
								<label class="custom-control-label" for="female">Female</label>
							</div>
							<?= form_error('gender') ?>
						</div>


						<div class="col-sm-6">
							<div class="gallery"></div>
							<div class="form-group">
								<input type="file" id="files" name="files[]" multiple="multiple" class="form-control">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Donate your clothes at this address</label>
								<input type="text"  name="address" value="Vardhaman Enterprises:Plot No.101/A, 1st Floor,Road No:70, Journalist Colony, Jubilee Hills, Hyderabad, Telangana 500033" class="form-control" readonly>
							</div>
						</div>
		               <div  class="container-contact2-form-btn">
		                  <input class="contact2-form-btn" type="submit" name="contactSubmit"  value="Submit">
		               </div>


            </form>
         </div>
      </div>     
   </div>
</div>


<div class="container">
   <div class="row">
       <div class="col-md-12">
        <div class="contact_right">
         <iframe src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=Vardhaman%20Enterprises%3A%20Plot%20No.101%2FA%2C%201st%20Floor%2C%20Road%20No%3A70%2C%20Journalist%20Colony%2C%20Jubilee%20Hills%2C%20Hyderabad%2C%20Telangana%2050003+()&ie=UTF8&t=&z=5&iwloc=B&output=embed"></iframe>
        </div>
      </div>
   </div>
</div>







<section class="">
	<br>

	
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script> 
	$( document ).ready(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="63px" height="63px" style="padding:3px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                // $('img').css('width','50px');
                // $('img').css('height','50px');

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#files').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
})
</script>