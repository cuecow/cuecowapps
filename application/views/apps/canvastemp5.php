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
<div class="static-temp-two-wrapper" style="margin-top:20px;">
    <div class="static-temp-two-top-content" align="center">
        <a href="<?=$tempdata[1][1]['value'];?>" target="_blank"><img src="<?=base_url();?>images/images/<?=$tempdata[1][0]['value'];?>" /></a>
    </div><!----- temp-two-top-content ----->
    <div style="clear:both; padding-top:10px;"></div>
    <div class="static-temp-two-left-content" align="right">
        <a href="<?=$tempdata[2][4]['value'];?>" target="_blank"><img src="<?=base_url();?>images/images/<?=$tempdata[2][0]['value'];?>"  /></a>
    </div><!----- static-temp-two-left-content ----->
    <div class="static-temp-two-right-content" align="left">
        <a href="<?=$tempdata[2][5]['value'];?>" target="_blank"><img src="<?=base_url();?>images/images/<?=$tempdata[2][1]['value'];?>" /></a>
    </div><!----- static-temp-two-left-content ----->
    <div style="clear:both; padding-bottom:10px;"></div>
    <div class="static-temp-two-left-content" align="right">
        <a href="<?=$tempdata[2][6]['value'];?>" target="_blank"><img src="<?=base_url();?>images/images/<?=$tempdata[2][2]['value'];?>" /></a>
    </div><!----- static-temp-two-left-content ----->
    <div class="static-temp-two-right-content" align="left">
        <a href="<?=$tempdata[2][7]['value'];?>" target="_blank"><img src="<?=base_url();?>images/images/<?=$tempdata[2][3]['value'];?>" /></a>
    </div><!----- static-temp-two-left-content ----->
    <div style="clear:both; padding-bottom:10px;"></div>
    <div class="static-temp-two-bottom-content">
        <a href="<?=$tempdata[3][3]['value'];?>"><?=$tempdata[3][1]['value'];?></a>
        <a href="<?=$tempdata[3][4]['value'];?>"><?=$tempdata[3][2]['value'];?></a>            
    </div><!----- static-temp-two-bottom-content ----->
    <div style="padding-bottom:10px"></div>
</div><!----- temp-two-wrapper ----->
</body>
</html>