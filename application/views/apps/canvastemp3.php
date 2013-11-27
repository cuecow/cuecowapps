<?php header('P3P: CP="CAO PSA OUR"');?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>    
 jQuery(document).ready(function($){ 
    <?php if($_REQUEST['issubmit']==1){?>
       showdialogthankyou();
    <?php }?>
 })
</script>
<script>
function frmvalidate()
{

    if($('input[type=radio]').is(':checked') == false)
    {
        alert('Please Select One Option!');
        return false;
    }        
    
    else if(quizfrm.name.value=="Name" || quizfrm.name.value=="")
    {
        alert('Please enter your Name');
        quizfrm.name.focus();
        return false;
    }
    else if(quizfrm.email.value=="Email" || quizfrm.email.value=="")
    {
        alert('Please enter your Email');
        quizfrm.email.focus();
        return false;
    }
}  
function showdialogthankyou()
{
    $('#mainraper').hide();
    $('#editthankyoupage').show();
}

</script>
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
<?php 
$attribut = array('name'=>'quizfrm');
echo form_open('quiz_app',$attribut);
$this->load->view('styles/style'.$tempid,$tempdata);?>
<div id="mainraper">
    <!--Content Div -->
    <div id="contentdiv">
            <!--head porition -->
        <div id="bannerbg-page-two">
            <div id="bannertxtbg-page-two"> 
                <div class="bnr-inner-pg-two">
                    <h2 style="color:#000"><?=$quiz['qheading']?></h2>
                    <p><?=$quiz['qdescription']?></p>
                </div>
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
        <!--End Question porition -->
        <div style="clear:both"></div>
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
            <div class="sb-btn"><input type="submit" value="Submit" onclick="return frmvalidate();"></div>
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

    <div id="editthankyoupage" style="display:none">
        <div id="mainraper">	
            <div id="container-thanks2">
                <!--Content Div -->
                <div id="contentdiv-thanks2"> 
                    <!--head porition -->
                    <div class="title-div-thanks2">
                        <?=$tempdata[4][2]['value']?>
                    </div><!--- thnk-title-div ---->
                    <div class="mdl-img-cnt-thanks2">
                        <img src="<?=base_url()?>images/images/<?=$tempdata[4][3]['value']?>" width="740">
                    </div><!---- midle image content ---->
                    <div class="btm-div-thanks2"><?=$tempdata[4][5]['value']?></div>
                    <!--- thnk-title-div ---->
                </div><!--End Content Div -->	
            </div>
        </div>
    </div>
</body>
</html>