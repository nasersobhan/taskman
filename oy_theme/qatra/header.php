<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fa-ir" lang="fa-ir">

    <head>
        <meta charset="utf-8" />
        <title><?php echo get_pgtitle(); ?></title>


<!--<script type="text/javascript" src="<?php theme_path() ?>/js/jquery.js"></script>-->




        <?php load_css(); ?> <link rel="stylesheet" href="<?php theme_path() ?>/theme/style.css" />
        
        
        <link rel="stylesheet" type="text/css" media="print"  href="<?php theme_path() ?>/css/print.css" />
    </head>
    <body>
    <div class="loadingbox hidden-print">
      <div id="fountainG">
          <img alt="Ooyta Logo" class="loading-logo blink" src="<?php  echo theme_al_path('',0).'/images/logo-ooyta.png' ?>" />

</div>  
        
        
    </div>
        <?php if(!isset($_GET['rep'])){ ?>

            <div class="menu hidden-print">
                <ul>

                     <li>
                         <a href="<?php echo HOME ?>"><i class="fa fa-plus" aria-hidden="true"></i> Request a Job</a></li>
                    <?php  ?>
                     <li> <a href="<?php echo get_link('taks') ?>&list=my"><i class="fa fa-list" aria-hidden="true"></i> Task List</a></li>
                    <?php ?>





                    

                        <li><a href="<?php echo get_link('account', 'user', 'signout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> <?php echo g_lbl('logout'); ?></a></li>


                        <li class="pull-right"><?php echo get_jdate('l j F Y') . ' | ' . date('l j F Y');
        ; ?> <i class="fa fa-clock-o" ></i></li>

                </ul>





<?php } ?>
        </div>





