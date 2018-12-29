<?php
 theme_include('header.php');
 global $dbase,$curr,$sizetype;
 ?>
<div class="content-box">
    <div class="sidex">
         <div class="panel panel-default" >
    <div class="panel-heading ">  <h3>گزارش عمومی یک شرکت</h3></div>
    <div class="panel-body ">   
        <div >
<form method="post" enctype="application/x-www-form-urlencoded" target="_blank" name="add" action="<?Php echo HOME?>?pg=report&view=moncom"  id="oilexp" lang="fa">
<table align="center" width="550">
  

  
  
<tr>
   
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
            }?>     





      <option <?php echo ($_GET['comname']==""? 'selected="selected"' : ''); ?>  value="">همه</option>
    
    
    </select></td>
  </tr>
 
  
  
  
  <tr style=" display:none">
    <td><label>عملیات:</label></td>
    <td><select name="eoe">
      <option <?php echo ($_GET['eoe']==2? 'selected="selected"' : ''); ?>  value="2">پرداخت</option>
      <option <?php echo ($_GET['eoe']==1? 'selected="selected"' : ''); ?> value="1">دریافت</option>
  
      <option <?php echo ($_GET['eoe']==""? 'selected="selected"' : ''); ?>  value="">همه</option>
    </select></td>
  </tr>
  
  
  
 
  
  
  
   
   
 
  
  
  
   <tr>
    <td align="center" colspan="2">
 
    
    <input type="submit" name="Send" value="گرفتن راپور" />
   
    
    
    </td>
   
  </tr>

</table>
</form>


</div></div></div></div></div></div>

<?php
 theme_include('footer.php');
 
 ?>