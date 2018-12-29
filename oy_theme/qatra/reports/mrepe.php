<?php
//load_jsplug('form');

 theme_include('header.php');
 global $dbase,$curr,$sizetype;

 ?>

<div class="container">
         


<?php 


$name= (is_get('comname') ? is_get('comname') : is_post('comname'));
$rname=get_cate_name($name);

$where = "";
//$koo=$_POST['koo'];
if(isset($_GET['eoe']) && $_GET['eoe']!="" && !isset($_POST['eoe']))
$eoe=$_GET['eoe'];
else
$eoe=is_post('eoe');

$st=is_post('st');


$date1 = false; $date2=false;
if(is_post('year1') AND is_post('mon1') AND is_post('day1'))
$date1= jalali_to_gregorian($_POST['year1'],$_POST['mon1'],$_POST['day1'],'-');
if(is_post('year2') AND is_post('mon2') AND is_post('day2'))
$date2= jalali_to_gregorian($_POST['year2'],$_POST['mon2'],$_POST['day2'],'-');

if($date1 AND $date2)
$where = " AND imp_date >=  '$date1' AND imp_date <=  '$date2' ".$where;
if($date1 AND !$date2)
$where = " and imp_date='".$date1."' ".$where;

if($name)
$where = " and imp_name='".$name."' ".$where;

//if(!$koo=="")
//$where = " and koo='".$koo."' ".$where;


//if(!$st=="")
//$where = " and st='".$st."' ".$where;


?>
	
    <table id="datatbl" width="1200" >
    
   
    <tr>
   	 <td  colspan="2"><h3>حسابات خرید از شرکت <?=$rname?></h3></td>
 	</tr>
    <tr><td valign="top">



 <table id="datatbl" width="600">
  
	<tr  class="tox" >
		<th width="20%">تاریخ خرید</th>
        <th width="15%"> مقدار</th>
   	 	<th width="10%">فی</th>
        <th width="15%">مجموع</th>
        <th width="40%">توضیحات </th>
      
        	
 	</tr>

		<?php
		
		$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_eoe=2 $where ");
		$payable = 0;
while($row = $dbase->fetch_array($result))
  {
	
$et=$row['imp_eoe'];


	
  
$payable += $row['imp_s_total'];


?>

	<tr>
		<td ><?Php echo $row['imp_sdate'] ?></td>
        <td ><?Php  echo $row['imp_s_total'];?></td>
   
        <td ><?Php echo $row['imp_price'] ?></td>
        <td><?Php  echo $row['imp_s_total'].$curr ?> </td>
       
        <td ><?Php echo $row['imp_dis'] ?></td>
   
 	</tr>
   
	
   	 	
   

<?php

  }
?>


</table>

</td>

<td valign="top">

    <table id="datatbl" width="600">




	<tr  class="tox" >
		<th width="20%">تاریخ پرداخت</th>
        <th width="15%"> مبلغ</th>
   	 	<th width="10%">نوع پول</th>
        <th width="10%">تبادله</th>
        <th width="15%">مجموع </th>
       <th width="45%">توضیحات </th>
        	
 	</tr>

		<?php
		
	$where = " and mon_name='".$name."' ";	
$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0 and mon_eoe=1 $where ");
		$paid = 0;
while($row = $dbase->fetch_array($result))
  {
	$et=$row['mon_eoe'];
	$paid += $row['mon_doller'];
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


<tr  class="tox"  >
		
       
       <td colspan="1"  >مجموعه قابل پرداخت</td> 
        <td  colspan="1" ><?php echo $payable.$curr ?></td> 
      

 	</tr>
    <tr class="toxz" >
		
 
      
         <td colspan="1" >مجموعه پول پرداخت شده</td>
  	 	<td  colspan="1"  ><?php echo $paid.$curr ?></td>
 	</tr>

 <tr class="tox" >
		
 
      
        <td  colspan="1" >
                   <?php
                       $tol=$payable-$paid;
                       if($tol < 0)
                        echo ' طلب '.$rname;
                        else
                        echo 'قرض '.$rname.' از مایان';

                    ?>


       </td>
  	 	<td  colspan="1"  ><?php echo abs($tol).$curr; ?></td>
 	</tr>
    
  
  
</table>
        
        
        </div>
    
    

<?php
 theme_include('footer.php');
 
 ?>
