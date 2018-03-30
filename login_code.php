<?php include 'config.php';  
$myemail=$_REQUEST["myemail"];
$pass=$_REQUEST["pass"];
if($myemail!="" && $pass!="")
{
$chkemial=mysql_query("select * from signup where email='".$myemail."' and password='".$pass."'");
$countemail=mysql_num_rows($chkemial);    
if($countemail > 0)
{
$getuserdata=mysql_fetch_array($chkemial);
$json=array("yes"=>"1","msg"=>"<div class='alert alert-success'>You Are Successfully Login</div>");    
}
else
{
$json=array("yes"=>"0","msg"=>"<div class='alert alert-danger'>Invalid EmailId Or Password</div>");   
}
}
else
{
$json=array("yes"=>"0","msg"=>"<div class='alert alert-danger'>All Parameters Required</div>");
}
echo json_encode($json);
?>