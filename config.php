<?php session_start();
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$con=mysql_connect("localhost","root","");
$db=mysql_select_db("safety");
if(!isset($db))
{
echo die(mysql_error()); 
}

?>