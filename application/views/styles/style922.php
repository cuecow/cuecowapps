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

.gallery-app-main-wrapper {
	width:810px;
	margin:0px auto;
	background:<?=$tempdata[0][0]['value'];?>;        
        padding: 2px 0;
}

.gallery-app-sun-image {
	background:url(<?=base_url()?>images/images/<?=$tempdata[0][1]['value'];?>) no-repeat;
	width:118px;
	height:58px;
	margin:0px auto;
}



/* ========= gallery-app-inner-container ============== */

.gallery-app-inner-container {
	width:810px;
	margin:0px auto;	
}

.gallery-app-inner-container-top-slice {
	/*background:url(<?=base_url()?>images/images/gallery-app-bg_01.png) no-repeat;*/
        background-color:<?=$tempdata[0][2]['value'];?>;
	width:797px;
	height:29px;
}

.gallery-app-inner-container-data
{
	background-color:<?=$tempdata[0][2]['value'];?>;
	width:797px;
	height:auto;
        margin:0 auto;
        padding: 20px 0;
}

.gallery-app-inner-container-bottom-slice {
	/*background:url(<?=base_url()?>images/images/gallery-app-bg_05.png) no-repeat;*/
        background-color:<?=$tempdata[0][2]['value'];?>;
	width:797px;
	height:34px;
}
/*.gallery-app-logo {
	background:url() no-repeat;
	width:262px;
	height:37px;
        margin-top:10px;
	margin:0px auto;
}*/

/* ================================================= */

.gallery-app-right-col {
    float: right;
    margin-right: 15px;
    text-align: justify;
    width: 710px;
}

h3.gallery-app-right-col-heading {
    color: #333333;
    font-size: 25px;
    padding: 15px;
    text-align: center;
}

p.gallery-app-right-col-data {
	color:#343;
	font-size:12px;
}

a.gallery-app-anchor-button {
	background:url(<?=base_url()?>images/images/gallery-app-buttons.png) no-repeat;
	width:151px;
	height:28px;
	display:block;
	color:#fff;
	padding:7px 0 0 0;
	text-align:center;
	font-weight:bold;
	margin:10px auto;
}

/* ============================================= */
/* ***** *****   M E N U   ***** ***** */
.nav{

}
.nav ul.menu {
    float: left;
    list-style: none;
    margin: 0 0 0 -5px;
    padding: 0;
}
.nav ul.menu li {
    float: left;
    margin: 0 0 0 5px;
    padding: 0 0 0 5px;
}
.nav ul.menu li a {
    display: block;
    padding: 4px 5px 4px 0;
    font-size: 13px;
    font-weight: bold;
    text-decoration: none;
}
.nav ul.menu li a span {
    display: block;
    padding: 2px 0 2px 25px;
    color: #C7C7C7;
    background-repeat: no-repeat;
    background-position: left -20px;
}
.nav ul.menu li.menu-1 a span { background-image: url(<?=base_url()?>images/images/menu-1.png);}
.nav ul.menu li.menu-2 a span { background-image: url(<?=base_url()?>images/images/menu-2.png);}
.nav ul.menu li.menu-3 a span { background-image: url(<?=base_url()?>images/images/menu-3.png);}

