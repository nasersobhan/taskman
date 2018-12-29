<?php
 theme_include('header.php');
 global $dbase,$curr,$sizetype; $amt=$sizetype;
 ?>

<style media="print">
    @media print
   {

@page {
  size: A4 landscape;
}
   }
    
</style>
<div class="prvday">
<a style="color:#fff" href="?<?php echo HOME ?>?pg=report&view=man&y=<?php echo $_GET['y'] ?>&m=<?php echo $_GET['m'] ?>&d=<?php echo $_GET['d']-1 ?>">روز قبل</a>

</div>

<div class="nextday">
<a style="color:#fff" href="<?php echo HOME ?>?pg=report&view=man&y=<?php echo $_GET['y'] ?>&m=<?php
echo $_GET['m'] ?>&d=<?php echo $_GET['d']+1 ?>">روز بعد</a>

</div>
<div class="container" style="margin-top: 40px;">
<table id="datatbl" width="1200" >
    
  
    <tr>
   	 <td  colspan="2"><h1>حسابات کلی روزانه<?php echo is_post('comname');//$_POST['comname']?></h1></td>
 	</tr>
    <tr><td valign="top">



 <table id="datatbl" width="600">
  <tr  class="tox2" >
		<td colspan="4" width="50%">
		
		 خریداری یوم:

		<?php
		//$sdate= gregorian_to_jalali($_GET['y'],$_GET['m'],$_GET['d'],'/');

		
                   $date = new jDateTime(true, true, 'Asia/kabul');
		//$smon_imp_date= gregorian_to_jalali($_GET['y'],$_GET['m'],$_GET['d'],'/');
		 $re = $date->toJalali(is_get('y'),is_get('m'),is_get('d')); 
                               $time =  $date->mktime(0,0,0,$re[1],$re[2],$re[0]);
                             $sdate= $date->date("Y/m/d", $time);
                
                
                
                $date1=$_GET['y'].'-'.$_GET['m'].'-'.$_GET['d'];
		
		
		if(isset($_GET['y']))
$dt=$date1;
else
$dt = date("Y-m-d");
	$jdate = (date("l",mktime(0, 0, 0, $_GET['m'], $_GET['d'], $_GET['y'])));

		echo $jdate;
		
	        ?> </td>
      <td colspan="4" width="50%">

		تاریخ :

	       	<?php echo $sdate?> </td>

 	</tr>

	<tr  class="tox" >

		<th width="30%">نام فروشنده </th>
        <th width="20%">نوع تیل</th>
   	 	<th width="20%">نوع مخزن</th>
        <th width="10%">مقدار</th>
        <th width="20%">نام دریور</th>
        <th width="40%">شماره موتر</th>
         <th width="20%">فی</th>
        <th width="40%">مجموع</th>
 	</tr>

		<?php
		$where = " and imp_eoe='2'";

$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_date='$dt' $where");
		 $am = 0;
  $mo = 0;
while($row = $dbase->fetch_array($result))
  {

$et=$row['imp_eoe'];




 $am += $row['imp_amount'];
  $mo += $row['imp_total'];


?>

	<tr>
		<td ><?Php echo get_cate_name($row['imp_name']) ?></td>
        <td ><?Php  echo get_cate_name($row['imp_koo']);?></td>
     <td><?Php  echo get_cate_name($row['imp_st']) ?> </td>
        <td ><?Php echo $row['imp_amount'].$amt;  ?></td>


        <td ><?Php echo $row['imp_drivername'] ?></td>
         <td ><?Php echo $row['imp_trucknum']; ?></td>
          <td ><?Php echo $row['imp_price'] ?></td>
         <td ><?Php echo $row['imp_total']; ?></td>
 	</tr>





<?php
  }
?>




     <tr class="toxz" >
        <td  colspan="8" >

     <table width="100%" imp_style=" margin:0; padding:0;">
        <tr>
        <th> تیل به مخزن</th>
        <th>مقدار تیل</th>
        </tr>


       <?php

  $result = $dbase->query("SELECT Distinct imp_st FROM sob_impexp where imp_stat=0 and imp_date='$dt' $where");

//  while($row = $dbase->fetch_array($result))
//  {
//	  $i++;
//	$imp_sta[$i]= $row['imp_st'];
//
//  }
//  
  
