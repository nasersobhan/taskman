<?php
//load_jsplug('form');

 theme_include('header.php');
 global $dbase,$curr,$sizetype;

     $title = 'گزارش عمومی از مخزنها';
 
 ?>
<div class="content-box">
<div class="sidex" >

      <div class="panel panel-default" >
    <div class="panel-heading "><h3><?=$title?></h3></div>
    <div class="panel-body ">    




        <form target="_blank" method="post" enctype="application/x-www-form-urlencoded" name="add" action="<?php echo HOME ?>?pg=report&view=stockrep"   id="oilexp" lang="fa">
<table align="center" width="650">

  <tr>
          <td>نام مخزن</td>
    <td ><select    name="comname">
    
            
              <?php 
        
             $oild =  cat_2arr_l('house',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';
            }?>      

      <option selected="selected" value="0">کل مخزنها</option>
    
    
    </select></td> 
  </tr>
    <tr>
        <td>نوع تیل</td>
        
    <td><select    name="oiltype">
    
            
              <?php 
        
             $oild =  cat_2arr_l('oiltype',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';
            }?>      

      <option selected="selected" value="0">کل انواع</option>
    
    
    </select></td> 
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
    <td colspan="2">
 
    
        <input class="btn btn-sm btn-success pull-left" type="submit" name="Send" value="گرفتن راپور" />
   
    
    
    </td>
   
  </tr>

</table>
</form>

</div></div></div>

<div class="sidex pull-left" >
      <div class="panel panel-default" >
    <div class="panel-heading "><h3>گزارش</h3></div>
    <div class="panel-body ">    
    
     
<!--        
        مقدار کل پرداخت ها بابت اضافه بار<br/>
        مقدار کل پرداختها بابت محصول<br/>
        مقدار کل پرداختها بابت انتقال<br/>
        
        
        
        -->
        
        
        
        
    
    </div></div>
</div>
    
    
    </div>
<?php
 theme_include('footer.php');
 
 ?>