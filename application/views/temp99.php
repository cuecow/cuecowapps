<?php $this->load->view('styles/style'.$tempid,$tempdata);?>

<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>
        <li><a href="#admin-form-cnt"><span>Edit Admin Email</span></a></li>
        <li><a href="#thankyoudiv"><span>Edit Thank you</span></a></li>
    </ul>
<div id="edittemplate">
    <div class="contact-me-app-main-content">
        <div  style="position:absolute;margin-top:-41px;margin-left:680px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change BG Color</a>
        </div> 
        <h2 class="contact-me-app-title">
                <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][15]['id'];?>&ftype=<?=$tempdata[0][15]['typeid'];?>">Change Text</a>
                </div>
                <label><?=$tempdata[0][15]['value'];?></label>            
        </h2>
        <form method="get" class="contact-me-app-form">
            <div class="admin-form-cnt">
                <div  style="position: absolute; margin-top: -9px; margin-left: 648px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][14]['id'];?>&ftype=<?=$tempdata[0][14]['typeid'];?>">Change Image</a>
                </div>
                <img src="<?=  base_url();?>images/images/<?=$tempdata[0][14]['value'];?>" width="770" height="500">
                <div class="overlay-content-one">
                    <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][16]['id'];?>&ftype=<?=$tempdata[0][16]['typeid'];?>">Change Text</a>
                    </div>
                    <h1><?=$tempdata[0][16]['value'];?></h1>
                    <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][17]['id'];?>&ftype=<?=$tempdata[0][17]['typeid'];?>">Change Text</a>
                    </div>
                    <p><?=$tempdata[0][17]['value'];?></p>
                </div>
              </div><!--- admin-form-cnt --->
            <div class="contact-me-app-field-set">
                <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][2]['id'];?>&ftype=<?=$tempdata[0][2]['typeid'];?>">Change Text</a>
                </div>
                <label><?=$tempdata[0][2]['value'];?></label>
                <div  style="position: absolute; margin-top: -9px; margin-left: 284px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>">Change Text</a>
                </div>
                <input type="text" class="adress-two-fld-space" value="<?=$tempdata[0][1]['value'];?>" name="name" onBlur="if(this.value==''){this.value='<?=$tempdata[0][1]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[0][1]['value'];?>'){this.value=''}"/>
            </div><!--- mysetting-field-set --->
            <div style="clear:both"></div>
            <div class="contact-me-app-field-set">
                <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][4]['id'];?>&ftype=<?=$tempdata[0][4]['typeid'];?>">Change Text</a>
                </div>
                <label><?=$tempdata[0][4]['value'];?></label>
                <div  style="position: absolute; margin-top: -9px; margin-left: 284px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][3]['id'];?>&ftype=<?=$tempdata[0][3]['typeid'];?>">Change Text</a>
                </div>
                <input type="text" class="adress-two-fld-space" value="<?=$tempdata[0][3]['value'];?>" name="email" onBlur="if(this.value==''){this.value='<?=$tempdata[0][3]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[0][3]['value'];?>'){this.value=''}"/>
            </div><!--- mysetting-field-set --->
            <div style="clear:both"></div>
            <div class="contact-me-app-field-set">
                <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][6]['id'];?>&ftype=<?=$tempdata[0][6]['typeid'];?>">Change Text</a>
                </div>
                <label><?=$tempdata[0][6]['value'];?></label>
                <div  style="position: absolute; margin-top: -9px; margin-left: 284px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][5]['id'];?>&ftype=<?=$tempdata[0][5]['typeid'];?>">Change Text</a>
                </div>
                <input type="text" class="adress-two-fld-space" value="<?=$tempdata[0][5]['value'];?>" name="phone" onBlur="if(this.value==''){this.value='<?=$tempdata[0][5]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[0][5]['value'];?>'){this.value=''}"/>
            </div><!--- mysetting-field-set --->
            <div style="clear:both"></div>
            <div class="contact-me-app-field-set">
                <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][13]['id'];?>&ftype=<?=$tempdata[0][13]['typeid'];?>">Change Text</a>
                </div>
                <label><?=$tempdata[0][13]['value'];?></label>
                <div  style="position: absolute; margin-top: -9px; margin-left: 284px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][12]['id'];?>&ftype=<?=$tempdata[0][12]['typeid'];?>">Change Text</a>
                </div>
                <input type="text" class="adress-two-fld-space" value="<?=$tempdata[0][12]['value'];?>" name="phone" onBlur="if(this.value==''){this.value='<?=$tempdata[0][12]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[0][12]['value'];?>'){this.value=''}"/>
            </div><!--- mysetting-field-set --->
            <div style="clear:both"></div>

            <div class="contact-me-app-field-set">
                <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][8]['id'];?>&ftype=<?=$tempdata[0][8]['typeid'];?>">Change Text</a>
                </div>
                <label><?=$tempdata[0][8]['value'];?></label>
                <textarea></textarea>
            </div><!--- mysetting-field-set --->
                <div  style="position: absolute; margin-top: -9px; margin-left: 635px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][9]['id'];?>&ftype=<?=$tempdata[0][9]['typeid'];?>">Change Text</a>
                </div>
                <input type="submit" value="<?=$tempdata[0][9]['value'];?>" class="send-message-btn" />
        </form>
        <div style="clear:both"></div>
    </div><!--- contect-me-app-main-content --->
</div>
<div class="admin-form-cnt" id="admin-form-cnt">
	<h3>Welcome Admin!</h3>
    <p>This is your Contact App. Submissions through your contact form are emailed to you. It will be stored in your admin email.</p>
    <div class="admin-field-set">
    <div  style="position: absolute; margin-top: 35px; margin-left: 54px;" align="center" class="tempeditpng">
        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][10]['id'];?>&ftype=<?=$tempdata[0][10]['typeid'];?>">Change Email</a>
    </div>
    <label>Enter your email address below to setup your Contact App:</label>
    <input type="text" class="adress-two-fld-space" value="<?=$tempdata[0][10]['value'];?>" name="admin_email" onBlur="if(this.value==''){this.value='<?=$tempdata[0][10]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[0][10]['value'];?>'){this.value=''}"/>
    </div><!--- mysetting-field-set --->
    <div style="clear:both"></div>
</div><!--- admin-form-cnt --->
<div class="admin-form-cnt" id="thankyoudiv">
    <div  style="position: absolute; margin-top: -7px; margin-left: -149px;" align="center" class="tempeditpng">
        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change Text</a>
    </div>
       <?=$tempdata[1][0]['value'];?>
    <div style="clear:both"></div>
</div><!--- admin-form-cnt --->
</div>    
