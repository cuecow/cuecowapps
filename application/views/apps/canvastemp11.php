<?php 
header('P3P: CP="CAO PSA OUR"');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function(){ 
    <?php if($_REQUEST['issubmit']==1){?>
    showdialogthankyou();
    <?php }?>
})
</script>
<script>
function thankyou()
{
    if(frm.name.value=="Name" || frm.name.value=="")
    {
        alert('Please enter your Name');
        frm.name.focus();
        return false;
    }
//    else if(frm.email.value=="Email" || frm.email.value=="")
//    {
//        alert('Please enter your Email');
//        frm.email.focus();
//        return false;
//    }
    var y=document.forms["frm"]["email"].value;
	var atpos=y.indexOf("@");
	var dotpos=y.lastIndexOf(".");
        if (y==null || y=="Email")
        {
            alert("Email must be filled out");
            return false;
        }
	else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=y.length)
	  {
	  alert("Not a valid Email address");
	 
	  return false;
	  }
}
  function showdialogthankyou()
   {
    $('#contact-me-app-main-content').hide();
    $('#thank_contact').show();
   }
function framesetsize()
{
    try {
    FB.Canvas.setAutoGrow();
    } catch(e) {
    FB.Canvas.setSize({ width: 810, height: jQuery.height() });
    }
}
</script>
</head>
<body onLoad="framesetsize();" style="overflow:hidden;">
 <div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?=$appid;?>', // App ID
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
    // Additional initialization code here
  };
  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>
<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<div class="main-wrapper" id="contact-me-app-main-content">
        <div class="signup_app_fashion-container">
        <div class="signup_app_fashion-bg-slice-top-left"></div>
        <div class="signup_app_fashion-data-top-middle"></div>
        <div class="signup_app_fashion-bg-slice-top-right"></div>
        <div class="clear"></div>
        <div class="signup_app_fashion-data-middle-left"></div>
        <div class="signup_app_fashion-data-main">

                <div class="signup_app_fashion-top-content-inner">
                    <div class="signup_app_fashion-top-content-inner-heading"><img src="<?=base_url()?>images/images/<?=$tempdata[0][1]['value'];?>" /></div>
                    <div style="clear:both"></div>
                    <a href="http://<?=$tempdata[0][3]['value'];?>" class="signup_app_fashion-facebook" target="_blank"></a>
                </div><!--- signup_app_fashion-top-content-inner --->

            <div style="clear:both"></div>
            <div class="signup_app_fashion-bottom-content">
                <div class="left-col">
                        <div class="signup_app_fashion-top-content-inner-discription">
                        <p><?=$tempdata[1][0]['value'];?></p>
                        <p><?=$tempdata[1][1]['value'];?></p>
                    </div><!--- signup_app_fashion-top-content-inner-discription --->
                </div><!--- left-col --->
                <div class="signup_app_fashion-bottom-separator"></div>
                <div class="right-col">
                    <form action="<?=base_url();?>index.php/signup_app" method="post" name="frm">
                        <input type="text" class="text-field" name="name" value="Name" onFocus="if(this.value=='Name'){this.value=''}" onBlur="if(this.value==''){this.value='Name'}" />
                    <div style="padding:5px 0;"></div>
                    <input type="text" class="text-field" name="email"  value="Email" onFocus="if(this.value=='Email'){this.value=''}" onBlur="if(this.value==''){this.value='Email'}" />                        
                    <input type="submit" class="submit" value="<?=$tempdata[1][4]['value'];?>" onclick="return thankyou();" />
                    <input type="hidden" name="sgnid" value="sign up">
                    <input type="hidden" name="signed_request" value="<?=$_REQUEST['signed_request'];?>" />
                    <input type="hidden" name="appid" value="<?=APPID_VAL?>" />
                    </form>
                </div><!--- right-col --->
            </div><!--- signup_app_fashion-bottom-content --->
        </div><!--- signup_app_fashion-data-main --->
        <div class="signup_app_fashion-data-middle-right"></div>
        <div class="clear"></div>
        <div class="signup_app_fashion-bg-slice-bottom-left"></div>
        <div class="signup_app_fashion-data-bottom-middle"></div>
        <div class="signup_app_fashion-bg-slice-bottom-right"></div>
    </div><!--- signup_app_fashion-container --->
</div>
<div id="overlay" style="display: none;">
    <div class="thankyoudiv" align="center">
        <h3><?=$tempdata[2][1]['value'];?></h3>
    </div>
</div>
    <div align="center" id="thank_contact" style="display: none">
 <script>
jQuery(document).ready(function($){
    window.scrollTo(0,0)
})
 </script>
        <img src="<?=base_url()?>images/500X420/<?=$tempdata[2][2]['value'];?>"  style="width: 500px; height: 420px">
        <h3><?=$tempdata[2][1]['value'];?></h3>
    </div>
</body>
</html>