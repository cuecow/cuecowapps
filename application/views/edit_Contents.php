<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html lang="en" class="csstransforms no-csstransforms3d csstransitions js cssanimations csstransitions">

<head>
    <title>Edit Content Text - Cuecow - the social media engagement platform</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="http://cuecow.com/favicon.ico" type="image/x-icon" rel="icon" />
    <link href="http://cuecow.com/favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <!--link rel="stylesheet" media="all" type="text/css" href="css/smoothness-jquery-ui.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" /
    <link href="https://panel.cuecow.com/css/main.css" rel="stylesheet" type="text/css" />-->
    
    <link rel="stylesheet" media="all" type="text/css" href="https://panel.cuecow.com/css/extra.css" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Economica:700,400italic">
</head>
<div class="container">
	<div id="content">
		
<div class="container container-top">
	<div class="row-fluid"  style="width:100% !important">    
    
				
        <div class="span6">
    		<div class="accordion" id="accordion1">
            	<div class="accordion-group">        	
                	<div id="collapseOne" class="accordion-body collapse in">
                    	<div class="accordion-inner">
                        
							<form class="styled" id="content-form" action="<?=base_url();?>index.php/page/update_contentMgr" method="post">                            
                            							
									<div class="field-content-44">
										<div class="login_field-content-44-left login"><label>Content Id:</label></div>
										<div class="login_field-content-44-right left-content-fld">
											<input class="small textbox" value="<?=$content_mgrdata[0][0]['content_id'];?>" style="width:300px;" name="content_term_id" id="content_term_id" type="text" maxlength="100" /></div>
									</div>
									
									<div class="clearfix"></div>
								 <?php for($k=0;$k<count($content_mgrdata[0]);$k++){ ?>   
									 <div class="field-content-44">
										<div class="login_field-content-44-left login">
												<label>Text in <?=$content_mgrdata[0][$k]['language'];?>:</label>
										</div>
										<div class="login_field-content-44-right left-content-fld">
												<textarea class="small textbox" name="content_text_<?=$k;?>" style="width:300px; height:100px;"><?=$content_mgrdata[0][$k]['content_txt'];?></textarea>
										</div>
									</div>
									<input value="<?=$content_mgrdata[0][$k]['id'];?>" name="cont_auto_id_<?=$k;?>" id="cont_auto_id_<?=$k;?>" type="hidden" />
									  <div class="clearfix"></div>
								<?php } ?>        
									  
																
									<div class="field-content-44">
										<div class="login_field-content-44-left login">&nbsp;</div>
										<div class="login_field-content-44-right left-content-fld">
											<input type="submit" value="Submit" style="margin-right: 53px; float:right;margin-top: 10px;" class="btn"/>
											<input value="<?=$content_mgrdata[0][0]['cont_id'];?>" name="cont_id" id="cont_id" type="hidden" /> 
											
											</div>
									</div>    
									<div class="clearfix"></div>
                            
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
        
		            	
</div>


<script>

function SubmitURL(url)
{
	var answer = confirm("Are you sure, you want to delete this record?")
	
	if (answer)
		window.location.href = url;
}

</script>	</div><!-- content -->
</div>