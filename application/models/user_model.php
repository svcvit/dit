<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class User_model extends CI_Model {
    
    protected $_table_name = 'users';
    protected $_primary_key = 'id';
    protected $_primary_filter ='intval';
    protected $_order_by = 'name';
    protected $_timestamps = '';


    public $rules_admin = array(
        'name'=>array(
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'trim|required|xss_clean'
        ),
        
        'email'=>array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
        ),
        
        'password'=>array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'trim|matches[password_confirm]'
        ),
        
        'password_confirm'=>array(
        'field' => 'password_confirm',
        'label' => 'Confirm password',
        'rules' => 'trim|matches[password]'
        ),
            
        
    );
            
    function __construct()
    {

    }
    
    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field){
            $data[$field] = $this->input->post($field);
        }
        
        return $data;
        
    }
    
    public function get($id = NULL){
        
        if ($id !=NULL){
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        }else{
            $method = 'result';
        }
        
        if(!count($this->db->ar_orderby)){
            $this->db->order_by($this->_order_by);
        }
        return $this->db->get($this->_table_name)->$method();
        
    }
    
    public function save($data, $id = NULL){
        
        //Set timestamps
        if($this->_timestamps == TRUE){
            $now = date('Y-m-d H:i:s');
            $id || $date['created'] = $now;
            $date['modified'] = $now;
        }
        
        // Insert
        if($id === NULL){
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key]= NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
                        
        }
        // Update
        else{
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
            
        }
        return $id;
        
    }
    
    public function delete($id){
         $filter = $this->_primary_filter;
         $id = $filter($id);
         
         if(!$id){
             return FALSE;
         }
         
            $this->db->where($this->_primary_key, $id);
            $this->db->limit(1);
            $this->db->delete($this->_table_name);
    }

        public function get_new(){
        $user = new stdClass();
        $user->name = '';
        $user->email = '';
        $user->password = '';
        
        return $user;
        
    }

        public function hash($string){
        return hash('sha1', $string);
    }

   
}