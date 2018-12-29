<?php
 theme_include('header.php');
global $dbase,$curr,$sizetype;

$stid=(is_get('comname')?is_get('comname'):is_post('comname')); 
//echo $name.  get_cate_name($name);
$where = "";
$mwhere = "";
//

//if(is_get('me')=='mah'){
//    
//     $title = 'گزارش شرکت محصول کننده';
//     $mont = 'imp_amount';
//     $total = 'imp_m_total';
//     $namef = 'imp_m_name';
//     $pricef = 'imp_m_price';
//     $wordof = 'محصول';
//}elseif(is_get('me')=='tran'){
//    
//      $title = 'گزارش شرکت بار چالانی';
//      
//     $mont = 'imp_amount';
//     $total = 'imp_t_total';
//     $namef = 'imp_t_cname';
//     $pricef = 'imp_t_price';
//     $wordof = 'انتقال';
//      
// } elseif(is_get('me')=='over'){
//     
//     
//      $title = 'گزارش شرکت اضافه بار';
//          $mont = 'imp_o_amont';
//     $total = 'imp_o_total';
//     $namef = 'imp_o_name';
//     $pricef = 'imp_o_price';
//     $wordof = 'اضافه بار';
//      
//}

$date1 = false; $date2=false; $oiltype = false;
if(is_post('year1') AND is_post('mon1') AND is_post('day1'))
$date1= jalali_to_gregorian($_POST['year1'],$_POST['mon1'],$_POST['day1'],'-');
if(is_post('year2') AND is_post('mon2') AND is_post('day2'))
$date2= jalali_to_gregorian($_POST['year2'],$_POST['mon2'],$_POST['day2'],'-');

if($date1 AND $date2){
$where = " AND imp_date >=  '$date1' AND imp_date <=  '$date2' ".$where;
$mwhere = " AND imp_date >=  '$date1' AND imp_date <=  '$date2' ".$mwhere;
}
if($date1 AND !$date2){
$where = " and imp_date='".$date1."' ".$where;
$mwhere = " and imp_date='".$date1."' ".$mwhere;
}


if(is_post('oiltype')){
    $typex = is_post('oiltype');
  $oiltype = " and imp_koo={$typex} " ; 
}else{
    $oiltype = " " ; 
}


if($stid){
$where = " and 	imp_st=".$stid." ".$where.$oiltype;
//$mwhere = " and mon_name='".$name."' ".$mwhere;
}


?>
<div class="container">	
    <table id="datatbl" width="1200" >
    
       
    <tr>
   	 <td  colspan="2"><h3>گزارش از مخزن <?php echo get_cate_name($stid)?></h3></td>
 	</tr>
    <tr><td valign="top">



 <table id="datatbl" width="600">
  
	<tr    class="tox" >
		<th colspan="9" width="16%">تخلیه یا خرید</th>
      
        	
 	</tr>
	
	<tr  class="tox" >
             <th width="15%">تاریخ تخلیه </th>
		<th width="16%">شرکت</th>
        <th width="20%"> مقدار سمیر</th>
   	 	<th width="11%">نوع تیل</th>
        <th width="5%">کرایه</th>
        <th width="15%">تعرفه گمرک </th>
      <th width="33%">قیمت  سمیر </th>
       <th width="33%">قیمت تمام شد </th>
        <th width="33%">مجموع</th>	
 	</tr>

<?Php	
$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 AND imp_eoe=2  $where ORDER BY imp_id DESC");
	$paid = 0;
	$mpaid = 0;
while($row = $dbase->fetch_array($result))
  {

?>

	<tr>
            
             <td><?Php   echo valDate($row['imp_date']) ?> </td>
            
		<td ><?Php echo get_cate_name($row['imp_name']) ?></td>
        <td ><?Php  echo $row['imp_s_amont'];?></td>
   
        <td ><?Php echo get_cate_name($row['imp_koo']) ?></td>
        <td><?Php  echo $row['imp_t_price'] ?> </td>
        
            <td><?Php  echo $row['imp_m_price'].$curr ?> </td>
            <td><?Php  echo $row['imp_price'].$curr ?> </td>
       <td><?Php   $tama = ($row['imp_t_price'] + $row['imp_m_price'] + $row['imp_price']); echo $tama.$curr ?> </td>
      
        <td ><?Php echo ($tama * $row['imp_s_amont']) ?></td>
   
 	</tr>
   
	
   	 	
   

<?php



  }
?>

<!--<tr   >
		
       
       <td colspan="4"  >مجموع پرداخت شده:  <?php echo $paid.$curr ?></td> 
        <td  colspan="3" >مجموعه دریافت شده: <?php echo $mpaid.$sizetype ?></td> 
      

 	</tr>
        
        <tr   >
		
       
       <td colspan="4"  ><?php   $resx= ($mpaid-$paid); echo ($resx < 0 ? 'قرضدار' : 'باقی') ?></td> 
        <td  colspan="3" >  <?php echo $resx.$curr ?></td> 
      

 	</tr>-->

</table>

</td>

<td valign="top">

    <table id="datatbl" width="600">

      
	<tr    class="tox" >
		<th colspan="7" width="16%">بارگیری یا فروش</th>
      
        	
 	</tr>
	
	<tr  class="tox" >
             <th width="15%">تاریخ بارگیری </th>
		<th width="16%">شرکت</th>
        <th width="20%"> مقدار سمیر</th>
   	 	<th width="11%">نوع تیل</th>

        <th width="33%">قیمت سمیر </th>
        <th width="33%">مجموع</th>	
 	</tr>

		<?php
		
		
$result = $dbase->query("SELECT * FROM sob_impexp where imp_eoe=1 and imp_stat=0 $where ORDER BY imp_id DESC" );
$oilmonth=0;
$needpay=0;
while($row = $dbase->fetch_array($result))
  {

	//$needpay = $needpay + $row[$total];
       // $oilmonth = $oilmonth + $row[$mont];
?>

	<tr>
            
             <td><?Php   echo valDate($row['imp_date']) ?></td>
            
		<td ><?Php echo get_cate_name($row['imp_name']) ?></td>
        <td ><?Php  echo $row['imp_s_amont'];?></td>
   
        <td ><?Php echo get_cate_name($row['imp_koo']) ?></td>
     
            <td><?Php  echo $row['imp_price'].$curr ?> </td>
<!--       <td><?Php   $tama = ($row['imp_price']); echo $tama.$curr ?> </td>-->
      
        <td ><?Php echo ($tama * $row['imp_s_amont']) ?></td>
   
 	</tr>
   
	
   	 	
   

<?php



  }
?>



<!--<tr   >
		
       
       <td colspan="3"  >قابل پرداخت بابت <?php echo $wordof ?>:  <?php echo $needpay.$curr ?></td> 
        <td  colspan="2" > مقدار روغنیات <?php echo $wordof ?> شده: <?php echo $oilmonth.$sizetype ?></td> 
      

 	</tr>-->


</table>
</td>



<!--</tr>

		
        	

 
      
        <td  colspan="1" >الباقی</td>
  	 	<td  colspan="1"  ><?php echo ($needpay-$resx).$curr; ?></td>
 	</tr>-->
    
    
</table>
        
    </div>



<?php  theme_include('footer.php'); ?>