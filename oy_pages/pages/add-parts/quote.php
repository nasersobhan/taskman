<?php


//set_lang('fa-AF');
$uid = user_uid(); //Get Current User ID
$fld_pre = 'cat_'; // table Feild Prefix
$tbl = TBL_PIX . 'categories_oy'; // Table Name for this page
$pg_n = 'categories_oy'; // current page name $_GET['pg']
$section = 'userblog';
$type = (is_get('t') ? is_get('t') : 'blog');
$lang = get_lang();
//include_lang($type.'-'.$lang);
set_pgcolor('read');
global $dbase,$lang;
if(is_post('oy_form_validate')){
        unset($_POST['oy_form_validate']);
       // $data = $_POST;
        $_POST[$fld_pre.'content']['author'] = cate2db($_POST[$fld_pre.'content']['author'],'author');
        
        
        
           if(is_array($_POST[$fld_pre.'content'])){
               $xxxxr = $_POST[$fld_pre.'content'];
               $mainx = array();
               foreach($xxxxr as $key => $value){
                   $value = str_ireplace('"','&#39;',$value);
                   $mainx[$key] = str_ireplace("'",'&#39;',str_ireplace('#','&#35;',htmlentities($value)));
               }
               
           // $autor = cate2db( $mainx['author'], 'People');
            $data[$fld_pre.'content'] = serialize($mainx);
            //echo 'here';
          }
         if(!is_post($fld_pre .'name'))
            $_POST[$fld_pre .'name'] = lim4str($_POST[$fld_pre.'content']['desc'],100,true);
      
         
         $data[$fld_pre . 'name'] = $_POST[$fld_pre .'name'];
        if(isset($_FILES[$fld_pre .'avatar']))
                if(!empty($_FILES[$fld_pre .'avatar']) AND ($_FILES[$fld_pre .'avatar']['tmp_name'])){
                    $file = upload_it($_FILES[$fld_pre .'avatar']);
                    $data[$fld_pre . 'avatar'] = $file->dt_id;
                }
                
        if(is_arabic($data[$fld_pre.'content']))
            $data[$fld_pre . 'lang'] = 'fa_AF';
        else
            $data[$fld_pre . 'lang'] = 'en_US'; 
        $data[$fld_pre . 'type'] =$type;
         
    unset($_POST[$fld_pre.'content']);
              
         $data[$fld_pre.'category'] =  $_POST[$fld_pre.'category'];
         
        if(is_get('val'))
           $id = edit_post($data,$section='read');  
        else
            $id = add_post($data,$section='read');
        if(is_get('oid')){
              
              $lang_tbl = TBL_PIX.'langs';
                           
              
              $langtbl['lan_pid'] = is_get('oid');
              $langtbl['lan_rid'] = $id;
              $langtbl['lan_lang'] = $data[$fld_pre . 'lang'];
              $dbase->RowInsert($lang_tbl,$langtbl);
              
              $langtbl2['lan_pid'] = $id;
              $langtbl2['lan_rid'] = is_get('oid');
              $langtbl2['lan_lang'] = post_lang(is_get('oid'));
              $dbase->RowInsert($lang_tbl,$langtbl2);
          }
     if(isset($_POST[$fld_pre.'tags'])){
          add_parts($_POST[$fld_pre.'tags'],'tags',$id,'tags');
       }
    
  redirect_to(post_viewlink($id,$type));
}elseif(!is_post('oy_form_validate')){


global $add_form,$excp, $dbase;
    $add_form = new oy_form('POST', get_current_url(), ' ');    //global $add_form;
   
  if(is_get('oid'))
        set_pgtitle(g_lbl('translate').' '.  get_cate_name(is_get('oid')));
  else
        set_pgtitle(g_lbl('newpost'));
  
        //set_pgdesc('Post a new job annoucment');
   $edit = FALSE;
 
    $add_form->name = 'add_vitamin';
    $add_form->prfx = $fld_pre;
    $add_form->th_start = '<table class="table jobs_TBL '.g_lbl('dir').'">';
    $add_form->th_end = '</table>';
    $add_form->fld_sep = '<tr  class="blue_head"><td  colspan="2">::TEXT</td></tr><tr>';
    $add_form->set_fld_theme('<tr><td  style="width:100px">::label</td><td>::input</td></tr>');
    // $add_form->fld_theme = '<tr><td class="w300 " style="width:300px">::label</td><td>::input</td></tr>';
    //$fields =  $dbase->fetch_field(TBL_PIX.'jobs');
    $fields = 'S:'.  g_lbl('subtitle').'::S,desc,name,category,author,tags';
    $add_form->set_flds($fields);
    $add_form->submit = '<tr><td></td><td><button type="submit" class="btn btn-info">'.g_lbl('save').'</button></td></tr>';
    
    $excp['name'] = array('label' => g_lbl('title').':','type'=>'text', 'class' => 'form-control ', 'att'=>' data-type="job_title" ');
    $excp['desc'] = array('label' => '','name'=>'content[desc]', 'type' => 'area', 'att' => ' rows="7" ', 'class' => 'form-control editor');
    
    $excp['author'] = array('label' => g_lbl('author'),'options'=>array('',''),'name'=>'content[author]','att'=>'data-type="author"', 'type' => 'select', 'class' => 'form-control cate2au');
   
     $cates = cat_2arr_l('quote_type'); // $dbase->tbl2array(TBL_PIX . 'categories_oy', 'cat_id', 'cat_name', " WHERE cat_lang='{$lang}' AND cat_type = 'deals' AND cat_parent='{$parent}' AND ((cat_uid=0) OR (cat_uid=" . user_uid() . "))");
    $excp['category'] = array('label' => g_lbl('category'),'options'=>$cates,'att'=>'data-type="author"', 'type' => 'select', 'class' => 'form-control');
    //$excp['tags'] = array('label' => g_lbl('tags'),'options'=>array(),'name'=>'tags[]','att'=>'data-type="tags"', 'type' => 'select', 'class' => 'form-control cate2autag');
    //$excp['ben'] = array('label' => '','name'=>'content[ben]', 'type' => 'area', 'att' => ' rows="7" ', 'class' => 'form-control editor');
    $excp['tags'] = array('label' => g_lbl('tags'),'options'=>array(),'name'=>'tags[]','att'=>'data-type="tags"', 'type' => 'select', 'class' => 'form-control cate2autag');
   
   
       $excp['fld-theme-class'] = "form-control";
$excp['avatar'] = array('label' =>  g_lbl('thumb').':','type'=>'file', 'class' => 'form-control ');
$arrx =  array();  


if(is_get('val')){
                $id = is_get('val');
                
    if(is_numeric($id) && (int) $id == $id)
        $id = $id;
    else
        $id = $dbase->get_single($tbl, "{$fld_pre}slug", $get_id, "{$fld_pre}id");
        //  global $add_form;
 
          set_pgtitle(g_lbl('translate') .get_cate_name($id));  
        $post = $dbase->get_single_row_arr($tbl, '*', " where {$fld_pre}id=" . $id);
        // print_r($post);


        if(isset($post[0]))
            $add_form->fldvl = $post[0];
        else{
            oy_die('Post Not found');
            $edit= false;
        }
 } elseif(is_get('oid')){
      set_pgtitle(g_lbl('translate').': ' .get_cate_name(is_get('oid')));   
 }
$add_form->fldop = $excp;
}
