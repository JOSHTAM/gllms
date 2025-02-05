<?php
$online_quiz_info = $this->db->get_where('online_quiz', array('online_quiz_id' => $param2))->row();
$class = $this->db->get_where('class', array('class_id' => $online_quiz_info->class_id))->row()->name;
$topic = $this->db->get_where('topic', array('topic_id' => $online_quiz_info->topic_id))->row()->name;
$subject = $this->db->get_where('subject', array('subject_id' => $online_quiz_info->subject_id))->row()->name;
$questions = $this->db->get_where('question_bank', array('online_quiz_id' => $param2))->result_array();
$answers = "answers";
// calculate total marks
$total_marks = 0;
foreach ($questions as $question)
    $total_marks += $question['mark'];
?>
<div style="text-align: center;">
    <img src="<?php echo base_url('uploads/logo.png'); ?>" width="10%">
    <!-- <h3><?php //echo get_settings('system_name'); ?></h3> -->
    <h3><?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?></h3>
    <b><?php echo $online_quiz_info->title; ?></b><br>
    <b><?php echo get_phrase('class'); ?>: <?php echo $class; ?> | <?php echo get_phrase('topic'); ?>: <?php echo $topic; ?></b><br>
    <b><?php echo get_phrase('subject'); ?>: <?php echo $subject; ?></b><br>
    <b><?php echo get_phrase('total_marks'); ?>: <?php echo $total_marks; ?></b><br>
    <b><?php echo get_phrase('time'); ?>: <?php echo ($online_quiz_info->duration / 60) . ' ' . get_phrase('minutes'); ?></b>
    <p><?php echo get_phrase('instructions'); ?>: <?php echo $online_quiz_info->instruction; ?></p>
</div>
<div style="margin: 50px 20px 20px 20px;">
    <?php $count = 1;
    foreach ($questions as $row) : ?>
        <div style="height: auto;">
            <div style="width: 95%; float: left;">
                <?php echo $count++; ?>. <?php echo $row['type'] == 'fill_in_the_blanks' ? str_replace('^', '__________', $row['question_title']) : $row['question_title']; ?>
                <p>
                    <?php if ($row['type'] == 'true_false') { ?>
                        <ul>
                            <li><?php echo get_phrase('true'); ?></li>
                            <li><?php echo get_phrase('false'); ?></li>
                        </ul>
                        <?php if ($answers == 'answers') : ?>
                            <i><strong>[<?php echo get_phrase('correct_answer'); ?> - <?php echo $row['correct_answers']; ?>]</strong></i>
                        <?php endif; ?>
                    <?php } else if ($row['type'] == 'fill_in_the_blanks') { ?>
                        <b><?php echo get_phrase('answer'); ?>: </b>
                        <?php if ($answers == 'answers') :
                            $suitable_words = implode(',', json_decode($row['correct_answers']));
                        ?>
                            <br><br>
                            <i><strong>[<?php echo get_phrase('correct_answers'); ?> - <?php echo $suitable_words; ?>]</strong></i>
                        <?php endif; ?>
                    <?php } else {
                        if ($row['options'] != '' || $row['options'] != null)
                            $options = json_decode($row['options']);
                        else
                            $options = array();
                    ?>
                        <ul>
                            <?php for ($i = 0; $i < $row['number_of_options']; $i++) : ?>
                                <li><?php echo $options[$i]; ?></li>
                            <?php endfor; ?>
                        </ul>
                        <?php if ($answers == 'answers') :
                            if ($row['correct_answers'] != "" || $row['correct_answers'] != null) {
                                $correct_options = json_decode($row['correct_answers']);
                                $r = '';
                                for ($i = 0; $i < count($correct_options); $i++) {
                                    $x = $correct_options[$i];
                                    $r .= $options[$x - 1] . ',';
                                }
                            } else {
                                $correct_options = array();
                                $r = get_phrase('none_of_them.');
                            }
                        ?>
                            <i><strong>[<?php echo get_phrase('correct_answer'); ?> - <?php echo rtrim(trim($r), ','); ?>]</strong></i>
                        <?php endif; ?>
                    <?php } ?>
                </p>
            </div>
            <div style="width: 5%; float: right; text-align: right;">
                <b><?php echo $row['mark']; ?></b>
            </div>
        </div>
        <div style="height: 80px;"></div>
    <?php endforeach; ?>
</div>