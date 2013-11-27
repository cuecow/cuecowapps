
<link rel="stylesheet" href="<?=  base_url()?>assets/css/bootstrap.pagination.css" type="text/css" />
<script src="<?=  base_url()?>assets/js/bootstrap.pagination.js"></script>
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
 var pend=6;
 var arrlength;
 var indexno=0;
 var insat_userid = <?=$insta_user_id;?>;
 var insat_acc_tkn = '<?=$insta_acc_tkn;?>';
 function gettagimages(){   
 var hash_tag = document.getElementById('hash').value;
$.ajax({
        type: "GET",
        dataType: "jsonp",
        cache: false,
        url: "https://api.instagram.com/v1/tags/"+hash_tag+"/media/recent?access_token="+insat_acc_tkn+"",
        //url: "https://api.instagram.com/v1/users/"+insat_userid+"/media/recent/?access_token="+insat_acc_tkn+"",
        success: function(response)
        {
            result_pic=response.data;
            console.log(response);
            arrlength=result_pic.length;
            console.log(result_pic.length);
            var quotient = Math.ceil(result_pic.length/5);
            $("#quotient").val(quotient);

            show_image(0);
            show_pagination();
        }
    });
 }
 
//
//for(var i=start; i< result_pic.length ;i++)
//    {
//        var img = result_pic[i]['images']['low_resolution']['url'];
//        console.log(img);
//    }
    
 function save_hash()
 {
     var hash = document.getElementById('hash').value;
      $.ajax({
        type: "POST",        
        url: 'https://apps2.cuecow.com/index.php/page/save_hash',
        
        data: {
                'hash_value':hash
              },
        success: function (data){
                gettagimages();
               console.log(data);
        },
        error: function () {
        alert('error');
        
      }
     
      });
     
 }
 
 function show_image(strt)
 {
    inremnt=5;
    start=strt*6;
    pend=start+inremnt;

    $("#content-tab-main").empty();
    if(pend > arrlength){pend=arrlength;}
    
    for(var i=start; i< pend ;i++)
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
        
        dataHTML +='<div class="content-tab-left"><img src="'+result_pic[i]['images']['low_resolution']['url']+'" width="90" height="90"></img></div>'; 
        dataHTML +='<div class="content-tab-right"><h4>'+commenttext+'</h4><span class="content-tab-discription">'+timeStamp+'</span>';
        dataHTML +='<p>'+commnent+'</p><div class="clearfix"></div>';
        dataHTML +='<a target="_balnk" href="'+result_pic[i].link+'" class="view-photo-btn">View Photo</a>';
        dataHTML +='</div><div class="clearfix"></div></div>';
   
        $("#content-tab-main").append(dataHTML);
        var img = result_pic[i]['images']['low_resolution']['url'];
        console.log(img);
    }
    
//    for (var i = start; i < pend; i++) 
//         {
//            timeStamp = new Date(result_pic[i].created_time*1000);
//            commenttext ="There is no caption against picture";
//            commnent = "There is no comment against picture";
////            if(result_pic[i]['comments']['data'][0]!= undefined)
////            {
////                commnent = result_pic[i]['comments']['data'][0]['text'];
////            }
////            if(result_pic[i]['caption']!= undefined)
////            {
////               commenttext = result_pic[i]['caption']['text'];
////            }
//            dataHTML ='<div class="content-tab-main">'; 
//            dataHTML +='<div class="content-tab-left"><img src="'+result_pic[i].images.low_resolution.url+'" width="90" height="90"></img></div>'; 
//            dataHTML +='<div class="content-tab-right"><h4>'+commenttext+'</h4><span class="content-tab-discription">'+timeStamp+'</span>';
//            dataHTML +='<p>'+commnent+'</p><div class="clearfix"></div>';
//            dataHTML +='<a target="_balnk" href="'+result_pic[i].link+'" class="view-photo-btn">View Photo</a>';
//            dataHTML +='</div><div class="clearfix"></div></div>';
//            $("#content-tab-main").append(dataHTML);
//         } 
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


<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>
    </ul>
