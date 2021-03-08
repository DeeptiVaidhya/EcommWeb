<?php  $admin_url = $this->config->item('admin_url'); ?>
<?php if(!empty($status)){ ?>
<div class="status <?php echo $status['type']; ?>"><?php echo $status['msg']; ?></div>
<?php } ?>
<!--<div class="item active inner_pages">-->
<!--   <img src="<?= base_url('assets/img/cart.jpg')?>">                      -->
<!--   <div class="theme-container container">-->
<!--      <div class="caption-text">-->
<!--         <div class="cart_banner">-->
<!--            <div class="inner_bg">-->
<!--               <h3>Contact</h3>-->
<!--            </div>-->
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<!--</div>-->
<div class="container no-padding mt30 contant_content" id="franchise">
   <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
      <div class="col-md-6 col-sm-6 col-xs-12">
         <div class="contact_left">
            <p><i class="fa fa-map-marker" aria-hidden="true"></i><b>Vardhaman Enterprises:Plot No.101/A, 1st Floor,Road No:70, Journalist Colony, Jubilee Hills, Hyderabad, Telangana 500033</b></p>
            <p><i class="fa fa-phone" aria-hidden="true"></i><b>9898989898 / 9898989898</b></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i><b>Demo@gmail.com</b></p>
         </div>
         <!-- <div class="contact_left">
            <p><i class="fa fa-map-marker" aria-hidden="true"></i><b># 1130/A, Ground Floor,Road No: 36,
               Below Peddamma Gudi Metro station,Jubliee Hills, Hyderabad - 500033</b>
            </p>
            <p><i class="fa fa-phone" aria-hidden="true"></i><b>040 – 23558722, 7207028554, 7416386999</b></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i><b>hepppp36@gmail.com</b></p>
            <p><i class="fas fa-map-marker-alt" aria-hidden="true"></i><a href="https://goo.gl/maps/nswVFu4bKJ32" target="__blank">Map Link</a></p>
         </div>
         <div class="contact_left">
            <p><i class="fa fa-map-marker" aria-hidden="true"></i><b># 3, Level-1, City Center Mall,Road  No: 1, Banjara Hills,Hyderabad - 500034</b></p>
            <p><i class="fa fa-phone" aria-hidden="true"></i><b> 040 – 48540181 / 40044374</b></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i><b>banjarahepppp@gmail.com</b></p>
            <p><i class="fas fa-map-marker-alt" aria-hidden="true"></i><a href="https://goo.gl/maps/Pngxoh8Xi7ooe9278" target="__blank">Map Link</a></p>
         </div>
         <div class="contact_left">
            <p><i class="fa fa-map-marker" aria-hidden="true"></i><b># 18, Level-3 Sarath City Capital Mall,Kondapur, Hyderabad – 500084</b></p>
            <p><i class="fa fa-phone" aria-hidden="true"></i><b>040 – 68218151 / 68218152</b></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i><b>heppppkp@gmail.com</b></p>
            <p><i class="fas fa-map-marker-alt" aria-hidden="true"></i><a href="https://goo.gl/maps/ZJ9pm1KLWZHnvvzR9" target="__blank">Map Link</a></p>
         </div>
         <div class="contact_left">
            <p><i class="fa fa-map-marker" aria-hidden="true"></i><b>#23-25, Ground Floor,Amrutha Mall, Somajiguda Hyderabad - 500082</b></p>
            <p><i class="fa fa-phone" aria-hidden="true"></i><b>040 – 48503922 /8886089802</b></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i><b>sghepppp@gmail.com</b></p>
            <p><i class="fas fa-map-marker-alt" aria-hidden="true"></i><a href="https://goo.gl/maps/CZSSkcGiSgdh5Bxr9" target="__blank">Map Link</a></p>
         </div> -->
          <div class="contact_right">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.7968345606555!2d78.40655631487682!3d17.42153498805813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTfCsDI1JzE3LjUiTiA3OMKwMjQnMzEuNSJF!5e0!3m2!1sen!2sin!4v1581145891873!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
         </div>
      </div>
      <div class="col-md-6">
         <?php  if(!empty($this->session->flashdata('result'))){ ?>
         <div class="alert alert-success"><?= $this->session->flashdata('result') ?></div>
         <?php } ?>
         <div class="page-header contact_right_form" id="top">
            <!-- Contact form -->
            <form class="contact2-form validate-form" name="contact" action="<?= base_url() ?>Contact/submit" method="post">
               <div class="wrap-input2 validate-input">
                  <input class="wrap-input2 validate-input" type="text" name="name" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" placeholder="Enter Name" required>
                  <?php echo form_error('name','<p class="field-error">','</p>'); ?>
               </div>
               <div class="wrap-input2 validate-input">
                  <input class="wrap-input2 validate-input" type="email" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" placeholder="Enter Email" required>
                  <?php echo form_error('email','<p class="field-error">','</p>'); ?>
               </div>
               <!--  <div class="wrap-input2 validate-input">
                  <input class="wrap-input2 validate-input" type="number" name="contact_no" min_length="10" max_length="10" pattern="[1-9]{1}[0-9]{9}" value=" <?php echo !empty($postData['contact_no'])?$postData['contact_no']:''; ?>"  placeholder="Enter Number" required>
                  <?php echo form_error('contact_no','<p class="field-error">','</p>'); ?>
                  </div> -->
               <div class="wrap-input2 validate-input">
                  <input class="wrap-input2 validate-input" type="text" name="contact_no"   value placeholder="Enter Number" minlength="10" maxlength="10" autocomplete="on" value=" <?php echo !empty($postData['contact_no'])?$postData['contact_no']:''; ?>">
                  <?php echo form_error('contact_no','<p class="field-error">','</p>'); ?>
               </div>
               <div class="wrap-input2 validate-input">
                 <select>
                   <option>General Enquiry</option>
                   <option>Franchise Enquiry</option>
                 </select>
               </div>
               <div class="wrap-input2 validate-input textarea_field">
                  <textarea class="wrap-input2 validate-input" name="message" placeholder="Enter Comment" ><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
                  <?php echo form_error('message','<p class="field-error">','</p>'); ?>
               </div>
               <div  class="container-contact2-form-btn">
                  <input class="contact2-form-btn" type="submit" name="contactSubmit"  value="Submit">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>  
