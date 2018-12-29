<?php	
global $dbase,$curr,$sizetype;

$where='';
$odwhere='';$mdwhere='';
$date1 = false; $date2=false;
if(is_post('year1') AND is_post('mon1') AND is_post('day1'))
$date1= jalali_to_gregorian($_POST['year1'],$_POST['mon1'],$_POST['day1'],'-');
if(is_post('year2') AND is_post('mon2') AND is_post('day2'))
$date2= jalali_to_gregorian($_POST['year2'],$_POST['mon2'],$_POST['day2'],'-');

if($date1 AND $date2){
$odwhere = " imp_date >=  '$date1' AND imp_date <=  '$date2' and ";
$mdwhere = " mon_date >=  '$date1' AND mon_date <=  '$date2' and ";
}
if($date1 AND !$date2){
$odwhere = " imp_date='".$date1."' and ";
$mdwhere = " mon_date='".$date1."' and ";

}

if(is_get('me')=='com'){


$name = is_post('comname');


if($name){
    
      $mwhere = "mon_name='{$name}' and";
    $owhere = "imp_name='{$name}' and";
   $rname = get_cate_name($name);
   
   
}else{
   $mwhere = '';
    $owhere = '';
    $rname ='مشتریان '; 
}

$query = "SELECT sum(imp_s_amont) as tot, count(*) as cou, sum(imp_s_total) as mon from sob_impexp WHERE {$owhere}{$odwhere} imp_eoe=1 and imp_stat=0 ";
 $row =  $dbase->query2arr($query);
 //print_r($row);
 $eful = $row[0]['tot'];
 $ec = $row[0]['cou'];
 $etol= $row[0]['mon'];
 
 
 
 $query = "SELECT sum(imp_s_amont) as tot, count(*) as cou , sum(imp_s_total) as mon from sob_impexp WHERE {$owhere}{$odwhere} imp_eoe=2 and imp_stat=0 ";
 $row =  $dbase->query2arr($query);
 //print_r($row);
 $iful = $row[0]['tot'];
 $ic = $row[0]['cou'];
 $itol= $row[0]['mon'];
 
 
 
  $query = "SELECT sum(mon_doller) as tot, count(*) as cou from sob_money WHERE {$mwhere}{$mdwhere} mon_eoe=1 and mon_stat=0 ";
 $row =  $dbase->query2arr($query);
 $emon = $row[0]['tot'];
 $ecm = $row[0]['cou'];

 
   $query = "SELECT sum(mon_doller) as tot, count(*) as cou from sob_money WHERE {$mwhere}{$mdwhere} mon_eoe=2 and mon_stat=0 ";
 $row =  $dbase->query2arr($query);
 $imon = $row[0]['tot'];
 $icm = $row[0]['cou'];

 ?>
 
خرید  از <?=$rname ?>: <strong class="text-warning"><?php echo $eful.' ('.$ec.' مرتبه) ='.$etol.$curr ?></strong><br/>
 پرداخت شده به <?=$rname ?>: <strong class="text-warning"><?php echo $emon.' ('.$ecm.' مرتبه) ' ?></strong><br/>
<hr/>
 فروش به <?=$rname ?>: <strong class="text-info"><?php echo $iful.' ('.$ic.' مرتبه) ='.$itol.$curr  ?></strong><br/>
  دریافت شده از <?=$rname ?> : <strong class="text-info"><?php echo $imon.' ('.$icm.' مرتبه) ' ?></strong><br/>
 
 <hr/>
 
 
     قابل پرداخت  به <?=$rname ?>: <strong class="text-danger"><?php echo $etol-$imon.$curr ?></strong><br/>
  قابل دریافت از <?=$rname ?> : <strong class="text-success"><?php echo $itol-$emon.$curr ?></strong><br/>
  
  <a href="<?php echo HOME ?>?pg=report&view=moncom&comname=<?php echo $name ?>" target="_blank">  گزارش کل بردوآورد روغنیات به شرکت <?php echo get_cate_name($name) ?>
 
<!-- </a> (<a href="<?php echo HOME ?>?pg=report&view=moncom&comname=<?php echo $name ?>&y1=<?php echo $_POST['year1']?>&m1=<?php echo $_POST['mon1']?>&d1=<?php echo $_POST['day1']?>&y2=<?php echo $_POST['year2']?>&m2=<?php echo $_POST['mon2']?>&d2=<?php echo $_POST['day2']?> " target="_blank">گزارش مخصوص</a>)-->


<?php 

}

