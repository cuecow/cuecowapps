<?php header('P3P: CP="CAO PSA OUR"');?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script>
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
<?php 
$attribut = array('name'=>'quizfrm');
echo form_open('quiz_app',$attribut);
$this->load->view('styles/style'.$tempid,$tempdata);?>
<div id="mainraper-white">
    <div class="logo-white">
        <img src="<?=base_url()?>images/images/<?=$tempdata[0][1]['value'];?>" width="80" height="80">
    </div>
    <!--Content Div -->
    <div id="contentdiv-white"> 
            <!--head porition -->					
            <div id="topimage" align="center"><img src="<?=base_url();?>images/images/<?=$tempdata[1][2]['value'];?>" /></div>
            <div style="clear:both"></div>
            <div id="bannertxtbg-white"> 
                <h2><?=strip_tags($quiz['qheading'],QUIZ_TAGS);?></h2>
                <p><?=strip_tags($quiz['qdescription'],QUIZ_TAGS);?></p>
            </div>
            <div style="clear:both"></div>
            <?php 
            shuffle($options);
            foreach($options as $option){
            if($option['is_hide']==1){
            ?>
            <div id="quizdiv-white">
                <div class="tab-inpt-white"><input type="radio" name="option" value="<?=$option['id'];?>"></div>
                <div class="tab-cnt-white"><?=$option['optiontxt'];?></div>
            </div>
            <div style="clear:both"></div>
            <?php }}?>
            <!--End Question porition -->
            <div style="clear:both"></div>
            <div class="middle-content-white">
                    <div class="cnt-mddl-inpt-white">
                        <span class="inpt-title-ddd"><?=$tempdata[2][0]['value']?></span>
                        <br>
                        <input type="text" name="name">
                    </div><!---- end cnt-mddl-inpt ------>
                    <div class="cnt-mddl-inpt-white">
                        <span class="inpt-title-white"><?=$tempdata[2][1]['value']?></span>
                        <br>
                        <input type="text" style="width:345px;" name="email">
                    </div><!---- end cnt-mddl-inpt ------>							
                    <div class="sb-btn-white"><input type="submit" value=" Deltag "></div>
            </div><!---- end middle content ----->	
            <div style="clear:both"></div>
            <div class="bottom-content-white">
                <a href="http://radio100.dk/artikler/sms-og-konkurrenceregler.9397.html" target="_blank"><?=$tempdata[3][1]['value']?></a>
            </div><!--- bottom-content ----->
            <div style="clear:both"></div>						
    </div><!--End Content Div -->				
</div>
<input type="hidden" name="qid" value="<?=$quiz['id']?>">
<input type="hidden" name="signed_request" value="<?=$_REQUEST['signed_request'];?>" />
<input type="hidden" name="appid" value="<?=APPID_VAL?>" />
</form>
</body>
</html>