
<style> 
    
@charset "utf-8";
/* CSS Document */

    body {
        
    }    
    
.contact-me-app {
}

.contact-me-app-main-content {
	width:755px;
        background-color:<?=$tempbgclr[0]['temp_bgcolor'];?>;
	padding:20px;
	border:1px solid #ccc;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	-o-border-radius:3px;
	
}

form.contact-me-app-form {
	width:650px;
	margin:20px 0 0 0;
}

.contact-me-app-field-set {
	margin:10px 0 0 0;
}

.contact-me-app-field-set label {
	display:block;
	font-size:15px;
	font-weight:bold;
	color:#333;
	float:left;
	width:130px;
	padding:10px 0 0 0;
}

.contact-me-app-field-set input {
	display:block;
	border:1px solid #ccc;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	-o-border-radius:3px;
	padding:3px 3px;
	font-size:14px;
	color:#666;
	width:260px;
	margin:2px 0 0 0;
	float:left;
	height:30px;
}

.admin-form-cnt label {
	display:block;
	font-size:15px;
	font-weight:bold;
	color:#333;
	padding:10px 0 0 0;
}

.admin-form-cnt input {
	display:block;
	border:1px solid #ccc;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	-o-border-radius:3px;
	padding:3px 3px;
	font-size:14px;
	color:#666;
	width:320px;
	margin:7px 0 0 0;
	height:30px;
}

.contact-me-app-field-set textarea {
	display:block;
	border:1px solid #ccc;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	-o-border-radius:3px;
	padding:5px 3px;
	font-size:12px;
	color:#666;
	width:511px;
	margin:2px 0 0 0;
	resize: none;
	height:100px;
}

.send-message-btn {
	background:url(<?=  base_url();?>images/images/contact_me_send-btn.png) no-repeat;
	width:149px;
	height:36px;
	display:block;
	border:none;
	font-size:14px;
	font-weight:bold;
	color:#333;
	cursor:pointer;
	float:right;
	margin:5px 0 0 0;
}

.send-message-btn:hover {
	opacity:0.8;
	-moz-transition: all 500ms ease-in;
	-webkit-transition: all 500ms ease-in;
}

h2.contact-me-app-title {
	display:block;
	width:100%;
	border-bottom:1px solid #ccc;
	color:#333;
	padding:10px 0;
}

.admin-form-cnt {
        width:770px;
        margin:0px auto;
        position:relative;
}


.admin-form-cnt h3 {
	color:#333;
	margin:0px;
}

.admin-form-cnt p {
	color:#666;
	font-size:14px;
}

.overlay-content-one {
    position: absolute;
    top: 52px;
    width:400px;
}

.overlay-content-one h1 {
    font-size: 58px;
    color:#000;
    line-height: 73px;
}

.overlay-content-one p {
    font-size: 29px;
    color:#666;
    font-weight:bold;
    padding:0;
    line-height:40px;
}
</style>
