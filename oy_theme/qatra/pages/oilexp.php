<?php get_header(); global $curr, $sizetype; ?>
<div class="content-box">
    <div class="sidex">
        
        
        
      <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php echo get_pgtitle() ?></h3></div>
    <div class="panel-body ">     
        
 
<form  method="post" enctype="application/x-www-form-urlencoded" name="add"  id="oilexp" lang="fa">
    <table align="center" width="650">
        
            <tr>
        <td colspan="4" class=" text-center"><strong class="trhead">مشخصات اولیه</strong></td>
  </tr>
<!--   <tr>
       <td colspan="4">تاریخ : </td>
  </tr>-->

  <tr>
    <td width="120">نام شرکت:</td>
    <td><input required onBlur="validate(this.id, this.value);" name="imp_name" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>
  <tr>
    <td>نوع تیل:</td>
    <td><select name="imp_koo">
            
            <?php
             $oild =  cat_2arr_l('oiltype',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';
                 
            }
            ?>
<!--      <option value="1">خاک</option>
      <option value="2">دیزل</option>
      <option value="3">پطرول</option>
      <option value="100">دیگر</option>-->
    </select></td>
    
     <td>نام مخزن:</td>
    <td><select name="imp_st">
  <?php 
//  global $dbase;
//  $result = $dbase->query("SELECT * FROM sob_st where stat=1");
//  
//  
             $oild =  cat_2arr_l('house',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';   
            }
//while($row = $dbase->fetch_array($result))
//  {
//
//	  echo  '<option value="'.$row['id'].'">'.$row['name'].'</option>';
//  }
?>

    </select></td>
    
    
  </tr>


  

 <tr>
    <td>مقدار ترازو:</td>
    <td><input  size="6"  required name="imp_amount" onBlur="validate(this.id, this.value,'num');" id="imp_amountx" type="text" />
     <span style="color:red" name="qay" id="qay_imp_amountx"></span>
    </td>
    
    <td width="100">قیمت به <?php echo $curr ?>:</td>
    <td>
    <input  size="10" required onBlur="validate(this.id, this.value,'num');addNumbers('*','imp_amountx',this.id,'totalz',1000);" name="imp_price" id="pricex" type="text" />
    <span style="color:red" name="qay" id="qay_pricex"></span>
    </td>
  </tr>
  
  <tr>
    <td>جمع کل ترازو:</td>
    <td><input required name="imp_total" disabled id="totalz" type="text" /></td>
  </tr>
  
    <tr>
       
        <td width="100">مقدار سمیر:</td>
    <td><input  size="6" value=""  required name="imp_s_amont" onBlur="validate(this.id, this.value,'num');addNumbers('*','pricex',this.id,'totalsem',1000); addNumbers('-','imp_amountx',this.id,'imp_overamnt',1); " id="imp_semamnt" type="text" />
     <span style="color:red" name="qay" id="qay_imp_semamnt"></span>
    </td>
    <td width="100">جمع کل سمیر:</td>
    <td>
        
        <input required name="imp_s_total" disabled id="totalsem" type="text" />
        
   
    </td>
  </tr>
  
