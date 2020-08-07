<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

		$this->load->database();
        $this->load->library('session');
    }


    public function index() {
        if($this->session->userdata('admin_login') == 1) redirect(base_url(). 'admin/dashboard', 'refresh');
        if($this->session->userdata('student_login') == 1) redirect(base_url(). 'student/dashboard', 'refresh');

        $this->load->view('backend/login');
    }


    // code for login, and create a session for users
    function check_login() {
        // When this function is called from login.php, it automatically calls the "login_model"
        $this->login_model->UserLoginFunction();
    }

        
    function logout() {

        $this->session->sess_destroy();
        // its a function so put a dot to concatenate later & remember to always refresh the page 
        redirect(base_url(). 'login', 'refresh');
    }
}
