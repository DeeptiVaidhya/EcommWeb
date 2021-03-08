<style>
    i.fa.fa-star {
    color: #e0e01d;
}
</style>
<?php  $admin_url = $this->config->item('admin_url'); 
if(!empty($s_products->thumbnails_image)){
$img = explode(',',$s_products->thumbnails_image); 
}
if(!empty($s_products->image)) {
  $main_image = $s_products->image;
}

?>
<style>
.image-1,.thumbnails label[for="image1"] {
  background-image: url('<?= $admin_url ?><?= $main_image ?>');
} 
 .image-2,.thumbnails label[for="image2"] {
   background-image: url('<?= $admin_url ?><?= $second_image ?>');
}
.image-3,
.thumbnails label[for="image3"] {
   background-image: url('<?= $admin_url ?><?= $third_image ?>');
}
.image-4,.thumbnails label[for="image4"] {
  background-image: url('<?= $admin_url ?><?= $fourth_image ?>');
}
section {
  padding: 60px 0;
}

section .section-title {
  text-align: center;
  color: #007b5e;
  margin-bottom: 50px;
  text-transform: uppercase;
}
#tabs{
  background: #007b5e;
  color: #eee;
}
#tabs h6.section-title{
  color: #eee;
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
  color: #f3f3f3;
  background-color: transparent;
  border-color: transparent transparent #f3f3f3;
  border-bottom: 4px solid !important;
  font-size: 20px;
  font-weight: bold;
}
#tabs .nav-tabs .nav-link {
  border: 1px solid transparent;
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem;
  color: #eee;
  font-size: 20px;
}
.average-rating h2{
   margin:0px;
   font-size:80px;
}
.average-rating p{
  margin:0px;
  font-size:20px;
}
.fa-star,.fa-star-o,.fa-star-half-o{
  color:#FDC91B;
  font-size:25px !important; 
}



</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<!-- <div class="item active inner_pages">-->
<!--    <img src="<?php echo base_url('assets/img/cart.jpg');?>" alt=" ">                      -->
<!--    <div class="theme-container container">-->
<!--      <div class="caption-text">-->
<!--        <div class="cart_banner">-->
<!--          <div class="inner_bg">-->
<!--          <h3>Shop</h3>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--</div>-->

