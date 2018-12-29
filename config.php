<?php
//Admin or Supporter emails Seprated by | 
define('ADMIN_EMAILS', 'nasersobhan@outlook.com|me@nasersobhan.com|other@d.com');
//URis
define("RHOME", dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('HOME', 'http://localhost/products/taskman/'); // Public URL For Core
define('COREHOME', 'http://localhost/products/oy_engine/'); // Public URL For Core
define('PUNAME', 'taskman');
//Query
define('TBL_LIMITE', 20);
//Optimization Configurations
define('THEME', 'qatra');
define('DYNAMIC_URL', FALSE); 
define('ENVIRONMENT', 'production');
define('AUTO_MINIFY', FALSE);

//Def Values
define('DEF_PGDESC', 'Ooya');
define('DEF_PGKEYWORD', 'keywords,for,ooyta');
define("DEF_IMG", COREHOME . "oy_core/oy_theme/def/images/def/404-img.gif");
define("DEF_AVTAR", HOME . "uploads/def/avatar.png");
define("DEF_COVER", HOME . "uploads/def/avatar.png");
//MAIL CONFIG
define ('M_SVR', "ssl://svrn.sobhansoft.com"); ///MAIL Server
define ('M_USR', "auto@ooyta.com"); // MAIL Username
define ('M_PASS', "Naser433@11"); //Mail Passwrd
define ('M_PORT', 465); //PORT
define ('M_AUTH', TRUE); //Auth

//SECURITY Configurations
define("HASH_COST_FACTOR", "10");
define("COOKIE_RUNTIME", 1209600);
define("COOKIE_DOMAIN", ".domain.com");

//  session.cookie_domain = ".ooyta.com";
define("COOKIE_SECRET_KEY", "1gp@TMPS{+$78sfpMJFe-92s");

//define('PUBLIC_FILES_PATH',DATA_CORE_PATH.'/upload/');
/// BUILT-IN Databse{
define('BDB', TRUE); // Active Built-in Database System but can be deffrint database from system database
define('TDB', FALSE); // access built-in data using Access Token
define('BDB_CONSTR', 'CURRENT'); // Built-in Database Connection String
define('TDB_TOKEN', ''); // Built-in data engine Token
define('USER_TYPE', 'DB'); // BDB = get from deffrent databse, TDB = get from URL (using API), DB= in the current Database, false= No User system
define('BTBL_PIX', 'oyt_');
define('AUTOLOADER', TRUE);
$autoloader = AUTOLOADER;
//$user_arr = array("TYPE"=>"CUSTOM", "USER_TBL"=>"","USER_TBL"=>"","USER_TBL"=>"","USER_TBL"=>"","USER_TBL"=>"","USER_TBL"=>"","USER_TBL"=>"","USER_TBL"=>"","USER_TBL"=>"",);
define('HAS_DB', TRUE);
$constring = "serverhost:dbname:dbuser:dbpassword";
define('TYPE_DB', 'MYSQL'); //MYSQL, SQLITE, MSSQL
define('STR_DB', $constring);
define('TBL_PIX', 'sob_');
define('PUB_REGISTER', TRUE);
global $user_arr;
$user_arr['TBL'] = TBL_PIX . "users";
$user_arr['FPX'] = TBL_PIX;
global $user_arr;
///VISUAL 
define('STATISTC_EN', FALSE);
define('LIK_EN', TRUE);

//CATEGORY Functions
define('CATE_EN', TRUE);
//LOCATION Functions
define('LOC_EN', TRUE);
//FILE FUnctions - FIL_EN
define('FIL_EN', TRUE);
// TEST Define
global $userID;
$userID = 1;
define('PUBLIC_FILES_PATH', RHOME . 'uploads');
define('LANG_EN', TRUE);

?>