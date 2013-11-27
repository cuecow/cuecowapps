
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
    
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Economica:700,400italic">
</head>



<body >
<div class="clearfix"></div>



<input type="hidden" name="mypagename" id="mypagename" value="Edit Content Text" />
<div class="clear"></div>

		
<div class="container container-top">
	<div class="row-fluid" style="width:100% !important">    
    
		                            
		<div style="margin-left:25px; float:right; padding-bottom:50px;">
                                
        	<a href="https://apps2.cuecow.com/index.php/page/clear_cache"><button class="btn btn-info" type="button">Clear Content Cache</button></a>
            
		</div>
                            
        		
        <form name="frm" method="post" action="https://apps2.cuecow.com/index.php/page/Search_content_mgr">
        <table class="table" style="border:none; width:40%;">
        	<tr>
            	<td style="border:none; width:5%">Search: </td>
                <td style="border:none; width:15%;">
                	<input type="text" name="searchqry" autocomplete="off" value="" />
				</td>
                <td style="border:none; width:10%;">
                	&nbsp;&nbsp; <input type="submit" name="search" value="search" class="btn" />
				</td>
            </tr>
        </table>
        </form>
        
                    
            <table class="table table-striped">
            <thead> 
            <tr> 
                <th width="7%"  style="border-top: 0px !important;"><strong>S. No</strong></th> 
                <th width="10%"  style="border-top: 0px !important;"><strong>Content Id</strong></th> 
                <th width="6%"  style="border-top: 0px !important;"><strong>Language</strong></th>
                <th width="67%"  style="border-top: 0px !important;"><strong>Text</strong></th>
                <th width="10%"  style="border-top: 0px !important;"><strong>Action</strong></th>
            </tr> 
            </thead> 
            <tbody>
           <?php for($k=0;$k<count($content_mgrdata[0]);$k++) {?>     
			<tr> 
                <td align="center"><?=$k+1;?></td> 
                <td><?=$content_mgrdata[0][$k]['content_id'];?></td> 
                <td><?=$content_mgrdata[0][$k]['language'];?></td> 
                <td><?=$content_mgrdata[0][$k]['content_txt'];?></td> 
                <td align="center">
                    <a class="icon-button edit" href="https://apps2.cuecow.com/index.php/page/edit_contents?contentid=<?=$content_mgrdata[0][$k]['id'];?>" title="Edit Record"><i class="icon-edit"></i></a>
                    <!--<a class="icon-button delete" href="javascript:SubmitURL('https://apps2.cuecow.com/index.php/page/delete_content?contentid=<?=$content_mgrdata[0][$k]['cont_id'];?>');" title="Delete Record"><i class="icon-trash"></i></a>-->
                </td>
            </tr>
            <?php } ?>                   
            </tbody> 
            </table>
            
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


<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->

