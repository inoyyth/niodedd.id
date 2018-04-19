<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NiodeDD.id | Lawyers And Consultant</title>

        <link href="<?php echo base_url();?>themes/template/assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
        <script src="<?php echo base_url('assets/jquery-validate/dist/jquery.validate.min.js');?>" type="text/javascript"></script>
        <link href="<?php echo base_url();?>themes/template/assets/css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo base_url();?>themes/template/assets/css/owl.carousel.theme.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>themes/template/assets/css/main.css" rel="stylesheet">
        <script src="<?php echo base_url();?>themes/template/assets/js/jquery-1.12.3.min.js"></script>

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body data-spy="scroll" data-target="#main-navbar">

    <!-- NavigationBar Section -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                <img class="img-responsive" src="<?php echo base_url();?>themes/template/assets/images/logo.png" alt="logo">
                </a>
            </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-navbar">
                <?php 
                    echo $this->multi_menu->render(
                        array(
                            'nav_tag_open'        => '<ul class="nav navbar-nav navbar-right">',            
                            'parentl1_tag_open'   => '<li>',
                            'parentl1_anchor'     => '<a href="%s">%s</a>',
                            'parent_tag_open'     => '<li>',
                            'parent_anchor'       => '<a href="%s">%s</a>',
                            'children_tag_open'   => '<ul>'
                        )
                    ); 
                ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <?php echo $this->load->view($view);?>

         <!-- Subscribe -->
         <div id="subscribe"  class="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Subscribe to our weekly newsletter</h2>
                        <p>*Dont worry, we dont spam</p>
                    </div>
                    <div class="col-sm-6">
                        <?php if ($this->session->flashdata('error_subscribe')) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->flashdata('error_subscribe'); ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('success_subscribe')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->flashdata('success_subscribe'); ?>
                            </div>
                        <?php } ?>
                        <form class="subscribe-form" method="post" action="<?php echo site_url('home/save_email_subscribe');?>">
                            <div class="form-group">
                                <label class="sr-only" for="subscriber-email">Email address</label>
                                <div class="input-group">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <input type="email" name="email" required class="form-control" placeholder="Email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Go!</button>
                                    </span>
                                </div><!-- /input-group -->
                            </div><!--/input-grpup-->
                        </form>

                        <!-- SUCCESS OR ERROR MESSAGES -->
                        <div id="subscription-response"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                info@niodedd.id
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <div class="footer-social">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-linkedin-outline"></i></a>
                                <a href="#"><i class="ion-social-skype-outline"></i></a>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        
        <!-- Scripts -->
        <script src="<?php echo base_url();?>themes/template/assets/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
        <script src="<?php echo base_url();?>themes/template/assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url();?>themes/template/assets/js/script.js"></script>
        <script src="<?php echo base_url('assets/jquery-validate/dist/jquery.validate.min.js');?>" type="text/javascript"></script>
        <script>
            $("#carousel").carousel();
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117850434-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117850434-1');
</script>
    </body>
</html>
