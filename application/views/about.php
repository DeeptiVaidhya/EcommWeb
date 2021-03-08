<?php  $admin_url = $this->config->item('admin_url'); ?> 
<div class="item active inner_pages">
  <img src="<?php echo base_url('assets/img/cart.jpg');?>" alt=" ">                      
  <div class="theme-container container">
    <div class="caption-text">
      <div class="cart_banner">
        <div class="inner_bg">
        <h3>About Us</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="service_all">

<section class="">
  <div class="container">
      <div class="row about_ifno">            
         <div class="">               
             <div class="col-md-6">                      
             </div>
            <?php foreach ($data_about as $row) { ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about_page_content" data-aos="zoom-in-left" data-aos-easing="linear"   data-aos-duration="1500">
               <div class="main_title">
                  <h1 class=""><span><?php echo $row->title;?></span></h1>                        
               </div>
               <p><?php echo $row->description;?> </p>             
            </div>
              <?php } ?>
         </div>             
      </div>
  </div>
</section>
</div>
