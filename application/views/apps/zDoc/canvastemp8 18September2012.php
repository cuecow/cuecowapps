<?php header('P3P: CP="CAO PSA OUR"');?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script src="http://code.jquery.com/jquery-latest.js"></script>
<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
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
<script>
$(document).ready( function() {   
  $( '#uploadFile' ).change( function() {
        $( '#uploadForm' ).ajaxSubmit( {
            'dataType': 'json',
            'success': function( data ){
                console.log(data);
                if ( data.result == 'SUCCESS' ) {                    
                    $( '#inputImage' ).val( data.image );
                    $( '#image' ).attr( 'src', '/images/images/galleryimages/' + data.image);
                } else {
                    $( '#inputImage' ).val( data.image );
                    $( '#image' ).attr( 'src', 'images/noPhoto.gif' );
                    //showErrorDialog( data.error.message );
                }
            }
        } );
    } );   
});
function showFormDialog() {
    $( '#inputName' ).val( '' );
    $( '#inputEmail' ).val( '' );
    $( '#inputAge' ).val( '' );    
    $( '#inputImage' ).val( '' );
    $( '#image' ).attr( 'src', '<?=base_url();?>images/images/noPhoto.gif' );
    $( '#inputText' ).val( '' );    
    $( '#overlayLight' ).fadeIn( 'fast', function() {
        $( '#formDialog' ).fadeIn( 'slow' );
    } );
}
function submit() {
    var values = {};
    var hasError = false;
    
    values.name = $( '#inputName' ).val();
    if ( values.name == '' ) {
        hasError = true;
        $( '#inputName' ).addClass( 'error' );
    } else {
        $( '#inputName' ).removeClass( 'error' );
    }
    
    values.email = $( '#inputEmail' ).val();
    if ( values.email == '' || !/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test( values.email ) ) {
        hasError = true;
        $( '#inputEmail' ).addClass( 'error' );
    } else {
        $( '#inputEmail' ).removeClass( 'error' );
    }
    
    values.age = $( '#inputAge' ).val();
    if ( values.age == '' ) {
        hasError = true;
        $( '#inputAge' ).addClass( 'error' );
    } else {
        $( '#inputAge' ).removeClass( 'error' );
    }
    
    values.image = $( '#inputImage' ).val();
    if ( values.image == '' ) {
        hasError = true;
        $( '#image' ).addClass( 'error' );
    } else {
        $( '#image' ).removeClass( 'error' );
    }
    
    values.text = $( '#inputText' ).val();
    if ( values.text == '' ) {
        hasError = true;
        $( '#inputText' ).addClass( 'error' );
    } else {
        $( '#inputText' ).removeClass( 'error' );
    }
     if ( !hasError ) {
        $( '#overlay' ).fadeIn( 'slow' );
        FB.login( function( response ) {
            if ( response.authResponse ){                
                
                $.ajax( {
                    'type': 'POST',
                    'url': 'gallery_app/addpic/',
                    'data': {
                        'signed_request': response.authResponse.signedRequest,
                        'values': values
                    },
                    'dataType': 'json',
                    'success': function( data ) {
                        console.log(data);
                        if ( data.result == 'SUCCESS' ) {
                            $( '#formDialog' ).hide();
                            $( '#overlay' ).fadeOut( 'fast', function() {
                                FB.Canvas.scrollTo( 0, 0 );
                                $( '#thanksDialog' ).fadeIn( 'slow' );
                            } );
                        } else if ( data.result == 'ERROR' ) {
                            showErrorDialog( data.error.message );
                        } else {
                            showErrorDialog( 'Unknown error' );
                        }
                    },
                    'error': function() {
                        showErrorDialog( 'AJAX error' );
                    }
                } );
            } else {
                $( '#overlay' ).fadeOut( 'slow' );
            }
        }, { 'scope': 'offline_access,publish_stream' } );
    }
}
function showErrorDialog( text ) {
    $( '.dialogContent', '#errorDialog' ).html( text );
    showDialog( 'error' );
}
function closeThanksDialog() {
    $( '#thanksDialog' ).fadeOut( 'slow', function() {
        $( '#overlayLight' ).fadeOut( 'fast' );
    } );
}
var dialogs = [];
function showDialog( name, withoutOverlay ) {
    dialogs.push( name );
    if ( $( '#overlay' ).is( ':hidden' ) && !withoutOverlay ) {
        $( '#overlay' ).fadeIn( 'fast', function() {
            FB.Canvas.scrollTo( 0, 0 );
            $( '#'+name+'Dialog' ).fadeIn( 'slow' );
        } );
    } else {
        FB.Canvas.scrollTo( 0, 0 );
        $( '#'+name+'Dialog' ).fadeIn( 'slow' );
    }
    $( document ).bind( 'keyup.'+name+'Escape', function( e ) {
        if( e.keyCode == 27 ) {
            closeDialog( name );
        }
    } );
}
function closeFormDialog() {
    $( '#formDialog' ).fadeOut( 'slow', function() {
        $( '#overlayLight' ).fadeOut( 'fast' );
    } );
    $(document).unbind('keyup.'+name+'Escape');
}
function showTermsDialog() {
    $( '.dialogContent .dialogScroll', '#termsDialog' ).css( 'max-height', $( '#app' ).height() - 80 );
    showDialog( 'terms' );
}

