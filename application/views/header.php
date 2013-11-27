<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cuecow - the social media engagement platform</title>
<?php $parenturl = "https://panel.cuecow.com";?>
<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>-->
<script src="<?=  base_url()?>assets/js/jss/jquery-1.9.1.js"></script>
<script src="<?=  base_url()?>assets/js/jss/jquery-ui-1.10.1.js"></script>
<script src="<?=  base_url()?>assets/js/jss/bootstrap.min.js"></script>
<script src="<?=  base_url()?>assets/js/jss/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
<script src="<?=  base_url()?>assets/js/jss/jquery-ui-sliderAccess.js" type="text/javascript"></script>
<!--<script src="<?=  base_url()?>assets/js/jss/isotope.js"></script>-->
<script src="<?=  base_url()?>assets/js/jss/jquery.imagesloaded.js"></script>
<script src="<?=  base_url()?>assets/js/jss/flexslider.js"></script>
<script src="<?=  base_url()?>assets/js/jss/carousel.js"></script>
<script src="<?=  base_url()?>assets/js/jss/jquery.cslider.js"></script>
<script src="<?=  base_url()?>assets/js/jss/slider.js"></script>
<!--<script src="<?=  base_url()?>assets/js/jss/fancybox.js"></script>-->
<script defer="defer" src="<?=  base_url()?>assets/jss/custom.js"></script>
<script src="<?=base_url();?>js/richtxt/nicEdit.js" type="text/javascript"></script>
<script src="<?=  base_url()?>assets/js/jss/main.js"></script>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'></link>

<!-- end: Java Script -->
<link rel="stylesheet" href="<?=  base_url()?>assets/css/jquery-ui-bootstrap-theme/jquery.ui.1.10.0.ie.css" />
<link rel="stylesheet" href="<?=  base_url()?>assets/css/jquery-ui-bootstrap-theme/jquery-ui-1.10.0.custom.css" />
<link rel="stylesheet" media="all" type="text/css" href="<?=  base_url()?>assets/css/jquery-ui-timepicker-addon.css" />	
<link rel="stylesheet" media="all" type="text/css" href="https://panel.cuecow.com/css/extra.css" />
 <script>
    $('.mydialog').dialog({
        autoOpen: false,
        width: 600,
        buttons: {
            "Ok": function () {
                $(this).dialog("close");
            },
            "Cancel": function () {
                $(this).dialog("close");
            }
        }});
    $('.mydialog').dialog('open');
    
  $(document).ready(function(){
        console.log("I am ready");
        setTimeout(function() {            
            document.getElementById('alerts').style.display='none';
        }, 1500);        
        
  });    

  $(document).ready(function(){
        console.log("I in maintenance");
	urlprotocol=window.location.href;
    var url_protocol = urlprotocol.split("://");
    var url_protocol=url_protocol[0];
        window.setInterval(function() {
                            $.ajax({
                                type: 'POST',
                                            'url': url_protocol+'://apps2.cuecow.com/index.php/homepage/chk_deploy_file',
                                            'data': {
                                             },
                                            'dataType': 'json',
                                'success': function(response) {
                                    result=response['result'];
                                    if(result=="deploy_file_not_exist")
                                        {
                                          document.getElementById('maintenance_Time').style.display='none';  
                                        }
                                },
                                'error': function(){
                                    console.log('Error');
                                }
                            });            
        }, 15000);        
        
  });   
</script>
<script>
function edit_popup_content(k,id,cont_txt)
{
	$('#content_text'+k).empty();
	$('#content_text'+k).append('<textarea name="content_edit_txt" id="content_edit_txt" onblur="save_content_txt('+k+','+id+');" >'+cont_txt+'</textarea>');
}

function save_content_txt(k,id)
{
	urlprotocol=window.location.href;
    var url_protocol = urlprotocol.split("://");
    var url_protocol=url_protocol[0];
	content_edit_txt = $('#content_edit_txt').val();
	$('#content_text'+k).empty();
	$('#content_text'+k).append(content_edit_txt);
		$.ajax({
				type: 'POST',
							'url': url_protocol+'://apps2.cuecow.com/index.php/homepage/save_edit_content',
							'data': {
								'auto_id':id,
                                'content_txt':content_edit_txt
							 },
							'dataType': 'json',
				'success': function(response) {
					console.log(response);
				},
				'error': function(){
					console.log('Error');
				}
			});
}
</script>


<link href="<?=  base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?=  base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="clearfix"></div>

