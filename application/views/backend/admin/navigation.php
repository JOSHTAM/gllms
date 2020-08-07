    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">

                <li class="user-pro">
                    <a href="#" class="waves-effect">
                        <?php
                        $key = $this->session->userdata('login_type') . '_id';
                        $face_file = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key) . '.jpg';
                        if (!file_exists($face_file)) {
                            $face_file = 'uploads/default.jpg';
                        }
                        ?>
                        <img src="<?php echo base_url() . $face_file; ?>" alt="user-img" class="img-circle">

                        <span class="hide-menu">
                            <?php
                            $account_type = $this->session->userdata('login_type');
                            $account_id = $account_type . '_id';
                            $name = $this->crud_model->get_type_name_by_id($account_type, $this->session->userdata($account_id), 'name');
                            echo $name;
                            ?>
                        </span>
                    </a>

                </li>
                <!-- This means that if we are in the dashboard, select it!  -->
                <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?>"> <a href="<?php echo base_url(); ?>admin/dashboard" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Dashboard'); ?></span></a> </li>

                <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-home p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('Manage Class');?> <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?php if ($page_name == 'classes') echo 'active'; ?>"> <a href="<?php echo base_url();?>admin/classes"><?php echo get_phrase('New Class');?></a> </li>
                        <li class="<?php if ($page_name == 'topic') echo 'active'; ?>"> <a href="<?php echo base_url();?>admin/topic"><?php echo get_phrase('New topic');?></a> </li>

                    </ul>
                </li>

                <li class="<?php if ($page_name == 'subject') echo 'active'; ?>"> <a href="<?php echo base_url(); ?>admin/subject" class="waves-effect"><i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Manage Subject'); ?></span></a> </li>
                <li class="<?php if ($page_name == 'teacher') echo 'active'; ?>"> <a href="<?php echo base_url(); ?>admin/teacher" class="waves-effect"><i class="fa fa-users p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Manage Teacher'); ?></span></a> </li>

                <!-- This is the topic with a drop down to manage students -->
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('Manage Student');?> <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?php if ($page_name == 'student') echo 'active'; ?>"> <a href="<?php echo base_url();?>admin/student"><?php echo get_phrase('New Student');?></a> </li>
                    </ul>
                </li>

                <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-link p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('Quiz');?> <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?php if ($page_name == 'create_online_quiz') echo 'active'; ?>"> <a href="<?php echo base_url();?>admin/create_online_quiz"><?php echo get_phrase('Create Online quiz');?></a> </li>
                        <li class="<?php if ($page_name == 'manage_online_quiz') echo 'active'; ?>"> <a href="<?php echo base_url();?>admin/manage_online_quiz"><?php echo get_phrase('Manage Online quiz');?></a> </li>

                    </ul>
                </li>

                <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('General Settings');?> <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?>"> <a href="<?php echo base_url();?>setting/system_settings"><?php echo get_phrase('System Settings');?></a> </li>
                    </ul>
                </li>

                <!-- This means that if we are in manage profile, select it!  -->
                <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?>"><a href="<?php echo base_url(); ?>admin/manage_profile/" class="waves-effect"><i class="fa fa-edit"></i> <span class="hide-menu"><?php echo get_phrase('Manage Profile'); ?></span></a></li>
                <li><a href="<?php echo base_url(); ?>login/logout/" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu"><?php echo get_phrase('Log Out'); ?></span></a></li>

            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->