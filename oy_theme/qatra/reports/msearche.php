<?php
//load_jsplug('form');

 theme_include('header.php');
 global $dbase,$curr,$sizetype;

 ?>

<div class="content-box">
<div class="sidex" >

      <div class="panel panel-default" >
    <div class="panel-heading "><h3>گزارش خرید</h3></div>
    <div class="panel-body ">    


<form method="post" enctype="application/x-www-form-urlencoded" target="_blank" name="add" action="<?Php echo HOME.'?pg=report&view=mrepe'?>"  id="oilexp" lang="fa">
<table align="center" width="650">
  

  
  
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



    
    </select></td>
  </tr>
 
  
  
  
  <tr style=" display:none">
    <td><label>عملیات:</label></td>
    <td><select name="eoe">
      <option <?php echo (is_get('eoe')==2? 'selected="selected"' : ''); ?>  value="2">پرداخت</option>
      <option <?php echo (is_get('eoe')==1? 'selected="selected"' : ''); ?> value="1">دریافت</option>
  
      <option <?php echo (is_get('eoe')==""? 'selected="selected"' : ''); ?>  value="">همه</option>
    </select></td>
  </tr>
  
  
  
 
  
  
  
   
   
 
  
  
  
   <tr>
    <td align="center" colspan="2">
 
    
    <input type="submit" name="Send" value="گرفتن راپور" />
   
    
    
    </td>
   
  </tr>

</table>
</form>


</div></div></div>

<div class="sidex pull-left" >
      <div class="panel panel-default" >
    <div class="panel-heading "><h3>گزارش</h3></div>
    <div class="panel-body ">    
    <span name="mess" id="mess"></span>  
    
    </div></div>
</div>
    
    
    </div>
<?php
 theme_include('footer.php');
 
 ?>