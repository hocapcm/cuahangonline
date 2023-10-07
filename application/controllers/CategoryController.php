<?php 

class CategoryController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('LoggedIn')){
        redirect(base_url('/login'));   
        }

        
    }
	public function index() //Trang the hien danh sach categories
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

        $this->load->model('CategoryModel');
        $data['category'] = $this->CategoryModel->selectCategory();

		$this->load->view('category/list',$data);
		$this->load->view('admin_template/footer');
		
		
	}
    public function create()
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('category/create');
		$this->load->view('admin_template/footer');
		
		
	}

    public function store(){
        $this->form_validation->set_rules('title','Title','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('slug','Slug','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('description','Description','trim|required',['required'=>'Không được để trống %s']);
		
		if($this->form_validation->run() == TRUE){

            //upload image
            $ori_filename = $_FILES['image']['name'];
            $new_name = time().str_replace(' ','-',$ori_filename);
            $config = [
                'upload_path' => './uploads/category',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('image'))
            {
                    $error  = array('error' => $this->upload->display_errors());
                    $this->load->view('admin_template/header');
                    $this->load->view('admin_template/navbar');
                    $this->load->view('category/create',$error);
                    $this->load->view('admin_template/footer');
                    
                   
            }else{
                $category_filename = $this->upload->data('file_name');
                $data = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'slug' => $this->input->post('slug'),
                    'status' => $this->input->post('status'),
                    'image' => $category_filename
    
                ];
                $this->load->model('CategoryModel');
                $this->CategoryModel->insertCategory($data);
                $this->session->set_flashdata('success','Add category successfully');
                redirect(base_url('category/list'));
            }
           
        }else{
            $this->create();
        }
    }


    public function edit($id){   
        $this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

        $this->load->model('CategoryModel');
        $data['category'] = $this->CategoryModel->selectCategoryById($id);

		$this->load->view('category/edit',$data);
		$this->load->view('admin_template/footer');
		
    }

    public function update($id){
        $this->form_validation->set_rules('title','Title','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('slug','Slug','trim|required',['required'=>'Không được để trống %s']);
		$this->form_validation->set_rules('description','Description','trim|required',['required'=>'Không được để trống %s']);
		
		if($this->form_validation->run() == TRUE){
            if(!empty($_FILES['image']['name'])){
            //upload image
            $ori_filename = $_FILES['image']['name'];
            $new_name = time().str_replace(' ','-',$ori_filename);
            $config = [
                'upload_path' => './uploads/category',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('image'))
            {
                    $error  = array('error' => $this->upload->display_errors());
                    $this->load->view('admin_template/header');
                    $this->load->view('admin_template/navbar');
                    $this->load->view('category/create',$error);
                    $this->load->view('admin_template/footer');
                    
                   
            }else{
                $category_filename = $this->upload->data('file_name');
                $data = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'slug' => $this->input->post('slug'),
                    'status' => $this->input->post('status'),
                    'image' => $category_filename
    
                ];
               
            }
        }else{
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'slug' => $this->input->post('slug'),
                'status' => $this->input->post('status')
            ];
            
        }
        $this->load->model('CategoryModel');
        $this->CategoryModel->updateCategory($id,$data);
        $this->session->set_flashdata('success','Update category successfully');
        redirect(base_url('category/list'));
        }else{
            $this->edit($id);
        }
    }

    public function delete($id){
        $this->load->model('CategoryModel');
        $this->CategoryModel->deleteCategory($id);
        $this->session->set_flashdata('success','Delete category successfully');
        redirect(base_url('category/list'));
    }
}
