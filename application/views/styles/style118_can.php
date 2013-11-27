
<style> 
@charset "utf-8";
/* CSS Document */

body {
	margin:0px;
	padding:0px;
}



.clear {
	clear:both;
}


body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td,img { margin:0; padding:0; }
table { border-collapse:collapse; border-spacing:0; }
fieldset,img { border:0; }
address,caption,cite,code,dfn,em,strong,th,var { font-style:normal; font-weight:normal; }
ol,ul { list-style:none; }
caption,th { text-align:left; }
h1,h2,h3,h4,h5,h6 { font-size:100%; font-weight:normal; }
q:before,q:after { content:''; }
abbr,acronym { border:0; }

body {
 background-color: #f7f5f5;
 margin: 0px;
 padding: 0px;
 width: 810px;
 font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
 font-size: 11px;
 overflow: auto;
 color:#333;
}
a img {border: none; }
#adminbar {
	background-color: #F2F2F2;
	border-bottom: none;
	border-top: solid 1px #E2E2E2;
	padding: 4px 5px 5px;
	font-size: 11px;
	position: relative;
	z-index: 10;
}
#adminbar a {
	cursor: pointer;
	color: #3B5998;
	text-decoration: none;
}

#adminbar a:hover {
	text-decoration: underline;
}
#poweredby {
	width: 770px;
	text-align: right;
	font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
	font-size: 11px;
	margin: 20px;
	color: #9A9A9A;
	float: left;
}

#poweredby a {
	cursor: pointer;
	color: #3B5998;
	text-decoration: none;
}
#poweredby a:hover {
	text-decoration: underline;
}

.clearfix:after {
	content: ".";
	display: block;
	clear: both;
	visibility: hidden;
	line-height: 0;
	height: 0;
}
 
.clearfix {
	display: inline-block;
}
 
html[xmlns] .clearfix {
	display: block;
}
 
* html .clearfix {
	height: 1%;
}

#navheader { width: 777px; height:60px; margin: 0px auto; color: #584D4D; display: block;}

