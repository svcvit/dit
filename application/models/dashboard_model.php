<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Dashboard_model extends CI_Model {

      function getRecords($num='', $offset='', $sort_by, $sort_order, $userId){

        $sort_order = ($sort_order == 'asc')? 'asc' : 'desc';  
        $sort_columns = array('id', 'name', 'surname', 'media','country', 'vip', 'attend', 'date', 'interview_with', 'reg_date');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by: 'id';
        
        
        
        $this->db->order_by($sort_by,$sort_order);
        return $this->db
                ->where('user_id', $userId) 
                ->get('invitations', $num, $offset)->result();
                       


        
    }
    
    function getAllRecords($num='', $offset='', $sort_by, $sort_order){

        $sort_order = ($sort_order == 'asc')? 'asc' : 'desc';  
        $sort_columns = array('id', 'name', 'surname', 'media','country', 'vip', 'attend', 'date', 'interview_with', 'reg_date');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by: 'id';
        
        
        
        $this->db->order_by($sort_by,$sort_order);
        return $this->db
                ->get('invitations', $num, $offset)->result();
                       


        
    }

    function numberRecords($user_id = NULL) {

        if($user_id){
        $num = $this->db
                ->where('user_id', $user_id)
                ->count_all_results('invitations');
        }else{
           $num = $this->db->count_all_results('invitations'); 
        }
        return $num;

    }
      function currentUser($user)
    {
        
                return $this->db
                ->where('email', $user) 
                ->get('users')->result();
        

      
    }
}