<?php 
/*set your website title*/

define('WEBSITE_TITLE', "Mercy College School Managment System Software");
define('Developer', 'Davap Integrated Services Ltd');
$protocolLink = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';
$protocolLink = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
$protocolLink = $protocolLink ."://" . $_SERVER['SERVER_NAME'].'/Student/Login';
define('Meta_tag', "Mercy College University | Student Dashboard Settings");
$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';
$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
/*set database variables*/
define('StudentLogin', $protocolLink);
define('DB_TYPE','mysql');
define('DB_NAME','MidTechServer'); 
define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST','localhost');
define('PROTOCAL', $protocol);
/*root and asset paths*/
$path = str_replace("\\", "/",PROTOCAL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . DIRECTORY_SEPARATOR);
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);
define('ROOT', str_replace("app/core/", "", $path));
define('ASSETS', str_replace("app/core", "public/assets", $path));
// This is to access file from management base
define('PATHROOT', str_replace("app/core", "public", $path));
/*set to true to allow error reporting
set to false when you upload online to stop error reporting*/

define('DEBUG',true);

if(DEBUG)
{
	ini_set("display_errors",1);
}else{
	ini_set("display_errors",0);
}