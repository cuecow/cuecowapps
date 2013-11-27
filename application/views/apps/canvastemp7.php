<?php header('P3P: CP="CAO PSA OUR"');?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script>
function framesetsize()
{
    FB.Canvas.setAutoGrow();
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
<div class="temp-s7-wrapper">
    <div class="temp-s7-upper-content">
        <h4 class="temp-s7-heading"><?=$tempdata[2][0]['value'];?></h4>
        <p class="temp-s7-pera"><?=$tempdata[2][1]['value'];?></p>
    </div><!--- temp-s7-upper-content --->
    <form action="http://<?=$tempdata[1][2]['value'];?>" name="frm" method="get" target="_blank" onsubmit="return frmvalidate();">
    <div class="temp-s7-fileds">
        <div class="temp-s7-label">
            <label><?=$tempdata[1][0]['value'];?>:</label></div>
        <div class="temp-s7-text-fields"><input type="text" name="name" value="" /></div>
        <div style="clear:both; height:30px;"></div>
        <div class="temp-s7-label">
            <label><?=$tempdata[1][1]['value'];?>:</label></div>
        <div class="temp-s7-text-fields"><input type="text" name="email" value="" /></div>
        <div style="clear:both"></div>
        <div class="temp-s7-submit"><input type="submit" value="Submit" onclick="window.location='signup_app?qid=1'"  /></div>
    </div>
    </form>
    <div style="clear:both;"></div>
</div>
</body>
</html>
<script>
function frmvalidate()
{
    if(frm.name.value=="")
    {
        alert("You didn't enter 'Name'");
        return false;
    }
    if(frm.email.value=="")
    {
        alert("You didn't enter 'Email'");
        return false;
    }    
}
</script>