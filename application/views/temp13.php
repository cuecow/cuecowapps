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
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>">Change BG Color</a>
        </div> 
                <div class="signup_app_retail-container">
                <div class="signup_app_retail-bg-slice-top-left"></div>
                <div class="signup_app_retail-data-top-middle"></div>
                <div class="signup_app_retail-bg-slice-top-right"></div>
                <div class="clear"></div>
                <div class="signup_app_retail-data-middle-left"></div>
                <div class="signup_app_retail-data-main">
                    <div  style="position: absolute; margin-left: 0px; margin-top: -28px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change color</a>
                    </div>
                    <div class="signup_app_retail-main-content">
                        <div  style="position: absolute; margin-top: -5px; margin-left: -20px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change Text</a>
                        </div>
                        <h1><?=$tempdata[1][0]['value'];?></h1>
                        <div class="signup_app_retail-col-container">
                        <div class="signup_app_retail-col-one">
                                <div class="signup_app_retail-col-one-inner">
                                    <div  style="position: absolute; margin-left: -121px; margin-top: -15px;" align="center" class="tempeditpng">
                                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][2]['id'];?>&ftype=<?=$tempdata[1][2]['typeid'];?>">Change color</a>
                                    </div>
                                    <div  style="position: absolute; margin-top: 26px; margin-left: -122px;" align="center" class="tempeditpng">
                                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][3]['id'];?>&ftype=<?=$tempdata[1][3]['typeid'];?>">Change Text</a>
                                    </div>    
                                <p><?=$tempdata[1][3]['value'];?></p>
                                <div  style="position: absolute; margin-left: -121px; margin-top: 15px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][4]['id'];?>&ftype=<?=$tempdata[1][4]['typeid'];?>">Change Text</a>
                                </div>
                                <p><?=$tempdata[1][4]['value'];?></p>
                            </div><!--- signup_app_retail-col-one-inner --->
                        </div><!--- signup_app_retail-col-one --->
                        <div class="signup_app_retail-col-two">
                            <div class="signup_app_retail-col-two-inner">
                                <div  style="position: absolute; margin-top: -2px; margin-left: 234px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][6]['id'];?>&ftype=<?=$tempdata[1][6]['typeid'];?>">Change Color</a>
                                </div> 
                            </div><!--- signup_app_retail-col-two-inner --->
                        </div><!--- signup_app_retail-col-two --->
                        <div style="clear:both; height:30px;"></div>
                        <div class="signup_app_retail-col-three">
                                <div class="signup_app_retail-col-three-inner">
                                    <div  style="position: absolute; margin-left: -90px; margin-top: -7px;" align="center" class="tempeditpng">
                                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Change Color</a>
                                    </div> 
                                <div class="signup_app_retail-col-three-input-container">
                                <form action="http://<?=$tempdata[2][9]['value'];?>" method="get" target="_blank">  
                                <input type="text" class="text-field" value="Name" name="name" value="Name" onFocus="if(this.value=='Name'){this.value=''}" onBlur="if(this.value==''){this.value='Name'}" />
                                <input type="text" class="text-field" value="Email" name="email" value="Email" onFocus="if(this.value=='Email'){this.value=''}" onBlur="if(this.value==''){this.value='Email'}" />
                                    <div  style="position: absolute; margin-left: 57px; margin-top: -4px;" align="center" class="tempeditpng">
                                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][4]['id'];?>&ftype=<?=$tempdata[2][4]['typeid'];?>">Change text</a>
                                    </div> 
                                <input type="submit" class="submit" value="<?=$tempdata[2][4]['value'];?>" name="submit" />
                                </form>
                                <div style="clear:both"></div>
                                </div><!--- signup_app_retail-col-three-input-container --->
                            </div><!--- signup_app_retail-col-three-inner --->
                        </div><!--- signup_app_retail-col-three --->
                        <div class="signup_app_retail-col-four">
                                <div class="signup_app_retail-col-four-inner">
                                    <div  style="position: absolute; margin-left: 225px; margin-top: -11px;" align="center" class="tempeditpng">
                                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][6]['id'];?>&ftype=<?=$tempdata[2][6]['typeid'];?>">Change Color</a>
                                    </div> 
                                    <div  style="position: absolute; margin-top: 53px; margin-left: 239px;" align="center" class="tempeditpng">
                                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][7]['id'];?>&ftype=<?=$tempdata[2][7]['typeid'];?>">Change Text</a>
                                    </div>     
                                <p><?=$tempdata[2][7]['value'];?></p>
                            </div><!--- signup_app_retail-col-four-inner --->
                        </div><!--- signup_app_retail-col-four --->
                        <div style="clear:both"></div>
                        </div><!--- signup_app_retail-col-container --->
                    </div><!--- signup_app_retail-main-content --->

                    <div style="clear:both"></div>

                </div><!--- signup_app_retail-data-main --->
                <div class="signup_app_retail-data-middle-right"></div>
                <div class="clear"></div>
                <div class="signup_app_retail-bg-slice-bottom-left"></div>
                <div class="signup_app_retail-data-bottom-middle"></div>
                <div class="signup_app_retail-bg-slice-bottom-right"></div>
            </div><!--- signup_app_retail-container --->
        </div><!--- main-wrapper --->
        <!--**********************************************-->
    </div>
    <div id="ThankyouPage" style="margin-left:148px">
        <div  style="position: absolute; margin-left: 0px; margin-top: 19px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>&width=500&height=420">Change Image</a>
        </div>
        <div style="height: 355px">
            <img src="<?=base_url()?>images/500X420/<?=$tempdata[3][2]['value'];?>" />
        </div>
        <div  style="position: absolute; margin-left: -148px; margin-top: 19px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Change Text</a>
        </div>
        <br><br>
        <p><?=$tempdata[3][1]['value'];?></p>
    </div>
</div>