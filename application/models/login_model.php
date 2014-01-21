<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Login_model extends CI_Model {
    function __construct()
    {

    }

    public function verify_user($email, $password)
    {
        $q = $this
            ->db
            ->where('email', $email)
            ->where('password', sha1($password))
            ->where('activated', '1')   
            ->limit(1)
            ->get('users');

        if ( $q->num_rows > 0 ) {
            // person has account with us
            return $q->row();
        }
        return false;
    }
}