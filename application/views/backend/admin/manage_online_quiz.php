<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-body table-responsive">
            <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('manage_online_quiz'); ?>
            <hr>
            <a href="<?php echo site_url('admin/manage_online_quiz'); ?>" class="btn  btn-sm btn-<?php echo $status == 'active' ? 'primary' : 'white'; ?>" style="color: #000">
                <?php echo get_phrase('active_quizs'); ?>
            </a>
            <a href="<?php echo site_url('admin/manage_online_quiz/expired'); ?>" class="btn  btn-sm btn-<?php echo $status == 'expired' ? 'primary' : 'white'; ?>" style="color:#000"> <?php echo get_phrase('expired_quizs'); ?>
            </a>
            <hr>
            <!-- The Table -->
            <!-- Table Head -->
            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>
                            <div><?php echo get_phrase('quiz_name'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('class_and_topic'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('subject'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('quiz_date'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('status'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('options'); ?></div>
                        </th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody>
                    <?php foreach ($online_quizs as $key => $row) : ?>
                        <tr>
                            <td>
                                <a href="<?php echo base_url('admin/manage_online_quiz_question/' . $row['online_quiz_id']); ?>">
                                    <?php echo $row['title']; ?>
                                </a>
                            </td>
                            <td>
                                <?php
                                echo '<b>' . get_phrase('class') . ':</b> ' . $this->db->get_where('class', array('class_id' => $row['class_id']))->row()->name . '<br/><b>' . get_phrase('topic') . ':</b> ' . $this->db->get_where('topic', array('topic_id' => $row['topic_id']))->row()->name;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $this->db->get_where('subject', array('subject_id' => $row['subject_id']))->row()->name;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo '<b>' . get_phrase('date') . ':</b> ' . date('M d, Y', $row['quiz_date']) . '<br>' . '<b>' . get_phrase('time') . ':</b> ' . $row['time_start'] . ' - ' . $row['time_end'];
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-<?php echo $row['status'] == 'published' ? 'success' : 'warning'; ?> btn-xs">
                                    <?php echo get_phrase($row['status']); ?>
                                </button>
                            </td>
                            <td style="text-align: center;">

                                <a href="<?php echo site_url('admin/manage_online_quiz_question/' . $row['online_quiz_id']); ?>" class="btn btn-sm btn-rounded btn-info" style="color:white">add questions</a>

                                <a href="<?php echo site_url('admin/update_online_quiz/' . $row['online_quiz_id']); ?>" class="btn btn-xs btn-circle btn-success" style="color:white">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <!-- DELETION LINK -->
                                <a href="#" onclick="confirm_modal('<?php echo site_url('admin/manage_online_quiz/delete/' . $row['online_quiz_id']); ?>');" class="btn btn-xs btn-circle btn-danger" style="color:white">
                                    <i class="fa fa-times"></i>
                                </a>

                                <?php if ($row['status'] == 'pending') : ?>
                                    <a href="#" onclick="publish_modal('<?php echo site_url('admin/manage_online_quiz_status/' . $row['online_quiz_id'] . '/published'); ?>', 'generic_confirmation');" type="button" class="btn btn-success btn-rounded btn-sm" style="color:white"><i class="fa fa-share-alt" aria-hidden="true"></i> <?php echo get_phrase('publish_now'); ?></a>
                                <?php elseif ($row['status'] == 'published') : ?>
                                    <a href="#" onclick="unpublish_modal('<?php echo site_url('admin/manage_online_quiz_status/' . $row['online_quiz_id'] . '/expired'); ?>', 'generic_confirmation');" type="button" class="btn btn-danger btn-rounded btn-sm" style="color:white"><i class="fa fa-times" aria-hidden="true"></i> <?php echo get_phrase('cancel_now'); ?></a>
                                <?php elseif ($row['status'] == 'expired') : ?>
                                    <a href="#" type="button" class="btn btn-primary btn-rounded btn-sm" style="color:white"><?php echo get_phrase('expired'); ?></a>
                                <?php endif; ?>

                                <a href="<?php echo site_url('admin/view_online_quiz_result/' . $row['online_quiz_id']); ?>" type="button" class="btn btn-sm btn-primary btn-rounded" style="color:white"><?php echo get_phrase('view_result'); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>