<?php
loginrequired();
global $dbase,$curr,$sizetype;
$curr = get_cate_name(get_setting('currency'));
$sizetype = (get_setting('sizetype'));
//echo ($_GET['eoe']==1? EXOIL : IMOIL);
$myhome = HOME.'?pg=impexp';
load_jsplug('bootstrap') ;
if(is_post('tas_email')){
//if(is_get('add')){
 $error = false;
    
    $data = $_POST;
//    $data['imp_name'] = cate2db(is_post('imp_name'),'company');
//    $data['imp_uid'] = user_uid();
//    $data['imp_eoe'] = is_get('eoe');
//     $data['imp_date'] = date('Y-m-d');
//     $data['imp_sdate'] = get_jdate('Y-m-d');
//     if(is_get('eoe')==2) {
//      $data['imp_m_name'] = cate2db(is_post('imp_m_name'),'mcompany');
//       $data['imp_o_name'] = cate2db(is_post('imp_o_name'),'ocompany');
//        $data['imp_t_cname'] = cate2db(is_post('imp_t_cname'),'tcompany');
//     }
//
    
    
    foreach($data as $key => $value){
        $value = htmlspecialchars($value);
         $value = $dbase->escap_single($value);
        $value = preg_quote($value,'/');
        $datax[$key] =$value;
    }
    
    $datax['tas_date'] = date('Y-m-d');
    $datax['tas_uid'] = user_uid();
    $datax['tas_lastab'] = 1;
     $datax['tas_summary'] = htmlspecialchars($datax['tas_summary']);
     if(!check_email_address($data['tas_email'])){
         $error ='Email is not Valid';
     }
     


     
     
     
     
     if(!$error){
 IF($dbase->RowInsert('sob_tasks',$datax)){
     // ECHO 'Submitted, Thank you';
      
      $bodyhtml =preg_replace('/\v+|\\\[rn]/','<br/>',$data['tas_summary']).'<br/>By: '.$data['tas_email']; //nl2br2($data['tas_summary']);
     // echo $bodyhtml;
      $id = $dbase->lastinserted_id();
                $ax['{BODY}']=($bodyhtml);;
                $ax['{title}']=$data['tas_title'];
                $ax['{TLINK}']=get_tbllink('tasks', 'view', $id);
                $ax['{FOOTER}']='Sent by Shamal System';
                $ax['{Priority}']=  task_lvl($data['tas_priority']);
                $body2 = get_template('application'.DIRECTORY_SEPARATOR.'email',$ax);
           //  $att =false;
                $ax['{BODY}']=(html_entity_decode(($bodyhtml)));;
             
             // $ax['{title}']='<h2>Below Task Assigned:' . $data['tas_title'].'</h2>';
                $body = get_template('application'.DIRECTORY_SEPARATOR.'email',$ax);
            $em =ADMIN_EMAILS;    
            send_mail($data['tas_email'],'User','Task Assigned: '.$data['tas_title'],$body2,'shamaladmin@blumont.org','Shamal Admin',false);
            send_mail($em,'Shamal Team','New Assignment Added - '.$data['tas_title'],$body,'shamaladmin@blumont.org','Shamal Admin',false);
             echo 'Job Sumitted <a href="'.HOME.'?tbl=tasks&action=view&value='.$id.'">click here to open request</a>'; 
            
           // header('Location: '.HOME.'?tbl=tasks&action=view&value='.$id);
         
 }ELSE
     ECHO 'Problem detected please try again.';
    
     }else{
         echo $error;
     }
}else{
 
set_pgtitle('Job Submittal Page');
 theme_include('pages\mexp'); 	 
}





function nl2br2($string) { 
$string = preg_replace('/\v+|\\\[rn]/','<br/>',$string); 
return $string; 
} 