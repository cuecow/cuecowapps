<?php
$this->load->view('styles/style'.$tempid,$tempdata);?>
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<?php $mode = (isset($_REQUEST['mode'])? $_REQUEST['mode'] : '');?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		
        <li><a href="#editthankyoupage"><span>Thank you page</span></a></li>
        <li><a href="#termscondition"><span>Terms and Condition</span></a></li>        
    </ul>
    <div id="edittemplate">
        <div  style="position:absolute;margin-top:-18px;margin-left:30px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change Color</a>
        </div>
        <!--********************************************-->
        <div class="gallery-app-main-wrapper">
            <div class="gallery-app-sun-image">
                <div  style="position: absolute; margin-top: 10px; margin-left: 107px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>">Change image</a>
                </div>
            </div>
            <div class="gallery-app-inner-container">                
                <div class="gallery-app-inner-container-top-slice"></div>
                <div class="gallery-app-inner-container-data">
                    <div class="gallery-app-logo">
                        <div  style="position: absolute; margin-left: 261px; margin-top: 0px;;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change image</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="gallery-app-main-col">
                        <div class="gallery-app-left-col">
                            <div style="width:179px; margin:0px auto;">
                                <div  style="position: absolute; margin-left: -75px; margin-top: 15px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][2]['id'];?>&ftype=<?=$tempdata[1][2]['typeid'];?>">Change image</a>
                                </div>
                                <img src="<?=base_url()?>images/images/<?=$tempdata[1][2]['value'];?>" width="179" />
                            </div>
                        </div>
                        <div class="gallery-app-right-col">
                            <div  style="position: absolute; margin-left: 177px; margin-top: 0px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change text</a>
                            </div>
                            <h3 class="gallery-app-right-col-heading"><?=$tempdata[1][1]['value'];?></h3>
                            <div  style="position: absolute; margin-top: 0px; margin-left: 351px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][3]['id'];?>&ftype=<?=$tempdata[1][3]['typeid'];?>">Change text</a>
                            </div>
                            <p class="gallery-app-right-col-data"><?=$tempdata[1][3]['value'];?></p>
                            <div  style="position: absolute; margin-top: 17px; margin-left: 135px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][4]['id'];?>&ftype=<?=$tempdata[1][4]['typeid'];?>">Change text</a>
                            </div>
                            <a href="#imguploaddiv" class="gallery-app-anchor-button editdiv"><?=$tempdata[1][4]['value'];?></a>
                        </div><!--- gallery-app-right-col --->
                    </div>
                    <div class="clear"></div>
                    <div class="separator-line" style="width:780px; height:1px; background:#eee; margin:10px auto;"></div>
                    <div class="nav">
                        <ul id="menu" class="menu">
                            <li <?=($mode=="" ? 'class="active"' : '');?>><a href="<?=base_url();?>index.php/page/viewtemplate"><span style="margin: 0;padding: 0;">Latest</span></a></li>
                            <li <?=($mode=="pending" ? 'class="active"' : '');?>><a href="<?=base_url();?>index.php/page/viewtemplate?mode=pending"><span style="margin: 0;padding: 0;">Pending</span></a></li>
                            <li <?=($mode=="popular" ? 'class="active"' : '');?>><a href="<?=base_url();?>index.php/page/viewtemplate?mode=popular"><span style="margin: 0;padding: 0;">High Rated</span></a></li>
                            <li <?=($mode=="archive" ? 'class="active"' : '');?>><a href="<?=base_url();?>index.php/page/viewtemplate?mode=archive"><span style="margin: 0;padding: 0;">Archive</span></a></li>
                        </ul><!-- .menu -->
                    </div><!-- .nav -->
                    <div class="clear"></div>
                    <div class="gallery-app-bottom-content">
                        <?php 
                        if(count($pictures)>0){
                        foreach($pictures as $pics){?>
                        <div class="gallery-aap-thumnails-details">
                            <div class="gallery-aap-thumnails-details-image">
                                <img src="<?=base_url()?>images/images/galleryimages/<?=$pics['picdata']['picture'];?>" width="160" height="160" />
                            </div>
                            <div class="gallery-aap-thumnails-details-description-list">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td><strong>Name:</strong></td><td><?=$pics['picdata']['name'];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email:</strong></td><td><?=$pics['picdata']['email'];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Age:</strong></td><td><?=$pics['picdata']['age'];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vote:</strong></td><td><?=$pics['votes'];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Text:</strong></td><td><?=$pics['picdata']['imgtxt'];?></td>
                                    </tr>
                                </table>
                            </div><!--- gallery-aap-thumnails-details-description-list --->
                            <div class="gallery-aap-thumnails-details-buttons">
                                <?php if($mode=="pending"){?>
                                <a href="<?=base_url();?>index.php/page/galleryapp_pactions?id=<?=$pics['picdata']['id'];?>&action=do&mode=<?=$mode;?>" class="Aprove-btn"><img src="<?=base_url();?>images/images/tick-btntemp8.png" width="24" /></a>
                                <?php }?>
                                <div class="clear" style="padding:5px 0;"></div>
                                <a onclick=" return confirm('Are you sure you want to delete this image?');" href="<?=base_url();?>index.php/page/galleryapp_pactions?id=<?=$pics['picdata']['id'];?>&action=dell&mode=<?=$mode;?>&picture=<?=base64_encode($pics['picdata']['picture']);?>" class="delete-btn"><img src="<?=base_url();?>images/images/cross-btntemp8.png" width="24" /></a>
                            </div><!--- gallery-aap-thumnails-details-buttons --->
                            
                        </div><!--- gallery-aap-thumnails-details --->
                        <div class="clear" style="padding-top: 15px;"></div>
                        <?php }}else{?>
                        <div style="padding-left:250px;padding-top:80px">
                            There is no records found agaist this query
                        </div>    
                        <?php }?>
                    </div><!--- gallery-app-bottom-content --->
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
                <div class="gallery-app-inner-container-bottom-slice"></div>
                <div class="clear"></div>
            </div><!--- gallery-app-inner-container --->
            <div class="clear"></div>
        </div><!--- main-wrapper --->
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
                    <td align="right">E-mail: </td>
                    <td width="10"></td>
                    <td><input type="text" maxlength="255" value="" name="email" id="inputEmail"></td>
                </tr>
                <tr><td height="10"></td></tr>
                <tr>
                    <td align="right">Age:</td>
                    <td width="10"></td>
                    <td><input type="text" maxlength="255" value="" name="age" id="inputAge"></td>
                </tr>
                <tr><td height="10"></td></tr>
                <tr>
                    <td align="right">Select Image:</td>
                    <td width="10"></td>
                    <td><input type="file" name="imgfile"></td>
                </tr>
                <tr><td height="10"></td></tr>
                <tr>
                    <td align="right">Add text:</td>
                    <td width="10"></td>
                    <td><textarea name="text" id="inputText"></textarea></td>
                </tr>
                <tr><td height="10"></td></tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" value="Submit" /></td>
                </tr>
        </table>
        </form>
        </div><!--imguploaddiv-->
        <!--**********************************************-->
    </div>    
    <div id="editthankyoupage">
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
    </div>
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
</div>