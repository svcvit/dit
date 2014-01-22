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
        $limit = 15;
        $this->data['fields'] = array(
                    'id' => 'id',
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'media' => 'Media',
                    'email' => 'E-mail',
                    'country' => 'Country',
                    'vip' => 'VIP',
                    'attend' => 'Attend',
                    'date' => 'Date',
                    'interview_with' => 'Interviw',
                    'reg_date' => 'Invitation Date'
                    
         );
        
        
        
        
        
        $this->data['sort_by']       = $sort_by;
        $this->data['sort_order']    = $sort_order;
        
       
        
       
        
        
        $this->load->model('dashboard_model');
        $ids = $this->dashboard_model->currentUser($_SESSION['username']);
        $this->data['items'] = $this->dashboard_model->getRecords($limit, $offset, $sort_by, $sort_order, $ids[0]->id);
        
        
        // echo $_SESSION['username'];
        echo '<pre>';
         $this->dashboard_model->currentUser($_SESSION['username']);
        
         
         print_r($ids[0]->id);
         echo '</pre>';
        $config['base_url'] = site_url("dashboard/index/$sort_by/$sort_order");
        $config['total_rows'] = $this->dashboard_model->numberRecords();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        

        
        $this->layout->setLayout('layout_admin');
        $this->layout->view('/admin/dashboard_view', $this->data);
        

    }
}



