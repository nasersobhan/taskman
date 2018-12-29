<?php

allowByrank(99);
//set_lang('fa-AF');
$uid = user_uid(); //Get Current User ID
$fld_pre = 'cat_'; // table Feild Prefix
$tbl = TBL_PIX . 'categories_oy'; // Table Name for this page
$pg_n = 'categories_oy'; // current page name $_GET['pg']
$section = 'userblog';
$type = (is_get('t') ? is_get('t') : 'blog');
$lang = get_lang();
//include_lang($type.'-'.$lang);

global $dbase,$lang;
if(is_post('oy_form_validate')){
        unset($_POST['oy_form_validate']);
       // $data = $_POST;
         if(is_array($_POST[$fld_pre.'content'])){
            $x =  serialize($_POST[$fld_pre.'content']);
            unset($_POST[$fld_pre.'content']);
            $data[$fld_pre.'content'] = $x;
            //echo 'here';
          }else{
              $data[$fld_pre.'content'] = $_POST[$fld_pre.'content'];
          }
          
        
          
          
        $data[$fld_pre . 'name'] = $_POST[$fld_pre .'name'];
        if(isset($_FILES[$fld_pre .'avatar']))
                if(!empty($_FILES[$fld_pre .'avatar']) AND ($_FILES[$fld_pre .'avatar']['tmp_name'])){
                    $file = upload_it($_FILES[$fld_pre .'avatar']);
                    $data[$fld_pre . 'avatar'] = $file->dt_id;
                }
        $data[$fld_pre . 'lang'] = (is_post($fld_pre .'lang') ? is_post($fld_pre .'lang') : $lang);
        $data[$fld_pre . 'type'] =$type;
      // $id = add_post($data,$section='other');
        
          if(is_get('val'))
           $id = edit_post($data,is_get('val'));  
        else
            $id = add_post($data,'read');
        
        
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
          add_parts($_POST[$fld_pre.'tags'],'tags',$id,'blog');
       }
//       if(isset($_POST['pos_sick'])){
//          add_parts($_POST['pos_sick'],'vill',$id,'illness');
//       }
//       
   redirect_to(post_viewlink($id,$type));
}elseif(!is_post('oy_form_validate')){

//$uid = user_uid(); //Get Current User ID
//$fld_pre = 'pos_'; // table Feild Prefix
//$tbl = TBL_PIX . 'rfpqsch'; // Table Name for this page
//$pg_n = 'bidding'; // current page name $_GET['pg']
//$section = 'health';
//$type = (is_get('t') ? is_get('t') : '');
global $add_form,$excp, $dbase;
    $add_form = new oy_form('POST', get_current_url(), ' ');    //global $add_form;
   
 
        set_pgtitle(g_lbl('add'));
        set_pgdesc('Post a new job annoucment');
   $edit = FALSE;

    
    $add_form->name = 'add_vitamin';
    $add_form->prfx = $fld_pre;
    $add_form->th_start = '<table class="table jobs_TBL '.g_lbl('dir').'">';
    $add_form->th_end = '</table>';
    $add_form->fld_sep = '<tr  class="blue_head"><td  colspan="2">::TEXT</td></tr><tr>';
    $add_form->set_fld_theme('<tr><td  style="width:100px">::label</td><td>::input</td></tr>');
    // $add_form->fld_theme = '<tr><td class="w300 " style="width:300px">::label</td><td>::input</td></tr>';
    //$fields =  $dbase->fetch_field(TBL_PIX.'jobs');
    $fields = 'S:'.  g_lbl('sub-title').'::S,name,desc,parent,lang,S:'.  g_lbl('thumb').'::S,avatar,tags';
    $add_form->set_flds($fields);
    $add_form->submit = '<tr><td></td><td><button type="submit" class="btn btn-info">'.g_lbl('save').'</button></td></tr>';
    
    $excp['name'] = array('label' => g_lbl('title').':','type'=>'text', 'class' => 'form-control ', 'att'=>' data-type="job_title" ');
    $excp['desc'] = array('label' => '','name'=>'content', 'type' => 'area', 'att' => ' rows="7" ', 'class' => 'form-control editor');
   // $excp['lang'] = array('label' => g_lbl('language').':','name'=>'content', 'type' => 'area', 'att' => ' rows="7" ', 'class' => 'form-control editor');
     
  if($lang=='en_US')
        $catsx = array('en_US'=>'English','fa_AF'=>'Dari');
     else
        $catsx = array('fa_AF'=>'Dari','en_US'=>'English'); 
    $excp['lang'] =  array('label' => g_lbl('language').':','type' => 'select','options'=>$catsx,'class'=>'  form-control', 'att' => ' title="Please select a type ..." ');
   
    
    $cats[0] = 'No Parent';

    $excp['parent'] =  array('label' => g_lbl('parent').':','type' => 'select',  'options' => $cats, 'def' => 0,'class'=>'form-control cate2 ', 'att' => ' id="" data-type=""  title="Please select a parent ..." ');
    
    
    
    //$excp['ben'] = array('label' => '','name'=>'content[ben]', 'type' => 'area', 'att' => ' rows="7" ', 'class' => 'form-control editor');
    $excp['tags'] = array('label' => g_lbl('tags'),'options'=>array(),'name'=>'tags[]','att'=>'data-type="tags"', 'type' => 'select', 'class' => 'form-control cate2autag');
   
   
       $excp['fld-theme-class'] = "form-control";
$excp['avatar'] = array('label' =>  g_lbl('thumb').':','type'=>'file', 'class' => 'form-control ');
//$arrx =  array();  
if(is_get('val')){
                $id = is_get('val');
             
    if(is_numeric($id) && (int) $id == $id)
        $id = $id;
    else
        $id = $dbase->get_single($tbl, "{$fld_pre}slug", $get_id, "{$fld_pre}id");
        //  global $add_form;
  
        
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
