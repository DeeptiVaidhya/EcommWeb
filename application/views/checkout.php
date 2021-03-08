<style>
.billing_det_form{
    box-shadow: 0px 3px 6px #ccc;
    border: 0px;
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
    $admin_url = $this->config->item('admin_url'); ?>

<!--<div class="item active inner_pages">-->
<!--     <img src="<?= base_url() ?>assets/img/cart.jpg" alt=" ">                      -->
<!--     <div class="theme-container container">-->
<!--        <div class="caption-text">-->
<!--    <div class="cart_banner">-->
<!--      <div class="inner_bg">-->
<!--      <h3>Order Preview</h3>-->
<!--      </div>-->
<!--    </div>-->
          
<!--        </div>-->
<!--     </div>-->
<!--  </div>-->

<div class="checkout checkout_inner_page">
<div class="container" id="example1">
   <div class="row">
       
      <div class="col-md-6">
         <!-- Order items -->
         <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>                  
                  <th>Product</th>
                  <th>Name</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-right">Subtotal</th>
               </tr>
            </thead>
            <tbody>
               <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){ ?>
               <tr>
                  <td>
                     <img class="card-img rounded-0" src="<?= $admin_url ?><?=  $item['image']; ?>"  alt="">
                      
                     </div>
                  </td>
                  <td><?php echo $item["name"]; ?></td>
                  <td class="text-center"><?= $currency ?> <?php echo $item["price"]; ?></td>
                  <td class="text-center"><?php echo $item["qty"]; ?></td>
                  <td class="text-right"><?= $currency  ?> <?php echo $item["subtotal"]; ?></td>
               </tr>
               <?php } }else{ ?>
               <tr>
                  <td colspan="5">
                     <p>No items in your cart...</p>
                  </td>
               </tr>
               <?php } ?>
            </tbody>
            <tfoot>
               <tr>
                  <td colspan="3"></td>
                  <?php if($this->cart->total_items() > 0){ ?>
                  <td class="text-right">
                     <strong>Total <?php echo $this->cart->total()?> <?= $currency ?></strong>
                  </td>
                  <?php } ?>
               </tr>
            </tfoot>
         </table>
         </div>

         <!-- Shipping address -->
         <form class="form-horizontal" action="<?= base_url('login')?>" method="post">
            <div class="footBtn checkout_page">
               <a href="<?php echo base_url('cart/'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Back to Cart</a>
               <!--<button type="submit" name="placeOrder" value="submit" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></button>-->
            
           
            </div>
         </form>
      </div>
      <div class="col-md-6">
         <div class="billing_det_form">
            <form action="<?= base_url() ?>payment/Detail/Payment" method="post">
               <div class="row">
                 <div class="col-sm-6">
                     <!--   first row   -->
                     <div class="row">
                        <div class="col-sm-12">
                           <label>First Name *</label>
                           <input type="text" name="first_name" class="form-control" value="<?php echo $this->session->userdata('firstname'); ?>" >
                           <?php if(form_error('first_name')){ ?>
                           <div class="alert alert-danger"><?= form_error('first_name') ?></div>
                           <?php } ?>
                        </div>
                        <div class="col-sm-12">
                           <label>Last Name *</label>
                           <input type="text" name="last_name" class="form-control" value="<?php echo $this->session->userdata('lastname'); ?>" >
                           <?php if(form_error('last_name')){ ?>
                           <div class="alert alert-danger"><?= form_error('last_name') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <!--   second row   -->
                     <!--<div class="row">-->
                     <!--   <div class="col-sm-12">-->
                     <!--      <label>COMPANY NAME (OPTIONAL)</label>-->
                     <!--      <input type="text" name="company_name" class="form-control">-->
                     <!--      <?php if(form_error('company_name')){ ?>-->
                     <!--      <div class="alert alert-danger"><?= form_error('company_name') ?></div>-->
                     <!--      <?php } ?>-->
                     <!--   </div>-->
                     <!--</div>-->
                     <!--   third row   -->


                       <div class="row">
                        <div class="col-sm-12">
                           <div class="state_country">
                              <label>COUNTY *</label><br>
                             <input type="text" name="state" class="input-mini">
                            </div>
                           <?php if(form_error('state_country')){ ?>
                           <div class="alert alert-danger"><?= form_error('state_country') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <!--   fourth row   -->
                     <div class="row">
                        <div class="col-sm-12">
                           <label>Shipping ADDRESS *</label>
                           <input type="text" name="street1" class="form-control"><br>
                           <?php if(form_error('street1')){ ?>
                           <div class="alert alert-danger"><?= form_error('street1') ?></div>
                           <?php  } ?>
                           <input type="text" name="street2" class="form-control street_input_tow" >
                           <?php if(form_error('street2')){ ?>
                           <div class="alert alert-danger"><?= form_error('street2') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <!--   fifth row   -->
                     <!--   sixth row   -->
                  </div>
                  <div class="col-sm-6">
                     <div class="row">
                        <div class="col-sm-12">
                           <label>POSTCODE / ZIP *</label>
                           <input type="text" name="zip_code" class="form-control">
                           <?php if(form_error('zip_code')){ ?>
                           <div class="alert alert-danger"><?= form_error('zip_code') ?></div>
                           <?php  } ?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <label>PHONE *</label><br>
                           <input type="text" name="phone" class="form-control" value="<?php echo $this->session->userdata('phone'); ?>" readonly>
                           <?php if(form_error('phone')){ ?>
                           <div class="alert alert-danger"><?= form_error('phone') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="state_country">
                              <label>STATE *</label><br>
                              <input type="text" name="state">
                            </div>
                           <?php if(form_error('state_country')){ ?>
                           <div class="alert alert-danger"><?= form_error('state_country') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <label>EMAIL ADDRESS *</label>
                           <input type="email" name="email" class="form-control" value="<?php echo $this->session->userdata('email'); ?>" readonly>
                           <?php if(form_error('email')){ ?>
                           <div class="alert alert-danger"><?= form_error('email') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <label>TOWN / CITY *</label>
                           <input type="text" name="city" class="form-control">
                           <?php if(form_error('city_name')){ ?>
                           <div class="alert alert-danger"><?= form_error('city_name') ?></div>
                           <?php  } ?>
                        </div>
                     </div>
                  </div>                   
                  <br>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                      <div class="payment_btn">
                        <button class="btn btn-primary" type="submit">Payment</button>
                      </div>
                  </div>
               </div>
          </form>
          <form>
zip: <input type="text" name="zip" value="46032"> <a href="#" onclick="getLocation()">Get Address</a>
</form>
           
         </div>
      </div>
   </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script language="javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script language="javascript">
function getLocation(){
  getAddressInfoByZip(document.forms[0].zip.value);
}

function response(obj){
  console.log(obj);
}
function getAddressInfoByZip(zip){
  if(zip.length >= 5 && typeof google != 'undefined'){
    var addr = {};
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'address': zip }, function(results, status){
      if (status == google.maps.GeocoderStatus.OK){
        if (results.length >= 1) {
      for (var ii = 0; ii < results[0].address_components.length; ii++){
        var street_number = route = street = city = state = zipcode = country = formatted_address = '';
        var types = results[0].address_components[ii].types.join(",");
        if (types == "street_number"){
          addr.street_number = results[0].address_components[ii].long_name;
        }
        if (types == "route" || types == "point_of_interest,establishment"){
          addr.route = results[0].address_components[ii].long_name;
        }
        if (types == "sublocality,political" || types == "locality,political" || types == "neighborhood,political" || types == "administrative_area_level_3,political"){
          addr.city = (city == '' || types == "locality,political") ? results[0].address_components[ii].long_name : city;
        }
        if (types == "administrative_area_level_1,political"){
          addr.state = results[0].address_components[ii].short_name;
        }
        if (types == "postal_code" || types == "postal_code_prefix,postal_code"){
          addr.zipcode = results[0].address_components[ii].long_name;
        }
        if (types == "country,political"){
          addr.country = results[0].address_components[ii].long_name;
        }
      }
      addr.success = true;
      for (name in addr){
          console.log('### google maps api ### ' + name + ': ' + addr[name] );
      }
      response(addr);
        } else {
          response({success:false});
        }
      } else {
        response({success:false});
      }
    });
  } else {
    response({success:false});
  }
}
</script>

<script type="text/javascript">
	$(function() {
	    alert('dsdd')
		// IMPORTANT: Fill in your client key
		var clientKey = "js-9qZHzu2Flc59Eq5rx10JdKERovBlJp3TQ3ApyC4TOa3tA8U7aVRnFwf41RpLgtE7";
		
		var cache = {};
		var container = $("#example1");
		var errorDiv = container.find("div.text-error");
		
		/** Handle successful response */
		function handleResp(data)
		{
			// Check for error
			if (data.error_msg)
				errorDiv.text(data.error_msg);
			else if ("city" in data)
			{
				// Set city and state
				container.find("input[name='city']").val(data.city);
				container.find("input[name='state']").val(data.state);
			}
		}
		
		// Set up event handlers
		container.find("input[name='zip_code']").on("keyup change", function() {
			// Get zip code
			var zip_code = $(this).val().substring(0, 5);
			if (zip_code.length == 5 && /^[0-9]+$/.test(zip_code))
			{
				// Clear error
				errorDiv.empty();
				
				// Check cache
				if (zip_code in cache)
				{
					handleResp(cache[zip_code]);
				}
				else
				{
					// Build url
					var url = "http://www.zipcodeapi.com/rest/"+clientKey+"/info.json/" + zip_code + "/radians";
					
					// Make AJAX request
					$.ajax({
						"url": url,
						"dataType": "json"
					}).done(function(data) {
						handleResp(data);
						
						// Store in cache
						cache[zip_code] = data;
					}).fail(function(data) {
						if (data.responseText && (json = $.parseJSON(data.responseText)))
						{
							// Store in cache
							cache[zip_code] = json;
							
							// Check for error
							if (json.error_msg)
								errorDiv.text(json.error_msg);
						}
						else
							errorDiv.text('Request failed.');
					});
				}
			}
		}).trigger("change");
	});
</script>