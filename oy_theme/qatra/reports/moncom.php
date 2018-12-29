<?php
 theme_include('header.php');
global $dbase,$curr,$sizetype;

$name=(is_get('comname')?is_get('comname'):is_post('comname')); 

$where = "";
$mwhere = "";
//




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
$where = " and imp_name='".$name."' ".$where;
$mwhere = " and mon_name='".$name."' ".$mwhere;
}


?>
<div class="container">	
    <table id="datatbl" width="1200" >
    
       
    <tr>
   	 <td  colspan="2"><h3>حسابات شرکت  <?php echo get_cate_name($name)?></h3></td>
 	</tr>
    <tr><td valign="top">



 <table id="datatbl" width="600">
  
	
	<tr  class="tox" >
		<th width="16%">تاریخ دریافت</th>
        <th width="20%"> مبلغ</th>
   	 	<th width="11%">نوع پول</th>
        <th width="5%">تبادله</th>
        <th width="15%">مجموع </th>
       <th width="33%">توضیحات </th>
        	
 	</tr>

<?Php	
$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0  $mwhere and (mon_eoe=2 OR mon_eoe=7)");
	$paid = 0;
	$mpaid = 0;
        global $curr;
        
while($row = $dbase->fetch_array($result))
  {
	$et=$row['mon_eoe'];
	
	  if($row['mon_mt']==$curr){
	if($et==2)
	$paid += $row['mon_doller'];
	else
	$mpaid += $row['mon_doller'];
          }
?>

	<tr>
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


</table>

</td>

<td valign="top">

    <table id="datatbl" width="600">




	
	<tr  class="tox" >
		<th width="16%">تاریخ پرداخت</th>
        <th width="20%"> مبلغ</th>
   	 	<th width="11%">نوع پول</th>
        <th width="5%">تبادله</th>
        <th width="15%">مجموع </th>
       <th width="33%">توضیحات </th>
        	
 	</tr>

		<?php
		
		
$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0  $mwhere and (mon_eoe=1 OR mon_eoe=5)");
$incom=0;
$mincom=0;
while($row = $dbase->fetch_array($result))
  {
	$et=$row['mon_eoe'];
	if($et==1)
	$incom = $incom + $row['mon_doller'];
	else
	$mincom = $mincom + $row['mon_doller'];
?>

	<tr>
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





</table>
</td>



</tr>


<tr   >
		
       
       <td colspan="1"  >مجموعه دریافتهای متفرقه:  <?php echo $mpaid.$curr ?></td> 
        <td  colspan="1" >مجموعه پرداختهای متفرقه: <?php echo $mincom.$curr ?></td> 
      

 	</tr>



<tr  class="tox"  >
		
      
       <td colspan="1"  >مجموعه دریافتها بابت صادر تیل : <?php echo $paid.$curr ?></td> 
        <td  colspan="1" >مجموعه پرداختها بابت وارد تیل: <?php echo $incom.$curr ?></td> 
      

 	</tr>

 <tr >
		
        		<?php
	

$result = $dbase->query("SELECT * FROM sob_impexp where (imp_eoe=1 OR imp_eoe=2) and imp_stat=0 $where");
		 $ex = 0;
  $im = 0;
while($row = $dbase->fetch_array($result))
  {

	$et=$row['imp_eoe'];
	if($et==1)
	$ex = $ex+$row['imp_s_total'];
	else
	$im = $im+$row['imp_s_total'];
	
	


  }
?>
      <td  colspan="1" >قرض مایان بابت وارد تیل : <?php echo $im.$curr; ?></td>
        <td  colspan="1" >طلب ما بابت برد تیل: <?php echo $ex.$curr; ?></td>
  	 	
 	</tr>
    

 <tr class="tox">
		
 
      
        <td  colspan="1" >مجموعه کل دریافت ها: <?php echo $paid+$mpaid.$curr; ?></td>
  	 	<td  colspan="1" >مجموعه کل پرداخت ها: <?php echo $mincom+$incom.$curr; ?></td>
 	</tr>
    
    
     <tr  >
		
 
      
        <td  colspan="1" >الباقی</td>
  	 	<td  colspan="1"  ><?php 
		
		$pay = $paid+$mpaid+$im;
		$in2com =  $mincom+$incom+$ex;
		$total=$pay-$in2com;
		$total = (float)$total;
		$abstotal = abs($total);
		
		//$abstotal = abs($total); 

		if($total>0)
		echo 'قرض '.$name.': ';
		elseif($total<0)
		echo 'طلب ما بالای '.$name.': ';
		elseif($total==0)
		echo '';
		
		
		echo $abstotal.$curr; ?></td>
 	</tr>
    
    
</table>
        
    </div>



<?php  theme_include('footer.php'); ?>