<?php get_header();global $curr; ?>
<div class="content-box">
  
   
        
         <div class="panel panel-default" >
    <div class="panel-heading "><h3>
   
        
        <?php echo get_pgtitle() ?> - <?php echo get_tas_value('title',is_get('id')); ?></h3></div>
    <div class="panel-body ">     
        
        <?php 
        $comp = get_tas_value('done',is_get('id'));
        if($comp==0){
        ?>

        <form method="post" action="<?php echo HOME ?>?pg=taks&com=1&id=<?php echo is_get('id');?>" enctype="application/x-www-form-urlencoded" name="add"  id="oilexp" lang="fa">
    <table align="center" class="table table-responsive">
  

  
   
   <tr>
    <td valign="top"><label>Notes:</label></td>
    <td>
    <textarea style="margin:  5px; border-radius: 3px; " id="dis" name="tas_note" cols="70" rows="12"></textarea>
    
    </td>
  </tr>
  
   <tr>
       <td></td>
       <td>
<input class="btn btn-success btn-sm Pull-left" id="load_reportx" type="submit" name="Send" value="Mark as Complete"  /></td>
   
  </tr>
 
</table>
  
</form>
        
        <?php }else{ ?>
        <span style="color:red" name="mess" id="mess">Marked as Completed</span>

        <?php } ?>
</div></div>
    
    
    
<!--<div class="sidex Pull-left" style="">
 <span  id="reportx">
     
     
     
     
     
     <div class="panel panel-default" >
    <div class="panel-heading "><h3>Recent Jobs Submitted</h3></div>
    <div class="panel-body ">                


  
    
  </div></div>
     

 
    
        <span id="viewportal">
            
        </span>
</div>-->

    
 
</div>





<?php get_footer() ?>