.nav ul.menu li:hover, .nav ul.menu li:active {
    background: url(<?=base_url()?>images/images/buttonSmallLeft.png) no-repeat left center;
}
.nav ul.menu li:hover a, .nav ul.menu li:active a {
    background: url(<?=base_url()?>images/images/buttonSmallRight.png) no-repeat right center;
}
.nav ul.menu li:hover a span, .nav ul.menu li:active a span {
    color: #fff;
    background-position: left 0;
}
/* ***** *****   S E A R C H   ***** ***** */
.nav .gallery-app-search {
    float: right;
}
.nav .gallery-app-search input {
    float: left;
    width: 161px;
    margin: 0;
    padding: 6px 0 6px 5px;
    font-size: 13px;
    color: #000;
    background: url(<?=base_url()?>images/images/searchInput.png) no-repeat;
    border: none;
}
.nav .gallery-app-search .submit {
    float: left;
    display: block;
    width: 27px;
    height: 28px;
    background: url(<?=base_url()?>images/images/searchButton.png) no-repeat;
}
/* =========================================== */
.gallery-app-bottom-content {
	width:760px;
	margin:0px auto;
        overflow: scroll;
        height: 381px;
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
a.vite-image {
	background:url(<?=base_url()?>images/images/votesLeft.png) no-repeat;
	width:23px;
	height:22px;
	display:block;
	float:left;
}
.vote-text {
	float:left;
	font-size:12px;
	background:url(<?=base_url()?>images/images/votesRight.png) left 0px no-repeat;
	width:22px;
	height:22px;
	padding:4px 0 0 0;
	color:#fff;
}
.gallery-app-pagination-content {
	padding:10px 0 0 0;
	width:773px;
	margin:0px auto;
}
ul.gallery-aap-pagination-list {
	list-style:none;
}

ul.gallery-aap-pagination-list li {
	float:left;
	padding-left:5px;
}
ul.gallery-aap-pagination-list li a {
	width:29px;
	height:25px;
	display:block;
	color:#333;
	font-weight:bold;
	font-size:16px;
	text-align:center;
	padding:5px 0 0 0;
}
ul.gallery-aap-pagination-list li.numbers a:hover {
	background:url(<?=base_url()?>images/images/gallery-app-pagination.png) no-repeat;
	width:29px;
	height:25px;
	display:block;
	color:#fff;
	font-weight:bold;
	font-size:16px;
	text-align:center;
	padding:5px 0 0 0;
}
ul.gallery-aap-pagination-list li.numbers a.active {
	background:url(<?=base_url()?>images/images/gallery-app-pagination.png) no-repeat;
	width:29px;
	height:25px;
	display:block;
	color:#fff;
	font-weight:bold;
	font-size:16px;
	text-align:center;
	padding:5px 0 0 0;
}

ul.gallery-aap-pagination-list li.pagination-arrows a:hover {
	background:url(<?=base_url()?>images/images/pagination-arrows.png) no-repeat;
	width:79px;
	height:25px;
	display:block;
	color:#fff;
	font-weight:bold;
	font-size:16px;
	text-align:center;
	padding:5px 0 0 0;
}
ul.gallery-aap-pagination-list li.pagination-arrows a {
	width:79px;
}
ul.gallery-aap-pagination-list li.pagination-arrows a.active {
	background:url(<?=base_url()?>images/images/pagination-arrows.png) no-repeat;
	width:79px;
	height:25px;
	display:block;
	color:#fff;
	font-weight:bold;
	font-size:16px;
	text-align:center;
	padding:5px 0 0 0;
}
.gallery-app-main-col {
	width:760px;
	margin:0px auto;
}
.gallery-app-footer-data {
	width:760px;
	margin:0px auto;
}
.gallery-aap-thumnails-details {
	margin:0;
	
}

.gallery-aap-thumnails-details-image {
	float:left;
	padding:5px;
	border:1px solid #ccc;
}

.gallery-aap-thumnails-details-description-list {
	float:left;
	padding:5px 5px;
	width:490px;
	background:#eee;
	margin:0px 5px;
	height:160px;
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
/*****COPY FROM REFERNCE PAGE*****************/

a:hover {
    text-decoration: none;
}
#overlayLight {
    position: absolute;
    z-index: 10;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: url(<?=base_url()?>images/images/overlayLight.png);
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

.button a {
    float: left;
    display: block;
    padding-left: 5px;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
    background: url(<?=base_url()?>images/images/buttonLeft.png) no-repeat left center;
}
.button a span {
    display: block;
    padding: 9px 20px 9px 15px;
    color: #fff;
    background: url(<?=base_url()?>images/images/buttonRight.png) no-repeat right center;
}


 Top {
    height: 25px;
    background: url(<?=base_url()?>images/images/containerTop.png) no-repeat;
}
 Content {
    overflow: hidden;
    *height: 1%;
    padding: 0 20px;
    background: url(<?=base_url()?>images/images/containerContent.png) repeat-y;
}
 Bottom {
    height: 25px;
    background: url(<?=base_url()?>images/images/containerBottom.png) no-repeat;
}


/* ***** ***** ***** ***** *****   W R A P   L A N D I N G   ***** ***** ***** ***** ***** */
#pageLanding  .sun {
    height: 110px;
    margin-bottom: -15px;
    background: url(<?=base_url()?>images/images/sunBig.jpg) no-repeat center 0;
}
#pageLanding  .like {
    position: absolute;
    z-index: 2;
    left: 20px;
    top: 0;
    width: 480px;
    height: 110px;
    background: url(<?=base_url()?>images/images/like.png) no-repeat center 5px;
}
#pageLanding  .like td {
    font-size: 42px;
    line-height: 42px;
    color: #fff;
    text-align: center;
    vertical-align: center;
    text-shadow: 0 0 5px #484848;
    filter:	progid:DXImageTransform.Microsoft.Glow(Color=#484848,Strength=3);
}
#pageLanding  .like td span {
    font-weight: bold;
}

