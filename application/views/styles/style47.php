
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

form {
margin:0px;
padding:0px;
}

ul {
	list-style:none;
}

.clear {
	clear:both;
}

.main-wrapper {
	width:810px;
	margin:0px auto;
        
}



.Quiz_app_fashion {
}

/* =========== Quiz_app_fashion data style ========== */

.Quiz_app_fashion-container {
	width:810px;
	margin:10px auto;
}


.Quiz_app_fashion-data-main {
	width:756px;
	height:965px;
	float:left;
	background:#fafafa;
}
.Quiz_app_fashion-data-main_convas {
	width:756px;
	height:900px;
	float:left;
	background:#fafafa;
}


.Quiz_app_fashion-data-top-middle {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-background_03.png) repeat-x;
	height:28px;
	float:left;
	width:756px;
}

.Quiz_app_fashion-data-middle-left {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-background_09.jpg) repeat-y;
	width:27px;
	height:965px;
	float:left;
}
.Quiz_app_fashion-data-middle-left_convas {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-background_09.jpg) repeat-y;
	width:27px;
	height:900px;
	float:left;
}



.Quiz_app_fashion-data-middle-right {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-background_10.jpg) repeat-y;
	width:27px;
	height:965px;
	float:left;
}
.Quiz_app_fashion-data-middle-right_convas {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-background_10.jpg) repeat-y;
	width:27px;
	height:900px;
	float:left;
}

.Quiz_app_fashion-data-bottom-middle {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-background_14.jpg) repeat-x;
	height:28px;
	width:755px;
	float:left;
}


.Quiz_app_fashion-bg-slice-top-left {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-background_01.jpg) no-repeat;
	width:27px;
	height:28px;
	float:left;
}

.Quiz_app_fashion-bg-slice-top-right {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-background_05.jpg) no-repeat;
	width:27px;
	height:28px;
	float:left;
}

.Quiz_app_fashion-bg-slice-bottom-left {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-background_13.jpg) 1px 0 no-repeat;
	width:27px;
	height:28px;
	float:left;
}

.Quiz_app_fashion-bg-slice-bottom-right {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-background_16.jpg) no-repeat;
	width:27px;
	height:28px;
	float:left;
}


/* ================================================== */

.Quiz_app_fashion-top-content {
	width:100%;
	height:356px;
	background:#fb892c;
	padding:20px 0;
}

.Quiz_app_fashion-top-content-inner {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-image-one.jpg) no-repeat;
	width:713px;
	height:355px;
	margin:0px auto;
}


.Quiz_app_fashion-banner {
background:<?=$tempdata[1][0]['value'];?>;
height:35px;
padding:24px;
}

.Quiz_app_fashion-share {
display:block;
float:right;
background:url(<?=base_url()?>images/images/Quiz_app_fashion-share.png) no-repeat;
width:58px;
height:18px;
}

.Quiz_app_fashion-logo {
/*background:url(//base_url()images/images/Quiz_app_fashion-LOGO.png) no-repeat;*/
background:url(<?=base_url()?>images/images/<?=$tempdata[1][1]['value'];?>) no-repeat;
width:225px;
height:33px;
display:block;
float:left;
}

.Quiz_app_fashion-top-content-inner-heading {
	color:#fb892c;
	font-family:"Arial Black", Gadget, sans-serif;
	float:right;
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-heading.png) no-repeat;
	width:400px;
	padding:0 15px;
	margin:100px 0 0 0;
	height:55px;
}

.Quiz_app_fashion-top-content-inner-heading h1 {
	opacity:0.9;
}

.Quiz_app_fashion-top-content-inner-discription {
	font-family:Arial, Helvetica, sans-serif;
	float:right;
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-discription.png) no-repeat;
	width:400px;
	padding:7px 15px;
	margin:20px 0 0 0;
	height:135px;
	font-size:13px;
}

.Quiz_app_fashion-top-content-inner-discription p {
	line-height: 18px;
	color:#fff;
	padding:10px 0 10px 0;
}

.Quiz_app_fashion-top-content-inner-discription p span.color-grey {
	color:#666;
}



.Quiz_app_fashion-bottom-content .left-col {
	float:left;
	padding:0 0 0 20px;
}

