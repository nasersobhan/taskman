<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php  get_pgtitle() ?></title>
<?php  load_css(); ?>
  
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">

		<link rel="stylesheet" href="<?php theme_al_path() ?>/account/assets/css/form-elements.css">
        <link rel="stylesheet" href="<?php theme_al_path() ?>/account/assets/css/style.css?v=1">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

     

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    
               
                    
                    <div class="row">
                         
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Signup to</strong> Ooyta System</h1>
                          
                     
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site</h3>
                            		<p>Enter your username and password to log on:<br/>
                                         <?php Get_message(1); ?>
                                            </p>
                        		</div>
                        		<div class="form-top-right">
                        			<!--<i class="fa fa-lock"></i>-->
                                                <img src="https://cdn1.iconfinder.com/data/icons/hawcons/32/698630-icon-114-lock-128.png" class="img-circle " />
                        		</div>
                                     
                                   
                            </div>
                            
                            <div class="form-bottom">
			                    <form role="form" action="<?php echo get_link('account','user','signup'); ?>" method="post" class="login-form">
			                    	
                                                
<div class="form-group">
    <label class="sr-only" for="form-username">Full name:</label>
    <input <?php echo (isset($_POST['fullname']) ? 'value="'.$_POST['fullname'].'"' : ''); ?> requireds type="text" id="fullname" placeholder="Full name..." class="form-username form-control"  name="fullname" /> 
</div>                                             
                                                
<div class="form-group">
    <label class="sr-only" for="form-username">Username:</label>
    <input <?php echo (isset($_POST['uname']) ? 'value="'.$_POST['uname'].'"' : ''); ?> requireds type="text" id="uname"  name="uname" placeholder="Username..." class="form-username form-control"  /> 
</div>

<div class="form-group">
    <label class="sr-only" for="form-username">Email:</label>
    <input <?php echo (isset($_POST['email']) ? 'value="'.$_POST['email'].'"' : ''); ?> requireds type="email" id="email"  name="email" placeholder="Email..." class="form-email form-control e-val"  /> 
</div>
                                                
<div class="form-group">
    <label class="sr-only" for="form-username">Password:</label>
    <input type="password" id="password"  name="password"  requireds placeholder="Password..." class="form-username form-control"  /> 
</div>
                                                
<div class="form-group">
    <label class="sr-only" for="form-username">Confirm Password:</label>
    <input type="password" id="passwordre" requireds  name="passwordre"  requireds placeholder="Confirm Password..." class="form-username form-control"  /> 
</div>
                                                
<div class="form-group">
    <label class="sr-only" for="form-username">Captcha:</label>
    <img src="<?php home_url() ?>/?API=capa&width=150&height=50&characters=6" align="absmiddle" alt="Captcha" class="pull-right" />
    <input type="text" name="security_code" maxlength="6" placeholder="Captcha..." class="form-username form-control col-md-4 pull-left" style="width: 60%; margin-bottom: 10px;"  /> 
</div>



                                        
			                        <button type="submit" class="btn">Sign up!</button>
<!--                                                <a href="<?php echo HOME . '?API=loginfb'; ?>" class="btn btn-block btn-social btn-facebook">
                    <span class="fa fa-facebook"></span> Sign in using facebook
                </a>
			                  -->
		                      </form></div>
                        </div>
                         
                    </div>
                  
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
<!--                        	<h3>...or login:</h3>-->
                        	<div class="social-login-buttons">
                                    <a class="btn btn-link-2" href="<?php echo get_link('account','user','signin'); ?>">
	                        		<i class="fa user-plus"></i> Sign In
	                        	</a>
<!--	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>-->
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>



<?php  load_js(); ?>

     
<!--        <script src="<?php theme_al_path() ?>/account/assets/js/jquery.backstretch.min.js"></script>-->
        <script src="<?php theme_al_path() ?>/account/assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>