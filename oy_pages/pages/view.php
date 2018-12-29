<?php
loginrequired();
$uid = user_uid(); //Get Current User ID
$fld_pre = 'cat_'; // table Feild Prefix
$tbl = TBL_PIX . 'categories_oy'; // Table Name for this page
$pg_n = $_GET['pg'];
global $dbase; //Load Database Object
$type = (is_get('t') ? is_get('t') : '');
$lang = get_lang();
if(is_get('view')){
    
     
    $get_id = trim(is_get('view'));
  
    
    
    
    if(is_numeric($get_id) && (int) $get_id == $get_id)
        $pid = $get_id;
    else
        $pid = $dbase->get_single($tbl, "{$fld_pre}slug", $get_id, "{$fld_pre}id");

        
        
        $pid = get_actualID($pid,$lang);
 
    $main_query = "SELECT * FROM {$tbl} ";
    $where = " where {$fld_pre}id='{$pid}'";
    $status = " AND ({$fld_pre}status=1 OR {$fld_pre}status=99)  ";
    if(is_owner($pid, 'categories_oy')){
        $status = " AND {$fld_pre}status<>100  ";
    }
    $limit = " LIMIT 1";
    $where = $where . $status;
    $ss_query = $main_query . $where . $limit; 
    global $total, $max_num;
    post_query($ss_query);
     addjs(CUSTOM_PATH.'/js/view.js'); 
    if(have_post()){
        while(have_post()) : the_post();
           // load_jsplug('form');
       
        if(user_uid() != get_cat_uid())
                set_hit($tbl, "{$fld_pre}hits", " {$fld_pre}id=" . get_cat_id());
            set_pgtitle(get_cat_name());
          // set_lang(get_cat_lang());
          set_pgphoto(get_fileurl(get_cat_avatar()));
          set_pgdesc(get_cat_name());
               $type = get_cat_type();
               if(file_exists(CRR_THEME_RPATH . 'view'.DIRECTORY_SEPARATOR.$type . '.php'))
                        theme_include('view'.DIRECTORY_SEPARATOR.$type);
               else
                        theme_include('view'.DIRECTORY_SEPARATOR.'other');
            
        endwhile;
    }else{
        theme_include('error'.DIRECTORY_SEPARATOR.'404.php');
    }
}






