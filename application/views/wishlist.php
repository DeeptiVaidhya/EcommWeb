<?php 

  if(!empty($this->session->userdata('currency'))){
      $currency_session = $this->session->userdata('currency');
      $currency = $currency_session;
    } 
    else { 
       $currency = '₹';
    }

 $admin_url = $this->config->item('admin_url'); ?> 
<div class="item active inner_pages">
  <img src="<?php echo base_url('assets/img/cart.jpg');?>" alt=" ">  
  <div class="theme-container container">
    <div class="caption-text">
      <div class="cart_banner">
        <div class="inner_bg">
        <h3>Wishlist</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Include jQuery library -->
<script>
   function updateCartItem(obj, rowid){
   $.get("<?php echo base_url('wishlist/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
   if(resp == 'ok'){
   location.reload();
   }else{
   
   }
   });
   }   
   function d(id){

     var obj1=document.getElementsByClassName(id);
     if(obj1[0].value == 1 ) {   
     }
     else {
     var obj=document.getElementsByClassName(id);
     obj[0].value=parseInt(obj[0].value)-1;
     
     $.get("<?php echo base_url('wishlist/updateItemQty/'); ?>", {rowid:id, qty:obj[0].value}, function(resp){
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
   
     $.get("<?php echo base_url('wishlist/updateItemQty/'); ?>", {rowid:id, qty:obj[0].value}, function(resp){
       if(true){
         document.getElementById(id).innerHTML=resp;
       }else{
         alert('Cart update failed, please try again.');
       }
     });
   
   }
</script>
<div class="common_banner">
   <div class="inner_bg">
   </div>
</div>
<!-- breadcrumb start-->
<!--================Cart Area =================-->
<section class="cart_area section_padding">
   <div class="container">
   <div class="cart_inner">
      <div class="">
         <div class="row">
            <div class="col-md-12">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">Product</th>
                           <th scope="col">Name</th>
                           <th scope="col">Price</th>
                           <th scope="col">Quantity</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $this->total_amount=0; ?>
                        <?php if($wishlistItems){ foreach($wishlistItems as $item){ ?>
                        <tr>
                           <td>
                              <div class="media">
                                 <div class="d-flex">
                                    <img class="card-img rounded-0" src="<?= $admin_url ?><?=  $item['image']; ?>"  alt="">
                                 </div>
                                 <!--<div style="padding: 30px 0px;">-->
                                    
                                 <!--</div>-->
                              </div>
                           </td>
                           <td><?= $item['name'] ?></td>
                           <td><?= $currency ?> <?php echo $item["price"]; ?></td>
                           <td>
                              <?= $item['qty'] ?>
                           </td>
                           <td>
                            <div class="shop_now_btn">
                            <a class="btn btn-default btn-design" href="<?php echo base_url(); ?>/welcome/addToCart/<?php echo $item['id'];?>">Add To Cart</a>
                         </div>
                          </td>
                          
                          <td>
                              <a href="<?php echo base_url('wishlist/removeItem/'.$item['id']);?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash">
                                
                              </i>
                              </a>                            
                           </td>
                        </tr>
                        <?php } }else{ ?>
                        <tr>
                           <td colspan="6">
                              <p>Your whishlist is empty.....</p>
                           </td>
                           <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
