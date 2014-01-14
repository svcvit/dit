<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Dashboard_model extends CI_Model {

      function getRecords($num='', $offset=''){

        $this->db->order_by('id','desc');
        return $this->db->get('invitations', $num, $offset)->result();
                       


        
    }

    function numberRecords() {

        $num = $this->db->count_all_results('invitations');

        return $num;

    }
}