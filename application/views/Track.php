<style>

</style>

<style>
    .hh-grayBox {
    background-color: #F8F8F8;
    margin-bottom: 20px;
    padding: 0px;
    margin-top: 0px;
}
.order-tracking {
    text-align: center;
    width: 25%;
    position: relative;
    display: inline-block;
}
img {
    min-width: 56px;
    width: 62px;
    height: 85px;
    object-fit: cover;
}
.order-tracking.completed .is-complete {
    border-color: #27aa80;
    border-width: 0px;
    background-color: #27aa80;
}
.order-tracking .is-complete {
    display: block;
    position: relative;
    border-radius: 50%;
    height: 20px;
    width: 20px;
    border: 0px solid #AFAFAF;
    background-color: #f7be16;
    margin: 0 auto;
    transition: background 0.25s linear;
    -webkit-transition: background 0.25s linear;
    z-index: 2;
}
</style>
<?php  $admin_url = $this->config->item('admin_url'); ?>
 <div class="item active inner_pages">
   <img src="<?= base_url() ?>assets/img/cart.jpg" alt=" ">
   <div class="theme-container container">
      <div class="caption-text">
         <div class="cart_banner">
            <div class="inner_bg">
               <h3>Tracking Page</h3>
            </div>
         </div>
      </div>
   </div>
</div>

<br>
<div class="container">    
    <div class="row">
        <div class="delivery_address">
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="address_box">
                        <h4>Delivery Address</h4>
                        <h5><?= $invoice_detail->customer_address ?></h5>
                        <p>
                        indore
                        </p>
                        <h5>Phone Number</h5>
                        <ul>
                            <li><?= $invoice_detail->customer_phone ?></li>
                           
                        </ul>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="invoice_download">
                        <h4>More actions</h4>
                        <div class="col-md-8">
                            <p><i class="far fa-file-alt"></i> Download Invoice</p>
                        </div>
                        <div class="col-md-4">
                            <a href="#"> Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php if(!empty($tracking->error)){ ?>
        <div class="alert alert-danger"><?= $tracking->error ?></div>
    <?php } ?>
	<div class="row">
        <div class="tracking_dtail_box">
            <div class="col-md-12">
                            <div class="order_list">
                <div class="span5">
            <table class="table table-striped table-condensed">
                   
              <tbody>
                <tr>
                    <td>
                        <img src="<?= $admin_url ?><?= empty($product_detail->image)?'':$product_detail->image ?>">
                    </td>
                  
                    <td>
                        <p><?= empty($product_detail->name)?'':$product_detail->name ?></p>
                        <p><?= empty($product_detail->price)?'':$product_detail->price ?></p>  
                    </td>
                    <td>       
                        <div class="hh-grayBox">
                        <div class="row justify-content-between">
                        <div class="order-tracking completed">
                        <span class="is-complete"></span>
                        <p>Ordered<br><span>27 dec 2019</span></p>
                        </div>

                        <div class="order-tracking completed">
                        <span class="is-complete"></span>
                        <p>packed<br><span>27 dec 2019</span></p>
                        </div>

                        <div class="order-tracking">
                        <span class="is-complete completed"></span>
                        <p>Shipped<br><span>Tue, June 25</span></p>
                        </div>
                        <div class="order-tracking">
                        <span class="is-complete"></span>
                        <p>Delivered<br><span>Fri, June 28</span></p>
                        </div>

                        </div>
                        </div>
                    </td>
                    <td>
                        <div class="rate_and_review_last">
                            <p>Delivered on Sep 17, 2018</p>
                        <p><a href="#"><i class="fas fa-star"></i> RATE &amp; REVIEW PRODUCT</a></p>
                       <!--  <p><a href="https://www.ganguram.com/sweet/Login/FAQ"><i class="far fa-question-circle"></i> NEED HELP?</a></p> -->
                        <form action="<?= base_url() ?>Myaccount/cancelOrder" method="post"><button type="submit" class="btn btn-default cancel_order" name="order_id" value="<?= $invoice_detail->id ?>">Cancel</button>
                        </div>
                    </td>                                     
                </tr>                                
              </tbody>
            </table>

            </div>
            </div>
            </div> 
            <div class="col-md-12 tracking_total_border">
                <div class="tracking_total">
                  <!--   <p>Total Rs.75</p> -->
                </div>
            </div>
        </div>
    </div>
</div>


