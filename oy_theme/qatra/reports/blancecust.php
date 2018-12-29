<?php get_header() ?>
<div class="content-box">
    <div class="sidex">
         <div class="panel panel-default" >
    <div class="panel-heading ">  <h3>جستجو و راپور گیری</h3></div>
    <div class="panel-body ">   
        <div >
<form method="post" enctype="application/x-www-form-urlencoded" target="_blank" name="add" action="?pg=report&view=blancec"  id="blancec" lang="fa">
<table align="center" width="1280">
  

  
  
  

  
  <tr>
    <td><label>نام شرکت:</label></td>
   <td><select  multiple="multiple" name="comname[]">
     <?php 
             $oild =  cat_2arr_l('company',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.' ('.g_lbl('company').')</option>';
            }
            
             $oild =  cat_2arr_l('tcompany',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.' ('.g_lbl('tcompany').')</option>';
            }
            
             $oild =  cat_2arr_l('ocompany',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.' ('.g_lbl('ocompany').')</option>';
            }
             $oild =  cat_2arr_l('mcompany',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.' ('.g_lbl('mcompany').')</option>';
            }
            
            ?>  
?>





    
    
    </select></td>
  </tr>

  
   <tr>
    <td align="center" colspan="2">
 
    
    <input type="submit" name="Send" value="گرفتن راپور" />
   
    
    
    </td>
   
  </tr>

</table>
</form>


</div></div></div></div></div>
<?php  theme_include('footer.php'); ?>