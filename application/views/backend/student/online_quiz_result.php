<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('view_results'); ?></div>
            <div class="panel-body table-responsive">
                <a href="<?php echo site_url('student/online_quiz'); ?>" class="btn btn-default" style="color:#000">
                    <?php echo get_phrase('active_tasks'); ?>
                </a>
                <a href="<?php echo site_url('student/online_quiz_result'); ?>" class="btn btn-<?php echo $data2 == 'active' ? 'primary' : 'white'; ?>" style="color:#000">
                    <?php echo get_phrase('view_results'); ?>
                </a>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <div><?php echo get_phrase('task_name'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('subject'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('task_date'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('total_marks'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('obtained_marks'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('result'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('answer_script'); ?></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($quizs as $row) :

                            $online_quiz_details = $this->db->get_where('online_quiz', array('online_quiz_id' => $row['online_quiz_id']))->row_array();
                            $current_time = time();
                            $quiz_end_time = strtotime(date('Y-m-d', $online_quiz_details['quiz_date']) . ' ' . $online_quiz_details['time_end']);
                        ?>
                            <tr>
                                <!-- Task Name -->
                                <td>
                                    <?php
                                    echo $online_quiz_details['title'];
                                    ?>
                                </td>
                                <!-- Subject -->
                                <td>
                                    <?php echo $this->db->get_where('subject', array('subject_id' => $online_quiz_details['subject_id']))->row()->name; ?>
                                </td>
                                <!-- Task Date & Time -->
                                <td>
                                    <?php
                                    echo '<b>' . get_phrase('date') . ':</b> ' . date('M d, Y', $online_quiz_details['quiz_date']) . '<br>' . '<b>' . get_phrase('time') . ':</b> ' . $online_quiz_details['time_start'] . ' - ' . $online_quiz_details['time_end'];
                                    ?>
                                </td>
                                <!-- Total Marks -->
                                <td>
                                    <?php
                                    echo $this->crud_model->get_total_mark($row['online_quiz_id']);
                                    ?>
                                </td>
                                <!-- Obtained Marks / Uncomment if want to show results only after stipulated deadline --> 
                                <td>
                                    <?php
                                    //if ($current_time > $quiz_end_time) {
                                    $query = $this->db->get_where('online_quiz_result', array('student_id' => $this->session->userdata('login_user_id'), 'online_quiz_id' => $row['online_quiz_id']))->row_array();
                                    if ($query['status'] == 'submitted') {
                                        $query = $this->db->get_where('online_quiz_result', array('student_id' => $this->session->userdata('login_user_id'), 'online_quiz_id' => $row['online_quiz_id']));
                                        if ($query->num_rows() > 0) {
                                            $query_result = $query->row_array();
                                            $obtained_marks = $query_result['obtained_mark'];
                                        } else {
                                            $obtained_marks = 0;
                                        }
                                        echo $obtained_marks;
                                    }
                                    //}
                                    ?>
                                </td>
                                <!-- Results / Uncomment if want to show results only after stipulated deadline -->
                                <td>
                                    <?php
                                    //if ($current_time > $quiz_end_time) {
                                    $query = $this->db->get_where('online_quiz_result', array('student_id' => $this->session->userdata('login_user_id'), 'online_quiz_id' => $row['online_quiz_id']))->row_array();
                                    if ($query['status'] == 'submitted') {
                                        $query = $this->db->get_where('online_quiz_result', array('student_id' => $this->session->userdata('login_user_id'), 'online_quiz_id' => $row['online_quiz_id']));
                                        if ($query->num_rows() > 0) {
                                            $query_result = $query->row_array();
                                            $result = get_phrase($query_result['result']);
                                        } else {
                                            $result = get_phrase('fail') . '( ' . get_phrase('absent') . ' )';
                                        }
                                    }

                                        echo $result;
                                    //}
                                    ?>
                                </td>
                                <td>
                                    <?php //if ($current_time > $quiz_end_time) : ?>
                                    <?php 
                                        $query = $this->db->get_where('online_quiz_result', array('student_id' => $this->session->userdata('login_user_id'), 'online_quiz_id' => $row['online_quiz_id']))->row_array();
                                        if ($query['status'] == 'submitted') : 
                                    ?>
                                        <a href="#" type="button" class="btn btn-success btn-rounded btn-sm" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_show_answer_script/' . $row['online_quiz_id']); ?>');" style="color:white">
                                            <?php echo get_phrase('answer_script'); ?>
                                        </a>

                                    <?php else : ?>
                                        <!-- <a href="#" type="button" class="btn btn-warning btn-rounded btn-sm" style="color:white">
                                            <i class="fa fa-sticky-note"></i>
                                            <?php //echo get_phrase('please_wait'); ?>
                                        </a> -->
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>