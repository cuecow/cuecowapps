<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		
        <li><a href="#editthankyoupage"><span>Edit Thank You page</span></a></li>
    </ul>
    <div id="edittemplate">
        <div  style="position:absolute;margin-top:-38px;margin-left:680px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change BG Color</a>
        </div> 
        <div  style="position:absolute;margin-top:-18px;margin-left:525px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change Images</a>
        </div>
        <div class="temp-s7-wrapper">
            <div class="temp-s7-upper-content">
                <div  style="position:absolute;margin-top:41px;margin-left:374px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Change text</a>
                </div>
                <h4 class="temp-s7-heading"><?=$tempdata[2][0]['value'];?></h4>
                <p class="temp-s7-pera"><?=$tempdata[2][1]['value'];?>
                <div  style="position:absolute;margin-top:-200px;margin-left:656px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Change text</a>
                </div>
                </p>
            </div><!--- temp-s7-upper-content --->
            <form action="#" method="get">
            <div class="temp-s7-fileds">
                <div class="temp-s7-label">
                    <div style="position:absolute;margin-top:-6px;margin-left:50px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change text</a>
                    </div>
                    <label><?=$tempdata[1][0]['value'];?>:</label></div>
                <div class="temp-s7-text-fields"><input type="text" name="name" value="" /></div>
                <div style="clear:both; height:30px;"></div>
                <div class="temp-s7-label">
                    <div style="position:absolute;margin-top:-6px;margin-left:50px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change text</a>
                    </div>
                    <label><?=$tempdata[1][1]['value'];?>:</label></div>
                <div class="temp-s7-text-fields"><input type="text" name="emain" value="" /></div>
                <div style="clear:both"></div>
                <div class="temp-s7-submit"><input type="submit" value="Submit" name="submit" /></div>
            </div>
            <div style="clear:both"></div>
            <div style="margin-top: 30px;margin-left:30px;">
                <div style="position:absolute;margin-top:-6px;margin-left:304px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][2]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change URL</a>
                </div>
                <h2>Action URL: <?=$tempdata[1][2]['value'];?></h2>
            </div>
            </form>
            <div style="clear:both"></div>
            
        </div>
    </div>    
    <div id="editthankyoupage">
        <div  style="position:absolute;margin-top:-15px;margin-left:0px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>&tselect=1">Change color</a>
        </div>	
        <div id="temp-s7-thanks2-container">
            <!--Content Div -->
            <div id="temp-s7-thanks2"> 
                <div  style="position: absolute; margin-top: -25px; margin-left: 600px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>&tselect=1">Edit bgcolor</a>
                </div>
                <!--head porition -->
                <div class="temp-s7-title-div-thanks2">
                    <?=$tempdata[3][2]['value'];?>
                </div><!--- thnk-title-div ---->
                <div  style="position: absolute; margin-top: -35px; margin-left: 600px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>&tselect=1">Edit Text</a>
                </div>
                <div class="temp-s7-mdl-img-cnt-thanks2">
                    <div  style="position: absolute; margin-top: 0px; margin-left: 600px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][3]['id'];?>&ftype=<?=$tempdata[3][3]['typeid'];?>&tselect=1">Change Image</a>
                    </div>
                    <img src="<?=base_url();?>images/images/<?=$tempdata[3][3]['value'];?>" width="740">
                </div><!---- midle image content ---->
            </div><!--End Content Div -->	
        </div>
    </div>	
</div>