<?php header('P3P: CP="CAO PSA OUR"');?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?=base_url();?>js/jquery.form.js"></script>
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
<script type="text/javascript" src="<?=base_url();?>js/temp9.js"></script>
<script type="text/javascript">
function share( id ) {
    var picture = $( '.zoom .image', '#submit-' + id ).attr( 'src' );
    FB.ui( {
        'method': 'feed',
        'link': '<?=$this->session->userdata('page_url');?>',
        'picture': picture,
        'name': "Cuecow",
        'caption': "Vote for me and help me win the Cuecow photo competition"
    } );
}
</script>
<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<div class="gallery-app-main-wrapper">
    <div class="gallery-app-sun-image"></div>
    <div class="gallery-app-inner-container">                
        <div class="gallery-app-inner-container-top-slice"></div>
        <div class="gallery-app-inner-container-data">
            <div class="gallery-app-logo"></div>
            <div class="clear"></div>
            <div class="gallery-app-main-col">
                <div class="gallery-app-left-col">
                    <div style="width:179px; margin:0px auto;"><img src="<?=base_url()?>images/images/<?=$tempdata[1][2]['value'];?>" width="179" /></div>
                </div>
                <div class="gallery-app-right-col">
                    <h3 class="gallery-app-right-col-heading"><?=$tempdata[1][1]['value'];?></h3>
                    <p class="gallery-app-right-col-data"><?=$tempdata[1][3]['value'];?></p>
                    <a href="#" class="gallery-app-anchor-button" onClick="showFormDialog(); return false;"><?=$tempdata[1][4]['value'];?></a>
                </div><!--- gallery-app-right-col --->
            </div>
            <div class="clear"></div>
            <div class="separator-line" style="width:780px; height:1px; background:#eee; margin:10px auto;"></div>
            <!-------------------------------------------------------------->
            <div id="content" class="content">
                <script type="text/javascript">
                    var searchValue = "";
                </script>
                <div class="nav">
                    <ul id="menu" class="menu">
                        <li class="menu-1 <?=($mode=="" ? 'active' : '');?>"><a href="<?=base_url();?>index.php/gallery_app2?mode="><span><?=$tempdata[2][0]['value'];?></span></a></li>
                        <li class="menu-2 <?=($mode=="popular" ? 'active' : '');?>"><a href="<?=base_url();?>index.php/gallery_app2?mode=popular"><span><?=$tempdata[2][1]['value'];?></span></a></li>
                        <li class="menu-3 <?=($mode=="archive" ? 'active' : '');?>"><a href="<?=base_url();?>index.php/gallery_app2?mode=archive"><span><?=$tempdata[2][2]['value'];?></span></a></li>
                    </ul><!-- .menu -->
                    <div class="search">
                        <form action="<?=base_url();?>index.php/gallery_app2" method="post" id="searchForm">
                            <input type="text" value="" name="searchval" id="search">
                            <a onclick="$( '#searchForm' ).submit();" href="#" class="submit"></a>
                            <input type="hidden" name="mode" value="search" />
                        </form>
                    </div><!-- .search -->
                </div><!-- .nav -->                
                <ul id="submits" class="submits">
                    <?php 
                    if(count($pictures)>0){
                    $p=1;
                    foreach($pictures as $pics){
                    $p=$p++;
                    ?>
                    <li id="submit-<?=$pics['picdata']['id'];?>" class="submitPosition-<?=$p;?>" style="z-index: auto;">
                        <div class="preview">
                            <div class="votes" id="votes<?=$pics['picdata']['id'];?>"><div><?=$pics['votes'];?></div></div>
                            <img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picdata']['picture'];?>" class="image">
                        </div>
                        <div class="zoom" style="display: none;">
                            <a onclick="showViewDialog( <?=$pics['picdata']['id'];?> ); return false;" href="#"><img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picdata']['picture'];?>" class="image"></a>
                            <div class="buttons">
                            <!--<a onclick="vote( <?=$pics['picdata']['id'];?> ); return false;" href="#" class="vote"></a>-->
                                <a onclick="share( <?=$pics['picdata']['id'];?> ); return false;" href="#" class="share"></a>
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
                <?php if($prm['pages']>1){?>
                <ul id="pagination" class="pagination">
                    <?php if($prm['pgno']>1){?>
                    <li><a href="<?=base_url();?>index.php/gallery_app2?pgno=<?=$prm['pgno']-1?>&mode=<?=$prm['mode'];?>">Previous</a></li>
                    <?php }
                    for($i=1;$i<=$prm['pages'];$i++){?>
                    <li <?=($prm['pgno']==$i ? 'class="active"' : '');?>><a href="<?=base_url();?>index.php/gallery_app2?pgno=<?=$i?>&mode=<?=$prm['mode'];?>"><?=$i?></a></li>
                    <? }
                    if($prm['pages']!=$prm['pgno']){?>
                    <li><a href="<?=base_url();?>index.php/gallery_app2?pgno=<?=$prm['pgno']+1?>&mode=<?=$prm['mode'];?>">Next</a></li>
                    <?php }?>
                </ul> <!--.pagination //onclick="getSubmits( 19, 'latest', searchValue ); return false;" -->
                <?php }?>
            </div>
            <!-------------------------------------------------------------->
            <div class="clear" style=" margin:5px 0;"></div>
            <div class="clear"></div>
            <div class="separator-line" style="width:780px; height:1px; background:#eee; margin:10px auto;"></div>
                <div class="gallery-app-footer-data">
                    <div style="float:left; font-size:12px; color:#666;"><?=$tempdata[3][0]['value'];?></div>
                    <div>
                        <a onclick="showTermsDialog(); return false;" href="#" style="float:right; font-size:12px; color:#666;"><?=$tempdata[3][1]['value'];?></a>
                    </div>
                </div>	
            <div class="clear"></div>
        </div><!--- gallery-app-inner-container-middle-main --->                
        <div class="gallery-app-inner-container-bottom-slice"></div>
        <div class="clear"></div>
    </div><!--- gallery-app-inner-container --->
    <div class="clear"></div>
</div>
<?php $this->load->view('datatemp9', $tempdata);?>
</body>
</html>