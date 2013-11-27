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
	margin:30px auto 0px;
        background-color:<?=$tempdata[0][0]['value'];?>;
}

.text-field {
	display:block;
	background:#fff;
	border:1px solid #999;
	color:#666;
	padding:5px 10px;
	width:250px;
	margin:0px 0px 15px 0;
}
</style>