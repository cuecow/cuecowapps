
<style>
 @charset "utf-8";
/* CSS Document */

body {
	margin:0px;
	padding:0px;
	font-family:Verdana, Geneva, sans-serif;
}



.clear {
	clear:both;
}

.photo-competition {
}

.photo-competition-main-wrapper {
	width:810px;
	margin:0px auto;
}

.photo-competition-main-wrapper p, h1, h2, h3, h4, ul, li {
	margin:0px;
	padding:0px;
        color:#FFFFFF;
}

.photo-competition-main-wrapper a {
	text-decoration:none;
	outline:none;
	border:none;
}

.photo-competition-main-wrapper a:focus {
	text-decoration:none;
	outline:none;
	border:none;
}

.photo-competition-main-wrapper ul {
	list-style:none;
}

.photo-competition-top-slice {
    background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_01.png) no-repeat;
	width:810px;
	height:28px;
}

.photo-competition-bottom-slice {
	background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_05.png) no-repeat;
	width:810px;
	height:28px;
}

.photo-competition-data-slice {
	background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_03.png) repeat-y;
	width:810px;
}

.photo-competition-data-container {
	width:760px;
	margin:0px auto;
	padding:10px 0 0 0;
	position:relative;
	display:block;
}

.photo-competition {
}

.photo-competition-top-cnt {
	background:<?=$tempdata[1][5]['value'];?>;
	width:100%;
	padding:20px 0;
}
.photo-competition-top-cnt-thankyou {
	background:<?=$tempdata[5][0]['value'];?>;
	width:100%;
	padding:20px 0;
}

.photo-competition-top-cnt h1 {
	font-family:Microsoft Yi Baiti;
	color:#fff;
	text-align:center;
	font-size:39px;
}


.photo-competition-top-cnt-left {
	float:left;
	width:350px;
}

.photo-competition-top-cnt-left img {
	display:block;
	margin:0px auto;
}

.photo-competition-top-cnt-right {
	float:left;
}

.photo-competition-submit {
	border:1px solid #5431B5;
	background:#65D2DB;
	padding:5px 10px;
	color:#eee;
	font-weight:bold;
	margin:10px 0 0 0;
}

.photo-competition-top-cnt-right h4 {
	
	color:#fff;
	font-weight: bold;
	font-family:Arial, Helvetica, sans-serif;
}

.photo-competition-top-cnt-right p {
	color:#fff;
	width:400px;
	font-size:12px;
	line-height:20px;
	margin:10px 0 0 0;
	height:140px;
	overflow:hidden;
}

/*.photo-competition-middle-cnt {
	width:500px;
	height:400px;
	border:1px solid #333;
	margin:0px auto;
        padding-top:5px;
}*/


.photo-competition-bottom-cnt {
	background:<?=$tempdata[2][0]['value'];?>;
	padding:10px 40px;
	margin:10px 0 0 0;
}

ul.photo-competition-menu-list {
	float:left;
}

ul.photo-competition-menu-list li {
	float:left;
	padding-left:20px;
}

ul.photo-competition-menu-list li a {
	color:#fff;
	font-size:14px;
}

.photo-competition-trm-cndtion-text {
	display:block;
	float:right;
	color:#fff;
	font-size:12px;
	padding-right:20px;
	padding-top:3px;
}

.photo-competition-last-pera {
	font-size:10px;
	font-weight:bold;
	font-family:Arial, Helvetica, sans-serif;
	padding:10px 40px;
	text-align:justify;
	padding-top:5px;
        line-height:20px;
}

/*********************************************************/
.gallery-aap-thumnails-details-image {
	float:left;
	padding:5px;
	border:1px solid #ccc;
}

.gallery-aap-thumnails-details-description-list {
	float:left;
	padding:5px 5px;
	width:480px;
	background:#eee;
	margin:0px 5px;
	height:160px;
        line-height:22px;
}

.gallery-aap-thumnails-details-description-list table {
	color:#666;
	font-size:12px;
	margin:0px;
	padding:0px;
}

.gallery-aap-thumnails-details-description-list table td {
	padding:5px;
}

.gallery-aap-thumnails-details-buttons {
	float:right;
	padding:10px 35px 0 0;
}
/* =========================================== */
.photo-competition-middle-cnt {
	width:750px;
	margin:0px auto;
        overflow: scroll;
        height: 296px;
}
.photo-competition-middle-cnt-canvas {
	width:750px;
	margin:0px auto;
        height: 296px;
}
.gallery-app-photo-thumbnail {
	padding:10px;
	border:1px solid #ccc;	
	position:relative;
}
.gallery-app-thumnail-container {
	float:left;
        padding-right: 8px;
}
.gallery-app-vote-content {
	position:absolute;
	top:10px;
	right:10px;
}

/* ***** ***** ***** ***** *****   T H A N K S   D I A L O G   ***** ***** ***** ***** ***** */
#thanksDialog, #thanks2Dialog {
    top: 120px;    
}

#thanksDialog .dialogContent .header, #thanks2Dialog .dialogContent .header {
    margin-bottom: 10px;
    font-size: 16px;
    font-weight: bold;
}
#thanksDialog .dialogContent .header2 {
    margin-bottom: 10px;
}

#thanksDialog .dialogContent .button {
    margin: 0 auto;
}
/************************Thank you*******************************************/
.thankyou-photo-competition-list {
	margin:90px 0 0 -20px;
	padding:0px;
}

.thankyou-photo-competition-list li {
	float:left;
	padding-left:20px;
}

.thankyou-photo-competition-list li a {
	color:#fff;
	font-weight:bold;
	font-size:12px;
}
</style>