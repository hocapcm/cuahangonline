<?php 

class ProductController extends CI_Controller{
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

        //Goi danh sach product
        $this->load->model('ProductModel');
        $data['product'] = $this->ProductModel->selectAllProduct();


		$this->load->view('product/list',$data);
		$this->load->view('admin_template/footer');
		
		
	}
    public function create()
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');


        //Goi danh sach category
        $this->load->model('CategoryModel');
        $data['category'] = $this->CategoryModel->selectCategory();

         //Goi danh sach brand
        $this->load->model('BrandModel');
        $data['brand'] = $this->BrandModel->selectBrand();

		$this->load->view('product/create',$data);
		$this->load->view('admin_template/footer');
		
		
	}

    public function store(){
        $this->form_validation->set_rules('title','Title','trim|required',['required'=>'Không được để trống %s']);
        $this->form_validation->set_rules('price','Price','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('slug','Slug','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('quantity','Quantity','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('description','Description','trim|required',['required'=>'Không được để trống %s']);
		
		if($this->form_validation->run() == TRUE){

            //upload image
            $ori_filename = $_FILES['image']['name'];
            $new_name = time().str_replace(' ','-',$ori_filename);
            $config = [
                'upload_path' => './uploads/product',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('image'))
            {
                    $error  = array('error' => $this->upload->display_errors());
                    $this->load->view('admin_template/header');
                    $this->load->view('admin_template/navbar');
                    $this->load->view('product/create',$error);
                    $this->load->view('admin_template/footer');
                    
                   
            }else{
                $product_filename = $this->upload->data('file_name');
                $data = [
                    'title' => $this->input->post('title'),
                    'price' => $this->input->post('price'),
                    'quantity' => $this->input->post('quantity'),
                    'description' => $this->input->post('description'),
                    'slug' => $this->input->post('slug'),
                    'category_id' => $this->input->post('category_id'),
                    'brand_id' => $this->input->post('brand_id'),
                    'status' => $this->input->post('status'),
                    'image' => $product_filename
    
                ];
                $this->load->model('ProductModel');
                $this->ProductModel->insertProduct($data);
                $this->session->set_flashdata('success','Add product successfully');
                redirect(base_url('product/list'));
            }
           
        }else{
            $this->create();
        }
    }


    public function edit($id){   
        $this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

        //Goi danh sach category
        $this->load->model('CategoryModel');
        $data['category'] = $this->CategoryModel->selectCategory();

            //Goi danh sach brand
        $this->load->model('BrandModel');
        $data['brand'] = $this->BrandModel->selectBrand();


        $this->load->model('ProductModel');
        $data['product'] = $this->ProductModel->selectProductById($id);

		$this->load->view('product/edit',$data);
		$this->load->view('admin_template/footer');
		
    }

    public function update($id){
        $this->form_validation->set_rules('title','Title','trim|required',['required'=>'Không được để trống %s']);
        $this->form_validation->set_rules('price','Price','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('slug','Slug','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('quantity','Quantity','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('description','Description','trim|required',['required'=>'Không được để trống %s']);
		
		if($this->form_validation->run() == TRUE){
            if(!empty($_FILES['image']['name'])){
            //upload image
            $ori_filename = $_FILES['image']['name'];
            $new_name = time().str_replace(' ','-',$ori_filename);
            $config = [
                'upload_path' => './uploads/product',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('image'))
            {
                    $error  = array('error' => $this->upload->display_errors());
                    $this->load->view('admin_template/header');
                    $this->load->view('admin_template/navbar');
                    $this->load->view('product/create',$error);
                    $this->load->view('admin_template/footer');
                    
                   
            }else{
                $product_filename = $this->upload->data('file_name');
                $data = [
                    'title' => $this->input->post('title'),
                    'price' => $this->input->post('price'),
                    'quantity' => $this->input->post('quantity'),
                    'description' => $this->input->post('description'),
                    'slug' => $this->input->post('slug'),
                    'category_id' => $this->input->post('category_id'),
                    'brand_id' => $this->input->post('brand_id'),
                    'status' => $this->input->post('status'),
                    'image' => $product_filename
    
                ];
               
            }
        }else{
            $data = [
                'title' => $this->input->post('title'),
                'price' => $this->input->post('price'),
                'quantity' => $this->input->post('quantity'),
                'description' => $this->input->post('description'),
                'category_id' => $this->input->post('category_id'),
                'brand_id' => $this->input->post('brand_id'),
                'slug' => $this->input->post('slug'),
                'status' => $this->input->post('status')
            ];
            
        }
        $this->load->model('ProductModel');
        $this->ProductModel->updateProduct($id,$data);
        $this->session->set_flashdata('success','Update product successfully');
        redirect(base_url('product/list'));
        }else{
            $this->edit($id);
        }
    }

    public function delete($id){
        $this->load->model('ProductModel');
        $this->ProductModel->deleteProduct($id);
        $this->session->set_flashdata('success','Delete product successfully');
        redirect(base_url('product/list'));
    }
}
