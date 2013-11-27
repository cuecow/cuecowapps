<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>    
<title>Cuecow - the social media engagement platform</title>
<?php $parenturl = "https://panel.cuecow.com";?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<link href="<?=$parenturl?>/assets/css/master.php?color=454e51" rel="stylesheet" type="text/css" />
<link href="<?=$parenturl?>/assets/css/text.css" rel="stylesheet" type="text/css" />
<link href="<?=$parenturl?>/assets/css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?=$parenturl?>/assets/css/960.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>		
<!------------------------------------INCLUDES NEW------------------------------------------------------------------->
<link href="<?=base_url();?>css/style.css" type="text/css" rel="stylesheet" />
<!--------------------------------FACEBOX INCLUDES------------------------------------------------------------>
<!--<link rel="stylesheet" href="<?base_url();?>js/facefiles/facebox.css" />
<script src="<?base_url();?>js/facefiles/facebox.js"></script>	-->
<!-------------------------------EDN FACEBOX INCLUDES------------------------------------------------------->
</head>
<body>
<div class="container_4 no-space header-wrap">
	<div id="header">
		<!-- LOGO -->
		<div id="logo" class="grid_3"><h1>Admin Pro</h1></div>
		<!-- EYEBROW NAVIGATION -->
		<div id="eyebrow-navigation" class="grid_1">
			<a href="<?=$parenturl?>/index.php/user/profile" class="settings">Settings</a>
			<a href="<?=$parenturl?>/index.php/site/logout"  class="signout">Sign Out</a>
		</div>
		<!-- MAIN NAVIGATION WITH ICON CLASSES -->
		<div id="main-navigation">
			<div class="nav-wrap clearfix">
				<div class="grid_3">				
					<!-- Regular Navigation
						 Each nav item has a different class, you'll notice. This is what creates the different icons you see.
						 To add a new one, simply create a new PNG and create the class for it in "master.php" -->
						 
					<!-- The class "hide-on-mobile" will hide this navigation on a small mobile device. -->
					<ul class="hide-on-mobile">
                                            <li>
                                                <a href="<?=$parenturl?>/index.php/user/dashboard" class="grid "><img src="<?=$parenturl?>/assets/images/i_dashboard.png"> Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="<?=$parenturl?>/index.php/user/location" class="dashboard "><img src="<?=$parenturl?>/assets/images/i_venues.png"> Venues</a>
                                            </li>
                                            <li>
                                                <a href="<?=$parenturl?>/index.php/user/campaign" class="forms "><img src="<?=$parenturl?>/assets/images/i_campaigns.png"> Campaigns</a>
                                            </li>
                                            <li>
                                                <a href="<?=$parenturl?>/index.php/user/facebook/view/post" class="forms"><img src="<?=$parenturl?>/assets/images/i_pages.png"> Pages</a>
                                            </li>
                                            <li>
                                                <a class="page active" href="<?=base_url();?>index.php"><img src="<?=$parenturl?>/assets/images/i_buzz.png"> Apps</a>
                                            </li>						
                                            <li>
                                                <a href="<?=$parenturl?>/index.php/user/buzz" class="buzz "><img src="<?=$parenturl?>/assets/images/i_buzz.png"> Buzz</a>
                                            </li>
					</ul>					
					<!-- The class "show-on-mobile" will show only this navigation on a small mobile device. It's a
						 dropdown select box that loads the page upon select. Dependant on JS within "custom.js" -->
					<div class="show-on-mobile">
						<div class="mobile-nav-wrap">
							<select name="navigation" class="mobile-navigation">
								<option value="">Choose a Page...</option>
								<option value="dashboard.php">Dashboard</option>
								<option value="grid.php">Grid Styles</option>
								<option value="page.php">Page Layout</option>
								<option value="stats.php">Statistics</option>
								<option value="gallery.php">Gallery</option>
								<option value="forms.php">Form Styling</option>
								<option value="#">Calendar</option>
								<option value="#">Users</option>
								<option value="#">Messages</option>
							</select>
						</div>
					</div>					
				</div>
				<!-- END GRID_3 -->				
				<!-- SEARCH BLOCK -->
				<!--div id="search" class="grid_1">
					<form action="dashboard.php">
						<input type="text" class="search" value="Search..." />
						<input type="submit" class="go" />
					</form>
				</div-->
				<!-- END GRID_1 -->
				
			</div>
			<!-- END NAV WRAP -->
			
		</div>
<!-- END MAIN NAVIGATION -->		
	</div>
	<!-- END HEADER -->	
</div>

<!-- BEGIN SUBNAVIGATION -->
<div class="container_4 no-space">
	<div id="subpages" class="clearfix">
		<div class="grid_4">
			<div class="subpage-wrap">
				<ul>
					<li><a href="index.php">Manage Facebook Apps</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- END SUBNAVIGATION -->

<!-- BEGIN PAGE BREADCRUMBS/TITLE -->
<div class="container_4 no-space">
	<div id="page-heading" class="clearfix">
		
		<div class="grid_2 title-crumbs">
			<div class="page-wrap">
				<a href="<?=$parenturl?>/index.php/user/dashboard/">Home</a> / 				
				<a href="index.php">App(s)</a> <br />								
				<h2>Manage Facebook Apps</h2>
				
			</div>
		</div>
	</div>
</div>
<div align="center" id="alerts">
<?php
$inf_msg = $this->session->userdata('INF_MSG');
$err_msg = $this->session->userdata('ERR_MSG');
if(!empty($inf_msg)){?>
<div align="left" style="background:url(<?=base_url();?>images/infmsg.png) repeat;width:887px;height:60px ">
	<div style="color:#54a306;vertical-align:middle;margin:0 0 0 21px;padding-top:18px; float:left"><img src="<?=base_url();?>images/infmsgtick.png" />
            <strong>
            <?php 
            echo $inf_msg; 
            $this->session->unset_userdata('INF_MSG');
            ?>
            </strong>
        </div>
        <div style=" float:right; margin-right: 11px; margin-top: 17px;"><a href="#" onclick="document.getElementById('alerts').style.display='none';">
            <img src="<?=base_url();?>images/infcross_err.png" /></a>
        </div>
	</span>
</div>
<?php }else if(!empty($err_msg)){?>
<div align="left" style="background:url(<?=base_url();?>images/errmsg.png) repeat;;width:887px;height:60px">
	<div style="color:#e83d0e;vertical-align:middle;margin:0 0 0 21px;padding-top:18px; float:left"><img src="<?=base_url();?>images/errmsgtick.png" />  
            <strong>
            <?php 
            echo $err_msg;
            $this->session->unset_userdata('ERR_MSG');
            ?>
            </strong>
        </div>
		<div style=" float:right; margin-right: 11px; margin-top: 17px;"><a href="#" onclick="document.getElementById('alerts').style.display='none';">
		<img src="<?=base_url();?>images/errcross_err.png" /></a>
		</div>
	</span>
</div>
<?php }?>
</div>
<div class="container_4" style="padding-top:20px;">
	<div class="panel" style="background-color:#FFFFFF;width:1300px;">
		<h2 class="cap">Manage App(s)</h2>		
		<div class="content">