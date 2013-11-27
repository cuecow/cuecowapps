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
    <div class="page-design-main-wrapper">
            <div class="page-design-top-slice">
        </div><!--- page-design-top-slice --->
        <div class="page-design-data-slice">
            <div class="page-design-top-container">
                    <h2><?=$tempdata[1][1]['value'];?></h2>
                    <a href="#" class="page-design-logo-header"><img src="<?=  base_url();?>images/150X20/<?=$tempdata[1][2]['value'];?>" width="145" height="17" /></a>
                <div class="clear"></div>
            </div><!--- page-design-top-container --->
            <div class="clear" style="padding:5px"></div>
            <div class="page-design-data-container">
            <img src="<?=  base_url();?>images/830X420/<?=$tempdata[2][0]['value'];?>" width="760" height="473" />
                    <div class="page-design-header-cnt">
                        <h2><?=$tempdata[2][2]['value'];?></h2>
                        <p><?=$tempdata[2][3]['value'];?></p>
                    <ul class="page-design-list">
                        <?=$tempdata[2][4]['value'];?>
                    </ul>

                </div><!--- page-design-header-cnt --->
                <div class="clear"></div>
            </div><!--- page-design-data-container --->
            <div class="page-design-middle-container">

            <div class="page-design-middle-left">
                    <div class="page-design-photos-cnt">
                    <img src="<?=  base_url();?>images/128X160/<?=$tempdata[3][0]['value'];?>" width="117" height="147" class="page-design-images-thmb" />
                    <img src="<?=  base_url();?>images/128X160/<?=$tempdata[3][1]['value'];?>" width="117" height="147" class="page-design-images-thmb" />
                    <img src="<?=  base_url();?>images/128X160/<?=$tempdata[3][2]['value'];?>" width="117" height="147" class="page-design-images-thmb" />
                    <div class="clear"></div>
                    <p><?=$tempdata[3][3]['value'];?></p>
                </div><!--- page-design-photos-cnt --->
                <div class="page-design-left-middle-btm-cnt">
                    <h3><?=$tempdata[3][5]['value'];?></h3>
                    <p><?=$tempdata[3][6]['value'];?></p>
                </div><!--- page-design-left-middle-btm-cnt --->
            </div><!--- page-design-middle-left --->
            <div class="page-design-middle-right">
                    <img src="<?=  base_url();?>images/406X490/<?=$tempdata[4][1]['value'];?>" width="372" height="454" />
                <h3><?=$tempdata[4][0]['value'];?></h3>
                <div class="clear"></div>

            </div><!--- page-design-middle-right --->
            <div class="clear"></div>
            </div><!--- page-design-middle-container --->
            <div class="clear"></div>
            <div class="page-design-bottom-container">
                    <p><?=$tempdata[5][1]['value'];?></p>
                <div class="clear"></div>
            </div><!--- page-design-bottom-container --->
        <div class="clear"></div>
        </div><!--- page-design-main-data --->
        <div class="page-design-bottom-slice">
        </div><!--- page-design-bottom-slice --->
    </div><!--- page-design-main-wrapper --->
    <div id="overlay" style="display: none;">
    </div>
</body>
</html>