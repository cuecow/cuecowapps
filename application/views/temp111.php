<?php 
$insataout=$this->session->userdata("instagram_auth");
if(count($user_insta_info)!=0 && $user_insta_info[0]['isactive']==1 )
 {
   
$this->load->view('styles/style'.$tempid);    
$insta_user_id=$user_insta_info[0]['instag_userid'];
$insta_acc_tkn=$user_insta_info[0]['insatg_acc_tkn'];
 ?>

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
            dataHTML +='<a href="#"><img src="'+result_pic[i].images.low_resolution.url+'" width="255" height="255" /></a>';
            dataHTML +='<div class="caption">'+captiontext+'</div>';
            dataHTML +='</div>';
            $("#content-main-outer").append(dataHTML);
         } 
 }
</script>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>
    </ul>
<div id="edittemplate">  
<div class="main-wrapper">
	<div class="content-main-outer" id="content-main-outer">
            
          <div class="clearfix"></div>
        </div><!--- main-wrapper --->
</div>
    <div class="clearfix"></div>
</div>    
<?php } else {
       
if($insataout !="instagram_auth")
    { ?>
      <div class="alert alert-info" style="margin-top:45px;">
          Please Authorize your Instagram account.
        </div>
      <a style="display:block; margin: 20px auto; width: 192px;" href="https://instagram.com/oauth/authorize/?client_id=4785a6e6d4f24857affc87bebc49000d&redirect_uri=https://apps2.cuecow.com/index.php/page/gettkn&response_type=code" >
          <img src="<?=  base_url()?>images/images/login_insta.png" style=" border-radius:5px; -webkit-border-radius:5px; -moz-border-radius:5px; -o-border-radius:5px;" />
      </a>
   <?php } else {
   
$this->load->view('styles/style'.$tempid);    
$insta_user_id=$user_insta_info[0]['instag_userid'];
$insta_acc_tkn=$user_insta_info[0]['insatg_acc_tkn'];
 ?>

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
            dataHTML +='<a href="#"><img src="'+result_pic[i].images.low_resolution.url+'" width="255" height="255" /></a>';
            dataHTML +='<div class="caption">'+captiontext+'</div>';
            dataHTML +='</div>';
            $("#content-main-outer").append(dataHTML);
         } 
 }
</script>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>
    </ul>
<div id="edittemplate">  
<div class="main-wrapper">
	<div class="content-main-outer" id="content-main-outer">
            
          <div class="clearfix"></div>
        </div><!--- main-wrapper --->
</div>
<div class="clearfix"></div>    
</div>    
<?php }} ?>