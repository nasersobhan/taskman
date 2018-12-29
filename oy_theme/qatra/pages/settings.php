<?php get_header(); ?>
<div class="content-box">
    <div class="sidex">
                <div class="panel panel-default" >
    <div class="panel-heading "><h3><i class="fa fa-cogs Pull-left" aria-hidden="true"></i> <?php echo g_lbl('settings') ?></h3></div>
    <div class="panel-body ">  
        <div class="well">
        
            <h4>واحد اصلی پول</h4>
<form method="post" name="add"  id="oilexp" lang="fa">
    <table align="center" width="600">


  <tr>
    <td width="100">نام واحد پول:</td>
    <td>
        <select name="currency_name">
         <?php 
             $oild =  cat_2arr_l('currency',0,'fa_AF');
             $cur = get_setting('currency'); 
            foreach($oild as $id => $label){
                 echo '<option '.($cur==$id ? 'selected' : '').' value="'.$id.'">'.$label.'</option>';   
            }?></select>
    <span style="color:red" name="qay" id="qay_name"></span></td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" data-url="<?php echo HOME ?>?pg=settings #reportx" id="load_reportx" type="button" name="Send" value="<?php echo g_lbl('save') ?>"
    onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=settings&curr=1'); ;" >

    </td>
  </tr>
  


  

</table>
</form>
        
        </div> <hr/>  <div class="well">
        
        
         <h4>واحد اندازه گیری</h4>
<form method="post" name="edit"  id="oilexp" lang="fa">
    <table  align="center" width="600">

        
  <tr>
    <td width="100"> نام جدید:</td>
    <td ><input  required value="<?php echo get_setting('sizetype') ?>" name="sizetype" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span></td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" data-url="<?php echo HOME ?>?pg=settings #reportx" id="load_reportx" type="button" name="Send" value="<?php echo g_lbl('save') ?>"
    onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=settings&sizetype=1'); " >

    </td>
  </tr>
  



</table>
</form>
</div>
        
        
        
        
  <div class="well">
        
        
         <h4>نوع تاریخ</h4>
<form method="post" name="edit"  id="oilexp" lang="fa">
    <table  align="center" width="600">

        
  <tr>
    <td width="100"> نام جدید:</td>
    <td >
    
        <select name="datetype">
            
            <option value="1">میلادی</option>
            <option <?php echo (get_setting('datetype')==2 ? 'selected' :''); ?> value="2">هجری شمسی</option>
        </select>
    
    </td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" data-url="<?php echo HOME ?>?pg=settings #reportx" id="load_reportx" type="button" name="Send" value="<?php echo g_lbl('save') ?>"
    onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=settings&datetype=1'); " >

    </td>
  </tr>
  



</table>
</form>
</div>      
        
        
        
        
           
  <div class="well">
        
        
         <h4>زبان</h4>
<form method="post" name="edit"  id="oilexp" lang="fa">
    <table  align="center" width="600">

        
  <tr>
    <td width="100">زبان:</td>
    <td >
    
        <select name="language">
            
            <option value="en_US"><?php echo g_lbl('english'); ?></option>
            <option value="fa_AF"><?php echo g_lbl('dari'); ?></option>
          
        </select>
    
    </td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" data-url="<?php echo HOME ?>?pg=settings #reportx" id="load_reportx" type="button" name="Send" value="<?php echo g_lbl('save') ?>"
    onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=settings&lang=1'); " >

    </td>
  </tr>
  



</table>
</form>
</div>    
        
        
    <div class="well">
        
        
         <h4>نوشته فوتر چاپ</h4>
<form method="post" name="edit"  id="oilexp" lang="fa">
    <table  align="center" width="600">

        
  <tr>
    <td width="100">نوشته:</td>
    <td >
    
    <input  required value="<?php echo get_setting('footertxt') ?>" name="footertxt" id="name" type="text" />
    
    </td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" data-url="<?php echo HOME ?>?pg=settings #reportx" id="load_reportx" type="button" name="Send" value="<?php echo g_lbl('save') ?>"
    onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=settings&foot=1'); " >

    </td>
  </tr>
  



</table>
</form>
</div>      
        
        
<hr/>

         
<span style="color:red" name="mess" id="mess">
    </span>
         
         
  </div>
</div></div>
  
  
  
  
  
  
    <span id="reportx" >
 <div  class="sidex  Pull-left">


        <div class="panel panel-default" >
    <div class="panel-heading "><h3>تنظیمات فعلی</h3></div>
    <div class="panel-body ">  








<?php
global $dbase;
$result = $dbase->query("SELECT * FROM sob_categories_oy where cat_type='settings'   ORDER BY cat_id DESC LIMIT 12");?>
	<table style="table-layout:fixed" id="datatbl" width="550" >
	<tr>
    <th width="160px">نام</th>

    <th width="120px">وضعیت</th>
   
  </tr>






  <tr>
    <th width="140px">واحد پول</th>

    <td width="120px"><?Php echo get_cate_name(get_setting('currency')) ?></td>
   
  </tr>




  <tr>
    <th width="140px">واحد اندازه گیری</th>

    <td width="120px"><?Php echo (get_setting('sizetype')) ?></td>
   
  </tr>

  <tr>
    <th width="140px">نوع تاریخ</th>

    <td width="120px"><?Php echo (get_setting('datetype')==2 ? 'شمسی' : 'میلادی') ?></td>
   
  </tr>
  
    <tr>
    <th width="140px">نوشته فوتر چاپ</th>

    <td width="120px"><?Php echo get_setting('footertxt');?></td>
   
  </tr>

</table>

     </div>
</div>

</div>


    

<?php get_footer() ?>