<div id="overlay_content"></div>
<div id="content_floatingdiv">
	<h4>Edit Content text</h4>
    
    <table cellpadding="0" cellspacing="1" style="width:100%;" class="table table-striped"> 
    <thead> 
    <tr> 
        <th width="18%" align="left"  style="border-top: 0px !important;"><strong>Content Id</strong></th> 
        <th width="2%"  style="border-top: 0px !important;">&nbsp;</th>
        <th width="8%" align="left"  style="border-top: 0px !important;"><strong>Language</strong></th>
        <th width="2%"  style="border-top: 0px !important;">&nbsp;</th>
        <th width="70%" align="left"  style="border-top: 0px !important;"><strong>Text</strong></th>
    </tr> 
    </thead> 
    <tbody>
	   <?php if($content_mgrdata_popup[0]>0){ for($k=0;$k<count($content_mgrdata_popup[0]);$k++) {?>     
			<tr> 
                <td width="18%" align="left"><a href="#" onclick="edit_popup_content(<?=$k;?>,<?=$content_mgrdata_popup[0][$k]['id'];?>,'<?=$content_mgrdata_popup[0][$k]['content_txt'];?>');"> <?=$content_mgrdata_popup[0][$k]['content_id'];?></a></td> 
				<td width="2%">&nbsp;</td>
                <td width="8%" align="left"><?=$content_mgrdata_popup[0][$k]['language'];?></td> 
				<td width="2%">&nbsp;</td>
                <td width="70%" align="left" id="content_text<?=$k;?>"><?=$content_mgrdata_popup[0][$k]['content_txt'];?></td>
            </tr>
	  <?php }} ?>  
	</tbody>
    </table>
</div>
<div class="header-content-fix">
    <div class="clearfix"></div>
   <header>		
		<!--start: Container -->
		<div class="container">
			<a class="brand" href="#"><img src="<?=  base_url()?>assets/images/cuecow-logo_small.png" width="166" height="88" /></a>
			<!--start: Navbar -->
			<div class="navbar navbar-inverse">
	    		<div class="navbar-inner">
	          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	            		<span class="icon-bar"></span>
	            		<span class="icon-bar"></span>
	            		<span class="icon-bar"></span>
	          		</a>	
	          		<div class="nav-collapse collapse">
	            		<ul class="nav">
                                        <li>
                                           <a href="<?=$parenturl?>/index.php/user/dashboard">Dashboard</a> 
<!--                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dashboard<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Home standard</a></li>
                                                <li><a href="#">Home alternative</a></li>
                                                <li><a href="#">Home alternative 2</a></li>
                                                <li><a href="#">Home alternative 3</a></li>
                                            </ul>-->
	              			</li>
                                        <li class="dropdown">
                                            <a href="<?=$parenturl?>/index.php/location/location/view/List" class="dropdown-toggle" data-toggle="dropdown">Venues<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                             <li><a href="<?=$parenturl?>/index.php/location/location/view/List">List of Venues</a></li>
                                             <li><a href="<?=$parenturl?>/index.php/location/location/view/Map">Map of Venues</a></li>
                                             <li><a href="<?=$parenturl?>/index.php/location/location/view/Groups">Group of Venues</a></li>
                                             <li><a href="<?=$parenturl?>/index.php/location/location/view/AddGroups">Add new Group</a></li>
                                             <li><a href="<?=$parenturl?>/index.php/location/location/view/Add">Add Venue</a></li>
                                            </ul>
                                         </li>
	              			<li><a href="<?=$parenturl?>/index.php/user/campaign">Campaigns</a></li>
							
                                        <li class="dropdown">
                                            <a href="<?=$parenturl?>/index.php/user/dashboard" class="dropdown-toggle" data-toggle="dropdown">Pages<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                             <li><a href="<?=$parenturl?>/index.php/user/facebook/view/post">Manage Facebook Wall</a></li>
                                             <li><a href="<?=$parenturl?>/index.php/user/facebook/view/Manage">Manage Facebook Post</a></li>
                                            </ul>
	              			</li>									
                                        <?php if($this->session->userdata('adminid')==1){ $fname=$this->session->userdata("fname") ?>		
                                        <li class="dropdown active">
	                			<a href="<?=base_url();?>index.php" class="dropdown-toggle" data-toggle="dropdown">Apps<b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?=base_url();?>index.php">Apps</a></li>
                                                    <li><a href="<?=base_url();?>index.php/page/admin_email">Email Admin</a></li>
                                                    <li><a href="<?=base_url();?>index.php/page/support_admin">Maintenance</a></li>
                                                    <li><a href="<?=base_url();?>index.php/page/content_mgr">Content Manager</a></li>
                                                    <li><a href="<?=base_url();?>index.php/page/user_mgm">User Management</a></li>
                                                </ul>
                                        </li>
                                        <?php } else{ ?>		
                                        <li class="active">
	                			<a href="<?=base_url();?>index.php">Apps</a>
	              			</li>
                                        <?php } ?>
                                        <li><a href="<?=$parenturl?>/index.php/user/buzz">Buzz</a></li>
                                        <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?=$parenturl?>/index.php/site/logout">Log Out</a></li>
                                            <li><a href="<?=$parenturl?>/index.php/user/profile/view/password">Settings</a></li>
                                        </ul>
	              			</li>
                            
	            		</ul>
	          		</div>
	        	</div>
	      	</div>
			<!--end: Navbar -->
			
		</div>
		<!--end: Container-->			
			
	</header>
	<!--end: Header-->
</div>
<div class="clearfix"></div>
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">
				
                
				
                <div class="container">
				<?php if(isset($contentMgr) && $contentMgr=="content Mgr") { ?>
				<h2><i class="ico-embed-close ico-white"></i>Edit Content Text</h2>
				<?php }else{ ?>
				<h2><i class="ico-embed-close ico-white"></i>Manage Facebook Applications</h2>
				<?php } ?>
			</div>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
    <div class="clear"></div>    
