<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<?php $mode = (isset($_REQUEST['mode'])? $_REQUEST['mode'] : '');?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		
        <li><a href="#termscondition"><span>Edit Terms and Condition Page</span></a></li>
        <li><a href="#editthankyoupage"><span>Edit Thank You page</span></a></li>
        <li><a href="#thanks2Dialog"><span>Edit Vote Thank You Page</span></a></li>
        
    </ul>
<div id="edittemplate">    
    <div class="photo-competition-main-wrapper">
            <div class="photo-competition-top-slice">
        </div><!--- photo-competition-top-slice --->
        <div class="photo-competition-data-slice">
            <div class="photo-competition-data-container">
                    <div  style="position:absolute;margin-top:-37px;margin-left:680px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>">Change BG Color</a>
                    </div> 
                    <div  style="position:absolute;margin-top:10px;margin-left:661px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][5]['id'];?>&ftype=<?=$tempdata[1][5]['typeid'];?>">Change Color</a>
                    </div>
                    <div class="photo-competition-top-cnt">
                    <div  style="position:absolute;margin-top:-30px;margin-left:111px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change Text</a>
                    </div>
                    <h1><?=$tempdata[1][0]['value'];?></h1>
                    <div class="clear" style="padding:10px 0;"></div>
                    <div  style="position:absolute;margin-top:0px;margin-left:-66px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[1][6]['id'];?>&ftype=<?=$tempdata[1][6]['typeid'];?>&width=340&height=255">Change Image</a>
                    </div>
                    <div class="photo-competition-top-cnt-left">
                            <img src="<?=  base_url();?>images/340X255/<?=$tempdata[1][6]['value'];?>" width="308" height="230" />
                    </div><!--- photo-competition-top-cnt-left --->
                    <div class="photo-competition-top-cnt-right">
                            <div  style="position:absolute;margin-top:-17px;margin-left:89px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change Text</a>
                            </div>
                            <h4><?=$tempdata[1][1]['value'];?></h4>
                        <div  style="position:absolute;margin-top:-20px;margin-left:311px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][2]['id'];?>&ftype=<?=$tempdata[1][2]['typeid'];?>">Change Text</a>
                        </div>
                        <p><?=$tempdata[1][2]['value'];?></p>
                        <div  style="position:absolute;margin-top:-18px;margin-left:103px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][3]['id'];?>&ftype=<?=$tempdata[1][3]['typeid'];?>">Change Text</a>
                        </div>
                        <a href="#imguploaddiv" class="photo-competition-submit editdiv"><?=$tempdata[1][3]['value'];?></a>
                    </div><!--- photo-competition-top-cnt-right --->
                    <div class="clear"></div>
                </div><!--- photo-competition-top-cnt --->
                <div class="clear" style="padding:10px 0;"></div>
                <div class="photo-competition-middle-cnt">
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
                        <div style="padding-left:120px;padding-top:150px">
                            There is no records found agaist this query
                        </div>    
                        <?php }?>
                </div><!--- photo-competition-middle-cnt --->
                <div class="photo-competition-bottom-cnt">
                    <ul class="photo-competition-menu-list">
                        <li <?=($mode=="" ? 'class="active"' : '');?>><a href="<?=base_url();?>index.php/page/viewtemplate"><span style="margin: 0;padding: 0;">Latest</span></a></li>
                        <li <?=($mode=="pending" ? 'class="active"' : '');?>><a href="<?=base_url();?>index.php/page/viewtemplate?mode=pending"><span style="margin: 0;padding: 0;">Pending</span></a></li>
                        <li <?=($mode=="popular" ? 'class="active"' : '');?>><a href="<?=base_url();?>index.php/page/viewtemplate?mode=popular"><span style="margin: 0;padding: 0;">High Rated</span></a></li>
                        <li <?=($mode=="archive" ? 'class="active"' : '');?>><a href="<?=base_url();?>index.php/page/viewtemplate?mode=archive"><span style="margin: 0;padding: 0;">Archive</span></a></li>
                    </ul>
                    <div  style="position:absolute;margin-top:-24px;margin-left:-155px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Change Color</a>
                    </div>
                    <div  style="position:absolute;margin-top:-24px;margin-left:626px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][5]['id'];?>&ftype=<?=$tempdata[2][5]['typeid'];?>">Change Text</a>
                    </div>
                    <span class="photo-competition-trm-cndtion-text"><?=$tempdata[2][5]['value'];?></span>
                    <div class="clear"></div>
                </div><!--- photo-competition-bottom-cnt --->
                <div class="photo-competition-last-pera">
                    <div  style="position:absolute;margin-top:-1px;margin-left:-147px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>">Change Text</a>
                    </div>
                    <?=$tempdata[4][0]['value'];?>
                </div><!--- photo-competition-last-pera --->
            <div class="clear"></div>
            </div><!--- photo-competition-data-container --->
        </div><!--- photo-competition-main-data --->
        <div class="photo-competition-bottom-slice">
        </div><!--- photo-competition-bottom-slice --->
    </div><!--- photo-competition-main-wrapper --->
        <div id="imguploaddiv" style="display:none;" name="imguploaddiv">
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
    </div>
        <!--**********************************************-->
        <div style="clear:both"></div>
 </div>
    <div id="EditCompetitionOverPage"></div>
    <div id="termscondition">
        <div class="header">
             <div  style="position: absolute; margin-top: -6px; margin-left: -148px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change text</a>
             </div>
            <b><?=$tempdata[3][0]['value'];?></b><br><br>
        </div>
        <div class="header2">
            <div  style="position: absolute; margin-top: -13px; margin-left: -148px; " align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>">Change text</a>
            </div>
            <?=$tempdata[3][2]['value'];?>
        </div>            
    </div>
           <!--**********************************************--> 
