<style media="screen">
    [type="radio"]:checked,
    [type="radio"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }

    [type="radio"]:checked+label,
    [type="radio"]:not(:checked)+label {
        position: relative;
        padding-left: 28px;
        cursor: pointer;
        line-height: 20px;
        display: inline-block;
        color: #666;
    }

    [type="radio"]:checked+label:before,
    [type="radio"]:not(:checked)+label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 18px;
        height: 18px;
        border: 1px solid #ddd;
        border-radius: 100%;
        background: #fff;
    }

    [type="radio"]:checked+label:after,
    [type="radio"]:not(:checked)+label:after {
        content: '';
        width: 12px;
        height: 12px;
        background: #2aa1c0;
        position: absolute;
        top: 3px;
        left: 3px;
        border-radius: 100%;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    [type="radio"]:not(:checked)+label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    [type="radio"]:checked+label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
</style>

<?php echo form_open(site_url('admin/manage_online_quiz_question/' . $online_quiz_id . '/add/true_false'), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>

<input type="hidden" name="type" value="<?php echo $question_type; ?>">

<div class="form-group">
    <label class="col-md-12" for="example-text"><?php echo get_phrase('mark'); ?></label>
    <div class="col-sm-12">
        <input type="number" class="form-control" name="mark" min="0"/ required>
    </div>
</div>


<div class="form-group">
    <label class="col-md-12" for="example-text"><?php echo get_phrase('question_title'); ?></label>
    <div class="col-sm-12">
        <textarea onkeyup="changeTheBlankColor()" name="question_title" class="form-control" id="question_title" rows="8" cols="80" required></textarea>
    </div>
</div>

<div class="row" style="margin-top: 10px; text-align: left;">
    <div class="col-sm-8 col-sm-offset-3">
        <p>
            <input type="radio" id="true" name="true_false_answer" value="true" checked>
            <label for="true"><?php echo get_phrase('true'); ?></label>
        </p>
    </div>
    <div class="col-sm-8 col-sm-offset-3">
        <p>
            <input type="radio" id="false" name="true_false_answer" value="false">
            <label for="false"><?php echo get_phrase('false'); ?></label>
        </p>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-rounded btn-info btn-block"><?php echo get_phrase('add_question'); ?></button>
    </div>
</div>
<?php echo form_close(); ?>