if(is_get('me')=='stu'){ 
 $where="";

$name = is_post('name');

             $oiltype =  cat_2arr_l('oiltype',0,'fa_AF');
            foreach($oiltype as $oiltype_id => $oiltype_label){ echo $oiltype_label.' '; ?>:
<strong class="text-info"><?php echo get_total($name,$oiltype_id); ?></strong><br/>
         
            <?php } ?>      
<!--  بردگی تیل : <?php echo $eful.' ('.$ec.' مرتبه) ='.$etol.CURR ?><br/>
  آوردهگی تیل : <?php echo $iful.' ('.$ic.' مرتبه) ='.$itol.CURR  ?><br/>

 

 
 -->
  
  <a href="<?php echo HOME ?>?pg=report&view=moncom&stu=<<?php echo $name ?>" target="_blank">  گزارش کل بردوآورد روغنیات <?php echo get_cate_name($name) ?>
 
<!-- </a> (<a href="<?php echo HOME ?>?pg=report&view=moncom&comname=<<?php echo $name ?>&y1=<?php echo $_POST['year1']?>&m1=<?php echo $_POST['mon1']?>&d1=<?php echo $_POST['day1']?>&y2=<?php echo $_POST['year2']?>&m2=<?php echo $_POST['mon2']?>&d2=<?php echo $_POST['day2']?> " target="_blank">گزارش مخصوص</a>)-->

 
<?php 
  

            }
            
if(is_get('me')=='expimp'){ 
 
 
	$name = is_post('eoe');
        
        
        
        
        
        

    
      $mwhere = "mon_eoe='{$name}' and";
    $owhere = "imp_eoe='{$name}' and";
  

$query = "SELECT sum(imp_s_amont) as tot, count(*) as cou, sum(imp_s_total) as mon from sob_impexp WHERE {$owhere} imp_stat=0 ";
 $row =  $dbase->query2arr($query);
 //print_r($row);
 $eful = $row[0]['tot'];
 $ec = $row[0]['cou'];
 $etol= $row[0]['mon'];
 

 
 
  $query = "SELECT sum(mon_doller) as tot, count(*) as cou from sob_money WHERE {$mwhere} mon_stat=0 ";
 $row =  $dbase->query2arr($query);
 $emon = $row[0]['tot'];
 $ecm = $row[0]['cou'];


        

 
 ?>
 
 
 
 
خرید : <strong class="text-warning"><?php echo $eful.' ('.$ec.' مرتبه) ='.$etol.$curr ?></strong><br/>
  دریافت  : <strong class="text-info"><?php echo $emon.' ('.$ecm.' مرتبه) ' ?></strong><br/>
 
 

<!--  
   فروش  : <strong class="text-info"><?php echo $eful.' ('.$ec.' مرتبه) ='.$itol.$curr  ?></strong><br/>
    پرداخت : <strong class="text-warning"><?php echo $emon.' ('.$ecm.' مرتبه) ' ?></strong><br/>

  -->

  <a href="<?php echo HOME ?>?pg=report&view=moncom&comname=<?php echo $name ?>" target="_blank">  گزارش کل بردوآورد روغنیات  
 
<!-- </a> (<a href="<?php echo HOME ?>?pg=report&view=moncom&comname=<?php echo $name ?>&y1=<?php echo $_POST['year1']?>&m1=<?php echo $_POST['mon1']?>&d1=<?php echo $_POST['day1']?>&y2=<?php echo $_POST['year2']?>&m2=<?php echo $_POST['mon2']?>&d2=<?php echo $_POST['day2']?> " target="_blank">گزارش مخصوص</a>)
 -->
 
<?php } ?>