#pageLanding  .logo {
    display: block;
    margin: 0 auto 12px;
}
#pageLanding  .title {
    display: block;
    margin: 0 auto 12px;
}
#pageLanding  .main {
    display: block;
    margin: 0 auto;
}

#pageLanding  .header {
    font-size: 16px;
    line-height: 18px;
    font-weight: bold;
    text-align: center;
}
#pageLanding  .header p {
    margin: 12px 0 0 0;
}


/* ***** ***** ***** ***** *****   W R A P   I N D E X   ***** ***** ***** ***** ***** */
  .sun {
    height: 58px;
    margin-bottom: -15px;
    background: url(<?=base_url()?>images/images/sun.jpg) no-repeat center 0;
}
  .logo {
    height: 37px;
    background: url(<?=base_url()?>images/images/logo.png) no-repeat center 0;
}

/* ***** ***** ***** *****   M A I N   ***** ***** ***** ***** */
  .main {
    padding: 20px 0 20px 189px;
    background: url(<?=base_url()?>images/images/mainPicture.jpg) no-repeat left center;
}

  .main .button {
    overflow: hidden;
    *height: 1%;
    margin-top: -20px;
    padding-top: 20px;
    background: url(<?=base_url()?>images/images/tip.png) no-repeat right 0;
}

/* ***** ***** ***** *****   C O N T E N T   ***** ***** ***** ***** */
.content 
{
    
}

/* ***** ***** *****   NAV   ***** ***** ***** */
/* ***** *****   M E N U   ***** ***** */
  .nav ul.menu {
    float: left;
    list-style: none;
    margin: 0 0 0 -5px;
    padding: 0;
}
  .nav ul.menu li {
    float: left;
    margin: 0 0 0 5px;
    padding: 0 0 0 5px;
}
  .nav ul.menu li a {
    display: block;
    padding: 4px 5px 4px 0;
    font-size: 13px;
    font-weight: bold;
    text-decoration: none;
}
  .nav ul.menu li a span {
    display: block;
    padding: 2px 0 2px 25px;
    color: #C7C7C7;
    background-repeat: no-repeat;
    background-position: left -20px;
}
  .nav ul.menu li.menu-1 a span { background-image: url(<?=base_url();?>images/images/menu-1.png);}
  .nav ul.menu li.menu-2 a span { background-image: url(<?=base_url();?>images/images/menu-2.png);}
  .nav ul.menu li.menu-3 a span { background-image: url(<?=base_url();?>images/images/menu-3.png);}

  .nav ul.menu li.hover,   .nav ul.menu li.active {
    background: url(<?=base_url();?>images/images/buttonSmallLeft.png) no-repeat left center;
}
   .nav ul.menu li.hover a,    .nav ul.menu li.active a {
    background: url(<?=base_url();?>images/images/buttonSmallRight.png) no-repeat right center;
}
   .nav ul.menu li.hover a span,    .nav ul.menu li.active a span {
    color: #fff;
    background-position: left 0;
}

/* ***** *****   S E A R C H   ***** ***** */
   .nav .search {
    float: right;
}
   .nav .search input {
    float: left;
    width: 161px;
    margin: 0;
    padding: 6px 0 6px 5px;
    font-size: 13px;
    color: #000;
    background: url(<?=base_url();?>images/images/searchInput.png) no-repeat;
    border: none;
}
   .nav .search .submit {
    float: left;
    display: block;
    width: 27px;
    height: 28px;
    background: url(<?=base_url();?>images/images/searchButton.png) no-repeat;
}

