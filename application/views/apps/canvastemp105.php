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

    if($('input[type=radio]').is(':checked') == false)
    {
        alert('Please Select One Option!');
        return false;
    }        
    
    else if(frm.name.value=="Name" || frm.name.value=="")
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
}  
function showdialogthankyou()
{
    document.getElementById('EditCompetitionOverPage').style.display = 'block';
    document.getElementById('entertain-quiz-main-wrapper').style.display = 'none';
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
     <div class="entertain-quiz-main-wrapper" id="entertain-quiz-main-wrapper">
        <div class="entertain-quiz-top-slice">
        </div><!--- entertain-quiz-top-slice --->
        <div class="entertain-quiz-data-slice">
            <div class="main-ssssss">
            <div class="entertain-quiz-data-container">
                <img src="<?=  base_url();?>images/760X444/<?=$tempdata[1][0]['value'];?>" width="760" height="473" />
                    <div class="entertain-quiz-cnt">
                    <h1 class="entertain-quiz-heading"><?=$quiz['qheading'];?></h1>
                    <p class="entertain-quiz-dis"><?=$quiz['qdescription'];?></p>
                <div class="clear"></div>
                </div><!--- entertain-quiz-cnt --->
                <div class="clear"></div>
            </div><!--- entertain-quiz-data-container --->

            <div class="clear"></div>
            </div>
            <span class="entertain-quiz-copyright"><?=$tempdata[3][7]['value'];?></span>
            <div class="clear"></div>
            <form method="post" action="<?=base_url();?>index.php/quiz_app" name="frm" id="frm">
                <div class="clear"></div>
                <div class="entertain-quiz-middle-cnt">
                <div class="clear"></div>
                <div class="entertain-quiz-list-heading"><?=$tempdata[3][0]['value'];?></div>
                        <?php  foreach ($options as $option) { ?>
                        <div id="entertain-quiz-list">  
                        <div class="entertain-quiz-list-radio-btn"><input type="radio"  id="option" name="option" value="<?=$option['id'];?>" /></div>
                        <div class="entertain-quiz-list-pera"><?=$option['optiontxt'];?></div>               
                        </div><!--- entertain-quiz-list --->
                        <?php }?>
                        <div class="clear"></div>
                    </div><!--- entertain-quiz-middle-cnt --->
                    <div class="clear"></div>
                    <div class="entertain-quiz-input-fields">
                    <div class="entertain-quiz-input-fields-left">
                        <div class="entertain-quiz-input-fields-inpt">
                            <input type="text" class="entertain-quiz-input" value="<?=$tempdata[3][1]['value'];?>" name="name" onBlur="if(this.value==''){this.value='<?=$tempdata[3][1]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][1]['value'];?>'){this.value=''}"/>
                        </div><!---- end entertain-quiz-input-fields-inpt ------>
                        <div class="entertain-quiz-input-fields-inpt">
                            <input type="text" class="entertain-quiz-input" value="<?=$tempdata[3][2]['value'];?>" name="email" onBlur="if(this.value==''){this.value='<?=$tempdata[3][2]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][2]['value'];?>'){this.value=''}"/>
                        </div><!---- end entertain-quiz-input-fields-inpt ------>
                        </div><!--- entertain-quiz-input-fields-left --->

                        <div class="entertain-quiz-input-fields-right">
                                <div class="entertain-quiz-input-fields-inpt">
                            <input type="text" class="entertain-quiz-input" value="<?=$tempdata[3][3]['value'];?>" name="phone" onBlur="if(this.value==''){this.value='<?=$tempdata[3][3]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][3]['value'];?>'){this.value=''}"/>
                        </div><!---- end entertain-quiz-input-fields-inpt ------>
                        <div class="entertain-quiz-input-fields-inpt">
                            <input type="text" class="entertain-quiz-input" value="<?=$tempdata[3][4]['value'];?>" name="address" onBlur="if(this.value==''){this.value='<?=$tempdata[3][4]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][4]['value'];?>'){this.value=''}"/>
                        </div><!---- end entertain-quiz-input-fields-inpt ------>
                        <div class="clear:both"></div>
                        <input type="submit" value="<?=$tempdata[3][5]['value'];?>"  name="submit" class="entertain-quiz-submit" onclick="return frmvalidate();" />

                        </div><!--- entertain-quiz-input-fields-right --->
                    <input type="hidden" name="qid" value="<?=$quiz['id']?>">
                    <input type="hidden" name="signed_request" value="<?=$_REQUEST['signed_request'];?>" />
                    <input type="hidden" name="appid" value="<?=APPID_VAL?>" />
                    </form>
                </div><!--- entertain-quiz-input-fields --->
                <div class="clear"></div>
                <div class="entertain-quiz-bottom-content">
                    <p><?=$tempdata[4][0]['value'];?></p>
                </div><!--- entertain-quiz-bottom-content --->
                <div class="clear"></div>
        </div><!--- entertain-quiz-main-data --->
        <div class="entertain-quiz-bottom-slice">
        </div><!--- entertain-quiz-bottom-slice --->
    </div><!--- entertain-quiz-main-wrapper --->
    <div id="EditCompetitionOverPage" class="EditCompetitionOverPage" style="display:none">
        <div class="entertain-quiz-main-wrapper">
                <div class="entertain-quiz-top-slice">
            </div><!--- entertain-quiz-top-slice --->
            <div class="entertain-quiz-data-slice">
                <div class="main-ssssss">
                <div class="entertain-quiz-data-container">
                    <img src="<?=  base_url();?>images/images/<?=$tempdata[5][3]['value'];?>" width="760" height="473" />
                        <div class="entertain-quiz-cnt-thank">
                        <h1 class="entertain-quiz-heading"><?=$tempdata[5][0]['value'];?></h1>
                        <p class="entertain-quiz-dis"><?=$tempdata[5][1]['value'];?></p>
                    <div class="clear"></div>
                    </div><!--- entertain-quiz-cnt-thank --->
                    <div class="clear"></div>
                </div><!--- entertain-quiz-data-container --->

                <div class="clear"></div>
                </div>

                    <div class="clear"></div>
            </div><!--- entertain-quiz-main-data --->
            <div class="entertain-quiz-bottom-slice">
            </div><!--- entertain-quiz-bottom-slice --->
        </div><!--- entertain-quiz-main-wrapper ---> 
    </div>
</body>
</html>