<div align="center" id="alerts">
<?php
$inf_msg = $this->session->userdata('INF_MSG');
$err_msg = $this->session->userdata('ERR_MSG');
$maintenanceTime_msg = $this->session->userdata('maintenanceTime');
if(!empty($inf_msg)){?>
     <div class="alert alert-success" id="alerts"> 
          <button type="button" class="close" data-dismiss="alert">&times;</button>   
         <?php 
            echo $inf_msg; 
            $this->session->unset_userdata('INF_MSG');
            ?>
        </div>
<?php }else if(!empty($err_msg)){?>
     <div class="alert alert-error" id="alerts"> 
         <button type="button" class="close" data-dismiss="alert">&times;</button>  
          <?php 
            echo $err_msg;
            $this->session->unset_userdata('ERR_MSG');
            ?>
    </div>
<?php }?>
</div>   
    <div id="maintenance_Time" style="margin-left:62px; margin-right:62px;">    
        <?php if(isset($maintenanceTime_msg) && $maintenanceTime_msg=="maintenanceTime"){?>
             <div class="alert alert-block"> 
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <h4>Website Under Maintenance!</h4>
                 <p><?=$this->session->userdata('deploy_msg');?>. The process started at <?=$this->session->userdata('deploy_time');?> on <?=$this->session->userdata('deploy_date');?> and is expected to complete in less than 15 minutes.
                     You are free to continue using our platform, although there is a risk of hitting application errors.
                     These errors are temporary and will disappear once deployment has finished. 
                     This message will disappear once deployment has completed</p>
            </div>
        <?php }?>
     </div>      
<div class="container" >
<div>
  <?php $fname=$this->session->userdata("fname");
      $lname=$this->session->userdata("lname");
      $fullname=$fname." ".$lname;
      $eemial=$this->session->userdata("u_email");
   ?>     
 <!-- begin olark code --><script type='text/javascript'>/*{literal}<![CDATA[*/window.olark||(function(i){var e=window,h=document,a=e.location.protocol=="https:"?"https:":"http:",g=i.name,b="load";(function(){e[g]=function(){(c.s=c.s||[]).push(arguments)};var c=e[g]._={},f=i.methods.length; while(f--){(function(j){e[g][j]=function(){e[g]("call",j,arguments)}})(i.methods[f])} c.l=i.loader;c.i=arguments.callee;c.f=setTimeout(function(){if(c.f){(new Image).src=a+"//"+c.l.replace(".js",".png")+"&"+escape(e.location.href)}c.f=null},20000);c.p={0:+new Date};c.P=function(j){c.p[j]=new Date-c.p[0]};function d(){c.P(b);e[g](b)}e.addEventListener?e.addEventListener(b,d,false):e.attachEvent("on"+b,d); (function(){function l(j){j="head";return["<",j,"></",j,"><",z,' onl'+'oad="var d=',B,";d.getElementsByTagName('head')[0].",y,"(d.",A,"('script')).",u,"='",a,"//",c.l,"'",'"',"></",z,">"].join("")}var z="body",s=h[z];if(!s){return setTimeout(arguments.callee,100)}c.P(1);var y="appendChild",A="createElement",u="src",r=h[A]("div"),G=r[y](h[A](g)),D=h[A]("iframe"),B="document",C="domain",q;r.style.display="none";s.insertBefore(r,s.firstChild).id=g;D.frameBorder="0";D.id=g+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){D.src="javascript:false"} D.allowTransparency="true";G[y](D);try{D.contentWindow[B].open()}catch(F){i[C]=h[C];q="javascript:var d="+B+".open();d.domain='"+h.domain+"';";D[u]=q+"void(0);"}try{var H=D.contentWindow[B];H.write(l());H.close()}catch(E){D[u]=q+'d.write("'+l().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}c.P(2)})()})()})({loader:(function(a){return "static.olark.com/jsclient/loader0.js?ts="+(a?a[1]:(+new Date))})(document.cookie.match(/olarkld=([0-9]+)/)),name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark('api.visitor.updateFullName', {fullName: '<?=$fullname;?>'});
olark('api.visitor.updateEmailAddress', {emailAddress: '<?=$eemial;?>'});
olark.identify('6977-216-10-1541');/*]]>{/literal}*/</script>
<!-- end olark code -->   
</div> 
<script type="text/javascript">

var isCtrl = false;

$("body").keyup(function (e) 
{
	if(e.keyCode == 27)
	{
		$('#content_floatingdiv').hide();
		$('#overlay_content').hide();
	}
	
	if(e.keyCode == 17) 
		isCtrl=false;
}).keydown(function (e) 
{
	if(e.keyCode == 17) 
		isCtrl=true;
	
	if(e.keyCode == 69 && isCtrl == true) 
	{
		//$("body").scrollTop();
		$('#content_floatingdiv').show();
		$('#overlay_content').show();
		return false;
	}
});

</script>   
 </body>
</html>
    