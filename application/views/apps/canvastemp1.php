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
<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<div id="pg-five-rapper">
    <div id="pg-five-header"> 
        <h3><?=$tempdata[0][0]['value'];?></h3>		
    </div>
    <!--------end header contetn html------------->
    <div class="clear"></div>
    <div id="pg-five-top-content">
            <div class="top-content-inner-text-field">
            <div class="inner-left">
                <div class="line-text"><?=$tempdata[1][1]['value']?></div>
                <ul>
                    <?=$tempdata[1][2]['value']?>
                </ul>
            </div>
            <!------------end inner left---------------->
            <div class="inner-right">
            </div>
            <!-----------inner right------------->
        </div>
    </div>
    <!---------------end top content div------------------>
    <div class="clear"></div>
    <div class="page-five-middle-div">
        <div class="middle-left-tab">
            <div class="left-title-udv">
                <?=$tempdata[2][0]['value']?>
            </div>
            
            <div class="left-salogan-udv"><?=$tempdata[2][1]['value']?></div>
            
            <div class="smart-phones"><img src="<?=base_url()?>images/images/<?=$tempdata[2][2]['value']?>" width="207" height="98" ></div>
            

            <div class="button-udu"><?=$tempdata[2][4]['value']?></div>
        </div>
        <!----------end middle left tab--------------------->
        <div class="middle-right-tab">
            <div class="left-title-udv"><?=$tempdata[3][0]['value']?></div>
            <div class="left-salogan-udv"><?=$tempdata[3][1]['value']?></div>							
            <div class="smart-phones-right" style="background:url(<?=base_url();?>images/images/<?=$tempdata[3][2]['value']?>) no-repeat;">
            <ul>
                <?=$tempdata[3][3]['value']?>
            </ul>
        </div>
            <div class="button-udu"><?=$tempdata[3][5]['value']?></div>
        </div>
        <!----------end middle right tab--------------------->
    </div>
    <!------------end page five middle--------------->
    <div class="clear"></div>
    <div class="pg-five-bottom-div">
        <div class="bottom-div-title"><?=$tempdata[4][0]['value']?></div>        
        <div class="bottom-div-salogan"><?=$tempdata[4][1]['value'];?></div>
        <div class="bottom-pic-image"><a href="#"><img src="<?=base_url();?>images/images/<?=$tempdata[4][2]['value']?>" width="123" /></a></div>
       
    </div>
    <!--------------end bottom div----------------->
</div>
</body>
</html>