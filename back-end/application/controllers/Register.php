<?php
/**
 * Created by PhpStorm.
 * User: hokage
 * Date: 27/5/15
 * Time: 1:25 PM
 */
class Register extends CI_Controller{
    public function __construct($config = 'rest')
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
    }

    public function student(){
        echo "red";
        echo base_url();
        echo $this->input->post('username');
    }
}

?>