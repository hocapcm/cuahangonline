<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('IndexModel');
		$this->load->library('cart');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->data['category'] = $this->IndexModel->getCategoryHome();
		$this->data['brand'] = $this->IndexModel->getBrandHome();
		
	}
	public function index()
	{
		$this->data['allproduct'] = $this->IndexModel->getLatestProducts();
		$this->load->view('pages/template/header',$this->data);
		$this->load->view('pages/template/slider');
		$this->load->view('pages/home',$this->data);
		$this->load->view('pages/template/footer');

	}

	public function product($id)
	{
		// Lấy các thông tin chi tiết sản phẩm
		$this->data['product_details'] = $this->IndexModel->getProductDetail($id);
		// Lấy dữ liệu comments để hiển thị
		$this->data['list_comments'] = $this->IndexModel->getListComments($id);
		// Tính số lượng comments
		$this->data['count_comments'] = $this->IndexModel->countCommentsByProductId($id);
		// Lấy rating từ bản comments sản phẩm để hiển thị số sao
		$this->data['averageRating'] = $this->IndexModel->getAverageRatingByProductId($id);
		// Lấy category_id từ kết quả của getProductDetail()
		$category_id = $this->data['product_details'][0]->category_id;
		// Lấy danh sách các sản phẩm cùng loại dựa trên category_id
		$this->data['sanphamcungloai'] = $this->IndexModel->getCateProduct($category_id);
		$this->load->view('pages/template/header',$this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/product_details',$this->data);
		$this->load->view('pages/template/footer');
	}

	public function thanks()
	{
		$this->load->view('pages/template/header',$this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/thanks');
		$this->load->view('pages/template/footer');

	}

	public function category($id)
	{
		$config = array();
        $config["base_url"] = base_url() .'/danh-muc/'.'/'.$id; 
		$config['reuse_query_string'] = TRUE;
		$config['total_rows'] = ceil($this->IndexModel->countAllProductByCate($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 6; //từng trang 3 sản phẩn
        $config["uri_segment"] = 3; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link

		
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		//pagination

		//min max price
		$this->data['min_price'] = $this->IndexModel->getMinProductPriceCate($id);
		$this->data['max_price'] = $this->IndexModel->getMaxProductPriceCate($id);

		//Filter
		if(isset($_GET['kytu'])){
			$kytu = $_GET['kytu'];
			$this->data['allproduct_cate_pagination'] = $this->IndexModel->getCateKytuPagination($id,$kytu,$config["per_page"], $this->page);
		}elseif(isset($_GET['gia'])){
			$gia = $_GET['gia'];
			$this->data['allproduct_cate_pagination'] = $this->IndexModel->getCatePricePagination($id,$gia,$config["per_page"], $this->page);
		}elseif(isset($_GET['to']) && $_GET['from']){
			$from_price = $_GET['from'];
			$to_price = $_GET['to'];
			$this->data['allproduct_cate_pagination'] = $this->IndexModel->getCatePriceRangePagination($id,$from_price,$to_price,$config["per_page"], $this->page);
		}else{
			$this->data['allproduct_cate_pagination'] = $this->IndexModel->getCatePagination($id,$config["per_page"], $this->page);

		}

		//$this->data['cate_product'] = $this->IndexModel->getCateProduct($id);
		$this->load->view('pages/template/header',$this->data);
		$this->load->view('pages/template/slider');
		$this->load->view('pages/category',$this->data);
		$this->load->view('pages/template/footer');

	}

	public function brand($id)
	{
		$config = array();
        $config["base_url"] = base_url() .'/thuong-hieu/'.'/'.$id; 
		$config['reuse_query_string'] = TRUE;
		$config['total_rows'] = ceil($this->IndexModel->countAllProductByBrand($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 6; //từng trang 3 sản phẩn
        $config["uri_segment"] = 3; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		//$this->data['allproduct_brand_pagination'] = $this->IndexModel->getBrandPagination($id,$config["per_page"], $this->page);
		//pagination
		$this->data['min_price'] = $this->IndexModel->getMinProductPriceBrand($id);
		$this->data['max_price'] = $this->IndexModel->getMaxProductPriceBrand($id);
		//Filter
		if(isset($_GET['kytu'])){
			$kytu = $_GET['kytu'];
			$this->data['allproduct_brand_pagination'] = $this->IndexModel->getBrandKytuPagination($id,$kytu,$config["per_page"], $this->page);
		}elseif(isset($_GET['gia'])){
			$gia = $_GET['gia'];
			$this->data['allproduct_brand_pagination'] = $this->IndexModel->getBrandPricePagination($id,$gia,$config["per_page"], $this->page);
		}elseif(isset($_GET['to']) && $_GET['from']){
			$from_price = $_GET['from'];
			$to_price = $_GET['to'];
			$this->data['allproduct_brand_pagination'] = $this->IndexModel->getBrandPriceRangePagination($id,$from_price,$to_price,$config["per_page"], $this->page);
		}else{
			$this->data['allproduct_brand_pagination'] = $this->IndexModel->getBrandPagination($id,$config["per_page"], $this->page);

		}


		//$this->data['brand_product'] = $this->IndexModel->getBrandProduct($id);
		$this->load->view('pages/template/header',$this->data);
		$this->load->view('pages/template/slider');
		$this->load->view('pages/brand',$this->data);
		$this->load->view('pages/template/footer');

	}

	public function cart()
	{

		$this->load->view('pages/template/header',$this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/cart');
		$this->load->view('pages/template/footer');

	}


	public function add_to_cart(){
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$this->data['product_details'] = $this->IndexModel->getProductDetail($product_id);
		//Đặt hàng
		foreach($this->data['product_details'] as $key => $pro){
		//Check quantity
			if($pro->quantity > $quantity){
				$cart = array(
					'id' => $pro->id,
					'qty' => $quantity,
					'price' => $pro->price,
					'name' => $pro->title,
					'options' => array('image' => $pro->image,'in_stock' => $pro->quantity)
				);
			}else{
				$this->session->set_flashdata('error','Khong du so luong san pham de dat hang');
				redirect($_SERVER['HTTP_REFERER']);
			}	
		}
		$this->cart->insert($cart);
		redirect(base_url().'gio-hang','refresh');
	}

	public function add_to_cart1(){
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$this->data['product_details'] = $this->IndexModel->getProductDetail($product_id);
		
		// Kiểm tra xem sản phẩm với product_id đã tồn tại trong giỏ hàng chưa
		$product_exists = false;
		
		foreach ($this->cart->contents() as $items) {
			if ($items['id'] == $product_id) {
				$product_exists = true;
				break; // Sản phẩm đã tồn tại trong giỏ hàng, thoát khỏi vòng lặp
			}
		}
		
		if ($product_exists) {
			$this->session->set_flashdata('error', 'Sản phẩm đã có trong giỏ hàng');
			redirect(base_url().'gio-hang','refresh');
		} else {
			foreach($this->data['product_details'] as $key => $pro){
				// Check quantity
				if($pro->quantity > $quantity){
					$cart = array(
						'id' => $pro->id,
						'qty' => $quantity,
						'price' => $pro->price,
						'name' => $pro->title,
						'options' => array('image' => $pro->image,'in_stock' => $pro->quantity)
					);
				}else{
					$this->session->set_flashdata('error','Không đủ số lượng sản phẩm để đặt hàng');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
			
			$this->cart->insert($cart);
			redirect(base_url().'gio-hang','refresh');
		}
	}
	
	public function delete_one_cart($rowid){
		$this->cart->remove($rowid);
		redirect(base_url().'gio-hang','refresh');
	}
	public function delete_all_cart(){
		$this->cart->destroy();
		redirect(base_url().'gio-hang','refresh');
	}
	public function update_cart_item(){
		
		$rowid = $this->input->post('rowid');
		$quantity = $this->input->post('quantity');
		foreach($this->cart->contents() as $items){
			if($rowid == $items['rowid']){
				if($quantity<$items['options']['in_stock']){
				$cart = array(	
					'rowid' => $rowid,
					'qty' => $quantity
				);		
			}elseif($quantity>=$items['options']['in_stock']){
				$cart = array(	
					'rowid' => $rowid,
					'qty' => $items['options']['in_stock']
				);	
			}
			}
		}

	
		$this->cart->update($cart);
	
		redirect(base_url().'gio-hang','refresh');
	}

	public function checkout(){
		if($this->session->userdata('LoggedInCustomer') && $this->cart->contents()){
		$this->load->view('pages/template/header',$this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/checkout');
		$this->load->view('pages/template/footer');
		}else{
			redirect(base_url().'gio-hang');

		}
	}

	

	public function login()
	{



		$this->load->view('pages/template/header',$this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/login');
		$this->load->view('pages/template/footer');

	}

	public function login_customer(){
		$this->form_validation->set_rules('email','Email','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('password','Password','trim|required',['required'=>'Không được để trống %s']);
		
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$this->load->model('LoginModel');
			$result = $this->LoginModel->checkLoginCustomer($email,$password);
			if(count($result)>0){
				$session_array = [
					'id' => $result[0]->id,
					'username' => $result[0]->name,
					'email' => $result[0]->email,
					'phone' => $result[0]->phone,
					'address' => $result[0]->address,

				];
				$this->session->set_userdata('LoggedInCustomer',$session_array);
				$this->session->set_flashdata('success','Login successfully');
				redirect(base_url('/'));
			}else{
				$this->session->set_flashdata('error','Wrong email or password');
				redirect(base_url('/dang-nhap'));

			}
		}else{
			$this->login();
		}

	}

	public function signup_customer(){
		$this->form_validation->set_rules('email','Email','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('password','Password','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|matches[password]', ['required' => 'Không được để trống %s', 'matches' => 'Mật khẩu xác nhận không khớp với mật khẩu']);
		$this->form_validation->set_rules('name','Name','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('phone','Phone','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('address','Address','trim|required',['required'=>'Không được để trống %s']);
		
		
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$data = array(
				'name' => $name,
				'email' => $email,
				'password' => $password,
				'phone' => $phone,
				'address' => $address
			);

			$this->load->model('LoginModel');
			 // Kiểm tra xem email và số điện thoại đã tồn tại chưa
			 if ($this->LoginModel->checkExistingEmail($email)) {
				$this->session->set_flashdata('error', 'Email đã tồn tại.');
				redirect(base_url('/dang-nhap'));
			}
		
			if ($this->LoginModel->checkExistingPhone($phone)) {
				$this->session->set_flashdata('error', 'Số điện thoại đã tồn tại.');
				redirect(base_url('/dang-nhap'));
			}

			$result = $this->LoginModel->newCustomer($data);
		
			if($result){
				// $session_array = [
				// 	'username' => $name,
				// 	'email' => $email,
				// ];
				// $this->session->set_userdata('LoggedInCustomer',$session_array);
				$this->session->set_flashdata('success','Registered successfully!');
				redirect(base_url('/dang-nhap'));
			}else{
				$this->session->set_flashdata('error','Wrong email or password');
				redirect(base_url('/dang-nhap'));

			}
		}else{
			$this->login();
		}
	}

	public function dang_xuat(){
		$this->session->unset_userdata('LoggedInCustomer');
		$this->session->set_flashdata('success','Logout successfully!');
		redirect(base_url('/dang-nhap'));
		
	}

	public function edit_user($id){   
		$this->load->view('pages/template/header',$this->data);
		$this->load->model('LoginModel');
		$data['user'] = $this->LoginModel->getUserById($id); // Thay thế 'BrandModel' và 'selectBrandById' bằng 'LoginModel' và 'getUserById'
	
		$this->load->view('pages/edit-user', $data); // Sử dụng tên tệp view 'edit-user' thay vì 'brand/edit'
		$this->load->view('pages/template/footer');
	}
	
	public function update_user($id)
		{
			$this->form_validation->set_rules('name', 'Name', 'trim|required', ['required' => 'Không được để trống %s']);
			$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required' => 'Không được để trống %s']);
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => 'Không được để trống %s']);

			if ($this->form_validation->run() == TRUE) {
				$data = [
					'name' => $this->input->post('name'),
					'address' => $this->input->post('address'),
					'phone' => $this->input->post('phone')
				];

				$password = $this->input->post('password');

				if (!empty($password)) {
					$data['password'] = md5($password);
				}

				$this->load->model('LoginModel');
				$this->LoginModel->edit_user($id, $data);
				$this->session->set_flashdata('success', 'Update user information successfully');
				redirect(base_url('/edit-user/'.$id)); 
			} else {
				// Xử lý lỗi validation
				// Hiển thị form chỉnh sửa thông tin người dùng với thông báo lỗi
				// Ví dụ: $this->load->view('user/edit', $data);
			}
		}

		public function confirm_checkout(){
			$this->form_validation->set_rules('email','Email','trim|required',['required'=>'Không được để trống %s']);
			$this->form_validation->set_rules('name','Name','trim|required',['required'=>'Không được để trống %s']);
			$this->form_validation->set_rules('phone','Phone','trim|required',['required'=>'Không được để trống %s']);
			$this->form_validation->set_rules('address','Address','trim|required',['required'=>'Không được để trống %s']);
			if ($this->form_validation->run() == TRUE) {
				$email = $this->input->post('email');
				$checkoutmethod = $this->input->post('checkoutmethod');
				$name = $this->input->post('name');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');
				$data = array(
					'name' => $name,
					'email' => $email,
					'method' => $checkoutmethod,
					'phone' => $phone,
					'address' => $address
				);
				$this->load->model('LoginModel');
				
				$result = $this->LoginModel->newShipping($data);
				if($result){
					//order
					$order_code = rand(00,9999);
					$data_order = array(
						'order_code' => $order_code,
						'ship_id' => $result,
						'status' => 1
					);
					$insert_order = $this->LoginModel->insert_order($data_order);
					//order details
					foreach ($this->cart->contents() as $items){
						$data_order_details = array(
							'order_code' => $order_code,
							'product_id' => $items['id'],
							'quantity' => $items['qty']
						);
						$insert_order_details = $this->LoginModel->insert_order_details($data_order_details);
						
					}
					$this->cart->destroy();
					redirect(base_url('/thanks'));
					$this->session->set_flashdata('success','Place order successfully!');
					redirect(base_url('/checkout'));
				}else{
					$this->session->set_flashdata('error','Something went wrong!!!');
					redirect(base_url('/checkout'));
	
				}
			}else{
				$this->checkout();
			}
		}

		public function tim_kiem()
		{
			if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
				$keyword = $_GET['keyword'];
				$config = array();
				$config["base_url"] = base_url() .'/tim-kiem';
				$config['reuse_query_string'] = TRUE;
				$config['total_rows'] = ceil($this->IndexModel->countAllProductByKeyword($keyword)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
				$config["per_page"] = 6; //từng trang 3 sản phẩn
				$config["uri_segment"] = 2; //lấy số trang hiện tại
				$config['use_page_numbers'] = TRUE; //trang có số
				$config['full_tag_open'] = '<ul class="pagination">';
				$config['full_tag_close'] = '</ul>';
				$config['first_link'] = 'First';
				$config['first_tag_open'] = '<li>';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = 'Last';
				$config['last_tag_open'] = '<li>';
				$config['last_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="active"><a>';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '</li>';
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '</li>';
				//end custom config link
				$this->pagination->initialize($config); //tự động tạo trang
				$this->page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0; //current page active 
				$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
				//pagination
				$this->data['allproduct_keyword_pagination'] = $this->IndexModel->getKeywordPagination($keyword,$config["per_page"], $this->page);

				if (empty($this->data['allproduct_keyword_pagination'])) {
					// Không tìm thấy sản phẩm, hiển thị thông báo
					$this->data['no_results'] = "Không có sản phẩm mà bạn đang tìm kiếm.";
				}
			}
			
			$this->data['title'] = $keyword;
			$this->load->view('pages/template/header', $this->data);
			$this->load->view('pages/template/slider');
			$this->load->view('pages/timkiem', $this->data);
			$this->load->view('pages/template/footer');
		}

		public function comment_send(){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$data = [
				'name' => $this->input->post('name_comment'),
				'email' => $this->input->post('email_comment'),
				'comment' => $this->input->post('comment'),
				'product_id' => $this->input->post('product_id_comment'),
				'stars' => $this->input->post('star'),
				'dated' => date('d/m/Y - H:i:s A'),

				'status' => 1,

			];
			$this->load->model('CategoryModel');
			$result = $this->IndexModel->insertComment($data);
			if($result){
				//redirect(base_url('/san-pham/'.$this->input->post('product_id_comment')));
			}
		}

	

}
