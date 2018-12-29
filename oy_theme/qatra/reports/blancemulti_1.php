<?php
 theme_include('header.php');

global $dbase,$curr;

//print_r(allcoms());

$tbl = TBL_PIX.'categories_oy';
          $companies = $dbase->tbl2array($tbl, 'cat_id', 'cat_name',  " WHERE (cat_type='company' OR cat_type='mcompany' OR cat_type='ocompany' OR cat_type='tcompany') order by cat_id DESC");


	 foreach ($companies as $comid => $comname) {
             
             $mon1=array();
             
             $result = $dbase->query("SELECT mon_mt,sum(mon_rmoney) as moneyx FROM sob_money where mon_stat=0 AND mon_eoe =1 and mon_name='$comid' group by mon_mt");
             while($rec = $dbase->fetch_assoc($result))
            {
               //  $mon1['eoe'] = 1;
                // $mon1[1] = $rec['mon_mt'];
                // $mon1[$rec['mon_mt']][1]['rmon']=0;
                 $mon1[$rec['mon_mt']][1]['rmon'] =   $rec['moneyx'];
             }
             
         $result2 = $dbase->query("SELECT mon_mt,sum(mon_rmoney) as moneyx FROM sob_money where mon_stat=0 AND mon_eoe =2 and mon_name='$comid' group by mon_mt");
             while($rec2 = $dbase->fetch_assoc($result2))
            {
               //  $mon1['eoe'] = 1;
                // $mon1[2]['mt'] = $rec['mon_mt'];
                // $mon1[$rec2['mon_mt']][2]['rmon']=0;
                 $mon1[$rec2['mon_mt']][2]['rmon'] =   $rec2['moneyx'];
             }

		$result3 = $dbase->query("SELECT mon_mt,sum(mon_rmoney) as moneyx FROM sob_money where mon_stat=0 AND mon_eoe =5 and mon_name='$comid' group by mon_mt");
             while($rec3 = $dbase->fetch_assoc($result3))
            {
               //  $mon1['eoe'] = 1;
                // $mon1[5]['mt'] = $rec['mon_mt'];
                // $mon1[$rec3['mon_mt']][5]['rmon']=0;
                 $mon1[$rec3['mon_mt']][5]['rmon'] =   $rec3['moneyx'];
             }
		
             
             
             $result4 = $dbase->query("SELECT mon_mt,sum(mon_rmoney) as moneyx FROM sob_money where mon_stat=0 AND mon_eoe =7 and mon_name='$comid' group by mon_mt");
             while($rec4 = $dbase->fetch_assoc($result4))
            {
               //  $mon1['eoe'] = 1;
                // $mon1[7]['mt'] = $rec['mon_mt'];
                // $mon1[$rec4['mon_mt']][7]['rmon']=0;
                 $mon1[$rec4['mon_mt']][7]['rmon'] =   $rec4['moneyx'];
             }

		$type= get_typeof($comid); //echo $type.': '.$comname .'<br/>' ;
                if($type=='mcompany'){
			$result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_m_name='$comid'");
			$exo=0;$imo=0;
			
			while($row = $dbase->fetch_array($result))
				{
					//if($row['imp_eoe']==1)
					//$exo+=$row['imp_m_total'];
					if($row['imp_eoe']==2)
					$imo+=$row['imp_m_total'];
					
				}
                            }         
                   if($type=='ocompany'){            
                                $result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_o_name='$comid'");
			$exo=0;$imo=0;
			
			while($row = $dbase->fetch_array($result))
				{
					//if($row['imp_eoe']==1)
					//$exo+=$row['imp_o_total'];
					if($row['imp_eoe']==2)
					$imo+=$row['imp_o_total'];
					
				}
                                 }         
                   if($type=='tcompany'){  
                                   $result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_t_cname='$comid'");
			$exo=0;$imo=0;
			
			while($row = $dbase->fetch_array($result))
				{
					//if($row['imp_eoe']==1)
					//$exo+=$row['imp_t_total'];
					if($row['imp_eoe']==2)
					$imo+=$row['imp_t_total'];
					
				} 
                                
                                
                                }         
                   if($type=='company'){   
                                $result = $dbase->query("SELECT * FROM sob_impexp where imp_stat=0 and imp_name='$comid'");
			$exo=0;$imo=0;
			
			while($row = $dbase->fetch_array($result))
				{
					if($row['imp_eoe']==1)
					$exo+=$row['imp_s_total'];
					elseif($row['imp_eoe']==2)
					$imo+=$row['imp_s_total'];
					
				}
                   }	
		//$company[$stmain]=($exmm+$exo+$exm)-($immm+$imo+$imm);
                //   print_r($mon1);
              $curr = get_setting('currency');     
            $oild =  cat_2arr_l('currency',0,'fa_AF');
             foreach($oild as $id => $val){
                 
                        if(!isset($mon1[$id][2]['rmon'])){
                             $mon1[$id][2]['rmon']=0;
                         }
                         if(!isset($mon1[$id][1]['rmon'])){
                               $mon1[$id][1]['rmon']=0;
                         }
                         if(!isset($mon1[$id][5]['rmon'])){
                               $mon1[$id][5]['rmon']=0;
                         }
                         if(!isset($mon1[$id][7]['rmon'])){
                               $mon1[$id][7]['rmon']=0;
                         }
             }
            
            
            
//            if(!isset($mon1[2])){
//                    // $mon1[2]=0;
//                     $mon1['mt'][2]['rmon']=0;
//                 }elseif(!isset($mon1[1])){
//                      // $mon1[1]['mt']=0;
//                       $mon1['mt'][1]['rmon']=0;
//                 }elseif(!isset($mon1[5])){
//                       //$mon1[5]['mt']=0;
//                       $mon1['mt'][5]['rmon']=0;
//                 }elseif(!isset($mon1[7])){
//                      // $mon1[7]['mt']=0;
//                       $mon1['mt'][7]['rmon']=0;
//                 }
//                 
                 
               // print_r($mon1);
               $mon[$id]=0;$allcoms[$comid][$id]=0;
            foreach($oild as $id => $val){
                $mon[$id]=0;$allcoms[$comid][$id]=0;
                $company=array();
          
                if($id==$curr){
                   
                   $mon[$id] = (($mon1[$id][2]['rmon'])+$imo+($mon1[$id][7]['rmon']))-($mon1[$id][1]['rmon']+$exo+($mon1[$id][5]['rmon'])); //($exo+$exm)-(($mon7[$id]+$mon2[$id])-($mon1[$id]+$mon5[$id]));
                }else{
                   $mon[$id] =(($mon1[$id][2]['rmon'])+($mon1[$id][7]['rmon'])) - (($mon1[$id][1]['rmon'])+($mon1[$id][5]['rmon'])); //(($mon7[$id]+$mon2[$id])-($mon1[$id]+$mon5[$id]));   
                }
                
                 //if(array_fill(0,count($mon),0) !== array_values($mon)){
                            $allcoms[$comid][$id] = $mon[$id];    
                 //}
                
            }
            
            
            
//               if(array_fill(0,count($mon),0) !== array_values($mon)){
//  
//                        if($mon[$id] > 0)
//                            $qarz[$comid][$id] = $mon[$id];
//                        else
//                            $talab[$comid][$id] = $mon[$id];    
//                 }
         }
                   
		//$company[$stmain]=($exo+$exm)-($imo+$imm);
	
  
  
