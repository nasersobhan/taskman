


<div style=" margin:0 auto; width:99%" >


<p style="color:green">آخرین اطلاعات ذخیره شده <?php echo ($_GET['eoe']==1? EXOIL : IMOIL);?> </p>

<?php 
$nx=$_GET['eoe'];
if($nx!="")
$where =  " and eoe='$nx'";


$per_page = 20; 
$page = 1;

if (isset($_GET['p'])) 
 {
  $page = intval($_GET['p']); 
  if($page < 1) $page = 1;
 }


 $start_from = ($page - 1) * $per_page; 




$result = mysql_query("SELECT * FROM oil_impexp where stat=0 $where ORDER BY creationtime LIMIT $start_from, $per_page");?>
	
	
	<table id="datatbl" width="99%" align="center" >
    
      <tr >
    <td colspan="11">
    <a href="?page=list">لیست کامل</a> | <a href="?page=list&eoe=1">لیست صادر</a> | <a href="?page=list&eoe=2">لیست وارد</a> 
    </td>
    
    </tr>
  
	<tr>
    <th>نام شرکت</th>
    <th>نام دریور</th>
    <th width="70px">نمبر موتر</th>
    <th width="50px"> مقدار </th>
    <th width="50px">قیمت</th>
    <th>مجموع</th>
    <th width="50px">نوع</th>
    <th>تاریخ</th>
    <th>تاریخ ثبت شده</th>
     <th>مخزن</th>
    <th width="180px">وارد شده توسط</th>
     <?php if(USER_TYPE==1){ ?>  <th width="120px"> عملیات</th><?php } ?>
  </tr>
  
    <span style="color:#fff; width:100%; text-align:center; font-weight:bold; background-color:rgba(51,51,51,1) " name="mess" id="mess"></span>
  
   
	<?php
while($row = mysql_fetch_array($result))
  {
?>

  <tr id="<?php echo $row['id']; ?>">
    <td >
      <?php if(USER_TYPE==1){ ?> 
  
 <a href="?page=singleoil&id=<?Php echo $row['id'] ?>" title="go to page"><?Php echo $row['name'] ?></a>
 
 <?php
  }else{
  
  ?>
   <?Php echo $row['name'] ?>
    <?php } ?>
    
    
    
   </td>
    <td><?Php echo $row['drivername'] ?></td>
    <td ><?Php echo $row['trucknum'] ?></td>
    
    <td ><?Php echo $row['amount'].AMT ?></td>
    <td ><?Php echo $row['price'].CURR ?></td>
    <td><?Php echo $row['total'].CURR ?></td>
    <td><?Php echo getkoo($row['koo']) ?></td>
    <td ><?Php echo $row['sdate'] ?></td>
    <td><?Php echo Agotime($row['creationtime']) ?></td>
    <td ><?php st($row['st']) ?></td>
    <td ><?Php getusern($row['user']); ?></td>
  <?php if(USER_TYPE==1){ ?>   
  
  <td >
    <form id="del" name="del">
    <input  onclick="javascript: formget(this.form, 'functions/posts.php?fuc=deloil&id=<?php echo $row['id'] ?>'); delet(<?php echo $row['id'] ?>);" name="delete" value="حذف" type="button" />
     </form>
     
    </td>
	<?php } ?>
    
  </tr>



<?php
  }
?>


<tr>
<td  colspan="12"><?php
$total_rows = mysql_query("SELECT * FROM oil_impexp where stat=0 $where");
 //$total_rows = mysql_fetch_row($total_rows);
  $total_rows = mysql_num_rows($total_rows);
// $total_rows = $total_rows[0];

 $total_pages = $total_rows / $per_page;
 $total_pages = ceil($total_pages); # 19/5 = 3.8 ~=~ 4
$othx=(isset($_GET['eoe'])?'&eoe='.$_GET['eoe']:'');
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?page=list'.$othx;
 for($i = 1; $i  <= $total_pages; $i++)
 {
  echo "<a href='$actual_link&p=$i'>$i</a> &nbsp;&nbsp;";
 }
 ?>
</td>

</tr>
    
</table>



</div>