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
        alert('Please Select Option!');
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
//	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
//	else if( !emailPattern.test(frm.email.value))
//	{
//	   alert("Enter valid email");
//	   frm.email.focus();
//	   return false;
//	} 
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
        <div class="main-wrapper">
            <form action="<?=base_url();?>index.php/quiz_app" method="post" name="frm" id="frm">
            <div class="Quiz_app_fashion-container">
                <div class="Quiz_app_fashion-bg-slice-top-left"></div>
                <div class="Quiz_app_fashion-data-top-middle"></div>
                <div class="Quiz_app_fashion-bg-slice-top-right"></div>
                <div class="clear"></div>
                <div class="Quiz_app_fashion-data-middle-left_convas"></div>
                <div class="Quiz_app_fashion-data-main_convas">
                    <div class="Quiz_app_fashion-banner">
                    <a href="#" class="Quiz_app_fashion-logo"></a>
<!--                    <a href="#" class="Quiz_app_fashion-share"></a>-->
                    </div><!--- Quiz_app_fashion-banner --->
                    <div class="clear"></div>
                    <div class="Quiz_app_fashion-top-cnt">
                    <?=$quiz['qheading'];?>
                    </div>                
                    <?php foreach($options as $option){?>
                    <!--- Quiz_app_fashion-top-cnt --->
                    <div class="Quiz_app_fashion-tab-cnt">
                        <div class="Quiz_app_fashion-tab-cnt-left-col">
                            <span class="Quiz_app_fashion-tab-cnt-left-col-image-cnt"><img src="<?=base_url()?>images/118X148/<?=$option['optionimg1'];?>" style="width:118px; height:148px" /></span>
                            <span class="Quiz_app_fashion-tab-cnt-left-col-image-cnt"><img src="<?=base_url()?>images/118X148/<?=$option['optionimg2'];?>" style="width:118px; height:148px" /></span>
                            <span class="Quiz_app_fashion-tab-cnt-left-col-image-cnt"><img src="<?=base_url()?>images/118X148/<?=$option['optionimg3'];?>" style="width:118px; height:148px" /></span>
                            <div class="clear"></div>
                        </div><!--- Quiz_app_fashion-tab-cnt-left-col --->
                        <div class="Quiz_app_fashion-tab-cnt-right-col">
                                <span class="Quiz_app_fashion-tab-cnt-right-col-one"><input type="radio" name="option" value="<?=$option['id'];?>" /></span>
                            <p><?=$option['optiontxt'];?></p>
                        </div><!--- Quiz_app_fashion-tab-cnt-right-col --->
                        <div class="clear"></div>
                    </div><!--- Quiz_app_fashion-tab-cnt --->
                    <div class="clear"></div>
                    <?php }?>
                    
                    <div class="Quiz_app_fashion-forms-fields">
                        <div  style="position: absolute; margin-top: -3px; margin-left: -149px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change Text</a>
                        </div>
                        <span class="Quiz_app_fashion-forms-fields-title"><?=$tempdata[3][0]['value'];?></span>
                        <div class="Quiz_app_fashion-forms-fields-left">
                        <input type="text" class="Quiz_app_fashion-forms-text-field" value="<?=$tempdata[3][1]['value'];?>" name="name" onBlur="if(this.value==''){this.value='<?=$tempdata[3][1]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][1]['value'];?>'){this.value=''}" />
                        <div class="clear"></div>
                        <input type="text" class="Quiz_app_fashion-forms-text-field" value="<?=$tempdata[3][2]['value'];?>" name="email" onBlur="if(this.value==''){this.value='<?=$tempdata[3][2]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][2]['value'];?>'){this.value=''}" />
                        </div><!--- Quiz_app_fashion-forms-fields-left --->
                        <div class="Quiz_app_fashion-forms-fields-right">
                        <input type="text" class="Quiz_app_fashion-forms-text-field" value="<?=$tempdata[3][3]['value'];?>" name="phone" onBlur="if(this.value==''){this.value='<?=$tempdata[3][3]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][3]['value'];?>'){this.value=''}"/>
                        <div class="clear"></div>
                        <input type="text" class="Quiz_app_fashion-forms-text-field" value="<?=$tempdata[3][4]['value'];?>" name="address" onBlur="if(this.value==''){this.value='<?=$tempdata[3][4]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][4]['value'];?>'){this.value=''}"/>
                        </div><!--- Quiz_app_fashion-forms-fields-right --->
                        <div class="Quiz_app_fashion-forms-fields-two">
                                <input class="Quiz_app_fashion-form-submit" type="submit" value="<?=$tempdata[3][5]['value'];?>" onclick="return frmvalidate();"/>
                        </div><!--- Quiz_app_fashion-forms-fields-two --->
                        <div class="clear"></div>
                    </div><!--- Quiz_app_fashion-forms-fields --->
                    <div class="clear"></div>
                    <div class="Quiz_app_fashion-bottom-content">
                        <p><?=$tempdata[4][1]['value'];?></p>
                    </div><!--- Quiz_app_fashion-bottom-content --->
                </div><!--- Quiz_app_fashion-data-main --->
                <div class="Quiz_app_fashion-data-middle-right_convas"></div>
                <div class="clear"></div>
                <div class="Quiz_app_fashion-bg-slice-bottom-left"></div>
                <div class="Quiz_app_fashion-data-bottom-middle"></div>
                <div class="Quiz_app_fashion-bg-slice-bottom-right"></div>
            </div><!--- Quiz_app_fashion-container --->
            <input type="hidden" name="qid" value="<?=$quiz['id']?>">
            <input type="hidden" name="signed_request" value="<?=$_REQUEST['signed_request'];?>" />
            <input type="hidden" name="appid" value="<?=APPID_VAL?>" />
            </form> 
        </div><!--- main-wrapper ---> 
<div id="overlay" style="display: none;">
    <div class="thankyoudiv" align="center">
        <h56><?=$tempdata[5][0]['value'];?></h56>
    </div>
</div>
</body>
</html>