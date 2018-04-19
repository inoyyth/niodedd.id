 <!-- Contact -->
 <section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box">
                    <p class="section-subtitle">You may want to</p>
                    <h2 class="section-title">Contact us</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <img src="assets/images/logo.png" alt="logo" class="contact-logo">
                <p>
                    <?php echo $data['company'];?>
                </p>
                <ul>
                    <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8888450375894!2d106.91226189983081!3d-6.145628995528553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698ab31cd3655b%3A0x2c5d026ef19f5ab4!2sRT.4%2FRW.3%2C+Pegangsaan+Dua%2C+Klp.+Gading%2C+Kota+Jkt+Utara%2C+Daerah+Khusus+Ibukota+Jakarta!5e0!3m2!1sid!2sid!4v1523677754255" width="550" height="250" frameborder="0" style="border:0" allowfullscreen></iframe></li>
                    <li><span class="ion-android-call"></span><?php echo $data['telephone'];?></li>
                    <li><span class="ion-android-phone-portrait"></span><?php echo format_mobile_number($data['mobile']);?></li>
                    <li><span class="ion-paper-airplane"></span><a href="mailto:<?php echo $data['email'];?>"><?php echo $data['email'];?></a></li>
                </ul>
            </div>
            <div class="col-sm-6">
                <div id="alert-contact" class="alert" style="display:none;"></div>
                <?php 
                    echo form_open('contact_us/save_inquiry',array(
                        'id' => 'form-contact',
                        'class' => 'form-horizontal'
                    ));
                ?>
                    <div class="input-group">      
                        <span class="input-group-addon">
                            <i class="ion-person"></i>
                        </span> 
                        <?php 
                            echo form_input(array(
                                'id' => 'name',
                                'name' => 'name',
                                'class' => 'form-control',
                                'placeholder' => 'Name'
                            ));
                        ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="ion-email"></i>
                        </span>
                        <?php 
                            echo form_input(array(
                                'id' => 'email',
                                'name' => 'email',
                                'type' => 'email',
                                'class' => 'form-control',
                                'placeholder' => 'Email Address'
                            ));
                        ?>
                    </div>
                    <div class="input-group">      
                        <span class="input-group-addon">
                            <i class="ion-person"></i>
                        </span> 
                        <?php 
                            echo form_input(array(
                                'id' => 'subject',
                                'name' => 'subject',
                                'class' => 'form-control',
                                'placeholder' => 'Subject'
                            ));
                        ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon custom-addon">
                            <i class="ion-chatbubbles"></i>
                        </span>
                        <?php 
                            echo form_textarea(array(
                                'id' => 'message',
                                'name' => 'message',
                                'placeholder' => 'Write Message',
                                'class' => 'form-control',
                                'rows' => 8
                            ));
                        ?>
                    </div>
                    <button type="submit" class="btn btn-default btn-block" id="myButtonContact" data-loading-text="Loading...">Send your Message <span class="ion-paper-airplane"></span></button>
                </form>

                <?php echo form_close();?>
            </div>
        </div>
    </div>
</section>
<!--<div class="row clearfix divider4">
    <div class="span7">
        <?php echo $data['description'];?>
    </div>

    <div class="span5">
    <div id="alert-contact" class="alert" style="display:none;"></div>
        <h2>contact form</h2>
        <div id="note"></div>
        <div id="fields" class="contact-form">
        <?php 
                echo form_open('contact_us/save_inquiry',array(
                    'id' => 'form-contact',
                    'class' => 'form-horizontal'
                ));
            ?>
            <div class="control-group">
                <label class="control-label" for="inputName">Your name:</label>         
                <?php 
                    echo form_input(array(
                        'id' => 'name',
                        'name' => 'name',
                    ));
                ?>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Your Email:</label>
                <?php 
                    echo form_input(array(
                        'id' => 'email',
                        'name' => 'email'
                    ));
                ?>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputName">Subject:</label>
                <?php 
                    echo form_input(array(
                        'id' => 'subject',
                        'name' => 'subject'
                    ));
                ?>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputName">Message:</label>
                <?php 
                    echo form_textarea(array(
                        'id' => 'message',
                        'name' => 'message'
                    ));
                ?>
            </div>
            <button type="submit" class="btn btn_ btn-small_" id="myButtonContact" data-loading-text="Loading...">Submit</button>
            <?php echo form_close();?>
        </div>  
    </div>		  
</div>-->
<script>
$(document).ready(function(){

    $( "#form-contact" ).validate( {
        rules: {
            name: {
                required: true
            },
            subject: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true
            }
        },
        messages: {
            name: "Please enter your name",
            subject: {
                required: "Please enter your subject",
            },
            email: {
                required: "Please enter your email",
                email: "Please enter valid email"
            },
            message: {
                required: "Please enter your message"
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        },
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: $("#form-contact").attr( 'action' ),
                data: $("#form-contact").serialize(),
                dataType: 'json',
            beforeSend: function(e) {
                $("#myButtonContact").button('loading');
            },
            success: function(data) {
                if (data.code == 200) {
                    $("#alert-contact").removeClass('alert-error').addClass('alert-success').html(data.message);
                    $("#form-contact")[0].reset();
                } else {
                    $("#alert-contact").addClass('alert-success').addClass('alert-error').html(data.message);
                }
                $("#alert-contact").show();
                $("#myButtonContact").button('reset');
            },
            error: function(e) {
                //console.log(e);
            }
        });
        return false;
        }
    });
});
</script>