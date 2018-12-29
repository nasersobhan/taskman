<?php



global $_LANG;





//jobs
//
//// CLASSES
//$_LANG['dir']='lang_rtl';
//$_LANG['txt-al']='text-right';
//
////Lables for job view
//
//$_LANG['title']='عنوان شغل';
//$_LANG['vacancynumber']='شناسه پست';
//$_LANG['category']='دسته بندی';
//$_LANG['duration']='مدت';
//$_LANG['enddate']='تاریخ ختم';
//$_LANG['jobno']='تعداد نفر';
//
//$_LANG['location']='مکان';
//$_LANG['organization']='کارفرما';
//$_LANG['gender']='جنسیت';
//$_LANG['city']='شهر';
//$_LANG['country']='کشور';
//
//$_LANG['qualification']='شرایط';
//$_LANG['education']='تحصیل';
//$_LANG['experience']='تجربه';
//$_LANG['year']='سال';
//
//$_LANG['duty']='وظایف';
//
//$_LANG['guideline']='طریقه ارسال درخواستی';
//
//
//$_LANG['email']='ایمیل';
//
//$_LANG['about']='درباره';
//
//


//profile
$_LANG['editprofile']='ویرایش پروفایل';
$_LANG['logout']='خروج';
//user settings
$_LANG['settings']='تنظیمات';



//css classes
$_LANG['otherside']='pull-left';
$_LANG['rightside']='pull-right';
 include_lang('def-'.  get_lang());
if(is_get('t'))
    include_lang(is_get('t').'-'.  get_lang());
//if(is_get('pg')=='jobs')
    include_lang('LANG-FA');
    
    
        ///pages
$_LANG['about']='درباره';
$_LANG['jobs']='شغل';
$_LANG['rfq']='RFQ/RFP/RFA';

 $_LANG['comments']='نظریات';
   $_LANG['more']='بیشتر';
   
   
   
   ///forms
   
      $_LANG['house']='مخزن';
         $_LANG['type']='نوع';
           
         
         
             $_LANG['company']='شرکت';  
  $_LANG['mcompany']='محصول';
   $_LANG['tcompany']='بارچالنی';
    $_LANG['ocompany']='اضافه بار';
    
    
    #eoe 
    
    $_LANG['eoe1mon']='پرداخت';
    $_LANG['eoe2mon']='دریافت';
    $_LANG['eoe5mon']='پرداخت متفرقه';
    $_LANG['eoe7mon']='دریافت متفرقه';
    
      $_LANG['eoe1oil']='فروش';
    $_LANG['eoe2oil']='خرید';
    
    
    $_LANG['unvalid']='غیر معتبر';
    