/*function showbigimagedialog( id,image ) {
    $( '#overlayLight' ).fadeIn( 'fast', function() {
        $( '#bigimagedialog' ).fadeIn( 'slow' );
        $( '#bigimg' ).attr( 'src', '<?=base_url();?>images/images/galleryimages/'+image);
    } );
}*/
function showViewDialog( id ) {
    $( '.dialogContent', '#viewDialog' ).html( $('.zoom-' + id ).html() );
    $( '#overlayLight' ).fadeIn( 'fast', function() {
        FB.Canvas.scrollTo( 0, 0 );
        $( '#viewDialog' ).fadeIn( 'slow' );
    } );
}
function closeViewDialog() {
    $( '#viewDialog' ).fadeOut( 'slow', function() {
        $( '#overlayLight' ).fadeOut( 'fast' );
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
                        <li class="menu-1 active"><a onclick="getSubmits( 1, 'latest', '' ); return false;" href="#"><span><?=$tempdata[2][0]['value'];?></span></a></li>
                        <li class="menu-2"><a onclick="getSubmits( 1, 'popular', '' ); return false;" href="#"><span><?=$tempdata[2][1]['value'];?></span></a></li>
                        <li class="menu-3"><a onclick="getSubmits( 1, 'archived', '' ); return false;" href="#"><span><?=$tempdata[2][2]['value'];?></span></a></li>
                    </ul><!-- .menu -->
                    <div class="search">
                        <form onsubmit="getSubmits( 1, 'latest', $( '#search' ).val() ); return false;" action="" method="get" id="searchForm">
                            <input type="text" value="" name="s" id="search">
                            <a onclick="$( '#searchForm' ).submit(); return false;" href="#" class="submit"></a>
                        </form>
                    </div><!-- .search -->
                </div><!-- .nav -->
                <ul id="submits" class="submits">
                    <?php 
                    $i=1;
                    foreach($pictures as $pics){
                    $i=$i++;    
                    ?>
                    <li id="submit-339" class="submitPosition-1" style="z-index: auto;">
                        <div class="preview">
                            <div class="votes"><div>3</div></div>
                            <img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picture'];?>" class="image">
                        </div>
                        <div class="zoom" style="display: none;">
                        <a onclick="showViewDialog( 339 ); return false;" href="#"><img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picture'];?>" class="image"></a>
                        <div class="buttons">
                                <a onclick="vote( 339 ); return false;" href="#" class="vote"></a>
                                <a onclick="share( 339 ); return false;" href="#" class="share"></a>
                        </div>
                        <div class="text">
                        Efter at have spist en stor portion  Ota Solgyn  går det bare  i fuld fart der ud af</div>
                        </div>
                    </li>
                    <?php }?>
                </ul><!-- .submits -->
                <ul id="pagination" class="pagination">
                    <li class="active"><a onclick="return false;" href="#">1</a></li>
                    <li><a onclick="getSubmits( 2, 'latest', searchValue ); return false;" href="#">2</a></li>
                    <li><a onclick="getSubmits( 3, 'latest', searchValue ); return false;" href="#">3</a></li>
                    <li><a onclick="getSubmits( 19, 'latest', searchValue ); return false;" href="#">Sidste</a></li>
                </ul><!-- .pagination -->
            </div>
            <!-------------------------------------------------------------->
            <div class="nav">
                <ul class="menu" id="menu">
                    <li class="menu-1"><a href="#"><span><?=$tempdata[2][0]['value'];?></span></a></li>
                    <li class="menu-2"><a href="#"><span><?=$tempdata[2][1]['value'];?></span></a></li>
                    <li class="menu-3"><a href="#"><span><?=$tempdata[2][2]['value'];?></span></a></li>
                </ul><!-- .menu -->

                <div class="gallery-app-search">
                    <form id="searchForm" method="get" action="#">
                        <input id="search" type="text" name="s" value="" />
                        <a class="submit" href="#"></a>
                    </form>
                </div><!-- .search -->

            </div><!-- .nav -->
            <div class="clear"></div>

            <div class="gallery-app-bottom-content">
                <?php 
                $i=1;
                foreach($pictures as $pics){
                $i=$i++;    
                ?>
                <div class="gallery-app-thumnail-container">
                    <div class="gallery-app-photo-thumbnail" id="thumb">
                        <a href="#" onclick="showViewDialog(<?=$pics['id'];?>); return false;"><img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picture'];?>" width="160" height="160" /></a>
                        <div class="gallery-app-vote-content">
                            <a href="#" class="vite-image"></a><span class="vote-text">12</span>
                        </div><!--- gallery-app-vote-content --->
                    </div><!--- gallery-app-photo-thumbnail --->                
                </div><!--- gallery-app-thumnail-container --->                
                <div class="zoom-<?=$pics['id'];?>" style="display: none;">
                    <img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picture'];?>" class="image">
                    <div class="buttons">
                            <a onclick="vote( 339 ); return false;" href="#" class="vote"></a>
                            <a onclick="share( 339 ); return false;" href="#" class="share"></a>
                    </div>
                    <div class="text">
                        <?=$pics['imgtxt'];?>
                    </div>
                </div>
                <?php if($i%4==0){ echo '<div class="clear" style="padding:5px 0;"></div>';}
                }?>
            </div><!--- gallery-app-bottom-content --->
            <div class="clear" style=" margin:5px 0;"></div>
            <div class="gallery-app-pagination-content">
                <ul class="gallery-aap-pagination-list">
                    <li class="pagination-arrows"><a href="#"><?=$tempdata[2][3]['value'];?></a></li>
                    <li class="numbers"><a class="active" href="#">1</a></li>
                    <li class="numbers"><a href="#">2</a></li>
                    <li class="numbers"><a href="#">3</a></li>
                    <li class="pagination-arrows"><a href="#"><?=$tempdata[2][4]['value'];?></a></li>
                </ul>
            </div><!--- gallery-app-pagination-content --->
            <div class="clear"></div>
            <div class="separator-line" style="width:780px; height:1px; background:#eee; margin:10px auto;"></div>
                <div class="gallery-app-footer-data">
                    <div style="float:left; font-size:12px; color:#666;"><?=$tempdata[3][0]['value'];?></div>
                    <div style="float:right; font-size:12px; color:#666;">
                        <a onclick="showTermsDialog(); return false;" href="#"><?=$tempdata[3][1]['value'];?></a>                    
                    </div>
                </div>	
            <div class="clear"></div>
        </div><!--- gallery-app-inner-container-middle-main --->                
        <div class="gallery-app-inner-container-bottom-slice"></div>
        <div class="clear"></div>
    </div><!--- gallery-app-inner-container --->
    <div class="clear"></div>
</div>
<!--*********Photo Upload Form**************-->
<div id="overlayLight" style="display: none;"></div>
<div class="dialog" id="formDialog" style="display: none;">
    <div class="dialogTop"></div>
    <div class="dialogContent">
        <img style="margin: 0 0 5px -3px;"src="<?=base_url();?>images/images/title_indsend_dit_billede.png" alt="Indsend dit billede" />

        <div class="header">
            Fill in the fields below and submit your own photo competition. When you press the "submit photo" you agree to the conditions of competition <a onclick="showTermsDialog(); return false;" href="#">competitive conditions</a>
        </div>

        <label for="inputName">Name</label>
        <input id="inputName" type="text" name="name" value="" maxlength="255" />

        <label for="inputEmail">E-mail</label>
        <input id="inputEmail" type="text" name="email" value="" maxlength="255" />

        <label for="inputAge">Age</label>
        <input id="inputAge" type="text" name="age" value="" maxlength="255" />

        <div class="line">
            <div class="left">
                <label for="inputImage">Select Image</label>
                <div class="uploadWrapper">
                    <img class="image" id="image" src="<?=base_url();?>images/images/noPhoto.gif" alt="" />
                    <form id="uploadForm" method="post" action="gallery_app/addpic/" enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                        <input class="uploadFile" id="uploadFile" type="file" name="file" />
                    </form>
                </div>
                <input id="inputImage" type="hidden" name="image" value="" />
            </div>
            <div class="right">
                <label for="inputText">Add text</label>
                <textarea id="inputText" name="text"></textarea>
            </div>
        </div>         
        
        <table class="button" cellpadding="0" cellspacing="0">
            <tr><td><a href="index.htm#" onClick="submit(); return false;"><span>Submit a photo</span></a></td></tr>
        </table>

    </div>
    <div class="dialogBottom"></div>
    <a class="dialogClose" href="index.htm#" onClick="closeFormDialog(); return false;"></a>
</div><!--End #formDialog -->

<div class="dialog" id="bigimagedialog" style="display: none;">
    <div class="dialogTop"></div>
    <div class="dialogContent">
        <img id="bigimg" src="" />        
    </div>
    <div class="dialogBottom"></div>
    <a class="dialogClose" href="index.htm#" onClick="closeFormDialog(); return false;"></a>
</div><!--End #bigimagedialog-->
  <div id="overlay" style="display: none;"></div>

    <div class="dialog" id="endDialog" style="display: none; top: 200px;">
        <div class="dialogTop"></div>
        <div class="dialogContent" style="font-size: 20px; text-align: center;"></div>
        <div class="dialogBottom"></div>
    </div><!-- #endDialog -->

    <div class="dialog" id="errorDialog" style="display: none;">
        <div class="dialogTop"></div>
        <div class="dialogContent"></div>
        <div class="dialogBottom"></div>
        <a class="dialogClose" href="#" onclick="closeDialog( 'error' ); return false;"></a>
    </div><!-- #errorDialog -->
<div class="dialog" id="thanksDialog" style="display: none;">
    <div class="dialogTop"></div>
    <div class="dialogContent">
        <div class="header">
            <?=$tempdata[5][0]['value'];?>
        </div>
        <div class="header2">            
            <?=$tempdata[5][1]['value'];?>
        </div>
        <!--<table class="button" cellpadding="0" cellspacing="0">
            <tr><td><a target="_top" href="https://www.facebook.com/solgryn?sk=wall"><span>Gå til væggen</span></a></td></tr>
        </table>-->
    </div>
    <div class="dialogBottom"></div>
    <a class="dialogClose" href="#" onclick="closeThanksDialog(); return false;"></a>
</div><!-- #thanksDialog -->    
<div class="dialog" id="termsDialog" style="display: none;">
    <div class="dialogTop"></div>
    <div class="dialogContent">
        <div class="dialogScroll">
            <h3><?=$tempdata[4][0]['value'];?></h3>
            <?=$tempdata[4][2]['value'];?>
        </div>
    </div>
    <div class="dialogBottom"></div>
    <a class="dialogClose" href="#" onclick="closeDialog( 'terms' ); return false;"></a>
</div><!-- #termsDialog -->
</body>
</html>