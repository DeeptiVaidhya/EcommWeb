

<?php
//  $post = [
// 'email' => 'tulazpokharel@gmail.com',
// 'password' => 'Hepppp@0801',

// ];

// $ch = curl_init('https://apiv2.shiprocket.in/v1/external/auth/login');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// // execute!
// $response = curl_exec($ch);

// // close the connection, release resources used
// curl_close($ch);

// // do anything you want with your response
// $token = json_decode($response);exit;


// error_reporting(1);
// $url = "https://apiv2.shiprocket.in/v1/external/courier/
// serviceability?pickup_postcode=452001&delivery_postcode=455001&weight=1.00&
// cod=0";
// $curl = curl_init();

// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json',
// 'Authorization: Bearer '.$token->token]);
// $result = curl_exec($curl);
// print_r($result);die;
// curl_close($curl);
// echo "<pre>";print_r(json_decode($result, true));


?>
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
               <h3>Cart List</h3>
            </div>
         </div>
      </div>
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
                           <th scope="col">Price</th>
                           <th scope="col">Quantity</th>
                           <th scope="col">Total</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $this->total_amount=0; ?>
                        <?php if($this->cart->total_items() > 0){
                         foreach($this->cart->contents() as $item){
                                               
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
                           <td><?= $currency ?> <?php echo $item["price"]; ?></td>
                           
                           <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                           <td id="<?= $item['rowid'] ?>"><?= $item['subtotal'] ?></td>
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
                  <a class="btn_1" href="">Update Cart</a>
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
                        <h5 class="text-right"><?= $currency ?><?= $this->total_amount ?></h5>
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
                        <?php if(!empty($coupon)) { ?>
                        <h5 class="text-right"><?= $currency ?> <?= $coupon ?></h5>
                        <?php } else { ?>
                        <h5 class="text-right"><?= $currency ?> 00.00</h5>
                        <?php } ?>
                     </li>
                     <li>
                        <h5>Total</h5>
                     </li>
                     <li>
                        <?php if(!empty($coupon)) { ?>
                        <h5 class="text-right"><?= $currency ?> <?= $this->total_amount-$coupon ?></h5>
                        <?php } else {?>
                        <h5 class="text-right"><?= $currency ?> <?= $this->total_amount ?></h5>
                        <?php } ?>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="<?php echo base_url('/')?>">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="<?php echo base_url('payment/Detail/PaymentOption'); ?>">Proceed to Payment</a>
         </div>
      </div>
   </div>
</section>
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
</script>