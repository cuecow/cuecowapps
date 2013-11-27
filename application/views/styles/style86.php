
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

.design-entertain {
}

.design-entertain-main-wrapper {
	width:810px;
	margin:0px auto;
}

.design-entertain-main-wrapper p, h1, h2, h3, h4, ul, li {
	margin:0px;
	padding:0px;
}

.design-entertain-main-wrapper a {
	text-decoration:none;
	outline:none;
	border:none;
}

.design-entertain-main-wrapper a:focus {
	text-decoration:none;
	outline:none;
	border:none;
}

.design-entertain-main-wrapper ul {
	list-style:none;
}

.design-entertain-top-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_01.png) no-repeat;*/
        background-color:<?=$tempbgclr[0]['temp_bgcolor'];?>;
	width:797px;
	height:28px;
}

.design-entertain-bottom-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_05.png) no-repeat;*/
        background-color:<?=$tempbgclr[0]['temp_bgcolor'];?>;
	width:797px;
	height:28px;
}

.design-entertain-data-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_03.png) repeat-y;*/
        background-color:<?=$tempbgclr[0]['temp_bgcolor'];?>;
	width:797px;
}

.design-entertain-data-container {
	width:760px;
	margin:0px auto;
	padding:0;
	position:relative;
	display:block;
}



.design-entertain-header-cnt {
	position:absolute;
	top:30px;
}

.design-entertain-header-cnt h1 {
	text-align:center;
	color:#fff;
	font-weight:bold;
	display:block;
	width:760px;
        font-size:40px;
}

.design-entertain-header-cnt p {
	color:#fff;
	font-weight:bold;
	display:block;
	width:760px;
	position:absolute;
	top:220px;
	font-size:12px;
	font-weight: bold;
	width:300px;
	left:30px;
}

.design-entertain-middle-left {
	float:left;
	width:372px;
	height:313px;
	padding:0px;
}



.design-entertain-middle-left h3 {
	color:#333;
        font-size:18px;
}

.design-entertain-middle-left p {
	color:#333;
	font-size:12px;
	padding:10px 0 0 0;
        line-height:20px;
	
}

.design-entertain-mddl-left-top-cnt {
	background:<?=$tempdata[3][0]['value'];?>;
	width:357px;
	padding:10px;
	
	font-weight:bold;
	color:#fff;
	display:block;
        font-size:20px;
}

.design-entertain-middle-left-img-two {
	display:block;
	margin:0px 0;
}

.design-entertain-middle-container {
	width:760px;
	margin:10px auto;
        background:<?=$tempdata[3][6]['value'];?>;
}

.design-entertain-middle-right {
	float:left;
	width:372px;
	margin:0 0 0 16px;
	position:relative;
}

p.design-entertain-middle-right-pera-one {
	width:342px;
	padding:15px;
	color:#fff;
	font-weight:bold;
	font-size:11px;
	position:absolute;
	top:0px;
	background:#000;
	opacity: 0.8;
}

.design-entertain-middle-right-btm-cnt {
}


.design-entertain-middle-right-btm-cnt h3 {
	color:#000;
	padding:10px 0 0 0;
}

.design-entertain-middle-right-btm-cnt p {
	color:#333;
	font-size:10px;
	font-weight:bold;
	line-height:15px;
	padding:10px 0 0 0;
}

.design-entertain-footer-container {
	width:720px;
	margin:0px auto;
	background:<?=$tempdata[4][0]['value'];?>;
	padding:10px 20px;
}
.design-entertain-bottom-container {
        width:720px;
	margin:0px auto;
	background:<?=$tempdata[2][0]['value'];?>;
	padding:10px 20px;
	font-size:11px;
	font-weight:bold;
	color:#fff;
}

.design-entertain-bottom-container p {
	color:#fff;
	font-size:10px;
	float:left;
	width:500px;
	display:block;
}

a.design-entertain-bottom-logo {
	display:block;
	float:right;
}

.design-entertain-top-container {
	width:720px;
	margin:0px auto;
	background:#000;
	padding:10px 20px;
}

.design-entertain-top-container h2 {
	color:#fff;
	text-transform:uppercase;
}
</style>