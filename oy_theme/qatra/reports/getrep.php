<?php
 theme_include('header.php');

global $dbase,$curr,$sizetype;


?>
<div class="container">
<table id="datatbl" width="1200" >
    
 
    <tr>
   	 <td  colspan="2">نام مخزن :<?php echo get_cate_name(is_post('imp_st')) ?>  &nbsp;|&nbsp; بین تاریخ های : <?php echo $_POST['year1'].'/'.$_POST['mon1'].'/'.$_POST['day1'].' الی '.$_POST['year2'].'/'.$_POST['mon2'].'/'.$_POST['day2']   ?>   &nbsp;|&nbsp;        			نوع تیل: <?php echo get_cate_name($_POST['imp_koo'])?>				</td>
 	</tr>
    <tr><td valign="top">



 <table id="datatbl" width="600">

	
 
		<tr  class="tox" >
		<th width="30%">تاریخ تخلیه</th>
        <th width="20%">نام شرکت</th>
   	 	<th width="20%">مقدار</th>
        <th width="10%">شماره موتر</th>
        <th width="20%">نام دریور</th>
    

 	</tr>

		<?php
		
		
	
if(isset($_GET['comname']) && $_GET['comname']!="" && !isset($_POST['comname']))
$imp_name=$_GET['comname'];
else
$imp_name=$_POST['comname']; 

$where = "";
$koo=$_POST['imp_koo'];
if(isset($_GET['imp_eoe']) && $_GET['imp_eoe']!="" && !isset($_POST['imp_eoe']))
$imp_eoe=$_GET['imp_eoe'];
else
$imp_eoe=$_POST['imp_eoe'];

$st=$_POST['imp_st'];


if(!$imp_name=="")
$where = " and imp_name='".$imp_name."' ".$where;

if(!$koo=="")
$where = " and imp_koo='".$koo."' ".$where;

if(!$imp_eoe=="")
$where = " and imp_eoe='".$imp_eoe."' ".$where;

if(!$st=="")
$where = " and imp_st='".$st."' ".$where;

$date1 = false; $date2=false;
if(is_post('year1') AND is_post('mon1') AND is_post('day1'))
$date1= jalali_to_gregorian($_POST['year1'],$_POST['mon1'],$_POST['day1'],'-');
if(is_post('year2') AND is_post('mon2') AND is_post('day2'))
$date2= jalali_to_gregorian($_POST['year2'],$_POST['mon2'],$_POST['day2'],'-');

if($date1 AND $date2)
$where = " AND imp_date >=  '$date1' AND imp_date <=  '$date2' ".$where;
if($date1 AND !$date2)
$where = " and imp_date='".$date1."' ".$where;
		
	
//$where = " and imp_eoe='2'";
//if(isset($_GET['dt']))
//$dt=$_GET['dt'];
//else
//$dt = date("Y-m-d");
$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_eoe=2". $where);
//$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and date='$dt' $where");


//echo "SELECT * FROM sob_impexp where imp_stat=0 and imp_eoe=2". $where;
$emon = 0;$imon=0;
while($row = $dbase->fetch_array($result))
  {
	

 $imon += $row['imp_s_amont'];



?>

<tr>
		<td ><?Php echo $row['imp_sdate'] ?></td>
        <td ><?Php  echo get_cate_name($row['imp_name']);?></td>
     <td><?Php  echo $row['imp_s_amont'].$sizetype ?> </td>
        <td ><?Php echo $row['imp_trucknum'];  ?></td>
      
       
        <td ><?Php echo $row['imp_drivername'] ?></td>

 	</tr>
   
   
	
   	 	
   

<?php
  }
?>




     <tr class="toxz" >
        <td  colspan="3" >
        کل جمع تخلیه
        </td>   <td  colspan="3" >
        <?php echo $imon.$sizetype ?>
        </td>
 </tr> 
   
</table>

</td>

<td valign="top">

  <table id="datatbl" width="600">

	
 

		<tr  class="tox" >
		<th width="30%">تاریخ بارگیری</th>
        <th width="20%">نام شرکت</th>
   	 	<th width="20%">مقدار</th>
        <th width="10%">شماره موتر</th>
        <th width="20%">نام دریور</th>

 	</tr>

		<?php
	
$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_eoe=1". $where);
//$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and date='$dt' $where");
$emon = 0;
while($row = $dbase->fetch_array($result))
  {
	

 $emon += $row['imp_s_amont'];



?>

<tr>
	<td ><?Php echo $row['imp_sdate'] ?></td>
          <td ><?Php  echo get_cate_name($row['imp_name']);?></td>
     <td><?Php  echo $row['imp_s_amont'].$sizetype ?> </td>
        <td ><?Php echo $row['imp_trucknum'];  ?></td>
      
       
        <td ><?Php echo $row['imp_drivername'] ?></td>
 	</tr>
   
   
	
   	 	
   

<?php
  }
?>




     <tr class="toxz" >
        <td  colspan="3" >
     کل جمع بارگیری
        </td>   <td  colspan="3" >
        <?php
		
		
		 $txx = $imon-$emon; 
		
		 echo $emon.$sizetype;
		
		 ?>
        </td>
 </tr> 
   
</table>






</td>

</tr>
     <tr class="toxz" >
        <td >
     الباقی به مخزن تیل                            
        </td>   <td   >
        <?php 
		
		
		echo $txx.$sizetype ?>
        </td>
 </tr> 



</table>
    
        </div>



<?php  theme_include('footer.php'); ?>















