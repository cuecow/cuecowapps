<?php 
header('P3P: CP="CAO PSA OUR"');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
?>
<html>
<title>Contact App</title>
<head>   
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://apps2.cuecow.com/js/popup-js.js" ></script>
  <link rel="stylesheet" href="https://apps2.cuecow.com/css/popup-style.css"/>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script>    
function your_vote_for()
   {
    $('#fan-week-app-main-wrapper_1').hide();
    $('#askforvote').show();
   }
</script>
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


function choseme(uid,pgid,pageurl,appid,appserrt) {
                            //user is not connected.
            var access_token;                
            FB.login(function(response) {
                if (response.authResponse) {   
                 access_token =   FB.getAuthResponse()['accessToken'];
                 $.get('https://graph.facebook.com/oauth/access_token?client_id='+appid+'&client_secret='+appserrt+'&grant_type=fb_exchange_token&fb_exchange_token='+access_token, function(data) {
                            console.log(data);
                            var result = data.split('&');
                            result2=result[0];
                            var result3 = result2.split('=');
                            longaccess_token=result3[1];
                            console.log(result3[1]);
                            choosem(uid,longaccess_token,pgid,pageurl); 
                    });
                } else {
                    alert('User cancelled login or did not fully authorize.');
                }
            },{scope: 'publish_stream,offline_access'});
     }
 function choosem(uid,access_token,pgid,pageurl){
        var msg;
        $(document).ready(function() {
        msg = $("#message").val();
        });
        $("#backgroundPopup").fadeOut("slow");
        $("#popupContact").fadeOut("slow");
        console.log(uid);
        FB.ui( {
            'method': 'feed',
            'link': pageurl+'&app_data='+uid,
            'picture':'https://apps2.cuecow.com/images/640X425/<?=$tempdata[0][7]['value'];?>',
            'name': "Fan of the Week",
            'caption':msg
//            actions: [
//                    { name: 'Vote', link: 'http://www.fbrell.com/' }
//                    ]
            },            
            function(response) {
             if (response && response.post_id) {
                        $.ajax({
                                type: 'POST',
                                            'url': 'fan_of_week_app/save_fandata',
                                            'data': {
                                                'values': uid,
                                                'acctoken':access_token
                                            },
                                            'dataType': 'json',
                                'success': function(response) {
                                    console.log(response);
                                    top.location.href=response['result'];
                                },
                                'error': function(){
                                    alert('Error');
                                }
                                }); 
                               } else {
                                    //alert('Post was not published.');
                                }
                            });
            
        }

function ourfanofweek(fanname,pgid,appid,fbuid,pagurl)
{ //alert(fanname);alert(pgid);alert(appid);alert(fbuid);alert(pagurl);
        console.log(fanname); 
        FB.ui( {
            'method': 'feed',
            'link':  pagurl,
            'picture':'https://apps2.cuecow.com/images/640X425/<?=$tempdata[0][7]['value'];?>',
            'name': "Fan of the Week",
            'caption':'Our Fan of the week is...'+fanname+'! Congratulations. Want to be our next fan of the week? Click below to apply.'
            },
            function(response) {
             if (response) {
                 $('#fanimg').html('<img src="https://graph.facebook.com/'+fbuid+'/picture" width="224" height="160" />');
                     $('#seconddiv').show();
                     $('#firstdiv').hide();
                            
                $.ajax({
                    type: 'POST',
                    'url': 'fan_of_week_app/fanofweekupdate',
                                            'data': {
                                                'fbuserid': fbuid,
                                                'pagid': pgid,
                                                'appid': appid
                                            },
                                            'dataType': 'json',
                                'success': function(response) {
                                    console.log(response['result']=='SUCCESS');
                                    if(response)
                                    {
                                      console.log('success');
                                    }},
                                'error': function(){
                                    console.log('Errorf');
                                    }
                            });
            } else {
            //alert('Post was not published.');
          }
        });                        
}

