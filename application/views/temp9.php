<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<?php $mode = (isset($_REQUEST['mode'])? $_REQUEST['mode'] : '');?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>
        <li><a href="#termscondition"><span>Terms and Condition</span></a></li>
        <li><a href="#thanks2Dialog"><span>Edit Vote setting Page</span></a></li>        
    </ul>
    <div id="edittemplate">
        <div  style="position:absolute;margin-top:-34px;margin-left:30px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change Color</a>
        </div>
        <!--********************************************-->
        <div class="gallery-app-main-wrapper">
            <div class="gallery-app-inner-container">                                
                <div class="gallery-app-inner-container-data">
                    <div  style="position:absolute;margin-top:-41px;margin-left:680px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][2]['id'];?>&ftype=<?=$tempdata[0][2]['typeid'];?>">Change BG Color</a>
                    </div> 
                    <div class="gallery-app-logo" align="center"><img src="<?=base_url()?>images/872X374/<?=$tempdata[1][0]['value'];?>"/>
                        <div  style="position: absolute; margin-left: 52px; margin-top: -60px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>&width=872&height=374">Change image</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="gallery-app-main-col">
                        <div class="gallery-app-right-col">
                            <div  style="position: absolute; margin-left: -67px; margin-top: 6px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change text</a>
                            </div>
                            <h3 class="gallery-app-right-col-heading"><?=$tempdata[1][1]['value'];?></h3>
                            <div  style="position: absolute; margin-top: 0px; margin-left: 650px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][3]['id'];?>&ftype=<?=$tempdata[1][3]['typeid'];?>">Change text</a>
                            </div>
                            <div class="gallery-app-right-col-data"><?=$tempdata[1][3]['value'];?></div>
                            <!--<p class="gallery-app-right-col-data"><?=$tempdata[1][3]['value'];?></p>-->
                            <a href="#imguploaddiv" class="gallery-app-anchor-button editdiv"><?=$tempdata[1][4]['value'];?></a>
                        </div><!--- gallery-app-right-col --->
                    </div>
                    <div class="clear"></div>
                    <!------------------------------------------------>
                    <div id="content" class="content" align="center">
                        <ul id="submits" class="submits">
                            <?php 
                            if(count($pictures)>0){
                            $p=1;
                            foreach($pictures as $pics){
                            $p=$p++;
                            ?>
                            <li id="submit-<?=$pics['picdata']['id'];?>" class="submitPosition-<?=$p;?>" style="z-index: auto;">
                                <div class="preview">
                                    <!--<div class="votes" id="votes<?=$pics['picdata']['id'];?>"><div><?=$pics['votes'];?></div></div>-->
                                    <a onclick="vote( <?=$pics['picdata']['id'];?> ); return false;" href="#" ><img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picdata']['picture'];?>" class="image" border="0" style="border:none;"></a>
                                    <!--<a onclick="showViewDialog( <?=$pics['picdata']['id'];?> ); return false;" href="#"><img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picdata']['picture'];?>" class="image"></a>-->
                                </div>
                                <div style="clear:both;"></div>
                                <div align="center" title="Delete this picture" ><a onclick=" return confirm('Are you sure you want to delete this image?');" href="<?=base_url();?>index.php/page/galleryapp_pactions?id=<?=$pics['picdata']['id'];?>&action=dell&mode=<?=$mode;?>&picture=<?=base64_encode($pics['picdata']['picture']);?>" class="delete-btn"><img src="<?=base_url();?>images/images/cross-btntemp8.png" width="24" /></a></div>
                            </li>
                            <?php }}else{?>
                            <div style="height:100px;">
                                There is no picture found against this competition.
                            </div>    
                            <?php }?>
                        </ul><!-- .submits -->
                        <div  style="position: absolute; margin-left: -25px; margin-top: 38px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Change text</a>
                        </div>
                        <br><br>
                        <p class="gallery-app-right-col-data" align="center"><?=$tempdata[2][0]['value'];?></p>
                        <br><br>
                    </div>
                    <div id="imguploaddiv" style="display:none;">
                        <form action="<?=base_url();?>index.php/page/galleryapp_adminpicupload/" enctype="multipart/form-data" method="post">
                        <table border="0">
                            <tr>
                                <td align="right">Name: </td>
                                <td width="10"></td>
                                <td><input type="text" maxlength="255" value="" name="name" id="inputName"></td>
                            </tr>
                            <tr><td height="10"></td></tr>
                            <tr>
                                <td align="right">Select Image:<br>
                                    <span style='margin:0 25px 0 0;font-size:12px'>160 x160 </span>
                                </td>
                                <td width="10"></td>
                                <td><input type="file" name="imgfile"></td>
                            </tr>
                            <tr><td height="10"></td></tr>
                            <tr>
                                <td colspan="3" align="center"><input type="submit" value="Submit" /></td>
                            </tr>
                        </table>
                        </form>
                    </div><!--imguploaddiv-->
                    <!------------------------------------------------>
                    <div class="clear" style=" margin:5px 0;"></div>                    
                    <div class="clear"></div>
                    <div class="separator-line" style="width:780px; height:1px; background:#eee; margin:10px auto;"></div>
                        <div class="gallery-app-footer-data">
                            <div style="float:left; font-size:12px; color:#666;"><?=$tempdata[3][0]['value'];?>
                                <div  style="position: absolute; margin-left: 0px; margin-top: 0px;;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change text</a>
                                </div>
                            </div>
                            <div style="float:right; font-size:12px; color:#666;"><?=$tempdata[3][1]['value'];?>
                                <div  style="position: absolute; margin-left: 0px; margin-top: 0px;;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Change text</a>
                                </div>
                            </div>
                        </div>	
                    <div class="clear"></div>
                </div><!--- gallery-app-inner-container-middle-main --->                
                <div class="clear"></div>
            </div><!--- gallery-app-inner-container --->
            <div class="clear"></div>
        </div><!--- main-wrapper --->
        <!--**********************************************-->
    </div>    
    <!--<div id="editthankyoupage">
        <div class="header">
             <div  style="position: absolute; margin-top: -6px; margin-left: 350px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][0]['id'];?>&ftype=<?=$tempdata[5][0]['typeid'];?>">Change text</a>
             </div>
            <b><?=$tempdata[5][0]['value'];?></b >
        </div>
        <div class="header2">
            <div  style="position: absolute; margin-left: 212px; margin-top: 30px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][1]['id'];?>&ftype=<?=$tempdata[5][1]['typeid'];?>">Change text</a>
            </div>
            <?=$tempdata[5][1]['value'];?>
        </div>            
    </div>-->
    <div id="termscondition">
        <div class="header">
             <div  style="position: absolute; margin-top: -6px; margin-left: 350px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>">Change text</a>
             </div>
            <b><?=$tempdata[4][0]['value'];?></b ><br><br>
        </div>
        <div class="header2">
            <div  style="position: absolute; margin-left: 730px; margin-top: 30px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][2]['id'];?>&ftype=<?=$tempdata[4][2]['typeid'];?>">Change text</a>
            </div>
            <?=$tempdata[4][2]['value'];?>
        </div>            
    </div>
  <div id="thanks2Dialog">
            <div class="header">
                <div  style="position: absolute; margin-top: -12px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][3]['id'];?>&ftype=<?=$tempdata[5][3]['typeid'];?>">Change text</a>
                </div>
                <?=$tempdata[5][3]['value'];?>                
            </div>
            <div class="header2">
                <div  style="position: absolute; margin-top: 1px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][4]['id'];?>&ftype=<?=$tempdata[5][4]['typeid'];?>">Change text</a>
                </div>
                <?=$tempdata[5][4]['value'];?>
            </div>
            <div style="height:40px"></div>
            <div class="header">
                <div  style="position: absolute; margin-top: -4px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][2]['id'];?>&ftype=<?=$tempdata[5][2]['typeid'];?>">Change text</a>
                </div>
                <?=$tempdata[5][2]['value'];?>
            </div>
    </div><!-- #thanks2Dialog -->
</div>