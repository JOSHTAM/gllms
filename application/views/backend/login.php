<?php
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="We ddevelop creative software, eye catching software. We also train to become a creative thinker">
    <meta name="author" content="OPTIMUM LINKUP COMPUTERS">
    <link rel="icon" sizes="16x16" href="<?php echo base_url() ?>uploads/logo.png">
    <title><?php echo $system_title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url(); ?>optimum/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>optimum/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url(); ?>optimum/css/colors/megna.css" id="theme" rel="stylesheet">
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>optimum/plugins/images/login-register.jpg" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>


    <section id="wrapper" class="login-register">
        <div class="login-box login-sidebar">
            <div class="white-box">
                <h4 class="box-title m-b-20" align="center">
                    <br><br><br>
                    <img src="<?php echo base_url() ?>uploads/logo.png" class="img-circle" width="70" height="70" /></h4>
                <h5 align="center"><a href=""><?php echo $system_name; ?></a></h5>
                <br>


                <form method="post" role="form" id="loginform" class="form-horizontal form-material" action="<?php echo base_url(); ?>login/check_login">

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" required="" placeholder="<?php echo get_phrase('Username Here'); ?>" style="width:100%">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="<?php echo get_phrase('Password Here'); ?>" style="width:100%">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> <?php echo get_phrase('Remember Me'); ?> </label>

                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i><?php echo get_phrase('Forgot Password'); ?></a>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">


                            <button class="btn btn-success style1 btn-sm btn-rounded btn-block text-uppercase waves-effect waves-light" type="submit" style="width:100%; color:white">
                                <?php echo get_phrase('Login'); ?>
                            </button>

                        </div>
                    </div>
                    <br><br><br><br><br><br><br><br><br><br>
                    <?php echo form_close(); ?>

                    <form method="post" role="form" id="recoverform" class="form-horizontal form-material" action="<?php echo base_url(); ?>login/reset_password">
                        <input type="text" name="username" class="form-control" placeholder="username" style="width:100%" required>

                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-6">
                                <a href="<?php echo base_url(); ?>"><button class="btn btn-info btn-rounded btn-sm text-uppercase" type="button" style="color:white"><i class="fa fa-mail-reply-all"></i>&nbsp;Login</button></a>
                                <button class="btn btn-success btn-rounded btn-sm  text-uppercase" type="submit" style="color:white"><i class="fa fa-key"></i>&nbsp;<?php echo get_phrase('Reset Password'); ?></button>
                            </div>
                        </div>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <?php echo form_close(); ?>
            </div>
        </div>

    </section>
    <script src="js/index.js"></script>


    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>


    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url(); ?>optimum/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>optimum/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>optimum/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/toast-master/js/jquery.toast.js"></script>

    <?php if (($this->session->flashdata('error_message')) != "") : ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $.toast({

                    text: '<?php echo $this->session->flashdata('error_message'); ?>',
                    position: 'top-right',
                    loaderBg: '#f56954',
                    icon: 'warning',
                    hideAfter: 3500,
                    stack: 6
                })
            });
        </script>
    <?php endif; ?>


</body>

</html>