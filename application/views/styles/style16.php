
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

.entertain-quiz {
}

.entertain-quiz-main-wrapper {
	width:810px;
	margin:0px auto;
}

.entertain-quiz-main-wrapper p, h1, h2, h3, h4, ul, li {
	margin:0px;
	padding:0px;
}

.entertain-quiz-main-wrapper a {
	text-decoration:none;
	outline:none;
	border:none;
}

.entertain-quiz-main-wrapper a:focus {
	text-decoration:none;
	outline:none;
	border:none;
}

.entertain-quiz-main-wrapper ul {
	list-style:none;
}

.entertain-quiz-top-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_01.png) no-repeat;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
	height:28px;
}

.entertain-quiz-bottom-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_05.png) no-repeat;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
	height:28px;
}

.entertain-quiz-data-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_03.png) repeat-y;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
}

.entertain-quiz-data-container {
	width:760px;
	margin:0px auto;
	padding:30px 0 0 0;
	position:relative;
	display:block;
}

.entertain-quiz-cnt { 
    background:<?=$tempdata[2][0]['value'];?>; 
	width:700px;
	margin:20px;
	padding:10px;
	position:absolute;
	top:40px;
        opacity:0.8;
}



h1.entertain-quiz-heading {
	color:#ff7301;
	
        font-size:35px;
        font-weight:bold;
}

p.entertain-quiz-dis {
	font-weight:bold;
	color:#fff;
	
	font-size:12px;
	margin:15px 0 0 0;
}

.entertain-quiz-middle-cnt {
}


.entertain-quiz-middle-cnt{
    
    width: 700px;
	margin:0px auto;
	padding:20px 0 0 0;
}


.entertain-quiz-list-radio-btn {
    float: left;
    padding: 5px 0 0 10px;
}


.entertain-quiz-list-pera {
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

.entertain-quiz-input-fields {
	width:700px;
	margin:0px auto;
	
}

.entertain-quiz-input-fields-left {
	float:left;
}

.entertain-quiz-input-fields-right {
	float:left;
	padding:0 0 0 10px;
}


.entertain-quiz-input-fields-inpt-title {
    color: #333333;
	padding:5px 0;
	display:block;
	font-size:12px;
}


.entertain-quiz-input {
    height: 31px;
    width: 327px;
	display:block;
	margin:15px 0;
	padding:0px 5px;
}

.entertain-quiz-bottom-content {
	
	font-size:11px;
        line-height:21px;
	color:#333;
	width:700px;
	margin:0px auto;
	padding:20px 0;
	font-weight:bold;
}




.entertain-quiz-submit {
	background:#333;
	padding:5px 20px;
	border:none;
	
	font-weight:bold;
	color:#fff;
	float:right;
}

.entertain-quiz-list-heading {
	
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
	background:#00326c;
	width:290px;
	height:175px;
	border:7px solid #fff;
	box-shadow: 0px 0px 4px 4px #fff;
	margin:145px 0 0 0;
	
	font-size:45px;
	font-weight:bold;
	color:#fff;
	text-transform:uppercase;
	padding:10px;
	float:left;
}

.quiz-app-retail-cnt-right {
	background:#00326c;
	width:290px;
	height:175px;
	border:7px solid #fff;
	box-shadow: 0px 0px 4px 4px #fff;
	margin:145px 0 0 0;
	
	font-size:12px;
	color:#fff;
	padding:10px;
	float:right;
	line-height:18px;
}


.quiz-app-retail-bottom-content {
	
	font-size:10px;
	color:#fff;
	margin:10px auto 0 auto;
	padding:20px 20px;
	width:720px;
	font-weight:bold;
	background:#710000;
}

.entertain-quiz-copyright {
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

.entertain-quiz-cnt-thank { 
    background:<?=$tempdata[5][2]['value'];?>; 
	width:700px;
	margin:20px;
	padding:10px;
	position:absolute;
	top:40px;
        opacity:0.8;
}
</style>