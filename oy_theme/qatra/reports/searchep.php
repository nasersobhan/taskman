<?php
//load_jsplug('form');

 theme_include('header.php');
 global $dbase,$curr,$sizetype;
 if(is_get('me')=='stu')
     $title = 'جستجو و راپور گیری مخزن ها';
 elseif(is_get('me')=='com')
      $title = 'گزارش خلاصه یک شرکت';
  elseif(is_get('me')=='expimp')
      $title = 'گزارش صادرات و واردات';
 ?>
<div class="content-box">
<div class="sidex" >

      <div class="panel panel-default" >
    <div class="panel-heading "><h3><?=$title?></h3></div>
    <div class="panel-body ">    



<?Php if($_GET['me']=='com'){?>
<form method="post" enctype="application/x-www-form-urlencoded" name="add"   id="oilexp" lang="fa">
<table align="center" width="650">
  
<!-- formget(this.form, '<?php echo HOME ?>?pg=report&view=getrepal&me=com');-->
<!--  onchange="javascript:get_loax('<?php echo HOME ?>?pg=report&view=getrepal&me=com&x=',this.value); "-->
  <tr>
    <td  colspan="2"><select onchange="javascript:formget(this.form, '<?php echo HOME ?>?pg=report&view=getrepal&me=com');"    name="comname">
    
            
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
            
            
            
  <?php //  $result = $dbase->query("SELECT Distinct imp_name FROM sob_impexp Order by imp_name");
//while($row = $dbase->fetch_array($result))
 // {
//	  
//	  echo  '<option value="'.$row['imp_name'].'">'.$row['imp_name'].'</option>';
//  }
?>




      <option selected="selected" value="0">کل شرکتها</option>
    
    
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
  
  


</table>
</form>

<?php } 

if($_GET['me']=='stu'){?>




<form method="post" enctype="application/x-www-form-urlencoded" name="add"  id="oilexp" lang="fa">
<table align="center" width="650">
  

  
  <tr>
      <td><?php echo g_lbl('house') ?>:</td>
  <td>
<!--  get_loax('<?php echo HOME ?>?pg=report&view=getrepal&me=stu&x=',this.value); -->
  <select onchange="javascript:formget(this.form, '<?php echo HOME ?>?pg=report&view=getrepal&me=stu');"    name="name">
  <?php 
             $oild =  cat_2arr_l('house',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';
            }?>       
  <?php //  $result = $dbase->query("SELECT * FROM  st Order by name");
//while($row = $dbase->fetch_array($result))
 // {
	  
//	  echo  '<option value="'.$row['id'].'">'.$row['name'].'</option>';
//  }
?>




      <option selected="selected" value="">همه</option>
    
    
    </select>
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
 
  
</table>
</form>

<?php }

elseif($_GET['me']=="expimp"){ ?>
<form method="post" enctype="application/x-www-form-urlencoded" name="add"   id="oilexp" lang="fa">
<table align="center" width="650">
  

  
  <tr>
    <td  colspan="2">
    <select onchange="javascript:formget(this.form, '<?php echo HOME ?>?pg=report&view=getrepal&me=expimp');"   name="eoe">


  <option  value="1">برد</option>
  <option  value="2">آورد</option>
      <option selected="selected" value="">همه</option>
    
    
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
  
  


</table>
</form>


<?php } ?>
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