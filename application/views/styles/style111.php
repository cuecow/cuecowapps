
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
	width:790px;
	margin:0px auto;
	padding:0px 10px;
}

img {
	border:none;
	outline:none;
}

.content-main-outer {
	margin-left:-10px;
}

.content-main {
	width:255px;
	float:left;
	height:255px;
	overflow:hidden;
	margin:10px 0px 0px 10px;
	position:relative;
}


.content-main h5 {
    background:#000000;
    color: #FFFFFF;
    font-weight: normal;
    top:-41px;
    padding:5px;
    position: absolute;
    width: 245px;
}

.content-main:hover h5 {
	transition: all 200ms ease-in;
	-moz-transition: all 200ms ease-in;
	-webkit-transition: all 200ms ease-in;
	top:-13px;
}

.content-main:hover h5:hover {
	background:#ffa500;
}

.content-main .caption{
    background:#000000;
    color: #FFFFFF;
    display: block;
    font-size: 11px;
    height: 40px;
    bottom: 0px;
    padding: 5px;
    width: 245px;
    position:relative;
}

.content-main:hover .caption {
	bottom:50px;
	transition: all 200ms ease-in;
	-moz-transition: all 200ms ease-in;
	-webkit-transition: all 200ms ease-in;
	cursor:pointer;
}

.content-two-bottom-left {
	float:left;
	padding:10px 0 0 0;
	width:200px;
}

.content-two-bottom-left a {
	background-color:#ccc;
	color:#333;
	border:1px solid #666;
	padding:3px 10px 3px 14px;
	font-size:12px;
}

.content-two-bottom-left a.thumbnails {
	background-image:url(<?= base_url();?>images/images/sprite.png);
	background-position:4px 2px;
}

.content-two-bottom-middle {
	float:left;
	padding:10px 0 0 0;
	width:400px;
        overflow:hidden;
}

.content-two-bottom-right {
	float:right;
	padding:10px 0 0 0;
	width:70px;
}

.content-two-bottom-left a.comments {
	background-image:url(<?= base_url();?>images/images/message-icon.png);
	background-position:7px 7px;
	background-repeat:no-repeat;
	padding-left:19px;
}

.content-two-bottom-right > a
{
 background:#5B74A8;
 color:#FFFFFF;
 font-size:13px;
 font-weight:bold;
 padding:3px 11px;
}
</style>
