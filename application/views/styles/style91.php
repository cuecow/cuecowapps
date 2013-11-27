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

.page-design {
}

.page-design-main-wrapper {
	width:810px;
	margin:0px auto;
}

.page-design-main-wrapper p, h1, h2, h3, h4, ul, li {
	margin:0px;
	padding:0px;
}

.page-design-main-wrapper a {
	text-decoration:none;
	outline:none;
	border:none;
}

.page-design-main-wrapper a:focus {
	text-decoration:none;
	outline:none;
	border:none;
}

.page-design-main-wrapper ul {
	list-style:none;
}

.page-design-top-slice {
    /*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_01.png) no-repeat;*/
    background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
	height:28px;
}

.page-design-bottom-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_05.png) no-repeat;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
	height:28px;
}

.page-design-data-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_03.png) repeat-y;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
}

.page-design-data-container {
	width:760px;
	margin:0px auto;
	padding:0;
	position:relative;
	display:block;
}

.page-design-header-cnt h2 {
	color:#fff;
	font-size:12px;
}

.page-design-header-cnt p {
	color:#fff;
	font-size:12px;
	padding:10px 0;
	line-height:14px;
	font-size:11px;
}

ul.page-design-list {
	list-style:inherit;
	font-size:10px;
	color:#fff;
	padding:0 0 0 20px;
	line-height:14px;
}



.page-design-header-cnt {
	position:absolute;
	top:0px;
	width:250px;
	right:50px;
	background:<?=$tempdata[2][1]['value'];?>;
	opacity: 0.8;
	padding:30px 20px;
}

}

ul.page-design-list {
	list-style:square;
	font-size:12px;
	color:#fff;
	padding:0 0 0 20px;
	font-weight:bold;
	line-height:20px;
}

.page-design-middle-left {
	float:left;
	width:371px;
	
}

.page-design-left-middle-btm-cnt {
	color:#000;
	padding:20px;
}

.page-design-left-middle-btm-cnt h3 {
	font-size:16px;
}

.page-design-left-middle-btm-cnt p {
	font-size:12px;
	padding:5px 0 0 0;
	line-height:16px;
}

.page-design-photos-cnt {
	background:<?=$tempdata[3][4]['value'];?>;
	padding-left:5px;
	padding-bottom:20px;
}

.page-design-photos-cnt p {
	color:#fff;
	font-size:12px;
	padding:0px 10px;
}

img.page-design-images-thmb {
	display:block;
	float:left;
	padding:5px 5px 5px 0px;
}



.page-design-middle-container {
	width:760px;
	margin:10px auto;
}

.page-design-middle-right {
	float:left;
	width:372px;
	margin:0 0 0 16px;
	position:relative;
}


.page-design-middle-right h3 {
	position:absolute;
	top:20px;
	color:#fff;
	left:15px;
}




.page-design-bottom-container {
	width:720px;
	margin:0px auto;
        background:<?=$tempdata[5][0]['value'];?>;
	padding:20px;
}

.page-design-bottom-container p {
	color:#fff;
	font-size:11px;
	float:left;
	display:block;
        line-height:22px;
}


.page-design-top-container {
	width:720px;
	margin:0px auto;
	background:<?=$tempdata[1][0]['value'];?>;
	padding:10px 20px;
}

.page-design-top-container h2 {
	color:#fff;
	text-transform:uppercase;
	font-size:18px;
	display:block;
	float:left;
}

.page-design-logo-header {
	display:block;
	float:right;
	padding:3px 0 0 0;
}

</style>