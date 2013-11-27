<?php 
header('P3P: CP="CAO PSA OUR"');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
     <div class="design-entertain-main-wrapper">
            <div class="design-entertain-top-slice">
        </div><!--- design-entertain-top-slice --->
        <div class="design-entertain-data-slice">
            <div class="design-entertain-data-container">
            <img src="<?=  base_url();?>images/830X420/<?=$tempdata[1][0]['value'];?>" width="760" height="473" />
                    <div class="design-entertain-header-cnt">
                        <h1><?=$tempdata[1][1]['value'];?></h1>
                        <p><?=$tempdata[1][2]['value'];?></p>
                </div><!--- design-entertain-header-cnt --->
                <div class="clear"></div>
            </div><!--- design-entertain-data-container --->
            <div style="padding:5px 0"></div>
            <div class="design-entertain-bottom-container">
                <?=$tempdata[2][1]['value'];?>
                <div class="clear"></div>
            </div><!--- design-entertain-bottom-container --->
            <div class="design-entertain-middle-container">
            <div class="design-entertain-middle-left">
                    <span class="design-entertain-mddl-left-top-cnt"><?=$tempdata[3][1]['value'];?></span>
                <img src="<?=  base_url();?>images/375X180/<?=$tempdata[3][2]['value'];?>" width="377" height="180" class="design-entertain-middle-left-img-two" />
                <span style="clear:both; display:block; padding:30px 0 0 10px;">
                    <h3><?=$tempdata[3][3]['value'];?></h3>
                    <p><?=$tempdata[3][4]['value'];?></p>
                </span>
            </div><!--- design-entertain-middle-left --->
            <div class="design-entertain-middle-right">
                    <img src="<?=  base_url();?>images/406X490/<?=$tempdata[3][5]['value'];?>" width="372" height="454" />
                <div class="clear"></div>

            </div><!--- design-entertain-middle-right --->
            <div class="clear"></div>
            </div><!--- design-entertain-middle-container --->
            <div class="clear"></div>
            <div class="design-entertain-footer-container">
                <a href="#" class="design-entertain-bottom-logo"><img src="<?=  base_url();?>images/90X25/<?=$tempdata[4][1]['value'];?>" width="88" height="24" /></a>
                <div class="clear"></div>
            </div><!--- design-entertain-bottom-container --->
        <div class="clear"></div>
        </div><!--- design-entertain-main-data --->
        <div class="design-entertain-bottom-slice">
        </div><!--- design-entertain-bottom-slice --->
    </div><!--- design-entertain-main-wrapper --->
</body>
</html>