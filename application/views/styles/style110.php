
<style> 
@charset "utf-8";
/* CSS Document */
/*@font-face {
	font-family:MyriadPro-Regular;
	src: url(../fonts/MyriadPro-Regular.otf);
}*/

body {
	margin:0px;
	padding:0px;
	font-family:Arial, Helvetica, sans-serif;
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
}

input[type="submit"], input[type="button"] {
	cursor:pointer;
}

ul {
	list-style:none;
}

.clearfix {
	clear:both;
}

.main-wrapper {
	width:810px;
	height:1200px;
	margin:0px auto;
	background:url(<?=base_url()?>images/810X1200/<?=$tempdata[0][1]['value'];?>) no-repeat;
}

img {
	border:none;
	outline:none;
}

.content-tab-main {
	background:url(<?=base_url()?>images/images/tab-bg.png) repeat;
	padding:10px;
	margin:10px 0 0 0;
}

.content-tab-main:after {
	content:"";
	display:block;
	clear:both;
}

.content-inner-content {
	width:520px;
	margin:0px auto;
	padding:190px 0 0 0;
}

.content-tab-left {
	float:left;
	width:90px;
}

.content-tab-right {
	float:left;
	width:400px;
	padding-left:10px;
}

.content-tab-right h4 {
	font-size:14px;
}

.content-tab-discription {
	font-size:12px;
	color:#666;
	font-weight:bold;
	padding:0px 0;
	display:block;
}

.content-tab-right p {
	font-size:12px;
	padding:5px 0 0 0;
}

.social-links-cnt {
	width:200px;
	float:left;
	margin-top:10px;
}

.content-tab-right .view-photo-btn {
	float:right;
	background:#069;
	color:#fff;
	padding:5px 10px;
	font-size:12px;
	margin-top:10px;
}

.content-tab-right .view-photo-btn:hover {
	background:#06C;
}

.pagination-content {
	margin:10px 0;
}

.pagination-content ul {
	float:right;
}

.pagination-content ul li {
	float:left;
	margin-left:5px;
}

.pagination-content ul li a {
	padding:2px 10px;
	background:url(<?=base_url()?>images/images/tab-bg.png) repeat;
	color:#333;
}

.pagination-content ul li.active a, .pagination-content ul li a:hover {
	background:#069;
	color:#fff;
}

.pagination-content ul li a:hover {
	background:#06C;
	color:#fff;
}
</style>