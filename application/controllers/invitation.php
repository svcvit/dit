<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.11.13
 * Time: 12:15
 */

class Invitation extends CI_Controller {

       public function index(){

           $this->load->library('form_validation');
           $this->fieldrules();
           
           $this->layout->view('/frontend/invitation_view');

           if($this->form_validation->run() == false) {

              

           }
       }


    protected function fieldrules() {
        $rules = array(
            array(
                'field'   => 'firstname',
                'label'   => 'Vorname',
                'rules'   => 'required|trim|xss_clean|max_length[100]'
            ),
            array(
                'field'   => 'lastname',
                'label'   => 'Nachname',
                'rules'   => 'required|trim|xss_clean|max_length[100]|min_length[3]'
            ),
            array(
                'field'   => 'firma',
                'label'   => 'Firma',
                'rules'   => 'required|trim|xss_clean'
            ),
            array(
                'field'   => 'email',
                'label'   => 'E-Mail',
                'rules'   => 'required|valid_email|trim|xss_clean'
            ),
            array(
                'field'   => 'participate',
                'label'   => 'participate',
                'rules'   => 'callback_participateCheck|trim|xss_clean'
            )
        );

        $this->form_validation->set_message('participateCheck', ' Ja oder Nein?');
        $this->form_validation->set_rules($rules);
    }

    public function participateCheck($entry) {
        return in_array($entry, array('yes', 'no'))
            ? true
            : false;
    }


} 