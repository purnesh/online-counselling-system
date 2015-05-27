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
        $data = $username.$password;
        return $data;
    }

}
?>