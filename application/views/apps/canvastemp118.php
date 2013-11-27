<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
	<meta charset="utf-8">
	<title></title>
<link href='//fonts.googleapis.com/css?family=Oswald|Open+Sans:800|PT+Sans:700' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="https://apps2.cuecow.com/assets/js/jquery.masonry.min.js"></script>
<?php $this->load->view('styles/style118_can');?>
</head>
<body>
<div id='navheader' class='clearfix'>
	<a target='_blank' href="http://youtube.com/<?=$Channel_title;?>">
		<img class='userthumb' src="<?=$Channel_thumbnail;?>" title="<?=$Channel_title;?>" alt="<?=$Channel_title;?>">
	</a>
	<div class='username'><?=$channel_videos[0]['Video_Auther'];?> </div>
	<div class='subscribe'><a title='Subsribe to <?=$Channel_title;?>' target="_blank" href="//www.youtube.com/subscription_center?add_user=<?=$Channel_title;?>&feature=creators_cornier-//s.ytimg.com/yt/img/creators_corner/Subscribe_to_my_videos/YT_Subscribe_130x36_red.png"><img src="//s.ytimg.com/yt/img/creators_corner/Subscribe_to_my_videos/YT_Subscribe_130x36_red.png" alt="Subscribe to me on YouTube"/></a><img src="//www.youtube-nocookie.com/gen_204?feature=creators_cornier-//s.ytimg.com/yt/img/creators_corner/Subscribe_to_my_videos/YT_Subscribe_130x36_red.png" style="display: none"/></a></div>
	<div class="header-stats">
		<div class="stat-entry">
			<span class="stat-value"><?=$Channel_subscriberCount;?></span>
			<span class="stat-name">subscribers</span>
		</div>
		<!--<div class="stat-entry">
			<span class="stat-value">0</span>
			<span class="stat-name">video views</span>
		</div>-->
	</div>
</div>
<div id='branded-page-header'>

<script type='text/javascript'>
$(document).ready(function () {
	$(".videothumb").hover(
	function () {
		$(this).children('.actions,.actionsbg').show();
	},
	function () {
		$(this).children('.actions,.actionsbg').hide();
	});
});
</script>
<div id='current-video'>
	<iframe id="ytplayer" type="text/html" width="770" height="433" src="https://www.youtube.com/embed/<?=$channel_videos[0]['Video_id'];?>?version=3&showinfo=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>
	<div id='current-info'>
		<div id='current-title'><a title='<?=$channel_videos[0]['Video_title'];?>' target='_blank' href='http://www.youtube.com/watch?v=<?=$channel_videos[0]['Video_id'];?>&feature=youtube_gdata_player'><?=$channel_videos[0]['Video_title'];?></a></div>
		<div id='current-views'><?=$channel_videos[0]['Video_viewCount'];?> <span style='font-size: 11px;'>views</span></div>
		<div id='current-date'><?=$channel_videos[0]['Video_uploaded'];?></div>
		<div id='current-author'>by <a target='_blank' href='http://www.youtube.com/<?=$channel_videos[0]['Video_Auther'];?>'><?=$channel_videos[0]['Video_Auther'];?></a></div>
	</div>
</div>

<script type='text/javascript'>
$(document).ready(function () {
	$('.videothumb').click(function () {
		var video = $(this).parent();
		$('#ytplayer').attr('src', "https://www.youtube.com/embed/"+video.attr('id')+"?version=3&showinfo=0&wmode=transparent&rel=0&autoplay=1");
		
		$('#current-title').html(video.children('.videotitle').html());
		$('#current-views').html(video.children('.videoviews').html());
		$('#current-date').html(video.children('.videodate').html());
		$('#current-author').html(video.children('.videoauthor').html());
		

		FB.Canvas.getPageInfo(function(pageInfo){
			$({y: pageInfo.scrollTop}).animate(
				{y: 0},
				{duration: 1000, step: function(offset){
						FB.Canvas.scrollTo(0, offset);
					}
				}
			);
		});
	});
	
	$('.hover_play').hide();
	$('.videothumb').hover(function() {$(this).children('a').children('.hover_play').show();},function () {$(this).children('a').children('.hover_play').hide();});
});
</script>
<ul class='videos'>
<?php for($k=0;$k<count($channel_videos);$k++) {?>

<li class='video' id='<?=$channel_videos[$k]['Video_id'];?>'>
	<div class='videothumb'>
		<div class="actionsbg transparent"></div>
		<div class="actions">
			<div style='display: inline-block; width: 130px; float:left;' class="fb-like" data-href="https://youtube.com/watch?v=<?=$channel_videos[$k]['Video_id'];?>" data-send="true"  data-layout="button_count" data-width="130" data-show-faces="false"></div>
		</div>
		<a title='<?=$channel_videos[$k]['Video_title'];?>' href='#'>
			<img class='hover_play' src='https://apps2.cuecow.com/assets/images/youtube_play.png' />
			<img class='videopreview' src='<?=$channel_videos[$k]['Video_thumbnail'];?>'/>
			<span class='videoduration'><?=$channel_videos[$k]['Video_Duration'];?></span>
		</a>
	</div>
	<div class='videotitle'><a title='<?=$channel_videos[$k]['Video_title'];?>' target='_blank' href='https://youtube.com/watch?v=<?=$channel_videos[$k]['Video_id'];?>'><?=$channel_videos[$k]['Video_title'];?></a></div>
	<span class='videoviews'><?=$channel_videos[$k]['Video_viewCount'];?> <span style='font-size: 11px;'>views</span></span>
	<span class='videodate'><?=$channel_videos[$k]['Video_uploaded'];?></span>
	<span  class='videoauthor'>by <a target='_blank' href='http://www.youtube.com/<?=$channel_videos[$k]['Video_Auther'];?>'><?=$channel_videos[$k]['Video_Auther'];?></a></span>
</li>
<?php } ?>
</ul>
</div>



 

<div id="fb-root"></div>
<script type="text/javascript">
	window.fbAsyncInit = function() {
		FB.init({
		  appId  : '349313058487732',
		  status : true,
		  cookie : true,
		  xfbml  : true,
		  channelUrl: document.location.protocol + '//iframehost.com/channel_https.html'
		}); 
		FB.Canvas.setAutoGrow();
		FB.Canvas.scrollTo(0,0);
		if (typeof window.onFacebookLoad == 'function')
			onFacebookLoad();
	};

	(function() {
		var e = document.createElement('script');
		e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
		e.async = true;
		document.getElementById('fb-root').appendChild(e);
	}());
</script>
</body>
</html>