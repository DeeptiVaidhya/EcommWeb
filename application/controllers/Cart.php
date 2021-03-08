<?php
defined('BASEPATH') OR exit('No direct script accesss allowed');

class Cart extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        
        //load cart library 
        $this->load->library('cart');
        $this->load->library('paypal_lib');
        
        //load home model
        $this->load->model('Home_model');
    }
    
    function index()
    {
        $data = array();        
        //retrieve cart data from the session 
        //retrieve cart data from the session 
        $data['cartItems'] = $this->cart->contents();
        //load the cart view
        $this->load->view('common/header');
        $this->load->view('cart', $data);
        $this->load->view('common/footer');
    }
    
    function updateItemQty()
    {
        $update = 0;
        
        //get cart item info
        $rowid = $this->input->get('rowid');
        $qty   = $this->input->get('qty');
        
        //update item in the cart
        if (!empty($rowid) && !empty($qty)) {
            $data = array(
                'rowid' => $rowid,
                'qty' => $qty
            );
            
            $update = $this->cart->update($data);
        }
        
        //return response
        echo $update ? 'ok' : 'err';
    }
    
    function removeItem($rowid)
    {
        
        //remove item from cart
        $remove = $this->cart->remove($rowid);
        
        //redirect to cart page
        redirect('cart');
    }

    public function applyCoupon(){
        $coupon_amount = $this->input->post('coupon');
        $user_id = $this->session->userdata('user_id');
         if(!is_numeric($coupon_amount)){
              $this->session->set_flashdata('coupon_result','Please Enter a valid amount'); 
              redirect('cart');
              exit;
         }
        $this->db->select("*");
        $this->db->from('Donate');
        $this->db->where('user_id',$user_id);
        $data1 = $this->db->get();
        $rows_count = $data1->num_rows();
        $data_row = $data1->row();
        if(!empty($data_row)){
            $amount = $data_row->donation_amount;
        }
        else {
            $amount = 0;
        }
        

        if($rows_count > 0){
            
            if($amount > $coupon_amount){
                $this->session->set_flashdata('coupon_result','coupon applied successfully');
                if(!empty($this->session->userdata('amount'))){
                  $old_price = $this->session->userdata('amount');
                  $new_price = $coupon_amount;
                  $total_coupon_amount = $old_price + $new_price;
                  $this->session->set_userdata('amount',$total_coupon_amount);
                }
                else {
                $this->session->set_userdata('amount',$coupon_amount);
                }

                // $this->db->set('donation_amount', 'donation_amount-'.$coupon_amount);
                $update_price = $amount - $coupon_amount;
                $this->db->where('id' , $data_row->id);
                $this->db->update('Donate',array('donation_amount'=>$update_price));
            }
            else {
                $this->session->set_flashdata('coupon_result','Donation price is less');   
            }

            //load the cart view
            redirect('cart');
        }

        else {
            $data['cartItems'] = $this->cart->contents();
            $this->session->set_flashdata('coupon_result','invalid coupon');
             redirect('cart');
        }
        

    }
    
   
    
}
?>