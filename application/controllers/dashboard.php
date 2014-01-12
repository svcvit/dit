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
            
            $this->layout->setLayout('layout_admin');
            
            $this->layout->view('/admin/dashboard_view');
		
            

	}
}