function vote(name,cid,fbid)
{
                          $.ajax({
                                type: 'POST',
                                            'url': 'fan_of_week_app/alredyvoted',
                                            'data': {
                                                'voterid': fbid,
                                                'candid': cid
                                            },
                                            'dataType': 'json',
                                'success': function(response) {
                                    console.log(response['result']=='SUCCESS');
                                    if(response['result']=='SUCCESS')
                                    {
                                     // $('#voted').show();
                                      alert('You have already voted to '+name+'');
                                    }
                                    else
                                        {
                                            $('#votrfor').html('Vote for '+name+'?');
                                            $('#casting').html('You are casting a vote to get '+name+' Selected as the Fan of the Week.');
                                            $('#linkk').html('<a style="width: 60px; float:left" class="blue-btn" href="fan_of_week_app/save_vote?cndid='+cid+'&vtrid='+fbid+'">Ok</a>'); 
                                            $('#votedto').show(); 
                                        }
                                },
                                'error': function(){
                                    alert('Errorf');
                                }
                                });
                                 
}

function closediv()
{
 $('#voted').hide();
 $('#votedto').hide();
}
</script>
   <?php $this->load->view('styles/style'.$tempid);?>     
   <div class="fan-week-app-main-wrapper" id="firstdiv">
	<div class="fan-week-app-top-conent">
            <div class="fan-week-app-top-left">
                    <div class="fan-week-app-top-title"><?=$tempdata[0][0]['value'];?></div>
                    <div style="height:10px"></div>
                    <div class="fan-week-app-top-left-image-content">
                        <img src="<?=  base_url();?>images/580X385/<?=$tempdata[0][5]['value'];?>" width="530" height="355" />
                    <div class="fan-week-app-top-left-thumbnail-cnt">
                            <!--<img src="<?=  base_url();?>images/images/thumbnail.png" width="176" height="109" />-->
                    </div>
                    </div><!--- fan-week-app-top-left-image-content --->
            </div><!--- fan-week-app-top-left --->
        <div class="fan-week-app-top-right">
             <?php if($app_userid=='already_candidate'){ ?>
                <div class="fan-week-app-top-title">Candidate for next fan of the week</div>
                <div class="candidate-content-mian">
            	<div class="candidate-content-left"><img src="https://graph.facebook.com/<?= $admin_idd;?>/picture" /></div>
                <div class="candidate-content-middle">
                	<p><?= $admin_name;?></p>
                    <?php if($isadmin=='bool()true'){ ?>   
                    <a href="#" onclick="ourfanofweek('<?= $admin_name;?>','<?= $admin_pageid;?>','<?= $admin_appid;?>','<?= $admin_idd;?>','<?=$pagurl;?>')">Choose</a>
                    <?php } ?>
                </div>
                <div class="candidate-content-right">
                	<p><?= $admin_vote;?> Votes</p>
                    <a href="#" onclick="vote('<?= $admin_name;?>','<?= $admin_idd;?>','<?= $admin_idd;?>');">Vote</a>
                </div>
                <span class="clear"></span>
                </div><!-- candidate-content-mian -->
                <div class="clear"></div>
              <?php if(isset($cand_list)){ ?> 
              <?php for($l=0;$l<count($cand_list);$l++){ ?>
               <div class="candidate-content-mian"> 
               <div class="candidate-content-left"><img src="https://graph.facebook.com/<?= $cand_list[$l]['userinfo']['fb_userid'];?>/picture" /></div>
                <div class="candidate-content-middle">
                	<p><?= $cand_list[$l]['userinfo']['user_name'];?></p>
                     <?php if($isadmin=='bool()true'){ ?>   
                    <a href="#" onclick="ourfanofweek('<?= $cand_list[$l]['userinfo']['user_name'];?>','<?= $cand_list[$l]['userinfo']['page_id'];?>','<?= $cand_list[$l]['userinfo']['app_id'];?>','<?= $cand_list[$l]['userinfo']['fb_userid'];?>','<?=$pagurl;?>')">Choose</a>
                    <?php } ?>
                </div>
                <div class="candidate-content-right">
                	<p><?=$cand_list[$l]['voteinfo'];?> Votes</p>
                    <a href="#" onclick="vote('<?= $cand_list[$l]['userinfo']['user_name'];?>','<?= $cand_list[$l]['userinfo']['fb_userid'];?>','<?= $admin_idd;?>');">Vote</a>
                </div>
                <span class="clear"></span>
                </div><!-- candidate-content-mian -->
                <div class="clear"></div> 
              <?php } }?>
                <div class="dandidate-btn"><a href="fan_of_week_app/delete_cand" class="blue-btn">Stop Being a Candidate</a></div>
                <p class="fan-week-app-top-right-pera-admin"><?=$tempdata[1][4]['value'];?></p>
                <?php if($isadmin=='bool()true'){ ?> 
                <div class="clear"></div>
                <a class="clear-list-btn" href="fan_of_week_app/clearlist">Clear candidate List</a>
            <?php } } else { ?>
                <div class="fan-week-app-top-title"><?=$tempdata[1][0]['value'];?></div>
                <p class="fan-week-app-top-right-pera-admin"><?=$tempdata[1][1]['value'];?></p>
                                <div class="clear"></div>
              <?php if(isset($cand_list)){ ?> 
              <?php for($l=0;$l<count($cand_list);$l++){ ?>
               <div class="candidate-content-mian">                 
               <div class="candidate-content-left">                   
                   <img src="https://graph.facebook.com/<?=$cand_list[$l]['userinfo']['fb_userid'];?>/picture" /></div>
                <div class="candidate-content-middle">
                	<p><?= $cand_list[$l]['userinfo']['user_name'];?></p>
                    <?php if($isadmin=='bool()true'){ ?>    
                    <a href="#" onclick="ourfanofweek('<?= $cand_list[$l]['userinfo']['user_name'];?>','<?= $cand_list[$l]['userinfo']['page_id'];?>','<?= $cand_list[$l]['userinfo']['app_id'];?>','<?= $cand_list[$l]['userinfo']['fb_userid'];?>','<?=$pagurl;?>')">Choose</a>
                    <?php } ?>
                </div>
                <div class="candidate-content-right">
                	<p><?=$cand_list[$l]['voteinfo'];?> Votes</p>
                    <a href="#" onclick="vote('<?= $cand_list[$l]['userinfo']['user_name'];?>','<?= $cand_list[$l]['userinfo']['fb_userid'];?>','<?= $admin_idd;?>');">Vote</a>
                </div>
                <span class="clear"></span>
                </div><!-- candidate-content-mian -->
                <div class="clear"></div> 
              <?php } }?>
                <div class="choose-me-btn"><a href="#" class="blue-btn">Please choose me</a></div>
            <?php } ?>
        </div><!--- fan-week-app-top-right --->
        <div class="clear"></div>
    </div><!--- fan-week-app-top-conent --->
