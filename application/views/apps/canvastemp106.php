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
       <div class="desgin-app-main-wrapper">
	<div class="desgin-app-top-slice">
    </div><!--- desgin-app-top-slice --->
    <div class="desgin-app-data-slice">
    	<div class="desgin-app-top-container">
            <h2><?=$tempdata[1][1]['value'];?></h2>
        </div><!--- desgin-app-top-container --->
        <div class="clear" style="padding:5px"></div>
    	<div class="desgin-app-data-container">          
        <img src="<?=  base_url();?>images/830X420/<?=$tempdata[2][0]['value'];?>" width="760" height="473" />
        	<div class="desgin-app-header-cnt">
        	<div class="desgin-app-left-col"> 
            	<div class="desgin-app-left-img-cnt"><img src="<?=  base_url();?>images/320X196/<?=$tempdata[2][1]['value'];?>" width="292" height="179" /></div>
            </div><!--- desgin-app-left-col --->
            <div class="desgin-app-right-col">
            	<h2><?=$tempdata[2][2]['value'];?></h2>
                <p><?=$tempdata[2][3]['value'];?></p>
                <ul class="desgin-app-list">
                    <?=$tempdata[2][4]['value'];?>
                </ul>
            </div><!--- desgin-app-right-col --->
            </div><!--- desgin-app-header-cnt --->
            <div class="clear"></div>
        </div><!--- desgin-app-data-container --->
        <div class="desgin-app-middle-container">
        <div class="desgin-app-middle-left">
                <h3><?=$tempdata[3][1]['value'];?></h3>
                <p><?=$tempdata[3][2]['value'];?></p>
        </div><!--- desgin-app-middle-left --->
        <div class="desgin-app-middle-right">
        	<img src="<?=  base_url();?>images/407X255/<?=$tempdata[4][2]['value'];?>" width="372" height="235" />
            <p class="desgin-app-middle-right-pera-one"><?=$tempdata[4][1]['value'];?></p>  
            <div class="clear"></div>
            <div class="desgin-app-middle-right-btm-cnt">
            <h3><?=$tempdata[4][3]['value'];?></h3>
            <p><?=$tempdata[4][4]['value'];?></p>
            </div><!--- desgin-app-middle-right-btm-cnt --->
        </div><!--- desgin-app-middle-right --->
        <div class="clear"></div>
        </div><!--- desgin-app-middle-container --->
        <div class="clear"></div>
        <div class="desgin-app-bottom-container">     
            <p><?=$tempdata[5][1]['value'];?></p>
            <a href="#" class="desgin-app-bottom-logo"><img src="<?=  base_url();?>images/95X22/<?=$tempdata[5][2]['value'];?>" width="93" height="20" /></a>
            <div class="clear"></div>
        </div><!--- desgin-app-bottom-container --->
    <div class="clear"></div>
    </div><!--- desgin-app-main-data --->
    <div class="desgin-app-bottom-slice">
    </div><!--- desgin-app-bottom-slice --->
        </div><!--- main-wrapper --->
    <div id="overlay" style="display: none;">
    </div>
</body>
</html>