<?php
 theme_include('header.php');
global $dbase,$curr,$sizetype;

$name=(is_get('comname')?is_get('comname'):is_post('comname')); 
//echo $name.  get_cate_name($name);
$where = "";
$mwhere = "";
//

if(is_get('me')=='mah'){
    
     $title = 'گزارش شرکت محصول کننده';
     $mont = 'imp_amount';
     $total = 'imp_m_total';
     $namef = 'imp_m_name';
     $pricef = 'imp_m_price';
     $wordof = 'محصول';
}elseif(is_get('me')=='tran'){
    
      $title = 'گزارش شرکت بار چالانی';
      
     $mont = 'imp_amount';
     $total = 'imp_t_total';
     $namef = 'imp_t_cname';
     $pricef = 'imp_t_price';
     $wordof = 'انتقال';
      
 } elseif(is_get('me')=='over'){
     
     
      $title = 'گزارش شرکت اضافه بار';
          $mont = 'imp_o_amont';
     $total = 'imp_o_total';
     $namef = 'imp_o_name';
     $pricef = 'imp_o_price';
     $wordof = 'اضافه بار';
      
}

$date1 = false; $date2=false;
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

if($name){
$where = " and ".$namef."='".$name."' ".$where;
$mwhere = " and mon_name='".$name."' ".$mwhere;
}


?>
<div class="container">	
    <table id="datatbl" width="1200" >
    
       
    <tr>
   	 <td  colspan="2"><h3>حسابات <?php echo $wordof ?> شرکت   <?php echo get_cate_name($name)?></h3></td>
 	</tr>
    <tr><td valign="top">



 <table id="datatbl" width="600">
  
	<tr    class="tox" >
		<th colspan="7" width="16%">مالی</th>
      
        	
 	</tr>
	
	<tr  class="tox" >
             <th width="15%">نوعیت </th>
		<th width="16%">تاریخ</th>
        <th width="20%"> مبلغ</th>
   	 	<th width="11%">نوع پول</th>
        <th width="5%">تبادله</th>
        <th width="15%">مجموع </th>
   
       <th width="33%">توضیحات </th>
        	
 	</tr>

<?Php	
$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0  $mwhere ");
	$paid = 0;
	$mpaid = 0;
while($row = $dbase->fetch_array($result))
  {
	 $eoe = $row['mon_eoe'];
	
//	if($eoe==2)
//	$paid += $row['mon_doller'];
//	else
//	
//        
//        
          
  if($eoe==1){
             $esx = 'پرداخت';
             $paid += $row['mon_doller'];
             
       }elseif($eoe==2){
              $esx = 'دریافت';
              $mpaid += $row['mon_doller'];
       }elseif($eoe==5){
              $esx = 'پرداخت متفرقه';
              $paid += $row['mon_doller'];
       }elseif($eoe==7){
              $esx = 'دریافت متفرقه';
              $mpaid += $row['mon_doller'];
       }
?>

	<tr>
            
             <td><?Php   echo $esx ?> </td>
            
		<td ><?Php echo $row['mon_sdate'] ?></td>
        <td ><?Php  echo $row['mon_rmoney'];?></td>
   
        <td ><?Php echo get_cate_name($row['mon_mt']) ?></td>
        <td><?Php  echo $row['mon_rated'] ?> </td>
       <td><?Php  echo $row['mon_doller'].$curr ?> </td>
      
        <td ><?Php echo $row['mon_discription'] ?></td>
   
 	</tr>
   
	
   	 	
   

<?php



  }
?>

<tr   >
		
       
       <td colspan="4"  >مجموع پرداخت شده:  <?php echo $paid.$curr ?></td> 
        <td  colspan="3" >مجموعه دریافت شده: <?php echo $mpaid.$sizetype ?></td> 
      

 	</tr>
        
        <tr   >
		
       
       <td colspan="4"  ><?php   $resx= ($mpaid-$paid); echo ($resx < 0 ? 'قرضدار' : 'باقی') ?></td> 
        <td  colspan="3" >  <?php echo abs($resx).$curr ?></td> 
      

 	</tr>

</table>

</td>

<td valign="top">

    <table id="datatbl" width="600">

<tr  class="tox" >
    <th colspan="5" width="16%"><?php echo $wordof ?></th>
      
        	
 	</tr>


	
	<tr  class="tox" >
		<th width="16%">تاریخ محصول</th>
        <th width="20%"> مقدار</th>
   	 	<th width="11%">قیمت</th>
               <th width="15%">مجموع </th>
       <th width="33%">شرکت تیل </th>
        	
 	</tr>

		<?php
		
		
$result = $dbase->query("SELECT * FROM sob_impexp where imp_eoe=2 and imp_stat=0 $where");
$oilmonth=0;
$needpay=0;
//echo "SELECT * FROM sob_impexp where imp_eoe=2 and imp_stat=0 $where";
while($row = $dbase->fetch_array($result))
  {

	$needpay = $needpay + $row[$total];
        $oilmonth = $oilmonth + $row[$mont];
?>

	<tr>
		<td ><?Php echo $row['imp_sdate'] ?></td>
        <td ><?Php  echo $row[$mont].$sizetype;?></td>
   
        <td ><?Php echo ($row[$pricef]) ?></td>
   
       <td><?Php  echo $row[$total].$curr ?> </td>
        <td ><?Php echo get_cate_name($row['imp_name']) ?></td>
   
 	</tr>
   
	
   	 	
   

<?php



  }
?>



<tr   >
		
       
       <td colspan="3"  >قابل پرداخت بابت <?php echo $wordof ?>:  <?php echo $needpay.$curr ?></td> 
        <td  colspan="2" > مقدار روغنیات <?php echo $wordof ?> شده: <?php echo $oilmonth.$sizetype ?></td> 
      

 	</tr>


</table>
</td>



</tr>

		
        		<?php
	

//$result = $dbase->query("SELECT sum({$total}) as reslx FROM sob_impexp where imp_eoe=2 and imp_stat=0 $where");
//		 $ex = 0;
//  $im = 0;
//  $row = $dbase->fetch_array($result);
//  //print_r($row);
//  $im = $row['reslx'];

?>

 
      
        <td  colspan="1" >الباقی</td>
  	 	<td  colspan="1"  ><?php echo ($needpay+($mpaid-$paid)).$curr; ?></td>
 	</tr>
    
    
</table>
        
    </div>



<?php  theme_include('footer.php'); ?>