<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>
        <li><a href="#ThankyouPage"><span>Thankyou Page</span></a></li>
        <!--<li><a href="#editthankyoupage"><span>Thank you page</span></a></li>-->        
    </ul>
    <div id="edittemplate">
        <!--********************************************-->       
        <div class="main-wrapper">
        <div  style="position:absolute;margin-top:-15px;margin-left:680px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][5]['id'];?>&ftype=<?=$tempdata[0][5]['typeid'];?>">Change BG Color</a>
        </div> 
                <div class="signup_app_entertain-container">                    
<!--                    <div  style="position: absolute; margin-left: 30px; margin-top: 11px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][4]['id'];?>&ftype=<?=$tempdata[0][4]['typeid'];?>">Change Color</a>
                    </div>-->
                <div class="signup_app_entertain-bg-slice-top-left"></div>
                <div class="signup_app_entertain-data-top-middle"></div>
                <div class="signup_app_entertain-bg-slice-top-right"></div>
                <div class="clear"></div>
                <div class="signup_app_entertain-data-middle-left"></div>
                <div class="signup_app_entertain-data-main">
                    <div class="signup_app_entertain-top-content">
                        <div class="signup_app_entertain-top-content-inner">
                                <div  style="position: absolute; margin-left: 30px; margin-top: 11px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>&width=780&height=380">Change Image</a>
                                </div>
                                <div class="signup_app_entertain-top-content-inner-heading">
                                    <div  style="position: absolute; margin-top: 11px; margin-left: -160px;" align="center" class="tempeditpng">
                                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>">Change Text</a>
                                    </div>
                                    <h1><?=$tempdata[0][1]['value'];?></h1>
                                </div>
                            <div class="signup_app_entertain-top-content-inner-discription">
                                <div  style="position: absolute; margin-top: 11px; margin-left: -152px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][2]['id'];?>&ftype=<?=$tempdata[0][2]['typeid'];?>">Change Text</a>
                                </div>
                                <p><?=$tempdata[0][2]['value'];?></p>
                                <div  style="position: absolute; margin-top: 11px; margin-left: -152px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][3]['id'];?>&ftype=<?=$tempdata[0][3]['typeid'];?>">Change Text</a>
                                </div>
                                <p><?=$tempdata[0][3]['value'];?></p>
                            </div><!--- signup_app_entertain-top-content-inner-discription --->
                        </div><!--- signup_app_entertain-top-content-inner --->
                    </div><!--- signup_app_entertain-top-content --->
                    <div style="clear:both"></div>
                    <div class="signup_app_entertain-bottom-content">
                        <div class="left-col">
                            <form action="http://<?=$tempdata[1][6]['value'];?>" method="get" target="_blank" name="frm">
                                <input type="text" class="text-field" value="Name" name="name" value="Name" onFocus="if(this.value=='Name'){this.value=''}" onBlur="if(this.value==''){this.value='Name'}" />
                                <input type="text" class="text-field" value="Email" name="email" value="Email" onFocus="if(this.value=='Email'){this.value=''}" onBlur="if(this.value==''){this.value='Email'}" />
                                <div  style="position: absolute; margin-left: 91px; margin-top: -2px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][2]['id'];?>&ftype=<?=$tempdata[1][2]['typeid'];?>">Change Text</a>
                                </div>
                                <input type="submit" class="submit" value="<?=$tempdata[1][2]['value'];?>" name="submit" />
                            </form>
                        </div><!--- left-col --->
                        <div class="signup_app_entertain-bottom-separator"></div>
                        <div class="right-col">
                            <div  style="position: absolute; margin-left: 0px; margin-top: -30px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][3]['id'];?>&ftype=<?=$tempdata[1][3]['typeid'];?>">Change Text</a>
                            </div>
                            <p><?=$tempdata[1][3]['value'];?></p>
                            <div  style="position: absolute; margin-top: 11px; margin-left: 142px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][5]['id'];?>&ftype=<?=$tempdata[1][5]['typeid'];?>">Change Link</a>
                            </div>
                            <a href="http://<?=$tempdata[1][5]['value'];?>" class="facebook-btn" target="_blank"></a>
                        </div><!--- right-col --->
                    </div><!--- signup_app_entertain-bottom-content --->
                </div><!--- signup_app_entertain-data-main --->
                <div class="signup_app_entertain-data-middle-right"></div>
                <div class="clear"></div>
                <div class="signup_app_entertain-bg-slice-bottom-left"></div>
                <div class="signup_app_entertain-data-bottom-middle"></div>
                <div class="signup_app_entertain-bg-slice-bottom-right"></div>
            </div><!--- signup_app_entertain-container --->
        </div><!--- main-wrapper --->
        <!--**********************************************-->
    </div>
    <div id="ThankyouPage" style="margin-left:148px">
        <div  style="position: absolute; margin-left: 0px; margin-top: 19px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[2][2]['id'];?>&ftype=<?=$tempdata[2][2]['typeid'];?>&width=500&height=420">Change Image</a>
        </div>
        <div style="height: 400px">
            <img src="<?=base_url()?>images/500X420/<?=$tempdata[2][2]['value'];?>" />
        </div>
        <div  style="position: absolute; margin-top: 19px; margin-left: -147px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Change Text</a>
        </div>
        <br><br>
        <p><?=$tempdata[2][1]['value'];?></p>
    </div>
</div>