
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

.quiz-retail {
}

.quiz-retail-main-wrapper {
	width:810px;
	margin:0px auto;
}

.quiz-retail-main-wrapper p, h1, h2, h3, h4, ul, li {
	margin:0px;
	padding:0px;
}

.quiz-retail-main-wrapper a {
	text-decoration:none;
	outline:none;
	border:none;
}

.quiz-retail-main-wrapper a:focus {
	text-decoration:none;
	outline:none;
	border:none;
}

.quiz-retail-main-wrapper ul {
	list-style:none;
}

.quiz-retail-top-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_01.png) no-repeat;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
	height:28px;
}

.quiz-retail-bottom-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_05.png) no-repeat;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
	height:28px;
}

.quiz-retail-data-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_03.png) repeat-y;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
}

.quiz-retail-data-container {
	width:760px;
	margin:0px auto;
	padding:0px 0 0 0;
	position:relative;
	display:block;
}

.quiz-retail-cnt { 
	background:url(<?=  base_url();?>images/images/signup_app_entertain-discription.png) repeat; 
	width:700px;
	margin:20px;
	padding:10px;
	position:absolute;
	top:20px;
}



h1.quiz-retail-heading {
	color:#ff7301;
	
}

p.quiz-retail-dis {
	font-weight:bold;
	color:#fff;
	
	font-size:12px;
	margin:15px 0 0 0;
}

.quiz-retail-middle-cnt {
}


.quiz-retail-middle-cnt{
    
    width: 700px;
	margin:0px auto;
	padding:20px 0 0 0;
}


.quiz-retail-list-radio-btn {
    float: left;
    padding: 5px 0 0 10px;
}


.quiz-retail-list-pera {
    color: #333333;
    float: left;
    font-size: 12px;
    font-weight: bold;
    height: 52px;
    margin: 0;
    padding: 5px 5px 0;
    width: 644px;
	margin-left:15px;
}

.quiz-retail-input-fields {
	width:700px;
	margin:0px auto;
	
}

.quiz-retail-input-fields-left {
	float:left;
}

.quiz-retail-input-fields-right {
	float:left;
	padding:0 0 0 10px;
}


.quiz-retail-input-fields-inpt-title {
    color: #333333;
	padding:5px 0;
	display:block;
	font-size:12px;
}


.quiz-retail-input {
    height: 31px;
    width: 327px;
	display:block;
	margin:15px 0;
	padding:0px 5px;
}

.quiz-retail-bottom-content {
	
	font-size:11px;
        line-height:21px;
	color:#333;
	width:700px;
	margin:0px auto;
	padding:20px 0;
	font-weight:bold;
}




.quiz-retail-submit {
	background:#333;
	padding:5px 20px;
	border:none;
	
	font-weight:bold;
	color:#fff;
	float:right;
}

.quiz-retail-list-heading {
	
	font-size:14px;
	font-weight:bold;
	color:#333;
	padding:0 0 10px 0;
}

/* ========================================== */

.quiz-app-retail-cnt {
	width:700px;
	margin:20px;
	padding:10px;
	position:absolute;
	top:40px;
}

p.quiz-app-retail-heading {
	font-size:18px;
	color:#fff;
	
	font-weight:bold;
}

.quiz-app-retail-cnt-left {
	background:<?=$tempdata[2][0]['value'];?>;
	width:290px;
	height:175px;
	border:7px solid #fff;
	box-shadow: 0px 0px 4px 4px #fff;
	margin:81px 0 0 0;
	
	font-size:45px;
	font-weight:bold;
	color:#fff;
	text-transform:uppercase;
	padding:10px;
	float:left;
        line-height:56px;
}

.quiz-app-retail-cnt-right {
	background:<?=$tempdata[2][1]['value'];?>;
	width:290px;
	height:175px;
	border:7px solid #fff;
	box-shadow: 0px 0px 4px 4px #fff;
	margin:81px 0 0 0;
	
	font-size:12px;
	color:#fff;
	padding:10px;
	float:right;
	line-height:26px;
}


.quiz-retail-bottom-content {
	
	font-size:10px;
	color:#333;
	width:700px;
	margin:0px auto;
	padding:20px 0;
	font-weight:bold;
}
.quiz-app-retail-bottom-content {
	
	font-size:11px;
	color:#fff;
        line-height:21px;
	margin:10px auto 0 auto;
	padding:20px 20px;
	width:720px;
	font-weight:bold;
	background:<?=$tempdata[4][0]['value'];?>;
}


.quiz-retail-copyright {
	display:block;
	
	font-size:10px;
	color:#666;
	width:748px;
	margin:0px auto;
	text-align:right;
	padding:5px 0;
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

.quiz-app-retail-cnt-left-thank {
	background:<?=$tempdata[5][3]['value'];?>;
	width:290px;
	height:175px;
	border:7px solid #fff;
	box-shadow: 0px 0px 4px 4px #fff;
	margin:145px 0 0 0;
	
	font-size:45px;
	font-weight:bold;
	color:#fff;
	padding:10px;
	float:left;
        line-height:56px;
}
.quiz-app-retail-cnt-right-thank {
	background:<?=$tempdata[5][5]['value'];?>;
	width:290px;
	height:175px;
	border:7px solid #fff;
	box-shadow: 0px 0px 4px 4px #fff;
	margin:145px 0 0 0;
	
	font-size:12px;
	color:#fff;
	padding:10px;
	float:right;
	line-height:26px;
}

</style>