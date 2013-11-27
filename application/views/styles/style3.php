<style>
body {
	
}
#mainraper
{
margin:0 auto;
width:794px;
background-color: <?=$tempdata[0][0]['value'];?>;
padding-top:20px;

font-size:16px;	
line-height:22px;
}
#contentdiv
{
	width:793px;
	margin-left:0;
}
#bannerbg
{
width:704px;
background-color:#CCCCCC;
margin:0 26px 0 26px;
padding: 20px 20px 20px 20px;
}

#bannerbg-page-two
{
width:704px;
background:url(<?=base_url();?>images/images/<?=$tempdata[1][0]['value'];?>) no-repeat;
margin:0 26px 0 26px;
padding: 118px 20px 20px;
height:254px;
}

#bannertxtbg
{
	width:660px;
	background:#999999;
	padding:20px;
	margin:0 0 0 2px;	
}

#bannertxtbg-page-two
{
	width:660px;
	background:<?=$tempdata[1][1]['value'];?>;
	padding:10px 21px;
	margin:57px 0 0 2px;
	opacity:0.8;	
}

#bannertxtbg-page-two p {
	padding:7px;
	margin:0px;
}

#bannertxtbg-page-two h2 {
	padding:7px;
	margin:0px;
}

.bnr-inner-pg-two {
	opacity:2;
	display:block;
}

#bannertxtbg h2
{
	display:block;
	margin:0px;
	
	font-size:32px;
	color:#000000;
	opacity: 2;
}
#quizdiv
{
	
	padding:17px 0 0 26px;
	width:767px;
}

.tab-cnt {
	float:right;
	background:<?=$tempdata[1][2]['value'];?>;
	width:694px;
	height:52px;
	padding:5px 5px 0 5px;
	font-size:14px;
	color:#333;
	font-weight:bold;
	margin:0 22px 0 0;
	
}

.tab-inpt-ccc {
	float:left;
	padding:20px 0 0 10px;
}

.cnt-mddl-inpt {
	margin:0 0 0 30px;
	float:left;
}

.middle-content {
	width:774px;
	margin:10px 0 0 0;
}

.inpt-title-ddd {
	color:#333;
}

.cnt-mddl-inpt input {
	width:350px;
	height:31px;
}

.sb-btn {
	float:right;
	margin:5px 0 0 0;
}

.sb-btn input {
	background:#ccc;
	width:178px;
	height:32px;
	border:1px solid #c3c1c1;
	font-weight:bold;
	color:#333;
}

.bottom-content {
	width:750px;
	background:<?=$tempdata[3][0]['value']?>;
	height:100px;
	margin:45px 0 0 24px;
}

.bottom-content p {
	margin:0px;
	padding:10px 15px;
	font-size:13px;
}

/* =================================== */
/* ==== End Page One Style Sheet ===== */
/* =================================== */

/* ======= Start Page three Style Sheet ====== */

.mdle-cnt-pg-three {
	width:770px;
}

.sp-title-cnt {
	margin:10px 0 0 67px;
}

.sp-title-cnt h2 {
	margin:0px;
	font-weight:normal;
}
.mdl-txt-cnt {
	width:400px;
	padding:10px;
	background:#ccc;
	margin:0 0 0 25px;
	float:left;
}
.mdl-pic-cnt {
	background:#ccc;
	width:266px;
	height:220px;
	float:right;
}
.md-cnt-container-pg-three {
	margin:15px 0 0 0;
}

/* ============ Start Thanks 2 style ================== */

#container-thanks2 {
	background-color:<?=$tempdata[4][0]['value']?>;
	padding-top:20px;
	
	font-size:16px;	
	line-height:22px;
}

.title-div-thanks2 {
	background:<?=$tempdata[4][1]['value']?>;
	font-size:28px;
	width:760px;
	margin:0px auto;
	padding:10px;
	color:#333;
	line-height:35px;
}

.btm-div-thanks2 {
	background:<?=$tempdata[4][4]['value']?>;
	font-size:21px;
	width:760px;
	margin:0px auto;
	padding:10px;
	color:#333;
	line-height:35px;
	margin-top:25px;
	text-align:center;
}

#contentdiv-thanks2
{
	width:793px;
	margin-left:0;
	padding-bottom:20px;
}

.mdl-img-cnt-thanks2 {
	width:740px;
	margin:0px auto;
	padding-top:20px;
}
/* ============ End Thanks 2 style ================== */
/* ============ ================== ================== */
/* ============ Start Competion over 2 style ================== */
#container-comptover2 {
	background-color:<?=$tempdata[5][0]['value']?>;
	padding-top:20px;
	
	font-size:16px;	
	line-height:22px;
}
#contentdiv-comptover2
{
	width:793px;
	margin-left:0;
	padding-bottom:20px;
}
.title-div-comptover2 {
	background:<?=$tempdata[5][1]['value']?>;
	font-size:28px;
	width:735px;
	margin:0px auto;
	padding:10px;
	color:#333;
	line-height:35px;
}
.img-cnt-comptover2 {
	margin:0px auto;
	width:755px;
	margin-top:20px;
}

/* ============ Start Competion over 2 style ================== */
</style>