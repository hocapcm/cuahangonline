<?php
    class LoginModel extends CI_Model{
        public function checkLogin($email,$password){
            $query = $this->db->where('email',$email)->where('password',$password)->get('user');
            return $query->result();
        }

        public function checkLoginCustomer($email,$password){
            $query = $this->db->where('email',$email)->where('password',$password)->get('customers');
            return $query->result();
        }

        public function getUserById($id){
            $query =  $this->db->get_where('customers',['id'=>$id]);
            return $query->row();
        }

        public function newCustomer($data){
            return $this->db->insert('customers',$data);

        }
        public function newShipping($data){
            $this->db->insert('shipping',$data);
            return $ship_id = $this->db->insert_id();
        }

        public function edit_user($id,$data){
            return $this->db->update('customers',$data,['id'=>$id]);
        }
        public function insert_order($data_order){
            return $this->db->insert('orders',$data_order);
        }
        public function insert_order_details($data_order_details){
            return $this->db->insert('order_details',$data_order_details);
        }

        public function checkExistingEmail($email) {
            $this->db->where('email', $email);
            $query = $this->db->get('customers');
            return $query->num_rows() > 0;
        }
        
        public function checkExistingPhone($phone) {
            $this->db->where('phone', $phone);
            $query = $this->db->get('customers');
            return $query->num_rows() > 0;
        }

    }


?>