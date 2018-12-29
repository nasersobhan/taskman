	
<?php
	 theme_include('header.php');
	
        
        global $dbase,$curr;
	
  $sta = is_post('comname');
	  global $curr;
	 foreach ($sta as $stmain) {
		 
			$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0 and mon_name='$stmain' AND mon_eoe!=5 AND mon_eoe!=7");
			$exm=0;$imm=0;
			$exmm=0; $immm=0;
			while($row = $dbase->fetch_array($result))
				{
					
                            
                               if($row['mon_mt']==$curr){
                            
                            if($row['mon_eoe']==1)
					$exm+=$row['mon_doller'];
					elseif($row['mon_eoe']==2)
					$imm+=$row['mon_doller'];
					//elseif($row['eoe']==5)
					//$exmm+=$row['doller'];
					//elseif($row['eoe']==7)
					//$immm+=$row['doller'];
				}
                                }
		
		
//		
//			$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_name='$stmain'");
//			$exo=0;$imo=0;
//			
//			while($row = $dbase->fetch_array($result))
//				{
//					if($row['imp_eoe']==1)
//					$exo+=$row['imp_total'];
//					elseif($row['imp_eoe']==2)
//					$imo+=$row['imp_total'];
//					
//				}
				$type= get_typeof($stmain); //echo $type.': '.$comname .'<br/>' ;
                if($type=='mcompany'){
			$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_m_name='$stmain'");
			$exo=0;$imo=0;
			
			while($row = $dbase->fetch_array($result))
				{
					if($row['imp_eoe']==1)
					$exo+=$row['imp_m_total'];
					elseif($row['imp_eoe']==2)
					$imo+=$row['imp_m_total'];
					
				}
                }         
                   if($type=='ocompany'){            
                                $result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_o_name='$stmain'");
			$exo=0;$imo=0;
			
			while($row = $dbase->fetch_array($result))
				{
					if($row['imp_eoe']==1)
					$exo+=$row['imp_o_total'];
					elseif($row['imp_eoe']==2)
					$imo+=$row['imp_o_total'];
					
				}
                                 }         
                   if($type=='tcompany'){  
                                   $result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_t_cname='$stmain'");
			$exo=0;$imo=0;
			
			while($row = $dbase->fetch_array($result))
				{
					if($row['imp_eoe']==1)
					$exo+=$row['imp_s_total'];
					elseif($row['imp_eoe']==2)
					$imo+=$row['imp_s_total'];
					
				} 
                                
                                
                                }         
                   if($type=='company'){   
                                $result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_name='$stmain'");
			$exo=0;$imo=0;
			
			while($row = $dbase->fetch_array($result))
				{
					if($row['imp_eoe']==1)
					$exo+=$row['imp_s_total'];
					elseif($row['imp_eoe']==2)
					$imo+=$row['imp_s_total'];
					
				}
                   }	
		//$company[$stmain]=($exmm+$exo+$exm)-($immm+$imo+$imm);
		$company[$stmain]=($exo+$exm)-($imo+$imm);
	 }
  
  
  $qarz=array();$talab=array();
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
   	 <td  colspan="4"><h3>بلانس برخی شرکتها </h3>
         
         </td>
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
       <td><?Php  echo get_cate_name($name);echo ' ('.get_comtype($name).')'; ?> </td>
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
       <td><?Php  echo get_cate_name($name);echo ' ('.get_comtype($name).')'; ?></td>
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

/* $result = $dbase->query("SELECT Distinct name FROM sob_money where stat=0  AND (eoe=5 OR eoe=7)");

  while($row = $dbase->fetch_array($result))
  {
	
	$stam[]= $row['name'];  

  }
  
  // $stam = array_unique($stam);*/
   // $stam=array();
	//foreach ($_POST['comname'] as $selectedOption)
    $stam = $_POST['comname'];
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
  
  
  $qarzm=array();$talabm=array();
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
		<th colspan="2">طلب ما متفرقه</th>
</tr>

	
	<tr  class="tox" >
		<th width="16%"> نام شرکت</th>
        <th width="20%"> مبلغ</th>
   
        	
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
		<th colspan="2">قرض مایان متفرقه</th>
</tr>

	
	<tr  class="tox" >
		<th width="16%">نام شرکت</th>
        <th width="20%"> مبلغ</th>
   
        	
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