function vote( id,appid ) {
    $( '#overlay' ).fadeIn( 'slow' );
    FB.login( function( response ) {		   
        if ( response.authResponse ) {
			FB.api('/me', function(uinfo) {
            //alert('Your name is ' + response.name);
            $.ajax( {
                'type': 'POST',
                'url': 'gallery_app2/vote',
                'data': {
                    'signed_request': response.authResponse.signedRequest,
                    'id': id,
                    'fbuserid': uinfo.id,
                    'fbappid': appid,
                    'userdetail' : uinfo
                },
                'dataType': 'json',
                'success': function( data ) {
                    if ( data.result == 'SUCCESS' ) {
                        $( '#votes'+data.picid+' div' ).text( data.submit.votes );
                        
                        if ( $( '#viewDialog' ).is( ':visible' ) ) {
                            $( '#viewDialog' ).hide();
                        }
                        if ( $( '#overlayLight' ).is( ':hidden' ) ) {
                            $( '#overlayLight' ).show();
                        }
                        
                        $( '#overlay' ).fadeOut( 'fast', function() {
                            FB.Canvas.scrollTo( 0, 0 );
                            $( '#thanks2Dialog' ).fadeIn( 'slow' );
                        } );
                    } else if ( data.result == 'ERROR' ) {
                        
                        if ( $( '#viewDialog' ).is( ':visible' ) ) {
                            $( '#viewDialog' ).hide();
                        }
                        if ( $( '#overlayLight' ).is( ':hidden' ) ) {
                            $( '#overlayLight' ).show();
                        }
                        $( '#overlay' ).fadeOut( 'fast', function() {
                            FB.Canvas.scrollTo( 0, 0 );
                            $( '#alreadyvoted' ).fadeIn( 'slow' );
                        } );
                        //showErrorDialog( data.error.message );
                    } else {
                        showErrorDialog( 'Unknown error' );
                    }
                },
                'error': function() {
                    //showErrorDialog( 'AJAX error' );
                }
            } );
         });//end fb.api/me   
        } else {
            $( '#overlay' ).fadeOut( 'slow' );
        }
    },{scope: 'email'} );
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
function closealreadyvote() {
    $( '#alreadyvoted' ).fadeOut( 'slow', function() {
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
function showViewDialog( id ) {
    $( '.dialogContent', '#viewDialog' ).html( $( '.zoom', '#submit-' + id ).html() );
    
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
function closeDialog( name, withoutOverlay ) {
    if ( name == dialogs.slice( -1 ) ) {
        dialogs.pop();
        $( '#'+name+'Dialog' ).fadeOut( 'slow', function() {
            if ( !withoutOverlay ) {
                $( '#overlay' ).fadeOut( 'fast' );
            }
        } );
        $( document ).unbind( 'keyup.'+name+'Escape' );
    }
}
function closeThanks2Dialog() {
    $( '#thanks2Dialog' ).fadeOut( 'slow', function() {
        $( '#overlayLight' ).fadeOut( 'fast' );
    } );
    
}