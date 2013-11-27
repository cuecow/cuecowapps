<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cuecow - the social media engagement platform</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<style>
body {
	background:#19a1f7;
	font-family:Arial, Helvetica, sans-serif;
	color:#fff;
}

.airbreak-wrapper {
	width:810px;
	margin:0px auto;
	position:relative;
}

.field-content {
	display:block;
	width:100%;
}

.field-content:after {
	content:"";
	display:block;
	clear:both;
}

.field-content label {
	display:block;
	width:390px;
	float:left;
	font-size:28px;
	font-weight:bold;
	margin-right:20px;
}

.field-content input[type="text"] {
	display:block;
	padding:5px 5px;
	border:1px solid #eee;
	color:#666;
	font-size:18px;
	float:right;
	width:385px;
}

.field-content {
	margin:10px 0;
}
.field-content textarea {
	display:block;
	padding:5px 5px;
	border:1px solid #eee;
	color:#666;
	font-size:18px;
	height:80px;
	resize: none;
	float:right;
	width:385px;
}

.field-content span.dynamictext {
	padding-left:3px;
	font-size:68px;
	font-weight:bold;
}


.airbreak-wrapper h1 {
    font-size: 250px;
    margin: 0;
    padding: 0;
}

.logo-content {
	position:absolute;
	left:-120px;
}


.airbreak-wrapper h2 {
    font-size: 79px;
    margin: 0px;
    text-align: center;
}

.submit-content button {
	 float: right;
}

.submit-content input:hover {
	background:#0581a9;
	color:#fff;
}

.submit-content input[type="button"] {
	float:left;
}

.submit-content input[type="submit"] {
	float:right;
}
.btn{
      border-color: rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.25);
       -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #F5F5F5;
    background-image: linear-gradient(to bottom, #FFFFFF, #E6E6E6);
    background-repeat: repeat-x;
    border-color: #BBBBBB #BBBBBB #A2A2A2;
    border-image: none;
    border-radius: 4px 4px 4px 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
    color: #333333;
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    line-height: 20px;
    margin-bottom: 0;
    padding: 4px 12px;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;
}

.btn-success {
    background-color: #5BB75B;
    background-image: linear-gradient(to bottom, #62C462, #51A351);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #FFFFFF;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
</style>
<script>
 function back_btn()
 {
     window.history.back();
 }
 
function validate_email()
{
   if(frm.uemail.value=="")
    {
     alert("Email field cannot be empty!");
     frm.uemail.focus();
     return false;   
    }
    else
        {
            var x=document.forms["frm"]["uemail"].value;
            var atpos=x.indexOf("@");
            var dotpos=x.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
            {
                alert("Not a valid e-mail address");
                frm.uemail.focus();
                return false;
            }
        }
}

$( document ).ready(function() {
window.onkeypress = detectspecialkeys;
});
function detectspecialkeys(e){
console.log(e.charCode);
 if(e.charCode===101)
     {
         document.getElementById('error_msg').style.display = 'block'; 
     }
}
</script>
</head>
<body>
<div class="airbreak-wrapper">
	<a href="#" class="logo-content"><img src="<?=base_url()?>images/images/cuecow.png" width="190" height="83" /></a>
        <form name="frm" id="frm" method="post" action="<?=base_url()?>index.php/page/show_error_email" >  
            <h1>ooops,</h1>
            <h2>Help us - help you</h2>
            <div class="field-content">
                <label>Your Email</label>
                <input type="text" name="uemail"  id="uemail"/>
            </div><!-- field-content -->
            <div class="field-content">
                <label>Tell us, what did you just try to do?</label>
                <textarea name="msg" id="msg"></textarea>
            </div><!-- field-content -->
            <div class="field-content">
                <label>Your reference#</label>
                <span class="dynamictext"><?=$guicode ;?></span>
                <input type="hidden" name="guid" id="guid" value="<?=$guicode;?>" />
            </div><!-- field-content -->
            <div class="submit-content">
                <button class="btn btn-success" type="submit" onclick="return validate_email();">Request</button>
                <!--<input type="submit" value="Request" onclick="return validate_email();"/>-->
            </div><!-- submit-content -->
      </form>
        
 <div class="submit-content">
    <button type="button" class="btn" style="float:left;" onclick="back_btn();">Back</button>
 </div>   
<div style="clear:both"></div>  
    <div style="display: none; margin-top: 10px; width:530px;" class="span5" id="error_msg" name="error_msg">
        <pre> <?php print_r($msg3);?> </pre>
    </div>  
</div><!-- airbreak-wrapper -->
</body>
</html>
   