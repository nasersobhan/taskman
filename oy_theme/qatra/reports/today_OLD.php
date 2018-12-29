


<?php 



/*if(isset($_GET['comname']) && $_GET['comname']!="" && !isset($_POST['comname']))
$name=$_GET['comname'];
else
$name=$_POST['comname']; 

$where = "";
$koo=$_POST['koo'];
if(isset($_GET['eoe']) && $_GET['eoe']!="" && !isset($_POST['eoe']))
$eoe=$_GET['eoe'];
else
$eoe=$_POST['eoe'];

$st=$_POST['st'];

$date1= jalali_to_gregorian($_POST['year1'],$_POST['mon1'],$_POST['day1'],'-');
$date2= jalali_to_gregorian($_POST['year2'],$_POST['mon2'],$_POST['day2'],'-');

if($_POST['year1']!="" && $_POST['mon1']!="" && $_POST['day1']!="" && $_POST['year2']!="" && $_POST['mon2']!="" && $_POST['day2']!="" )
$where = " AND DATE >=  '$date1' AND DATE <=  '$date2' ".$where;


if(!$name=="")
$where = " and name='".$name."' ".$where;

if(!$koo=="")
$where = " and koo='".$koo."' ".$where;



if(!$st=="")
$where = " and st='".$st."' ".$where;

if(!$_POST['year1']=="" && $_POST['year2']=="" )
$where = " and date='".$date1."' ".$where;*/


	


//$result = mysql_query("SELECT * FROM money where stat=0 and eoe=5 $where ORDER BY id DESC ");?>
	
    <table id="datatbl" width="1200" >
        <tr>
    	<td  colspan="2" style="margin:0; padding:0" width="800px" height="150px">
        
        <div class="repbanner" >&nbsp;=(Development by SobhanSoft)=</div>
        
        </td>
    </tr>
    <tr>
   	 <td  colspan="2"><h1> لیست خریداری و فروش روغنیات</h1></td>
 	</tr>
    <tr>
    <td>
    
    
    <table width="600">

    	<tr  class="tox2" >
		<td colspan="4" width="50%">
		
		 خریداری یوم: 
		
		<?php echo jdate("l") ?> </td>
      <td colspan="4" width="50%">
		
		تاریخ : 
		
		<?php echo jdate("Y/m/j")?> </td>
        	
 	</tr>

	<tr  class="tox" >
 
		<td width="30%">نام فروشنده </td>
        <td width="20%">نوع تیل</td>
   	 	<td width="20%">نوع مخزن</td>
        <td width="10%">مقدار</td>
        <td width="20%">نام دریور</td>
        <td width="40%">شماره موتر</td>
         <td width="20%">فی</td>
        <td width="40%">مجموع</td>	
 	</tr>

		<?php
		
		$where = " and eoe='1'";
$dt = date("Y-m-d");
  $result = mysql_query("SELECT Distinct st FROM oil_impexp where stat=0 and date='$dt' $where");
		 $am = 0;
  $mo = 0;
while($row = mysql_fetch_array($result))
  {
	
$et=$row['eoe'];


	
  
 $am += $row['amount'];
  $mo += $row['total'];


?>

	<tr>
		<td ><?Php echo $row['name'] ?></td>
        <td ><?Php  echo getkoo($row['koo']);?></td>
     <td><?Php  echo st($row['st']) ?> </td>
        <td ><?Php echo $row['amount'].AMT;  ?></td>
      
       
        <td ><?Php echo $row['drivername'] ?></td>
         <td ><?Php echo $row['trucknum']; ?></td>
          <td ><?Php echo $row['price'] ?></td>
         <td ><?Php echo $row['total']; ?></td>
 	</tr>
   
	
   	 	
   

<?php



  }
