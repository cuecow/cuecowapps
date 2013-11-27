<?php header('P3P: CP="CAO PSA OUR"');?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
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
<?php $this->load->view('styles/style17.php',$tempdata);?>
<div class="quiz-retail-main-wrapper">
            <div class="quiz-retail-top-slice">
        </div><!--- quiz-retail-top-slice --->
        <div class="quiz-retail-data-slice">
            <div class="main-ssssss">
            <div class="quiz-retail-data-container">
                <img src="<?=  base_url();?>images/images/Quiz_app_retail.png" width="760" height="473" />
                    <div class="quiz-app-retail-cnt">
                    <div class="clear"></div>
                </div><!--- quiz-app-retail-cnt --->
                <div class="clear"></div>
            </div><!--- quiz-retail-data-container --->
            <div class="clear"></div>
            </div>
                <div class="clear"></div>
        </div><!--- quiz-retail-main-data --->
        <div class="quiz-retail-bottom-slice">
        </div><!--- quiz-retail-bottom-slice --->
     </div><!--- quiz-retail-main-wrapper --->
 <div id="overlay">
    <div class="thankyoudiv" align="center">
        <h1>Competition has been Ended </h1>
    </div>
</div>  
</body>
</html>