<!-- =============================== Most Popular ============================= -->
<div class="container">
   <?php if(!empty($s_products)){ ?> 
   <div class="row">
      <div class="single-product-details">
         <div class="preview col-md-5">
            <!-- <div class="preview-pic tab-content">
              <div class="tab-pane active" id="pic-0"><img src="<?= $admin_url ?><?= $main_image ?>" /></div>
            </div>
            <ul class="preview-thumbnail nav nav-tabs">
               <?php for($i=0;$i<count($img);$i++) { ?>
              <li><a data-target="#pic-<?php echo $i;?>" data-toggle="tab"><img src="<?= $admin_url ?>assets/images/product_image/<?= $img[$i] ?>" /></a></li>
              <?php } ?>
            </ul> -->


            <div class="preview-pic tab-content">
              <img id="expandedImg" src="<?= $admin_url ?><?= $main_image ?>" style="width:100%">
            </div>
            <ul class="preview-thumbnail nav nav-tabs">
              <?php if(!empty($img)){ for($i=0;$i<count($img);$i++) { ?>
              <li><img src="<?= $admin_url ?>assets/images/product_image/<?= $img[$i]?>" style="width:100%" onclick="myFunction(this);">
              <?php } } ?></li>
              <li><img src="<?= $admin_url ?><?= $main_image ?>" style="width:100%" onclick="myFunction(this);">
              </li>
            </ul>
      </div>


          <div class="col-md-7 single_products">
            <div class="product-content">
               <div class="product-name">
                  <h4><?php echo $s_products->name; ?></h4>
               </div>
               <div class="product-price">
                  Price
                  <h4 class="pink-btn-small">
                    <?php 
                      if(!empty($this->session->userdata('currency'))){
                          $currency_session = $this->session->userdata('currency');
                             echo $currency_session;
                          } else { echo '₹';}?>

                          <?php  echo $s_products->price; ?></h4>
               </div>
               
               <input type="hidden" id="product_id" value="<?= $s_products->id ?>">
               <?php if($s_products->availability==1){?>
                  <p class="in_stock">In Stock</p>
               <?php } else {?>
                  <p class="in_stock">Not Available</p>
               <?php }?>
               <div class="card_area">
                  <div class="product_count d-inline-block">
                     <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                     <input class="input-number" type="number" value="1" min="0" max="10" id="qty">
                     <span class="number-increment"> <i class="ti-plus"></i></span>
                  </div>
                  <div class="cart_or_social_icon">
                     <div class="social_icon">
                        <a href="#" class="fb"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="tw"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="li"><i class="fa fa-linkedin"></i></a>
                     </div>
                  </div>
               </div>

               <div class="form-group col-sm-5">
                <?php $data = json_decode($s_products->attribute_value_id); ?>
                <label class="">Size</label>
                <select class="form-control" id="size">
                    <option>select size</option>
                  <?php foreach($data as $d): 
                    $this->db->select('*');
                    $this->db->from('attribute_value');
                    $this->db->where('id',$d);
                    $name = $this->db->get()->row();
                    if(empty($name) ){
                     continue;
                    }
                    if($name->attribute_parent_id == 4){
                    ?>
                  <option value="<?= $name->value  ?>"><?= $name->value ?></option>
                <?php } endforeach; ?>
                </select>
               </div>

                <div  class="form-group col-sm-5">
                <?php $data = json_decode($s_products->attribute_value_id); ?>
                <label>Color</label>
                <select class="form-control" id="color">
                    <option>select color</option>
                  <?php foreach($data as $d): 
                    $this->db->select('*');
                    $this->db->from('attribute_value');
                    $this->db->where('id',$d);
                    $name = $this->db->get()->row();
                    if(empty($name) ){
                     continue;
                    }
                    if($name->attribute_parent_id ==5){
                    ?>
                  <option value="<?=  $name->value  ?>"><?= $name->value ?></option>
                <?php } endforeach; ?>
                </select>
               </div>
               
               <div  class="form-group col-sm-5">
                <?php $data = json_decode($s_products->attribute_value_id); ?>
                <label>Alternate Price</label>
                <select class="form-control" id="color">
                    <option>Alterbate Price</option>
                  <?php foreach($data as $d): 
                    $this->db->select('*');
                    $this->db->from('attribute_value');
                    $this->db->where('id',$d);
                    $name = $this->db->get()->row();
                    if(empty($name) ){
                     continue;
                    }
                    if($name->attribute_parent_id ==6){
                    ?>
                  <option value="<?=  $name->value  ?>"><?= $name->value ?></option>
                <?php } endforeach; ?>
                </select>
               </div>



               <!-- <div class="description">
                 <h6>Description</h6>
                 <p><?php echo $s_products->description;?></p>
               </div> -->
               <div class="shop_now_btn">
                  <a class="btn btn-default btn-design" id="addToCart" >Add To Cart</a>
               </div>
            </div>
          </div>
      </div>
      <div class="container">
        <div class="rating-part">
           <div style="clear: both;"></div>
           <div class="reviews">
              <h1>Reviews</h1>
           </div>
           <div class="comment-part">
              <?php 
                if(!empty($reviews)){
                foreach($reviews as $data) {  ?>
              <div class="user-img-part">
                 <div class="user-text">
                    <p><?= $this->session->userdata('user_name'); ?></p>
                    <span>Report</span>
                 </div>
                 <div style="clear: both;"></div>
              </div>
              <div class="comment">
                 <?php  if($data['rating']==1) { ?>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star-o"></i>
                 <i aria-hidden="true" class="fa fa-star-o"></i>
                 <i aria-hidden="true" class="fa fa-star-o"></i>
                 <i aria-hidden="true" class="fa fa-star-o"></i>
                 <?php  } ?>
                 <?php  if($data['rating']==2) { ?>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star-o"></i>
                 <i aria-hidden="true" class="fa fa-star-o"></i>
                 <i aria-hidden="true" class="fa fa-star-o"></i>
                 <?php  } ?>
                 <?php  if($data['rating']==3) { ?>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star-o"></i>
                 <i aria-hidden="true" class="fa fa-star-o"></i>
                 <?php  } ?>
                 <?php  if($data['rating']==4) { ?>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star-o"></i>
                 <?php  } ?>
                 <?php  if($data['rating']==5) { ?>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <i aria-hidden="true" class="fa fa-star"></i>
                 <?php  } else { ?>
                 <?php } ?>
                 <p><?= $data['comment']; ?></p>
              </div>
              <div style="clear: both;"></div>
              <?php  }   }  else {echo 'no review in this product';}?>
           </div>
        </div>
      </div>
<section id="tabs">
   <div class="container rating_tab">
      <div class="row">
         <div class="col-xs-12 ">
            <nav>
               <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Review&Rating</a>
               </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
               <div class="tab-pane fade show active in" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <?php echo $s_products->description;?>
               </div>

               <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <!-- <div class="row">
                   <div class="form-group col-sm-10" id="result_review">
                </div> -->

                <div class="row">
                  <div class="form-group col-sm-10" id="result_review">  </div> 
                  </div>
                  <div class="row">
                    

                     <div class="form-group col-sm-12" style="font-size: 34px;">
                        <span class="rating fa fa-star-o" value='1' id="<?= $s_products->id ?>"  ><i></i></span>
                        <span class="rating fa fa-star-o" value='2' id="<?= $s_products->id ?>" ></span>
                        <span class="rating fa fa-star-o" value='3' id="<?= $s_products->id ?>"  ></span>
                        <span class="rating fa fa-star-o" value='4' id="<?= $s_products->id ?>"  ></span>
                        <span class="rating fa fa-star-o" value='5' id="<?= $s_products->id ?>"></span>
                     </div>
                     <div class="review_form">
                        <div class="form-group col-sm-10">
                           <textarea rows="4" cols="50" class="form-control" id="comments"></textarea>
                        </div>
                         <div class="form-group col-sm-10" id="comments_errors">

                          
                        </div>
                        <div class="col-sm-6 review_class_btn">
                           <button type="button" id="review" class="btn btn-success">Review</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>         
         </div>
      </div>
   </div>
</section>

<div class="tabination">
   <div class="product-tabs" role="tabpanel">
      <div class="tab-content">
         <!-- =============================== Most Popular ============================= -->
         <div id="most-popular" class="tab-pane fade active in" role="tabpanel">
            <div class="col-md-12 product-wrap default-box-shadow related_products sn_product">
            <div class="new_arrival_heading">
            <h4 class="related">Related Products</h4>
            </div>
               <?php if(!empty($arrival_products)){ foreach($arrival_products as $row){ ?>
               <a href="<?php echo base_url('Products/Single_Product/'.$row['id']);?>">
                <div class="col-md-3 col-sm-6">
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
               </a>
               <?php } }else{ ?>
               <p>Product(s) not found...</p>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?php } ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
  }
  $(document).ready(function(){
    var value=0;
    var id=0;
    $('.rating').click(function(){
      $(this).removeClass("fa fa-star-o");
      $(this).addClass("fa fa-star");
      $(this).prevAll().removeClass("fa fa-star-o");
      $(this).prevAll().addClass("fa fa-star");
      $(this).nextAll().addClass("fa fa-star-o");
      value=$(this).attr("value");
      id=$(this).attr('id');
    })
      $('#review').click(function(){
        var comment=$('#comments').val();
        $.post("<?= base_url() ?>Products/product_review", {product_id:id,rating_value:value,comment:comment}, function(result){
        if($('#comments').val() == '') {
          $('#comments_errors').html('<p class="alert alert-danger">Comments is required</p>');
        }
        else if(value == 0){
          $('#result_review').html('<p class="alert alert-danger">Rating is required</p>');    
        }else {
          $('#comments_errors').html('');
          if(result == 'Login first for review') {
            $('#result_review').html('<p class="alert alert-danger">'+result+'<p>');
          }else {
           $('#result_review').html('<p class="alert alert-success">'+result+'<p>');
          }
        }
      })
    })
    
    $("#addToCart").click(function()
    {
        var product_id = $('#product_id').val();
        var qty = $('#qty').val();
        var size = $('#size').val();
        var color = $('#color').val();
        
        // console.log(size+' '+color);
        var post_data = {
            proID : product_id,
            qty : qty,
            size:size,
            color:color
        }
        $.post("<?= base_url() ?>Welcome/addCartByJquery",post_data, function(data, status)
        {
             window.location.href="<?= base_url() ?>cart";
        });
    });
    
  }); 
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


