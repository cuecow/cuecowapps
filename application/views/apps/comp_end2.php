<?php header('P3P: CP="CAO PSA OUR"');?>
<html>
<head>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
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
<div id="mainraper">
    <div id="container-cmpt-ovr">
        <!--Content Div -->
        <div id="contentdiv-cmpt-ovr"> 
            <!--head porition -->
            <div class="cmpt-ovr-img-cnt"><img src="<?=base_url();?>images/images/<?=$tempdata[5][1]['value']?>" width="794"></div>
            <!--- compitition over page image content ----->
        </div><!--End Content Div -->
    </div>
</div>
</form>
</body>
</html>