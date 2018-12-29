<?php
 theme_include('header.php');
 global $dbase,$curr,$sizetype;
 ?>


<div class="prvday">
<a style="color:#fff" href="<?php echo HOME ?>?pg=report&view=man2&y=<?php echo $_GET['y'] ?>&m=<?php echo $_GET['m'] ?>&d=<?php echo $_GET['d']-1 ?>">روز قبل</a>

</div>

<div class="nextday">
<a style="color:#fff" href="<?php echo HOME ?>?pg=report&view=man2&y=<?php echo $_GET['y'] ?>&m=<?php
echo $_GET['m'] ?>&d=<?php echo $_GET['d']+1 ?>">روز بعد</a>

</div>

<div class="container" style="margin-top: 40px;">

<table id="datatbl" width="1200" >
    
        
    <tr>
   	 <th  colspan="2"><h1>حسابات مالی شرکت</h1></th>
 	</tr>
    <tr><td valign="top">



 <table id="datatbl" width="600">
  <tr  class="tox2" >
		<td colspan="3" width="50%">
		
		 رسیده بدخل یوم: 
		
		<?php 
                $date = new jDateTime(true, true, 'Asia/kabul');
		//$smon_date= gregorian_to_jalali($_GET['y'],$_GET['m'],$_GET['d'],'/');
		 $re = $date->toJalali(is_get('y'),is_get('m'),is_get('d')); 
                               $time =  $date->mktime(0,0,0,$re[1],$re[2],$re[0]);
                             $smon_date= $date->date("Y/m/d", $time);
		//$smon_date= jalali_to_gregorian($_POST['y'],$_POST['m'],$_POST['d'],'/');
		$mon_date1=$_GET['y'].'-'.$_GET['m'].'-'.$_GET['d'];
		if(isset($_GET['y']))
$dt=$mon_date1;
else
$dt = date("Y-m-d");
		
		$jmon_date = (date("l",mktime(0, 0, 0, $_GET['m'], $_GET['d'], $_GET['y'])));
		
		echo $jmon_date;
		?> </td>
      <td colspan="3" width="50%">
		
		تاریخ : 
		
		<?php echo $smon_date?> </td>
        	
 	</tr>

	
 
		<tr  class="tox" >
		<th width="30%">نام مشتری </th>
        <th width="20%">نوع پول</th>
   	 	<th width="20%">مبلغ</th>
        <th width="10%">تبادله</th>
        <th width="20%">مبلغ اصلی</th>
        <th width="40%">توضیحات</th>

 	</tr>

		<?php
		$where = " and (mon_eoe='2' OR mon_eoe='7')";

$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0 and mon_date='$dt' $where ORDER BY mon_time ");
//$result = $dbase->query("SELECT * FROM oil_impexp where mon_stat=0 and mon_date='$dt' $where");
$emon = 0;
$mem = 0;
$maem = 0;
while($row = $dbase->fetch_array($result))
  {
	if($row['mon_eoe']==2)
		$mem=$mem+$row['mon_doller'];
	else
		$maem= $maem+$row['mon_doller'];

 $emon += $row['mon_doller'];



?>

<tr>
		<td ><?Php echo $row['mon_name'] ?></td>
        <td ><?Php  echo get_cate_name($row['mon_mt']);?></td>
     <td><?Php  echo $row['mon_doller'].$curr ?> </td>
        <td ><?Php echo $row['mon_rated'];  ?></td>
      
       
        <td ><?Php echo $row['mon_rmoney'] ?></td>
         <td ><?Php echo $row['mon_discription']; ?></td>
 	</tr>
   
   
	
   	 	
   

<?php
  }
?>

<tr class="toxz" >
        <th  colspan="3" >
کل جمع رسیده گی متفرقه
        </th>   <th  colspan="3" >
        <?php echo $maem.$curr ?>
        </th>
 </tr> 


 <tr class="toxz" >
        <th  colspan="3" >
کل جمع رسیده گی 
        </th>   <th  colspan="3" >
        <?php echo $mem.$curr ?>
        </th>
 </tr> 



     <tr class="toxz" >
        <th  colspan="3" >
        مجموع رسیده گی
        </th>   <th  colspan="3" >
        <?php echo $emon.$curr ?>
        </th>
 </tr> 
   
</table>

</td>

<td valign="top">

  <table id="datatbl" width="600">
  <tr  class="tox2" >
		<th colspan="3" width="50%">
		
		 بردگی از دخل یوم: 
		
		<?php echo $jmon_date; ?> </th>
      <th colspan="3" width="50%">
		
		تاریخ : 
		
		<?php echo $smon_date?> </th>
        	
 	</tr>

	
 
		<tr  class="tox" >
		<th width="30%">نام فروشنده </th>
        <th width="20%">نوع پول</th>
   	 	<th width="20%">مبلغ</th>
        <th width="10%">تبادله</th>
        <th width="20%">مبلغ اصلی</th>
        <th width="40%">توضیحات</th>

 	</tr>

		<?php
		$where = " and (mon_eoe='1' OR mon_eoe='5')";

$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0 and mon_date='$dt' $where ORDER BY mon_time ");
//$result = $dbase->query("SELECT * FROM oil_impexp where mon_stat=0 and mon_date='$dt' $where");
$imon = 0;
$mim=0;$maim=0;
while($row = $dbase->fetch_array($result))
  {
	
	if($row['mon_eoe']==5)
		$mim=$mim+$row['mon_doller'];
	else
		$maim= $maim+$row['mon_doller'];

 $imon += $row['mon_doller'];



?>

<tr>
		<td ><?Php echo $row['mon_name'] ?></td>
        <td ><?Php  echo get_cate_name($row['mon_mt']);?></td>
     <td><?Php  echo $row['mon_doller'].$curr ?> </td>
        <td ><?Php echo $row['mon_rated'];  ?></td>
      
       
        <td ><?Php echo $row['mon_rmoney'] ?></td>
         <td ><?Php echo $row['mon_discription']; ?></td>
 	</tr>
   
   
	
   	 	
   

<?php
  }
?>

 <tr class="toxz" >
        <th  colspan="3" >
کل جمع برده گی متفرقه
        </th>   <th  colspan="3" >
        <?php echo $mim.$curr ?>
        </th>
 </tr> 


 <tr class="toxz" >
        <th  colspan="3" >
کل جمع برده گی 
        </th>   <th  colspan="3" >
        <?php echo $maim.$curr ?>
        </th>
 </tr> 


     <tr class="toxz" >
        <th  colspan="3" >
مجموع برده گی
        </th>   <th  colspan="3" >
        <?php echo $imon.$curr ?>
        </th>
 </tr> 
   
</table>

</td>



 <tr>
<td  colspan="2" >
الباقی : <?php

//echo getsafemon().$curr; ?>
</td>
</tr>

   
  
</table>
    
</div>
<?php
 theme_include('footer.php');
 
 ?>