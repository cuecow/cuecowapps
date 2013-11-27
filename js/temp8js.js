$(document).ready( function() {   
    $( 'li', '#menu' ).live( {
        'mouseenter': function() {
            $( this ).addClass( 'hover' );
        },
        'mouseleave': function() {
            $( this ).removeClass( 'hover' );
        }
    } );
    
    $( 'li', '#submits' ).live( {
        'mouseenter': function() {
            $(  this ).css( 'z-index', '4' );
            $( '.zoom', this ).show( 'fast' );
        },
        'mouseleave': function() {
            $( '.zoom', this ).hide();
            $(  this ).css( 'z-index', 'auto' );
        }
    } ); 
   $( 'li', '#pagination' ).live( {
        'mouseenter': function() {
            $( this ).addClass( 'hover' );
        },
        'mouseleave': function() {
            $( this ).removeClass( 'hover' );
        }
    } );  
  $( '#uploadFile' ).change( function() {
    $( '#image' ).attr( 'src', '/images/ajax-loader.gif'); 
        $( '#uploadForm' ).ajaxSubmit( {
            'dataType': 'json',
            'success': function( data ){                
                if ( data.result == 'SUCCESS' ) {                    
                    $( '#inputImage' ).val( data.image );
                    $( '#image' ).attr( 'src', '/images/images/galleryimages/' + data.image);
                    $( '#imguploadfrm' ).html( '' );
                } else {
                    $( '#inputImage' ).val( data.image );
                    $( '#image' ).attr( 'src', 'images/noPhoto.gif' );
                    showErrorDialog( data.error);
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
    $( '#image' ).attr( 'src', '/images/images/noPhoto.gif' );
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
                        console.log('AJAX error');
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
function vote( id,appid ) {
    $( '#overlay' ).fadeIn( 'slow' );
    FB.login( function( response ) {
        if ( response.authResponse ) {
            FB.api('/me', function(uinfo) {
            //alert('Your name is ' + response.name);
            $.ajax( {
                'type': 'POST',
                'url': 'gallery_app/vote',
                'data': {
                    'signed_request': response.authResponse.signedRequest,
                    'id': id,
                    'fbuserid': uinfo.id,
                    'fbappid': appid,
                    'userdetail' : uinfo
                },
                'dataType': 'json',
                'success': function( data ) {
                    console.log(data);
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
function closealreadyvote() {
    $( '#alreadyvoted' ).fadeOut( 'slow', function() {
        $( '#overlayLight' ).fadeOut( 'fast' );
    } );
}
function getSubmits( page, mode, search ) {
    $( '#overlay' ).fadeIn( 'slow' );
    $.ajax( {
        'type': 'GET',
        'url': 'gallery_app/get_submit',
        'data': {
            'pgno': page,
            'mode': mode,
            'search': search
        },
        'cache': false,
        'success': function( data ) {
            $( '#content' ).html( data );
            
            $( '#overlay' ).fadeOut( 'slow' );
        }
    } );
}