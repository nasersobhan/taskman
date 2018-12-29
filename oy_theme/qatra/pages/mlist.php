
<?php get_header(); ?>
<div class="content-box">
    <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php echo get_pgtitle() ?></h3></div>
    <div class="panel-body ">    

	
	<table id="datatbl" width="99%" align="center" >
    
    
    <tr >
    <td colspan="8">
    <a class="btn btn-sm btn-info" href="?page=mlist">لیست کامل</a> | <a class="btn btn-sm btn-info" href="?page=mlist&eoe=1">لیست پرداخت</a> | <a class="btn btn-sm btn-info" href="?page=mlist&eoe=2">لیست دریافت</a> | <a class="btn btn-sm btn-info" href="?page=mlist&eoe=5">لیست پرداخت متفرقه</a>
    </td>
    
    </tr>
	<tr>
    <th>نام شرکت</th>
    <th>پول پرداختی</th>
    <th width="70px">قیمت به دالر</th>
    <th width="50px"> دالار </th>
    
    <th width="150px">تاریخ</th>

  
 
   
       <th width="120px"> عملیات</th>
  </tr>

  <?php if(have_post()) { while(have_post()) : the_post();   ?>
  <tr id="<?php mon_id() ?>">

   
  
   <td><a class="viewlink" href="<?php echo HOME."?pg=mexp&edit=".get_mon_id() ?>" target="_blank" data-url="<?php echo HOME."?pg=mexp&view=".get_mon_id() ?> #view" title="go to page"><?Php echo get_cate_name(get_mon_name()) ?></a></td>
  

    

    <td><?Php echo mon_rmoney() ?> <?Php //echo getmon($row['mt']) ?></td>
    <td ><?Php echo mon_rated()  ?></td>
    
    <td ><?Php echo mon_doller() ?></td>

    <td ><?Php echo mon_sdate()  ?></td>
   
   
 
    
    
    
    <?php//if(USER_TYPE==1){ ?>   
  
  <td >
    <form id="del" name="del">
        <input class="btn btn-sm btn-danger"  onclick="javascript: formget(this.form, '<?php echo HOME."?pg=mexp&del=".get_mon_id() ?>'); delet(<?php mon_id() ?>);" name="delete" value="حذف" type="button" />
     </form>
     
    </td>
	<?php //} ?>
    </tr>
        <?php endwhile; } ?> 
<tr>
<td  colspan="8"><?php
//$total_rows = mysql_query("SELECT * FROM money where stat=0 $where");
// //$total_rows = mysql_fetch_row($total_rows);
//  $total_rows = mysql_num_rows($total_rows);
//// $total_rows = $total_rows[0];
//
// $total_pages = $total_rows / $per_page;
// $total_pages = ceil($total_pages); # 19/5 = 3.8 ~=~ 4
//$othx=(isset($_GET['eoe'])?'&eoe='.$_GET['eoe']:'');
//
//$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?page=mlist'.$othx;
// for($i = 1; $i  <= $total_pages; $i++)
// {
//  echo "<a href='$actual_link&p=$i'>$i</a> &nbsp;&nbsp;";
// }
 ?>
    
    
         <?Php
               
                    global $pagin;
                    echo $pagin;
        
                ?>
</td>

</tr>

</table>

<!--<div style=" position:fixed;  top:60px;left:100px;">
<span style="color:#f00; font-size:12px; font-weight:bold;  padding:20px;  width:100px;" name="mess" id="mess"></span>

</div>-->

</div>

</div></div> 

<?php get_footer() ?>