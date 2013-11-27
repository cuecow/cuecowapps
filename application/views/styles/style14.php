
<style>
@charset "utf-8";
/* CSS Document */
.christmas-app-main-wrapper {
	width:800px;
	margin:0px auto;
	background:url(<?=base_url()?>images/images/<?=$tempdata[0][0]['value'];?>) no-repeat;
	height:600px;
}
.christmas-app-data-container {
	width:721px;
	margin:0px auto;
}

.christmas-app-heading-one {
	
	text-shadow: 1px 1px 2px #000000;
	color:#fff;
	padding:50px 0 0 0;
	margin:0px;
        font-size: 32px;
}
.christmas-app {
}
p.christmas-app-pera-one {
    
    text-shadow: 1px 1px 2px #000000;
    margin:0px;
    color:#858585;
    font-size:16px;
}

a.christmas-app-fb-icon {
}

.christmas-app-calandar-table {
}

table.christmas-app-calandar-table td {
	
	color: <?=$tempdata[1][10]['value'];?>;
	font-size:32px;
	font-weight:normal;
	width:100px;
	height:109px;
}

table.christmas-app-calandar-table td a {
	color:<?=$tempdata[1][10]['value'];?>;
	text-decoration:none;
	
}

table.christmas-app-calandar-table td a.item-cell {
	background:url(<?=base_url()?>images/images/table-hover-green.png) no-repeat;
	width:90px;
	height:99px;
	display:block;
	padding:10px 0 0 10px;
}

table.christmas-app-calandar-table td a.green {
	background:url(<?=base_url()?>images/images/table-items-bg-hover.png) 0px 0 no-repeat;
	width:90px;
	height:99px;
	
}

table.christmas-app-calandar-table td p.item-lebal {
	font-size:12px;
	margin:0px;
	padding:0px;
	color:#fff;
}

table.christmas-app-calandar-table td a.green:hover {
	background-position:0px -116px;
	
}

table.christmas-app-calandar-table td a.yallow {
	background:url(<?=base_url()?>images/images/table-items-bg-hover.png) 0px 0px no-repeat;
	width:90px;
	height:99px;
	
}

table.christmas-app-calandar-table td a.yallow:hover {
	background-position:0px -231px;
	
}

table.christmas-app-calandar-table td a.syaan {
	background:url(<?=base_url()?>images/images/table-items-bg-hover.png) 0px 0px no-repeat;
	width:90px;
	height:99px;
	
}

table.christmas-app-calandar-table td a.syaan:hover {
	background-position:0px -347px;
	
}

table.christmas-app-calandar-table td a.empty-cell {
	background:url(<?=base_url()?>images/images/table-items-bg-hover.png) 0px 0px no-repeat;
	width:90px;
	height:99px;
	display:block;
	padding:10px 0 0 10px;
}

table.christmas-app-calandar-table td a.empty-cell:hover {
	background-position: 0px -461px;
}

/* =============== popoup-one ===================== */
.christmas-popup-one-data {
	width:590px;
	height:320px;
        /*background:url(<?=base_url()?>images/images/bg-popup-one.png) repeat-x;*/
}

.christmas-popup-one-data .left-col {
	padding:25px 0 0 25px;
	float:left;
}

.christmas-popup-one-data .left-col .item-outer {
	padding:5px;
	background:#fff;
	width:224px;
}

.christmas-popup-one-data .left-col .item-thumbnail {
	width:224px;
	height:262px;
}

.christmas-popup-one-data .left-col .item-thumbnail img.thumbnail-image {
	margin:0px auto;
	width:100px;
	display:block;
	padding:30px 0 0 0;
}

.christmas-popup-one-data .left-col .item-thumbnail img.popup-separator {
	margin:0px auto;
	width:187px;
	display:block;
	padding:30px 0 0 0;
}

.christmas-popup-one-data .left-col .item-thumbnail .item-name {
	display:block;
	
	text-align:center;
	padding:10px 0 0 0;
	color:#333;
}

.christmas-popup-one-data .left-col .item-thumbnail .older-price {
	display:block;
	
	text-align:center;
	padding:10px 0 0 40px;
	color:#999;
	float:left;
	font-size:12px;
	text-decoration:line-through;
}

