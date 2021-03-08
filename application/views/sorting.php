<?php  $admin_url = $this->config->item('admin_url'); ?>

<div class="conainter">
  <div class="row">
  	
         <div class="col-md-3 col-sm-3 fashion-bg allproduct_page">
      		<div class="left_side_bar_home">
         <nav class='animated bounceInDown'>
            <h2 class="filter-title blue-bg-with-shadow">Categories Option</h2>
            <?php if(!empty($Categories)){ foreach($Categories as $row){ ?>
            <div class="overlay">
               <ul>
                  <li><a href="<?php echo base_url('products/searchBycategory/'.$row['id']); ?>">
                     <?php echo $row['name']; ?></a>
                  </li>
               </ul>
               <?php } } else{ ?>
			<img src="<?php echo base_url('assets/product_image/noproduct.png')?>">               <?php } ?>
         </nav>
         </div>
         <div class="money_filter">
            <div class="col-sm-12">
               <div id="slider-range"></div>
            </div>
            <div class="slider-labels col-md-12">
               <div class="col-xs-6 caption">
                  <strong>Min:</strong> <span id="slider-range-value1" class="value" ></span>
               </div>
               <div class="col-xs-6 text-right caption">
                  <strong>Max:</strong> <span id="slider-range-value2" class="value"></span>
               </div>
            </div>
            <div class="filter_slide"><button class="btn btn-primary" id="filter">Filter</button></div>
            <div class="">
               <div class="col-sm-12">
                  <form>
                     <input type="hidden" name="min-value" value="" >
                     <input type="hidden" name="max-value" value="" >
                  </form>
               </div>
            </div>
              <!-- Dropdown Start -->
               <div class="row ">
                  <div class="col-lg-12">
                     <div class="product_top_bar d-flex justify-content-between align-items-center">
                        <div class="single_product_menu product_bar_item">
                     
                        </div>
                        <div class="product_top_bar_iner product_bar_item d-flex">
                           <div class="product_bar_single">
                              <select class="wide drop">
                                 <option data-display="Default sorting" >Default sorting</option>
                            <!--      <option value="1">Popular</option>
                                 <option value="2">Recent </option> -->
                                 <option value="3">Low to High</option>
                                 <option value="4">High to Low</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Dropdown end -->
         </div>        
      	</div>
      	  <div class="col-md-9 col-sm-9 product-wrap default-box-shadow shop_products">
         <?php if(!empty($all_products)){ foreach($all_products as $row){ ?>
         <div class="col-md-4 col-sm-6">
            <div class="item">
               <div class="product-details">
                  <div class="product-media">
                     <img class="card-img rounded-0" src="<?= $admin_url ?><?= $row['image']; ?>"  alt="">
                     <div class="product-overlay">
                        <a class="addcart blue-background fa fa-shopping-cart" href="<?php echo base_url('welcome/addToCart/'.$row['id']); ?>"></a>                                 
                        <a class="likeitem green-background fa fa-heart" href="<?php echo base_url('wishlist/addTowishlist/'.$row['id']); ?>"></a>
                     </div>
                  </div>
                  <div class="product-content">
                     <div class="product-name">
                        <a href="<?php echo base_url('Products/Single_Product/'.$row['id']);?>"><?php echo $row['name']; ?></a>
                     </div>
                     <div class="product-price">
                        <h4 class="pink-btn-small">$<?php echo $row['price']; ?></h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php } }else{ ?>
         <img src="<?php echo base_url('assets/product_image/noproduct.png')?>">
         <?php } ?>
      </div>
     <!-- Product Most Popular Start -->
