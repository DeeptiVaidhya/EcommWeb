<?php  $admin_url = $this->config->item('admin_url'); ?>
<div class="item active inner_pages">
   <img src="<?= base_url() ?>assets/img/cart.jpg" alt=" ">
   <div class="theme-container container">
      <div class="caption-text">
         <div class="cart_banner">
            <div class="inner_bg">
               <h3>My Account</h3>
            </div>
         </div>
      </div>
   </div>
</div>
<style>
  .user_dashboard input {
    width:100%;
  }
</style>
<div class="user_dashboard_bg">
   <div class="container">
 
      <div class="row">
         <div class="col-md-3">
            <div class="panel with-nav-tabs panel-default dashboard_tab">
               <div class="panel-heading">
                  <ul class="nav nav-tabs">
                     <li class="active">
                        <a href="#tabdash1" data-toggle="tab" class="active">
                        Dashboard</a>
                     </li>
                     <li><a href="#tabdash2" data-toggle="tab">Order</a></li>
                     <li><a href="#tabdash3" data-toggle="tab">Address</a></li>
                     <li><a href="#tabdash4" data-toggle="tab">Account Detail</a></li>
                     <li><a href="<?= base_url() ?>Login/logout">Log Out</a> </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-9">
            <div class="panel with-nav-tabs panel-default dashboard_tab">
               <div class="panel-body">
                  <div class="tab-content">
                     <div class="tab-pane fade in active" id="tabdash1">
                        <div class="col-md-12">
                           <div class="profile_detail">
                              <h4>
                                <!-- <?= print_r($user[0]); ?> -->
                                 <?= $user[0]['firstname']. ' '.$user[0]['lastname'] ?> 
                              </h4>
                              <ul>
                                 <li><i class="glyphicon glyphicon-envelope"></i>
                                    <?= $user[0]['email']  ?>
                                 </li>
                                 <li><i class="fa fa-phone"></i>
                                    <?= $user[0]['phone'] ?>
                                 </li>
                                 
                              </ul>
                           </div>
                           <!-- Split button -->
                        </div>
                     </div>
                     <!-- tab-pane -->
                     <div class="tab-pane fade" id="tabdash2">
                        <div class="order_list account_order">
                           <div class="span5 table-responsive">
                              <table class="table table-striped table-condensed">
                                 <tbody>
                                 <th>Image</th>
                                 <th>Product Name</th>
                                 <th>Product Quantity</th>
                                 <th>Product Amount</th>
                                 <th>#</th>
                                 
                                    <?php
                                    $total_amount = 0;
                                          
                                       if(!empty($product_delivered)){ 
                                          
                                        ?>
                                    <?php foreach($product_delivered as $data ) {
                                         $total_amount += $data['price']*$data['qty'];
                                      
                                       ?>
                                    
                                    <tr>
                                       <td>
                                          <img class="card-img rounded-0" src="<?= $admin_url ?><?= $data['image']; ?>" alt="">
                                       </td>
                                       <td>
                                          <?= $data['name']  ?>
                                       </td>
                                       <td><?= $data['qty'] ?></td>
                                        <td>
                                          <?= $data['price'] ?>
                                        </td>
                                       <td><a href="<?= base_url()?>myaccount/track/<?= $data['invoice_id'] ?>/<?= $data['id'] ?>" class="btn btn-primary" ?>Track</a></td>
                                                             
                                    </tr>
                                   
                                    <?php    } } else  {echo 'not ordered yet';
                                       } ?>
                                       <tr>
                                        <td>
                                          <div class="row amount" >
                                            <div class="col-sm-6">
                                          total amount 
                                            </div>
                                            <div class="col-sm-3 col-offset-3"><?= $total_amount ?></div>
                                         </td></tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="order_load_more">
                              <!--  <a href="#" class="btn btn-default">Load More</a> -->
                           </div>
                        </div>
                     </div>

                      <div class="tab-pane fade" id="tabdash3">
                      <div class="custom1" id="address_display">
                       
                         <!-- <form action="<?= base_url() ?>Myaccount/address" method="post"> -->
                            
                                      
                                    
                                 
                            <?php if(!empty($edit)) {  ?>
                           
                               
                              <div class="custom1">
                                 <div class="">
                                    <div class="">
                                      <form action="<?= base_url() ?>Myaccount/updateAddress" method="post">
                                      <div id="result_address"></div>
                                       <div class="row">
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                             <div class="user_dashboard">
                                                <label>Address 1 * </label>
                                                <input type="text" class="form-control" value="<?= $update_address[0]['address1']  ?>" name="address1">    
                                             </div>
                                           </div>
                                          </div>
                                          <br>
                                          <div class="col-sm-6 ">
                                            <div class="form-group">
                                             <div class="user_dashboard">
                                                <label>Address 2 * </label>
                                                <input type="text"  class="form-control" value="<?= $update_address[0]['address2']  ?>" name="address2">  
                                             </div>
                                           </div>
                                          </div>
                                       </div>
                                       <input type="hidden" name="id"  value="<?= $update_address[0]['id'] ?>">
                                       <div class="row">
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                             <div class="user_dashboard">
                                                <label>City * </label><br>
                                                <input type="text" class="form-control" value="<?=  $update_address[0]['city'] ?>" name="city">   
                                             </div>
                                           </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                             <div class="user_dashboard">
                                                <label>State * </label><br>
                                                <input type="text"  class="form-control" value="<?= $update_address[0]['state'] ?>" name="state">       
                                             </div>
                                           </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12">
                                            <div class="form-group">
                                             <div class="user_dashboard">
                                                <label>Pincode * </label><br>
                                                <input type="text" class="form-control"  value="<?= $update_address[0]['pincode'] ?>" name="pincode">   
                                             </div>
                                           </div>
                                          </div>
                                       </div>
                                       <br>
                                       <div class="row">
                                          <div class="col-sm-12">
                                             <div class="user_dashboard">
                                                <Button type="submit" name="save" id="update_address"class="btn btn-primary">Update address</Button> 
                                             </div>
                                          </div>
                                       </div>
                                     </form>
                                    </div>
                                 </div>
                                 <!--  <div class="tab-pane fade" id="tabdash4">
                                    </div> -->
                              </div>
                           
                            <?php } else { ?>

                               <div class="row">
                              
                          <?php  foreach($address as $p):?>
                          <div class="col-md-12">
                            <h4>Address</h4>
                          </div>
                          <div class="col-md-6">
                            <address><?= empty($p['address'])?'':$p['address'] ?></address>
                            <a class="btn btn-primary " id="101" href="<?= base_url() ?>Myaccount/updateAddress/<?= empty($p['id'])?'':$p['id'] ?>">Edit</a>
                            <a class="btn btn-info" name="remove" href="<?= base_url() ?>Myaccount/deleteAddress/<?= empty($p['id'])?'':$p['id'] ?>">Remove</a>
                          </div>
                          <?php endforeach; ?>
                        </div>
                      <br>
                              <div id="result_address"></div>
                                       <div class="row">
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                             <div class="user_dashboard">
                                                <label>Address 1 * </label>
                                                <input type="text" id="address1" value="<?= empty($update_address->address1)?'':$update_address->address1 ?>" class="form-control"  name="address1">    
                                             </div>
                                           </div>
                                          </div>
                                          
                                          <div class="col-sm-6 ">
                                            <div class="form-group">
                                             <div class="user_dashboard">
                                                <label>Address 2 * </label>
                                                <input type="text"  id="address2" value="<?= empty($update_address->address2)?'':$update_address->address2 ?>" class="form-control" name="address2">  
                                             </div>
                                           </div>
                                          </div>
                                       </div>

                                       <div class="row">
                                          <div class="col-sm-6">
                                             <div class="form-group">
                                               <div class="user_dashboard">
                                                  <label>City * </label><br>
                                                  <input type="text" id="city" value="<?= empty($update_address->city)?'':$update_address->city?>" class="form-control"name="city">   
                                               </div>
                                           </div>
                                          </div>

                                          <div class="col-sm-6">
                                            <div class="form-group">
                                             <div class="user_dashboard">
                                                <label>State * </label><br>
                                                <input type="text" id="state" value="<?= empty($update_address->state)?'':$update_address->state?>" class="form-control"  name="state">       
                                             </div>
                                          </div>
                                       </div>
                                     </div>
                                       
                                          <div class="row">
                                            <div class="col-sm-12">
                                               <div class="form-group">
                                                 <div class="user_dashboard">
                                                    <label>Pincode * </label><br>
                                                    <input type="text" id="pincode" value="<?= empty($update_address->pincode)?'':$update_address->pincode ?>" class="form-control" name="pincode">   
                                                 </div>
                                                </div>
                                             </div>
                                           </div>
                                      
                                           <div class="row">
                                             <div class="col-sm-12">
                                               <div class="user_dashboard">
                                                  <Button  id="save_address" name="save" class="btn btn-primary">Save address</Button> 
                                               </div>
                                             </div>
                                           </div>

                            <?php } ?>  
                          
                      </div>
                    </div>
                        
                     
                     <!-- tab-pane -->
                     <div class="tab-pane fade" id="tabdash4">
                        <div class="custom1 account_details_sn">
                           <div class="row">
                              <div class="col-sm-12" id="result">
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <?php
                                       if(!empty($this->session->userdata('user_id'))) {
                                         // echo $this->session->userdata('user_id');
                                       $this->db->select('*');
                                       $this->db->from('users');
                                       if(!empty($this->session->userdata('user_id'))){
                                        $s = $this->session->userdata('user_id');
                                       }
                                       else {
                                        $s = 0;
                                       }
                                       $this->db->where('id',$s);
                                       $this->address1 = $this->db->get()->result_array();
                                       //print_r($this->address1);
                                       } ?>
                                    <label>First Name</label>
                                    <br>
                                    <input type="text" value="<?= $this->address1[0]['firstname'] ?>" name="firstname" id="firstname" placeholder="First name" class="form-control">
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>Last Name</label>
                                    <br>
                                    <input type="lastname" id="lastname" value="<?= $this->address1[0]['lastname'] ?>" name="lastname" placeholder="lastname" class="form-control">
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>Email</label>
                                    <br>
                                    <input type="email" id="user_email" value="<?= $this->address1[0]['email'] ?>" name="email" placeholder="Email" class="form-control">
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label>Phone</label>
                                    <br>
                                    <input type="phone" id="phone" value="<?= $this->address1[0]['phone'] ?>" name="phone" placeholder="Phone" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="save_change_btn_detail">
                                    <button id="submit" name="save" class="btn btn-primary">Save Chages</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- tab-pane -->
                  </div>
                  <!-- tab-content -->
               </div>
               <!-- panel-body -->
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script>
   $(document).ready(function() {
       $('#save_address').click(function() {
           var Address1 = $('#address1').val();
           var Address2 = $('#address2').val();
           var City = $('#city').val();
           var State = $('#state').val();
           var Pincode = $('#pincode').val();
   
           if (Address1 != '' && Address2 != '' && City != '' && State != '' && Pincode != '') {
               var address = {
                   address1: Address1,
                   address2: Address2,
                   city: City,
                   state: State,
                   pincode: Pincode
               }
               $.post("<?= base_url() ?>Myaccount/address", address, function(result) {

                   $('#result_address').html('<p class="alert alert-success">' + result + '</p>');
   
               });
   
           } else {
   
               $('#result_address').html('<p class="alert alert-danger">All field is required</p>');
   
           }
   
       })
   
       $('#submit').click(function() {
   
           var firstname = $('#firstname').val();
           var lastname = $("#lastname").val();
           var email = $('#user_email').val();
           var phone = $("#phone").val();
           if (phone != "" && email != "") {
               var update_user = {
                   firstname: firstname,
                   email: email,
                   lastname:lastname,
                   phone:phone
               }
               //console.log(update_user);
   
               $.post("<?= base_url() ?>Login/user_address", update_user, function(result) {
                   $('#result').html('<p class="alert alert-success">' + result + '</p>');
               });
           } else {
               $('#result').html('<p class="alert alert-danger">Field can not be empty</p>');
   
           }
   
       })
   })
</script>
