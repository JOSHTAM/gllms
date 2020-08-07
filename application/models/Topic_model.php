<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class topic_model extends CI_Model { 
	
	function __construct(){
        parent::__construct();
    }


    function selecttopic(){

        $query = $this->db->get('topic')->result_array();
        return $query;
    }


    function createtopicFunction(){

        $page_data['name'] =  html_escape($this->input->post('name'));
        $page_data['nick_name']=  html_escape($this->input->post('nick_name'));
        $page_data['teacher_id']=  html_escape($this->input->post('teacher_id'));
        $page_data['class_id']=  html_escape($this->input->post('class_id'));

        $this->db->insert('topic', $page_data);

    }

    function updatetopicFunction($param2){

        $page_data['name'] =  html_escape($this->input->post('name'));
        $page_data['nick_name']=  html_escape($this->input->post('nick_name'));
        $page_data['teacher_id']=  html_escape($this->input->post('teacher_id'));
        $page_data['class_id']=  html_escape($this->input->post('class_id'));

        $this->db->where('topic_id', $param2);
        $this->db->update('topic', $page_data);

    }



    function deletetopicFunction($param2){

        $this->db->where('topic_id', $param2);
        $this->db->delete('topic');

    }


}