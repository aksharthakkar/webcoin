<!DOCTYPE HTML>
<html>
	<head>
		<title>Safety score</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="96x96" href="images/122.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="css/style.css" rel='stylesheet' type='text/css' />
                         <style>
            #error { color:red;text-align: center;}
            #success { color:green;text-align: center;}
        </style>
    </head>
    <body>
        <section class="register">
            <div class="row">
                <div class="container">
                    <div class=" vendor registration-form ">
                    <div class="row text-center">
                        <h2>Login</h2>
                       <div id="error"></div>
                        <div id="success"></div>
                    </div>
                    <div class="row">
                        <div class="">
                            <form id="signin">
                                <div class="row form-group">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <label>Email ID</label>
                                    <input type="email" id="myemail" class="form-control" placeholder="Email ID">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <label>Password</label>
                                        <input type="password" id="pass" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="row text-center form-group">
                                    <input type="button" id="sgn" onclick="login()" class="btn btn-success" value="Login">
                                </div>
                                <div class="row new-link">
                                    <h4>Don't have an account ? <a href="signup.php">Signup</a></h4>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
function login()
{
var myemail=$("#myemail").val(); 
var pass=$("#pass").val(); 
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;    
if(myemail=="")
{
$("#error").show().html("Please Enter Your Email Id");  
$("#myemail").focus();
}
else if(reg.test(myemail) == false)
{
$("#error").show().html("Please Enter Valid Email Id");      
$("#myemail").focus();
}    
else if(pass=="")
{
$("#error").show().html("Please Enter Your Password");      
$("#pass").focus();
}
else
{   
$("#error").show().html("");    
$.ajax({
     type:"POST",
     url:"login_code.php",
data:"myemail="+myemail+"&pass="+pass,
    dataType:"json",
   beforeSend:function(){ $("#sgn").val("Please Wait...");
     }, success:function(data){
    $("#success").show().html(data.msg);    
    $("#sgn").val("Login");     
    if(data.yes=="1")
    {
$("#mysignup")[0].reset(); 
  setTimeout(function() { window.location.href= "dashboard.php"; }, 1000);
    }
    }    
    }) 
}   
}
    
    
$(document).keypress(function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        login();
    }
});    
    
</script>
    </body>
</html>