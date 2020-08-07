<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('task_list'); ?></div>
            <div class="panel-body table-responsive">

                <a href="<?php echo site_url('student/online_quiz'); ?>" class="btn btn-<?php echo $data == 'active' ? 'primary' : 'white'; ?>" style="color:#000">
                    <?php echo get_phrase('active_tasks'); ?>
                </a>
                <a href="<?php echo site_url('student/online_quiz_result'); ?>" class="btn btn-default btn-<?php echo $data == 'result' ? 'primary' : 'white'; ?>" style="color:#000">
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
                            <th width="40%">
                                <div><?php echo get_phrase('options'); ?></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($quizs as $row) :
                            $current_time = time();
                            $quiz_start_time = strtotime(date('Y-m-d', $row['quiz_date']) . ' ' . $row['time_start']);
                            $quiz_end_time = strtotime(date('Y-m-d', $row['quiz_date']) . ' ' . $row['time_end']);
                            if ($current_time > $quiz_end_time)
                                continue;
                            // $quiz_start_time = strtotime(date('Y-m-d', $row['quiz_date']) );
                            // $quiz_end_time = strtotime(date('Y-m-d', $row['quiz_date']) );
                            // if ($current_time > $quiz_end_time)
                            //     continue;
                        ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td>
                                    <?php echo $this->db->get_where('subject', array('subject_id' => $row['subject_id']))->row()->name; ?>
                                </td>
                                <td>
                                    <?php
                                    echo '<b>' . get_phrase('date') . ':</b> ' . date('M d, Y', $row['quiz_date']) . '<br>' . '<b>' . get_phrase('time') . ':</b> ' . $row['time_start'] . ' - ' . $row['time_end'];
                                    //echo '<b>' . get_phrase('date') . ':</b> ' . date('M d, Y', $row['quiz_date']) . '<br>' ;
                                    ?>
                                </td>
                                <td>
                                    <?php if ($this->crud_model->check_availability_for_student($row['online_quiz_id']) != "submitted") : ?>
                                        <?php if ($current_time >= $quiz_start_time && $current_time <= $quiz_end_time) : ?>
                                            <a href="<?php echo site_url('student/take_online_quiz/' . $row['code']); ?>" class="btn btn-primary btn-rounded btn-sm" style="color:white">
                                                <i class="fa fa-check"></i>&nbsp; <?php echo get_phrase('take_quiz'); ?>
                                            </a>
                                        <?php else : ?>
                                            <div class="alert alert-info">
                                                <a href="<?php echo site_url('student/take_online_quiz/' . $row['code']); ?>" class="btn btn-primary btn-rounded btn-sm" style="color:white">
                                                    <i class="fa fa-check"></i>&nbsp; <?php echo get_phrase('take_quiz'); ?>
                                                </a>
                                                <?php echo get_phrase('you_can_only_take_the_quiz_during_the_scheduled_time'); ?>
                                            </div>
                                        <?php endif; ?>

                                    <?php else : ?>
                                        <div class="alert alert-success">
                                            <?php echo get_phrase('already_submitted'); ?>
                                        </div>
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