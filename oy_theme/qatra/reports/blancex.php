<?php
 theme_include('header.php');

global $dbase,$curr;


		  $result = $dbase->query("SELECT Distinct mon_name FROM sob_money where mon_stat=0  AND mon_eoe!=5 AND mon_eoe!=7");

  while($row = $dbase->fetch_array($result))
  {
	
	$sta[]= $row['mon_name'];  

  }
  
  	  $result = $dbase->query("SELECT Distinct imp_name FROM sob_impexp where imp_stat=0");

  while($row = $dbase->fetch_array($result))
  {
	
	$sta[]= $row['imp_name'];  

  }
  
  $sta = array_unique($sta);
  
	 foreach ($sta as $stmain) {
		 
			$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0 and mon_name='$stmain' AND mon_eoe!=5 AND mon_eoe!=7");
			$exm=0;$imm=0;
			$exmm=0; $immm=0;
			while($row = $dbase->fetch_array($result))
				{
					if($row['mon_eoe']==1)
					$exm+=$row['mon_doller'];
					elseif($row['mon_eoe']==2)
					$imm+=$row['mon_doller'];
					//elseif($row['eoe']==5)
					//$exmm+=$row['doller'];
					//elseif($row['eoe']==7)
					//$immm+=$row['doller'];
				}
		
		
		
		
			$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_name='$stmain'");
			$exo=0;$imo=0;
			
			while($row = $dbase->fetch_array($result))
				{
					if($row['imp_eoe']==1)
					$exo+=$row['imp_total'];
					elseif($row['imp_eoe']==2)
					$imo+=$row['imp_total'];
					
				}
				
		//$company[$stmain]=($exmm+$exo+$exm)-($immm+$imo+$imm);
		$company[$stmain]=($exo+$exm)-($imo+$imm);
	 }
  
  
  
  foreach ($company as $name => $value) {
		
		
		if($value < 0)
		$qarz[$name]=abs ($value);
		elseif($value > 0)
		$talab[$name]=abs ($value);
		
		
		
		//echo $name.'  =  '.$value.$curr.'<BR />';
	 }
  
		?>


<div class="container">	
    <table id="datatbl" width="1200" >
    
 
    <tr>
   	 <td  colspan="4"><h1>بلانس کلی</h1></td>
 	</tr>
    <tr>
    <td valign="top">

 <table id="datatbl" width="300">
  <tr  class="tox" >
		<th colspan="2">طلب ما</th>
</tr>

	<tr  class="tox" >
		<th width="16%">نام شرکت</th>
        <th width="20%"> مبلغ</th>
        	
 	</tr>

<?php 
$total=0;
foreach($talab as $name => $value) {?>
	<tr>
       <td><?Php  echo get_cate_name($name) ?> </td>
       <td ><?Php echo $value.$curr ?></td>
 	</tr>
<?php  
$total+=$value;
}?>

<tr style="background-color:#999">
     <td>مجموع</td>
       <td ><?Php  echo $total.$curr ?> </td>

 	</tr>
</table>

</td>

<td valign="top">

    <table id="datatbl" width="300">


<tr  class="tox" >
		<th colspan="2">قرض مایان</th>
</tr>

	
	<tr  class="tox" >
		<th width="16%"> نام شرکت</th>
        <th width="20%"> مبلغ</th>
   
        	
 	</tr>


<?php 
$total=0;
foreach($qarz as $name => $value) {?>
	<tr>
       <td><?Php  echo get_cate_name($name) ?> </td>
       <td ><?Php echo $value.$curr ?></td>
 	</tr>
<?php  
$total+=$value;
}?>

<tr style="background-color:#999">
     <td>مجموع</td>
       <td ><?Php  echo $total.$curr ?> </td>

 	</tr>


</table>
</td>






<?php

 $result = $dbase->query("SELECT Distinct mon_name FROM sob_money where mon_stat=0  AND (mon_eoe=5 OR mon_eoe=7)");

  while($row = $dbase->fetch_array($result))
  {
	
	$stam[]= $row['mon_name'];  

  }
  
   $stam = array_unique($stam);
  
	 foreach ($stam as $stmain) {
		 
			$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0 and mon_name='$stmain' AND (mon_eoe=5 OR mon_eoe=7)");
			$exmm=0; $immm=0;
			while($row = $dbase->fetch_array($result))
				{
				/*	if($row['eoe']==1)
					$exm+=$row['doller'];
					elseif($row['eoe']==2)
					$imm+=$row['doller'];*/
					if($row['mon_eoe']==5)
					$exmm+=$row['mon_doller'];
					elseif($row['mon_eoe']==7)
					$immm+=$row['mon_doller'];
				}
		
		
		
		
		//$company[$stmain]=($exmm+$exo+$exm)-($immm+$imo+$imm);
		$companym[$stmain]=($exmm)-($immm);
	 }
  
  
  
  foreach ($companym as $name => $value) {
		
		
		if($value < 0)
		$qarzm[$name]=abs ($value);
		elseif($value > 0)
		$talabm[$name]=abs ($value);
		
		
		
		//echo $name.'  =  '.$value.$curr.'<BR />';
	 }
  
  
  ?>


<td valign="top">

    <table id="datatbl" width="300">


<tr  class="tox" >
		<td colspan="2">طلب ما متفرقه</td>
</tr>

	
	<tr  class="tox" >
		<td width="16%"> نام شرکت</td>
        <td width="20%"> مبلغ</td>
   
        	
 	</tr>


<?php 
$total=0;
foreach($talabm as $name => $value) {?>
	<tr>
       <td><?Php  echo get_cate_name($name) ?> </td>
       <td ><?Php echo $value.$curr ?></td>
 	</tr>
<?php  
$total+=$value;
}?>
<tr style="background-color:#999">
     <td>مجموع</td>
       <td ><?Php  echo $total.$curr ?> </td>

 	</tr>

</table>
</td>





<td valign="top">

    <table id="datatbl" width="300">


<tr  class="tox" >
		<td colspan="2">قرض مایان متفرقه</td>
</tr>

	
	<tr  class="tox" >
		<td width="16%">نام شرکت</td>
        <td width="20%"> مبلغ</td>
   
        	
 	</tr>


<?php 
$total=0;
foreach($qarzm as $name => $value) {?>
	<tr>
       <td><?Php  echo get_cate_name($name) ?> </td>
       <td ><?Php echo $value.$curr ?></td>
 	</tr>
<?php  
$total+=$value;
}?>

	<tr style="background-color:#999">
     <td>مجموع</td>
       <td ><?Php  echo $total.$curr ?> </td>

 	</tr>
</table>
</td>








</tr>



  
</table>
    
    
    </div>



<?php  theme_include('footer.php'); ?>