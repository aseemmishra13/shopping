<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
		$this->load->model('billing_model');
                $this->load->library('cart');
	}

	public function index()
	{	
                
		$data['products'] = $this->billing_model->get_all();
               
		$this->load->view('shopping_view', $data);
	}
	
	
	 function add()
	{
              
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => 1
		);		

                 
		$this->cart->insert($insert_data);
	      
               
		redirect('shopping');
	     }
	
		function remove($rowid) {
                  
		if ($rowid==="all"){
                   
			$this->cart->destroy();
		}else{
                  
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
                   
			$this->cart->update($data);
		}
		
                 
		redirect('shopping');
	}
	
	    function update_cart(){
                
             
                $cart_info =  $_POST['cart'] ;
 		foreach( $cart_info as $id => $cart)
		{	
                    $rowid = $cart['rowid'];
                    $price = $cart['price'];
                    $amount = $price * $cart['qty'];
                    $qty = $cart['qty'];
                    
                    	$data = array(
				'rowid'   => $rowid,
                                'price'   => $price,
                                'amount' =>  $amount,
				'qty'     => $qty
			);
             
			$this->cart->update($data);
		}
		redirect('shopping');        
	}	
        function billing_view(){
                
		$this->load->view('billing_view');
        }
        
        	public function save_order()
	{
    
		$customer = array(
			'name' 		=> $this->input->post('name'),
			'email' 	=> $this->input->post('email'),
			'address' 	=> $this->input->post('address'),
			'phone' 	=> $this->input->post('phone')
		);		
            
		$cust_id = $this->billing_model->insert_customer($customer);

		$order = array(
			'date' 			=> date('Y-m-d'),
			'customerid' 	=> $cust_id
		);		

		$ord_id = $this->billing_model->insert_order($order);
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'orderid' 		=> $ord_id,
					'productid' 	=> $item['id'],
					'quantity' 		=> $item['qty'],
					'price' 		=> $item['price']
				);		

                          
                
		         $cust_id = $this->billing_model->insert_order_detail($order_detail);
			endforeach;
		endif;
	      

                $this->load->view('billing_success');
	}
}
