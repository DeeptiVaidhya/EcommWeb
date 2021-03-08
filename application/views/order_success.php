

<?php  $admin_url = $this->config->item('admin_url'); ?>
<div class="container">
   <div class="row">
      <div class="col-lg-12 ord-addr-info">
         <h2 class="ord-succ">Your order has been placed successfully.</h2>
      </div>
      <div class="row">
         <!-- Order status & shipping info -->
         <div class="">
            <h4> Shipping Address</h4>
            <div class="col-md-12">
               <ul>
                  <li><?php echo $order['name']; ?></li>
                  <li><?php echo $order['email']; ?></li>
                  <li><?php echo $order['phone']; ?></li>
                  <li><?php echo $order['address']; ?></li>
               </ul>
            </div>
         </div>
         <br>    
         <div class="col-md-6">
            <p><b>Reference ID</b> #<?php echo $order['id']; ?></p>
            <p><b>Total</b> <?php echo '$'.$order['grand_total'].' USD'; ?></p>
         </div>
      </div>
      <div class="col-md-6">
         <!-- Order items -->
         <div class="row ord-items">
            <?php if(!empty($order['items'])){ foreach($order['items'] as $item){ ?>
            <div class="img" style="height: 75px; width: 75px;">
               <img class="card-img rounded-0" src="<?= $admin_url ?>/assets/images/<?= $item['image']; ?>"  alt=""> 
            </div>
            <div class="col-sm-4">
               <p><b><?php echo $item["name"]; ?></b></p>
               <p><?php echo '$'.$item["price"].' USD'; ?></p>
               <p>QTY: <?php echo $item["quantity"]; ?></p>
            </div>
            <div class="col-sm-2">
               <p><b><?php echo '$'.$item["sub_total"].' USD'; ?></b></p>
            </div>
            <?php } } ?>
         </div>
      </div>
   </div>
</div>