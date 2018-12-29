
<?php get_header(); global $curr, $sizetype;  ?>
<div class="content-box">

  <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php echo get_pgtitle() ?></h3></div>
    <div class="panel-body ">    


	
	<table id="datatbl" width="99%" align="center" >
    
      <tr >
    
                    
  
  

        
          
          <td colspan="12">
               <?php if(user_rank()==99){ ?> 
              <a href="<?php echo HOME ?>?pg=taks&list=my" <?php echo (is_get('list')=='my' ? 'class="text-danger"' :''); ?> >Assigned to you</a> |
              <a href="<?php echo HOME ?>?pg=taks&list=una" <?php echo (is_get('list')=='una' ? 'class="text-danger"' :''); ?>>Un-Assigned</a> | 
               <?php } ?>
              <a href="<?php echo HOME ?>?pg=taks&list=com" <?php echo (is_get('list')=='com' ? 'class="text-danger"' :''); ?>>Completed</a> | 
              <a href="<?php echo HOME ?>?pg=taks&list=un" <?php echo (is_get('list')=='un' ? 'class="text-danger"' :''); ?> >In Work</a> |  
              <a href="<?php echo HOME ?>?pg=taks" <?php echo (!is_get('list') ? 'class="text-danger"' :''); ?> >All List</a>
              
    </td>
        
    </tr>
  
	<tr>
<!--                   <th>
Start Date
      </th>-->
    <th  width="40px">Job Title</th>
    <th>User Email</th>
    <th width="70px">priority</th>
    <th width="50px">department</th>
    <th width="50px">Submitted date</th>
<!--
    <th>assignedto</th>-->
    
    <th>Completed in %</th>
  
 <th>Actions</th>
  </tr>
  
    <span style="color:#fff; width:100%; text-align:center; font-weight:bold; background-color:rgba(51,51,51,1) " name="mess" id="mess"></span>
  
   
	<?php
//while($row = $dbase->fetch_array($result))
//  {
//    
    

if(have_post()){
    while(have_post()) : the_post();  
       $done = get_tas_done();
?>

  <tr id="<?php tas_id(); ?>">
      
      
  
          
          
    
           
          
  
      
       <td width="140px"><a target="_blank" href="<?Php echo get_tbllink('tasks', 'view', get_tas_id()) ?>" title="go to page"><?Php  (tas_title()) ?></a></td>
    <td><?Php  tas_email() ?></td>
  
    
    <td ><?Php  echo task_lvl(get_tas_priority()); ?></td>
    <td ><?Php  	echo get_cate_name(get_tas_department()); ?></td>
    <td><?Php echo Agotime(get_tas_date()).' <br/> '.get_tas_date(); ?></td>
<!--    <td><?Php $assid = get_tas_assignedto(); //echo ($assid==0 ? 'No One' : user_name($assid)) ?>
        <form id="del" name="del"> <select name="tas_assignedto" >
            <option value="0">Naser</option>
            <option value="0">Naser</option>
            <option value="0">Naser</option>
        </select>
        
            <input class="btn btn-sm btn-success"  onclick="javascript: formget(this.form, 'functions/posts.php?fuc=deloil&id=<?php tas_id() ?>'); delet(<?php tas_id() ?>);" name="delete" value="Set" type="button" />
    </form>
        </td>-->
  
        <td >
            <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:<?Php tas_perentage() ?>%">
    <small class="text-sm"><?Php tas_perentage() ?>% Complete</small>
  </div></div>
               <?php
            
               if(user_rank()==99 AND $done==0){ ?>
                <div class="btn-group btn-sm">
                    <a href="<?php echo HOME.'?pg=taks&v=zero&pid='.get_tas_id() ?>" style="background: rgba(92,184,92,0)"  class="btn btn-sm ">0%</a>
                    <a href="<?php echo HOME.'?pg=taks&v=10&pid='.get_tas_id() ?>" style="background: rgba(92,184,92,0.1)"  class="btn btn-sm ">10%</a>
    <a href="<?php echo HOME.'?pg=taks&v=25&pid='.get_tas_id() ?>"  class="btn btn-sm " style="background: rgba(92,184,92,0.25)">25%</a>
    <a href="<?php echo HOME.'?pg=taks&v=50&pid='.get_tas_id() ?>" class="btn btn-sm " style="background: rgba(92,184,92,0.5)">50%</a>
     <a href="<?php echo HOME.'?pg=taks&v=75&pid='.get_tas_id() ?>" class="btn btn-sm " style="background: rgba(92,184,92,0.75)">75%</a>
      <a href="<?php echo HOME.'?pg=taks&v=90&pid='.get_tas_id() ?>" class="btn btn-sm " style="background: rgba(92,184,92,0.9)">90%</a>
       <a href="<?php echo HOME.'?pg=taks&com=1&id='.get_tas_id() ?>" class="btn btn-success btn-sm ">100%</a>
    
</div>
               
               <?php } ?>
</td>
   
  <?php //if(USER_TYPE==1){ ?>   
  
<td ><?php 
if($done==0){
    $waitedfor=get_tas_lastab();
  
    
    
    if(user_rank()==99){
    echo '<a class="btn btn-sm btn-success" target="_blank" href="'.HOME.'?pg=taks&com=1&id='.get_tas_id().'">Mark as Complete</a>';
    echo ' <a class="btn btn-sm btn-danger btn-ajax hider" data-id="#'.get_tas_id().'" target="_blank" url="'.HOME.'?pg=taks&did='.get_tas_id().'">Delete</a>';
    if($waitedfor==1)
        echo '<br/> <i class="fa fa-info-circle" aria-hidden="true"></i> <span class="text-danger blink">Waiting for your response</span>';
   
    }else{
        if($waitedfor==0)
        echo '<i class="fa fa-info-circle" aria-hidden="true"></i> <span class="text-danger blink">Waiting for your response</span>';
        else
        echo 'On Progress';
        
        
    }
  
        
    
    }else{ 
        ?>
      <!--<a class="btn btn-sm btn-warning" target="_blank" href="<?php echo HOME.'?pg=taks&com=1&id='.get_tas_id() ?>">Mark as unComplete</a>-->
Complete
<?php } ?>
</td>
	<?php //} ?>
    
  </tr>




        <?php
    endwhile;
}
?>


<tr>
<td  colspan="12">
    
     <?Php
                if(is_get('loader') == false){
                    global $pagin;
                    echo $pagin;
                }
                ?>
    
    <?php
//$total_rows = $dbase->query("SELECT * FROM sob_impexp where tas_stat=0 $where");
// //$total_rows = mysql_fetch_row($total_rows);
//  $total_rows = $dbase->num_rows($total_rows);
//// $total_rows = $total_rows[0];
//
// $total_pages = $total_rows / $per_page;
// $total_pages = ceil($total_pages); # 19/5 = 3.8 ~=~ 4
//$othx=(isset($_GET['eoe'])?'&eoe='.$_GET['eoe']:'');
//$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?page=list'.$othx;
// for($i = 1; $i  <= $total_pages; $i++)
// {
//  echo "<a href='$actual_link&p=$i'>$i</a> &nbsp;&nbsp;";
// }
 ?>
</td>

</tr>
    
</table>



</div></div></div>

<?php get_footer() ?>