.christmas-popup-one-data .left-col .item-thumbnail .new-price {
	display:block;
	
	text-align:center;
	padding:5px 0 0 10px;
	color:#961d4b;
	float:left;
	font-weight:bold;
}

.christmas-popup-one-data .left-col .item-thumbnail .image-container {
	height:160px;
}

.christmas-popup-one-data .right-col {
	padding:15px 0 0 15px;
	float:left;
	width:290px;
	
}

.christmas-popup-one-data .right-col .heading-one {
	display:block;
	font-size:19px;
}

.christmas-popup-one-data .right-col .subtitle {
	color:#666;
}
.christmas-popup-one-data .right-col .line-three {
	display:block;
	font-size:16px;
	padding:10px 0 0 0;
}

.christmas-popup-one-data .right-col .line-four {
	display:block;
	font-size:16px;
	padding:10px 0 0 0;
}
.popup-separator
{
    border-bottom: 1px solid #CCCCCC;
    display: block;
    margin: 0 auto;
    padding: 30px 0 0;
    width: 187px;
}

/* =============== popoup-two ===================== */

.christmas-popup-two-data {
	width:590px;
	height:320px;
	/*background:url(<?=base_url()?>images/images/bg-popup-one.png) repeat-x;*/
}

.christmas-popup-two-data .left-col {
	padding:25px 0 0 25px;
	float:left;
}

.christmas-popup-two-data .left-col .item-outer {
	padding:5px;
	background:#fff;
	width:224px;
}

.christmas-popup-two-data .left-col .item-thumbnail {
	width:224px;
	height:215px;
}

.christmas-popup-two-data .left-col .item-thumbnail img.thumbnail-image {
	margin:0px auto;
	width:100px;
	display:block;
	padding:30px 0 0 0;
}

.christmas-popup-two-data .left-col .item-thumbnail img.popup-separator {
	margin:0px auto;
	width:187px;
	display:block;
	padding:30px 0 0 0;
}

.christmas-popup-two-data .left-col .item-thumbnail .item-name {
	display:block;
	
	text-align:center;
	padding:10px 0 0 0;
	color:#333;
}

.christmas-popup-two-data .left-col .item-thumbnail .older-price {
	display:block;
	
	text-align:center;
	padding:10px 0 0 40px;
	color:#999;
	float:left;
	font-size:12px;
	text-decoration:line-through;
}

.christmas-popup-two-data .left-col .item-thumbnail .new-price {
	display:block;
	
	text-align:center;
	padding:5px 0 0 10px;
	color:#961d4b;
	float:left;
	font-weight:bold;
}

.christmas-popup-two-data .left-col .item-thumbnail .image-container {
	height:160px;
}

.christmas-popup-two-data .right-col {
	padding:19px 0 0 15px;
	float:left;
	width:290px;
	
}

.christmas-popup-two-data .right-col .heading-one {
	display:block;
	font-size:19px;
}

.christmas-popup-two-data .right-col .subtitle {
	color:#666;
}
.christmas-popup-two-data .right-col .line-three {
	display:block;
	font-size:16px;
	padding:10px 0 0 0;
}

.christmas-popup-two-data .right-col .line-four {
	display:block;
	font-size:16px;
	padding:10px 0 0 0;
}

.christmas-popup-two-data .right-col .form-content .field-name {
    display:block;
    margin-top: 10px;
}

.christmas-popup-two-data .right-col .form-content .text-field {
    display:block;
    width:240px;
    height: 22px;
}
.christmas-popup-two-data .right-col .form-content form {
}

.christmas-popup-two-data .right-col .form-content .submit {
	background:#f5f5f5;
	border:1px solid #ccc;
	padding:5px 10px;
	color:#444;
	margin:10px 0 0 0;
}

.christmas-popup-two-data .right-col-separator {
	float:right;
	padding:10px 0 0 0;
}

.clear {
	clear:both;
}

.christmas-app-bottom-line {
	width:272px;
	float:right;
	
}

/* =============== popoup-three ===================== */