<div id="edittemplate">    
    <div class="main-wrapper">
        <div class="hash_div">
        <input class="hash_field" id="hash" type="text" name="fname" placeholder="Enter HashTag">
        <input type="button" value="save" class="image_button btn btn-success" onclick="save_hash()" >
        <p class="hash_des">Hashtag must be without # sign e.g. <strong>Snow</strong> instead of <strong>#Snow</strong></p>
        </div>
        <div  style="position: absolute; margin-left: 650px; margin-top: 4px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>&width=810&height=1200">Change Image</a>
        </div>    
               <div class="content-inner-content">
                <div id="content-tab-main">  

               </div>
        </div><!-- content-inner-content -->
       
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
</div><!--- main-wrapper --->
</div>
 <?php } else {
       
if($insataout !="instagram_auth")
    {  ?>
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
 var images = new Array()
 var pend=6;
 var arrlength;
 var indexno=0;
 var insat_userid = <?=$insta_user_id;?>;
 var insat_acc_tkn = '<?=$insta_acc_tkn;?>';
 function gettagimages(){   
 var hash_tag = document.getElementById('hash').value;
$.ajax({
        type: "GET",
        dataType: "jsonp",
        cache: false,
        url: "https://api.instagram.com/v1/tags/"+hash_tag+"/media/recent?access_token="+insat_acc_tkn+"",
        //url: "https://api.instagram.com/v1/users/"+insat_userid+"/media/recent/?access_token="+insat_acc_tkn+"",
        success: function(response)
        {
            result_pic=response.data;
            console.log(response);
            arrlength=result_pic.length;
            console.log(result_pic.length);
            var quotient = Math.ceil(result_pic.length/5);
            $("#quotient").val(quotient);

            show_image(0);
            show_pagination();
        }
    });
 }
 
//
//for(var i=start; i< result_pic.length ;i++)
//    {
//        var img = result_pic[i]['images']['low_resolution']['url'];
//        console.log(img);
//    }
    
 function save_hash()
 {
     var hash = document.getElementById('hash').value;
      $.ajax({
        type: "POST",        
        url: 'https://apps2.cuecow.com/index.php/page/save_hash',
        
        data: {
                'hash_value':hash
              },
        success: function (data){
                gettagimages();
               console.log(data);
        },
        error: function () {
        alert('error');
        
      }
     
      });
     
 }
 
 function show_image(strt)
 {
    inremnt=5;
    start=strt*6;
    pend=start+inremnt;

    $("#content-tab-main").empty();
    if(pend > arrlength){pend=arrlength;}
    
    for(var i=start; i< pend ;i++)
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
        
        dataHTML +='<div class="content-tab-left"><img src="'+result_pic[i]['images']['low_resolution']['url']+'" width="90" height="90"></img></div>'; 
        dataHTML +='<div class="content-tab-right"><h4>'+commenttext+'</h4><span class="content-tab-discription">'+timeStamp+'</span>';
        dataHTML +='<p>'+commnent+'</p><div class="clearfix"></div>';
        dataHTML +='<a target="_balnk" href="'+result_pic[i].link+'" class="view-photo-btn">View Photo</a>';
        dataHTML +='</div><div class="clearfix"></div></div>';
   
        $("#content-tab-main").append(dataHTML);
        var img = result_pic[i]['images']['low_resolution']['url'];
        console.log(img);
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


<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>
    </ul>
<div id="edittemplate">    
    <div class="main-wrapper">
        <div class="hash_div">
        <input class="hash_field" id="hash" type="text" name="fname" placeholder="Enter HashTag">
        <input type="button" value="save" class="image_button btn btn-success" onclick="save_hash()" >
        <p class="hash_des">Hashtag must be without # sign e.g. <strong>Snow</strong> instead of <strong>#Snow</strong></p>
         </div>
        <div  style="position: absolute; margin-left: 720px; margin-top: 4pxpx;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>&width=810&height=1200">Change Image</a>
        </div>    
            <div class="content-inner-content">
                <div id="content-tab-main">  

               </div>
        </div><!-- content-inner-content -->
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
</div><!--- main-wrapper --->
</div>
 <?php }} ?>   

