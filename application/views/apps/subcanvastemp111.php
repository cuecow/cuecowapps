<?php 
header('P3P: CP="CAO PSA OUR"');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<script src="<?=  base_url()?>assets/js/jss/jquery-1.9.1.js"></script>
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
    FB.Canvas.setSize({ width: 810, height: 1200 });
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

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1387311748152175";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
 
 function shairimg()
 {
    imgurl = '<?=$imgurl;?>'
    namee = '<?=$captxt;?>';
    username = '<?=$username;?>';
    commnent = '<?=$commnent;?>';
    FB.ui({
          method: 'feed',
          link: 'https://developers.facebook.com/docs/reference/dialogs/',
          picture: imgurl,
          name: namee,
          caption: 'Instagrammed by:'+username+'',
          description: commnent
        }, function(response){
		 console.log(response);
		});
 }
 
 function cometns()
 {
     document.getElementById("fbcoments").style.display="block";

 }
</script>
<?php $this->load->view('styles/style111');?>

<div id="show_image">
    <div class="main-wrapper">
	<div class="content-main-outer">
    	<div class="main-content-two">
        	<img id="fullimage" src="<?=$imgurl;?>" width="790" height="500"/>
            <h3 id="captiontxt"><?=$captxt;?></h3>
        </div>
        <div class="content-two-bottom">
            <div class="content-two-bottom-left">
                <a href="<?=  base_url()?>index.php/instgram_app/showallimages?appid=<?=$appid;?>&pid=<?=$pid;?>" class="thumbnails">Thumbnails</a>
                <a href="#" onclick="cometns(); return false;" class="comments">comments</a>
            </div>
            <div class="content-two-bottom-middle">
                <div class="fb-like" data-href="<?=$imgurl;?>" data-send="false" data-width="450" data-show-faces="true"></div>
            </div>
            <div class="content-two-bottom-right">
                <a href="#" onclick=" shairimg(); return false;">Share</a>
            </div>
            <div class="clearfix"></div>
            <div class="content-two-comment-box" id="fbcoments" style="display:none;">
                <div class="fb-comments" data-href="<?=$imgurl;?>" data-width="470"></div>   
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</div>
</body>

</html>