<?php if(is_get('eoe')!=1) { ?>
    <tr>
        <td colspan="4" class=" text-center"> <hr/>  <strong class="trhead">محصولات</strong></td>
  </tr>
  

  
  
    <tr>
    <td width="100">نام محصول کننده:</td>
    <td><input size="30" required onBlur="validate(this.id, this.value);" name="imp_m_name" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>

       <tr>
       
        <td width="100">قیمت محصول به <?php echo $curr ?>:</td>
    <td><input  size="6"  required name="imp_m_price" onBlur="validate(this.id, this.value,'num');addNumbers('*','imp_semamnt',this.id,'mahsoltotal',1000);" id="imp_mahsolprice" type="text" />
     <span style="color:red" name="qay" id="qay_imp_mahsolprice"></span>
    </td>
    <td width="100">مجموع محصول:</td>
    <td>
        <input  size="10" required  disabled name="imp_m_total" id="mahsoltotal" type="text" />
   
    </td>
  </tr>
  
  
      <tr>
        <td colspan="4" class=" text-center"> <hr/>  <strong class="trhead">اضافه بار</strong></td>
  </tr>
  
    <tr>
    <td width="100">نام صاحب اضافه بار:</td>
    <td><input size="30" required onBlur="validate(this.id, this.value);" name="imp_o_name" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
    
    <td width="100">مقدار اضافه بار:</td>
    <td><input  size="6" disabled  required name="imp_o_amont" onBlur="validate(this.id, this.value,'num');" id="imp_overamnt" type="text" />
     <span style="color:red" name="qay" id="qay_imp_imp_overamnt"></span>
    </td>
    
  </tr>
       <tr>
       
        
    <td width="100">قیمت اضافه بار به <?php echo $curr ?>:</td>
    <td>
    <input  size="10" required onBlur="validate(this.id, this.value,'num');addNumbers('*','imp_overamnt',this.id,'over_total',1000);" name="imp_o_price" id="imp_overprice" type="text" />
    <span style="color:red" name="qay" id="qay_imp_overprice"></span>
    </td>
    
    
     <td>مجموع اضافه بار:</td>
    <td><input required name="imp_o_total" disabled id="over_total" type="text" /></td>
  </tr>
  
  
 
  
     
  
  
    <tr>
        <td colspan="4" class=" text-center"> <hr/>  <strong class="trhead">انتقال</strong></td>
  </tr>
      <tr>
    <td width="100">بارچالانی:</td>
    <td><input size="30" required onBlur="validate(this.id, this.value);" name="imp_t_cname" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
    
         <td width="100">نام دریور:</td>
    <td><input  required name="imp_drivername" id="driver" type="text" /></td>
  </tr>
  

   <tr>
  
    <td width="100">نمبر موتر:</td>
    <td><input   required name="imp_trucknum" id="car"  onBlur="validate(this.id, this.value,'num');" type="text" />
     <span style="color:red" name="qay" id="qay_car"></span></td>
    
    
      <td width="100">قیمت کرایه به <?php echo $curr ?>:</td>
    <td><input  size="6"  required name="imp_t_price" onBlur="validate(this.id, this.value,'num');addNumbers('*','imp_semamnt',this.id,'rent_total',1000);" id="imp_rentprice" type="text" />
     <span style="color:red" name="qay" id="qay_imp_rentprice"></span>
    </td>
  </tr>

  
  <tr>
    <td>مجموع کرایه:</td>
    <td><input required name="imp_t_total" disabled id="rent_total" type="text" /></td>
  </tr>
<?php } ?>

 

  
       
  
 <tr>
      <td colspan="4"><hr/></td>
  </tr>
   <tr>
    <td valign="top">توضیحات:</td>
    <td colspan="3">
    <textarea class="form-control" id="dis" name="imp_dis" cols="30" rows="5"></textarea></td>
  </tr>

   <tr>
    <td align="center" colspan="4">

        <input class="btn btn-success Pull-left" style="margin-top: 5px;" data-url="<?php echo HOME ?>?pg=impexp&eoe=<?php echo is_get('eoe'); ?> #reportx" id="load_reportx" type="button" name="Send" value="ذخیره و جدید"
    onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=impexp&eoe=<?php echo is_get('eoe'); ?>&add=1'); ;" >


    </td>

  </tr>



</table>
</form>
        
        

<span style="color:red" name="mess" id="mess">
    </span>
</div>
    
    
    
      </div></div>
    <span id="reportx" >
 <div  class="sidex  Pull-left">

<div class="panel panel-default" >
    <div class="panel-heading "><h3>موجودی روغنیات در مخازن بر اساس تن</h3></div>
    <div class="panel-body ">                


    <table style="table-layout:fixed" id="datatbl" width="550" >
	<tr>
            <th width="120px">نوع تیل/مخزن</th>
            <?php 

             $oild =  cat_2arr_l('house',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<th width="80px">'.$label.'</th>';   
            }

?>  
            
            
   
  </tr>
  
  
   <?php
             $oildx =  cat_2arr_l('oiltype',0,'fa_AF');
            foreach($oildx as $id => $label){?>
                 <tr>
  <th width="140px"><?php echo $label.'('.$sizetype.')'; ?></td>
<?php foreach($oild as $sid => $slabel){
                 echo '<td>'.get_total($sid,$id).'</td>';   
            }
            
            
            ?>
    
   
  </tr>
                 
       <?php      }
            ?>
  
  
 
    </table>
    
  </div></div>
    
    
<?php //
//$nx=$_GET['eoe'];
//$day=date('Y-m-d');
//
//
//  global $dbase;
//	$result = $dbase->query("SELECT imp_amount FROM sob_impexp where imp_stat=0 and imp_eoe='$nx' and imp_date='$day' ORDER BY imp_time");
//	$todayoild=0;
//	while($row = $dbase->fetch_array($result))
//	  {
//		  $todayoild = $row['imp_amount'] + $todayoild;
//	  }
//
//
//
//	$result = $dbase->query("SELECT imp_amount FROM sob_impexp where imp_stat=0 and imp_eoe='1' ORDER BY imp_time");
//	$import=0;
//	while($row = $dbase->fetch_array($result))
//	  {
//		  $import = $row['imp_amount'] + $import;
//	  }
//
//
//	$result = $dbase->query("SELECT imp_amount FROM sob_impexp where imp_stat=0 and imp_eoe='2' ORDER BY imp_time");
//	$export=0;
//	while($row = $dbase->fetch_array($result))
//	  {
//		  $export = $row['imp_amount'] + $export;
//	  }
//  echo  ' موجودی تیل در مخزنها ';
//	  echo $export-$import;
//
//

   ?>
