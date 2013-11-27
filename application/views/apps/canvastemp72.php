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
function thankyou()
{
    if(frm.name.value=="Name" || frm.name.value=="")
    {
        alert('Please enter your Name');
        frm.name.focus();
        return false;
    }
    else if(frm.email.value=="Email" || frm.email.value=="")
    {
        alert('Please enter your Email');
        frm.email.focus();
        return false;
    }
    else
    {
        $( '#overlay' ).fadeIn( 'slow' );
    }
     
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
<div class="main-wrapper">
    <div class="signup_app_entertain-container">
    <div class="signup_app_entertain-bg-slice-top-left"></div>
    <div class="signup_app_entertain-data-top-middle"></div>
    <div class="signup_app_entertain-bg-slice-top-right"></div>
    <div class="clear"></div>
    <div class="signup_app_entertain-data-middle-left"></div>
    <div class="signup_app_entertain-data-main">
        <div class="signup_app_entertain-top-content">
            <div class="signup_app_entertain-top-content-inner">
                    <div class="signup_app_entertain-top-content-inner-heading"><h1 style="padding-top: 0px !important;"><?=$tempdata[0][1]['value'];?></h1></div>
                <div class="signup_app_entertain-top-content-inner-discription">
                    <p><?=$tempdata[0][2]['value'];?></p>
                    <p><?=$tempdata[0][3]['value'];?></p>
                </div><!--- signup_app_entertain-top-content-inner-discription --->
            </div><!--- signup_app_entertain-top-content-inner --->
        </div><!--- signup_app_entertain-top-content --->
        <div style="clear:both"></div>
        <div class="signup_app_entertain-bottom-content">
            <div class="left-col">
                <form action="http://<?=$tempdata[1][6]['value'];?>" method="get" target="_blank" name="frm">
                    <input type="text" class="text-field" name="name" value="Name" onFocus="if(this.value=='Name'){this.value=''}" onBlur="if(this.value==''){this.value='Name'}" />
                    <input type="text" class="text-field" name="email"  value="Email" onFocus="if(this.value=='Email'){this.value=''}" onBlur="if(this.value==''){this.value='Email'}" />
                    <input type="submit" class="submit" value="<?=$tempdata[1][2]['value'];?>" onclick="return thankyou();"  />
                </form>
            </div><!--- left-col --->
            <div class="signup_app_entertain-bottom-separator"></div>
            <div class="right-col">
                <p><?=$tempdata[1][3]['value'];?></p>
                <a href="http://<?=$tempdata[1][5]['value'];?>" class="facebook-btn"></a>
            </div><!--- right-col --->
        </div><!--- signup_app_entertain-bottom-content --->
    </div><!--- signup_app_entertain-data-main --->
    <div class="signup_app_entertain-data-middle-right"></div>
    <div class="clear"></div>
    <div class="signup_app_entertain-bg-slice-bottom-left"></div>
    <div class="signup_app_entertain-data-bottom-middle"></div>
    <div class="signup_app_entertain-bg-slice-bottom-right"></div>
</div><!--- signup_app_entertain-container --->
</div>
<div id="overlay" style="display: none;">
    <div class="thankyoudiv" align="center">
        <h3><?=$tempdata[2][1]['value'];?></h3>
    </div>
</div>
</body>
</html>