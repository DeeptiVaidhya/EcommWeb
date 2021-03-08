<?php  $admin_url = $this->config->item('admin_url'); ?>


  <?php 
    if(!empty($this->session->userdata('currency'))){
      $currency_session = $this->session->userdata('currency');
      $currency = $currency_session;
    } 
    else { 
      $currency = '₹';
      
    }
    ?>

<!--<div class="item active inner_pages">-->
<!--   <img src="<?php echo base_url('assets/img/cart.jpg');?>" alt=" ">                      -->
<!--   <div class="theme-container container">-->
<!--      <div class="caption-text">-->
<!--         <div class="cart_banner">-->
<!--            <div class="inner_bg">-->
<!--               <h3>Cart List</h3>-->
<!--            </div>-->
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<!--</div>-->
<style>
	input#coupon_input {
    width: 153px;
    height: 38px;
    /* margin-bottom: 13px;
     margin-top: 67px; */
}
	</style>
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
                           <th scope="col">Size</th>
                           <th scope="col">Color</th>
                           <th scope="col">Price</th>
                           <th scope="col">Quantity</th>
                           <th scope="col">Total</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $this->total_amount=0; ?>
                        <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){
                                               
                           $this->total_amount = $this->total_amount + $item['subtotal']; 
                                             
                           ?>
                        <tr>
                           <td>
                              <div class="media">
                                 <div class="d-flex">
                                    <img class="card-img rounded-0" src="<?= $admin_url ?><?=  $item['image']; ?>"  alt="">
                                 </div>
                                 <div class="media-body">
                                    <?php echo $item["name"]; ?>
                                 </div>
                              </div>
                           </td>
                           <td><?= empty($item['size'])?'':$item['size'] ?></td>
                           <td><?= empty($item['color'])?'':$item['color'] ?></td>
                           
                           <td><?= $currency ?> <?php echo $item["price"]; ?></td>
                           
                           <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                            <td id="<?= $item['rowid'] ?>"><?= $currency ?> <?= $item['subtotal'] ?></td>
                           <td>
                              <a href="<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                        <?php } }else{ 
                          ?>
                        <tr>
                           <td colspan="6">
                              <p>Your cart is empty.....</p>
                           </td>
                           <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               
                
               <div class="cupon_text float-right">
               	<?php if($this->session->flashdata("coupon_result")): ?>
               	<div class="alert"><?= $this->session->flashdata("coupon_result") ?></div>
               <?php endif ?>
               	<form action="<?= base_url() ?>Cart/applyCoupon" method="post">
	               	<input type="text" name="coupon" id="coupon_input" class="form-control" ><br>
	               	<button type="submit" id="coupon" class="btn btn-primary">Apply Coupon</button>
               </form>
                  <a class="btn_1 " href="">Update Cart</a>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="cart_subtotal_name">
                  <ul>
                     <li>
                        <h5>Subtotal</h5>
                     </li>
                     <li>
                        <h5 class="text-right"><?= empty($currency)?'$':$currency ?><?= $this->total_amount ?></h5>
                     </li>
                     <!-- <li>
                        <h5>Shipping</h5>
                     </li>
                     <li>
                        <h5 class="text-right"><i class="fas fa-rupee-sign"></i>20.00</h5>
                     </li> -->
                     <li>
                        <h5>Coupon Discount</h5>
                     </li>
                     <li>
                        <?php if(!empty($this->session->userdata('amount'))) { ?>
                        <h5 class="text-right"><?= empty($currency)?'$':$currency ?><?= $this->session->userdata('amount') ?></h5>
                        <?php } else { ?>
                        <h5 class="text-right"><?= empty($currency)?'$':$currency ?></i>00.00</h5>
                        <?php } ?>
                     </li>
                     <li>
                        <h5>Total</h5>
                     </li>
                     <li>
                        <?php if(!empty($this->session->userdata('amount'))) { ?>
                        <h5 class="text-right"><?= empty($currency)?'$':$currency ?></i><?= $this->total_amount-$this->session->userdata('amount') ?></h5>
                        <?php } else {?>
                        <h5 class="text-right"><?= empty($currency)?'$':$currency ?><?= $this->total_amount ?></h5>
                        <?php } ?>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="<?php echo base_url('/')?>">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="<?php echo base_url('checkout'); ?>">Proceed to checkout</a>
         </div>
      </div>
   </div>
</section>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
   / Update item quantity /
   function updateCartItem(obj, rowid){
   $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
   if(resp == 'ok'){
   location.reload();
   }else{
   
   }
   });
   }
   
   function d(id){
    //alert(id);
     // alert('decrement');
     var obj1=document.getElementsByClassName(id);
     if(obj1[0].value == 1 ) {
   
     }
     else {
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

$("form").submit(function(e){
	var Amount = $('#coupon_input').val();
	if(Amount.isInteger(value)){
		return true;
	}
	else {
        e.preventDefault();
        }
	
    });
	// function applyCoupon(){

	// }
</script>