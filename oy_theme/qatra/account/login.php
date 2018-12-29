<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php  get_pgtitle() ?></title>
<?php  load_css(); ?>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
		<link rel="stylesheet" href="<?php theme_path() ?>/account/assets/css/form-elements.css">
        <link rel="stylesheet" href="<?php theme_path() ?>/account/assets/css/style.css">

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
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                             <?php Get_message(1); ?>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            
                            <img src="<?php theme_path() ?>/img/shamal.png" />
                            <h1><strong>Login to</strong> Shamal System</h1>
                            <br/>
                            <div class="description">
<!--                            	<p>
	                            	This is a free responsive login form made with Bootstrap. 
	                            	Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                            	</p>-->
                        
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our web portal</h3>
                            		<p>Enter your username and password to log on:
                                        
                                            </p>
                        		</div>
                        		<div class="form-top-right">
                        			<!--<i class="fa fa-lock"></i>-->
                                                <img src="https://cdn1.iconfinder.com/data/icons/hawcons/32/698630-icon-114-lock-128.png" class="img-circle " />
                        		</div>
                                     
                                   
                            </div>
                            
                            <div class="form-bottom">
			                    <form role="form" action="<?php echo get_link('account','user','signin'); ?>" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input name="user" type="text" id="user" placeholder="Username..." class="form-username form-control" >
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input  name="password" type="password" id="Password" placeholder="Password..." class="form-password form-control" >
			                        </div>
                                         
			                        <button type="submit" class="btn">Sign in!</button>
                                          
                                                
                   
			                    </form>
		                    </div>
                        </div>
                         
                    </div>
                   
                
                </div>
            </div>
            
        </div>



<?php  load_js(); ?>

     
        <script src="<?php theme_al_path() ?>/account/assets/js/jquery.backstretch.min.js"></script>
        <script src="<?php theme_al_path() ?>/account/assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>