
<style>
 @charset"utf-8";
/* CSS Document */
body {
	margin:0px;
	padding:0px;
	
}



.clear {
	clear:both;
}

.desgin-app {
}

.desgin-app-main-wrapper {
	width:810px;
	margin:0px auto;
}

.desgin-app-main-wrapper p, h1, h2, h3, h4, ul, li {
	margin:0px;
	padding:0px;
}

.desgin-app-main-wrapper a {
	text-decoration:none;
	outline:none;
	border:none;
}

.desgin-app-main-wrapper a:focus {
	text-decoration:none;
	outline:none;
	border:none;
}

.desgin-app-main-wrapper ul {
	list-style:none;
}

.desgin-app-top-slice {
    /*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_01.png) no-repeat;*/
    background-color:<?=$tempbgclr[0]['temp_bgcolor'];?>;
	width:797px;
	height:28px;
}

.desgin-app-bottom-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_05.png) no-repeat;*/
        background-color:<?=$tempbgclr[0]['temp_bgcolor'];?>;
	width:797px;
	height:28px;
}

.desgin-app-data-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_03.png) repeat-y;*/
        background-color:<?=$tempbgclr[0]['temp_bgcolor'];?>;
	width:797px;
}

.desgin-app-data-container {
	width:760px;
	margin:0px auto;
	padding:0;
	position:relative;
	display:block;
}

.desgin-app-left-col {
	float:left;
}

.desgin-app-right-col {
	float:left;
	width:370px;
	padding-left:30px;
}

.desgin-app-left-img-cnt {
	width:292px;
	height:179px;	
	background: none repeat scroll 0 0 #00326C;
    border: 7px solid #FFFFFF;
    box-shadow: 0 0 4px 4px #FFFFFF;
	-moz-box-shadow: 0 0 4px 4px #FFFFFF;
	-webkit-box-shadow: 0 0 4px 4px #FFFFFF;
	-ms-box-shadow: 0 0 4px 4px #FFFFFF;
	margin-left:35px;
}

.desgin-app-header-cnt {
	position:absolute;
	top:70px;
}

.desgin-app-right-col h2 {
	color:#fff;
        font-size:20px;
}

.desgin-app-right-col p {
	color:#fff;
	font-size:12px;
	padding:10px 0;
	font-weight:bold;
	line-height:20px;
}

ul.desgin-app-list {
	list-style:square;
	font-size:12px;
	color:#fff;
	padding:0 0 0 20px;
	font-weight:bold;
	line-height:20px;
}

.desgin-app-middle-left {
	float:left;
	width:332px;
	height:365px;
	background:<?=$tempdata[3][0]['value'];?>;
	padding:20px;
}



.desgin-app-middle-left h3 {
	color:#fff;
}

.desgin-app-middle-left p {
	color:#fff;
	font-size:12px;
	padding:10px 0 0 0;
	
}

.desgin-app-middle-container {
	width:760px;
	margin:10px auto;
}

.desgin-app-middle-right {
	float:left;
	width:372px;
	height:365px;
	margin:0 0 0 16px;
	position:relative;
}

p.desgin-app-middle-right-pera-one {
	width:342px;
	padding:15px;
	color:#fff;
	font-weight:bold;
	font-size:11px;
	position:absolute;
	top:0px;
	background:<?=$tempdata[4][0]['value'];?>;
	opacity: 0.8;
}

.desgin-app-middle-right-btm-cnt {
}


.desgin-app-middle-right-btm-cnt h3 {
	color:#000;
	padding:10px 0 0 0;
}

.desgin-app-middle-right-btm-cnt p {
	color:#333;
	font-size:10px;
	font-weight:bold;
	line-height:14px;
	padding:10px 0 0 0;
}

.desgin-app-bottom-container {
	width:720px;
	margin:0px auto;
	background:<?=$tempdata[5][0]['value'];?>;
	padding:20px;
}

.desgin-app-bottom-container p {
	color:#fff;
	font-size:10px;
	float:left;
	width:500px;
	display:block;
}

a.desgin-app-bottom-logo {
	display:block;
	float:right;
}

.desgin-app-top-container {
	width:720px;
	margin:0px auto;
	background:<?=$tempdata[1][0]['value'];?>;
	padding:10px 20px;
}

.desgin-app-top-container h2 {
	color:#fff;
	text-transform:uppercase;
}
</style>