<?php
/**

 */

class Invitation_model extends CI_Model {

    public function saveData($aData){

        $this->db->insert('invitations', $aData);

    }

} 