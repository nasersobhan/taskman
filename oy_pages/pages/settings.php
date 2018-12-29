<?php
loginrequired();
global $dbase,$curr,$sizetype;
$curr = get_cate_name(get_setting('currency'));
$sizetype = (get_setting('sizetype'));
//echo ($_GET['eoe']==1? EXOIL : IMOIL);
$myhome = HOME.'?pg=impexp';
load_jsplug('bootstrap') ;
class_include('jdatetime');
 $tbl = TBL_PIX.'categories_oy';
if(is_get('view')){
   $vid= is_get('view');
    post_query("select * from sob_money where mon_id={$vid}");
   
   theme_include('pages\money_view'); 
     
}elseif(is_get('curr')){
    $val = is_post('currency_name');
   // $valu = cate2db($val,'oiltype');
    set_setting('currency', $val);
   echo 'ثبت شد';
}elseif(is_get('datetype')){
    $val = is_post('datetype');
   // $valu = cate2db($val,'oiltype');
    set_setting('datetype', $val);
   echo 'ثبت شد';
   
}elseif(is_get('lang')){
    $val = is_post('language');
   // $valu = cate2db($val,'oiltype');
   set_lang($val);
  
   echo 'ثبت شد';
}elseif(is_get('del')){
    $val= is_post('st_name');
     $d['cat_status'] =100;
     $dbase->RowUpdate($tbl,$d, "WHERE cat_id=".$val);
      echo 'حذف شد';
}elseif(is_get('sizetype')){
      $val = is_post('sizetype');
   // $valu = cate2db($val,'oiltype');
    set_setting('sizetype', $val);
      echo 'ثبت شد';
      
}elseif(is_get('foot')){
      $val = is_post('footertxt');
   // $valu = cate2db($val,'oiltype');
    set_setting('footertxt', $val);
      echo 'ثبت شد';      
      
}else{

    
    theme_include('pages\settings'); 
    


}