<?php 
 theme_include('header.php');
	
global $dbase,$curr,$sizetype;

if(isset($_GET['ex'])){
$where = " and mon_eoe='1'";
$type='پرداخت پول به فروشنده';$tee='بردگی از دخل';
}
else{
$where = " and mon_eoe='2'";
$type='دریافت پول از مشتری';;$tee='رسیده بدخل';
}



$result = $dbase->query("SELECT * FROM sob_money where mon_stat=0 and mon_eoe!=5 and mon_date='".date("Y-m-d")."' $where ORDER BY mon_time");?>
	<div class="container">
    <table id="datatbl" width="1280" >
    <tr>
    	<td  colspan="6" style="margin:0; padding:0" width="800px" height="150px">
        
        <div class="repbanner" >&nbsp;=(Development by SobhanSoft)=</div>
        
        </td>
    </tr>
    <tr>
   	 <td  colspan="6"><h1><?php echo $type ?></h1></td>
 	</tr>


    	<tr  class="tox2" >
		<td colspan="3" width="50%">
		
		 <?php echo $tee ?> یوم: 
		
		<?php echo date("l") ?> </td>
      <td colspan="3" width="50%">
		
		تاریخ : 
		
		<?php echo date("Y/m/j")?> </td>
        	
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
		
		
		$emon = 0;
while($row = $dbase->fetch_array($result))
  {
	
$et=$row['mon_eoe'];

$emon="";
$imon="";
	
  
$et==1 ? $emon += $row['mon_doller'] : $imon += $row['mon_doller'];


?>

	<tr>
		<td ><?Php echo $row['mon_name'] ?></td>
        <td ><?Php  echo get_cate_name($row['mon_mt']);?></td>
     <td><?Php  echo $row['mon_doller'].$curr ?> </td>
        <td ><?Php echo $row['mon_rated'];  ?></td>
      
       
        <td ><?Php echo $row['sob_money'] ?></td>
         <td ><?Php echo $row['mon_discription']; ?></td>
 	</tr>
   
	
   	 	
   

<?php



  }
?>



<tr  class="tox"  >
		
       
       <td colspan="3"  >مجموعه پول </td>  
        <td colspan="3" >الباقی</td>

 	</tr>
    <tr class="toxz" >
		
 
      
        <td  colspan="3" ><?php echo ($emon==""? 0 : $emon).$curr ?></td>
  	 	<td  colspan="3"  ><?php echo ($imon==""? 0 : $imon).$curr ?></td>
 	</tr>


        <tr>
		
 
      
        <td  colspan="6" >
        
        آدرس مخزنهای: شاهراه اسلام قلعه نرسیده به پولیس راه شهرک آریانا مقابل باسکول خافی شماره تماس 0792300004  / 0793682700<br />
        
آدرس دفتر مرکزی: شهر نو جاده لیسه مهری کریمیار مارکت منزل سوم اتاق نمبر 31 شماره تماس 0700888833 / 0798233136<br />


</td>
  	 	
 	</tr>

        <tr>
		
 
      
        <td colspan="6" >
 
<span style="text-align:left">Email: info@mrntrading.com | Website: www.mrntrading.com | Phone: 0700888833 / 0798233136</span>
</td>
  	 	
 	</tr>
  




</table>
            
            
</div>
<?php  theme_include('footer.php'); ?>
            