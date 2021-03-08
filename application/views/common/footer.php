<!-- FOOTER -->
<footer class="footer footer_bg" style="background-color:#02416d;">
   <div class="bg2-with-mask">
      <span class="color-mask"></span>
      <div class="container theme-container">
         <div class="row">
               <div class="col-md-12">
                  <div class="footer_menu">
                     <ul>
                        <li>
                           <a href="<?php echo base_url();?>">Home</a>
                        </li>
                        <li>
                           <a href="<?php echo base_url('Products/allProducts');?>">Shop</a>
                        </li>
                        <li>
                           <a href="<?php echo base_url('blog');?>">Blog</a>
                        </li>
                         <li>
                           <a href="<?php echo base_url('return_policy');?>">Exchange Policy</a>
                        </li> 
                        <li>
                           <a href="<?php echo base_url('shipping');?>">Shipping Policy</a>
                        </li>
                        <li>
                           <a href="<?php echo base_url('terms_condition');?>">Terms & Condition</a>
                        </li>
                        <li>
                           <a href="<?php echo base_url('privacy_policy');?>">Privacy Policy</a>
                        </li>
                     </ul>
                  </div>
               </div>           
         </div>
      </div>
   </div>
   <div class="bg2-with-mask footer-meta copy_right_section">
      <span class="color-mask"></span>                    
      <div class="container theme-container">
         <div class="row">
            <aside class="col-md-6 social_icons_footer">
               <ul>
                  <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
                  <!--<li> <a href="#"> <i class="fab fa-twitter"></i> </a> </li>-->
                  <!--<li> <a href="#"> <i class="fab fa-youtube"></i> </a> </li>-->
                  <li> <a href="#"> <i class="fab fa-instagram"></i> </a> </li>
               </ul>
            </aside>
            <aside class="col-md-6 copy-rights">
               <P> © Copyright 2020 by <a href="#" class="blue-color"> 
                  Hepppp </a> </span>
               </P>
            </aside>            
         </div>
      </div>
   </div>
</footer>
<!-- /FOOTER<- JS Global -->


<!-- Search Form -->
<div id="search"> 
  <span class="close">X</span>
  <form role="search" id="searchform" action="<?php echo base_url('Products/skeyword');?>" method="post">
    <input value="" name="title" type="search" placeholder="Type to search"/>
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.0/rangeslider.min.js"></script>
<script src="<?php echo base_url('assets/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/owl-carousel/owl.carousel.min.js')?>"></script>  
<script src="<?php echo base_url('assets/plugins/bootstrap-select/js/bootstrap-select.min.js')?>"></script>   
<script src="<?php echo base_url('assets/js/jquery.subscribe-better.js')?>"></script>     
<!-- JS Page Level -->
<script src="<?php echo base_url('assets/js/moment-with-locales.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/countdown/jquery.plugin.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/countdown/jquery.countdown.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/theme.js')?>"></script>
<script src="<?php echo base_url('assets/js/rangeSlider.js')?>"></script>
<script src="<?php echo base_url('assets/js/owl.carousel.min.js')?>"></script>



<script type="text/javascript">
   $('.sub-menu ul').hide();
   $(".sub-menu a").click(function () {
   $(this).parent(".sub-menu").children("ul").slideToggle("100");
   $(this).find(".right").toggleClass("up");
   });
  
   $('.sub-menu1').click(function(){
      // $(this).next('ul').css('display','block');
      $(this).next('ul').slideToggle('100');
   })
</script>

<!-- Include jQuery library -->
<script>
function updateCartItem(obj, rowid){
	$.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
	if(resp == 'ok'){
		location.reload();
	}else{

	}
	});
}

function d(id){
  var obj1=document.getElementsByClassName(id);
  if(obj1[0].value == 1 ) {

  }else {
  var obj=document.getElementsByClassName(id);
  obj[0].value=parseInt(obj[0].value)-1;
  
  $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:id, qty:obj[0].value}, function(resp){
    if(true){
    document.getElementById(id).innerHTML=resp;
    }else{
      alert('Cart update failed, please try again.');
    }
  });
}
}
function i(id){
 //alert('decrement');
  var obj=document.getElementsByClassName(id);
  obj[0].value=parseInt(obj[0].value)+1;

  $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:id, qty:obj[0].value}, function(resp){
    if(true){
      document.getElementById(id).innerHTML=resp;
    }else{
      alert('Cart update failed, please try again.');
    }
  });
}
</script>
<script type="text/javascript">

$(document).ready(function(){
  $('a[href="#search"]').on('click', function(event) {                    
    $('#search').addClass('open');
    $('#search > form > input[type="search"]').focus();
  });            
  $('#search, #search button.close').on('click keyup', function(event) {
    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
      $(this).removeClass('open');
    }
  });            
});


</script>
<script>
var best_product_slider = $('.best_product_slider');
  if (best_product_slider.length) {
    best_product_slider.owlCarousel({
      items: 4,
      loop: true,
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      autoplayTimeout: 5000,
      nav: true,
      navText: ["next", "previous"],
      responsive: {
        0: {
          margin: 15,
          items: 1,
          nav: false
        },
        576: {
          margin: 15,
          items: 2,
          nav: false
        },
        768: {
          margin: 30,
          items: 3,
          nav: true
        },
        991: {
          margin: 30,
          items: 4,
          nav: true
        }
      }
    });
  }
</script>


