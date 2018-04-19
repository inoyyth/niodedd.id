<!-- Header Section -->

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php 
            foreach($slider as $k=>$v) {
                $class_active = "";
                if($k == 0) {
                    $class_active = 'class="active"';
                }
        ?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $k;?>" <?php echo $class_active;?>>></li>
        <?php } ?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php 
            foreach($slider as $k=>$v) {
                $class_active = "";
                if($k == 0) {
                    $class_active = 'active';
                }
        ?>
        <div class="item <?php echo $class_active;?>">
            <img class="img-responsive" src="<?php echo base_url();?>adminuicon/assets/elFinder-2.1.24/<?php echo $v['image_slider'];?>" alt="<?php echo $v['title'];?>">
            <div class="carousel-caption"><?php echo $v['title'];?></div>
        </div>
        <?php } ?>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="mainPitch hidden-xs hidden-sm" style="position:absolute; top:70px;right:30px;">
    <div class="row">
        <div class="col-sm-12" style="text-align:left;top:13px;">
            <div class="panel panel-primary">
                <div class="panel-heading">Get Free Consultation</div>
                    <div class="panel-body" style="background: rgba(122, 130, 136, 0.2)!important;">
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>
                        <form method="post" action="<?php echo site_url('home/save_free_consultation');?>">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input class="form-control" size="40" type="text" name="name" placeholder="Name" required="true">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="phone" name="phone" placeholder="Phone" required="true">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" placeholder="Email" required="true">
                            </div>
                            <div class="form-group">
                                <label>Law Type</label>
                                <select class="form-control" name="law" drequired="true">
                                    <option value="family">Family Law</option>
                                    <option value="business">Business Law</option>
                                    <option value="civil">Civil Litigation</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" name="message" placeholder="Message" required="true" rows="5" style="maxheight:100px;minheight:100px;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary center">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Consultation -->
<section id="consultation" class="consultation hidden-lg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box">
                    <p class="section-subtitle">Fill out the form below to recieve a free and confidential intial consultation.</p>
                    <h2 class="section-title">REQUEST A FREE CONSULTATION</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <form id="consultation-form" class="consultation-form" method="post" action="<?php echo site_url('home/save_free_consultation');?>">
                <div class="form-group">
                    <div class="col-sm-3">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <select class="selectpicker" data-live-search="true" name="law" data-width="100%">
                            <option data-tokens="family">Family Law</option>
                            <option data-tokens="business">Business Law</option>
                            <option data-tokens="civil">Civil Litigation</option>
                            <option data-tokens="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="form-control" rows="8" placeholder="Case Description..." id="case-des" name="message"></textarea>
                        <!-- <input type="text" class="form-control" id="case-des" placeholder="Case Description..."> -->
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-4">
                    <button id="cnfsubmit" type="submit" class="btn btn-default btn-block btn-cn">Get Consultation</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Fun Facts -->
<section id="fun" class="fun">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box">
                    <p class="section-subtitle">We are known by</p>
                    <h2 class="section-title">Who we are</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach($section1 as $k=>$v){ ?>
            <div class="col-sm-4">
                <?php echo $v['article_description'];?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section id="cta" class="cta">
    <div class="container">
        <div class="cta-bg">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <p>
                        <?php echo $index_article['article_description'];?>
                    </p>
                </div>
                <div class="col-sm-6">
                    <h1>
                    <?php echo $index_article['article_name'];?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <div class="cta-btn">
                        <a href="tel:(888)-123-456-7890"><span class="ion-android-call"></span> <?php echo format_mobile_number($contact['mobile']);?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- Why choose us -->
 <section id="choose" class="choose overlay-light">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box">
                    <p class="section-subtitle">We are known by</p>
                    <h2 class="section-title">Why choose us</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
                $icon = array("ion-social-angular-outline","ion-compose","ion-android-bulb");
                foreach($section2 as $k2=>$v2){ 
            ?>
            <div class="col-sm-4">
                <div class="choose-box">
                    <span class="choose-icon <?php echo $icon[$k2];?>"></span>
                    <h3 class="choose-title"><?php echo $v2['article_name'];?></h3>
                    <p class="choose-detail">
                        <?php echo $v2['article_description'];?> 
                    </p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>