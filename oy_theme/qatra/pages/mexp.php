<?php get_header();global $curr; ?>
<div class="content-box">
  
         <div class="panel panel-default" >
    <div class="panel-heading "><h3>
   
        
        <?php echo get_pgtitle() ?></h3></div>
    <div class="panel-body ">     
        
        

<form method="post" name="add"  id="oilexp" lang="fa">
    <table align="center" class="table table-responsive">
  

  <tr>
    <td><label>Job Request Subject:</label></td>
    <td>
    
      <input required  name="tas_title" id="name" type="text" />

    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>
  <?php //if(is_get('eoe')==1){ ?>
    <tr>
    <td><label> Priority:</label></td>
            <td><select name="tas_priority">
        <option value="0">Low</option>
         <option value="1">Medium</option>
          <option value="2">High</option>

        </select>
    </td>
  </tr>
  <?php //} ?>
<!--  <input required disabled  name="tas_date" id="name" type="hidden" value="<?php echo date('Y-m-d'); ?>" />-->
<!--  <tr>
    <td><label>Date Submitted:</label></td>
    <td> </td>
  </tr>-->
    <tr>
    <td><label> Department:</label></td>
            <td><select name="tas_department">
                <?php 
             $oild =  cat_2arr_l('dep',0);
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';
                 
            }

?>

        </select>
    </td>
  </tr>

  
  
   <tr>
    <td><label>Your Email:</label></td>
    <td><input  required name="tas_email" value="<?php echo (user_email()=='shamaladmin@irdglobal.org' ? '' : user_email()); ?>" type="text" />
     <span style="color:red" name="qay" id="qay_amountx"></span>
    </td>
  </tr>
  
   
   <tr>
    <td valign="top"><label>Describe what you need:</label></td>
    <td>
    <textarea style="margin:  5px; border-radius: 3px; " id="dis" name="tas_summary" cols="40" rows="9"></textarea>
    
    </td>
  </tr>
  
   <tr>
       <td valign="top" colspan="2"><label>You can attach files in the next step (as comment)</label></td>
   
  </tr>
  
    
  
  
  
   <tr>
       <td></td>
       <td>
<input class="btn btn-success btn-sm Pull-left" data-url="<?php echo HOME ?>?pg=addtask #reportx" id="load_reportx" type="button" name="Send" value="Save and Send"  onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=addtask');" /></td>
   
  </tr>
 
</table>
  
</form>
        <span style="color:red" name="mess" id="mess"></span>


</div></div></div>
    
    
    
<!--<div class="sidex Pull-left" style="">
 <span  id="reportx">
     
     
     
     
     
     <div class="panel panel-default" >
    <div class="panel-heading "><h3>Recent Jobs Submitted</h3></div>
    <div class="panel-body ">                


  
    
  </div></div>
     

 
    
        <span id="viewportal">
            
        </span>
</div>-->

    





<?php get_footer() ?>