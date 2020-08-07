<div class="form-group">
    <label for="exampleInputPassword1"><?php echo get_phrase('Subject'); ?></label>
    <select name="subject_id" class="form-control" / required>
        <?php $select_subjects = $this->db->get_where('subject', array('class_id' => $class_id))->result_array();
        foreach ($select_subjects as $key => $subject) : ?>
            <option value="<?php echo $subject['subject_id']; ?>"><?php echo $subject['name']; ?></option>
        <?php endforeach; ?>

    </select>
</div>


<div class="form-group">
    <label for="exampleInputPassword1"><?php echo get_phrase('Topic'); ?></label>
    <select name="topic_id" class="form-control" / required>
        <?php $select_topic = $this->db->get_where('topic', array('class_id' => $class_id))->result_array();
        foreach ($select_topic as $key => $topic) : ?>
            <option value="<?php echo $topic['topic_id']; ?>"><?php echo $topic['name']; ?></option>
        <?php endforeach; ?>

    </select>
</div>