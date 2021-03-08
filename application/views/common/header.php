   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
      <!--<meta http-equiv="Content-Security-Policy" content="policy-definition">-->
      
      <title>Baby Store</title>
      <!-- Favicon -->
      <link rel="stylesheet" type="text/css" href="<?php base_url('assets/icon/favicon.icon')?>">

      
      <!-- CSS Global -->
      <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/css/custom.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/css/media.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/plugins/owl-carousel/owl.carousel.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/plugins/owl-carousel/owl.theme.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/plugins/bootstrap-select/css/bootstrap-select.min.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/css/subscribe-better.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/plugins/fontawesome/css/all.css');?>" rel="stylesheet" type="text/css">

<style>
  select.goog-te-combo option {
    color: #000;
}
select.goog-te-combo {
    background: transparent;
    border: none;
    color: #fff !important;
    width: 147px;
    font-weight: 600;
}
.skiptranslate.goog-te-gadget {
    display: flex;
}
</style>

  
   </head>
   <?php  
      $wishlist_count = 0;
      if(!empty($this->session->userdata('user_id'))){
         $this->db->select("*");
         $this->db->from('wishlist');
         $this->db->where('user_id',$this->session->userdata('user_id'));
         $wishlist_count = $this->db->get()->num_rows();
      }
   ?>
   <body id="home" class="wide" onload="Currency()">
      <section class="top-bar"> 
                    <div class="container theme-container">   
                        <div class="bg-with-mask box-shadow">
                            <span class="blue-color-mask color-mask"></span>                           
                            <nav class="navbar navbar-default top-navbar">  
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <!--<a class="visible-xs logo" href="#"> <img src="assets/img/logo/logo.png" alt=" "> </a>-->
                                </div>                           
                                <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a href="<?php echo base_url('wishlist');?>"> <span class="fa fa-heart"></span> Wishlist</a></li>
                                        <!-- <li><a href="#"> <span class="fa fa-random"></span> Compare</a></li> -->
                                   <!--  <div class="language_top_bar">
                                      <div class="container">
                                        <div class="row">
                                          <div class="col-md-12 text-right"> -->
                                            <li id="google_translate_element"></li>
                                          <!-- </div> 
                                        </div>
                                      </div>
                                    </div> --> 
                                       <!--  <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">English <span class="caret"></span></a>
                                            <ul class="dropdown-menu" style="display: none;">
                                                <li><a href="#">English</a></li>
                                                <li><a href="#">Dutch</a></li>
                                                <li><a href="#">French</a></li>
                                            </ul>
                                        </li> -->
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" id="currency">
                                               <!-- INR<span class="caret"></span> -->
                                            </a>
                                            <ul class="dropdown-menu" style="display: none;">
                                                <li><a  onclick="changeCurrency('₹')">INR</a></li>
                                                <li><a  onclick="changeCurrency('£')">POUND</a></li>
                                                <li><a  onclick="changeCurrency('$')">USD</a></li>
                                                <li><a  onclick="changeCurrency('€')">EURO </a></li>
                                                <li><a  onclick="changeCurrency('$')">AUD</a></li>
                                                <li><a  onclick="changeCurrency('$')">CAD</a></li>
                                                <li><a  onclick="changeCurrency('$')">NZD</a></li>

                                            </ul>

                                        </li>
                                    </ul>

                                    <ul class="nav navbar-nav pull-right">
                                      <!--   <li class="dropdown">
                                            <a href="<?php echo base_url('/')?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Home
                                             </a>
                                       </li> -->  
                                        <li><a href="<?php echo base_url('/');?>">Home</a></li>                                     
                                        <li><a href="<?php echo base_url('contact');?>">Contact Us</a></li>
                                        <li><a href="<?php echo base_url('Products/allProducts/');?>">Shop</a></li>
                                        <!-- <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Blog <span class="caret"></span></a>
                                            <ul class="dropdown-menu" style="display: none;">
                                                <li><a href="#">Blog Right Sidebar</a></li>
                                                <li><a href="#">Blog Left Sidebar</a></li>
                                                <li><a href="#">Single Post Right Sidebar</a></li>
                                                <li><a href="#">Single Post Left Sidebar</a></li>                                            
                                            </ul>
                                        </li> -->
                                        <li><a href="#">Track Order</a></li>
                                        <li><a href="<?php echo base_url('Donate');?>">Donate</a></li>
                                        <li><a href="https://myewards.com/onepagewebsite/MzAxNjAxOA==">loyalty points</a></li>
                                        
                                        
                                        <?php if(!empty($this->session->userdata('user_id'))){ ?>
                                         <li><a href="<?php echo base_url('Login/logout');?>" class="dropdown-toggle" >Logout</a></li> 
                                         <?php } else { ?>
                                         <li><a href="<?php echo base_url('login');?>" data-toggle="modal">Register/Login</a></li> 
                                         <?php } ?>
                                        
                                        
                                        
                                        
                                        <li class="dropdown" style="display: none">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">My Account <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">My Account</a></li>                                                
                                                <li><a href="#"> Account Information </a></li>                                                
                                                <li><a href="#">Change Password</a></li>
                                                <li><a href="#">Address Books</a></li>
                                                <li><a href="#">Order History</a></li>
                                                <li><a href="#">Reviews and Ratings</a></li>
                                                <li><a href="return.html">Returns Requests</a></li>
                                                <li><a href="newsletter.html">Newsletter</a></li>
                                                <li><a href="myaccount-leftsidebar.html">Left Sidebar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>                         
                            </nav>   
                        </div>   
                        
                    </div>
                    <img src="<?php echo base_url('assets/img/pattern/ziz-zag.png');?>" class="blue-zig-zag" alt=" ">
                </section>
     <!--  <div class="language_top_bar">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-right">
                  <div id="google_translate_element"></div>
               </div>
            </div>
         </div>
      </div> -->
      <header class="light-bg">
         <!-- Header top bar starts-->
         <section class="">
            <div class="container theme-container">
               <div class="bg-with-mask box-shadow">
                  <!-- <span class="blue-color-mask color-mask"></span>                            -->
                  <nav class="navbar navbar-default top-navbar">
                     <div class="col-md-3">
                        <div class="navbar-header">                           
                           <a class="logo" href="<?php echo base_url('/')?>"> 
                           <img src="<?php echo base_url('/')?>/assets/img/logo/logo.png" alt=" " /> </a>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <!-- <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                           <ul class="nav navbar-nav">
                              <li><a href="<?php echo base_url('/')?>">Home</a></li>
                              <li><a href="<?php echo base_url('about')?>">About</a></li>
                              <li class="dropdown">
                                 <a href="<?php echo base_url('Products/allProducts/');?>" class="dropdown-toggle">
                                 Shop
                                 </a>                                
                              </li>
                              <li class="dropdown">
                                 <a href="<?php echo base_url('contact');?>" class="dropdown-toggle">Contact Us</a>
                              </li>
                              <li><a href="<?php echo base_url('blog');?>" class="dropdown-toggle" >Blog</a></li>
                              <li class="dropdown">
                                 <?php if(!empty($this->session->userdata('user_id'))){ ?>
                                 <a href="<?php echo base_url('Login/logout');?>" class="dropdown-toggle" >Logout</a> 
                                 <?php } else { ?>
                                 <a href="<?php echo base_url('Login');?>" class="dropdown-toggle" >Login</a> 
                                 <?php } ?>
                              </li>
                               <li id="donate"><a href="<?php echo base_url('Donate');?>" class="dropdown-toggle btn btn-success" >Donate</a></li>
                           </ul>
                        </div> -->
                     </div>
                     <div class="col-md-3">
                        <div class="right_side_top">
                           <form method='post' action="<?= base_url() ?>search/loadRecord">
                              <ul>
                                 <li><a href="<?php echo base_url() ?>myaccount"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                 <!--<li><a href="<?php echo base_url('wishlist');?>" class="dropdown-toggle" ><i class="fa fa-heart"></i><sup>-->
                                 <!-- <?php if($wishlist_count > 0){ echo $wishlist_count; } else { echo 0;} ?>-->
                                 <!--    </sup></a></li>-->
                                 <li> 
                                    <a class="" href="<?php echo base_url() ?>cart"  role="button">
                                    <i class="fa fa-shopping-bag"  aria-hidden="true"><sup><?php if(!empty($this->session->userdata()['cart_contents']['total_items'])){ echo $this->session->userdata()['cart_contents']['total_items']; } else { echo 0;} ?></sup></i>
                                    </a>
                                 </li>
                                 <li><a href="#search"><i class="fa fa-search"></i></a></li>
                              </ul>
                           </form>
                        </div>
                     </div>
                  </nav>
               </div>
            </div>
         </section>
         <!-- /Header top bar ends -->   
      </header>
      <!-- /Header -->
      <!-- search -->
<script type="text/javascript">
   function googleTranslateElementInit() {
   new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
  function changeCurrency(str){
    $.post("<?= base_url() ?>Products/changeCurrency", {currency: str}, function(result){
    location.reload();
  });
  }

  function Currency(){
    $.get("<?= base_url() ?>Products/getSelectedCurrency", function(data, status){
        
     document.getElementById('currency').innerHTML = data+'<span class="caret"></span>';
     
    });
  }


  </script>



</body>
