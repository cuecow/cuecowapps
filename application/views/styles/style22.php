
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

.food-design {
}

.food-design-main-wrapper {
	width:810px;
	margin:0px auto;
}

.food-design-main-wrapper p, h1, h2, h3, h4, ul, li {
	margin:0px;
	padding:0px;
}

.food-design-main-wrapper a {
	text-decoration:none;
	outline:none;
	border:none;
}

.food-design-main-wrapper a:focus {
	text-decoration:none;
	outline:none;
	border:none;
}

.food-design-main-wrapper ul {
	list-style:none;
}

.food-design-top-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_01.png) no-repeat;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
	height:28px;
}

.food-design-bottom-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_05.png) no-repeat;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
	height:28px;
}

.food-design-data-slice {
	/*background:url(<?=  base_url();?>images/images/thankyou_entertain_app_Quiz_03.png) repeat-y;*/
        background-color:<?=$tempdata[0][0]['value'];?>;
	width:797px;
}

.food-design-data-container {
	width:760px;
	margin:0px auto;
	padding:0;
	position:relative;
	display:block;
}

.food-design-header-cnt h2 {
	color:#fff;
	font-size:20px;
}

.food-design-header-cnt p {
	color:#fff;
	font-size:12px;
	padding:10px 0;
	line-height:14px;
	font-size:12px;
	opacity: 1;
}

ul.food-design-list {
	list-style:inherit;
	font-size:12px;
	color:#fff;
	padding:0 0 0 20px;
	line-height:21px;
}



.food-design-header-cnt {
	position:absolute;
	top:0px;
	width:250px;
	right:50px;
	background:<?=$tempdata[2][1]['value'];?>;
	opacity: 0.8;
	padding:30px 20px;
}

}

ul.food-design-list {
	list-style:square;
	font-size:12px;
	color:#fff;
	padding:0 0 0 20px;
	font-weight:bold;
	line-height:21px;
}

.food-design-middle-left {
	float:left;
	width:371px;
	
}

.food-design-left-middle-btm-cnt {
	color:#000;
	padding:20px;
}

.food-design-left-middle-btm-cnt h3 {
	font-size:18px;
}

.food-design-left-middle-btm-cnt p {
	font-size:12px;
	padding:5px 0 0 0;
	line-height:16px;
}

.food-design-photos-cnt {
	background:#f16600;
	padding:10px 0;
}






.food-design-middle-container {
	width:760px;
	margin:10px auto;
}

.food-design-middle-right {
	float:left;
	width:372px;
	margin:0 0 0 16px;
	position:relative;
}







.food-design-bottom-container {
	width:720px;
	margin:0px auto;
	background:<?=$tempdata[4][0]['value'];?>;
	padding:20px;
}

.food-design-bottom-container p {
	color:#fff;
	font-size:12px;
	float:left;
	display:block;
}


.food-design-top-container {
	width:720px;
	margin:0px auto;
	background:<?=$tempdata[1][0]['value'];?>;
	padding:10px 20px;
}

.food-design-top-container h2 {
	color:#fff;
	text-transform:uppercase;
	font-size:18px;
	display:block;
	float:left;
}

.food-design-logo-header {
	display:block;
	float:right;
	padding:3px 0 0 0;
}

.food-design-middle-right-cnt {
	padding:20px;
}

.food-design-middle-right-cnt h3 {
	font-size:18px;
}

.food-design-middle-right-cnt p {
	font-size:12px;
	padding:10px 0 0 0;
        line-height:21px;
}

.food-design-discription-cnt {
	background:url(<?=  base_url();?>images/images/pagedesign_app_food_0003_Layer-9-copy.png) no-repeat;
	width:336px;
	height:336px;
	position:absolute;
	bottom:-125px;
	left:50px;
}

.food-design-discription-cnt-heading {
	 font-size: 46px;
    line-height: 50px;
    padding: 60px 20px 0 6px;
    text-align: center;
	color:#fff;
	-webkit-transform: rotate(-7deg);
	-moz-transform: rotate(-7deg);
	-o-transform: rotate(-7deg);
	writing-mode: lr-tb;
	display:block;
	height:150px;
	overflow:hidden;
}

.food-design-discription-cnt-ds {
	font-size:18px;
	color:#fff;
	-webkit-transform: rotate(-7deg); 
   -moz-transform: rotate(-7deg);
   -o-transform: rotate(-7deg);
   writing-mode: tr-tl;
   width:287px;
   text-align:center;
   margin:30px 0 0 0;
   display:block;
   padding:15px 0 0 29px !important;
   height:70px;
   overflow:hidden;
}

.food-design-orng-tb {
	background:<?=$tempdata[3][3]['value'];?>;
	height:200px;
}

</style>