.christmas-popup-three-data {
	width:590px;
	height:320px;
	/*background:url(<?=base_url()?>images/images/bg-popup-one.png) repeat-x;*/
}

.christmas-popup-three-data .left-col {
	padding:25px 0 0 25px;
	float:left;
}

.christmas-popup-three-data .left-col .item-outer {
	padding:5px;
	background:#fff;
	width:224px;
}

.christmas-popup-three-data .left-col .item-thumbnail {
	width:224px;
	height:215px;
}

.christmas-popup-three-data .left-col .item-thumbnail img.thumbnail-image {
	margin:0px auto;
	width:100px;
	display:block;
	padding:30px 0 0 0;
}

.christmas-popup-three-data .left-col .item-thumbnail img.popup-separator {
	margin:0px auto;
	width:187px;
	display:block;
	padding:30px 0 0 0;
}

.christmas-popup-three-data .left-col .item-thumbnail .item-name {
	display:block;
	
	text-align:center;
	padding:10px 0 0 0;
	color:#333;
}

.christmas-popup-three-data .left-col .item-thumbnail .older-price {
	display:block;
	
	text-align:center;
	padding:10px 0 0 40px;
	color:#999;
	float:left;
	font-size:12px;
	text-decoration:line-through;
}

.christmas-popup-three-data .left-col .item-thumbnail .new-price {
	display:block;
	
	text-align:center;
	padding:5px 0 0 10px;
	color:#961d4b;
	float:left;
	font-weight:bold;
}

.christmas-popup-three-data .left-col .item-thumbnail .image-container {
	height:160px;
}

.christmas-popup-three-data .right-col {
	padding:19px 0 0 15px;
	float:left;
	width:290px;
	
}

.christmas-popup-three-data .right-col .heading-one {
	display:block;
	font-size:19px;
}

.christmas-popup-three-data .right-col .subtitle {
	color:#666;
}
.christmas-popup-three-data .right-col .line-three {
	display:block;
	font-size:16px;
	padding:10px 0 0 0;
}

.christmas-popup-three-data .right-col .line-four {
	display:block;
	font-size:16px;
	padding:10px 0 0 0;
}

.christmas-popup-three-data .right-col .thanks-line {
	font-size:19px;
}

.christmas-popup-three-data .right-col a.share-fb-btn {
}

.christmas-popup-three-data .right-col .form-content .field-name {
	display:block;
}

.christmas-popup-three-data .right-col .form-content .text-field {
	display:block;
	width:240px;
}

.christmas-popup-three-data .right-col .form-content form {
}

.christmas-popup-three-data .right-col .form-content .submit {
	background:#f5f5f5;
	border:1px solid #ccc;
	padding:5px 10px;
	color:#444;
	margin:10px 0 0 0;
}

.christmas-popup-three-data .right-col-separator {
	float:right;
	padding:10px 0 0 0;
}

.clear {
	clear:both;
}