<section id="product-tabination-1" class="space-bottom-45 new_arrival_bg" style="background: url(./assets/img/new_arrivals.png) no-repeat #efefef;
   background-position: top center;">
   <div class="container theme-container">
      <div class="light-bg product-tabination">
         <div class="col-md-12">
            <div class="new_arrival_heading">
               <h1>New Arrivals</h1>
               <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in
                  laying out print, graphic or web designs   
               </p>
            </div>
         </div>
         <div class="tabination">
            <div class="product-tabs" role="tabpanel">
               <div class="tab-content">
                  <!-- =============================== Most Popular ============================= -->
                  <div id="most-popular" class="tab-pane fade active in" role="tabpanel">
                     <div class="col-md-12 product-wrap default-box-shadow">
                        <?php if(!empty($arrival_products)){ foreach($arrival_products as $row){ ?>
                        <div class="col-md-3 col-sm-6">
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <!--    <span class="hover-image white-bg">
                                       <img class="card-img rounded-0" src="<?= $admin_url ?>/assets/images/<?=  $row['image']; ?>"  alt="">                                
                                       </span>   -->
                                    <img class="card-img rounded-0" src="<?= $admin_url ?><?= $row['image']; ?>"  alt="">
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="<?php echo base_url('welcome/addToCart/'.$row['id']); ?>"></a>                                 
                                       <a class="likeitem green-background fa fa-heart" href="<?php echo base_url('wishlist/addTowishlist/'.$row['id']); ?>"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <!--  <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                       </div> -->
                                    <div class="product-name">
                                       <a href="<?php echo base_url('Products/Single_Product/'.$row['id']);?>"><?php echo $row['name']; ?></a>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small">$<?php echo $row['price']; ?></h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } }else{ ?>
                  <img src="<?php  echo base_url('assets/product_image/noproduct.png')?>">                        <?php } ?>
                     </div>
                     <div class="col-md-12">
                        <div class="shop_now_btn">
                           <a href="<?php echo base_url('Products/allProducts/');?>" class="btn btn-default btn-design">
                           Shop Now
                           </a>
                        </div>
                     </div>
                  </div>
                  <!-- ====================== Best Sellers ======================== -->
                  <div id="best-sellers" class="tab-pane fade" role="tabpanel">
                     <div class="col-md-12 product-wrap default-box-shadow">
                        <div class="title-wrap">
                           <h2 class="section-title">
                              <span>
                              <span class="funky-font blue-tag">Best</span> 
                              <span class="italic-font">Sellers</span>
                              </span>
                           </h2>
                           <div class="poroduct-pagination">
                              <span class="product-slide blue-background next"> <i class="fa fa-chevron-left"></i> </span>
                              <span class="product-slide blue-background prev"> <i class="fa fa-chevron-right"></i> </span>
                           </div>
                        </div>
                        <div class="product-slider owl-carousel owl-theme">
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>                                                            
                                    <img src="assets/img/product/product5.png" alt=" ">               
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                            
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>
                                    <img src="assets/img/product/1.png" alt=" ">
                                    <div class="product-new">
                                       <div class="golden-new-tag new-tag">
                                          <a class="funky-font" href="#">New</a>
                                       </div>
                                    </div>
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                                
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>                                                            
                                    <img src="assets/img/product/product7.png" alt=" ">                                                            
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                                
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>
                                    <img src="assets/img/product/product8.png" alt=" ">
                                    <div class="product-new">
                                       <div class="blue-new-tag new-tag">
                                          <a class="funky-font" href="#">New</a>
                                       </div>
                                    </div>
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                                
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>
                                    <img src="assets/img/product/product5.png" alt=" ">
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                                
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>
                                    <img src="assets/img/product/product6.png" alt=" ">
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                                
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- ====================== Latest Items ======================== -->
                  <div id="latest-items" class="tab-pane fade" role="tabpanel">
                     <div class="col-md-12 product-wrap default-box-shadow">
                        <div class="title-wrap">
                           <h2 class="section-title">
                              <span>
                              <span class="funky-font blue-tag">Latest</span> 
                              <span class="italic-font">Items</span>
                              </span>
                           </h2>
                           <div class="poroduct-pagination">
                              <span class="product-slide blue-background next"> <i class="fa fa-chevron-left"></i> </span>
                              <span class="product-slide blue-background prev"> <i class="fa fa-chevron-right"></i> </span>
                           </div>
                        </div>
                        <div class="product-slider owl-carousel owl-theme">
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>                                                            
                                    <img src="assets/img/product/product9.png" alt=" ">
                                    <div class="product-new">
                                       <div class="golden-new-tag new-tag">
                                          <a class="funky-font" href="#">New</a>
                                       </div>
                                    </div>
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                                
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>
                                    <img src="assets/img/product/product10.png" alt=" ">
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                                
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>                                                            
                                    <img src="assets/img/product/product11.png" alt=" ">
                                    <div class="product-new">
                                       <div class="blue-new-tag new-tag">
                                          <a class="funky-font" href="#">New</a>
                                       </div>
                                    </div>
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                                
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>
                                    <img src="assets/img/product/product12.png" alt=" ">
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                                
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>
                                    <img src="assets/img/product/product9.png" alt=" ">
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                                
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="product-details">
                                 <div class="product-media">
                                    <span class="hover-image white-bg">                                                                <img alt="" src="assets/img/product/cat-7.png">                                                            </span>
                                    <img src="assets/img/product/product10.png" alt=" ">
                                    <div class="product-overlay">
                                       <a class="addcart blue-background fa fa-shopping-cart" href="#"></a>                                                                
                                       <a class="likeitem green-background fa fa-heart" href="#"></a>
                                       <a class="preview pink-background fa fa-eye" href="#product-preview" data-toggle="modal"></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="rating">                                                              
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star active"></span>
                                       <span class="star half"></span>
                                       <span class="star"></span>
                                    </div>
                                    <div class="product-name">
                                       <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                       <h4 class="pink-btn-small"> $50.00 </h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- / Product Most Popular Ends -->
   </div>
  </div>
</div>
<script>
	
    $('.drop').change(function(){
      if($(this).val()==3){
        var value=$(this).val();
         
        window.location.href='<?= base_url() ?>Products/sorting/'+value;
      }
   
          else if($(this).val()==1){
        var value=$(this).val();
        window.location.href='<?= base_url() ?>Products/sorting/'+value;
      }
   
      else if($(this).val()==4){
        var value=$(this).val();
        window.location.href='<?= base_url() ?>Products/sorting/'+value;
      }
     })

</script>