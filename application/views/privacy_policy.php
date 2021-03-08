 <div class="item active inner_pages">
  <img src="<?php echo base_url('assets/img/cart.jpg');?>" alt=" ">                      
  <div class="theme-container container">
    <div class="caption-text">
      <div class="cart_banner">
        <div class="inner_bg">
        <h3>Privacy Policy</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- about_sec -->
<div class="sercive_all">
<?php  $admin_url = $this->config->item('admin_url'); ?> 
<section class="service_all"> 
  <div class="container">
    <div class="services_title">
      <h2></h2> 
    </div>
    <div class="row privacy_row about_ifno">
      <?php  foreach ($data_policy as $row) { ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about_page_content" >
           <div class="main_title">
              <h1 class=""><span><?php echo $row->title;?></span></h1>
              
           </div>
           <p><?php echo $row->description;?> </p>
   
        </div>
      <?php } ?>
    </div>
</section>
</div>