/* ***** ***** *****   S U B M I T S   ***** ***** ***** */
   ul.submits {
    overflow: hidden;
    /*width: 492px;*/
    width: 780px;
    list-style: none;
    height: auto;
    margin-top:50px;;
    padding: 0px 0px;
}
   ul.submits li {
    display: inline-block;
    position: relative;
    margin: 0;
    padding: 6px;
}

/* ***** *****   P R E V I E W   ***** ***** */
   ul.submits li .preview {
    position: relative;
    padding: 8px;
    background: #fff;
}
   ul.submits li .preview .votes {
    position: absolute;
    right: 11px;
    top: 11px;
    padding-left: 23px;
    background: url(<?=base_url();?>images/images/votesLeft.png) no-repeat left center;
}
   ul.submits li .preview .votes div {
    padding: 4px 5px 4px 0;
    font-size: 11px;
    color: #fff;
    background: url(<?=base_url();?>images/images/votesRight.png) no-repeat right center;
}
   ul.submits li .preview .image {
    display: block;
    width: 160px;
    height: 160px;
}

/* ***** *****   Z O O M   ***** ***** */
   ul.submits li .zoom {
    display: none;
    position: absolute;
    padding: 11px;
    border: 1px solid #BEBEBE;
    background: #fff;
}
   ul.submits li.submitPosition-1 .zoom { left: 1px; top: 1px;}
   ul.submits li.submitPosition-2 .zoom { left: -40px; top: 1px;}
   ul.submits li.submitPosition-3 .zoom { right: 1px; top: 1px;}
   ul.submits li.submitPosition-4 .zoom { left: 1px; bottom: 1px;}
   ul.submits li.submitPosition-5 .zoom { left: -40px; bottom: 1px;}
   ul.submits li.submitPosition-6 .zoom { right: 1px; bottom: 1px;}

   ul.submits li .zoom .image {
    display: block;
    width: 220px;
    height: 220px;
}

   ul.submits li .zoom .buttons {
    position: absolute;
    left: 14px;
    top: 14px;
}

   ul.submits li .zoom .vote {
    float: left;
    display: block;
    width: 67px;
    height: 31px;
    background: url(<?=base_url();?>images/images/buttonVote.png) no-repeat;
}
   ul.submits li .zoom .share {
    float: left;
    display: block;
    width: 59px;
    height: 31px;
    margin-left: 3px;
    background: url(<?=base_url();?>images/images/buttonShare.png) no-repeat;
}
   ul.submits li .zoom .text {
    position: absolute;
    left: 11px;
    bottom: 11px;
    width: 208px;
    padding: 6px; /*12*/
    font-size: 12px;
    color: #fff;
    background: url(<?=base_url();?>images/images/overlay.png);
}

/* ***** ***** *****   P A G I N A T I O N   ***** ***** ***** */
   ul.pagination {
    overflow: hidden;
    /**height: 1%;*/
    list-style: none;
    margin: 0 auto;
    width:760px;
    padding: 10px 0 0 0;
}
   ul.pagination li {
    float: left;
    position: relative;
    margin: 0 0 0 5px;
    padding: 0 0 0 5px;
}
   ul.pagination li a {
    display: block;
    padding: 6px 10px 6px 5px;
    font-size: 13px;
    font-weight: bold;
    color: #A0A0A0;
    text-decoration: none;
}
   ul.pagination li.hover,    ul.pagination li.active {
    background: url(<?=base_url();?>images/images/buttonSmallLeft.png) no-repeat left center;
}
   ul.pagination li.hover a,    ul.pagination li.active a {
    color: #fff;
    background: url(<?=base_url();?>images/images/buttonSmallRight.png) no-repeat right center;
}

/* ***** ***** *****   F O O T   ***** ***** ***** */
  .foot {
    overflow: hidden;
    *height: 1%;
    padding-top: 10px;
    color: #C2C2C2;
    border-top: 1px solid #F0F0F0;
}
  .foot a {
    color: #838383;
}
  .foot .left {
    float: left;
}
  .foot .right {
    float: right;
}


