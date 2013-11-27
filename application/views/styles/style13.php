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
	margin:0px auto;
}



/* =========== signup_app_retail data style ========== */

.signup_app_retail-container {
	width:810px;
	margin:10px auto;
}


.signup_app_retail-data-main {
	width:747px;
	height:495px;
	float:left;
	background:#fff;
}


.signup_app_retail-data-top-middle {
	/*background:url(<?=base_url();?>images/images/signup_app-background_03.png) repeat-x;*/
        background-color:<?=$tempdata[0][1]['value'];?>;
	height:28px;
	float:left;
	width:756px;
}

.signup_app_retail-data-middle-left {
	/*background:url(<?=base_url();?>images/images/signup_app-background_09.jpg) repeat-y;*/
        background-color:<?=$tempdata[0][1]['value'];?>;
	width:27px;
	height:515px;
	float:left;
}



.signup_app_retail-data-middle-right {
	/*background:url(<?=base_url();?>images/images/signup_app-background_10.jpg) repeat-y;*/
        background-color:<?=$tempdata[0][1]['value'];?>;
	width:27px;
	height:515px;
	float:left;
}

.signup_app_retail-data-bottom-middle {
	/*background:url(<?=base_url();?>images/images/signup_app-background_14.jpg) repeat-x;*/
        background-color:<?=$tempdata[0][1]['value'];?>;
	height:22px;
	width:755px;
	float:left;
}


.signup_app_retail-bg-slice-top-left {
	/*background:url(<?=base_url();?>images/images/signup_app-background_01.jpg) no-repeat;*/
        background-color:<?=$tempdata[0][1]['value'];?>;
	width:27px;
	height:28px;
	float:left;
}

.signup_app_retail-bg-slice-top-right {
	/*background:url(<?=base_url();?>images/images/signup_app-background_05.jpg) no-repeat;*/
        background-color:<?=$tempdata[0][1]['value'];?>;
	width:18px;
	height:28px;
	float:left;
}

.signup_app_retail-bg-slice-bottom-left {
	/*background:url(<?=base_url();?>images/images/signup_app-background_13.jpg) 1px 0 no-repeat;*/
        background-color:<?=$tempdata[0][1]['value'];?>;
	width:27px;
	height:22px;
	float:left;
}

.signup_app_retail-bg-slice-bottom-right {
	/*background:url(<?=base_url();?>images/images/signup_app-background_16.jpg) no-repeat;*/
        background-color:<?=$tempdata[0][1]['value'];?>;
	width:19px;
	height:22px;
	float:left;
}


/* ================================================== */

.signup_app_retail-main-content {
	width:100%;
	height:475px;
	background:<?=$tempdata[0][0]['value'];?>;
	padding:20px 0;
}

.signup_app_retail-main-content h1 {
	
        font-size: 34px;
	text-transform:uppercase;
	text-align:center;
	color:#fff;
}

.signup_app_retail-col-container {
	width:670px;
	margin:10px auto;
}

.signup_app_retail-col-one {
	float:left;
	width:320px;
	height:190px;
	background:<?=$tempdata[1][1]['value'];?>;
}



.signup_app_retail-col-one-inner {
	width:300px;
	height:170px;
	background:<?=$tempdata[1][2]['value'];?>;
	margin:0px auto;
	margin-top:10px;
}

.signup_app_retail-col-one-inner p {
	
	color:#fff;
	font-size:12px;
	padding:10px;
        line-height: 16px;
}

.signup_app_retail-col-two {
	float:left;
	width:320px;
	height:190px;
	background:<?=$tempdata[1][5]['value'];?>;
	margin:0 0 0 30px;
}

.signup_app_retail-col-two-inner {
	width:300px;
	height:170px;
	background:<?=$tempdata[1][6]['value'];?>;
	margin:0px auto;
	margin-top:10px;
}
.signup_app_retail-col-three {
	float:left;
	width:320px;
	height:190px;
	background:<?=$tempdata[2][0]['value'];?>;
}

.signup_app_retail-col-three-inner {
	width:300px;
	height:170px;
	background:<?=$tempdata[2][1]['value'];?>;
	margin:0px auto;
	margin-top:10px;
}

.signup_app_retail-col-four {
	float:left;
	width:320px;
	height:190px;
	background:<?=$tempdata[2][5]['value'];?>;
	margin:0 0 0 30px;
}

.signup_app_retail-col-four-inner {
	width:300px;
	height:170px;
	background:<?=$tempdata[2][6]['value'];?>;
	margin:0px auto;
	margin-top:10px;
}

.signup_app_retail-col-four-inner p {
	color: #FFFFFF;
    
    font-size: 11px;
    line-height: 16px;
    padding: 31px 10px 10px;
}


.signup_app_retail-col-three-inner input.text-field {
	display:block;
	background:#fff;
	border:1px solid #999;
	color:#666;
	padding:5px 10px;
	width:250px;
	margin:0px 0px 15px 0;
}

.signup_app_retail-col-three-inner input.submit {
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

.signup_app_retail-col-three-input-container {
	width:272px;
	margin:0px auto;
	padding:30px 0 0 0;
} 
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