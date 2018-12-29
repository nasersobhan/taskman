<?php
 theme_include('header.php');
	
global $dbase,$curr;

//$result = $dbase->query("SELECT Distinct imp_name FROM sob_impexp where imp_stat=0 and imp_price=0");
//while($row = $dbase->fetch_array($result))
//  {$sta[]= $row['imp_name'];   }
//  $sta = array_unique($sta);
  
    $sta =  cat_2arr_l('company',0,'fa_AF');
  
  $company = array();
  
 
  
  
foreach ($sta as $stmain => $label) {
                        
    $result = $dbase->query("SELECT imp_koo,sum(imp_amount) as onex FROM sob_impexp where imp_eoe=1 and imp_price=0 and  imp_stat=0 and imp_name='$stmain' GROUP BY imp_koo");
                        
        while($row = $dbase->fetch_array($result)){
                $company[$stmain][$row['imp_koo']]['exp']  = $row['onex'];
            }
        $result = $dbase->query("SELECT imp_koo,sum(imp_amount) as onex FROM sob_impexp where imp_eoe=2 and imp_price=0 and  imp_stat=0 and imp_name='$stmain' GROUP BY imp_koo");
             while($row = $dbase->fetch_array($result)){
                $company[$stmain][$row['imp_koo']]['imp']  = $row['onex'];
                }
         }
  
 
		?>

<div class="container">
	
    <table id="datatbl" width="1280" >
    
    
    <tr>
   	 <td  colspan="5"><h1>&#1576;&#1604;&#1575;&#1606;&#1587; &#1585;&#1608;&#1594;&#1606;&#1740;&#1575;&#1578; &#1607;&#1585; &#1588;&#1585;&#1705;&#1578;</h1></td>
 	</tr>
    <tr>
    <td valign="top">




	<tr  class="tox" >
		<th width="16%">نام شرکت</th>
                
                <?php
                 $oiltype =  cat_2arr_l('oiltype',0,'fa_AF');
                foreach($oiltype as $oiltyp){
                    echo '<th width="20%">'.$oiltyp.'</th>';
                }
                ?>
                
       
 	</tr>

<?php 
$total=0;
foreach($company as $imp_name => $value) {?>
	<tr>
       <td><?Php  echo get_cate_name($imp_name) ?> </td>
       
       
       
       <?php 
      $oils =  $company[$imp_name];
      foreach($oiltype as $oilid => $oillable){
          $exp=0;$imp=0;
          echo '<td>';
           if(isset($company[$imp_name][$oilid]['exp']))
           $exp = (isset($company[$imp_name][$oilid]['exp']) ? $company[$imp_name][$oilid]['exp'] : 0 );
           $imp = (isset($company[$imp_name][$oilid]['imp']) ? $company[$imp_name][$oilid]['imp'] : 0 );
          
           $tool = ($exp-$imp);
            echo ($tool > 0 ? $tool .'' : '<span style="color:red">'.str_ireplace('-', '', $tool).' &#1576;&#1575;&#1602;&#1740; </span>');
           echo '</td>';
                   
      }
       
       
       ?>
       
<!--       <td ><?Php 
       
       
       $exp=0;$imp=0;
       if(isset($company[$imp_name]['x1'])){
           if(isset($company[$imp_name]['x1']['exp']))
           $exp = (isset($company[$imp_name]['x1']['exp']) ? $company[$imp_name]['x1']['exp'] : 0 );
           $imp = (isset($company[$imp_name]['x1']['imp']) ? $company[$imp_name]['x1']['imp'] : 0 );
          
           $tool = ($exp-$imp);
            echo ($tool > 0 ? $tool .'' : '<span style="color:red">'.str_ireplace('-', '', $tool).' &#1576;&#1575;&#1602;&#1740; </span>');
           
           
       }else{ ECHO 0;}?></td>
       
        <td ><?Php $exp=0;$imp=0; if(isset($company[$imp_name]['x2'])){
           if(isset($company[$imp_name]['x2']['exp']))
           $exp = (isset($company[$imp_name]['x2']['exp']) ? $company[$imp_name]['x2']['exp'] : 0 );
           $imp = (isset($company[$imp_name]['x2']['imp']) ? $company[$imp_name]['x2']['imp'] : 0 );
            $tool = ($exp-$imp);
            echo ($tool > 0 ? $tool .'' : '<span style="color:red">'.str_ireplace('-', '', $tool).' &#1576;&#1575;&#1602;&#1740; </span>');
           
           
       }else{ ECHO 0;}?></td>
        
        
         <td ><?Php $exp=0;$imp=0; if(isset($company[$imp_name]['x3'])){
           if(isset($company[$imp_name]['x3']['exp']))
           $exp = (isset($company[$imp_name]['x3']['exp']) ? $company[$imp_name]['x3']['exp'] : 0 );
           $imp = (isset($company[$imp_name]['x3']['imp']) ? $company[$imp_name]['x3']['imp'] : 0 );
            $tool = ($exp-$imp);
            echo ($tool > 0 ? $tool .'' : '<span style="color:red">'.str_ireplace('-', '', $tool).' &#1576;&#1575;&#1602;&#1740; </span>');
           
           
       }else{ ECHO 0;}?></td>
         
         
          <td ><?Php $exp=0;$imp=0; if(isset($company[$imp_name]['x100'])){
           if(isset($company[$imp_name]['x100']['exp']))
           $exp = (isset($company[$imp_name]['x100']['exp']) ? $company[$imp_name]['x100']['exp'] : 0 );
           $imp = (isset($company[$imp_name]['x100']['imp']) ? $company[$imp_name]['x100']['imp'] : 0 );
            $tool = ($exp-$imp);
           echo ($tool > 0 ? $tool .'' : '<span style="color:red">'.str_ireplace('-', '', $tool).' &#1576;&#1575;&#1602;&#1740; </span>');
           $exp=0;$imp=0;
           
       }else{ ECHO 0;}?></td>-->

 	</tr>
<?php  
}?>


</table>

</td>

</tr>



  
</table>


</div>
<?php  theme_include('footer.php'); ?>