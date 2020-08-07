<?php $online_quiz = $this->db->get_where('online_quiz', array('online_quiz_id' => $online_quiz_id))->row_array();
    $topic = $this->db->get_where('topic', array('topic_id' => $online_quiz['topic_id']))->result_array();
    $subjects = $this->db->get_where('subject', array('subject_id' => $online_quiz['subject_id']))->result_array();
?>

<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-body table-responsive">
            <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('quiz_settings'); ?>
            <hr>
            <?php echo form_open(site_url('admin/manage_online_quiz/edit'), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                <input value="<?php echo $online_quiz['online_quiz_id']; ?>" type="hidden" name="online_quiz_id">
            <div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('quiz_title'); ?></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?php echo $online_quiz['title']; ?>" name="quiz_title" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('class'); ?></label>
                <div class="col-sm-12">
                    <select name="class_id" id="class_id" class="form-control selectboxit" onchange="return get_class_topic_subject(this.value)" required>
                        <option value=""><?php echo get_phrase('select_class'); ?></option>
                        <?php $classes = $this->db->get('class')->result_array();
                        foreach ($classes as $row) : ?>
                            <option value="<?php echo $row['class_id']; ?>" <?php if ($row['class_id'] == $online_quiz['class_id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('topic'); ?></label>
                <div class="col-sm-12">
                    <select name="topic_id" id="topic_id" class="form-control" required>
                        <option value=""><?php echo get_phrase('select_class'); ?></option>
                        <?php
                        foreach ($topic as $row) : ?>
                            <option value="<?php echo $row['topic_id']; ?>" <?php if ($row['topic_id'] == $online_quiz['topic_id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('subject'); ?></label>
                <div class="col-sm-12">
                    <select name="subject_id" id="subject_id" class="form-control" required>
                        <option value=""><?php echo get_phrase('select_class'); ?></option>
                        <?php
                        foreach ($subjects as $row) : ?>
                            <option value="<?php echo $row['subject_id']; ?>" <?php if ($row['subject_id'] == $online_quiz['subject_id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('quiz_date'); ?></label>
                <div class="col-sm-12">
                    <input class="form-control m-r-10" name="quiz_date" type="date" value="<?php echo date('Y-m-d', $online_quiz['quiz_date']); ?>" id="example-date-input" required>
                </div>
            </div>

            <!-- .row -->
            <div class="row">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('quiz_time'); ?></label>
                <div class="col-lg-6">
                    <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                        <input type="text" name="time_start" class="form-control" value="<?php echo $online_quiz['time_start']; ?>">
                        <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="input-group clockpicker " data-placement="left" data-align="top" data-autoclose="true">
                        <input type="text" name="time_end" class="form-control" value="<?php echo $online_quiz['time_end']; ?>">
                        <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                    </div>
                </div>

            </div>
            <!-- /.row -->

            <hr>

            <div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('quiz_percentage'); ?></label>
                <div class="col-sm-12">
                    <input type="number" value="<?php echo $online_quiz['minimum_percentage']; ?>" name="minimum_percentage" class="form-control" placeholder="Write minimum percentage score here" required>
                </div>
                <div class="col-sm-3" style="text-align: left; line-height: 30px;"> <span style="color:#FF0000">Write minimum percentage</span></div>
            </div>

            <div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo get_phrase('instructions'); ?></label>
                <div class="col-sm-12">
                    <textarea rows="5" name="instruction" class="form-control" placeholder="please specify quiz instructions here"><?php echo $online_quiz['instruction']; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info btn-rounded btn-block btn-sm"><i class="fa fa-edit"></i>&nbsp;<?php echo get_phrase('update_quiz'); ?></button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    var class_id = '';
    var starting_hour = '';
    var starting_minute = '';
    var ending_hour = '';
    var ending_minute = '';

    jQuery(document).ready(function($) {
        $('#add_class_routine').attr('disabled', 'disabled')
    });

    function get_class_topic_subject(class_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/get_class_topic_subject/' + class_id,
            success: function(response) {
                jQuery('#topic_subject_selection_holder').html(response);
            }
        });
    }

    function check_validation() {
        console.log('class_id: ' + class_id + ' starting_hour:' + starting_hour + ' starting_minute: ' + starting_minute + ' ending_hour: ' + ending_hour + ' ending_minute: ' + ending_minute);
        if (class_id !== '' && starting_hour !== '' && starting_minute !== '' && ending_hour !== '' && ending_minute !== '') {
            $('#add_class_routine').removeAttr('disabled');
        }
    }
    $('#class_id').change(function() {
        class_id = $('#class_id').val();
        check_validation();
    });
    $('#starting_hour').change(function() {
        starting_hour = $('#starting_hour').val();
        check_validation();
    });
    $('#starting_minute').change(function() {
        starting_minute = $('#starting_minute').val();
        check_validation();
    });
    $('#ending_hour').change(function() {
        ending_hour = $('#ending_hour').val();
        check_validation();
    });
    $('#ending_minute').change(function() {
        ending_minute = $('#ending_minute').val();
        check_validation();
    });
</script>