<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();

    } 

    function updateAdminInformation() {

        $page_data['name']  = html_escape($this->input->post('name'));
        $page_data['username'] = html_escape($this->input->post('username'));
        $page_data['phone'] = html_escape($this->input->post('phone'));

        $this->db->where('admin_id', $this->session->userdata('admin_id'));
        // CodeIgniter to set information to the session we use set_userdata
        $this->db->update('admin', $page_data);

        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id'). ".jpg");
    }

    function changeAdminPasswordInformation() {
        $page_data['password'] = sha1($this->input->post('password'));
        $confirm_password = sha1($this->input->post('confirm_password'));

        if($page_data['password'] == $confirm_password) {
            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $page_data);
        }

        elseif($page_data['password'] != $confirm_password) {

            $this->session->set_flashdata('error_message', get_phrase('Password not the same'));
            redirect(base_url(). 'admin/manage_profile', 'refresh');
        }
    }

    // In models we do not use the method "redirect", instead we use the method "return"
    function select_admin_information_from_admin_table() {

        // $query = "SELECT * FROM admin WHERE admin_id = '".$this->session->userdata('admin_id')."'";

        // This is useful when you want to query all the results in the admin table
        $query = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('admin_id')));
        return $result = $query->result_array();
    }

}