<div id="editthankyoupage">
    <div class="photo-competition-main-wrapper">
    <div class="photo-competition-top-slice">
        </div><!--- photo-competition-top-slice --->
        <div class="photo-competition-data-slice">

            <div class="photo-competition-data-container">
                    <div  style="position:absolute;margin-top:-20px;margin-left:661px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][0]['id'];?>&ftype=<?=$tempdata[5][0]['typeid'];?>">Change Color</a>
                    </div>
                    <div class="photo-competition-top-cnt-thankyou">
                    <div  style="position:absolute;margin-top:-30px;margin-left:381px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][1]['id'];?>&ftype=<?=$tempdata[5][1]['typeid'];?>">Change Text</a>
                    </div>
                    <h1 align="center"><?=$tempdata[5][1]['value'];?></h1>
                    <div style="padding:10px 0;" class="clear"></div>
                    <div class="photo-competition-top-cnt-left">
                            <div  style="position: absolute; margin-top: -6px; margin-left: -90px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][7]['id'];?>&ftype=<?=$tempdata[5][7]['typeid'];?>">Change Image</a>
                            </div>
                            <img src="<?=base_url();?>images/images/<?=$tempdata[5][7]['value'];?>" width="306" height="348">
                    </div><!--- photo-competition-top-cnt-left --->
                    <div  style="position: absolute; margin-top: -6px; margin-left: 548px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][8]['id'];?>&ftype=<?=$tempdata[5][8]['typeid'];?>">Change text</a>
                    </div>
                    <div class="photo-competition-top-cnt-right">
                            <?=$tempdata[5][8]['value'];?>
                        <div  style="position: absolute; margin-top: -20px; margin-left: 348px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][9]['id'];?>&ftype=<?=$tempdata[5][9]['typeid'];?>">Change text</a>
                        </div>
                        <p style="height:120px;"><?=$tempdata[5][9]['value'];?></p>
                        <div  style="position: absolute; margin-top: -10px; margin-left: 148px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][10]['id'];?>&ftype=<?=$tempdata[5][10]['typeid'];?>">Change text</a>
                        </div>
                        <input type="submit" value="<?=$tempdata[5][10]['value'];?>" class="photo-competition-submit">
                        <ul class="thankyou-photo-competition-list">
                            <li><a href="#"><?=$tempdata[5][11]['value'];?></a></li>
                            <li><a href="#"><?=$tempdata[5][12]['value'];?></a></li>
                            <li><a href="#"><?=$tempdata[5][13]['value'];?></a></li>
                            <li><a href="#"><?=$tempdata[5][14]['value'];?></a></li>
                        </ul>
                    </div><!--- photo-competition-top-cnt-right --->
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div><!--- photo-competition-data-container --->
        </div><!--- photo-competition-main-data --->
        <div class="photo-competition-bottom-slice">
        </div><!--- photo-competition-bottom-slice --->
    </div><!--- photo-competition-main-wrapper --->
</div>
           
  <div class="dialog" id="thanks2Dialog">
        <div class="dialogTop"></div>
        <div class="dialogContent">
            <div class="header">
                <div  style="position: absolute; margin-top: -12px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][2]['id'];?>&ftype=<?=$tempdata[5][2]['typeid'];?>">Change text</a>
                </div>
                <?=$tempdata[5][2]['value'];?>                
            </div>
            <div class="header2">
                <div  style="position: absolute; margin-top: -8px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][3]['id'];?>&ftype=<?=$tempdata[5][3]['typeid'];?>">Change text</a>
                </div>
                <?=$tempdata[5][3]['value'];?>
            </div>
            <div style="height:40px"></div>
            <div class="header">
                <div  style="position: absolute; margin-top: -4px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][4]['id'];?>&ftype=<?=$tempdata[5][4]['typeid'];?>">Change text</a>
                </div>
                <?=$tempdata[5][4]['value'];?>
            </div>
        </div>
        <div class="dialogBottom"></div>
    </div><!-- #thanks2Dialog -->    
</div>  
