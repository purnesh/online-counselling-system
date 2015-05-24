<?php
/**
 * Created by PhpStorm.
 * User: hokage
 * Date: 19/5/15
 * Time: 11:47 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller {

    public function user($type, $username, $password){
        $password = $this->encryption->encrypt($password);
        echo $type.$username.$password;
    }
}


?>