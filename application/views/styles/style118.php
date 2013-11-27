<style>
 
@charset "utf-8";
/* CSS Document */

body {
	margin:0px;
	padding:0px;
}

p, h1, h2, h3, h4, ul, li {
	margin:0px;
	padding:0px;
}

a {
	text-decoration:none;
	outline:none;
	border:none;
}

a:focus {
	text-decoration:none;
	outline:none;
	border:none;
}

ul {
	list-style:none;
}

.clear {
	clear:both;
}

.main-wrapper {
	width:810px;
	margin:30px auto 0px;
        height:575px;
        background:url(<?= base_url();?>images/810Xauto/<?=$tempdata[0][0]['value'];?>);
		padding-top:235px;
}

.youtube-frame {
	background:url(<?= base_url();?>images/images/YouTubeAdv.png);
	width:595px;
	height:235px;
	margin:0px auto;
	padding-top:120px;
}
.text-field {
	display:block;
	background:#fff;
	border:1px solid #999;
	color:#666;
	padding:5px 10px;
	width:96%;
}



.youtube-discription {
	margin-left: 123px;
	margin-top:-15px;
}

.youtube-fields {
	width:350px;
	margin: 0px auto;
	padding-top:11px;
}

.sve_btn
{
float:right;
 
}

.iframe_youtube
{
   margin-left: 11%;
   margin-top: -40px;
}
</style>