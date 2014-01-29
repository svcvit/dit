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

    public function index($sort_by ='id', $sort_order='desc' ,$offset = 0)
    {
        
        //$this->output->enable_profiler(TRUE);
        $limit = 15;
        $this->data['fields'] = array(
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'media' => 'Media',
                    'email' => 'E-mail',
                    'country' => 'Country',
                    'vip' => 'VIP',
                    'attend' => 'Attend',
                    'date_tour' => 'Date Tour',
                    'date_interview' => 'Interview Date',
                    'interview_with' => 'Interview',
                    'reg_date' => 'Accreditation Date'
                    
         );
        
        
        
        
        
        $this->data['sort_by']       = $sort_by;
        $this->data['sort_order']    = $sort_order;
        
       
        
       
        
        
        $this->load->model('dashboard_model');
        $correntuser = $this->dashboard_model->currentUser($_SESSION['username']);
        
        $config['base_url'] = site_url("dashboard/index/$sort_by/$sort_order");
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        
        if($correntuser[0]->user_type == 'admin'){
           $this->data['items'] = $this->dashboard_model->getAllRecords($limit, $offset, $sort_by, $sort_order);
           $config['total_rows'] = $this->dashboard_model->numberRecords();
        }else{
         $this->data['items'] = $this->dashboard_model->getRecords($limit, $offset, $sort_by, $sort_order, $correntuser[0]->id);
         $config['total_rows'] = $this->dashboard_model->numberRecords($correntuser[0]->id);
        }
        
        $this->pagination->initialize($config);
        
        
         $this->dashboard_model->currentUser($_SESSION['username']);
        
         $this->data['admin'] = $correntuser[0]->user_type;
 

        
        $this->layout->setLayout('layout_admin');
        $this->layout->view('/admin/dashboard_view', $this->data);
        

    }
    
    
    public function links()
    {
        
        
        $this->load->model('dashboard_model');
        $correntuser = $this->dashboard_model->currentUser($_SESSION['username']);
        
        $this->data['admin'] = "manager";
        $this->data['m_id'] = $correntuser[0]->id;
        $this->layout->setLayout('layout_admin');
        $this->layout->view('/admin/links_view', $this->data);
        
    }
}



