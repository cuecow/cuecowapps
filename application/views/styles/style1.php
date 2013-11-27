<style>
/* ============================= */
/* =======Page Five Style======= */
/* ============================= */

#pg-five-rapper {
	width:794px;
	height:835px;
	margin:15px auto;
	background: #f7f8f8;
    border-radius:5px 5px 5px 5px;
    -webkit-border-radius:5px 5px 5px 5px;
    -o-border-radius:5px 5px 5px 5px;
    -moz-border-radius:5px 5px 5px 5px;
	box-shadow:0px 0px 12px 0px #999;
	-moz-box-shadow:0px 0px 12px 0px #999;
	-webkit-box-shadow:0px 0px 12px 0px #999;
	-o-box-shadow:0px 0px 12px 0px #999;
	padding:0px;
}
#pg-five-header
{
	margin:3px 0 0 10px;
	background:<?=$tempdata[0][2]['value'];?>;
	padding:2px 0 0 0;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	-o-border-radius:5px;
	position: static;
	width:771px;
	height:50px;
}



#pg-five-header h3 {
	font-size:14pt;
	padding:9px 0 0 0;
	margin:4px 0 0 0;
	text-align:center;
	color:#fff;
	font-weight:normal;
}


#pg-five-top-content {
	background:<?=$tempdata[1][3]['value']?>;	
	width:769px;
	height:300px;
	margin:11px 0 0 12px;
	border-radius:15px 5px 5px 15px;
    -webkit-border-radius:5px 5px 5px 5px;	
    -o-border-radius:5px 5px 5px 5px;
    -moz-border-radius:0px 15px 0px 15px;
}

.top-content-inner-text-field {
}
.inner-left {
	width:451px;
	height:245px;
	border:3px solid <?=$tempdata[1][0]['value']?>;
	float:left;
	margin:20px 0 0 23px;
}
.inner-right {
	float:left;
}

.line-text {
	
	font-size:11pt;
	color:#fff;
	font-weight:bold;
	margin:10px 0 0 10px;
	padding:10px;
}

.inner-left ul {
	width:400px;
	color:#fff;
	
	font-size:10pt;
	margin-left:37px;
}

.page-five-middle-div {
	margin:0px;
	padding:0px;
	width:781px;
}

.middle-left-tab {
	float:left;
	width:375px;
	height:205px;
	background-color:<?=$tempdata[2][5]['value'];?>;
	margin:13px 0 0 12px;
	border-radius:5px;
    -webkit-border-radius:5px;
    -o-border-radius:5px;
    -moz-border-radius:5px;
}

.left-title-udv {
	padding:10px 0 0 0;
	text-align:center;
	
	font-size:20pt;
	color:#fff;
}

.left-salogan-udv {
	padding:5px 0 0 0;
	text-align:center;
	
	font-size:12pt;
	color:#878634;
}

.smart-phones {
	margin:4px 0 0 88px;
}

.button-udu
{
    background:url(<?=base_url()?>images/images/<?=$tempdata[2][3]['value']?>) no-repeat;margin:0 0 0 20px;	
    color: #FFFFFF;
    display: block;
    
    font-size: 9px;
    font-weight: bold;
    height: 28px;
    padding: 6px 0 0;
    text-align: center;
    width: 101px;
}

.middle-right-tab {
	float:right;
	background-color:<?=$tempdata[3][6]['value'];?>;
	border-radius:5px;
    -webkit-border-radius:5px;
    -o-border-radius:5px;
    -moz-border-radius:5px;
	margin:13px 0px 0 0;
	width:375px;
	height:205px;
}

.smart-phones-right {
	background:url(../apps/tempdata/images/<?=$comp4[2]['value']?>) no-repeat;
	width:198px;
	height:98px;
	margin:0 0 0 183px;
}

.smart-phones-right ul {
	margin:0px;
	padding:26px 0 0 35px;
	
	font-size:9pt;
	color:#fff;
}

.bottom-div-title {
	
	font-size:14pt;
	color:#5F2E83;
	padding:20px 0 0 40px;
}


.bottom-div-salogan {
	
	font-size:10pt;
	color:#666;
	padding:2px 0 0 45px;
}

.bottom-pic-image {
	background:url(<?=base_url()?>images/images/<?=$tempdata[4][3]['value'];?>) no-repeat;
        width:501px;
	height:140px;
	margin:10px auto;
}

.bottom-pic-image img {
	margin:92px 0px 0px 18px;
}
.infmsg
{
background-color:#CCCCCC;width:500px;height:25px;color:#CC3333;
}
.errmsg
{
background-color:#CCCCCC;width:500px;height:25px;color:#FF0000;
}
/*.editdiv
{
	filter:alpha(opacity=50);-moz-opacity:0.5;-khtml-opacity: 0.5;opacity: 0.5;background-color:#CCCCCC;width:100px;height:25px;
}

/****************************** NEW APP TEMP STYLE*************************/

body {
	
}

#mainraper
{
margin:0 auto;
width:794px;
background-color:#e1e1e1;
padding-top:20px;

font-size:16px;	
line-height:22px;
}
#contentdiv
{
	width:744px;
	margin-left:0;
}
#bannerbg
{
width:704px;
background-color:#CCCCCC;
margin:0 26px 0 26px;
padding: 20px 20px 20px 20px;
}
#bannertxtbg
{
	width:660px;
	background:#999999;
	padding:20px;	
}
#bannertxtbg h2
{
	margin:0px;
	
	font-size:32px;
	color:#000000;
}
#quizdiv
{
	
	padding:17px 0 0 26px;
	width:767px;
}

.tab-cnt {
	float:right;
	background:#ccc;
	width:694px;
	height:52px;
	padding:5px 5px 0 5px;
	font-size:14px;
	color:#333;
	font-weight:bold;
	margin:0 22px 0 0;
	
}

.tab-inpt {
	float:left;
	padding:20px 0 0 10px;
}

.cnt-mddl-inpt {
	margin:0 0 0 30px;
	float:left;
}

.middle-content {
	width:774px;
}

.inpt-title {
	color:#333;
}

.cnt-mddl-inpt input {
	width:357px;
	height:31px;
}
/****************************** NEW APP TEMP STYLE*************************/
</style>