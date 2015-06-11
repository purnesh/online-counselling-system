<?php
/**
 * Created by PhpStorm.
 * User: hokage
 * Date: 19/5/15
 * Time: 11:47 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller {

    public function __construct($config = 'rest')
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
    }

    public function user($username, $password){
        $this->load->library('JWT');
        $this->load->model('Authenticationmodel');
        if($this->Authenticationmodel->authenticate_user($username, $password)){
            echo "Load";
            //The code for successful authentication
        }else{
            //The code for failure after authentication
        }

    }
}


?>