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
jQuery(document).ready(function(){ 
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
	else if(!emailPattern.test(frm.email.value))
	{
	   alert("Enter valid email");
	   frm.email.focus();
	   return false;
	} 
}
function showdialogthankyou()
   {
    document.getElementById('EditCompetitionOverPage').style.display = 'block';
    document.getElementById('quiz-retail-main-wrapper').style.display = 'none';
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
    <div class="quiz-retail-main-wrapper" id="quiz-retail-main-wrapper">
        <div class="quiz-retail-top-slice">
        </div><!--- quiz-retail-top-slice --->
        <div class="quiz-retail-data-slice">
            <div class="main-ssssss">
            <div class="quiz-retail-data-container">
            <img src="<?=base_url();?>images/760X444/<?=$tempdata[1][0]['value'];?>" width="760" height="473" />
                    <div class="quiz-app-retail-cnt">
                    <p class="quiz-app-retail-heading"><?=$tempdata[1][1]['value']?></p>
                    <div class="clear"></div>
                    <div class="quiz-app-retail-cnt-left">
                        <?=$quiz['qheading'];?>
                    </div><!--- quiz-app-retail-cnt-left --->
                    <div class="quiz-app-retail-cnt-right">
                        <?=$quiz['qdescription'];?>
                    </div><!--- quiz-app-retail-cnt-right --->
                <div class="clear"></div>
                </div><!--- quiz-app-retail-cnt --->
                <div class="clear"></div>
            </div><!--- quiz-retail-data-container --->

            <div class="clear"></div>

            </div>
            <div class="clear"></div>
            <form method="post" action="<?=base_url();?>index.php/quiz_app" name="frm" id="frm">
                <div class="clear"></div>
                <div class="quiz-retail-middle-cnt">
                <div class="clear"></div>
                <div class="quiz-retail-list-heading"><?=$tempdata[3][0]['value'];?></div>
                 <?php foreach($options as $option){?>
                        <div id="quiz-retail-list">
                        <div class="quiz-retail-list-radio-btn"><input type="radio" name="optionid" value="<?=$option['id'];?>" ></div>
                        <div class="quiz-retail-list-pera"><p><?=$option['optiontxt'];?></p></div>
                        <div class="clear"></div>
                        </div><!--- quiz-retail-list --->
                    <?php } ?>
                        <div class="clear"></div>
                    </div><!--- quiz-retail-middle-cnt --->
                    <div class="clear"></div>
                    <div class="quiz-retail-input-fields">
                    <div class="quiz-retail-input-fields-left">
                        <div class="quiz-retail-input-fields-inpt">
                            <input type="text" class="quiz-retail-input" value="<?=$tempdata[3][1]['value'];?>" name="name" onBlur="if(this.value==''){this.value='<?=$tempdata[3][1]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][1]['value'];?>'){this.value=''}"/>
                        </div><!---- end quiz-retail-input-fields-inpt ------>
                        <div class="quiz-retail-input-fields-inpt">
                            <input type="text" class="quiz-retail-input" value="<?=$tempdata[3][2]['value'];?>" name="email" onBlur="if(this.value==''){this.value='<?=$tempdata[3][2]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][2]['value'];?>'){this.value=''}"/>
                        </div><!---- end quiz-retail-input-fields-inpt ------>
                        </div><!--- quiz-retail-input-fields-left --->

                        <div class="quiz-retail-input-fields-right">
                                <div class="quiz-retail-input-fields-inpt">
                            <input type="text" class="quiz-retail-input" value="<?=$tempdata[3][3]['value'];?>" name="phone" onBlur="if(this.value==''){this.value='<?=$tempdata[3][3]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][3]['value'];?>'){this.value=''}"/>
                        </div><!---- end quiz-retail-input-fields-inpt ------>
                        <div class="quiz-retail-input-fields-inpt">
                            <input type="text" class="quiz-retail-input"  value="<?=$tempdata[3][4]['value'];?>" name="address" onBlur="if(this.value==''){this.value='<?=$tempdata[3][4]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][4]['value'];?>'){this.value=''}"/>
                        </div><!---- end quiz-retail-input-fields-inpt ------>
                        <div class="clear:both"></div>
                        <input type="submit" value="<?=$tempdata[3][5]['value'];?>" name="submit" class="quiz-retail-submit"  value="<?=$tempdata[3][5]['value'];?>" onclick="return frmvalidate();" />

                        </div><!--- quiz-retail-input-fields-right --->
                    <input type="hidden" name="qid" value="<?=$quiz['id']?>">
                    <input type="hidden" name="signed_request" value="<?=$_REQUEST['signed_request'];?>" />
                    <input type="hidden" name="appid" value="<?=APPID_VAL?>" />
                    </form>
                </div><!--- quiz-retail-input-fields --->
                <div class="clear"></div>
                <div class="quiz-app-retail-bottom-content">
                    <p><?=$tempdata[4][1]['value'];?></p>
                </div><!--- quiz-retail-bottom-content --->
                <div class="clear"></div>
        </div><!--- quiz-retail-main-data --->
        <div class="quiz-retail-bottom-slice">
        </div><!--- quiz-retail-bottom-slice --->
    </div><!--- quiz-retail-main-wrapper --->
    
       <div id="EditCompetitionOverPage" style="display:none">
        <div class="quiz-retail-main-wrapper">
            <div class="quiz-retail-top-slice">
        </div><!--- quiz-retail-top-slice --->
        <div class="quiz-retail-data-slice">
            <div class="main-ssssss">
            <div class="quiz-retail-data-container">
                <img src="<?=  base_url();?>images/images/<?=$tempdata[5][0]['value'];?>" width="760" height="473" />
                    <div class="quiz-app-retail-cnt">
                    <p class="quiz-app-retail-heading"><?=$tempdata[5][1]['value'];?></p>
                    <div class="clear"></div>
                    <div class="quiz-app-retail-cnt-left-thank">
                           <?=$tempdata[5][2]['value'];?>
                    </div>   
                    <div class="quiz-app-retail-cnt-right-thank">
                            <?=$tempdata[5][4]['value'];?>
                    </div><!--- quiz-app-retail-cnt-right-thank --->
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
    </div>  
</body>
</html>