/* ***** ***** ***** ***** *****   D I A L O G   ***** ***** ***** ***** ***** */
.dialog {
    position: absolute;
    z-index: 10;
    left: 25%;
    top: 20px;
    width: 480px;
}
.dialog .dialogTop {
    height: 10px;
    background: url(<?=base_url()?>images/images/dialogTop.png) no-repeat;
}
.dialog .dialogBottom {
    height: 10px;
    background: url(<?=base_url()?>images/images/dialogBottom.png) no-repeat;
}
.dialog .dialogClose {
    display: block;
    position: absolute;
    right: -10px;
    top: -10px;
    width: 30px;
    height: 30px;
    background: url(<?=base_url()?>images/images/dialogClose.png) no-repeat;
}
.dialog .dialogContent {
    overflow: hidden;
    *height: 1%;
    position: relative;
    padding: 10px 20px;
    background: url(<?=base_url()?>images/images/dialogContent.png) repeat-y;
}
.dialog .dialogContent .dialogScroll {
    overflow: auto;
}

#errorDialog {
    top: 200px;
}

/* ***** ***** ***** ***** *****   F O R M   D I A L O G   ***** ***** ***** ***** ***** */
#formDialog {
    top: 120px;
    margin-left: 0;
}

#formDialog .dialogContent .header {
    margin-bottom: 10px;
}

#formDialog .dialogContent label {
    display: block;
    margin-bottom: 2px;
    font-weight: bold;
    color: #1C1C1C;
}
#formDialog .dialogContent input, #formDialog .dialogContent textarea {
    display: block;
    width: 300px;
    margin: 0;
    *margin: -1px 0;
    padding: 5px;
    font-size: 12px;
    color: #7D7D7D;
    border: 1px solid #E5E5E5;
}
#formDialog .dialogContent input {
    width: 428px;
    margin-bottom: 10px;
}
#formDialog .dialogContent input.error, #formDialog .dialogContent textarea.error {
    border-color: red;
}

#formDialog .dialogContent .line {
    overflow: hidden;
    *height: 1%;
    margin-bottom: 10px;
}

#formDialog .dialogContent .line .left {
    float: left;
}
#formDialog .dialogContent .line .uploadWrapper {
    overflow: hidden;
    position: relative;    
}
#formDialog .dialogContent .line .left .uploadWrapper .image {
    display: block;
    width: 100px;
    height: 100px;
    border: 1px solid #E5E5E5;
}
#formDialog .dialogContent .line .left .uploadWrapper .image.error {
    border-color: red;
}
#formDialog .dialogContent .line .left .uploadWrapper .uploadFile {
    position: absolute;
    right: 0;
    top: 0;
    width: auto;
    height: 1000px;
    margin: 0;
    font-size: 1000px;
    cursor: pointer;
    opacity: 0;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
}

#formDialog .dialogContent .line .right {
    float: left;
    margin-left: 10px;
    *margin-left: 5px;
}
#formDialog .dialogContent .line .right textarea {
    width: 316px;
    height: 90px;
    resize: none;
}

#formDialog .dialogContent .terms {
    margin-bottom: 10px;
    font-size: 11px;
    color: #7D7D7D;
}

#formDialog .dialogContent .button {
    margin: 0 auto;
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
/* ***** ***** ***** ***** *****   V I E W   D I A L O G   ***** ***** ***** ***** ***** */
#viewDialog .dialogContent .image {
    display: block;
    width: 440px;
    height: 440px;
    cursor: default;
}

#viewDialog .dialogContent .buttons {
    position: absolute;
    left: 23px;
    top: 13px;
}

#viewDialog .dialogContent .vote {
    float: left;
    display: block;
    width: 67px;
    height: 31px;
    background: url(<?=base_url()?>images/images/buttonVote.png) no-repeat;
}
#viewDialog .dialogContent .share {
    float: left;
    display: block;
    width: 59px;
    height: 31px;
    margin-left: 3px;
    background: url(<?=base_url()?>images/images/buttonShare.png) no-repeat;
}
#viewDialog .dialogContent .text {
    position: absolute;
    left: 20px;
    bottom: 10px;
    width: 428px;
    padding: 6px; /*12*/
    font-size: 12px;
    color: #fff;
    background: url(<?=base_url()?>images/images/overlay.png);
}
/************************************************************/
</style>