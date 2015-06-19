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
        $data['branch_name'] = $this->api_data->fetch_branch_name_from_code($branch_code);
        $data['college_name'] = $this->api_data->fetch_college_name_from_code($college_code);

        $data['report'] = $this->api_data->fetch_branch_allotment_report($college_code, $branch_code);
        $this->load->view('branch_wise_report', $data );
    }

    public function allotment_letter($rank){
        $data['student'] = $this->api_data->fetch_student_details_from_rank($rank);
        $data['college_name'] = $this->api_data->fetch_college_name_from_rank($rank);
        $data['branch_name'] = $this->api_data->fetch_branch_name_from_rank($rank);
        $this->load->view('allotment_letter', $data);
    }
}


?>