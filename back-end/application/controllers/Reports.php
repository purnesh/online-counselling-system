<?php
/**
 * Created by PhpStorm.
 * User: hokage
 * Date: 19/5/15
 * Time: 11:47 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct($config = 'rest')
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
    }

    public function branch_allotment_report($college_code, $branch_code){
       $data['report'] = $this->api_data->fetch_branch_allotment_report($college_code, $branch_code);
        $this->load->view('branch_wise_report', $data );
    }
}


?>