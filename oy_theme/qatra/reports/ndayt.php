


<?php 



if(isset($_GET['comname']) && $_GET['comname']!="" && !isset($_POST['comname']))
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
$where = " and date='".$date1."' ".$where;




$result = mysql_query("SELECT * FROM money where stat=0 and eoe=5 $where ORDER BY now ");?>
	
    <table id="datatbl" width="500" >
    
    <tr>
    <td>
    
    
    <table>
    <tr>
    	<td  colspan="6" style="margin:0; padding:0" width="800px" height="150px">
        
        <div class="repbanner" >&nbsp;=(Development by SobhanSoft)=</div>
        
        </td>
    </tr>
    <tr>
   	 <td  colspan="6"><h1>لیست پرداخت های متفرقه</h1></td>
 	</tr>



	<tr  class="tox" >
		<td width="30%"> تاریخ بردگی </td>
        <td width="20%"> مقدار</td>
   	 	<td width="20%"> فی</td>
        <td width="20%">مجموع </td>
        <td width="30%">توضیحات </td>
        <td width="20%">توسط</td>
        	
 	</tr>

		<?php
		
		
		$emon = 0;
while($row = mysql_fetch_array($result))
  {
	
$et=$row['eoe'];


	
  
 $emon += $row['doller'];


?>

	<tr>
		<td ><?Php echo $row['sdate'] ?></td>
        <td ><?Php  echo ($et==1? 'پرداخت' : 'دریافت');?></td>
   
        <td ><?Php echo $row['amount'].' '; getmon($row['mt']) ?></td>
        <td><?Php  echo $row['price'].CURR ?> </td>
       
        <td ><?Php echo $row['total'] ?></td>
         <td ><?Php getusern($row['user']); ?></td>
 	</tr>
   
	
   	 	
   

<?php



  }
?>



<tr  class="tox"  >
		
       
       <td colspan="6"  >مجموعه پول پرداخت شده </td>  
    

 	</tr>
    <tr class="toxz" >
		
 
      
        <td  colspan="6" ><?php echo ($emon==""? 0 : $emon).CURR ?></td>
  	 
 	</tr>

</table>


</td>






<td>


</td>






</tr></table>