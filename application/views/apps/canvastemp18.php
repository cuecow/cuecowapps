<?php 
header('P3P: CP="CAO PSA OUR"');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
?>
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
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if($('input[type=radio]').is(':checked') == false)
    {
        alert('Please Select One Option!');
        return false;
    }        
    
    if(frm.name.value=="Name" || frm.name.value=="")
    {
        alert('Please enter your Name');
        frm.name.focus();
        return false;
    }
    else if(frm.email.value=="Email" || frm.email.value=="")
    {
        alert('Please enter your Email');
        frm.email.focus();
        return false;
    }
	else if( !emailPattern.test(frm.email.value))
	{
	   alert("Enter valid email");
	   frm.email.focus();
	   return false;
	} 
} 
function showdialogthankyou()
   {
    $( '#overlay' ).fadeIn( 'slow' );
   }
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
        <div class="quiz-food-main-wrapper">
            <div class="quiz-food-top-slice">
        </div><!--- quiz-food-top-slice --->
        <div class="quiz-food-data-slice">
            <div class="main-ssssss">
            <div class="quiz-food-data-container">
                <img src="<?= base_url();?>images/760X444/<?=$tempdata[1][1]['value'];?>" width="760" height="473" />
                <img src="<?= base_url();?>images/340X340/<?=$tempdata[2][0]['value'];?>" class="Quiz-app-food-heading" width="166" />
                    <div class="Quiz-app-food-discription-cnt">
                    <h3 class="Quiz-app-food-discription-cnt-heading"><?=$quiz['qheading'];?></h3>
                    <p class="Quiz-app-food-discription-cnt-ds"><?=$quiz['qdescription'];?></p>
                    </div><!--- Quiz-app-food-discription-cnt --->
                <div class="clear"></div>
            </div><!--- quiz-food-data-container --->

            <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <form method="post" action="<?=base_url();?>index.php/quiz_app" name="frm" id="frm">
            <div class="clear"></div>
            <div class="quiz-food-middle-cnt">
            <div class="clear"></div>
            <div class="quiz-food-list-heading"><?=$tempdata[3][0]['value'];?></div>
                <?php foreach($options as $option){ ?>
                    <div id="quiz-food-list">
                    <div class="Quiz-app-food-icon"><img src="<?= base_url();?>images/images/<?=$option['optionimg1'];?>" width="58" /></div>
                    <div class="Quiz-app-food-form-outer">
                        <div class="quiz-food-list-radio-btn"><input type="radio" name="option" value="<?=$option['id'];?>" ></div>
                        <div class="quiz-food-list-pera food-code-txt"><?=$option['optiontxt'];?> </div>
                    </div><!--- Quiz-app-food-form-outer --->
                    <div class="clear"></div>
                    </div><!--- quiz-food-list --->
                    <?php } ?>
                    <div class="clear"></div>

                </div><!--- quiz-food-middle-cnt --->
                <div class="clear"></div>
                <div class="quiz-food-input-fields">
                <div class="quiz-food-input-fields-left">
                    <div class="quiz-food-input-fields-inpt">
                        <input type="text" class="quiz-food-input"  value="<?=$tempdata[3][4]['value'];?>" name="name" onBlur="if(this.value==''){this.value='<?=$tempdata[3][4]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][4]['value'];?>'){this.value=''}"/>
                    </div><!---- end quiz-food-input-fields-inpt ------>
                    <div class="quiz-food-input-fields-inpt">
                        <input type="text" class="quiz-food-input"  value="<?=$tempdata[3][5]['value'];?>" name="email" onBlur="if(this.value==''){this.value='<?=$tempdata[3][5]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][5]['value'];?>'){this.value=''}"/>
                    </div><!---- end quiz-food-input-fields-inpt ------>
                    </div><!--- quiz-food-input-fields-left --->
                    <div class="quiz-food-input-fields-right">
                            <div class="quiz-food-input-fields-inpt">
                        <input type="text" class="quiz-food-input"  value="<?=$tempdata[3][6]['value'];?>" name="phone" onBlur="if(this.value==''){this.value='<?=$tempdata[3][6]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][6]['value'];?>'){this.value=''}"/>
                    </div><!---- end quiz-food-input-fields-inpt ------>
                    <div class="quiz-food-input-fields-inpt">
                        <input type="text" class="quiz-food-input"  value="<?=$tempdata[3][7]['value'];?>" name="address" onBlur="if(this.value==''){this.value='<?=$tempdata[3][7]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][7]['value'];?>'){this.value=''}"/>
                    </div><!---- end quiz-food-input-fields-inpt ------>
                    <div class="clear:both"></div>
                    <input type="submit" value="<?=$tempdata[3][8]['value'];?>" name="submit" class="quiz-food-submit" onclick="return frmvalidate();" />

                    </div><!--- quiz-food-input-fields-right --->
                    <input type="hidden" name="qid" value="<?=$quiz['id']?>">
                    <input type="hidden" name="signed_request" value="<?=$_REQUEST['signed_request'];?>" />
                    <input type="hidden" name="appid" value="<?=APPID_VAL?>" />
                  </form>
                </div><!--- quiz-food-input-fields --->
                <div class="clear"></div>
                <div class="food-quiz-bottom-content">
                   <?=$tempdata[4][0]['value'];?>
                </div><!--- quiz-food-bottom-content --->
                <div class="clear"></div>
        </div><!--- quiz-food-main-data --->
        <div class="quiz-food-bottom-slice">
        </div><!--- quiz-food-bottom-slice --->
    </div><!--- quiz-food-main-wrapper --->
<div id="overlay" style="display: none;">
    <div class="thankyoudiv" align="center">
        <h56><?=$tempdata[5][0]['value'];?></h56>
    </div>
</div>
</body>
</html>