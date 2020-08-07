<?php
$online_quiz_details = $this->db->get_where('online_quiz', array('online_quiz_id' => $online_quiz_id))->row_array();
$students = $this->db->get_where('student', array(
    'class_id' => $online_quiz_details['class_id'], 'topic_id' => $online_quiz_details['topic_id'],
    'session' => $online_quiz_details['running_year']
))->result_array();
$subject_info = $this->crud_model->get_subject_info($online_quiz_details['subject_id']);
$total_mark = $this->crud_model->get_total_mark($online_quiz_id);
//$students = $this->db->get_where('student', array('topic_id' => $online_quiz_info->topic_id))->row()->name;
?>

<div class="row">

    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;<?php echo get_phrase('student_results'); ?><a href="<?php echo base_url(); ?>admin/manage_online_quiz"><button type="button" class="btn btn-info btn-xs pull-right"><i class="fa fa-mail-reply-all"></i>&nbsp;back</button></a></div>
            <div class="panel-body table-responsive">

                <div class="" style="text-align: left; border:1px solid green; padding-left:10px">
                    <h4>Quiz Name:&nbsp;<?php echo $online_quiz_details['title']; ?></h4>
                    <?php foreach ($subject_info as $subject) : ?>
                        <h4><?php echo get_phrase('subject') . ': ' . $subject['name']; ?></h4>
                    <?php endforeach; ?>
                    <h4><?php echo get_phrase('total_mark') . ': ' . $total_mark; ?></h4>
                    <h4><?php echo get_phrase('minimum_percentage') . ': ' . $online_quiz_details['minimum_percentage'] . '%'; ?></h4>
                    <?php
                    $current_time = time();
                    $quiz_end_time = strtotime(date('Y-m-d', $online_quiz_details['quiz_date']) . ' ' . $online_quiz_details['time_end']);
                    if ($current_time < $quiz_end_time) : ?>
                        <h4 style="color: #ef5350;"> <strong><?php echo get_phrase('quiz_has_not_finished_yet'); ?></strong></h4>
                    <?php endif ?>
                </div>

                <hr>

                <table class="table ">
                    <thead>
                        <tr>
                            <th>
                                <div><?php echo get_phrase('student_name'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('obtained_marks'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('result'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('wrong_answers'); ?></div>
                            </th>
                        </tr>
                    </thead>

                

                    <tbody>
                        <?php foreach ($students as $row) : ?>
                            <tr>
                                <!-- Name of Student -->
                                <td>
                                    <?php //$student_details = $this->crud_model->get_student_info_by_id($row['student_id']);
                                    $student_details = $this->db->get_where('student', array('student_id' => $row['student_id']))->row_array();
                                    echo $student_details['name']; 
                                    ?>
                                </td>
                                <!-- Obtained Marks -->
                                <td>
                                    <?php
                                    $query = $this->db->get_where('online_quiz_result', array('online_quiz_id' => $online_quiz_id, 'student_id' => $row['student_id']));
                                    if ($query->num_rows() > 0) {
                                        $query_result = $query->row_array();
                                        echo $query_result['obtained_mark'];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </td>
                                <!-- Result -->
                                <td>
                                    <?php
                                    $query = $this->db->get_where('online_quiz_result', array('online_quiz_id' => $online_quiz_id, 'student_id' => $row['student_id']));
                                    if ($query->num_rows() > 0) {
                                        $query_result = $query->row_array();
                                        echo get_phrase($query_result['result']);
                                    } else {
                                        echo get_phrase('fail') . ' ( ' . get_phrase('absent') . ' )';
                                    }
                                    ?>
                                </td>
                                <!-- Parsed Answer Script  -->
                                <td>
                                <?php
                                    $query = $this->db->get_where('online_quiz_result', array('online_quiz_id' => $online_quiz_id, 'student_id' => $row['student_id']));
                                    if ($query->num_rows() > 0) {
                                        $query_result = $query->row_array();
                                        $answer_script = json_decode($query_result['answer_script'], true);
                                        foreach ($answer_script as $row) {
                                            if ($row['submitted_answer'] != $row['correct_answers']) {
                                                echo get_phrase('Question: ');
                                                $question = $this->crud_model->get_question_details_by_id($row['question_bank_id'], 'question_title');
                                                $question = str_replace('^', '__________', $question);
                                                echo $question;
                                                ?> <br> <?php
                                                echo get_phrase('Answer: ');
                                                if ($row['submitted_answer'] != '') {
                                                    $answer = $this->crud_model->clean($row['submitted_answer']);
                                                    echo $answer;
                                                } else {
                                                    echo get_phrase('blank');
                                                }
                                                //echo $row['correct_answers'];
                                            }?> <br> <?php
                                        }

                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>