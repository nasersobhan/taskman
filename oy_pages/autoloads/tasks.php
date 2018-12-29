<?php

global $excp, $dbase;
  $excp['func4value']['summary'] = 'nl2br';
$excp['flds'] = 'title,email,priority,department,date,summary,sdate,assignedto,lastab,donedate,note';
$action = (is_get('action') ? is_get('action') : 'list');
if($action == 'add' || $action == 'edit'){
//load_jsplug('select2');
//load_jsplug('form');
redirect_to(get_link('addtask'));

}elseif($action == 'view'){
    
    $excp['title'] = 'View Task';
    $excp['func4value']['assignedto'] = 'user_name_ex';
    $excp['func4value']['lastab'] = 'get_whoisres';
    
    $excp['func4value']['text'] = 'auto_direction';
    $excp['func4value']['priority'] = 'task_lvl';
    $excp['func4value']['department'] = 'get_cate_name';
    $excp['func4value']['note'] = 'nl2brcustom';
   $excp['func4value']['summary'] = 'nl2brcustom';
    $excp['func4value']['done'] = 'doneval';
    $excp['fbuilder']['done']['label'] = 'Status';
     $excp['fld_label']['note'] = 'Complete note';
       $excp['fld_label']['sdate'] = 'Start Working';
       $excp['fld_label']['assignedto'] = 'Responsible person';
       $excp['fld_label']['lastab'] = 'Status';
    //$excp['theme'] = 'autoloader/view';
    
    
}else{

  redirect_to(get_link('taks')); 
}



function nl2brcustom($vl){
    $vl = nl2br($vl);
    $vl = str_ireplace('\n','<br/>', $vl);
    return $vl;
}


function get_whoisres($x){
    if($x==2)
        return '<span class="text-success"><i class="fa fa-check" aria-hidden="true"></i> Task Completed</span>';
    if(user_rank()==99){
        if($x==1)
            return '<i class="fa fa-info-circle" aria-hidden="true"></i> <span class="text-danger blink">Waiting for your response</span>';
        else
             return '<span class="text-success"><i class="fa fa-info-circle" aria-hidden="true"></i> Waiting for client</span>';
        
    }else{
        if($x==1)
            return '<span class=""><i class="fa fa-info-circle" aria-hidden="true"></i> Shamal Team Still working on it</span>';
        else
             return '<i class="fa fa-info-circle" aria-hidden="true"></i> <span class="text-danger blink">Waiting for you, Please response</span>';
        
    }
    
}
?>

