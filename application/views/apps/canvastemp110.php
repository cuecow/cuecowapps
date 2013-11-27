<?php 
header('P3P: CP="CAO PSA OUR"');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
?>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="<?=  base_url()?>assets/css/bootstrap.pagination.css" type="text/css" />
<link href="<?=  base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="<?=  base_url()?>assets/js/bootstrap.pagination.js"></script>
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
    FB.Canvas.setSize({ width: 810, height: 1200 });
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
    (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=396387207139425";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<script>
 var result_pic = new Array();
 var pend=6;
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
            var quotient = Math.ceil(result_pic.length/6);
            $("#quotient").val(quotient);
            show_image(0);
            show_pagination();
        }
    });
    
 function show_image(strt)
 {

    inremnt=6;
    start=strt*7;
    pend=start+inremnt;;

    $("#content-tab-main").empty();
    if(pend > arrlength){pend=arrlength;}
    $("#loopstrt").val(start);
    $("#loopend").val(pend);
    for (var i = start; i < pend; i++) 
         {
            timeStamp = new Date(result_pic[i].created_time*1000);
            commenttext ="There is no caption against picture";
            commnent = "There is no comment against picture";
            if(result_pic[i]['comments']['data'][0]!= undefined)
            {
                commnent = result_pic[i]['comments']['data'][0]['text'];
            }
            if(result_pic[i]['caption']!= undefined)
            {
               commenttext = result_pic[i]['caption']['text'];
            }
            dataHTML ='<div class="content-tab-main">'; 
            dataHTML +='<div class="content-tab-left"><img src="'+result_pic[i].images.low_resolution.url+'" width="90" height="90"></img></div>'; 
            dataHTML +='<div class="content-tab-right"><h4>'+commenttext+'</h4><span class="content-tab-discription">'+timeStamp+'</span>';
            dataHTML +='<p>'+commnent+'</p><div class="clearfix"></div>';
            dataHTML +='<div class="fb-like" data-href="'+result_pic[i].link+'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>';
            dataHTML +='<div class="fb-send" data-href="<?=$appurl?>" style="margin-left:5px"></div>';
            dataHTML +='<a target="_balnk" href="'+result_pic[i].link+'" class="view-photo-btn">View Photo</a>';
            dataHTML +='</div><div class="clearfix"></div></div>';
            $("#content-tab-main").append(dataHTML);
         } 
 }
</script>
<style>
  .pagination {
    display: inline-block;
  }
  .pagination ul {
    float: left;
    margin-right: 10px;
  }

  .float_pagi {
     font-weight : bold;
     font-size : 70px;
     position : absolute;
     display : none;
     pointer-events: none;
  }

</style>
    <div class="main-wrapper">
	<div class="content-inner-content">
            <div id="content-tab-main">  
            
           </div>
           
        </div>
        
<div id="pagination" style="position: absolute; right: 144px;"></div>   
<input id="quotient" value="" type="hidden"/>
<script>
function show_pagination(){    
    var quotient = $("#quotient").val();
    var pagination = new BootstrapPagination("#pagination", {
      numPages: quotient,
      selectedIndex: 0,
      numBlocks: 4,
      prevText: "<<",
      nextText: ">>",
      onSelect: function(selectedIndex){
        show_image(selectedIndex)  
        $("<span class='float_pagi'>" + (selectedIndex) + "</span>")
      }
    });
}
</script>
</div>
</body>

</html>