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

global $dbase,$lang;
if(is_post('oy_form_validate')){
        unset($_POST['oy_form_validate']);
       // $data = $_POST;
         if(is_array($_POST[$fld_pre.'content'])){
            $x =  serialize($_POST[$fld_pre.'content']);
            unset($_POST[$fld_pre.'content']);
            $data[$fld_pre.'content'] = $x;
            //echo 'here';
          }
        $data[$fld_pre . 'name'] = $_POST[$fld_pre .'name'];
        if(isset($_FILES[$fld_pre .'avatar']))
                if(!empty($_FILES[$fld_pre .'avatar']) AND ($_FILES[$fld_pre .'avatar']['tmp_name'])){
                    $file = upload_it($_FILES[$fld_pre .'avatar']);
                    $data[$fld_pre . 'avatar'] = $file->dt_id;
                }
        $data[$fld_pre . 'lang'] = $lang;
        $data[$fld_pre . 'type'] =$type;
       $id = add_post($data,$section='blog');
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
   
 
        set_pgtitle(g_lbl('new-post'));
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
    $fields = 'S:'.  g_lbl('sub-title').'::S,name,desc,S:'.  g_lbl('thumb').'::S,avatar,tags';
    $add_form->set_flds($fields);
    $add_form->submit = '<tr><td></td><td><button type="submit" class="btn btn-info">'.g_lbl('save').'</button></td></tr>';
    
    $excp['name'] = array('label' => g_lbl('title').':','type'=>'text', 'class' => 'form-control ', 'att'=>' data-type="job_title" ');
    $excp['desc'] = array('label' => '','name'=>'content[des]', 'type' => 'area', 'att' => ' rows="7" ', 'class' => 'form-control editor');
    //$excp['ben'] = array('label' => '','name'=>'content[ben]', 'type' => 'area', 'att' => ' rows="7" ', 'class' => 'form-control editor');
    $excp['tags'] = array('label' => g_lbl('tags'),'options'=>array(),'name'=>'tags[]','att'=>'data-type="tags"', 'type' => 'select', 'class' => 'form-control cate2autag');
   
   
       $excp['fld-theme-class'] = "form-control";
$excp['avatar'] = array('label' =>  g_lbl('thumb').':','type'=>'file', 'class' => 'form-control ');
$arrx =  array();  

$add_form->fldop = $excp;


}
