<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * User: Admin
 * Date: 28.11.13
 * Time: 12:15
 */

class Invitation extends CI_Controller {

       public function index(){

           $this->load->library('form_validation');
           $this->fieldrules();
           
           var_dump($this->form_validation->run());
           
           $this->layout->view('/frontend/invitation_view');
          
           echo '<pre>';
           var_dump($this->input->post());
           echo '</pre>';
           if($this->form_validation->run() !== false) {
               
           

               $now                   = date("Y-m-d H:i:s");
               $aData['name']         = $this->input->post('name');
               $aData['surname']      = $this->input->post('surname');
               $aData['media']        = $this->input->post('media');
               $aData['email']        = $this->input->post('email');
               $aData['vip']          = $this->input->post('vip');
               $aData['attend']       = $this->input->post('attend');
               $aData['date']         = $this->input->post('date');
               $aData['reg_date']     =  $now;
                
               $this->load->model('Invitation_model');
               $this->Invitation_model->saveData($aData);
               

              

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
                'field'   => 'email',
                'label'   => 'E-Mail',
                'rules'   => 'required|valid_email|trim|xss_clean'
            )

        );

        $this->form_validation->set_rules($rules);
    }



} 