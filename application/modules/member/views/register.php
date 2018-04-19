<section id="contact" class="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box">
                    <p class="section-subtitle">Hi, Member</p>
                    <h2 class="section-title">If you a member you can login, if not you can register</h2>
                </div>
            </div>
            <!-- start sign up -->
            <div class="col-sm-6">
                <div id="alert-signup" class="alert" style="display:none;"></div>
                <h2>Sign Up</h2>
                <div id="note"></div>
                <div id="fields" class="contact-form">
                    <?php 
                        echo form_open('member/save_register',array(
                            'id' => 'form-register',
                            'class' => 'form-horizontal'
                        ));
                    ?>
                    <div class="input-group">      
                        <span class="input-group-addon">
                            First Name
                        </span>          
                        <?php 
                            echo form_input(array(
                                'id' => 'first_name',
                                'name' => 'first_name',
                                'class' => 'form-control'
                            ));
                        ?>
                    </div>
                    <div class="input-group">      
                        <span class="input-group-addon">
                            Last Name
                        </span>
                        <?php 
                            echo form_input(array(
                                'id' => 'last_name',
                                'name' => 'last_name',
                                'class' => 'form-control'
                            ));
                        ?>
                    </div>
                    <div class="input-group">      
                        <span class="input-group-addon">
                            Email
                        </span>
                        <?php 
                            echo form_input(array(
                                'id' => 'email',
                                'name' => 'email',
                                'type' => 'email',
                                'class' => 'form-control'
                            ));
                        ?>
                    </div>
                    <div class="input-group">      
                        <span class="input-group-addon">
                            Phone
                        </span>
                        <?php 
                            echo form_input(array(
                                'id' => 'phone',
                                'name' => 'phone',
                                'class' => 'form-control'
                            ));
                        ?>
                    </div>
                    <div class="input-group">      
                        <span class="input-group-addon">
                            Password
                        </span>
                        <?php 
                            echo form_password(array(
                                'id' => 'password',
                                'name' => 'password',
                                'class' => 'form-control'
                            ));
                        ?>
                    </div>
                    <div class="input-group">      
                        <span class="input-group-addon">
                            Confirm Password
                        </span>
                        <?php 
                            echo form_password(array(
                                'id' => 'confirm_password',
                                'name' => 'confirm_password',
                                'class' => 'form-control'
                            ));
                        ?>
                    </div>      
                    <button type="submit" class="btn btn_ btn-small_" id="myButton" data-loading-text="Loading...">submit</button>
                    <?php echo form_close();?>
                </div> 
            </div>
            <!-- end sign up -->
            <!-- start sign in -->
            <div class="col-sm-6">
                <div id="alert-login" class="alert" style="display:none;"></div>
                <h2>Login</h2>
                <div id="note"></div>
                <div id="fields" class="contact-form">
                <?php 
                        echo form_open('member/login',array(
                            'id' => 'form-login',
                            'class' => 'form-horizontal'
                        ));
                    ?>
                    <div class="input-group">      
                        <span class="input-group-addon">
                            Email
                        </span>         
                        <?php 
                            echo form_input(array(
                                'id' => 'username',
                                'name' => 'username',
                                'class' => 'form-control'
                            ));
                        ?>
                    </div>
                    <div class="input-group">      
                        <span class="input-group-addon">
                            Password
                        </span>
                        <?php 
                            echo form_password(array(
                                'id' => 'password',
                                'name' => 'password',
                                'class' => 'form-control'
                            ));
                        ?>
                    </div>    
                    <button type="submit" class="btn btn_ btn-small_" id="myButtonLogin" data-loading-text="Loading...">submit</button>
                    <?php echo form_close();?>
                </div>    
                <!-- end sign in -->
            </div>
        </div>	  
    </div>
</div>
<br>
<br>
<script type="text/javascript">
$( document ).ready( function () {
    $( "#form-register" ).validate( {
        rules: {
            first_name: "required",
            last_name: "required",
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 10,
                digits: true
            }
        },
        messages: {
            firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",
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
                url: $("#form-register").attr( 'action' ),
                data: $("#form-register").serialize(),
                dataType: 'json',
            beforeSend: function(e) {
                $("#myButton").button('loading');
            },
            success: function(data) {
                if (data.code == 200) {
                    $("#alert-signup").removeClass('alert-error').addClass('alert-success').html(data.message);
                    $("#form-register")[0].reset();
                } else {
                    $("#alert-signup").addClass('alert-success').addClass('alert-error').html(data.message);
                }
                $("#alert-signup").show();
                $("#myButton").button('reset');
            },
            error: function(e) {
                //console.log(e);
            }
        });
        return false;
        }
    });

    $( "#form-login" ).validate( {
        rules: {
            username: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            username: "Please enter your username",
            password: {
                required: "Please provide a password",
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
                url: $("#form-login").attr( 'action' ),
                data: $("#form-login").serialize(),
                dataType: 'json',
            beforeSend: function(e) {
                $("#myButtonLogin").button('loading');
            },
            success: function(data) {
                if (data.code == 200) {
                    $("#alert-login").removeClass('alert-error').addClass('alert-success').html(data.message);
                    $("#form-login")[0].reset();
                    setTimeout(function(){
                        location.replace("<?php echo site_url();?>");
                    }, 3000);
                } else {
                    $("#alert-login").addClass('alert-success').addClass('alert-error').html(data.message);
                }
                $("#alert-login").show();
                $("#myButtonLogin").button('reset');
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