//  
//  foreach ($company as $name => $value) {
//		
//		
//		if($value < 0)
//		$qarz[$name]=abs ($value);
//		elseif($value > 0)
//		$talab[$name]=abs ($value);
//		
//
//	 }
  //print_r($allcoms);
		?>


<div class="container">	
   

        <table id="datatbl" width="1000">
            <tr>
                <td class="title" colspan="5"><h1>بلاکس کلی شرکتها نظر به نوع پول</h1></td>
            </tr>
             <tr  class="tox" >
                <th width="16%">نام شرکت</th>

                <?php
                $oild = cat_2arr_l('currency', 0, 'fa_AF');$total = array();
                foreach($oild as $id =>$val){
                    $total[$id]=0;
                     $total2[$id]=0;
                    echo '<th>' . get_cate_name($val) . '</th>';
                }
                ?>
                
                 <?php
                //$oild = cat_2arr_l('currency', 0, 'fa_AF');$total = array();
//                foreach($oild as $id =>$val){
//                    $total[$id]=0;
//                     $total2[$id]=0;
//                    echo '<td>' . get_cate_name($val) . '</td>';
//                }
                ?>
            </tr>
            
<!--            <tr  class="tox" >
                <td colspan="4" class="bg-success">طلب ما</td>
                 <td colspan="4" class="bg-danger">قرض ما</td>
            </tr>-->

           

            <?php
            //$total = array(); // $oild =  cat_2arr_l('currency',0,'fa_AF');
            foreach($allcoms as $comid => $value){
         
                if(array_fill(0,count($allcoms[$comid]),0) !== array_values($allcoms[$comid])){
  

                ?>



                <tr>
                    <td><?Php echo get_cate_name($comid);
                echo ' (' . get_comtype($comid) . ')'; ?> </td>

                    <?php
                  // $allcoms[$comid]['qar'];
                    
                    foreach($oild as $id => $valuex){
                          
                        if(isset($allcoms[$comid][$id])){
                            
                            if($allcoms[$comid][$id] > 0){
                                 echo '<td class="bg-danger">' . ' طلب مایان: ' . abs($allcoms[$comid][$id]) . '</td>';
                             // $total[$id] += $allcoms[$comid][$id];
                            }elseif($allcoms[$comid][$id] < 0){
                            
                                echo '<td class="bg-success">' . ' طلب شرکت: ' . abs($allcoms[$comid][$id]) . '</td>';
                              
                              
                            }else
                                echo '<td>بدون حساب</td>';
                            
                            $total[$id] += $allcoms[$comid][$id];
                        }else{
                            echo '<td >0</td>'; //$total[$id] += 0;
                        }
                          
                    }
                    
                    
                    ?>
                    
                    
                    <?php
//                    foreach($oild as $id => $valuex){
//                          
//                        if(isset($allcoms[$comid]['qar'][$id])){
//                            echo '<td >' . ' ' . abs($allcoms[$comid]['qar'][$id]) . '</td>';
//                              $total2[$id] += $allcoms[$comid]['qar'][$id];
//                        }else{
//                            echo '<td >0</td>'; //$total[$id] += 0;
//                        }
//                          
//                    }
                    ?> 
                    
                    
                    
                    

                </tr>
    <?php
            }
}
?>

            <tr style="background-color:#999">
                <td>مجموع</td>
                <?Php 
                 foreach($oild as $id => $val){
                     
                     
                      if($total[$id] > 0){
                                 echo '<td class="bg-danger">' . ' طلب کلی مایان: ' . abs($total[$id]) . '</td>';
                             // $total[$id] += $allcoms[$comid][$id];
                            }elseif($total[$id] < 0){
                            
                                echo '<td class="bg-success">' . ' طلب کلی مردم: ' . abs($total[$id]) . '</td>';
                              
                              
                            }else
                                echo '<td>بدون حساب</td>';
                 } 
                   // echo '<td>' . ($total[$id]) . '</td>';
                ?> 
            </tr>
        </table>

    </div>
<?php  theme_include('footer.php'); ?>