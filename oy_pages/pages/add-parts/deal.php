<?php
$uid = user_uid(); //Get Current User ID
$fld_pre = 'cat_'; // table Feild Prefix
$tbl = TBL_PIX . 'categories_oy'; // Table Name for this page
$pg_n = 'categories_oy'; // current page name $_GET['pg']
$section = 'deal';
$type = (is_get('t') ? is_get('t') : 'deal');
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
//         $file = upload_it($_FILES[$fld_pre .'avatar']);
//         $data[$fld_pre . 'avatar'] = $file->dt_id;
         
          if(isset($_FILES[$fld_pre .'avatar1']))
                if(!empty($_FILES[$fld_pre .'avatar1']) AND ($_FILES[$fld_pre .'avatar1']['tmp_name'])){
                    $file = upload_it($_FILES[$fld_pre .'avatar1']);
                    $data[$fld_pre . 'avatar'] = $file['id'];
                }
        $data[$fld_pre . 'lang'] = $lang;
        $data[$fld_pre . 'type'] =$type;
       $id = add_post($data,$section='deal');
       if(isset($data[$fld_pre . 'avatar']))
        connectfile($id,$data[$fld_pre . 'avatar'],'file4post');
//       if(isset($_POST['cat_food'])){
//          add_parts($_POST['cat_food'],'vif',$id,'food');
//       }
//       if(isset($_POST['cat_sick'])){
//          add_parts($_POST['cat_sick'],'vill',$id,'illness');
//       }
       
       
       
       if(isset($_FILES[$fld_pre .'avatar2']))
                if(!empty($_FILES[$fld_pre .'avatar2']) AND ($_FILES[$fld_pre .'avatar2']['tmp_name'])){
                    $file = upload_it($_FILES[$fld_pre .'avatar2']);
                    $av2 =$file['id'];
                    connectfile($id,$av2,'file4post');
                }
                
                
                if(isset($_FILES[$fld_pre .'avatar3']))
                if(!empty($_FILES[$fld_pre .'avatar3']) AND ($_FILES[$fld_pre .'avatar3']['tmp_name'])){
                    $file = upload_it($_FILES[$fld_pre .'avatar3']);
                    $av3 = $file['id'];
                    connectfile($id,$av3,'file4post');
                }
                
                
                if(isset($_FILES[$fld_pre .'avatar4']))
                if(!empty($_FILES[$fld_pre .'avatar4']) AND ($_FILES[$fld_pre .'avatar4']['tmp_name'])){
                    $file = upload_it($_FILES[$fld_pre .'avatar4']);
                     $av4 = $file['id'];
                    connectfile($id,$av4,'file4post');
                }
   redirect_to(post_viewlink($id,$type));
}else{

global $add_form,$excp, $dbase;
    $add_form = new oy_form('POST', get_current_url(), ' ');    //global $add_form;
   
 
        set_pgtitle(g_lbl('new-post'));
        set_pgdesc('Post a new job annoucment');
        
        if(is_get('val')){
            set_pgtitle("Edit Job Post");

            $id = is_get('val');
            //$tbl_post = TBL_PIX.'';
            $postz = $dbase->get_single_row_arr($tbl, '*', " where {$fld_pre}id=" . $id);
            // print_r($post);


            if(isset($postz[0])){
                
                $postx = $postz[0];
                
                
                $main = $postx['cat_content'];
                   $postx['cat_desc'] = get_serialvalue($main,'des');
               $postx['cat_email'] = get_serialvalue($main,'email');
                 $postx['cat_phone'] = get_serialvalue($main,'phone');
                  $postx['cat_address'] = get_serialvalue($main,'address');
$pricevalue = get_serialvalue($main,'price');
              //  $postx['cat_name'] = 'testitle';
                
               // print_r($postx);
                $add_form->fldvl = $postx;
            }else{
                oy_die('Post Not found');
                $edit= false;
                $pricevalue = '';
            }
   

  
//            $excp['func4value']['skills'] = 'explode_by';
        }else{
          $edit = FALSE;  
        }
   

    
    $add_form->name = 'add_vitamin';
    $add_form->prfx = $fld_pre;
    $add_form->th_start = '<table class="table jobs_TBL '.g_lbl('dir').'">';
    $add_form->th_end = '</table>';
    $add_form->fld_sep = '<tr  class="blue_head"><td  colspan="2">::TEXT</td></tr><tr>';
    $add_form->set_fld_theme('<tr><td  style="width:100px">::label</td><td>::input</td></tr>');
    // $add_form->fld_theme = '<tr><td class="w300 " style="width:300px">::label</td><td>::input</td></tr>';
    //$fields =  $dbase->fetch_field(TBL_PIX.'jobs');
    $fields = 'S:'.g_lbl('short').'::S,name,category1,category,desc,S:'.g_lbl('contact').':S,phone,email,city,address,S:'.g_lbl('thumb').':S,avatar1';
    $add_form->set_flds($fields);
    $add_form->submit = '<tr><td></td><td><button type="submit" class="btn btn-info">'.g_lbl('save').'</button></td></tr>';
    
    $nameb = '<div class="input-group">';
    
     $price= '<div class="input-group-addon"><input  type="text"  name="cat_content[price]" value="'.$pricevalue.'"  id="cat_content[price]"  placeholder="'.  g_lbl('priceph').'"  class="form-control"  /></div></div>';
    $excp['name'] = array('label' => g_lbl('vname'),'type'=>'text', 'class' => 'form-control ', 'att'=>' data-type="job_title" ','ext'=>$price,'pfx'=>$nameb);
    
$lang = get_lang();
    $pag_arr = $dbase->tbl2array(TBL_PIX . 'categories_oy', 'cat_id', 'cat_name', " WHERE cat_lang='{$lang}' AND cat_type = 'deals' AND cat_parent=0 AND ((cat_uid=0) OR (cat_uid=" . user_uid() . "))");
    $excp['category1'] = array('label' => g_lbl('category'), 'att' => ' data-live-search="true"  title="Please select a lunch ..." ', 'type' => 'select', 'options' => $pag_arr, 'class' => 'form-control selectp');
    reset( $pag_arr );
    $parent = key($pag_arr);
  $pag_arr2 = $dbase->tbl2array(TBL_PIX . 'categories_oy', 'cat_id', 'cat_name', " WHERE cat_lang='{$lang}' AND cat_type = 'deals' AND cat_parent='{$parent}' AND ((cat_uid=0) OR (cat_uid=" . user_uid() . "))");
  $excp['category'] = array('label' => g_lbl('subcategory'), 'att' => ' data-live-search="true"  title="Please select a lunch ..." ', 'type' => 'select', 'options' => $pag_arr2, 'class' => 'form-control');
  
    $excp['desc'] = array('label' => g_lbl('otherdesc'),'name'=>'content[des]', 'type' => 'area', 'att' => ' rows="7" ', 'class' => 'form-control editor');
     //$excp['desc']['def'] = '$334';
    
     $excp['phone'] = array('label' => g_lbl('phone'),'name'=>'content[phone]','def'=> user_info('phone'), 'type' => 'text', 'att' => ' rows="7" ', 'class' => 'form-control');
      $excp['email'] = array('label' => g_lbl('email'),'name'=>'content[email]','def'=> user_info('email'), 'type' => 'email', 'att' => ' rows="7" ', 'class' => 'form-control');
     
      $prov = $dbase->tbl2array(TBL_PIX . 'location_oy', 'loc_id', 'loc_local_name', " WHERE loc_in_location=3 AND (loc_type='RE' OR loc_type='CI')");
    $excp['city'] = array('label' => g_lbl('city'), 'name' => 'content[city]', 'type' => 'select', 'options' => $prov, 'att' => '  ', 'class' => 'form-control select3');
   
      //$excp['city'] = array('label' => g_lbl('city'),'name'=>'content[address]', 'type' => 'area', 'att' => ' rows="3" ', 'class' => 'form-control');
      $excp['address'] = array('label' => g_lbl('address'),'name'=>'content[address]', 'type' => 'area', 'att' => ' rows="3" ', 'class' => 'form-control');
    //$excp['ben'] = array('label' => '','name'=>'content[ben]', 'type' => 'area', 'att' => ' rows="7" ', 'class' => 'form-control editor');
    $address= '';
   // $excp['price'] = array('label' => 'price','name'=>'content[price]', 'type' => 'text', 'class' => 'form-control', 'att'=>' placeholder="price" ');
 
 

 
 $defimg = to_croped(UPLOAD_PATH."/def/default.jpg",180);
 
 
 
 $excp['fld-theme-class'] = "form-control";
 
 $thumbs = '<input  type="file"  name="cat_avatar2"  id="cat_avatar2"  class="loadimg custom-file-input"  />'
         . '<input  type="file"  name="cat_avatar3"  id="cat_avatar3"  class="loadimg custom-file-input"  />'
         . '<input  type="file"  name="cat_avatar4"  id="cat_avatar4"  class="loadimg custom-file-input"  />'
         . '<hr/><br/>'
         . '<img src="'.$defimg.'" class="img-rounded" id="cat_avatar1i" alt="Uploaded Image Preview Holder" width="180px" />'
         . '<img src="'.$defimg.'" class="img-rounded" id="cat_avatar2i" alt="Uploaded Image Preview Holder" width="180px" />'
         . '<img src="'.$defimg.'" class="img-rounded" id="cat_avatar3i" alt="Uploaded Image Preview Holder" width="180px" />'
         . '<img src="'.$defimg.'" class="img-rounded" id="cat_avatar4i" alt="Uploaded Image Preview Holder" width="180px" />';

$excp['avatar1'] = array('label' => '','type'=>'file', 'class' => 'loadimg custom-file-input', 'ext' =>$thumbs);
$arrx =  array();  

$add_form->fldop = $excp;


}
