<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index()
    {
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
        
        
        
        $this->layout->setLayout('layout_admin');
        $this->layout->view('/admin/singnup_view');
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