<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">

                    <!-- FYI: This page_title is coming from the controllers that we defined in page_data -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?php echo $page_title;?></h4>
                    </div>

                    <!-- FYI: This is coming from our index.php, anything we have there we can access it from anywhere in our code -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href=""><?php echo $system_name;?></a></li>
                            <li class="active">
                                <?php 
                                    $timestamp = time();
                                    echo (date("F d, Y h:i:s", $timestamp));
                                ?>
                            </li>
                        </ol>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>