</div><!--- fan-week-app-main-wrapper --->

<div class="fan-week-app-main-wrapper" id="seconddiv"  style="display: none">
    <div class="show-fan-inner-content">
    	<div class="show-fan-inner-top"><?=$tempdata[0][8]['value'];?></div>
        <div class="show-fan-inner-middle"><img src="<?=  base_url();?>images/images/<?=$tempdata[0][7]['value'];?>" width="640" height="454" />
                <div class="show-fan-inner-middle-thumbnail-cnt" id="fanimg">
                	
                </div>
        </div><!-- show-fan-inner-middle -->
    </div><!-- show-fan-inner-content -->
</div>  
<?php if($isadmin=='bool()true'){
$days = array(
    "0" => "Select Day",
    "1" => "Monday",
    "2" => "Tuesday",
    "3" => "Wednesday",
    "4" => "Thursday",
    "5" => "Friday",
    "6" => "Saturday",
    "7" => "Sunday"
);
$times = array(
         "0" => "Select Time",
         "1" => "08:30 am",
         "2" => "09:30 am",
         "3" => "10:30 am",
         "4" => "11:30 am",
         "5" => "12:30 pm",
         "6" => "01:30 pm",
         "7" => "02:30 pm",
         "8" => "03:30 pm",
         "9" => "04:30 pm",
         "10" => "05:30 pm",
         "11" => "06:30 pm",
         "12" => "07:30 pm",
         "13" => "08:30 pm",
         "14" => "09:30 pm",
         "15" => "10:30 pm",
         "16" => "11:30 pm",
         "17" => "12:30 am",
         "18" => "01:30 am",
         "19" => "02:30 am",
         "20" => "03:30 am",
         "21" => "04:30 am",
         "22" => "05:30 am",
         "23" => "06:30 am",
         "24" => "07:30 am",
);
?>
 <div class="fan-week-app-main-wrapper">  
    <form method="post" action="<?=  base_url();?>index.php/fan_of_week_app/saveautotime" > 
    <div class="pick-fan-form">       
    	<div class="pick-fan-form-fields"><?php if(count($autotime)>0) { ?><input type="checkbox" checked="checked"/> Each <?php } else {?> <input type="checkbox"/> Each <?php } ?>
        <select id="dayoption" name="dayoption">  
         <?php for($i=0;$i<count($days);$i++) { 
                    if( count($autotime)>0 && $autotime[0]['autoday']==$days[$i] ) { ?>
                        <option selected="selected" ><?= $days[$i];?></option>
          <?php     } 
                    else { ?>
                        <option><?= $days[$i];?></option>
          <?php     }
                } ?>      
        </select> at 
        <select id="timeoption" name="timeoption">   
         <?php for($k=0;$k<count($times);$k++){
         if( count($autotime)>0 && $autotime[0]['autotime']==$times[$k] ) { ?>
            <option selected="selected"><?=$autotime[0]['autotime'] ;?></option>    
             <?php     } 
                    else { ?>   
        	<option><?= $times[$k];?></option>
          <?php } } ?> 
        </select></div>
      <div><?=$tempdata[0][4]['value'];?></div>
       <div align="right"><input type="submit" value="Save" /></div>
    </div>  
  </form> 
</div><!--- fan-week-app-main-wrapper --->
<?php } ?>
<!------- slider html -------->

