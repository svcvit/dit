<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * User: Admin
 * Date: 28.11.13
 * Time: 12:15
 */


class Invitation extends CI_Controller {

       public function index($id= 2){
           
           $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
           $this->load->library('form_validation');
           $this->fieldrules();
           
          $this->form_validation->run();
           
           
          
           //echo '<pre>';
           //var_dump($this->input->post());
           //echo '</pre>';
           if($this->form_validation->run() !== false) {
               
           

               $now                   = date("Y-m-d H:i:s");
               $aData['name']         = $this->input->post('name');
               $aData['surname']      = $this->input->post('surname');
               $aData['media']        = $this->input->post('media');
               $aData['country']        = $this->input->post('country');
               $aData['email']        = $this->input->post('email');
               $aData['vip']          = $this->input->post('vip');
               $aData['attend']       = $this->input->post('attend');
               $aData['date_tour']     = $this->input->post('date');
               $aData['reg_date']     =  $now;
               $aData['user_id']     =  $id;
                
               $this->load->model('Invitation_model');
               $this->Invitation_model->saveData($aData);
               $this->layout->view('/frontend/confirmation_view');
               
			   $this->load->model('dashboard_model');
			   $correntuser = $this->dashboard_model->currentUser($id);
			  
			  
			  
			   
			   $name = $aData['name'];
			   $body = "Hello \r\nA new accreditation just arrived for you. \r\nPlease check your online accreditation list:\r\n" ;
				$body .="http://invitation.swarovski-baselworld.com/login";
               
			   $this->load->library('email');

				$this->email->from('no-reply@invitation.swarovski-baselworld.com', 'Back-End Admin');
				$this->email->to($correntuser[0]->email);

				$this->email->subject('New accreditation for Baselworld');
				$this->email->message($body);

				$this->email->send();

				//echo $this->email->print_debugger();
							   

              

            }  else {
               $this->layout->view('/frontend/invitation_view');
           }
       }
       public function form($id= 2){
           
           $comma = NULL;
            $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
           $this->load->library('form_validation');
           $this->fieldrules();
           
           $this->form_validation->run();
           
           
          /*
          echo '<pre>';
          var_dump($this->input->post());
           echo '</pre>';*/
           if($this->form_validation->run() !== false) {
            
           /*
           if($this->input->post('invite')){  
               $comma = implode(" / ", $this->input->post('invite'));
           }*/
          
               $now                   = date("Y-m-d H:i:s");
               $aData['name']         = $this->input->post('name');
               $aData['surname']      = $this->input->post('surname');
               $aData['media']        = $this->input->post('media');
               $aData['country']        = $this->input->post('country');
               $aData['email']        = $this->input->post('email');
               $aData['vip']          = $this->input->post('vip');
               $aData['attend']       = $this->input->post('attend');
               $aData['interview_with'] = $this->input->post('interview_with');;
               $aData['date_tour']        = $this->input->post('date');
               $aData['date_interview']   = $this->input->post('date_interview');
               $aData['reg_date']     =  $now;
               $aData['user_id']     =  $id;
                
               $this->load->model('Invitation_model');
               $this->Invitation_model->saveData($aData);
               $this->layout->view('/frontend/confirmation_view');
               
			 
			    $this->load->model('dashboard_model');
				$correntuser = $this->dashboard_model->currentUser($id);
			  
			  
			  
			   
			   $name = $aData['name'];
			   $body = "Hello \r\nA new accreditation just arrived for you. \r\nPlease check your online accreditation list:\r\n" ;
				$body .="http://invitation.swarovski-baselworld.com/login";
               
			   $this->load->library('email');

				$this->email->from('no-reply@invitation.swarovski-baselworld.com', 'Back-End Admin');
				$this->email->to($correntuser[0]->email);
				$this->email->subject('New accreditation for Baselworld');
				$this->email->message($body);

				$this->email->send();

				//echo $this->email->print_debugger();
							   
			   
              

           }  else {
               $this->layout->view('/frontend/invitation_view_vip');
           }
       }

        
            
            
            
        


        
    protected function fieldrules() {
        $rules = array(
            array(
                'field'   => 'name',
                'label'   => 'Name',
                'rules'   => 'required|trim|xss_clean|max_length[100]'
            ),
            array(
                'field'   => 'surname',
                'label'   => 'Surname',
                'rules'   => 'required|trim|xss_clean|max_length[100]|min_length[3]'
            ),
            array(
                'field'   => 'media',
                'label'   => 'Media',
                'rules'   => 'required|trim|xss_clean'
            ),
              array(
                'field'   => 'country',
                'label'   => 'Country',
                'rules'   => 'required|trim|xss_clean'
            ),
            array(
                'field'   => 'email',
                'label'   => 'E-Mail',
                'rules'   => 'required|valid_email|trim|xss_clean'
            )

        );

        $this->form_validation->set_rules($rules);
    }



} 