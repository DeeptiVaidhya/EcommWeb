<style>
.razorpay-payment-button{
  background-image: url(../../assets/img/razorpay.png);
  background-repeat: no-repeat;
  background-position: 50% 50%;
  text-indent: -9990px;
  height: 50px;
  width: 200px;
  border: none;
}
</style>
<?php 
  if(!empty($this->session->userdata('currency'))){
      $currency_session = $this->session->userdata('currency');
      $currency = $currency_session;
    } 
    else { 
       $currency = '₹';
    }
   $currency_option =  array('₹'=>'INR','£'=>'GBP','$'=>'USD','€'=>'EUR','A$'=>'AUD','¥'=>'JPY','C$'=>'CAD','NZ$'=>'NZD');
    
 $admin_url = $this->config->item('admin_url');
 ?>
<!-- <div class="item active inner_pages">-->
<!--  <img src="<?php echo base_url('assets/img/cart.jpg');?>" alt=" ">                      -->
<!--  <div class="theme-container container">-->
<!--    <div class="caption-text">-->
<!--      <div class="cart_banner">-->
<!--        <div class="inner_bg">-->
<!--        <h3>Payment Page</h3>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<div class="container">
    <div class="row">
       <div class="col-md-4 col-md-offset-4 payment_method well" id="">
          <h3>Select payment method</h3>
          <!--<a href="<?php  echo base_url('request/sendRequest');?>"><img src="<?php echo base_url('assets/img/ccavenue.png')?>"></a>-->
          <form action="<?php  echo base_url('razorpay/success')?>" method="POST">
            <script
              src="https://checkout.razorpay.com/v1/checkout.js"
              data-key="rzp_test_xcuu3CRsMZ5qt0"
              data-amount="<?php echo $this->cart->total().'00';?>"
              data-currency = "<?php echo $currency_option[$currency]; ?>"
              data-name="Hepppp.com"
              data-description="Test Txn with RazorPay"
              data-image="<?php echo base_url('/assets/img/logo/logo.png')?>"
              data-prefill.name="Ratan Singh"
              data-prefill.email="psinghvee@gmail.com"
              data-theme.color="#F37254">
            </script>
          <input type="hidden" value="Hidden Element" name="hidden">
          </form>
       </div>
    </div>
</div>