<div id="popupContact" class="popup-content">        
    <div class="choose-me-content">
            <a href="#" class="choose-me-cross close-link" id="popupContactClose">Close</a>
            <h2>Ask friends to Vote for you</h2>
            <form>
                <textarea id="message" name="message"><?=$tempdata[0][3]['value'];?></textarea>
                <div style="width: 60px"><a class="blue-btn" href="#" onclick="choseme(<?=$fbuserid;?>,<?=$pgid;?>,'<?=$pagurl;?>',<?=$appid;?>,'<?=$appsecret;?>');">Ok</a></div>
            </form>
    </div><!-- choose-me-content -->
</div>
<?php
    if($voter_status=='notalredyvoted'){ ?> 
            <!------- slider html -------->
            <div class="vote-friend-content-outer" id="voted">
                <div class="vote-friend-content">
                        <a href="#" class="choose-me-cross"  onclick="closediv();">Close</a>
                        <h3>Vote for <?= $cand_name;?>?</h3>
                        <p>You are casting a vote to get <?= $cand_name;?> Selected as the Fan of the Week.</p>
                        <a style="width: 60px" class="blue-btn" href="fan_of_week_app/save_vote?cndid=<?= $cand_id ;?>&vtrid=<?= $admin_idd;?>">Ok</a>
                </div><!-- vote-friend-content -->
            </div><!-- vote-friend-content-outer -->   
   <?php } else if($voter_status=='alredyvoted'){?>
            <div class="vote-friend-content-outer" id="voted">
                <div class="vote-friend-content">
                        <a href="#" class="choose-me-cross" onclick="closediv();">Close</a>
                        <h3>You have already voted</h3>
                </div><!-- vote-friend-content -->
            </div><!-- vote-friend-content-outer -->
            <?php } ?>
            
  <div class="vote-friend-content-outer" id="votedto" style="display: none">
                <div class="vote-friend-content">
                        <a href="#" class="choose-me-cross"  onclick="closediv();">Close</a>
                        <h3 id="votrfor"></h3>
                        <p id="casting"></p>
                        <p id="linkk"></p>
                        <div style="clear:both"></div>
                </div><!-- vote-friend-content -->
  </div><!-- vote-friend-content-outer -->             
<div id="backgroundPopup" class="background-popup"></div>
    <!------- slider html -------->       
</body>
</html>