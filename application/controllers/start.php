<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

	
    
	public function index()
	{
            
            $this->layout->setLayout('layout_admin');
            
            $this->layout->view('/admin/login_view');
		
            

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */