<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct()
    {
        
        session_start();
        parent::__construct();
        if ( !isset($_SESSION['username']) ) {
            redirect('login');
        }

    }
    
	public function index()
	{
            $this->data['admin'] = 'admin';
            $this->load->model('user_model');
            
            $this->data['users'] = $this->user_model->get();
            
            
            
        $this->load->model('dashboard_model');
        $correntuser = $this->dashboard_model->currentUser($_SESSION['username']);
        
        
        if($correntuser[0]->user_type == 'admin'){
           $this->data['users'] = $this->user_model->get();
        }else{
         $this->data['users'] = $this->dashboard_model->currentUser($_SESSION['username']);
        }
            
            /*
            echo "<pre>";
            print_r($this->data['users']);
            echo "</pre>";
			*/
            $this->layout->setLayout('layout_admin');
            
            $this->layout->view('/admin/users_view', $this->data);

	}
        
        public function edit($id = NULL){
            
            $this->data['admin'] = 'admin';
            $this->load->model('user_model');
            $this->data['users'] = $this->user_model->get($id);
           
            
            if($id){
                $this->data['users'] = $this->user_model->get($id);
               
                count($this->data['users']) || $this->data['errors'][] = 'User could not be found';
            }else{
                
                $this->data['users'] = $this->user_model->get_new();
            }
            
            $rules = $this->user_model->rules_admin;
            $id || $rules['password'];
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run()== TRUE) {
                $data = $this->user_model->array_from_post(array('name','email','password'));
                
                
               $data['password'] = $this->user_model->hash($data['password']);
            
                $this->user_model->save($data, $id);
                redirect('users');
                
            }
            $this->layout->setLayout('layout_admin');
            $this->layout->view('/admin/edit_view', $this->data);
            
        }
        
        public function delete($id){
           $this->load->model('user_model');
           $this->user_model->delete($id);
           redirect('users');
        }
        
        public function _unique_email($str){
            
            $this->load->model('user_model');
            
            $id = $this->uri->segment(3);
            $this->db->where('email', $this->input->post('email'));
            !$id || $this->db->where('id !=', $id);
            $user = $this->user_model->get();
            
            if(count($user)){
                $this->form_validation->set_message('_unique_email', '%s shold be unique');
                return FALSE;
            }
            return TRUE;
        }
        
        
}
