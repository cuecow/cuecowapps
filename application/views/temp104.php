<?php $this->load->view('styles/style'.$tempid,$tempdata);?>

<div class="main-wrapper">
    <div  style="position:absolute;margin-top:-15px;margin-left:680px;" align="center" class="tempeditpng">
        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change BG Color</a>
    </div> 
    <form id="frm" name="frm" method="post" action="<?=base_url();?>index.php/page/save_iframeurl"> 
    <div>
        <input style="margin-top: 8px;" type="text" name="iframe_url" value="<?=$tempdata[1][0]['value'];?>" />
        <input type="hidden" name="urlid" id="urlid" value="<?=$tempdata[1][0]['id'];?>" />
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
        <div><h4  style="float:left; margin-top: 8px; margin-right:7px;">Notice:</h4><h6  style="float:left">The page will be put in an iframe with width 850</h6></div>    
        <div class="clear"></div>
        <div><h6 style="float:left;">Iframe accept only Complete url like</h6><h4 style="float:left; margin-top: 8px; margin-left: 4px; margin-right: 4px;">http://www.example.com</h4><h6 style="float:left;">instead of </h6><h4 style="float:left; margin-top: 8px; margin-left: 4px; margin-right: 4px;">www.example.com OR example.com</h4></div>
    </form>    
    <?php if($tempdata[1][0]['value']!="iframe url") { 
            $ifmameurl=$tempdata[1][0]['value'];
            list($ssl,$ssl2)=  explode('//', $ifmameurl);
            $iframurl="http://".$ssl2;
        ?>
        <iframe src="<?=$iframurl;?>" width="808" height="650"></iframe>
  <?php } ?>
</div>