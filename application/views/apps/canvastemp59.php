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
    <div class="food-design-main-wrapper">
            <div class="food-design-top-slice">
        </div><!--- food-design-top-slice --->
        <div class="food-design-data-slice">
            <div class="food-design-top-container">
                    <h2><?=$tempdata[1][1]['value'];?></h2>
                    <a href="#" class="food-design-logo-header"><img src="<?=  base_url();?>images/images/<?=$tempdata[1][2]['value'];?>" width="122" height="18" /></a>
                <div class="clear"></div>
            </div><!--- food-design-top-container --->
            <div class="clear" style="padding:5px"></div>
            <div class="food-design-data-container">
            <img src="<?=  base_url();?>images/images/<?=$tempdata[2][0]['value'];?>" width="760" height="473" />
                    <div class="food-design-header-cnt">
                    <h2><?=$tempdata[2][2]['value'];?></h2>
                    <p><?=$tempdata[2][3]['value'];?></p>
                    <ul class="food-design-list">
                    <?=$tempdata[2][4]['value'];?>
                    </ul>

                </div><!--- food-design-header-cnt --->
                <div class="food-design-discription-cnt">
                    <h3 class="food-design-discription-cnt-heading"><?=$tempdata[2][6]['value'];?></h3>
                    <div class="clear"></div>
                    <p class="food-design-discription-cnt-ds"><?=$tempdata[2][7]['value'];?></p>
                </div><!--- food-design-discription-cnt --->
                <div class="clear"></div>
            </div><!--- food-design-data-container --->
            <div class="food-design-middle-container">

            <div class="food-design-middle-left">
                <div style="height:215px;"></div>
                <div class="food-design-left-middle-btm-cnt food-design-orng-tb">
                    <h3><?=$tempdata[3][4]['value'];?></h3>
                    <p><?=$tempdata[3][5]['value'];?></p>

                </div><!--- food-design-left-middle-btm-cnt --->
            </div><!--- food-design-middle-left --->
            <div class="food-design-middle-right">
                    
                <div class="food-design-middle-right-cnt">
                    <h3><?=$tempdata[3][1]['value'];?></h3>
                    <p><?=$tempdata[3][2]['value'];?></p>
                    <img src="<?=  base_url();?>images/images/<?=$tempdata[3][6]['value'];?>" width="335" height="235" />
                </div><!--- food-design-middle-right-cnt ---->
                <div class="clear"></div>

            </div><!--- food-design-middle-right --->
            <div class="clear"></div>
            </div><!--- food-design-middle-container --->
            <div class="clear"></div>
            <div class="food-design-bottom-container">
                    <p><?=$tempdata[4][1]['value'];?></p>

                <div class="clear"></div>
            </div><!--- food-design-bottom-container --->
        <div class="clear"></div>
        </div><!--- food-design-main-data --->
        <div class="food-design-bottom-slice">
        </div><!--- food-design-bottom-slice --->
    </div><!--- food-design-main-wrapper --->
    <div id="overlay" style="display: none;">
    </div>
</body>
</html>