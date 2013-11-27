
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

.quiz-food {
}

.quiz-food-data-container img
{
    height:auto;
}
.quiz-food-main-wrapper {
	width:810px;
	margin:0px auto;
}

.quiz-food-main-wrapper p, h1, h2, h3, h4, ul, li {
	margin:0px;
	padding:0px;
}

.quiz-food-main-wrapper a {
	text-decoration:none;
	outline:none;
	border:none;
}

.quiz-food-main-wrapper a:focus {
	text-decoration:none;
	outline:none;
	border:none;
}

.quiz-food-main-wrapper ul {
	list-style:none;
}

.quiz-food-top-slice {
    /*background:url(<?= base_url();?>images/images/thankyou_entertain_app_Quiz_01.png) no-repeat;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
	height:28px;
}

.quiz-food-bottom-slice {
	/*background:url(<?= base_url();?>images/images/thankyou_entertain_app_Quiz_05.png) no-repeat;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
	height:28px;
}

.quiz-food-data-slice {
	/*background:url(<?= base_url();?>images/images/thankyou_entertain_app_Quiz_03.png) repeat-y;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
}

.quiz-food-data-container {
	width:760px;
	margin:0px auto;
	padding:30px 0 0 0;
	position:relative;
	display:block;
}

.quiz-food-cnt {
	background:url(<?= base_url();?>images/images/signup_app_entertain-discription.png) repeat;
	width:700px;
	margin:20px;
	padding:10px;
	position:absolute;
	top:40px;
}



h1.quiz-food-heading {
	color:#ff7301;
	
}

p.quiz-food-dis {
	font-weight:bold;
	color:#fff;
	
	font-size:12px;
	margin:15px 0 0 0;
}

.quiz-food-middle-cnt {
}


.quiz-food-middle-cnt{
    
    width: 700px;
	margin:0px auto;
	padding:20px 0 0 0;
}


.quiz-food-list-radio-btn {
    float: left;
    padding: 5px 0 0 10px;
}


.quiz-food-list-pera {
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

.quiz-food-input-fields {
	width:700px;
	margin:0px auto;
	
}

.quiz-food-input-fields-left {
	float:left;
}

.quiz-food-input-fields-right {
	float:left;
	padding:0 0 0 10px;
}


.quiz-food-input-fields-inpt-title {
    color: #333333;
	padding:5px 0;
	display:block;
	font-size:12px;
}


.quiz-food-input {
    height: 31px;
    width: 327px;
	display:block;
	margin:15px 0;
	padding:0px 5px;
}

.quiz-food-bottom-content {
	
	font-size:10px;
	color:#333;
	width:700px;
	margin:0px auto;
	padding:20px 0;
	font-weight:bold;
}




.quiz-food-submit {
	background:#333;
	padding:5px 20px;
	border:none;
	
	font-weight:bold;
	color:#fff;
	float:right;
}

.quiz-food-list-heading {
	
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

.quiz-food-copyright {
	display:block;
	
	font-size:10px;
	color:#666;
	width:748px;
	margin:0px auto;
	text-align:right;
	padding:5px 0;
}

/* ===================================== */
 
.Quiz-app-food {
}

.Quiz-app-food-heading {
    margin: 20px;
    padding: 10px;
    position: absolute;
    top: 40px;
	display:block;
}

.Quiz-app-food-discription-cnt {
	background:url(<?= base_url();?>images/340X340/Quiz_app_food-bg-two.png) no-repeat;
	width:336px;
	height:336px;
	position:absolute;
	bottom:-35px;
	right:50px;
}

.Quiz-app-food-discription-cnt-heading {
        font-size: 46px;
        line-height: 50px;
        padding: 42px 20px 0 51px;
        text-align: center;
        color:#fff;
        -webkit-transform: rotate(7deg);
        -moz-transform: rotate(7deg);
        -o-transform: rotate(7deg);
        writing-mode: lr-tb;
        dispaly:block;
        height:200px;
}

.Quiz-app-food-discription-cnt-ds {
        font-size:18px;
        color:#fff;
        -webkit-transform: rotate(7deg); 
        -moz-transform: rotate(7deg);
        -o-transform: rotate(9deg);
        writing-mode: tr-tl;
        width:287px;
        text-align:center;
        margin:30px 0 0 0;
        display:block;
}

.Quiz-app-food-icon {
	float:left;
}

.food-code-txt {
	width:500px;
}

.Quiz-app-food-form-outer {
	float:left;
	padding:15px 0 0 0;
}

.food-quiz-bottom-content {
	color: #fff;
    
    font-size: 11px;
    font-weight: bold;
    margin: 0 auto;
    padding: 20px 0;
    width: 720px;
	background:<?=$tempdata[4][1]['value'];?>;
	margin-top:10px;
	padding:20px 20px;
        line-height:21px;
}

a.Quiz-app-food-share-btn {
	background:url(<?= base_url();?>images/images/facebook-share.png) no-repeat;
	width:58px;
	height:18px;
	display:block;
	position:absolute;
	bottom:10px;
	right:15px;
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
