<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Error</title>
<link href="<?=  base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?=  base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="error-content-main">
    <div class="top-banner">
        <a href="#" class="error-logo"><img src="<?=  base_url()?>assets/images/error-logo.png" width="166" height="88" /></a>
    </div>
    <div class="alert alert-error" style="margin:10px;">
        <button class="close" data-dismiss="alert" type="button">×</button>
        <?=$errmsg;?> 
        <!--<a href='http://panel.cuecow.com/index.php/user/authmeida/auth/facebook'> Click to Re-authorize</a>-->
    </div>
</div><!-- error-content-main -->
</body>
</html>