.Quiz_app_fashion-bottom-content .left-col input.text-field {
	display:block;
	background:#fff;
	border:1px solid #999;
	color:#666;
	padding:5px 10px;
	width:284px;
	margin:5px 0;
}

.Quiz_app_fashion-bottom-content .left-col input.submit {
	display:block;
	background:#312f2f;
	border:1px solid #999;
	color:#fff;
	width:66px;
	height:26px;
	border:1px solid #888;
	padding:0 0 5px 0;
	font-weight:bold;
	float:right;
}

.Quiz_app_fashion-bottom-content .right-col {
	float:left;
	width:317px;
}

.Quiz_app_fashion-bottom-content .right-col p {
	font-size: 10px;
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	line-height:14px;
	margin:0px;
}

.Quiz_app_fashion-bottom-separator {
	width:2px;
	height:110px;
	background:#000;
	
	float:left;
	margin:0px 20px 0 70px;
}

.Quiz_app_fashion-bottom-content .right-col a.facebook-btn {
	background:url(<?=base_url()?>images/images/Quiz_app_fashion-facebook.png) no-repeat;
	width:30px;
	height:30px;
	display:block;
	float:right;
	margin:10px 0 0 0;
	opacity:0.8;
}

.Quiz_app_fashion-bottom-content .right-col a.facebook-btn:hover {
	opacity:0.9;
}


.Quiz_app_fashion-tab-cnt {
	background:<?=$tempdata[2][1]['value'];?>;
        padding:5px;
	margin:10px 0;
}


.Quiz_app_fashion-tab-cnt-left-col {
	float:left;
	padding:0px 20px;
}

.Quiz_app_fashion-tab-cnt-right-col {
	float:left;
	padding:10px 0;
}

.Quiz_app_fashion-tab-cnt-left-col-image-cnt {
	display:block;
	float:left;
	padding:0 0 0 3px;
}


.Quiz_app_fashion-top-cnt {
	color: #333333;
    font-family: Verdana,Geneva,sans-serif;
    font-size: 11px;
    font-weight: bold;
    padding: 15px 14px;
}

.Quiz_app_fashion-tab-cnt-right-col-one {
	display:block;
	float:left;
}

.Quiz_app_fashion-tab-cnt-right-col-one input{
    display: block;
    float: left;
}


.Quiz_app_fashion-tab-cnt-right-col p {
	display:block;
	float:left;
	width:295px;
	color:#eee;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	padding-left:5px;
}

.Quiz_app_fashion-forms-fields-title {
	display:block;
	color:#333;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	font-weight:bold;
	padding:10px 0;	
}

.Quiz_app_fashion-forms-text-field {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #999999;
    color: #666666;
    margin: 5px 0;
    padding: 5px 10px;
    width: 280px;
}

.Quiz_app_fashion-forms-fields-left {
	float:left;
}

.Quiz_app_fashion-forms-fields-right {
	float:left;
	padding:0 0 0 20px;
}


.Quiz_app_fashion-forms-fields-two {
	float:left;
}

.Quiz_app_fashion-form-submit {
	background:#333;
	padding:5px 12px;
        text-align:center;
	color:#fff;
	font-size:14px;
	font-weight:bold;
	width:80px;
	border:none;
	margin:44px 0 0 20px;
	cursor:pointer;
}

.Quiz_app_fashion-bottom-content {
	font-size:12px;
	color:#fff;
	padding: 8px 20px;
        height: 94px;
	background:<?=$tempdata[4][0]['value'];?>;
	font-family:Verdana, Geneva, sans-serif;
	margin:20px 0 0 0;
}

.Quiz_app_fashion-forms-fields {
	width:750px;
	margin:0px auto;
}

/************************************************************/
#overlay {
    position: absolute;
    z-index: 10;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity:0.83;
    background:#FFFFFF;
}
.thankyoudiv
{
    background-color: #FFFFFF;
    border-radius: 10px 10px 10px 10px;
    color: black;
    margin: 30% 16%;
    opacity:0.78;
    padding: 20px;
    position: absolute;
    width: 500px;
}   
h56{
    margin:0px;
    padding:0px;
    font-size:80px;
    line-height:132px;
}


</style>