<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {


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
        $this->load->model('dashboard_model');
        $config['base_url'] = site_url('dashboard/index');
        $config['total_rows'] = $this->dashboard_model->numberRecords();
        $config['per_page'] = 15;
        $this->pagination->initialize($config);
        $data['records'] = $this->dashboard_model->getRecords($config['per_page'], $this->uri->segment(3));
        $this->data['items'] = $this->dashboard_model->getRecords();
        $this->layout->setLayout('layout_admin');         
        $this->layout->view('/admin/dashboard_view', $this->data);
        
        $this->data['item'] = $this->dashboard_model->getRecords();
        

    }
}



