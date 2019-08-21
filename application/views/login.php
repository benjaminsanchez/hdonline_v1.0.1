<!DOCTYPE html>
<?php $baseurl=trim(base_url(),'/'); ?>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="es" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
<meta charset="utf-8" />
<title><?php echo $titleadmin; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content=" " name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="<?php echo $baseurl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $baseurl; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $baseurl; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $baseurl; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo $baseurl; ?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $baseurl; ?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="<?php echo $baseurl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo $baseurl; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo $baseurl; ?>/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $baseurl; ?>/assets/custom/css/custom.css?v=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN : LOGIN PAGE 5-1 -->
<div class="user-login-5">
  <div class="row bs-reset">
    <div class="col-md-6 bs-reset mt-login-5-bsfix">
      <div class="login-bg" style="background-image:url(<?php echo $baseurl; ?>/assets/pages/img/login/bg1.jpg)"> <a href="<?php echo $baseurl; ?> "> <img src="<?php echo $logoadmin_white; ?>"   alt=""/> </a> </div>
    </div>
    <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
      <div class="login-content">
        <h1>Bienvenidos a HunterDouglas Online</h1>
       <?php if (@$token != ""): ?>
       <form action="<?php echo $baseurl; ?>login_recuperar3" class="changepass-form" method="post">
     
         <p> Ingrese su nueva clave </p>
          <div class="alert alert-danger <?php if (@$ewmsg == ""): echo 'display-hide'; endif?>" >
            <button class="close" data-close="alert"></button>
            <span>
 
            </span> </div>
          <div class="row">
           
            <div class="col-xs-6">
              <input class="form-control form-control-solid placeholder-no-fix form-group" type="password"  pattern=".{6,}"   required title="6 caracteres mínimo" autocomplete="off" placeholder="Clave" name="passwd" />
            </div>
            
            
            <div class="col-xs-6">
              <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" pattern=".{6,}"   required title="6 caracteres mínimo" autocomplete="off" placeholder="Repita su Clave" name="passwd2" min="" />
              <input type="hidden" name="token" value="<?php echo @$token; ?>">
            </div>
            
            
            
            
          </div>
            <div class="row">
          
           <div class="alert alert-danger display-hide" id="show-msg-assign" >
            <button class="close" data-close="alert"></button>
            <span>
           
            </span> </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="rem-password"> 

              </div>
            </div>
            <div class="col-sm-8 text-right">
              <button class="btn blue" type="submit">ASIGNAR NUEVA CLAVE</button>
            </div>
          </div>
        </form>
       
       <?php else: ?>
        <form action="<?php echo $baseurl; ?>/enviar_login" class="login-form" method="post">
        
          <div class="alert alert-danger <?php if (@$ewmsg == ""): echo 'display-hide'; endif?>" >
            <button class="close" data-close="alert"></button>
            <span>
            <?php 
		if (@$ewmsg == ""): ?>
            Ingrese email y Clave.
            <?php else: ?>
            <?php 		
		echo @$ewmsg; 
		?>
            <?php endif; ?>
            </span> </div>
             <p> Ingrese su email y clave para acceder a la plataforma </p>
          <div class="row">
            <div class="col-xs-6">
              <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="usuario@empresa.com" name="userid" required/>
            </div>
            <div class="col-xs-6">
              <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Clave" name="passwd" required/>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="rem-password"> 
                <!-- <label class="rememberme mt-checkbox mt-checkbox-outline">
                  <input type="checkbox" name="remember" value="1" />
                  Recuérdame <span></span> </label>--> 
              </div>
            </div>
            <div class="col-sm-8 text-right">
              <div class="forgot-password"> <a href="javascript:;" id="forget-password" class="forget-password">¿Olvidaste tu clave?</a> </div>
              <button class="btn blue" type="submit">INGRESAR</button>
            </div>
          </div>
        </form>
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" action="login" method="post">
        
          
          
           <h3  class="font-blue">¿Olvidaste tu clave?</h3>
                <p> Ingresa tu e-mail para reestablecer tu clave. </p>
                
          <div class="form-group">
            <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" id="email_forget" placeholder="Email" name="email" />
               <span id="forget-succes-xd"></span>
          </div>
          <div class="form-actions">
            <button type="button" id="back-btn" class="btn blue btn-outline">Volver</button>
            <button type="submit"  id="submit-forget" class="btn blue uppercase pull-right">Reestablecer mi clave</button>
          </div>
        </form>
        <?php endif; // token cambiar clave?>
        <!-- END FORGOT PASSWORD FORM --> 
      </div>
      <div class="login-footer">
        <div class="row bs-reset">
          <div class="col-xs-5 bs-reset"> 
            <!--
            <ul class="login-social">
              <li> <a href="javascript:;"> <i class="icon-social-facebook"></i> </a> </li>
              <li> <a href="javascript:;"> <i class="icon-social-twitter"></i> </a> </li>
              <li> <a href="javascript:;"> <i class="icon-social-dribbble"></i> </a> </li>
            </ul>--> 
          </div>
          <div class="col-xs-7 bs-reset">
            <div class="login-copyright text-right">
              <p>oqo.cl</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END : LOGIN PAGE 5-1 --> 
