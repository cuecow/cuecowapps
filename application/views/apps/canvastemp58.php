<?php 
header('P3P: CP="CAO PSA OUR"');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?=base_url();?>js/jquery.form.js"></script>
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
<script type="text/javascript" src="<?=base_url();?>js/temp19js.js"></script>
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
<script>
function submitnewphoto()
{
    $('#temp19thankyoupage').hide();
    $('#temp19_maindiv').show();
}
</script>
<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<?php $this->load->view('styles/style8.php');?>
<div class="photo-competition-main-wrapper" id="temp19_maindiv">
        <div class="photo-competition-top-slice">
    </div><!--- photo-competition-top-slice --->
    <div class="photo-competition-data-slice">
        <div class="photo-competition-data-container">
                <div class="photo-competition-top-cnt">
                <h1><?=$tempdata[1][0]['value'];?></h1>
                <div class="clear" style="padding:10px 0;"></div>
                <div class="photo-competition-top-cnt-left">
                        <img src="<?=base_url()?>images/images/<?=$tempdata[1][6]['value'];?>" width="308" height="230" />
                </div><!--- photo-competition-top-cnt-left --->
                <div class="photo-competition-top-cnt-right">
                        <h4><?=$tempdata[1][1]['value'];?></h4>
                    <p><?=$tempdata[1][2]['value'];?></p>
                    <a href="#" class="gallery-app-anchor-button" onClick="showFormDialog(); return false;"><?=$tempdata[1][3]['value'];?></a>
                </div><!--- photo-competition-top-cnt-right --->
                <div class="clear"></div>
            </div><!--- photo-competition-top-cnt --->
            <div class="clear" style="padding:10px 0;"></div>
<!--           /*********************************************************************************************/     -->
        <div id="content" class="content">
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
                            <a onclick="vote( <?=$pics['picdata']['id'];?>,<?=$appid;?> ); return false;" href="#" class="vote"></a>
                            <a onclick="share( <?=$pics['picdata']['id'];?> ); return false;" href="#" class="share"></a>
                        </div>
                        <div class="text"><?=$pics['picdata']['imgtxt'];?></div>
                    </div>
                </li>
                <?php }}else{?>
                <div style="padding-left:86px;padding-top:89px">
                    There is no picture found against this competition.
                </div>    
                <?php }?>
            </ul><!-- .submits -->
            <?php if($prm['pages']>1){?>
            <ul id="pagination" class="pagination">
                <?php if($prm['pgno']>1){?>
                <li><a href="<?=base_url();?>index.php/gallery_app?pgno=<?=$prm['pgno']-1?>&mode=<?=$prm['mode'];?><?=SIGNED_REQUEST;?>">Previous</a></li>
                <?php }
                for($i=1;$i<=$prm['pages'];$i++){?>
                <li <?=($prm['pgno']==$i ? 'class="active"' : '');?>><a href="<?=base_url();?>index.php/gallery_app?pgno=<?=$i?>&mode=<?=$prm['mode'];?><?=SIGNED_REQUEST;?>"><?=$i?></a></li>
                <? }
                if($prm['pages']!=$prm['pgno']){?>
                <li><a href="<?=base_url();?>index.php/gallery_app?pgno=<?=$prm['pgno']+1?>&mode=<?=$prm['mode'];?><?=SIGNED_REQUEST;?>">Next</a></li>
                <?php }?>
            </ul> <!--.pagination //onclick="getSubmits( 19, 'latest', searchValue ); return false;" -->
            <?php }?>
        </div><!--- photo-competition-middle-cnt --->

<!-------------------------------------------------------------->
            <div class="photo-competition-bottom-cnt">
                <ul class="photo-competition-menu-list">
                    <li <?=($mode=="" ? 'active' : '');?>><a href="<?=base_url();?>index.php/gallery_app?mode=<?=SIGNED_REQUEST;?>"><span><?=$tempdata[2][1]['value'];?></span></a></li>
                    <li <?=($mode=="popular" ? 'active' : '');?>><a href="<?=base_url();?>index.php/gallery_app?mode=popular<?=SIGNED_REQUEST;?>"><span><?=$tempdata[2][3]['value'];?></span></a></li>
                    <li <?=($mode=="archive" ? 'active' : '');?>><a href="<?=base_url();?>index.php/gallery_app?mode=archive<?=SIGNED_REQUEST;?>"><span><?=$tempdata[2][4]['value'];?></span></a></li>
                </ul>
                    <span class="photo-competition-trm-cndtion-text"><a onclick="showTermsDialog(); return false;" href="#" style="float:right; font-size:12px; color:#666;"><?=$tempdata[3][0]['value'];?></a></span>
                <div class="clear"></div>
            </div><!--- photo-competition-bottom-cnt --->
            <div class="photo-competition-last-pera">
                <?=$tempdata[4][0]['value'];?>
            </div><!--- photo-competition-last-pera --->
        <div class="clear"></div>
        </div><!--- photo-competition-data-container --->
    </div><!--- photo-competition-main-data --->
    <div class="photo-competition-bottom-slice">
    </div><!--- photo-competition-bottom-slice --->
</div><!--- photo-competition-main-wrapper --->
<?php $this->load->view('datatemp19', $tempdata,$tempid);?>

<div id="temp19thankyoupage" style="display:none;">
    <div class="photo-competition-main-wrapper">
    <div class="photo-competition-top-slice">
        </div><!--- photo-competition-top-slice --->
        <div class="photo-competition-data-slice">
            <div class="photo-competition-data-container">
                    <div class="photo-competition-top-cnt-thankyou">
                    <h1 align="center"><?=$tempdata[5][1]['value'];?></h1>
                    <div style="padding:10px 0;" class="clear"></div>
                    <div class="photo-competition-top-cnt-left">
                        <img src="<?=base_url();?>images/images/<?=$tempdata[5][7]['value'];?>" width="306" height="348">
                    </div><!--- photo-competition-top-cnt-left --->
                    <div class="photo-competition-top-cnt-right">
                        <?=$tempdata[5][8]['value'];?>
                        <p style="height:120px;"><?=$tempdata[5][9]['value'];?></p>
                        <input type="submit" value="<?=$tempdata[5][10]['value'];?>" class="photo-competition-submit" onclick="return submitnewphoto();">
                        <ul class="thankyou-photo-competition-list">
                            <li><a href="#"><?=$tempdata[5][11]['value'];?></a></li>
                            <li><a href="#"><?=$tempdata[5][12]['value'];?></a></li>
                            <li><a href="#"><?=$tempdata[5][13]['value'];?></a></li>
                            <li><a href="#"><?=$tempdata[5][14]['value'];?></a></li>
                        </ul>
                    </div><!--- photo-competition-top-cnt-right --->
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div><!--- photo-competition-data-container --->
        </div><!--- photo-competition-main-data --->
        <div class="photo-competition-bottom-slice">
        </div><!--- photo-competition-bottom-slice --->
    </div><!--- photo-competition-main-wrapper --->
</div>	    
</body>
</html>
