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
<?php 
$attribut = array('name'=>'quizfrm');
echo form_open('quiz_app',$attribut);
$this->load->view('styles/style'.$tempid,$tempdata);?>
<div id="mainraper">
    <!--Content Div -->
    <div id="contentdiv"> 
        <!--head porition -->
        <div id="bannerbg">
            <div id="bannertxtbg"> 
                <h2><?=$quiz['qheading']?></h2>
                <p><?=$quiz['qdescription']?></p>
            </div>		
        </div>
        <!--End head porition -->
        <!--Question porition -->
        <div style="clear:both"></div>
        <?php 
        shuffle($options);
        foreach($options as $option){
        if($option['is_hide']==1){
        ?>
        <div id="quizdiv">
            <div class="tab-inpt-ccc"><input type="radio" name="option" value="<?=$option['id'];?>"></div>
            <div class="tab-cnt"><?=$option['optiontxt'];?></div>
        </div>
        <div style="clear:both"></div>
        <?php }}?>
        <div class="middle-content">
            <div class="cnt-mddl-inpt">
                <span class="inpt-title-ddd"><?=$tempdata[2][0]['value']?></span> 
                <br>
                <input type="text" name="name">
            </div><!---- end cnt-mddl-inpt ------>
            <div class="cnt-mddl-inpt">
                <span class="inpt-title-ddd"><?=$tempdata[2][1]['value']?></span>
                <br>
                <input type="text" name="email">
            </div><!---- end cnt-mddl-inpt ------>
            <div class="cnt-mddl-inpt">
                <span class="inpt-title-ddd"><?=$tempdata[2][2]['value']?></span>
                <br>
                <input type="text" name="address">
            </div><!---- end cnt-mddl-inpt ------>
            <div class="cnt-mddl-inpt">
                <span class="inpt-title-ddd"><?=$tempdata[2][3]['value']?></span>
                <br>
                <input type="text" name="phone">
            </div><!---- end cnt-mddl-inpt ------>
            <div class="sb-btn"><input type="submit" value="Submit"></div>
        </div><!---- end middle content ----->	
        <div style="clear:both"></div>
        <div class="bottom-content">
            <p><?=$tempdata[3][1]['value']?></p>
        </div><!--- bottom-content ----->					
    </div><!--End Content Div -->
    <br>
</div>
<input type="hidden" name="qid" value="<?=$quiz['id']?>">
<input type="hidden" name="signed_request" value="<?=$_REQUEST['signed_request'];?>" />
<input type="hidden" name="appid" value="<?=APPID_VAL?>" />
</form>
</body>
</html>