<?php get_header();?>


<div class="row">
    <div class="col-md-2">
       <?php get_sidebar('left'); ?>
    </div>
    <div  id="main-body" class="col-md-7 no-margin-top">
  
                
        <div class="panel panel-default no-margin-top">
                
            <div class="panel-body">    
                
                <div class="page-header ">
          <h1><?php cat_name();?></h1>
</div>
                
 <?php 

 $Til['ben'] = '';
 $Til['des'] = '';


 
 
if(is_serialized(get_cat_content())){
$arr = unserialize(get_cat_content());




if(!empty($arr)){
foreach ($arr as $in => $part){
   // echo '<h2 name="'.$in.'">'.$Til[$in].'</h2>';
    echo post_content($part);
}}

}else{
  echo post_content(get_cat_content());  
}

?>
                <div class="list-group">      
                <?php
echo get_follower(get_cat_id(),'tags','list-group-item');

cat_id(); cat_type();
?>  </div>                  
		
	
                
                
          
        </div>
        </div>
        
    </div>
    
    
    
    
    
    
    
    <div class="col-md-3">
<?php get_sidebar(); ?>
        </div>
</div>
<?php get_footer(); ?>