.branded-page #alerts{margin-top:-10px;margin-bottom:10px}.branded-page #content-container{font-size:13px;color:#333}.primary-pane h2{font-size:18px;margin:6px 0}.secondary-pane h2{font-size:14px;margin:8px 0}.primary-pane h2,.secondary-pane h2{padding:0;color:#000;font-weight:normal}#seymour-editor{background-image:url(//s.ytimg.com/yt/img/channels/bg-channel-editor-vfl6tfR3B.png);background-repeat:repeat-x;background-color:#dadada;color:#666;-moz-border-radius-bottomleft:3px;-webkit-border-bottom-left-radius:3px;border-bottom-left-radius:3px;-moz-border-radius-bottomright:3px;-webkit-border-bottom-right-radius:3px;border-bottom-right-radius:3px;-moz-border-radius-topleft:0;-webkit-border-top-left-radius:0;border-top-left-radius:0;-moz-border-radius-topright:0;-webkit-border-top-right-radius:0;border-top-right-radius:0;-moz-box-shadow:0 0 2px rgb(119,119,119);-ms-box-shadow:0 0 2px rgb(119,119,119);-webkit-box-shadow:0 0 2px rgb(119,119,119);box-shadow:0 0 2px rgb(119,119,119)}#branded-page-header-container{overflow:hidden;background:#202020 url(//s.ytimg.com/yt/img/channels/bg-channel-header-vfl6TeHdT.png) repeat-x;margin-top:20px;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;-moz-border-radius-bottomright:0;-webkit-border-bottom-right-radius:0;border-bottom-right-radius:0;-moz-border-radius-bottomleft:0;-webkit-border-bottom-left-radius:0;border-bottom-left-radius:0}#branded-page-header-container.banner-displayed-mode{margin-top:10px}#branded-page-body-container .branded-banner-image{margin-top:10px}#branded-page-header .profile-thumb{float:left}#branded-page-header .profile-thumb:before{content:'';position:absolute;z-index:1;-moz-box-shadow:inset 0 0 2px 2px rgba(0,0,0,0.5);-ms-box-shadow:inset 0 0 2px 2px rgba(0,0,0,0.5);-webkit-box-shadow:inset 0 0 2px 2px rgba(0,0,0,0.5);box-shadow:inset 0 0 2px 2px rgba(0,0,0,0.5)}#branded-page-header .profile-thumb img{-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px}#branded-page-header .playlist-info{margin-top:12px;overflow:hidden;*zoom:1}#branded-page-header h1{font-weight:normal;font-size:24px;display:inline;margin-right:7px;color:#fff}#branded-page-header-container .header-stats .stat-entry{float:left;margin-left:8px;text-align:center;padding:8px 15px;border-bottom:1px solid transparent}#branded-page-header-container .header-stats a.stat-entry{text-decoration:none;outline:none;-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;background-image:-moz-linear-gradient(top,#2f2f2f 0,#242424 100%);background-image:-ms-linear-gradient(top,#2f2f2f 0,#242424 100%);background-image:-o-linear-gradient(top,#2f2f2f 0,#242424 100%);background-image:-webkit-gradient(linear,left top,left bottom,color-stop(0,#2f2f2f),color-stop(100%,#242424));background-image:-webkit-linear-gradient(top,#2f2f2f 0,#242424 100%);background-image:linear-gradient(to bottom,#2f2f2f 0,#242424 100%)}#branded-page-header-container .header-stats a.stat-entry.selected,#branded-page-header-container .header-stats a.stat-entry:hover{background:#222;border-bottom-color:#626262}#branded-page-header-container .header-stats .stat-entry:first-child{margin-left:0}#branded-page-header-container .header-stats .stat-name,#branded-page-header-container .header-stats .stat-value{display:block;color:#999}#branded-page-header-container .header-stats .stat-name{font-size:10px}#branded-page-header-container .header-stats a.stat-entry .stat-name:after{content:'\00203a';margin-left:4px}#branded-page-header-container .header-stats a.stat-entry.selected .stat-name:after{filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=1);-moz-transform:rotate(90deg);-ms-transform:rotate(90deg);-o-transform:rotate(90deg);-webkit-transform:rotate(90deg);transform:rotate(90deg);display:inline-block;*display:inline;*zoom:1}#branded-page-header-container .header-stats .stat-value{font-size:18px}#masthead-container{margin-bottom:0;border-bottom:none}#footer-container{margin-top:0}#branded-page-body-container{position:relative;background-position:center top}.branded-page #content{width:auto;min-width:970px}#branded-page-body,#iframe-wide-body{overflow:hidden;margin:0 auto 50px auto;width:970px;text-align:left}#branded-page-body-container .branded-page-disclaimer{margin-top:-25px;margin-bottom:15px;font-size:10px;text-align:center}#branded-page-body-container .branded-page-disclaimer a{color:#333;font-weight:bold}#branded-page-body .video-thumb{vertical-align:middle;border:none;padding:0}.channel-layout-two-column .header-pane{width:100%}.channel-layout-two-column .tab-content-body,#playlist-pane-container{width:100%;overflow:hidden;padding-bottom:60px;background:url(//s.ytimg.com/yt/img/channels/bg-layout-2col-ltr-vflzXzuyp.png) repeat-y #ccc;min-height:550px;-moz-border-radius-bottomleft:3px;-webkit-border-bottom-left-radius:3px;border-bottom-left-radius:3px;-moz-border-radius-bottomright:3px;-webkit-border-bottom-right-radius:3px;border-bottom-right-radius:3px}.channel-layout-two-column .primary-pane,#playlist-pane-container .primary-pane{position:relative;width:656px;float:left;z-index:0}.channel-layout-two-column .secondary-pane,#playlist-pane-container .secondary-pane{position:relative;width:314px;float:right;z-index:0}.channel-layout-full-width .tab-content-body{width:100%;overflow:hidden;padding-bottom:60px;background-color:#f3f3f3;min-height:550px;-moz-border-radius-bottomleft:3px;-webkit-border-bottom-left-radius:3px;border-bottom-left-radius:3px;-moz-border-radius-bottomright:3px;-webkit-border-bottom-right-radius:3px;border-bottom-right-radius:3px}.channel-layout-full-width .tab-content-body .main-pane{padding:20px 50px;position:relative;z-index:0}.channel-browse{padding:20px 50px}#browse-sort-select{float:right}.channel-browse .feed-item-main .feed-item-content{margin:0}.channel-browse #channels3-no-videos-placeholder{width:auto}.yt-c3-expander .yt-uix-expander-head{float:right;font-size:11px;color:#808080}.yt-c3-expander .yt-uix-expander-head:hover{text-decoration:underline}.yt-c3-expander .yt-uix-expander-head img{margin-bottom:1px;background:no-repeat url(//s.ytimg.com/yt/imgbin/www-watch6-vfljQLt48.png) -7px -41px;width:5px;height:4px}.yt-c3-expander.yt-uix-expander-collapsed .yt-uix-expander-head img{background:no-repeat url(//s.ytimg.com/yt/imgbin/www-watch6-vfljQLt48.png) 0 -41px;width:5px;height:4px}.yt-c3-elastic-helper.yt-c3-elastic-helper-static-block-on-left .yt-c3-elastic-helper-static-block{float:left}.yt-c3-elastic-helper.yt-c3-elastic-helper-static-block-on-right .yt-c3-elastic-helper-static-block{float:right}.yt-c3-elastic-helper-elastic-block-container{overflow:hidden;display:block}.yt-c3-elastic-helper-elastic-block-container .yt-c3-elastic-helper-elastic-block{width:100%}.channel-layout-two-column.channel-tab-feed-content .tab-content-body{padding-bottom:0}.channel-activity-feeds{padding:20px 50px;min-height:600px}.exp-feed2 .channel-activity-feeds{padding:0}.channel-comment-settings li{margin:2px}.channel-activity-feeds h2.channel-section-heading{margin:12px 0;float:left}.channel-section-hr{clear:both}.feed-unavailable-message{margin:70px 0;color:#999;font-size:16px;text-align:center}.activity-feeds-header{padding-bottom:10px}.exp-feed2 .activity-feeds-header{padding:30px}.activity-feeds-header .user-feed-filter{margin-top:6px;float:left}.exp-feed2 .activity-feeds-header .user-feed-filter{margin-top:0}.user-feed-filter a{color:#666}.user-feed-filter.selected a{color:#eee}.channel-activity-feeds .feed-item-container{margin:0;padding-bottom:10px;border-bottom:1px solid #ccc}.exp-feed2 .channel-activity-feeds .feed-item-container{margin-top:-1px;border:none;padding-bottom:0}.exp-feed2 .channel-activity-feeds .feed-item-main{border-bottom:1px solid #ccc}.exp-feed2 .channel-activity-feeds .feed-item-container{border-top:1px solid transparent;border-bottom:1px solid transparent}.exp-feed2 .channel-activity-feeds .feed-item-container:hover{border-top-color:#ccc;border-bottom-color:#ccc}.exp-feed2 .channel-activity-feeds .feed-item-container.last{-moz-border-radius-bottomleft:3px;-webkit-border-bottom-left-radius:3px;border-bottom-left-radius:3px}.channel-activity-feeds .feed-item-outer{padding:15px 0 5px}.channel-activity-feeds .feed-item-children{margin:0 10px;background:transparent;border-top:0}.channel-activity-feeds .feed-item-child{border-top:0;border-bottom:0}.channel-activity-feeds .feed-item-container.feed-v1{margin-bottom:10px;border-bottom:1px solid #ccc}.channel-activity-feeds .feed-v1 .feed-item-visual{position:relative;overflow:hidden;background:none;padding:10px 0 0 0}.channel-activity-feeds .feed-v1 .feed-item-sub-items .feed-item-visual{background:none}.channel-activity-feeds .feed-v1 .feed-item .feed-item-visual h4{width:360px;overflow:hidden;font-size:14px;line-height:17px;max-height:84px}.channel-activity-feeds .feed-v1 .feed-item .feed-item-title{background:none}.channel-activity-feeds .feed-v1 .feed-item .feed-item-description{background:none;border:none}.channel-activity-feeds .feed-v1 .feed-item .feed-item-show-aggregate{background:none}.channel-activity-feeds .load-more-button{width:100%;margin-top:10px}.exp-feed2 .channel-activity-feeds .load-more-button,.exp-feed2 .channel-activity-feeds .yt-uix-c3-load-more-btn{width:90%;display:block;margin:10px auto}.post-item-list{padding-top:8px}.exp-feed2 .post-item-list{margin:0 30px}.post-item{overflow:hidden;margin-bottom:15px}.post-item .post-item-heading{padding-bottom:10px}.post-item .post-item-info a{color:#0053a6}.post-item .post-item-info a.channel-name{color:#777}.post-item .comment-text{margin:20px;font-size:12px;color:#666;line-height:16px}.post-item .post-item-heading{overflow:hidden;position:relative}.post-item .post-item-heading .heading-main{float:left;width:600px}.post-item .post-item-heading .video-thumb{vertical-align:middle}.channel-activity-feeds .post-item .post-item-actions{display:none;position:absolute;right:0;top:0}.channel-activity-feeds .post-item:hover .post-item-actions{display:block}.channel-activity-feeds .post-item .post-item-actions button{margin:3px 5px 0 0;width:16px;height:16px;overflow:hidden;text-indent:-999px;cursor:pointer}.channel-activity-feeds .post-item .post-item-actions .remove-comment{background:url(//s.ytimg.com/yt/img/watch6-icon-close-vflZt2x4c.png) no-repeat 3px center}.channel-activity-feeds .post-item .post-item-actions .report-spam{background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAMCAQAAAD1lzQWAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAADlJREFUCNdj3PKfAQq8GUEk40a4AASw/GYgJPALXeAnQyojhDn7P1QABiASTOhamH6iC2Co+E1IAABfjw/7dosQgAAAAABJRU5ErkJggg==");background-repeat:no-repeat;background-position:5px 3px}.post-item .comment-pending-approval{overflow:hidden;background-color:#f9eb9d;padding:8px}.post-item .comment-pending-approval label{float:left;margin:8px 0 0 8px;cursor:auto}.post-item .comment-pending-approval .approve-comment{float:right}.add-comment-form{margin-top:8px}.exp-feed2 .add-comment-form{margin-left:30px;margin-right:30px}.add-comment-form.loading .loading-indication-container{float:right;width:40px;min-height:40px;overflow:auto;background:url(//s.ytimg.com/yt/img/loader-vflff1Mjj.gif) no-repeat 0 3px}.add-comment-form textarea{width:535px;margin-bottom:5px}.exp-feed2 .add-comment-form textarea{width:575px}.add-comment-form .post-comment{padding:8px 12px;height:auto;float:right;font-size:11px;font-weight:bold}.add-comment-form.loading .post-comment{display:none}.add-comment-form .comment-post-result-message{font-size:11px}.channel-filtered-page{overflow:hidden;padding-top:20px}.channel-filtered-page .channel-filtered-page-head{position:relative;margin-left:200px;width:740px;z-index:0}.channel-filtered-page .channel-filtered-page-head .item-count{color:#666}.channel-filtered-page .channel-filtered-page-head .video-sort-btn{position:absolute;top:0;right:0}.channel-filtered-page .left-pane{float:left;width:200px}.channel-filtered-page .left-pane .legal-info,.channel-filtered-page .left-pane .primary-filter-menu{width:160px;margin:0 auto}.channel-filtered-page .legal-info .legal-text{height:600px}.channel-filtered-page .primary-filter-menu .filter-option{text-decoration:none;color:#666;display:inline-block;*display:inline;*zoom:1;-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;padding:6px 10px;margin-bottom:10px}.channel-filtered-page .primary-filter-menu .selected-filter.filter-option{font-weight:bold;color:#fff;background:#666}.channel-filtered-page .channel-filtered-content{width:740px;float:left;margin-top:40px}.channel-filtered-page .channel-filtered-content .yt-uix-pager{margin:30px 0 2px 0}.channel-filtered-page .channel-videos-list{width:770px;overflow:hidden}.yt-c3-grid-item{float:left;width:234px;height:180px;margin:0 20px 25px 0;font-size:11px}.yt-c3-grid-item-thumb{display:block}.yt-c3-grid-item-title a{display:block;color:#333;font-weight:bold;overflow:hidden;white-space:nowrap;word-wrap:normal;*zoom:1;-o-text-overflow:ellipsis;text-overflow:ellipsis}.yt-c3-grid-item-username a:hover,.yt-c3-grid-item-title a:hover{color:#1c62b9}.yt-c3-grid-item-username a,.yt-c3-grid-item-viewcount{color:#666}.yt-c3-grid-item-username,.yt-c3-grid-item-created{color:#999}.yt-c3-grid-item-username{display:block}.channel-filtered-page .playlists-wide .playlist-metadata{width:354px}.live-event-filtered-content .event-item{float:left;margin:10px 3px}.live-event-filtered-content .event-item.active{min-height:168px}.live-event-filtered-content .event-item.upcoming{min-height:204px}.live-event-filtered-content .event-item.previous{min-height:182px}.live-event-filtered-content .event-section{margin-bottom:45px;overflow:auto}.live-event-filtered-content .event-type-heading{clear:left}.live-event-filtered-content .event-title{font-size:13px;margin-top:5px}.live-event-filtered-content .event-description{margin-bottom:4px}.live-event-filtered-content .event-title,.live-event-filtered-content .event-description,.live-event-filtered-content .event-metadata{width:224px}.live-event-filtered-content .event-title,.live-event-filtered-content .event-description{overflow:hidden;white-space:nowrap;word-wrap:normal;*zoom:1;-o-text-overflow:ellipsis;text-overflow:ellipsis}.live-event-filtered-content .event-description,.live-event-filtered-content .event-start-time,.live-event-filtered-content .event-end-time,.live-event-filtered-content .event-metadata{font-size:11px}.channel-filtered-page .no-videos-message{margin:30px 0 10px 0;text-align:center;color:#999;font-size:16px}.channel-page-no-videos-message{margin-top:70px;font-size:16px;text-align:center}#channels3-no-videos-placeholder{width:750px;margin:50px auto auto;position:relative;z-index:1}#no-videos-owner-info{border-bottom:1px solid #ccc;padding-bottom:4px;color:#999}#no-videos-add-links{padding-top:15px}#no-videos-add-links li{margin-bottom:8px}.branded-page.channel.preview #branded-page-header-container{margin-top:0}#channel-header{min-height:101px}#channel-header-main{overflow:hidden}#channel-header-main .profile-thumb{position:relative;margin:0 15px 0 0;width:55px;height:55px;overflow:hidden}#channel-header-main .profile-thumb .centering-wrap{display:inline-block;position:absolute;left:-100px;width:255px;text-align:center}#channel-header-main .profile-thumb img{height:55px}#branded-page-header .profile-thumb:before{width:55px;height:55px}#channel-header-main .upper-section{padding:10px 25px 10px 8px}#channel-header-main .upper-left-section{float:left;padding:14px 0;line-height:24px}#channel-header-main .upper-left-section .yt-subscription-button{margin-left:15px;vertical-align:bottom}#channel-header-main .upper-left-section .yt-radio-button{height:25px;line-height:25px;margin-left:15px;vertical-align:bottom}#channel-header-main .upper-left-section.has-secondary-title{padding:6px 0 0 0;display:inline-block;*display:inline;*zoom:1}#channel-header-main .upper-left-section .secondary-title{color:white;font-size:13px}#channel-header-main .upper-right-section{float:right}#channel-search{padding:5px 10px;float:right}#channel-search .search-field{height:15px;font-size:12px;background:#333;outline:none;width:260px;border:0;border-bottom:1px solid #626262;padding:4px 0 4px 10px;outline:none;color:#fff;float:left;-moz-box-shadow:inset 0px 2px 3px #151515;-ms-box-shadow:inset 0px 2px 3px #151515;-webkit-box-shadow:inset 0px 2px 3px #151515;box-shadow:inset 0px 2px 3px #151515;-moz-border-radius:3px 0 0 3px;-webkit-border-radius:3px 0 0 3px;border-radius:3px 0 0 3px}#channel-search .search-field:focus{background:#222;border-bottom:1px solid #222}#channel-search .search-btn,#channel-search .search-dismiss-btn{cursor:pointer;width:24px;height:23px;float:left;-moz-box-shadow:0 1px 1px #222;-ms-box-shadow:0 1px 1px #222;-webkit-box-shadow:0 1px 1px #222;box-shadow:0 1px 1px #222;-moz-border-radius:0 5px 5px 0;-webkit-border-radius:0 5px 5px 0;border-radius:0 5px 5px 0;background-image:-moz-linear-gradient(top,#323232 0,#1c1c1c 70%);background-image:-ms-linear-gradient(top,#323232 0,#1c1c1c 70%);background-image:-o-linear-gradient(top,#323232 0,#1c1c1c 70%);background-image:-webkit-gradient(linear,left top,left center,color-stop(0,#323232),color-stop(70%,#1c1c1c));background-image:-webkit-linear-gradient(top,#323232 0,#1c1c1c 70%);background-image:linear-gradient(to center,#323232 0,#1c1c1c 70%);filter:progid:DXImageTransform.Microsoft.Gradient(startColorStr=#323232,endColorStr=#1c1c1c)}#channel-search .search-btn,#channel-search.dismissible .search-dismiss-btn{display:inline-block;*display:inline;*zoom:1}#channel-search.dismissible .search-btn,#channel-search .search-dismiss-btn{display:none}#channel-search .search-btn:hover,#channel-search .search-btn:focus,#channel-search .search-dismiss-btn:hover,#channel-search .search-dismiss-btn:focus{-moz-box-shadow:0 2px 2px #232323;-ms-box-shadow:0 2px 2px #232323;-webkit-box-shadow:0 2px 2px #232323;box-shadow:0 2px 2px #232323}#channel-search .search-btn:active,#channel-search .search-dismiss-btn:active{background-image:-moz-linear-gradient(bottom,#323232 0,#1c1c1c 70%);background-image:-ms-linear-gradient(bottom,#323232 0,#1c1c1c 70%);background-image:-o-linear-gradient(bottom,#323232 0,#1c1c1c 70%);background-image:-webkit-gradient(linear,left bottom,left center,color-stop(0,#323232),color-stop(70%,#1c1c1c));background-image:-webkit-linear-gradient(bottom,#323232 0,#1c1c1c 70%);background-image:linear-gradient(to center,#323232 0,#1c1c1c 70%)}#channel-search .search-btn .search-btn-content,#channel-search .search-dismiss-btn .search-btn-content{text-indent:-999px;display:block;width:14px;height:14px;overflow:hidden;margin:auto;opacity:0.7;background:no-repeat url(//s.ytimg.com/yt/imgbin/www-channels3-vflI04ukt.png) -67px -18px;width:12px;height:12px}#channel-search .search-dismiss-btn .search-btn-content{background:no-repeat url(//s.ytimg.com/yt/imgbin/www-refresh-vflMLqC23.png) -276px -164px;width:22px;height:22px}#channel-search .search-btn:hover .search-btn-content,#channel-search .search-dismiss-btn:hover .search-btn-content{opacity:1}#channel-search input::-webkit-input-placeholder{color:#666}#channel-editor-btn,#branded-page-header-container .valign-shim,#branded-page-header-container .header-stats{display:inline-block;*display:inline;zoom:1;vertical-align:middle}#channel-editor-btn{margin-left:8px}.valign-shim{height:52px}#channel-header-main h1{margin:0;max-width:420px;line-height:1;vertical-align:bottom;overflow:hidden;white-space:nowrap;word-wrap:normal;*zoom:1;-o-text-overflow:ellipsis;text-overflow:ellipsis}#channel-header .subscription-container{vertical-align:middle}.yt-uix-c3-load-more.yt-uix-c3-load-more-no-more .yt-uix-c3-load-more-btn{display:none}.yt-uix-c3-load-more.yt-uix-c3-load-more-loading .yt-uix-c3-load-more-loading-indicator{display:inline-block}.yt-uix-c3-load-more .yt-uix-c3-load-more-loading-indicator{background:url(//s.ytimg.com/yt/img/loader-vflff1Mjj.gif) no-repeat 0 0;width:20px;height:20px;vertical-align:middle;display:none}#page.channel #masthead-subnav{margin-bottom:5px}.inactive textarea{height:2em;background-color:#efefef}.channel-section-heading{margin:0 0 8px 0;padding-top:8px}.channel-section-heading .item-count{color:#666}#channel-banner-image{margin-top:10px;display:block}.channel-notification{margin:20px auto 5px auto}.channel-notification button{color:#fff;font-size:13px;font-weight:bold;text-shadow:inherit;text-decoration:underline;display:inline-block;*display:inline;*zoom:1;overflow:visible;text-align:left;margin-left:2px}.channel-notification button:hover{cursor:pointer}.yt-uix-styleable-checkbox .yt-uix-styleable-checkbox-checkbox{display:none}.yt-c3-elastic-helper-elastic-block-container .yt-uix-form-input-text{margin:0}.channel-horizontal-menu{background:#444;-moz-box-shadow:inset 0 1px 2px rgb(34,34,34);-ms-box-shadow:inset 0 1px 2px rgb(34,34,34);-webkit-box-shadow:inset 0 1px 2px rgb(34,34,34);box-shadow:inset 0 1px 2px rgb(34,34,34);background-image:-moz-linear-gradient(bottom,#323232 0,#4f4f4f 70%);background-image:-ms-linear-gradient(bottom,#323232 0,#4f4f4f 70%);background-image:-o-linear-gradient(bottom,#323232 0,#4f4f4f 70%);background-image:-webkit-gradient(linear,left bottom,left center,color-stop(0,#323232),color-stop(70%,#4f4f4f));background-image:-webkit-linear-gradient(bottom,#323232 0,#4f4f4f 70%);background-image:linear-gradient(to center,#323232 0,#4f4f4f 70%);filter:progid:DXImageTransform.Microsoft.Gradient(startColorStr=#4f4f4f,endColorStr=#323232)}.channel-horizontal-menu li{float:left}.channel-horizontal-menu li a{padding:8px 20px;color:#eaeaea;font-size:14px;cursor:pointer;border:0;outline:none;text-decoration:none; }
#branded-page-header {
	padding: 15px 0px;
	border: 1px solid #ddd;
}
#navheader {
	padding: 10px 25px 10px 8px;
	background-color: #303030;
	/* background-image: -webkit-linear-gradient(top, #666666 0px, #202020 100%); */
	background-image: url('/img/youtube_top.png');
	background-size: 34px 80px;
	background-repeat: repeat-x;
	-webkit-border-top-right-radius: 5px;
	border-top-right-radius: 5px;
	-webkit-border-top-left-radius: 5px;
	border-top-left-radius: 5px;
	vertical-align: middle; 
}
.userthumb { vertical-align: middle; width: 60px; height: 60px; margin-right: 6px; float: left; }
.username { vertical-align: middle; float: left; height: 25px; font-size: 22px; font-weight:bold; color:#f0f0f0; padding: 14px 10px 18px 10px; }
.header-stats { vertical-align: middle; float:right; width: 150px; padding-top:3px; }
.stat-entry {float:right; margin-left:8px; text-align:center; padding:8px 15px; border-bottom:1px solid transparent}
.stat-value { display:block; color:#999; font-size:18px }
.stat-name { display:block; color:#999; font-size:10px }
.subscribe { padding: 10px 10px 18px 10px; width: 150px; float: left; }


body { font-family: arial, sans-serif; }
a { cursor: pointer; }
#branded-page-header {
	padding: 15px 0px;
}
div.videothumb {position: relative;}
.videopreview { cursor: pointer; width: 250px; height: 140px; box-shadow: rgba(0, 0, 0, 0.496094) 0px 1px 3px 0px, white 0px -1px 0px 0px inset;}
.videopreview:hover { box-shadow: rgba(0, 0, 0, .9) 0px 1px 3px 0px, white 0px -1px 0px 0px inset; }
.hover_play { cursor: pointer; display: inline-block; position: absolute; left: 185px; top: -117px; width:50px; height: 50px; }
ul.videos {width: 810px; padding: 0 0 0 13px;}
li.video {width: 250px;vertical-align: top;display: inline-block; padding: 0 13px 0 0; margin: 15px 0 0 0;}
span.videoduration {
	position: absolute;
	right: 4px;
	bottom: 6px;
	border-radius: 3px;
	background-color: #000;
	color: #fff;
	font-weight: bold;
	opacity: 0.75;
	display: inline-block;
	height: 14px;
	padding: 0px 4px;
	margin: 0px;
}
div.videotitle {
	color: #333;
}
div.videotitle:hover a {
	color: #1c62b9 !important;
}
div.videotitle a {
	display: block;
	color: inherit;
	font-size: 12px;
	font-weight: bold;
	overflow: hidden;
	white-space: nowrap;
	word-wrap: normal;
	*zoom: 1;
	text-overflow: ellipsis;
	text-decoration: none;
}
div.videotitle a:hover { text-decoration: underline; }
span.videoviews { color: #666 }
span.videodate { float: right; color: #999 }
span.videoauthor a { color: #333; text-decoration:none; }
span.videoauthor a:hover { color: #1c62b9 !important; text-decoration:underline; }
#current-video {
	margin: 0px auto;
	margin-top: 15px;
	padding: 0px 15px;
	width: 770px;
	height: 500px;
	z-index: -100;
}
#current-info {
	vertical-align: top;
	width: 760px;
	height: 50px;
	padding: 5px;
	box-shadow: #CCC 0px 0.9090908765792847px 1.8181817531585693px 0px;
	border-bottom-right-radius: 3px;
	border-bottom-left-radius: 3px;
}
#current-info:hover {
	background-image: -webkit-linear-gradient(top, white 0px, #F0F0F0 100%);
	box-shadow: rgba(0, 0, 0, 0.496094) 0px 1px 3px 0px, white 0px -1px 0px 0px inset;
}
#ytplayer {
	z-index: -1 !important;
	margin:	0px;
	padding: 0px;
}
#current-title {
	color: #333;
	font-weight: bold;
	font-size: 13px;
	float: left;
}
#current-title a { text-decoration:none; color: #333; }
#current-title a:hover { color: #1c62b9; text-decoration: underline; }
#current-views { color: #999; font-size: 18px; float: right; }
#current-date { color: #999; width:80px; clear: left; float: left; white-space: nowrap; }
#current-author { width:600px; float: left; clear: left; }
#current-author a { color: #333; text-decoration:none; }
#current-author a:hover { color: #1c62b9 !important; text-decoration:underline; }
#actions { float: right; }
.videothumb a {position: relative; }
.videothumb a:hover {text-decoration: none;}

.transparent {
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
  filter: alpha(opacity=50);
  -moz-opacity: 0.5;
  -khtml-opacity: 0.5;
  opacity: 0.5;
}
.videothumb:hover .actions {
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
  filter: alpha(opacity=60);
  -moz-opacity: 0.6;
  -khtml-opacity: 0.6;
  opacity: 0.6;
}
.videothumb:hover .actions:hover {
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=1)";
  filter: alpha(opacity=1);
  -moz-opacity: 1;
  -khtml-opacity: 1;
  opacity: 1;
}
.videothumb .actionsbg {display: none; position: absolute; z-index: 3; top: 0px; right: 1px; left: 1px; width: 250px;  background-color: transparent; height: 28px}
.videothumb .actions {display: none; position: absolute; z-index: 3; top: 0px; right: 1px; left: 1px; width: 240px; margin: 5px;}

.videothumb:hover .actions {display: block;}
.videothumb:hover .actionsbg {display: block;}
</style>