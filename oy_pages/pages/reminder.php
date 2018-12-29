<?php
global $dbase;


          global $dbase;
	$result = $dbase->query("SELECT * FROM sob_tasks where tas_done=0 AND (tas_activitytime < NOW() - INTERVAL 1 DAY) ORDER BY tas_priority DESC, tas_perentage DESC");
$export=0;

   
	while($row = $dbase->fetch_array($result))
	  {
            $id = $row['tas_id'];
            if($row['tas_lastab']==0)
                $mailto = $row['tas_email'];
                else
                    $mailto =$row['tas_responsibleEmail']; // 'Shamal';  
	
                 
                 $uname = user_name_ex($row['tas_uid']);
                 
                 echo 'Last response time: '.$row['tas_activitytime'].'<br>';
                    $ax['{BODY}']='Dear '.$uname.'! <br/>Your response is needed For this task in task manager portal, please response to it accordingly <br/> '
                            . 'if this task is no longer needed/completed please comment we will close it.<br/>'
                            //. 'Last response time: '.$row['tas_activitytime']
                            . '<br/>Thank you';
                $ax['{TLINK}']=get_tbllink('tasks', 'view', $id);
                $ax['{FOOTER}']='Sent by Shamal System';
                $title = 'Reminder: '.$row['tas_title'];
                  $ax['{title}']=$row['tas_title'];
         
              $body = get_template('application'.DIRECTORY_SEPARATOR.'email_ass',$ax);
              
              
              echo 'Mailto:'.$mailto.'<br/>';
              //$mailto = 'msobhan@irdglobal.org';
            send_mail($mailto,'User',$title,$body,'shamaladmin@blumont.org','Shamal Admin',false);  
            //echo 'set';
	  }
        header("Refresh: 86400;url='https://apps.shamal.net/taskman/?pg=reminder'");   
          ?>