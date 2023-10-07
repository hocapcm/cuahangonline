<?php

    class IndexModel extends CI_Model{
        public function getCategoryHome(){
            $query = $this->db->get_where('categories',['status'=>1]);
            return $query->result();
        }

        public function getBrandHome(){ 
            $query = $this->db->get_where('brands',['status'=>1]);
            return $query->result();
        }
        public function getAllProduct(){ 
            $query = $this->db->get_where('products',['status'=>1]);
            return $query->result();
        }
        public function getLatestProducts($limit = 6)
        {
            $this->db->where('status', 1);
            $this->db->order_by('id', 'desc'); // Sắp xếp sản phẩm theo trường id giảm dần (sản phẩm mới nhất đầu)
            $this->db->limit($limit); // Giới hạn số lượng sản phẩm lấy ra
            $query = $this->db->get('products');
            return $query->result();
        }

        public function countAllProduct(){ 
            return $this->db->count_all('products');
           
        }

        public function countAllProductByCate($id){ 
            $this->db->where('category_id',$id);
            $this->db->from('products');
            return $this->db->count_all_results();
           
        }
        public function countAllProductByBrand($id){ 
            $this->db->where('brand_id',$id);
            $this->db->from('products');
            return $this->db->count_all_results();
           
        }
        public function countAllProductByKeyword($keyword){ 
            $this->db->like('products.title',$keyword);
            $this->db->from('products');
            return $this->db->count_all_results();
           
        }

        public function getIndexPagination($limit,$start){
            $this->db->limit($limit,$start);
            $query = $this->db->get_where('products',['status' => 1]);
            return $query->result();
        }

        public function getProductDetail($id){
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->where('products.id',$id)
            ->get();
            return $query->result();
        }

        public function getCateProduct($id){
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->where('products.category_id',$id)
            ->get();
            return $query->result();
        }

        public function getCatePagination($id,$limit,$start){
            $this->db->limit($limit,$start);
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->where('products.category_id',$id)
            ->get();
            return $query->result();
        }

        public function getCatePricePagination($id,$gia,$limit,$start){
            $this->db->limit($limit,$start);
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->where('products.category_id',$id)
            ->order_by('products.price',$gia)
            ->get();
            return $query->result();
        }

        public function getCatePriceRangePagination($id,$from_price,$to_price,$limit,$start){
            $this->db->limit($limit,$start);
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->where('products.category_id',$id)
            ->where('products.price >='.$from_price)
            ->where('products.price <='.$to_price)
            ->get();
            return $query->result();
        }

        public function getCateKytuPagination($id,$kytu,$limit,$start){
            $this->db->limit($limit,$start);
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->where('products.category_id',$id)
            ->order_by('products.title',$kytu)
            ->get();
            return $query->result();
        }

        public function getBrandProduct($id){
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->where('products.brand_id',$id)
            ->get();
            return $query->result();
        }
        public function getBrandPagination($id,$limit,$start){
            $this->db->limit($limit,$start);
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->where('products.brand_id',$id)
            ->get();
            return $query->result();
        }

        public function getBrandPricePagination($id,$gia,$limit,$start){
            $this->db->limit($limit,$start);
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->where('products.brand_id',$id)
            ->order_by('products.price',$gia)
            ->get();
            return $query->result();
        }

        public function getBrandPriceRangePagination($id,$from_price,$to_price,$limit,$start){
            $this->db->limit($limit,$start);
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->where('products.brand_id',$id)
            ->where('products.price >='.$from_price)
            ->where('products.price <='.$to_price)
            ->get();
            return $query->result();
        }

        public function getBrandKytuPagination($id,$kytu,$limit,$start){
            $this->db->limit($limit,$start);
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->where('products.brand_id',$id)
            ->order_by('products.title',$kytu)
            ->get();
            return $query->result();
        }

        public function getProductByKeyword($keyword){
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->like('products.title',$keyword)
            ->get();
            return $query->result();
        }

        public function getKeywordPagination($keyword,$limit,$start){
            $this->db->limit($limit,$start);
            $query =  $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products','products.category_id=categories.id')
            ->join('brands','brands.id=products.brand_id')
            ->like('products.title',$keyword)
            ->get();
            return $query->result();
        }

        public function getMinProductPriceCate($id){
            $this->db->select('products.*');
            $this->db->from('products');
            $this->db->select_min('price');
            $this->db->where('products.category_id',$id);
            $this->db->limit(1);
            $query = $this->db->get();
            $result = $query->row();
            return $price = $result->price;
        }

        public function getMaxProductPriceCate($id){
            $this->db->select('products.*');
            $this->db->from('products');
            $this->db->select_max('price');
            $this->db->where('products.category_id',$id);
            $this->db->limit(1);
            $query = $this->db->get();
            $result = $query->row();
            return $price = $result->price;
        }

        public function getMinProductPriceBrand($id){
            $this->db->select('products.*');
            $this->db->from('products');
            $this->db->select_min('price');
            $this->db->where('products.brand_id',$id);
            $this->db->limit(1);
            $query = $this->db->get();
            $result = $query->row();
            return $price = $result->price;
        }

        public function getMaxProductPriceBrand($id){
            $this->db->select('products.*');
            $this->db->from('products');
            $this->db->select_max('price');
            $this->db->where('products.brand_id',$id);
            $this->db->limit(1);
            $query = $this->db->get();
            $result = $query->row();
            return $price = $result->price;
        }

        public function insertComment($data){
            return $this->db->insert('comments',$data);
        }

        public function getListComments($id){
            $query = $this->db->get_where('comments', array('product_id' => $id, 'status' => 1));
            return $query->result();
        }

        public function countCommentsByProductId($product_id){
            $this->db->where('product_id', $product_id);
            $this->db->where('status', 1); 
            
            return $this->db->count_all_results('comments');
        }

        public function getAverageRatingByProductId($product_id) {
            $this->db->select_avg('stars', 'avg_rating');
            $this->db->where('product_id', $product_id);
            $this->db->where('status', 1);
        
            $query = $this->db->get('comments');
        
            if ($query->num_rows() > 0) {
                $row = $query->row();
                return $row->avg_rating;
            } else {
                return 0; // Trả về 0 nếu không có bình luận nào thỏa mãn điều kiện
            }
        }


    }



?>