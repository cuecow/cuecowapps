<?php 
header('P3P: CP="CAO PSA OUR"');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>js/facefiles2/facebox.css" />
<script src="<?=base_url();?>js/facefiles2/facebox.js"></script>	
<script>
jQuery(document).ready(function($){ 
    $('a[rel*=facebox]').facebox();
    <?php if(isset($_REQUEST['issubmit'])){?>
    $( '#overlay' ).fadeIn( 'slow' );
    <?php }?>
})
function closedailog()
{
    $( '#overlay' ).fadeOut( 'slow' );
}
</script>
<script>
function framesetsize()
{
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
}
function dmove(value)
{
    if(value=="in")
    {
        $('#share').css('margin-top','0px');
    }
    if(value=="out")
    {
        $('#share').css('margin-top','-100px');
    }
}
</script>
</head>
<body onLoad="framesetsize();" style="overflow:hidden;">
<div id="fb-root"></div>
<script>
  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
/*function share(){
    FB.ui( {
        'method': 'feed',
        'link': '<?=$this->session->userdata('page_url');?>?sk=' + <?=$appid;?>
      });
} */  
    
</script>
<script>
function mainshare() {
    u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u=<?=$pageurl."?sk=".$appid;?>&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
    return false;
}
</script>
<?php $this->load->view('styles/style'.$tempid,$tempdata);
$this->load->view('snowfalling',$tempdata);
$pid = $this->session->userdata('cpid');
?>
<div class="christmas-app-main-wrapper">
    <div class="christmas-app-data-container">
        <?php if($tempdata[1][0]['value']==1){?>
        <div style="overflow: hidden; height: 135px;position: absolute;">
            <div id="share" onMouseOver="dmove('in');" onMouseOut="dmove('out');">
                <ul>
                    <li><a class="icon-facebook rel="nofollow" href="javascript:void(0);" onclick="return mainshare()" target="_blank" >Facebook<span>&nbsp;</span></a></li>
                    <li><a class="icon-twitter" href="http://twitter.com/home?status=<?=$pageurl."?sk=".$appid;?>"  id="share-twitter" target="_blank">Twitter<span>&nbsp;</span></a></li>
                </ul>    
            </div>
        </div>
        <?php }?>
        <h1 class="christmas-app-heading-one"><?=$tempdata[1][5]['value'];?></h1> <!--<span style="color:#f00;"> <?=$tempdata[1][6]['value'];?></span>-->
        <p class="christmas-app-pera-one"><?=$tempdata[1][7]['value'];?></p>
        <!--<a href="http://<?=$tempdata[1][9]['value'];?>" class="christmas-app-fb-icon" target="_blank"><img src="<?=base_url();?>images/images/facebook.png" width="64" /></a>-->
        <div class="calendar-holder">
            <ul style="padding: 60px 0 14px 18px;">
                <?php 
                for($j=1;$j<25;$j++){
                    if($j==1){ echo '<li></li><li></li><li></li>';}
                    if($j<10){ $j = "0".$j;}
                    $loopday[] = $j;
                }
                
                if($tempdata[1][12]['value']==0){ shuffle($loopday); }
                
                $today = date('d');                
                foreach($loopday as $i){?>
                <li>
                    <?php
                    if(in_array($i,$daylist) && $admin == true)
                    { ?>
                        <a href="<?=base_url();?>index.php/chrismas_app/showpgdaydata?subpgday=<?=$i?>&signed_request=<?=$_REQUEST['signed_request'];?>&pid=<?=$pid;?>&appid=<?=$_REQUEST['appid'];?>" class="syaan" rel="facebox"><?=$i?></a>
                   <?php }
                    else if(in_array($i,$daylist) && $i >= $today){
                        if($i > $today){?>
                        <a href="#cominggatediv" class="syaan" rel="facebox"><?=$i?></a>
                        <?php }else{?>
                        <a href="<?=base_url();?>index.php/chrismas_app/showpgdaydata?subpgday=<?=$i?>&signed_request=<?=$_REQUEST['signed_request'];?>&pid=<?=$pid;?>&appid=<?=$_REQUEST['appid'];?>" class="syaan" rel="facebox"><?=$i?></a>
                        <?php }?>
                    <?php }else{?>
                    <a class="empty-cell"><?=$i?></a>
                    <?php }?>
                </li>
                <?php }?>
            </ul>                              
        </div>
    </div><!--- christmas-app-data-container --->
</div>
<div id="overlay" style="display: none;">
    <div class="thankyoudiv" align="center">
        <h3><?=$tempdata[1][14]['value'];?></h3>
        <div style="position: absolute; left: 95%; top: 6%;">
            <a href="javascript:" onclick="closedailog()" style="text-decoration: none;color:#666666;font-family: sans-serif;">X</a>
        </div>
    </div>
</div>
<div id="cominggatediv" style="display: none;" align="center">
    <h3><?=$tempdata[1][13]['value'];?></h3>
</div>
</body>
</html>