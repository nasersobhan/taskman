<?php
loginrequired();
$uid = user_uid();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
global $dbase;
if(is_get('com')){
    if(is_post('tas_note')){
        $dt['tas_note'] = is_post('tas_note');
        $dt['tas_done'] = 1;
        $dt['tas_perentage'] =100;
        $dt['tas_lastab'] =2;
        $dt['tas_donedate'] =date('Y-m-d');
        $id=is_get('id');
       $dbase->RowUpdate('sob_tasks',$dt,'tas_id='.$id);
       
                $bodyhtml =preg_replace('/\v+|\\\[rn]/','<br/>',$dt['tas_note']);
               $ax['{BODY}']=($bodyhtml);;
                $ax['{TLINK}']=get_tbllink('tasks', 'view', $id);
                $ax['{FOOTER}']='Sent by Shamal System';
                $ax['{Priority}']=  task_lvl(get_tas_value('priority',$id));
                $title = 'Task Completed: '.get_tas_value('title',$id);
                  $ax['{title}']=$title;
                $body2 = get_template('application'.DIRECTORY_SEPARATOR.'email',$ax);
           //  $att =false;
                $ax['{BODY}']=(html_entity_decode(($bodyhtml)));;
             $emailto = get_tas_value('email',$id);
             // $ax['{title}']='<h2>Below Task Assigned:' . $data['tas_title'].'</h2>';
                $body = get_template('application'.DIRECTORY_SEPARATOR.'email',$ax);
          
                echo send_mail($emailto,'User',$title,$body,'msobhan@irdglobal.org','Shamal Admin',false);
          //  echo send_mail($em,'Shamal Team','New Assignment Added - '.$data['tas_title'],$body,'msobhan@irdglobal.org','Shamal Admin',false);
            
       
       
    }else{
      
       
    }
      set_pgtitle('Mark task as complete');
        theme_include('/pages/com.php'); 
}elseif(is_get('pid') AND is_get('v')){
    $id =is_get('pid');
    if(user_rank()==99){ 
       
            $dt['tas_perentage'] =is_get('v');
        if( $dt['tas_perentage'] =='zero')
            $dt['tas_perentage'] = 0;
            if($dbase->RowUpdate('sob_tasks',$dt,'tas_id='.$id)){
             
                $dbase->RowUpdate('sob_tasks',array('tas_activitytime'=>date('Y-m-d G:i:s'),'tas_lastab'=>0),'tas_id='.$id);
                
                
                    $bodyhtml =preg_replace('/\v+|\\\[rn]/','<br/>','<p>progress of your task has been changed to '.$dt['tas_perentage'].'%' );
               $ax['{BODY}']=($bodyhtml);;
                $ax['{TLINK}']=get_tbllink('tasks', 'view', $id);
                $ax['{FOOTER}']='Sent by Shamal System';
                $ax['{Priority}']=  task_lvl(get_tas_value('priority',$id));
                $title = get_tas_value('title',$id).' task '.$dt['tas_perentage'].'% Completed';
                  $ax['{title}']=$title;
               // $body2 = get_template('application'.DIRECTORY_SEPARATOR.'email',$ax);
           //  $att =false;
                $ax['{BODY}']=(html_entity_decode(($bodyhtml)));;
                
             // $ax['{title}']='<h2>Below Task Assigned:' . $data['tas_title'].'</h2>';
                $body = get_template('application'.DIRECTORY_SEPARATOR.'email_comm',$ax);
               // if(user_rank()==99){
                    $emailto = get_tas_value('email',$id);
               // }else{
               //     $emailto = 'msobhan@irdglobal.org|dwagh@irdglobal.org|rnosrat@irdglobal.org|afrahmand@irdglobal.org'; 
               // }
           
                echo send_mail($emailto,'User',$title,$body,'shamaladmin@blumont.org','Shamal Admin',false);
                
                   header("Location: http://apps.shamal.net/taskman/?pg=taks&list=un");
                
            }
    }
    
 }elseif(is_get('comment')){   
    // echo 'here';
     //print_r($_POST);
    if(is_post('postid') AND is_post('commenttext')){
        $id = is_post('postid');
        $comm['com_comment'] = is_post('commenttext');
        $comm['com_id_post'] = is_post('postid');
         $comm['com_name'] = user_uid();
         
         
      

         if($dbase->RowInsert('sob_comments_oy',$comm)){
             
             $comid = $dbase->lastinserted_id();
            
             $img = isset($_FILES['img']) ? $_FILES['img'] : false;
                if($img)
                {
                     $updir = RHOME.'/upload/'.$comid.'/';
                        mkdir($updir,777);
                    $img_desc = reArrayFiles($img);
                    //print_r($img_desc);

                    foreach($img_desc as $val)
                    {
                        $newname = basename($val['name']);
                        move_uploaded_file($val['tmp_name'],$updir.$newname);
                    }
                }
        
                 
             //  $dd['tas_activitytime'] = date('Y-m-d G:i:s');;
    //  $dbase->RowUpdate('sob_tasks',array('tas_activitytime'=>date('Y-m-d G:i:s')),'tas_id='.$id);
          
                $bodyhtml =preg_replace('/\v+|\\\[rn]/','<br/>',user_name_ex($comm['com_name']).' Says: <br/>'.$comm['com_comment'] );
               $ax['{BODY}']=($bodyhtml);;
                $ax['{TLINK}']=get_tbllink('tasks', 'view', $id);
                $ax['{FOOTER}']='Sent by Shamal System';
                $ax['{Priority}']=  task_lvl(get_tas_value('priority',$id));
                $title = 'New Comment: '.get_tas_value('title',$id);
                  $ax['{title}']=$title;
               // $body2 = get_template('application'.DIRECTORY_SEPARATOR.'email',$ax);
           //  $att =false;
                $ax['{BODY}']=(html_entity_decode(($bodyhtml)));;
                //$emailto = get_tas_value('email',$id);
             // $ax['{title}']='<h2>Below Task Assigned:' . $data['tas_title'].'</h2>';
                $body = get_template('application'.DIRECTORY_SEPARATOR.'email_comm',$ax);
                
                if(user_rank()==99){
                    $dbase->RowUpdate('sob_tasks',array('tas_activitytime'=>date('Y-m-d G:i:s'),'tas_lastab'=>0),'tas_id='.$id);
                    $emailto = get_tas_value('email',$id);
                }else{
                     $dbase->RowUpdate('sob_tasks',array('tas_activitytime'=>date('Y-m-d G:i:s'),'tas_lastab'=>1),'tas_id='.$id);
                    $emailto = get_tas_value('responsibleEmail',$id);
                    //echo $emailto.$id;
                    if($emailto=='')
                    $emailto = ADMIN_EMAILS; //'msobhan@blumont.org|dwagh@blumont.org|rnosrat@blumont.org'; 
                }
                
    
                echo send_mail($emailto,'User',$title,$body,'shamaladmin@blumont.org','Shamal Admin',false);   
                 
                 
                 
                 
          header('Location: '.HOME.'?tbl=tasks&action=view&value='.$comm['com_id_post']);
         }else
             echo 'Error';
         //echo 'New Comment';
    }
    
    
 }elseif(is_get('res')){
    $id = is_get('res');
    if(user_rank()==99){
       // 'tas_lastab'=>1
        $uid = is_post('uid');
        //$sdate = strtotime(is_post('sdatex'));
        //$sdate = date('Y-m-d', $sdate) ;
        //$dd['tas_lastab'] = 0;
        $dd['tas_assignedto'] = $uid;
        $dd['tas_responsibleEmail'] = user_email($uid);
         $dd['tas_lastab'] = 1;
        	$uname = user_name_ex($uid);
        //$dd['tas_sdate'] = $sdate;
        //$dd['tas_activitytime'] = date('Y-m-d G:i:s');;
        if($dbase->RowUpdate('sob_tasks',$dd,'tas_id='.$id)){
          
               $ax['{BODY}']='Dear '.$uname.'! <br/>New Task has been Assigned to you, please response to it accordingly <br/> Thank you';
                $ax['{TLINK}']=get_tbllink('tasks', 'view', $id);
                $ax['{FOOTER}']='Sent by Shamal System';
                $title = 'New Assignment: '.get_tas_value('title',$id);
                  $ax['{title}']=$title;
         
              $body = get_template('application'.DIRECTORY_SEPARATOR.'email_ass',$ax);
            send_mail($dd['tas_responsibleEmail'],'User',$title,$body,'shamaladmin@blumont.org','Shamal Admin',false);  
            echo 'set';
        }
    }
            
    
   
}elseif(is_get('sdate')){
    
    if(user_rank()==99){
       // 'tas_lastab'=>1
        $id = is_get('sdate');
        $sdate = strtotime(is_post('sdatex'));
        $sdate = date('Y-m-d', $sdate) ;
        $dd['tas_lastab'] = 1;
        $dd['tas_assignedto'] = user_uid();
        $dd['tas_responsibleEmail'] = user_email();
        	
        $dd['tas_sdate'] = $sdate;
        $dd['tas_activitytime'] = date('Y-m-d G:i:s');;
        if($dbase->RowUpdate('sob_tasks',$dd,'tas_id='.$id))
            echo 'saved';
     
    }
         
            
}elseif(is_get('did')){
    if(user_rank()==99){
    $id = is_get('did');
     if($dbase->RowDelete('sob_tasks','tas_id='.$id))
         echo 'Deleted';
     
    }
}else{

set_pgtitle('Job Task List');
$type = is_get('list');
$where = "WHERE tas_uid='{$uid}'";  
if($type){
    
    if(user_rank()==99){
        if($type=='com')
            $where = ' WHERE tas_done=1 ';
        elseif($type=='un')
            $where = ' WHERE tas_done=0 ';
        elseif($type=='myd')
            $where = " WHERE tas_done=1 and tas_assignedto='{$uid}'";
        elseif($type=='my')
            $where = " WHERE tas_done=0 and tas_assignedto='{$uid}'";
        elseif($type=='una')
            $where = " WHERE tas_done=0 and tas_assignedto='0'";    
    }else{
        if($type=='com')
            $where = " WHERE tas_done=1 and tas_uid='{$uid}'";
        elseif($type=='un')
            $where = " WHERE tas_done=0 and tas_uid='{$uid}'";
        elseif($type=='my')
            $where = " WHERE tas_done=0 and tas_uid='{$uid}'";      
    }   
}
$ss_query = "SELECT * FROM sob_tasks ".$where." ORDER BY tas_done, tas_priority DESC, tas_perentage DESC";
post_query($ss_query);

   theme_include('/pages/lists.php');
}