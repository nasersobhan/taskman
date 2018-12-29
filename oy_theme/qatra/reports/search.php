<?php
 theme_include('header.php');
 global $dbase,$curr,$sizetype;
 ?>
<div class="content-box">
    <div class="sidex">
         <div class="panel panel-default" >
    <div class="panel-heading ">  <h3>جستجو و راپور گیری</h3></div>
    <div class="panel-body ">   
        <div >
<form method="post" enctype="application/x-www-form-urlencoded" name="add" action="<?Php echo HOME ?>?pg=report&view=getrep"  id="oilexp" lang="fa">
<table align="center" width="550">
  
  <tr>
    <td colspan="2">
    
  
    
   
    </td>
   
  </tr>
  
  
  
<tr >
   
    <td>
    تاریخ شروع &brvbar;</td>
   <td>
       <input size="7" style="min-width: 0; width: 100px" placeholder="<?Php echo g_lbl('year');?>" value="" name="year1"  type="text" />
    <input size="3" style="min-width: 0; width: 50px" placeholder="<?Php echo g_lbl('month');?>" value="" name="mon1"  type="text" />
    <input size="3" style="min-width: 0; width: 50px" placeholder="<?Php echo g_lbl('day');?>" value="" name="day1" type="text" />
      </td>
  </tr>
<tr >
    <td>
       تاریخ ختم  &brvbar;</td>
   <td>
    <input size="7" style="min-width: 0; width: 100px" placeholder="<?Php echo g_lbl('year');?>" value="" name="year2"  type="text" />
    <input size="3" style="min-width: 0; width: 50px" placeholder="<?Php echo g_lbl('month');?>" value="" name="mon2"  type="text" />
    <input size="3" style="min-width: 0; width: 50px" placeholder="<?Php echo g_lbl('day');?>" value="" name="day2" type="text" />
    
    
    
   
    </td>
  </tr>
  
  <tr>
    <td><label>نام شرکت:</label></td>
   <td><select name="comname">
  <?php 
             $oild =  cat_2arr_l('company',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';
            }?>     




      <option <?php echo (is_get('comname') ? 'selected="selected"' : ''); ?>  value="">همه</option>
    
    
    </select></td>
  </tr>
  <tr>
    <td><label>نوع تیل:</label></td>
    <td><select name="imp_koo">
      <?php 
             $oild =  cat_2arr_l('oiltype',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';
            }?>   <option selected="selected" value="">همه</option>   
    </select></td>
  </tr>
  
  
  
  <tr>
    <td><label>عملیات:</label></td>
    <td><select name="imp_eoe">
      <option   value="2">آورد</option>
      <option  value="1">برد</option>
  
      <option   value="">همه</option>
    </select></td>
  </tr>
  
  
  
  <tr>
    <td><label>نام مخزن:</label></td>
    <td><select name="imp_st">
   <?php 
             $oild =  cat_2arr_l('house',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';
            }?>     




      <option selected="selected" value="">همه</option>
    
    
    </select></td>
  </tr>
  
  
  
   
   
 
  
  
  
   <tr>
    <td align="center" colspan="2">
 
    
        <input class="btn btn-sm btn-success pull-left" type="submit" name="Send" value="گرفتن راپور" />
   
    
    
    </td>
   
  </tr>

</table>
</form>


</div></div></div></div></div></div>
<?php
 theme_include('footer.php');
 
 ?>