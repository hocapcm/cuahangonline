<?php 

class OrderController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('LoggedIn')){
        redirect(base_url('/login'));   
        }

        
    }
	public function index() 
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

        $this->load->model('OrderModel');
        $data['order'] = $this->OrderModel->selectOrder();

		$this->load->view('order/list',$data);
		$this->load->view('admin_template/footer');
		
		
	}

    public function view($order_code) 
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

        $this->load->model('OrderModel');
        $data['order_details'] = $this->OrderModel->selectOrderDetails($order_code);

		$this->load->view('order/view',$data);
		$this->load->view('admin_template/footer');
		
		
	}




    public function updateAll($order_code) {
        // Check if the form has been submitted
        if ($this->input->post('status')) {
            $status = $this->input->post('status');
    
            // Prepare the data for update
            $data = array(
                'status' => $status
            );
    
            $this->load->model('OrderModel');
            $result = $this->OrderModel->updateOrder($order_code, $data);
    
            if ($result) {
                $this->session->set_flashdata('success', 'Update order status successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update order');
            }
        }
    
        redirect(base_url('order/view/'.$order_code));
    }
    
    

    public function delete_order($order_code) 
	{
	
        $this->load->model('OrderModel');
        $deleteOrderDetails = $this->OrderModel->deleteOrderDetails($order_code);
        $deleteOrder['order_details'] = $this->OrderModel->deleteOrder($order_code);

        if($deleteOrder){
            $this->session->set_flashdata('success','Delete order successfully!');
            redirect(base_url('order/list'));
        }else{
            $this->session->set_flashdata('error','Delete order fail!');

            redirect(base_url('order/list'));
        }
	}




   
   
}
