<section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading pagination-centered"><?php echo $message;?></div>
                <div class="panel-body">
                    <center>
                        <?php if($status == "success") {?>
                                <a href="<?php echo site_url('register');?>" class="btn btn-default"> SIGN IN </a> 
                                <a href="<?php echo site_url();?>" class="btn btn-warning btn-lg"> Back To Homepage </a> 
                        <?php } else { ?>
                                <a href="<?php echo site_url();?>" class="btn btn-warning btn-lg"> Back To Homepage </a> 
                        <?php } ?>
                </center>
                </div>
            </div>
        </div>
     </div>
</div>