<!--    <br/>-->

  <?php



//	$result = $dbase->query("SELECT imp_amount FROM sob_impexp where imp_stat=0  and imp_st='12'  and imp_eoe='1' ORDER BY imp_time");
//	$import=0;
//	while($row = $dbase->fetch_array($result))
//	  {
//		  $import = $row['imp_amount'] + $import;
//	  }
//
//
//	$result = $dbase->query("SELECT imp_amount FROM sob_impexp where imp_stat=0 and imp_st='12' and imp_eoe='2' ORDER BY imp_time");
//	$export=0;
//	while($row = $dbase->fetch_array($result))
//	  {
//		  $export = $row['imp_amount'] + $export;
//	  }
//  echo  ' موجودی تیل در مخزن سابق : ' ; echo $export-$import;
//



   ?>

<!--<br />-->
     <?php


//
//	$result = $dbase->query("SELECT imp_amount FROM sob_impexp where imp_stat=0  and imp_st='20'  and imp_eoe='1' ORDER BY imp_time");
//	$import=0;
//	while($row = $dbase->fetch_array($result))
//	  {
//		  $import = $row['imp_amount'] + $import;
//	  }
//
//
//	$result = $dbase->query("SELECT imp_amount FROM sob_impexp where imp_stat=0 and imp_st='20' and imp_eoe='2' ORDER BY imp_time");
//	$export=0;
//	while($row = $dbase->fetch_array($result))
//	  {
//		  $export = $row['imp_amount'] + $export;
//	  }
//  echo  ' موجودی تیل در مخزن  میل 78 : ';
//	  echo $export-$import;
//
//

   ?>


   <!--<br />-->
     <?php


//
//	$result = $dbase->query("SELECT imp_amount FROM sob_impexp where imp_stat=0  and imp_st='21'  and imp_eoe='1' ORDER BY imp_time");
//	$import=0;
//	while($row = $dbase->fetch_array($result))
//	  {
//		  $import = $row['imp_amount'] + $import;
//	  }
//
//
//	$result = $dbase->query("SELECT imp_amount FROM sob_impexp where imp_stat=0 and imp_st='21' and imp_eoe='2' ORDER BY imp_time");
//	$export=0;
//	while($row = $dbase->fetch_array($result))
//	  {
//		  $export = $row['imp_amount'] + $export;
//	  }
//  echo  ' موجودی تیل در مخزن جدید : ';
//	  echo $export-$import;
//


   ?>

<!--    <br/>-->







<div class="panel panel-default" >
    <div class="panel-heading "><h3> آخرین اطلاعات ذخیره شده</h3></div>
    <div class="panel-body ">  

<?php
global $dbase;
$nx=$_GET['eoe'];
$day=date('Y-m-d');
$result = $dbase->query("SELECT * FROM sob_impexp where imp_eoe='$nx'   ORDER BY imp_id DESC LIMIT 10");?>
	<table style="table-layout:fixed" id="datatbl" width="550" >
	<tr>
    <th width="80px">نام</th>

    <th width="40px">مقدار</th>
    <th  width="40px">قیمت</th>
     <th  width="50px">مجموع</th>
    <th width="40px">نوع تیل</th>
    <th width="60px">تاریخ</th>
  </tr>




	<?php
while($row = $dbase->fetch_array($result))
  {
    
    
    
?>

  <tr>
      <td width="140px"><a target="_blank" href="<?Php echo get_link('impexp','edit',$row['imp_id']);?>" title="go to page"><?Php echo get_cate_name($row['imp_name']) ?></a></td>

    <td width="120px"><?Php echo $row['imp_s_amont'] ?></td>
    <td width="80px"><?Php echo $row['imp_price'] ?></td>
    <td width="100px"><?Php echo $row['imp_s_total'] ?></td>
    <td width="40px"><?Php echo get_cate_name($row['imp_koo']) ?></td>
    <td width="80px"><?Php echo valDate($row['imp_date']); ?></td>
  </tr>



<?php
 }
?>


</table>


</div></div></div>

</div>
    
    </div>
<?php get_footer() ?>