<?php 
header('P3P: CP="CAO PSA OUR"');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="<?=  base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="<?=  base_url()?>assets/js/jss/jquery-1.9.1.js"></script>
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
    FB.Canvas.setSize({ width: 810, height: 1200 });
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

<script>

 var result_pic = new Array();
 var arrlength;
 var indexno=0;
 var insat_userid = <?=$insta_user_id;?>;
 var insat_acc_tkn = '<?=$insta_acc_tkn;?>';
$.ajax({
        type: "GET",
        dataType: "jsonp",
        cache: false,
        url: "https://api.instagram.com/v1/users/"+insat_userid+"/media/recent/?access_token="+insat_acc_tkn+"",
        success: function(response)
        {
            result_pic=response.data;
            arrlength=result_pic.length;
            console.log(result_pic.length);
            show_image();
        }
    });
    
 function show_image()
 {
    for (var i =0; i < arrlength; i++) 
         {
            captiontext ="There is no caption against picture";
            commnent = "There is no comment against picture";
            if(result_pic[i]['comments']['data'][0]!= undefined)
            {
                commnent = result_pic[i]['comments']['data'][0]['text'];
            }
            if(result_pic[i]['caption']!= undefined)
            {
               captiontext = result_pic[i]['caption']['text'];
            }
            username = result_pic[i]['user']['username'];
            dataHTML ='<div class="content-main">'; 
            dataHTML +='<a href="http://instagram.com/'+username+'"><h5>'+username+'</h5></a>'; 
            dataHTML +='<a href="https://apps2.cuecow.com/index.php/instgram_app/showfullimage?appid='+<?=$appid;?>+'&pid='+<?=$pid;?>+'&username='+username+'&imgurl='+result_pic[i].images.low_resolution.url+'&commnent='+commnent+'&captiontxt='+captiontext+'"><img src="'+result_pic[i].images.low_resolution.url+'" width="255" height="255" /></a>';
            dataHTML +='<div class="caption">'+captiontext+'</div>';
            dataHTML +='</div>';
            $("#content-main-outer").append(dataHTML);
         } 
 }
 
</script>
<?php $this->load->view('styles/style'.$tempid);?>
<div id="edittemplate">  
<div class="main-wrapper">
	<div class="content-main-outer" id="content-main-outer">
            
          <div class="clearfix"></div>
        </div><!--- main-wrapper --->
</div>
    <div class="clearfix"></div>
</div>
</body>

</html>