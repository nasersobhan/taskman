<?php theme_include('header.php'); global $curr; ?>
<div class="container">
<table id="datatbl" width="1200" >
    
 
    <tr>
   	 <td  colspan="2"><h1>حسابات متفرقه مالی شرکت</h1></td>
 	</tr>
    <tr><td valign="top">



 <table id="datatbl" width="600">
  <tr  class="tox2" >
		<td colspan="6" width="50%">
		
رسیده گی متفرقه		
		
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
		$where = " and mon_eoe='7'";
global $dbase;
$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0 $where ORDER BY mon_time ");
//$result = $dbase->query("SELECT * FROM oil_impexp where stat=0 and date='$dt' $where");
$emon = 0;

while($row = $dbase->fetch_array($result))
  {

 $emon += $row['mon_doller'];



?>

<tr>
		<td ><?Php echo get_cate_name($row['mon_name']) ?></td>
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
        <td  colspan="3" >
کل جمع رسیده گی متفرقه
        </td>   <td  colspan="3" >
        <?php echo $emon.$curr ?>
        </td>
 </tr> 


 
   
</table>

</td>

<td valign="top">

  <table id="datatbl" width="600">
  <tr  class="tox2" >
		<td colspan="6" width="50%">
		
		بردگی متفرقه
		
		 </td>
  
        	
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
		$where = " and (mon_eoe='5')";

$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0 $where ORDER BY mon_time ");
//$result = $dbase->query("SELECT * FROM oil_impexp where stat=0 and date='$dt' $where");
$imon = 0;

while($row = $dbase->fetch_array($result))
  {

 $imon += $row['mon_doller'];



?>

<tr>
		<td ><?Php echo get_cate_name($row['mon_name']) ?></td>
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
        <td  colspan="3" >
کل جمع برده گی متفرقه
        </td>   <td  colspan="3" >
        <?php echo  $imon ?>
        </td>
 </tr> 


 


   
</table>

</td>




    
  
</table></div>
<?php theme_include('footer.php'); ?>
