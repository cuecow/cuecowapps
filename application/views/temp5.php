<?php $this->load->view('styles/style'.$tempid,$tempdata,$tempbgclr);?>
<div class="static-temp-two-wrapper" style="margin-top:20px;">
        <div  style="position:absolute;margin-top:-21px;margin-left:700px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempid;?>&ftype=6">Change BG Color</a>
        </div> 
    <div class="static-temp-two-top-content" align="center">
        <div  style="position: absolute; margin-left: 700px; margin-top: 21px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change image</a> 
        </div>
        <div  style="position: absolute; margin-left: 700px; margin-top: 65px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change Link</a> 
        </div>
        <a href="<?=$tempdata[1][1]['value'];?>" target="_blank"><img src="<?=base_url();?>images/images/<?=$tempdata[1][0]['value'];?>" /></a>
    </div><!----- temp-two-top-content ----->
    <div style="clear:both; padding-top:10px;"></div>
    <div class="static-temp-two-left-content" align="right">
        <div  style="position: absolute; margin-top: 21px; margin-left: -54px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Change image</a> 
        </div>
        <div  style="position: absolute; margin-top: 65px; margin-left: -54px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][4]['id'];?>&ftype=<?=$tempdata[2][4]['typeid'];?>">Change Link</a> 
        </div>
        <a href="<?=$tempdata[2][4]['value'];?>" target="_blank"><img src="<?=base_url();?>images/images/<?=$tempdata[2][0]['value'];?>" /></a>
    </div><!----- static-temp-two-left-content ----->
    <div class="static-temp-two-right-content" align="left">
        <div  style="position: absolute; margin-top: 21px; margin-left: 300px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Change image</a>
        </div>
        <div  style="position: absolute; margin-top: 65px; margin-left: 300px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][5]['id'];?>&ftype=<?=$tempdata[2][5]['typeid'];?>">Change Link</a>
        </div>
        <a href="<?=$tempdata[2][5]['value'];?>" target="_blank"><img src="<?=base_url();?>images/images/<?=$tempdata[2][1]['value'];?>" /></a>
    </div><!----- static-temp-two-left-content ----->
    <div style="clear:both; padding-bottom:10px;"></div>
    <div class="static-temp-two-left-content" align="right">
        <div  style="position: absolute; margin-left: -54px; margin-top: 21px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][2]['id'];?>&ftype=<?=$tempdata[2][2]['typeid'];?>">Change image</a>
        </div>
        <div  style="position: absolute; margin-left: -54px; margin-top: 65px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][6]['id'];?>&ftype=<?=$tempdata[2][6]['typeid'];?>">Change Link</a>
        </div>
        <a href="<?=$tempdata[2][6]['value'];?>" target="_blank"><img src="<?=base_url();?>images/images/<?=$tempdata[2][2]['value'];?>"  /></a>
    </div><!----- static-temp-two-left-content ----->
    <div class="static-temp-two-right-content" align="left">
        <div  style="position: absolute; margin-top: 21px; margin-left: 300px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][3]['id'];?>&ftype=<?=$tempdata[2][3]['typeid'];?>">Change image</a>
        </div>
        <div  style="position: absolute; margin-top: 65px; margin-left: 300px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][7]['id'];?>&ftype=<?=$tempdata[2][7]['typeid'];?>">Change Link</a>
        </div>
        <a href="<?=$tempdata[2][7]['value'];?>" target="_blank"><img src="<?=base_url();?>images/images/<?=$tempdata[2][3]['value'];?>" /></a>
    </div><!----- static-temp-two-left-content ----->
    <div style="clear:both; padding-bottom:10px;"></div>
    <div class="static-temp-two-bottom-content">
        <div  style="position: absolute;margin-left: 700px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change color</a>
        </div>
        <div  style="position: absolute; margin-left: -61px; margin-top: -29px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Change text</a>
        </div>
        <div  style="position: absolute; margin-left: -61px; margin-top: 25px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][3]['id'];?>&ftype=<?=$tempdata[3][3]['typeid'];?>">Change Link</a>
        </div>
        <a href="<?=$tempdata[3][3]['value'];?>" target="_blank"><?=$tempdata[3][1]['value'];?></a>
        <div  style="position: absolute; margin-top: -51px; margin-left: 131px;" align="center" class="tempeditpng">
            <a  class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>">Change text</a>
        </div>
        <div  style="position: absolute; margin-top: 0px; margin-left: 131px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][4]['id'];?>&ftype=<?=$tempdata[3][4]['typeid'];?>">Change Link</a>
        </div>
        <a href="<?=$tempdata[3][4]['value'];?>" target="_blank"><?=$tempdata[3][2]['value'];?></a>            
    </div><!----- static-temp-two-bottom-content ----->
    <div style="padding-bottom:10px"></div>
</div><!----- temp-two-wrapper ----->
<div style="clear: both;"></div>