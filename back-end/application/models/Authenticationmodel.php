<?php
/**
 * Created by PhpStorm.
 * User: hokage
 * Date: 18/5/15
 * Time: 12:20 AM
 */

class Authenticationmodel extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function authenticate_user($username, $password){
        $authString = "select * from authentication_data WHERE username='$username' AND password='$password'";
        $query = $this->db->query($authString);
        $isAuthentic = $query->num_rows();
        return $isAuthentic;
    }

}
?>