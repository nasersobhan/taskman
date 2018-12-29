<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


global $_LANG;




//// CLASSES
//$_LANG['dir']='lang_ltr';
//$_LANG['txt-al']='text-left';
//
////Lables for job view
//
//$_LANG['title']='Title';
//$_LANG['vacancynumber']='Vacancy Number';
//$_LANG['category']='Category';
//$_LANG['duration']='Duration';
//$_LANG['enddate']='Closing Date';
//$_LANG['jobno']='Jobs no';
//
//$_LANG['location']='Location';
//$_LANG['organization']='Organization';
//
//$_LANG['city']='City';
//$_LANG['country']='Country';
//
//$_LANG['qualification']='Qualification';
//$_LANG['education']='Education';
//$_LANG['experience']='Years of Experience';
//$_LANG['year']='Years';
//
//$_LANG['duty']='Duties & Responsibilities';
//
//$_LANG['guideline']='Submission Guideline';
//
//$_LANG['gender']='Gender';
//$_LANG['email']='Email';
//
//
//
//
//$_LANG['about']='About';




//profile
$_LANG['editprofile']='Edit Profile';
$_LANG['logout']='Logout';
//user settings
$_LANG['settings']='settings';

//css classes
$_LANG['otherside']='pull-right';
$_LANG['rightside']='pull-left';
 include_lang('def-'.  get_lang());
if(is_get('t'))
    include_lang(is_get('t').'-'.  get_lang());



//if(is_get('pg')=='jobs')
    include_lang('LANG-EN');
    
    
    
    
    ///pages
$_LANG['about']='About';
$_LANG['jobs']='Jobs';
$_LANG['rfq']='RFQ/RFP/RFA';

 $_LANG['comments']='Comments';  
  $_LANG['more']='More';






$_LANG['house']='wharehouse';
         $_LANG['type']='Type';

         
         
         
         //cometype
         
          $_LANG['company']='Company';  
  $_LANG['mcompany']='Tax';
   $_LANG['tcompany']='Transport';
    $_LANG['ocompany']='Overflow';

    #eoe 
    
    $_LANG['eoe1mon']='Pay';
    $_LANG['eoe2mon']='Get';
    $_LANG['eoe5mon']='پرداخت متفرقه';
    $_LANG['eoe7mon']='دریافت متفرقه';
    
      $_LANG['eoe1oil']='Sell';
    $_LANG['eoe2oil']='Buy';
    
    
    $_LANG['unvalid']='invalid';