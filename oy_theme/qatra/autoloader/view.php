<?php load_jsplug('form') ; theme_include('header'); ?>
<div class="content-box">
    
       
        


         <div class="panel panel-default"><div class="panel-body">
           <div class="panel-heading"><h1><?PHP echo get_pgtitle() ?> <sup><a href="<?Php echo get_tbllink(is_get('tbl')); ?>" class="btn btn-default btn-sm">List</a> <a href="<?Php echo get_tbllink(is_get('tbl'),'edit', is_get('value')); ?>" class="btn btn-success btn-sm">Edit</a> </sup></h1></div>
                     <?php get_view_al() ?>
                   
     

           
             
                
                      
          <?php 
           $done = 0;
          $sdate = get_tas_value('sdate',is_get('value'));
    // $sdate = $sd ? get_tas_sdate() : 'not started yet';  
    

    
    if(user_rank()==99 AND $sdate=='0000-00-00' ){ ?>
          <hr/>
            <h3>Do you want to start?</h3>          
  <form method="post" name="sdate" ajaxform class="form-inline row" action="https://apps.shamal.net/taskman/?pg=taks&sdate=<?php echo is_get('value'); ?>" class="form-inline" >
      <label>Start Date: </label>
      <input class=" form-control form-control-sm"  st name="sdatex" type="date" />
      <input type="submit" class="btn btn-success" value="Set" >
  </form>
                <br/>
     
<?Php   }
$resemail = get_tas_value('responsibleEmail',is_get('value'));
  if(user_rank()==99 AND $resemail==''){ ?>
          <hr/>
          <h3>Not Assigned to anyone yet?</h3>      
  <form method="post" name="sdate" ajaxform class="form-inline row" action="https://apps.shamal.net/taskman/?pg=taks&res=<?php echo is_get('value'); ?>" class="form-inline" >
      <label>Responsible Person: </label>
    
      <select name="uid" class="form-control form-control-sm">
       <?php   
          global $dbase;
	$result = $dbase->query("SELECT sob_name,sob_id FROM sob_users where sob_rank=99");
$export=0;

   
	while($row = $dbase->fetch_array($result))
	  {
		 echo '<option value="'.$row['sob_id'].'">'.$row['sob_name'].'</option>';
	  }
          
          ?>
          
      </select>
      <input type="submit" class="btn btn-success" value="Set" >
  </form>
                <br/>
     
<?Php   }?>
           
           
        
           <div class="">
               <h2> Comments: </h2>
             
                
               
               
               
               <div id="comments" class="row">
                             <?Php  
      global $dbase;  $postid = is_get('value'); 
             $rid = 7;
      
      $random= $dbase->tbl2array2('sob_comments_oy','*'," WHERE com_id_post={$postid} ORDER BY com_id LIMIT 30");
        foreach($random as $ad){ 
            ?>
        
 <div  class="row">
            
                     
                   <div class="well">
                       <strong class="text-primary text-lg"  ><?php echo user_name_ex($ad['com_name']); ?></strong>:
                       <br/>
                           <?php echo nl2br($ad['com_comment']); 
                           echo '<br/><br/><small class="text-sm">'.$ad['com_time'].'</small>';
                             $updir = RHOME.'/upload/'.$ad['com_id'].'/*.*';
                          $globfiles =glob($updir);
                          if(count($globfiles)){
                           echo "<hr/>Attachments:<br/>"; 
                       
                       foreach ($globfiles as $filename) {
                            echo '<i class="fa fa-paperclip" aria-hidden="true"></i> <a href="'.HOME.'upload/'.$ad['com_id'].'/'.basename($filename).'" target="_balnk">'.basename($filename).'</a><br/>';
                        }
                          }

?>
                   </div>
</div>
            
      <?Php  }
        ?>
      
                  </div>
               
                 <div class="well">Add Comment:<br/>
                   <form method="POST" name="add" class="form row" action="<?php echo HOME ?>?pg=taks&comment=1" enctype="multipart/form-data" >
                       <input type="hidden" name="postid" value="<?php echo is_get('value'); ?>"/>
                       <textarea class="form-control" style="margin:  5px; border-radius: 3px; " id="dis" name="commenttext" rows="5"></textarea><br/>
                        File Attachments: <input type="file" name="img[]" multiple><br/>
                        <input class="btn btn-success btn-sm Pull-left"  id="load_reportx" type="submit" name="Send" value="Post"  /></td>

                       
                   </form>
               </div>
           </div>
        
        
        </div></div></div>

<?php theme_include('footer'); ?>
       
