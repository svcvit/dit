<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration extends CI_Controller {

	
    
	public function index()
	{
		$this->load->view('welcome_message');
                
                $this->load->library('migration');

                if ( ! $this->migration->current())
                {
                        show_error($this->migration->error_string());
                }else{
                    
                    echo 'Migration done';
                }

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */