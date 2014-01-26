<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        session_start();
        parent::__construct();
        
    }

    public function index()
    {
    $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
    $this->output->enable_profiler(TRUE);
    $this->load->library('user_agent');
        if ( isset($_SESSION['username']) ) {
            redirect('dashboard');
        }


        $this->load->library('form_validation');
        $this->fieldrules();

        if ( $this->form_validation->run() !== false ) {
            // then validation passed. Get from db
            $this->load->model('login_model');
            $res = $this
                ->login_model
                ->verify_user(
                    $this->input->post('email'),
                    $this->input->post('password')
                );
            
                
               

            if ( $res !== false ) {
                $_SESSION['username'] = $this->input->post('email');
                redirect('dashboard');
            }

        }

        $this->load->view('admin/login_view');
    }
    
    public function singnup()
    {
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        $this->output->enable_profiler(TRUE);
        
        $this->load->model('user_model');
        
         $rules = $this->ruls();
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run()== TRUE) {
                
                $data = $this->user_model->array_from_post(array('name','country','email','password'));
                

               $data['password'] = $this->user_model->hash($data['password']);
            
                $this->user_model->save($data);
                redirect('login');
                
                
            }
        
        
        $this->load->view('/admin/singnup_view');
    }
    
    public function _unique_email($str){
            
            $this->load->model('user_model');
            
            $id = $this->uri->segment(3);
            $this->db->where('email', $this->input->post('email'));
            !$id || $this->db->where('id !=', $id);
            $user = $this->user_model->get();
            
            if(count($user)){
                $this->form_validation->set_message('_unique_email', 'Sorry, it looks like %s belongs to an existing account.');
                return FALSE;
            }
            return TRUE;
        }
        
        
        public function ruls(){
            
        $rules_sing = array(
        'name'=>array(
        'field' => 'name',
        'label' => 'Name,Surname',
        'rules' => 'trim|required|xss_clean'
        ),
        
        'country'=>array(
        'field' => 'country',
        'label' => 'Country',
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
        'rules' => 'trim|required|matches[password_confirm]'
        ),
        
        'password_confirm'=>array(
        'field' => 'password_confirm',
        'label' => 'Confirm password',
        'rules' => 'trim|required|matches[password]'
        ),
            
        
    );
                
      $this->form_validation->set_rules($rules_sing);
                
        }

    protected function fieldrules() {
        $rules = array(
            array(
            'field'   => 'email',
            'rules'   => 'required|valid_email|trim|xss_clean'
        ),
            array(
                'field'   => 'password',
                'rules'   => 'required|trim|xss_clean'
            )
        );

        $this->form_validation->set_rules($rules);
    }

    public function logout()
    {
        session_destroy();
        $this->load->view('admin/login_view');
    }
}