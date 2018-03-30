<?php include 'config.php';  
$fname=$_REQUEST["fname"];
$lname=$_REQUEST["lname"];
$myemail=$_REQUEST["myemail"];
$pass=$_REQUEST["pass"];
if($fname!="" && $lname!="" && $myemail!="" && $pass!="")
{
$chkemial=mysql_query("select * from signup where email='".$myemail."'");
$countemail=mysql_num_rows($chkemial);    
if($countemail > 0)
{
$json=array("yes"=>"0","msg"=>"<div class='alert alert-danger'>Email Id Already Registed Withus</div>");    
}
else
{
$int=mysql_query("insert into signup(`fname`,`lname`,`email`,`password`,`regdate`) values('".$fname."','".$lname."','".$myemail."','".$pass."','".date('Y-m-d H:i:s')."')");    
if($int)
{
$json=array("yes"=>"1","msg"=>"<div class='alert alert-success'>You Are Successfully Signup</div>");    
}
else
{
$json=array("yes"=>"0","msg"=>"<div class='alert alert-danger'>Please Try After Sometime</div>");
}
}
}
else
{
$json=array("yes"=>"0","msg"=>"<div class='alert alert-danger'>All Parameters Required</div>");
}
echo json_encode($json);
?>