?>




     <tr class="toxz" >
        <td  colspan="8" >
        <table width="100%" style=" margin:0; padding:0;">
        <tr>
        <th> تیل به مخزن</th>
        <th>مقدار تیل</th>
        </tr>
        
  	 	
       <?php 

  $result = mysql_query("SELECT Distinct st FROM oil_impexp where stat=0 and date='$dt' $where");

  while($row = mysql_fetch_array($result))
  {
	  $i++;
	$sta[$i]= $row['st'];  

  }
 
    foreach ($sta as $stmain) {
		echo '<tr>';
	$result = mysql_query("SELECT Distinct st FROM oil_impexp where stat=0 and date='$dt' and st='$stmain' $where");

 	 while($row = mysql_fetch_array($result))
  		{
			$stx=$row['st'];
			$result = mysql_query("SELECT sum(amount) FROM oil_impexp where stat=0 and date='$dt' and st='$stx' $where");
			$amt = mysql_fetch_array($result);
			echo '<td>';
	 		echo st($row['st']); 
			echo '</td>';
			echo '<td>';
	 		echo $amt[0].AMT; 
			echo '</td>';
  		}
		echo '</tr>';
     // echo "$value\n";
    }

  
  ?></table>  </td>
   </tr> 
    <tr  class="tox"  >
		
       
       <td colspan="4"  >مجموعه قابل دریافت </td>  
        <td colspan="4" >مجموع فروشات امروز</td>

 	</tr>
    <tr class="toxz" >
		
 
      
        <td  colspan="4" ><?php echo $mo.CURR ?></td>
  	 	<td  colspan="4"  ><?php echo $am.AMT ?></td>
 	</tr>
    


 
 
</table>


</td>






<td>


 <table id="datatbl" width="600" >






    	<tr  class="tox2" >
		<td colspan="4" width="50%">
		
		 فروشات یوم: 
		
		<?php echo jdate("l") ?> </td>
      <td colspan="4" width="50%">
		
		تاریخ : 
		
		<?php echo jdate("Y/m/j")?> </td>
        	
 	</tr>

	<tr  class="tox" >
 
		<td width="30%">نام فروشنده </td>
        <td width="20%">نوع تیل</td>
   	 	<td width="20%">نوع مخزن</td>
        <td width="10%">مقدار</td>
        <td width="20%">نام دریور</td>
        <td width="40%">شماره موتر</td>
         <td width="20%">فی</td>
        <td width="40%">مجموع</td>	
 	</tr>

		<?php
		
			$where = " and eoe='2'";
$dt = date("Y-m-d");
  $result = mysql_query("SELECT Distinct st FROM oil_impexp where stat=0 and date='$dt' $where");
		 $am = 0;
  $mo = 0;
while($row = mysql_fetch_array($result))
  {
	
$et=$row['eoe'];
 $am += $row['amount'];
  $mo += $row['total'];


?>

	<tr>
		<td ><?Php echo $row['name'] ?></td>
        <td ><?Php  echo getkoo($row['koo']);?></td>
     <td><?Php  echo st($row['st']) ?> </td>
        <td ><?Php echo $row['amount'].AMT;  ?></td>
      
       
        <td ><?Php echo $row['drivername'] ?></td>
         <td ><?Php echo $row['trucknum']; ?></td>
          <td ><?Php echo $row['price'] ?></td>
         <td ><?Php echo $row['total']; ?></td>
 	</tr>
   
	
   	 	
   

<?php



  }
?>




     <tr class="toxz" >
        <td  colspan="8" >
        <table width="100%" style=" margin:0; padding:0;">
        <tr>
        <th> تیل به مخزن</th>
        <th>مقدار تیل</th>
        </tr>
        
  	 	
       <?php 

  $result = mysql_query("SELECT Distinct st FROM oil_impexp where stat=0 and date='$dt' $where");

  while($row = mysql_fetch_array($result))
  {
	  $i++;
	$sta[$i]= $row['st'];  

  }
 
    foreach ($sta as $stmain) {
		echo '<tr>';
	$result = mysql_query("SELECT Distinct st FROM oil_impexp where stat=0 and date='$dt' and st='$stmain' $where");

 	 while($row = mysql_fetch_array($result))
  		{
			$stx=$row['st'];
			$result = mysql_query("SELECT sum(amount) FROM oil_impexp where stat=0 and date='$dt' and st='$stx' $where");
			$amt = mysql_fetch_array($result);
			echo '<td>';
	 		echo st($row['st']); 
			echo '</td>';
			echo '<td>';
	 		echo $amt[0].AMT; 
			echo '</td>';
  		}
		echo '</tr>';
     // echo "$value\n";
    }

  
  ?></table>  </td>
   </tr> 
    <tr  class="tox"  >
		
       
       <td colspan="4"  >مجموعه قابل دریافت </td>  
        <td colspan="4" >مجموع فروشات امروز</td>

 	</tr>
    <tr class="toxz" >
		
 
      
        <td  colspan="4" ><?php echo $mo.CURR ?></td>
  	 	<td  colspan="4"  ><?php echo $am.AMT ?></td>
 	</tr>
    
</table>


</td>






</tr></table>