//    $imp_sta =  cat_2arr_l('house',0,'fa_AF');
//            foreach($oild as $id => $label){
//                 echo '<option value="'.$id.'">'.$label.'</option>';   
//            }
  
  
            // $imp_sta=array_unique($imp_sta); 
  //  foreach ($imp_sta as $imp_stmain) {
		
	$result = $dbase->query("SELECT imp_st,sum(imp_amount) as totalx FROM sob_impexp where imp_stat=0 and imp_date='$dt'  $where group by imp_st");

 	 while($row = $dbase->fetch_array($result))
  		{
		echo '<tr>';	
             $imp_stx=$row['imp_st'];
			//$result = $dbase->query("SELECT sum(imp_amount) FROM sob_impexp where imp_stat=0 and imp_date='$dt' and imp_st='$imp_stx' $where");
			$amt = $row['totalx'];;
			echo '<td>';
	 		echo get_cate_name($row['imp_st']);
			echo '</td>';
			echo '<td>';
	 		echo $amt;
			echo '</td>';
                        echo '</tr>';
  		}
		
     // echo "$value\n";
   // }


  ?></table>
        
        
   
        
        
        
        
        
        
        
        
        
        
        </td>
 </tr>
    <tr  class="tox"  >


       <th colspan="4"  >مجموعه قابل پرداخت </th>
        <th colspan="4" >مجموع خریداری امروز</th>

 	</tr>
    <tr class="toxz" >

        <td  colspan="4" ><?php echo $mo.$curr ?></td>
  	 	<td  colspan="4"  ><?php echo $am.$amt ?></td>
 	</tr>
</table>

</td>

<td valign="top">

     <table id="datatbl" width="600">
  <tr  class="tox2" >
		<td colspan="4" width="50%">

		 فروشات یوم:

		<?php echo $jdate; ?> </td>
      <td colspan="4" width="50%">

		تاریخ :

	       <?php echo $sdate?></td>

 	</tr>

	<tr  class="tox" >

		<th width="30%">نام خریدار </th>
        <th width="20%">نوع تیل</th>
   	 	<th width="20%">نوع مخزن</th>
        <th width="10%">مقدار</th>
        <th width="20%">نام دریور</th>
        <th width="40%">شماره موتر</th>
         <th width="20%">فی</th>
        <th width="40%">مجموع</th>
 	</tr>

		<?php

$where = " and imp_eoe='1'";


  $result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_date='$dt' $where");
		 $am = 0;
  $mo = 0;
while($row = $dbase->fetch_array($result))
  {

$et=$row['imp_eoe'];




 $am += $row['imp_amount'];
  $mo += $row['imp_total'];


?>

	<tr>
		<td ><?Php echo get_cate_name($row['imp_name']) ?></td>
        <td ><?Php  echo get_cate_name($row['imp_koo']);?></td>
     <td><?Php  echo get_cate_name($row['imp_st']) ?> </td>
        <td ><?Php echo $row['imp_amount'].$amt;  ?></td>


        <td ><?Php echo $row['imp_drivername'] ?></td>
         <td ><?Php echo $row['imp_trucknum']; ?></td>
          <td ><?Php echo $row['imp_price'] ?></td>
         <td ><?Php echo $row['imp_total']; ?></td>
 	</tr>





<?php



  }
?>




     <tr class="toxz" >
        <td  colspan="8" >
        <table width="100%" imp_style=" margin:0; padding:0;">
        <tr>
        <th> تیل به مخزن</th>
        <th>مقدار تیل</th>
        </tr>


       <?php

  $result = $dbase->query("SELECT Distinct imp_st FROM sob_impexp where imp_stat=0 and imp_date='$dt' $where");
$i=0;$imp_sta=array();
  while($row = $dbase->fetch_array($result))
  {
	  $i++;
	$imp_sta[$i]= $row['imp_st'];

  }
   $imp_sta=array_unique($imp_sta);



    foreach ($imp_sta as $imp_stmain) {
		echo '<tr>';
	$result = $dbase->query("SELECT Distinct imp_st FROM sob_impexp where imp_stat=0 and imp_date='$dt' and imp_st='$imp_stmain' $where");

 	 while($row = $dbase->fetch_array($result))
  		{
			$imp_stx=$row['imp_st'];
			$result = $dbase->query("SELECT sum(imp_amount) FROM sob_impexp where imp_stat=0 and imp_date='$dt' and imp_st='$imp_stx' $where");
			$amt = $dbase->fetch_array($result);
			echo '<td>';
	 		echo get_cate_name($row['imp_st']);
			echo '</td>';
			echo '<td>';
	 		echo $amt[0]; 
			echo '</td>';
  		}
		echo '</tr>';
     // echo "$value\n";
    }

  
  ?></table>  </td>
   </tr> 
    <tr  class="tox"  >
		
       
       <th colspan="4"  >مجموعه قابل دریافت </th>  
        <th colspan="4" >مجموع فروشات امروز</th>

 	</tr>
    <tr class="toxz" >
		
 
      
        <td  colspan="4" ><?php echo $mo.$curr ?></td>
  	 	<td  colspan="4"  ><?php echo $am ?></td>
 	</tr>
    



</table>

</td>




     
  
</table>
</div>

<?php
 theme_include('footer.php');
 
 ?>