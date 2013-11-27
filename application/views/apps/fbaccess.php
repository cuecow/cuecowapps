<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '<?=$appid;?>', // App ID from the App Dashboard
//      channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File for x-domain communication
      status     : true, // check the login status upon init?
      cookie     : true, // set sessions cookies to allow your server to access the session?
      xfbml      : true  // parse XFBML tags on this page?
    });

    // Additional initialization code such as adding Event Listeners goes here
 FB.getLoginStatus(function(response) {
        if (response.status == 'connected') 
        {
                    FB.api('/me', function(response){
                        console.log(response);
                            });
            top.location.href='<?=$pagurl;?>';                
        } 
        else {
            //user is not connected.
            FB.login(function(response) {
                if (response.authResponse)
                {
                        FB.api('/me', function(response){
                                    console.log(response);
                                    
                               });
                       top.location.href='<?=$pagurl;?>';        
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            },{scope: 'email,user_birthday'});
             
        }
    });
  };
  (function(d, debug){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
     ref.parentNode.insertBefore(js, ref);
   }(document, /*debug*/ false));
</script>
</html>

