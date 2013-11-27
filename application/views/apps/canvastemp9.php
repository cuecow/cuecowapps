<?php header('P3P: CP="CAO PSA OUR"');?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
<script type="text/javascript" src="<?=base_url();?>js/temp9.js"></script>
<script type="text/javascript">
function share( id ) {
    var picture = $( '.zoom .image', '#submit-' + id ).attr( 'src' );
    FB.ui( {
        'method': 'feed',
        'link': '<?=$this->session->userdata('page_url');?>/app_'+<?=$appid;?>,
        'picture': picture,
        'name': "Cuecow",
        'caption': "Vote for me and help me win the Cuecow photo competition"
    } );
}
</script>
<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<!--<pre><?php print_r($tempdata);?></pre>-->
<div class="gallery-app-main-wrapper">
    <div class="gallery-app-inner-container">                
        <div class="gallery-app-inner-container-data">
            <div class="gallery-app-logo" align="center"><img src="<?=base_url()?>images/872X374/<?=$tempdata[1][0]['value'];?>" /></div>
            <div class="clear"></div>
            <div class="gallery-app-main-col">
                <div class="gallery-app-right-col">
                    <h3 class="gallery-app-right-col-heading"><?=$tempdata[1][1]['value'];?></h3>
                    <p class="gallery-app-right-col-data"><?=$tempdata[1][3]['value'];?></p>
                </div><!--- gallery-app-right-col --->
            </div>
            <div class="clear"></div>
            <!-------------------------------------------------------------->
            <div id="content" class="content" align="center">
                <ul id="submits" class="submits">
                    <?php 
                    if(count($pictures)>0){
                    $p=1;
                    foreach($pictures as $pics){
                    $p=$p++;
                    ?>
                    <li id="submit-<?=$pics['picdata']['id'];?>" class="submitPosition-<?=$p;?>" style="z-index: auto;">
                        <div class="preview">
                            <!--<div class="votes" id="votes<?=$pics['picdata']['id'];?>"><div><?=$pics['votes'];?></div></div>-->
                            <a onClick="vote( <?=$pics['picdata']['id'];?>,<?=$appid;?> ); return false;" href="#" ><img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picdata']['picture'];?>" class="image" border="0"></a>
                            <!--<a onclick="showViewDialog( <?=$pics['picdata']['id'];?> ); return false;" href="#"><img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picdata']['picture'];?>" class="image"></a>-->
                        </div>
                        <div class="zoom" style="display: none;">
                            <img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picdata']['picture'];?>" class="image">
                            <div class="buttons">
                                <a onClick="vote( <?=$pics['picdata']['id'];?>,<?=$appid;?> ); return false;" href="#" class="vote"></a>
                                <a onClick="share( <?=$pics['picdata']['id'];?> ); return false;" href="#" class="share"></a>
                            </div>
                            <div class="text"><?=$pics['picdata']['imgtxt'];?></div>
                        </div>
                    </li>
                    <?php }}else{?>
                    <div style="padding-left:250px;padding-top:80px">
                        There is no picture found against this competition.
                    </div>    
                    <?php }?>
                </ul><!-- .submits -->
                <p class="gallery-app-right-col-data"><?=$tempdata[2][0]['value'];?></p>
                <br><br>
            </div>
            <!-------------------------------------------------------------->
            <div class="clear" style=" margin:5px 0;"></div>
            <div class="clear"></div>
            <div class="separator-line" style="width:780px; height:1px; background:#eee; margin:10px auto;"></div>
                <div class="gallery-app-footer-data">
                    <div style="float:left; font-size:12px; color:#666;"><?=$tempdata[3][0]['value'];?></div>
                    <div>
                        <a onClick="showTermsDialog(); return false;" href="#" style="float:right; font-size:12px; color:#666;"><?=$tempdata[3][1]['value'];?></a>
                    </div>
                </div>	
            <div class="clear"></div>
        </div><!--- gallery-app-inner-container-middle-main --->                
        <div class="clear"></div>
    </div><!--- gallery-app-inner-container --->
    <div class="clear"></div>
</div>
<?php $this->load->view('datatemp9', $tempdata);?>
</body>
</html>