<!-- <div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="contact_right">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.7968345606555!2d78.40655631487682!3d17.42153498805813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTfCsDI1JzE3LjUiTiA3OMKwMjQnMzEuNSJF!5e0!3m2!1sen!2sin!4v1581145891873!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
         </div>
      </div>
   </div>
</div> -->

<div class="container">
  <div class="row">
    <div class="col-md-5 find_our_store_pad">
      <div class="find_our_store_bg">
        <div class="find_our_store">
          <h2>FIND OUR STORE</h2>
        </div>
        <div class="tab contact_us_tab">
          <ul>
            <li>
              <button class="tablinks" onclick="openCity(event, 'Jubliee')" id="defaultOpen">
                <span class="heading_tab">Jubliee Hills</span>
                <span># 1130/A, Ground Floor,Road No: 36,
                  Below Peddamma Gudi Metro station,
                  Jubliee Hills, Hyderabad - 500033</span> 
                <span>Ph: 040 – 23558722, 7207028554, 7416386999</span> 
                <span>E-Mail: hepppp36@gmail.com</span> 
              </button>
            </li>
            <li>
              <button class="tablinks" onclick="openCity(event, 'Banjara')">
                  <span class="heading_tab">Banjara Hills</span>
                <span># 3, Level-1, City Center Mall,
                  Road No: 1, Banjara Hills,
                  Hyderabad - 500034</span> 
                <span>Ph: 040 – 48540181 / 40044374</span> 
                <span>E-Mail: banjarahepppp@gmail.com</span> 
            </button>
            </li>
            <li>
              <button class="tablinks" onclick="openCity(event, 'Kondapur')">
                 <span class="heading_tab">Kondapur</span>
                  <span># 18, Level-3,
                  Sarath City Capital Mall,
                  Kondapur, Hyderabad – 500084</span> 
                <span>Ph: 040 – 68218151 / 68218152</span> 
                <span>E-Mail: heppppkp@gmail.com</span>
              </button>
            </li>
            <li>
              <button class="tablinks" onclick="openCity(event, 'Somajiguda')">
                 <span class="heading_tab">Somajiguda</span>
                <span>#23-25, Ground Floor,
                  Amrutha Mall, Somajiguda
                  Hyderabad - 500082</span> 
                <span>Ph: 040 – 48503922 /8886089802</span> 
                <span>E-Mail: sghepppp@gmail.com</span>
              </button>
            </li>
          </ul>   
        </div>
      </div>

    </div>
    <div class="col-md-7 find_our_store_pad_2">

<div id="Jubliee" class="tabcontent">
  <div class="map_section_tab">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.61571049215!2d78.40648381487689!3d17.43022038805298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb91366c35ab49%3A0xc1a30594cc4f0994!2sHeppp!5e0!3m2!1sen!2sin!4v1581142190090!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
</div>

<div id="Banjara" class="tabcontent">
  <div class="map_section_tab">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.925466372977!2d78.44682081487674!3d17.415364188061883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9777324c5503%3A0xc57be036ad7b265d!2sHEPPPP%2C%20Banjara%20Hills!5e0!3m2!1sen!2sin!4v1581142287363!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>    
  </div>
</div>

<div id="Kondapur" class="tabcontent">
  <div class="map_section_tab">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.0502720077257!2d78.36174441487731!3d17.4573077880367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93a7128f2fc3%3A0x6d72d0801dd00ab9!2sHEPPPP%2C%20Sarath%20City%20Capital%20Mall!5e0!3m2!1sen!2sin!4v1581142393633!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
</div>
<div id="Somajiguda" class="tabcontent">
  <div class="map_section_tab">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.6381623298917!2d78.4536139148769!3d17.4291439880536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb912a24a4fb4f%3A0xd8d9bb5b669549de!2sHEPPPP%2C%20Somajiguda!5e0!3m2!1sen!2sin!4v1581142323211!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
</div>

    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="franchise_btn">
        <a href="#franchise" class="btn btn-default" >Franchise Enquiry</a>
      </div>
    </div>
  </div>
</div>
<script>
   $( document ).ready(function() {
     $(function() {  
       $("form[name='contact']").validate({
         // Specify validation rules
         rules: {
           
         mobileNo:{
             required:true,
             minlength:9,
             maxlength:10,
             number: true
           },
   
         // Specify validation error messages
         messages: {
           
           mobileNo: "Please enter  10 digit mobile number",
           
         submitHandler: function(form) {
           form.submit();
         }
       });
     });
   })
</script>

<!--  tab  -->
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>