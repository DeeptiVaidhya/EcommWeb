<?php
 $post = [
'email' => 'tulazpokharel@gmail.com',
'password' => 'Hepppp@0801',

];

$ch = curl_init('https://apiv2.shiprocket.in/v1/external/auth/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$response = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);

// do anything you want with your response
$token = json_decode($response);
// print_r($token);exit;

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
// // echo 'hii';exit;
// curl_close($curl);
//  echo "<pre>";print_r(json_decode($result, true));exit;





$invoice_id = $this->session->userdata('invoice_id');
$this->db->select("*");
$this->db->from('orders');
$this->db->join('users','orders.user_id=users.id');
$this->db->where('orders.id',$invoice_id);
$shipping = $this->session->userdata('shipping');
$data = $this->db->get()->result();

// echo '<pre>';
// print_r($data);
// print_r($this->session->userdata('shipping'));
// exit;
$post = [
	'order_id' => $invoice_id ,
	'order_date' => date("Y-m-d"),
	'pickup_location' => 'VARDHAMA',
	'channel_id' => '',
	'comment' =>'Test',
	"billing_customer_name" => "VARDHAMA",
    "billing_last_name" => "ENTERPRISES",
    "billing_address" => "ournalist Colony, Jubilee Hills, Hyderabad, Telangana",
    "billing_state" => "Telangana",
    "billing_country" => "India",
    "billing_email" => "psinghvee@gmail.com",
    "billing_phone" => "8886089801",
	'shipping_customer_name' => $data[0]->firstname,
	'shipping_last_name'=> $data[0]->lastname,
	'shipping_address' => $data[0]->customer_address,
	'shipping_city' => $shipping['city_name'],
	'shipping_city' => $shipping['zip_code'],
	'shipping_country'=> $shipping['country'],
	'shipping_state' => $shipping['state_country'],
	'shipping_email'=> $shipping['email'],
	'shipping_phone' => $data[0]->phone,
	
	'payment_method' =>'Prepaid',
	'shipping_charges' => '0',
	'giftwrap_charges'=> '0',
	'transaction_charges'=> '0',
	'total_discount' =>'100',
	
	'length' => '10',
	'breadth'=> '15',
	'height' => '15',
	'weight' => '2.5',
	'sub_total' => '800',
	'shipping_is_billing' => true,
	'billing_pincode' => '455001',

];

// $this->load->library('Cart');
$index = 0;
// echo '<pre>';
// print_r($this->cart->contents());
// exit;
foreach($this->cart->contents() as $cart){
	$post['order_items'][$index]['name']=$cart['name'];
	$post['order_items'][$index]['selling_price']=$cart['price'];
	$post['order_items'][$index]['hsn']='441122';
	$post['order_items'][$index]['discount']='441122';
	$this->db->select("sku");
	$this->db->from('products');
	$this->db->where('id',$cart['id']);
	$data = $this->db->get()->row();
	
	$post['order_items'][$index]['sku']=$data->sku;
	$post['order_items'][$index]['units']=$cart['qty'];
	
	$index++;
}





$object = json_encode((object)$post);
// print_r($object);exit;
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/create/adhoc",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS =>$object,
CURLOPT_HTTPHEADER => array(
"Content-Type: application/json",
"Authorization: Bearer ".$token->token
),
));

$response = curl_exec($curl);

curl_close($curl);
if(!empty($response)){
$response_json = json_decode($response);

$shipment_id = $response_json->shipment_id;
$this->db->where('id',$invoice_id);
$this->db->update('orders',array('shipment_id'=>$shipment_id));
}


?>
<?php  $admin_url = $this->config->item('admin_url'); ?> 
<!--<div class="item active inner_pages">-->
<!--  <img src="<?php echo base_url('assets/img/cart.jpg');?>" alt=" ">                      -->
<!--  <div class="theme-container container">-->
<!--    <div class="caption-text">-->
<!--      <div class="cart_banner">-->
<!--        <div class="inner_bg">-->
<!--        <h3>Orders</h3>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<div class="container">
	<div class="col-lg-12">
	    <h4 class="success">Thank you! Your payment was successful.</h4>
	    <table class="table table-responsive">
	    	<tr>
	    		<th>TransactionId</th>
	    		<th>Amount</th>
	    		<th>Total Item</th>
	    		<th>Status</th>
	    	</tr>
	    	<tr>
	    		<td><?php echo $itemInfo['transaction_id']?></td>
	    		<td><?php echo $itemInfo['cart_contents']['cart_total']?></td>
	    		<td><?php echo $itemInfo['cart_contents']['total_items']?></td>
	    		<td>success</td>
	    	</tr>
	    </table>
	</div>
	<div class="col-lg-12">
		<a href="<?= base_url() ?>Products/allProducts" class="btn btn-primary">Continue Shopping</a>
	</div>
</div>

<?php $this->cart->destroy(); ?>