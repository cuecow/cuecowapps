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
	margin:0px auto;
}
/* =========== signup_app_entertain data style ========== */
.signup_app_entertain-container {
	width:810px;
	margin:10px auto;
}
.signup_app_entertain-data-main {
	width:747px;
	height:570px;
	float:left;
	background:#fff;
}
.signup_app_entertain-data-top-middle {
	/*background:url(<?=base_url()?>images/images/signup_app_entertain-background_03.png) repeat-x;*/
        background-color:<?=$tempdata[0][5]['value'];?>;
	height:28px;
	float:left;
	width:756px;
}
.signup_app_entertain-data-middle-left {
	/*background:url(<?=base_url()?>images/images/signup_app_entertain-background_09.jpg) repeat-y;*/
	background-color:<?=$tempdata[0][5]['value'];?>;
        width:27px;
	height:570px;
	float:left;
}
.signup_app_entertain-data-middle-right {
	/*background:url(<?=base_url()?>images/images/signup_app_entertain-background_10.jpg) repeat-y;*/
        background-color:<?=$tempdata[0][5]['value'];?>;
	width:27px;
	height:570px;
	float:left;
}
.signup_app_entertain-data-bottom-middle {
	/*background:url(<?=base_url()?>images/images/signup_app_entertain-background_14.jpg) repeat-x;*/
        background-color:<?=$tempdata[0][5]['value'];?>;
	height:21px;
	width:755px;
	float:left;
}
.signup_app_entertain-bg-slice-top-left {
	/*background:url(<?=base_url()?>images/images/signup_app_entertain-background_01.jpg) no-repeat;*/
        background-color:<?=$tempdata[0][5]['value'];?>;
	width:27px;
	height:28px;
	float:left;
}
.signup_app_entertain-bg-slice-top-right {
	/*background:url(<?=base_url()?>images/images/signup_app_entertain-background_05.jpg) no-repeat;*/
        background-color:<?=$tempdata[0][5]['value'];?>;
	width:19px;
	height:28px;
	float:left;
}
.signup_app_entertain-bg-slice-bottom-left {
	/*background:url(<?=base_url()?>images/images/signup_app_entertain-background_13.jpg) 1px 0 no-repeat;*/
        background-color:<?=$tempdata[0][5]['value'];?>;
	width:27px;
	height:22px;
	float:left;
}
.signup_app_entertain-bg-slice-bottom-right {
	/*background:url(<?=base_url();?>images/images/signup_app_entertain-background_16.jpg) no-repeat;*/
        background-color:<?=$tempdata[0][5]['value'];?>;
	width:20px;
	height:21px;
	float:left;
}
/*==================================================*/
.signup_app_entertain-top-content {
	width:100%;
	height:356px;
	background:<?=$tempdata[0][5]['value']?>;
	padding:20px 0;
}
.signup_app_entertain-top-content-inner {
    background:url(<?=base_url()?>images/780X380/<?=$tempdata[0][0]['value'];?>) no-repeat;
    width:713px;
    height:355px;
    margin:0px auto;
}
.signup_app_entertain-top-content-inner-heading {	
	float:right;
	background:url(<?=base_url()?>images/images/signup_app_entertain-heading.png) no-repeat;
	width:400px;
	padding:0 15px;
	margin:100px 0 0 0;
	height:55px;
}

.signup_app_entertain-top-content-inner-heading h1 {
    color: #FB892C;
    
    font-size: 37px;
    opacity: 0.9;
    padding-top: 10px;
    
}

.signup_app_entertain-top-content-inner-discription {
	float:right;
	background:url(<?=base_url()?>images/images/signup_app_entertain-discription.png) no-repeat;
	width:400px;
	padding:7px 15px;
	margin:20px 0 0 0;
	height:135px;
	font-size:13px;
}

.signup_app_entertain-top-content-inner-discription p {
	line-height: 18px;
	color:#fff;
	padding:10px 0 10px 0;
}

.signup_app_entertain-top-content-inner-discription p span.color-grey {
	color:#666;        
}

.signup_app_entertain-bottom-content {
	padding:30px 0 0 0;
}

.signup_app_entertain-bottom-content .left-col {
	float:left;
	padding:0 0 0 20px;
}

.signup_app_entertain-bottom-content .left-col input.text-field {
	display:block;
	background:#fff;
	border:1px solid #999;
	color:#666;
	padding:5px 10px;
	width:284px;
	margin:5px 0;
}

.signup_app_entertain-bottom-content .left-col input.submit {
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

.signup_app_entertain-bottom-content .right-col {
	float:left;
	width:317px;
}

.signup_app_entertain-bottom-content .right-col p {
	font-size: 10px;
	
	font-weight:bold;
	line-height:14px;
	margin:0px;
}

.signup_app_entertain-bottom-separator {
	width:2px;
	height:110px;
	background:#000;
	
	float:left;
	margin:0px 20px 0 70px;
}

.signup_app_entertain-bottom-content .right-col a.facebook-btn {
	background:url(<?=base_url()?>images/images/<?=$tempdata[1][4]['value'];?>) no-repeat;
	width:30px;
	height:30px;
	display:block;
	float:right;
	margin:10px 0 0 0;
	opacity:0.8;
}

.signup_app_entertain-bottom-content .right-col a.facebook-btn:hover {
	opacity:0.9;
}
/************************************************************/
#overlay {
    position: absolute;
    z-index: 10;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: url(<?=base_url()?>images/images/overlay.png);
}
.thankyoudiv
{
    background-color: #FFFFFF;
    border-radius: 10px 10px 10px 10px;
    color: green;
    margin: 30% 16%;
    padding: 20px;
    position: absolute;
    width: 500px;
}   

</style>