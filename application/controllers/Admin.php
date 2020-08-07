<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        // Inside Controller we have to load the database and form the connection
		    $this->load->database();
            $this->load->library('session');
            $this->load->model('admin_model');
            $this->load->model('class_model');
            $this->load->model('teacher_model');
            $this->load->model('topic_model');
            $this->load->model('subject_model');
            $this->load->model('student_model');


    }


    public function index() {

        if($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');
        if($this->session->userdata('admin_login') == 1) redirect(base_url(). 'admin/dashboard', 'refresh');
    }

    function dashboard() {

        if($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');

        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('Admin Dashboard');

        $this->load->view('backend/index', $page_data);
    }

    function manage_profile($param1 = null, $param2 = null, $param3 = null) {

        if($param1 == 'update') {
            $this->admin_model->updateAdminInformation();
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/manage_profile', 'refresh');
        }

        if($param1 == 'changePassword') {
            $this->admin_model->changeAdminPasswordInformation();
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/manage_profile', 'refresh');
        }
    
        $page_data['page_name'] = 'manage_profile';
        $page_data['page_title'] = get_phrase('Manage Profile');

        $this->load->view('backend/index', $page_data);

    }


    function classes($param1 = null, $param2 = null, $param3 = null){
        // If the first param is 'create', go to class Model and pick createClassFunction(). 
        // If successful, show the success message 
        if($param1 == 'create'){
            $this->class_model->createClassFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data created successfully'));
            redirect(base_url() . 'admin/classes', 'refresh');
        }

        // If the first param is 'update', go to class Model and pick updateClassFunction(). 
        // Input the parameter "gllms/admin/manage_class/2" 
        if($param1 == 'update'){
            $this->class_model->updateClassFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url() . 'admin/classes', 'refresh');
        }

        if($param1 == 'delete'){
            $this->class_model->deleteClassFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url() . 'admin/classes', 'refresh');
        }

        $page_data['page_name'] = 'class';
        $page_data['page_title'] =  get_phrase('Manage Class');
        $this->load->view('backend/index', $page_data);

    }

    function teacher($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'create'){
            $this->teacher_model->createTeacherFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data created successfully'));
            redirect(base_url() . 'admin/teacher', 'refresh');
        }

        if($param1 == 'update'){
            $this->teacher_model->updateTeacherFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url() . 'admin/teacher', 'refresh');
        }

        if($param1 == 'delete'){
            $this->teacher_model->deleteTeacherFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url() . 'admin/teacher', 'refresh');
        }

        $page_data['page_name'] = 'teacher';
        $page_data['page_title'] =  get_phrase('Manage Teacher');
        $this->load->view('backend/index', $page_data);

    }

    function topic($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'create'){
            $this->topic_model->createtopicFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data created successfully'));
            redirect(base_url() . 'admin/topic', 'refresh');
        }

        if($param1 == 'update'){
            $this->topic_model->updatetopicFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url() . 'admin/topic', 'refresh');
        }

        if($param1 == 'delete'){
            $this->topic_model->deletetopicFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url() . 'admin/topic', 'refresh');
        }

        $page_data['page_name'] = 'topic';
        $page_data['page_title'] =  get_phrase('Manage Topic');
        $this->load->view('backend/index', $page_data);

    }

    function subject($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'create'){
            $this->subject_model->createSubjectFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data created successfully'));
            redirect(base_url() . 'admin/subject', 'refresh');
        }

        if($param1 == 'update'){
            $this->subject_model->updateSubjectFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url() . 'admin/subject', 'refresh');
        }

        if($param1 == 'delete'){
            $this->subject_model->deleteSubjectFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url() . 'admin/subject', 'refresh');
        }

        $page_data['page_name'] = 'subject';
        $page_data['page_title'] =  get_phrase('Manage Subject');
        $this->load->view('backend/index', $page_data);

    }

    function student($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'create'){
            $this->student_model->createStudentFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data created successfully'));
            redirect(base_url() . 'admin/student', 'refresh');
        }

        if($param1 == 'update'){
            $this->student_model->updateStudentFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url() . 'admin/student', 'refresh');
        }

        if($param1 == 'delete'){
            $this->student_model->deleteStudentFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url() . 'admin/student', 'refresh');
        }

        $page_data['page_name'] = 'student';
        $page_data['page_title'] =  get_phrase('Manage Student');
        $this->load->view('backend/index', $page_data);

    }

    function get_class_topic($class_id){

        $topic = $this->db->get_where('topic', array('class_id' => $class_id))->result_array();
        foreach ($topic as $key => $topic){
            echo '<option value="'.$topic['topic_id'].'">'.$topic['name'].'</option>';
        }
    }

    function create_online_quiz(){
        $page_data['page_name'] = 'add_online_quiz';
        $page_data['page_title'] =  get_phrase('Online Quiz');
        $this->load->view('backend/index', $page_data);
    }

    function get_class_topic_subject ($class_id){
        $page_data['class_id'] = $class_id;
        $this->load->view('backend/admin/class_routine_topic_subject_selector', $page_data);
    }



    function manage_online_quiz ($param1 = null, $param2 = null, $param3 = null){
        
        $running_year = $this->db->get_where('settings', array('type' => 'session'))->row()->description;
        
        if($param1 == ''){
           
            $match = array('status !=' => 'expired', 'running_year' => $running_year);
            $page_data['status'] = 'active';
            $this->db->order_by('quiz_date', 'desc');
            $page_data['online_quizs'] = $this->db->where($match)->get('online_quiz')->result_array();
        }

        if($param1 == 'expired'){
 
             $match = array('status' => 'expired', 'running_year' => $running_year);
             $page_data['status'] = 'expired';
             $this->db->order_by('quiz_date', 'desc');
             $page_data['online_quizs'] = $this->db->where($match)->get('online_quiz')->result_array();
         }

        if($param1 == 'create'){
            // Need to do some validation
            if ($this->input->post('class_id') > 0 && $this->input->post('topic_id') > 0 && $this->input->post('subject_id') > 0) {
                $this->crud_model->create_online_quiz();
                $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
                redirect(site_url('admin/manage_online_quiz'), 'refresh');
            }
            else {
                $this->session->set_flashdata('error_message', get_phrase('ensure subject, class and topic are selected'));
                redirect(base_url() . 'admin/manage_online_quiz', 'refresh');
            }
        }

        if($param1 == 'edit'){
            if($this->input->post('class_id') > 0 && $this->input->post('subject_id') > 0 && $this->input->post('topic_id') > 0){
                $this->crud_model->update_online_quiz();
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url() . 'admin/manage_online_quiz', 'refresh');
            }
            else {
                $this->session->set_flashdata('error_message', get_phrase('ensure subject, class and topic are selected'));
                redirect(base_url() . 'admin/manage_online_quiz', 'refresh');
            }
        }

        if($param1 == 'delete'){
            $this->crud_model->delete_online_quiz($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url() . 'admin/manage_online_quiz', 'refresh');
        }

        // Need to create the page name for the page to load! e.g. /admin/manage_online_quiz/. Else Error 404, page not found.
        $page_data['page_name'] = 'manage_online_quiz';
        $page_data['page_title'] =  get_phrase('Online quiz');
        $this->load->view('backend/index', $page_data);

    }


    // Type: True or False Questions, OR Multiple Choice type questions

    function manage_online_quiz_question($online_quiz_id = null, $task = null, $type = null){

        if ($task == 'add') {
            if ($type == 'multiple_choice') {
                $this->crud_model->add_multiple_choice_question_to_online_quiz($online_quiz_id);
            }
            elseif ($type == 'true_false') {
                $this->crud_model->add_true_false_question_to_online_quiz($online_quiz_id);
            }
            elseif ($type == 'fill_in_the_blanks') {
                $this->crud_model->add_fill_in_the_blanks_question_to_online_quiz($online_quiz_id);
            }
            // Concatenate with quiz Id 
            redirect(site_url('admin/manage_online_quiz_question/'.$online_quiz_id), 'refresh');
        }

        $page_data['online_quiz_id'] = $online_quiz_id;
        $page_data['page_name'] = 'manage_online_quiz_question';
        // Display the Title of the quiz at the top of page
        $page_data['page_title'] = $this->db->get_where('online_quiz', array('online_quiz_id'=>$online_quiz_id))->row()->title;
        $this->load->view('backend/index', $page_data);
    }


    // This function is for deciding which question type in the 3 different view/admin pages
    function load_question_type($type, $online_quiz_id) {
        $page_data['question_type'] = $type;
        $page_data['online_quiz_id'] = $online_quiz_id;
        $this->load->view('backend/admin/online_quiz_add_'.$type, $page_data);
    }


    function manage_multiple_choices_options() {
        $page_data['number_of_options'] = $this->input->post('number_of_options');
        $this->load->view('backend/admin/manage_multiple_choices_options', $page_data);
    }

    function delete_question_from_online_quiz($question_id){
        $online_quiz_id = $this->db->get_where('question_bank', array('question_bank_id' => $question_id))->row()->online_quiz_id;
        $this->crud_model->delete_question_from_online_quiz($question_id);
        
        $this->session->set_flashdata('flash_message' , get_phrase('Data deleted successfully'));
        redirect(base_url() . 'admin/manage_online_quiz_question/'. $online_quiz_id, 'refresh');
    }


    function update_online_quiz_question($question_id = null, $task = null, $online_quiz_id = null) {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');
        $online_quiz_id = $this->db->get_where('question_bank', array('question_bank_id' => $question_id))->row()->online_quiz_id;
        $type = $this->db->get_where('question_bank', array('question_bank_id' => $question_id))->row()->type;

        if ($task == "update") {
            if ($type == 'multiple_choice') {
                $this->crud_model->update_multiple_choice_question($question_id);
            }
            elseif($type == 'true_false'){
                $this->crud_model->update_true_false_question($question_id);
            }
            elseif($type == 'fill_in_the_blanks'){
                $this->crud_model->update_fill_in_the_blanks_question($question_id);
            }
            redirect(site_url('admin/manage_online_quiz_question/'.$online_quiz_id), 'refresh');
        }
        $page_data['question_id'] = $question_id;
        $page_data['page_name'] = 'update_online_quiz_question';
        $page_data['page_title'] = get_phrase('update_question');
        $this->load->view('backend/index', $page_data);
    }

    function update_online_quiz($param1 = null){

        $page_data['online_quiz_id'] = $param1;
        $page_data['page_name'] = 'edit_online_quiz';
        $page_data['page_title'] = get_phrase('update quiz');
        $this->load->view('backend/index', $page_data);
    }

    function manage_online_quiz_status($online_quiz_id = null, $status = null){
        $this->crud_model->manage_online_quiz_status($online_quiz_id, $status);
        redirect(site_url('admin/manage_online_quiz'), 'refresh');
    }


    function view_online_quiz_result($online_quiz_id){
        $page_data['online_quiz_id'] = $online_quiz_id;
        $page_data['page_name'] = 'view_online_quiz_result';
        $page_data['page_title'] = get_phrase('result');
        $this->load->view('backend/index', $page_data);
    }


    function general_message(){

        $page_data['message'] = $this->input->post('message');
        $page_data['user_id'] = $this->input->post('user_id');
        $page_data['date'] = strtotime(date('Y-m-d'));

        $sql = "select * from general_message order by general_message_id desc limit 1";
        $return_query = $this->db->query($sql)->row()->general_message_id + 1;
        $page_data['general_message_id'] = $return_query;
        $this->db->insert('general_message', $page_data);
        echo json_encode($page_data);
    }

}