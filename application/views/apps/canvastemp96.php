<?php 
header('P3P: CP="CAO PSA OUR"');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
?>
<html>
<title>Contact App</title>
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
function frmvalidate()
{
    var x=document.forms["frm"]["email"].value;
     var atpos=x.indexOf("@");
     var dotpos=x.lastIndexOf(".");
    
    if(frm.name.value=="Name" || frm.name.value=="")
    {
        alert('Please enter your Name');
        frm.name.focus();
        return false;
    }
    
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
       alert("Enter a valid e-mail address");
       frm.subject.focus();
       return false;
    }
    
    else if(frm.email.value=="Email" || frm.email.value=="")
    {
        alert('Please enter your Email');
        frm.email.focus();
        return false;
    }
    else if(frm.subject.value=="Subject" || frm.subject.value=="")
    {
        alert('Please enter your Email Subject');
        frm.subject.focus();
        return false;
    }
    else if(frm.message.value=="")
    {
        alert('Please enter your Message');
        frm.message.focus();
        return false;
    }
} 
function showdialogthankyou()
   {
    $('#contact-me-app-main-content').hide();
    $('#thank_contact').show();
   }
</script>
</head>
<body style="overflow:hidden;">
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
    try {
    FB.Canvas.setAutoGrow();
    } catch(e) {
    FB.Canvas.setSize({ width: 810, height: jQuery.height() });
    }
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
   <div class="contact-me-app-main-content" id="contact-me-app-main-content">
        <h2 class="contact-me-app-title"><?=$tempdata[0][15]['value'];?></h2>
        <form class="contact-me-app-form"  method="post" action="<?=base_url();?>index.php/contactme_app" name="frm" id="frm">
            <div class="admin-form-cnt">
                <img src="<?=  base_url();?>images/770X470/<?=$tempdata[0][14]['value'];?>" width="770" height="500">
                <div class="overlay-content-one">
                    <h1><?=$tempdata[0][16]['value'];?></h1>
                    <p><?=$tempdata[0][17]['value'];?></p>
                </div>    
            </div><!--- admin-form-cnt --->
            <div class="contact-me-app-field-set">
                <label><?=$tempdata[0][2]['value'];?></label>
                <input type="text" class="adress-two-fld-space" value="<?=$tempdata[0][1]['value'];?>" name="name" onBlur="if(this.value==''){this.value='<?=$tempdata[0][1]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[0][1]['value'];?>'){this.value=''}"/>
            </div><!--- mysetting-field-set --->
            <div style="clear:both"></div>
            <div class="contact-me-app-field-set">
                <label><?=$tempdata[0][4]['value'];?></label>
                <input type="text" class="adress-two-fld-space" value="<?=$tempdata[0][3]['value'];?>" name="email" onBlur="if(this.value==''){this.value='<?=$tempdata[0][3]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[0][3]['value'];?>'){this.value=''}"/>
            </div><!--- mysetting-field-set --->
            <div style="clear:both"></div>
            <div class="contact-me-app-field-set">
                <label><?=$tempdata[0][6]['value'];?></label>
                <input type="text" class="adress-two-fld-space" value="<?=$tempdata[0][5]['value'];?>" name="phone" onBlur="if(this.value==''){this.value='<?=$tempdata[0][5]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[0][5]['value'];?>'){this.value=''}"/>
            </div><!--- mysetting-field-set --->
            <div style="clear:both"></div>
            <div class="contact-me-app-field-set">
                <label><?=$tempdata[0][13]['value'];?></label>
                <input type="text" class="adress-two-fld-space" name="subject" value="<?=$tempdata[0][12]['value'];?>" name="phone" onBlur="if(this.value==''){this.value='<?=$tempdata[0][12]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[0][12]['value'];?>'){this.value=''}"/>
            </div><!--- mysetting-field-set --->
            <div style="clear:both"></div>

            <div class="contact-me-app-field-set">
                <label><?=$tempdata[0][8]['value'];?></label>
                <textarea name="message"></textarea>
            </div><!--- mysetting-field-set --->
                <input type="submit" value="<?=$tempdata[0][9]['value'];?>" class="send-message-btn" onclick="return frmvalidate();"/>
           
            <input type="hidden" name="emialid" value="<?=$tempdata[0][10]['id'];?>" />    
            <input type="hidden" name="signed_request" value="<?=$_REQUEST['signed_request'];?>" />
            <input type="hidden" name="appid" value="<?=APPID_VAL?>" />
            <input type="hidden" name="admin_email" value="<?=$tempdata[0][10]['value'];?>" />
        </form>
        <div style="clear:both"></div>
    </div><!--- contect-me-app-main-content --->
    <div align="center" id="thank_contact" style="display: none">
 <script>
jQuery(document).ready(function($){
    window.scrollTo(0,0)
})
 </script>
        <img align="center" src="<?=  base_url();?>images/images/contact_email.png" width="550" height="400">
        <?=$tempdata[1][0]['value'];?>
    </div>
</body>
</html>