.christmas-app-bottom-line {
	width:272px;
	float:right;
	
}
/* SHARE MENU */
#share
{ 
    padding:3px 0 0;
    width:53px; 
    margin-left: 680px;
    height:135px;
    margin-top: -100px;
    background:url(<?=base_url();?>/images/images/bg-sprite-24.png) no-repeat 0 -420px; z-index:30;
}
#share p { 
    position:absolute;
    bottom:19px;
    left:0;
    margin:0;
    width:100%;
    color:#520000;
    font:bold 10px/10px helvetica,sans-serif; 
    text-align:center;
    text-transform:uppercase;
    text-shadow:0 1px 1px #e56e69;
}
#share ul { margin-left:-32px; }
#share li { margin:0; display:block; }
#share a, #share span { position:relative; width:35px; height:36px; display:block; overflow:hidden; background:url(<?=base_url();?>images/images/bg-sprite.png) no-repeat 0 100px; }
#share a:hover { background:url(<?=base_url();?>images/images/bg-sprite.jpg) no-repeat 0 100px; text-decoration:none; }
#share span { position:absolute; top:0; left:0; }
#share .icon-bookmark, #share .icon-bookmark span { background-position:0 -72px; }
#share .icon-bookmark:hover, #share .icon-bookmark:hover span { background-position:-35px -72px; }
#share .icon-facebook, #share .icon-facebook span { background-position:0 0; }
#share .icon-facebook:hover, #share .icon-facebook:hover span { background-position:-35px 0; }
#share .icon-share, #share .icon-share span { height:35px; background-position:0 -108px; }
#share .icon-share:hover, #share .icon-share:hover span { height:35px; background-position:-35px -108px; }
#share .icon-twitter, #share .icon-twitter span { background-position:0 -36px; }
#share .icon-twitter:hover, #share .icon-twitter:hover span { background-position:-35px -36px; }
/* -- Share Form */
#share-form { width:500px;padding:20px; }
#share-form h1 { text-shadow:0 1px 1px #fff; -moz-text-shadow:0 1px 1px #fff; -webkit-text-shadow:0 1px 1px #fff; }
#share-form label { display:block;padding:4px 0px 4px 0px; }
#share-your-name { width:200px; }
#share-friends-emails { width:480px; }
#share-message { width:480px;height:170px; }
#share-submit { background-color:#fc0;margin-top:10px;}
#share-status {display:inline-block;margin-left:20px;}
#share-error {color:#f00;}
#share-notice { color:#0f0; }
.share-error { color:#f00;display:none;}

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

/* New CSS Copy from example page*/
.calendar-holder {
    
}

.calendar-holder ul {
    padding: 85px 0 14px 18px;
    width: 710px;
}
/*******/
.calendar-holder ul li {
    
    color: <?=$tempdata[1][10]['value'];?>;
    font-size:32px;
    display:block;
    font-weight:normal;
    width:101px;
    height:96px;
    float: left;
    list-style: none outside none;
    overflow: hidden;
    position: relative; 
}
.calendar-holder ul li a {
	color:<?=$tempdata[1][10]['value'];?>;
	text-decoration:none;
	
}
.calendar-holder ul li a.item-cell {
	background:url(<?=base_url()?>images/images/table-hover-green.png) 0px -395px no-repeat;
	width:101px;
	height:96px;
        display:block;
        text-align:center;
        line-height: 60px;
}
.calendar-holder ul li a.green {
	background:url(<?=base_url()?>images/images/table-items-bg-hover.png) 0px -395px no-repeat;
	width:101px;
	height:96px;
        display:block;
        text-align:center;
        line-height: 60px;
	
}
.calendar-holder ul li p.item-lebal {
	font-size:12px;
	margin:0px;
	padding:0px;
	color:#fff;
}

.calendar-holder ul li a.green:hover {
	background-position:0px 0px;
	
}

.calendar-holder ul li a.yallow {
	background:url(<?=base_url()?>images/images/table-items-bg-hover.png) 0px -395px no-repeat;
	width:101px;
	height:96px;
        display:block;
        text-align:center;
        line-height: 60px;
	
}

.calendar-holder ul li a.yallow:hover {
	background-position:0px -99px;
	
}

.calendar-holder ul li a.syaan {
	background:url(<?=base_url()?>images/images/table-items-bg-hover.png) 0px -395px no-repeat;
	width:101px;
	height:96px;
        display:block;
        text-align:center;
        line-height: 60px;
}
.calendar-holder ul li a.syaan:hover {
	background-position:0px -198px;
	
}
.calendar-holder ul li a.empty-cell {
	background:url(<?=base_url()?>images/images/table-items-bg-hover.png) 0px -395px no-repeat;
	width:101px;
	height:96px;
        display:block;
        text-align:center;
        line-height: 60px;
        
}
.calendar-holder ul li a.empty-cell:hover {
	background-position: 0px -298px;
}
/*******/
.wintable
{
    border:solid 1px #666666;
    width:850px !important;
}
.wintable th
{
    padding:10px 10px !important;
    width:115px !important;
    text-align:center;
    border:solid 1px #666666;
    font-weight:bold !important;
}
.wintable td
{
    padding:10px 10px !important;
    width:115px !important;
    text-align:center;
    border:solid 1px #666666;
}
</style>
