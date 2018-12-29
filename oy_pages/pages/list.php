<?php
loginrequired();
allowByrank(99);
$uid = user_uid(); //Get Current User ID
$fld_pre = 'cat_'; // table Feild Prefix
$tbl = TBL_PIX . 'categories_oy'; // Table Name for this page
$pg_n = 'posts'; // current page name $_GET['pg']
$section = 'health';
$type = (is_get('t') ? is_get('t') : 'blogs');
$lang = get_lang();
global $dbase,$excp,$add_form; //Load Database Object
set_pgtitle($type);
//
//
//
// 
//    if(is_get('type')){
//        $title = 'Scholership';
//    }else{
//        $title = 'RFP/RFQ';
//        $type='rfp';
//    }
    
//    if(is_get('lim'))
//        $max_num = is_get('lim');
//    elseif(is_get('loader'))
//        $max_num = 5;
//    else{
//      if(isset($_COOKIE['jobtheme']) && $_COOKIE['jobtheme'] == 'tbl')
//            
//      else
//            $max_num = TBL_LIMITE;
//        
//    }
//    
    
    $max_num = 20;
    $today = date('Y-m-d');


  // set_pgtitle("ویتامینها");
$type = is_get('t');
if($type)
   $where = "where cat_status=1 and cat_type='{$type}' "; 
else
  $where = "where cat_status=1  ";
    
   
//       
//       if(is_get('s') OR is_post('sea_text')){
//            $s_val = (is_post('sea_text') ? is_post('sea_text') : (is_get('s') ? is_get('s') : ''));
//            
//       
//            
//             set_pgtitle('search: '.$s_val);
//            
//             $xtbl = TBL_PIX.'searchquery';
//             $sinf['sea_key'] = $s_val;
//             $sinf['sea_uid'] = 0;
//             $sinf['sea_pg'] = is_get('pg');
//              $dbase->RowInsert($xtbl,$sinf);
//               $where = "WHERE cat_status=1  "
//                ." AND (CONCAT({$fld_pre}title,{$fld_pre}description) LIKE '%{$s_val}%') ";
//        }   
//    

  



  

    if(is_get('cate')){
        
        $cat = get_cate_id(is_get('cate'));
        $where .= " AND cat_category='{$cat}' ";
        set_pgtitle('All '. get_cate_name($cat),'sco');
    
    }




    //search 
 
    


    if(is_post('sea_category')){
        $max_num = 1000;
        $s_val = is_post('sea_category');
        $where .= " AND cat_category='{$s_val}' ";
    }

    if(is_get('order'))
        $ord = is_get('order');
    else
        $ord = 'DESC';
    $orderby = " ORDER BY {$fld_pre}id {$ord} ";

    $page = is_get('page');

    if(is_get('page')){
        $page = (int) $page - 1;
        $offset = $max_num * $page;
    }else{
        $page = 0;
        $offset = 0;
    }



    $main_query = "SELECT * FROM {$tbl} ";

    
  
     $myhome = false;

    
    global $pagin, $total;
    $total = $dbase->num_rows($main_query . $where);
    if($myhome && $total < 1)
        redirect_to(get_link($pg_n));

    $left_rec = $total - ($page * $max_num);
    $limit = " LIMIT {$offset},{$max_num}";


 
   if(is_get('xml')){
       $ss_query = $main_query . $where;
       post_query($ss_query);
       
   }elseif(is_get('rss')){
       $ss_query = $main_query . $where;
       post_query($ss_query);   
   }else{
       
        $ss_query = $main_query . $where . $orderby . $limit;
         post_query($ss_query);
         
       //RewriteRule ^([^/]*)/page-([^/]*).html$    index.php?t=$1&pg=list&page$2  [NC]    # Handle product requests
         
    if(is_get('pg') == $pg_n)
        $pagin = post_paging($total, $max_num, $page + 1, get_current_url());
    else
        $pagin = post_paging($total, $max_num, $page + 1, get_current_url().'?pg=list');
   }
    
    
   
   
    
    
                 
     addheadline('<meta name="robots" content="all" />');
   
  // echo $pagin.$total.$page.$max_num;
   //if(is_get('cate')==false AND is_get('city')==false)
addjs(CUSTOM_PATH.'/js/jobs.js');
  if(file_exists(CRR_THEME_RPATH . 'list'.DIRECTORY_SEPARATOR.$type . '.php'))
     theme_pg_include($type);
  else
            theme_pg_include('other');