<!--[if lt IE 9]>
<script src="<?php echo $baseurl; ?>/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo $baseurl; ?>/assets/global/plugins/excanvas.min.js"></script> 
<script src="<?php echo $baseurl; ?>/assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]--> 
<!-- BEGIN CORE PLUGINS --> 
<script src="<?php echo $baseurl; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script> 
<script src="<?php echo $baseurl; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo $baseurl; ?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script> 
<script src="<?php echo $baseurl; ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo $baseurl; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo $baseurl; ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script src="<?php echo $baseurl; ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script> 
<script src="<?php echo $baseurl; ?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script> 
<script src="<?php echo $baseurl; ?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script> 
<script src="<?php echo $baseurl; ?>/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script> 
<!-- END PAGE LEVEL PLUGINS --> 
<!-- BEGIN THEME GLOBAL SCRIPTS --> 
<script src="<?php echo $baseurl; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script> 
<!-- END THEME GLOBAL SCRIPTS --> 
<!-- BEGIN PAGE LEVEL SCRIPTS --> 
<script language="javascript" type="text/javascript">
var Login = function() {
    var r = function() {
        $(".login-form").validate({
            errorElement: "span",
            errorClass: "help-block",
            focusInvalid: !1,
            rules: {
                username: {
                    required: !0
                },
                password: {
                    required: !0
                },
                remember: {
                    required: !1
                }
            },
            messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                }
            },
            invalidHandler: function(r, e) {
                $(".alert-danger", $(".login-form")).show()
            },
            highlight: function(r) {
                $(r).closest(".form-group").addClass("has-error")
            },
            success: function(r) {
                r.closest(".form-group").removeClass("has-error"), r.remove()
            },
            errorPlacement: function(r, e) {
                r.insertAfter(e.closest(".input-icon"))
            },
            submitHandler: function(r) {
                r.submit()
            }
        }), $(".login-form input").keypress(function(r) {
            return 13 == r.which ? ($(".login-form").validate().form() && $(".login-form").submit(), !1) : void 0
        }), $(".forget-form input").keypress(function(r) {
            return 13 == r.which ? ($(".forget-form").validate().form() && $(".forget-form").submit(), !1) : void 0
        }), $("#forget-password").click(function() {
            $(".login-form").hide(), $(".forget-form").show()
        }), $("#back-btn").click(function() {
            $(".login-form").show(), $(".forget-form").hide()
        })
    };
	
	
	var handleForgetPassword = function () {
		$('.forget-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                email: {
	                    required: "Debe ingresar un email."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
				    label.closest('.form-group').removeClass('has-error');
	             	label.remove();
					
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
					$("#submit-forget").prop('disabled', true);
					$("#submit-forget").html("Por favor espere...");
	               // ajax enviar
					var postForm = { 
						'email' : $("#email_forget").val()
					};
					$.ajax({
						url: "/login_recuperar",
						type: "post",
						data: postForm ,
						success: function (response) {
							$("#forget-succes-xd").html(response);	
							$("#email_forget").val('');
							$("#submit-forget").prop('disabled', false);
							$("#submit-forget").html("Reestablecer mi clave");	
						},
						error: function(jqXHR, textStatus, errorThrown) {
						   console.log(textStatus, errorThrown);
						}
					});
					// end ajax enviar
	            }
	        });

	    

	        jQuery('#forget-password').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.forget-form').show();
	        });

	        jQuery('#back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.forget-form').hide();
	        });

	};
	
	
	var handleAssignPassword = function () {
		$("form.changepass-form").submit(function(e) {
            var clave1 = $("input[name='passwd']").val();
			var clave2 = $("input[name='passwd2']").val();
			if (clave1 != clave2) {
				$("#show-msg-assign").removeClass("display-hide");
				$("#show-msg-assign span").html("Claves no coinciden");
				return false;
			} else {
				$("#show-msg-assign").addClass("display-hide");
				$("#show-msg-assign span").html("");
				
			}
			
        });
	
		$("input[name='passwd'],input[name='passwd2']").on('keyup', function() {
			 var clave1 = $("input[name='passwd']").val();
			var clave2 = $("input[name='passwd2']").val();
			if (clave1 != "" && clave2 != "") {
				if (clave1 != clave2) {
					$("#show-msg-assign").removeClass("display-hide");
					$("#show-msg-assign span").html("Claves no coinciden");
	
				} else {
					$("#show-msg-assign").addClass("display-hide");
					$("#show-msg-assign span").html("");
					
				} 
			}
		});
		
		
	}
	
	
	
    return {
        init: function() {
            r(), $(".login-bg").backstretch(["<?php echo $baseurl; ?>/assets/custom/img/login/bg1.jpg", "<?php echo $baseurl; ?>/assets/custom/img/login/bg2.jpg", "<?php echo $baseurl; ?>/assets/custom/img/login/bg3.jpg"], {
                fade: 1e3,
                duration: 8e3
            }), $(".forget-form").hide(),  handleForgetPassword(),handleAssignPassword()
        }
    }
}();
jQuery(document).ready(function() {
    Login.init()
});
		</script> 
<!-- END PAGE LEVEL SCRIPTS --> 
<!-- BEGIN THEME LAYOUT SCRIPTS --> 
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>