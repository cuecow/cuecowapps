
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

.fan-week-app-main-wrapper {
	width:805px;
	margin:0px auto;
	
	padding:10px 0;
}
#fan-week-app-main-wrapper_1
{
    padding: 1em 0.4em !important;
}
.fan-week-app {
}

.fan-week-app-top-conent {
	width:785px;
	padding:20px 10px;
	margin:20px auto;
        background-color:<?=$tempdata[0][6]['value'];?>;
	box-shadow: 0px 0px 3px 1px #999;
	-moz-box-shadow: 0px 0px 3px 1px #999;
	-webkit-box-shadow: 0px 0px 3px 1px #999;
	-o-box-shadow: 0px 0px 3px 1px #999;
}
.fan-week-app-top-left {
	float:left;
}
.fan-week-app-top-right {
	float:right;
	width:235px;
	font-size:12px;
	color:#444;
}

a.blue-btn {
	background:#3b5998;
	font-size:14px;
	font-weight:bold;
	padding:5px 10px;
	text-decoration:none;
	color:#fff;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	-o-border-radius:3px;
	margin:10px auto;
	display:block;
	text-align:center;
}

.choose-me-btn {
	width:160px;
	margin:0px 0 0 0;
}
a.blue-btn:hover {
	opacity: 0.8;
	-webkit-transition: all 500ms ease-in;
	-moz-transition: all 500ms ease-in;
}

.fan-week-app-top-left-image-content {
	width:530px;
	height:355px;
	padding:5px;
	border:1px solid #ccc;
	position:relative;
}

.fan-week-app-top-right-pera-admin {
}

.fan-week-app-top-title {
	padding:7px;
	font-size:12px;
	color:#333;
	background:#eee;
	font-weight:bold;
	border-top:1px solid #ccc;
}

.fan-week-app-top-left-thumbnail-cnt {
	position:absolute;
	bottom:70px;
	margin-left:32%;
}

.fan-week-app-top-left-thumbnail-cnt img {
	border:5px solid #fff;
	box-shadow: 0px 0px 10px 1px #f7ef1e;
	-moz-box-shadow: 0px 0px 10px 1px #f7ef1e;
	-webkit-box-shadow: 0px 0px 10px 1px #f7ef1e;
	-o-box-shadow: 0px 0px 10px 1px #f7ef1e;
}

.show-fan-inner-content {
	width:640px;
	padding:20px;
	margin:0px auto;
        background-color:<?=$tempdata[0][6]['value'];?>;
	box-shadow: 0px 0px 3px 1px #999;
	-moz-box-shadow: 0px 0px 3px 1px #999;
	-webkit-box-shadow: 0px 0px 3px 1px #999;
	-o-box-shadow: 0px 0px 3px 1px #999;
}

.show-fan-inner-top {
	padding:7px;
	font-size:12px;
	color:#333;
	background:#eee;
	font-weight:bold;
	border-top:1px solid #ccc;
}

.show-fan-inner-middle {
	margin:10px 0;
	position:relative;
	
}

.show-fan-inner-middle-thumbnail-cnt {
	position:absolute;
	bottom:70px;
	margin-left:32%;
}

.show-fan-inner-middle-thumbnail-cnt img {
	border:5px solid #fff;
	box-shadow: 0px 0px 10px 1px #f7ef1e;
	-moz-box-shadow: 0px 0px 10px 1px #f7ef1e;
	-webkit-box-shadow: 0px 0px 10px 1px #f7ef1e;
	-o-box-shadow: 0px 0px 10px 1px #f7ef1e;
}

.pick-fan-form {
	width:640px;
	padding:20px;
	margin:20px auto;
	box-shadow: 0px 0px 3px 1px #999;
	-moz-box-shadow: 0px 0px 3px 1px #999;
	-webkit-box-shadow: 0px 0px 3px 1px #999;
	-o-box-shadow: 0px 0px 3px 1px #999;
}

.pick-fan-form-fields {
	font-size: 14px;
	line-height:21px;
}

.pick-fan-form-fields select {
	width:120px;
	padding:3px 5px;
}
.choose-me-content {
	width:670px;
        background:#ffffff;
	padding:20px;
	margin:20px auto;
	box-shadow: 0px 0px 3px 1px #999;
	-moz-box-shadow: 0px 0px 3px 1px #999;
	-webkit-box-shadow: 0px 0px 3px 1px #999;
	-o-box-shadow: 0px 0px 3px 1px #999;
	position:relative;
}

.choose-me-cross {
	font-size:12px;
	color:#4c629f;
	font-weight:bold;
	float:right;
}

.choose-me-content h2 {
	font-size:14px;
}

.choose-me-content textarea {
	width:610px;
	padding:5px 10px;
	height:60px;
	resize:none;
	margin:10px 0;
	
	font-size:12px;
	color:#666;
}

.choose-me-content input[type="submit"] {
	background:#3b5998;
	font-size:14px;
	font-weight:bold;
	padding:5px 30px;
	text-decoration:none;
	color:#fff;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	-o-border-radius:3px;
	display:block;
	text-align:center;
	border:1px solid #273662;
	cursor:pointer;
}

.choose-me-content input[type="submit"]:hover {
	opacity: 0.8;
	-moz-transition: all 500ms ease-out;
	-webkit-transition: all 500ms ease-out;
}


.vote-friend-content {
	width:660px;
	padding:20px;
	margin:200px auto 0 auto;
	box-shadow: 0px 0px 3px 1px #999;
	-moz-box-shadow: 0px 0px 3px 1px #999;
	-webkit-box-shadow: 0px 0px 3px 1px #999;
	-o-box-shadow: 0px 0px 3px 1px #999;
	background:#fff;
	top:30%;
	left:18%;
        
}

.vote-friend-content h3 {
	font-size:12px;
}

.vote-friend-content p {
	font-size:12px;
	padding:10px 0;
}

.vote-friend-content input[type="submit"] {
	background:#3b5998;
	font-size:14px;
	font-weight:bold;
	padding:5px 30px;
	text-decoration:none;
	color:#fff;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	-o-border-radius:3px;
	display:block;
	text-align:center;
	border:1px solid #273662;
	cursor:pointer;
}

.vote-friend-content input[type="submit"]:hover {
	opacity: 0.8;
	-moz-transition: all 500ms ease-out;
	-webkit-transition: all 500ms ease-out;
}

.vote-friend-content-outer {
	background:url(<?=  base_url();?>images/images/bg-01.png) repeat;
	width:100%;
	min-height:100%;
	height:100%;
	position:absolute;
	top:0;
	display:block;
}
.candidate-content-left img {
	width:53px;
	height:53px;
	display:block;
	border:1px solid #eee;
}

.candidate-content-left {
	float:left;
	
}

.candidate-content-middle {
	float:left;
	padding:5px;
}

.candidate-content-right {
	float:right;
        padding:5px 23px 0 0;
}

.candidate-content-mian {
	font-size:11px;
	color:#333;
        margin-top:5px;
}

.candidate-content-mian a {
	color:#4e64a0;
        font-size:10px;
}

.dandidate-btn {
	width:200px;
	margin:0px;
}

.clear-list-btn {
    padding:0;
    color:#4E64A0;
    margin:5px 0;
    clear:both;
    display:block;
    font-weight:bold;
}
</style>
