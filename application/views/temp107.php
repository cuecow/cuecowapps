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
        <div  style="position:absolute;margin-top:-12px;margin-left:680px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>">Change BG Color</a>
        </div> 
                <div class="signup_app_food-container">
                <div class="signup_app_food-bg-slice-top-left"></div>
                <div class="signup_app_food-data-top-middle"></div>
                <div class="signup_app_food-bg-slice-top-right"></div>
                <div class="clear"></div>
                <div class="signup_app_food-data-middle-left"></div>
                <div class="signup_app_food-data-main">
                    <div class="signup_app_food-top-content">
                        <div  style="position: absolute; margin-left: 0px; margin-top: -22px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>&width=860&height=645">Change Image</a>
                        </div>
                        <div class="signup_app_food-top-content-inner">
                            <div  style="position: absolute; margin-left: -54px; margin-top: -29px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>&width=188&height=68">Change Image</a>
                            </div>
                            <div class="signup_app_food-top-content-inner-heading">
                                <img src="<?=base_url()?>images/188X68/<?=$tempdata[1][0]['value'];?>" />
                            </div>
                            <div class="signup_app_food-top-content-inner-discription">
                                <div  style="position: absolute; margin-left: -4px; margin-top: -22px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change Text</a>
                                </div>
                                <p><?=$tempdata[1][1]['value'];?></p>
                                <div  style="position: absolute; margin-left: -120px; margin-top: -11px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][2]['id'];?>&ftype=<?=$tempdata[1][2]['typeid'];?>">Change Text</a>
                                </div>
                                <p><?=$tempdata[1][2]['value'];?></p>
                            </div><!--- signup_app_food-top-content-inner-discription --->
                        </div><!--- signup_app_food-top-content-inner --->
                        <div class="signup_app_food-bottom-content">
                        <div class="left-col">
                            <form action="http://<?=$tempdata[2][6]['value'];?>" method="get" target="_blank">
                            <input type="text" class="text-field" name="name" value="Name" onFocus="if(this.value=='Name'){this.value=''}" onBlur="if(this.value==''){this.value='Name'}" />
                            <input type="text" class="text-field" name="email" value="Email" onFocus="if(this.value=='Email'){this.value=''}" onBlur="if(this.value==''){this.value='Email'}" />
                            <div  style="position: absolute; margin-left: 90px; margin-top: -4px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][2]['id'];?>&ftype=<?=$tempdata[2][2]['typeid'];?>">Change Text</a>
                            </div>
                            <input type="submit" class="submit" value="<?=$tempdata[2][2]['value'];?>" name="submit" />
                            <form action="" method="get" target="_blank">
                        </div><!--- left-col --->

                        <div class="right-col">
                            <div  style="position: absolute; margin-left: 0px; margin-top: -34px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][3]['id'];?>&ftype=<?=$tempdata[2][3]['typeid'];?>">Change Text</a>
                            </div>
                            <p><?=$tempdata[2][3]['value'];?></p>
                        </div><!--- right-col --->
                        <div style="clear:both"></div>
                        <div  style="position: absolute; margin-left: 564px; margin-top: 9px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][5]['id'];?>&ftype=<?=$tempdata[2][5]['typeid'];?>">Change Link</a>
                        </div>
                        <a href="http://<?=$tempdata[2][5]['value'];?>" class="facebook-btn" target="_blank"></a>
                        <div style="clear:both"></div>
                    </div><!--- signup_app_food-bottom-content --->
                    </div><!--- signup_app_food-top-content --->
                    <div style="clear:both"></div>

                </div><!--- signup_app_food-data-main --->
                <div class="signup_app_food-data-middle-right"></div>
                <div class="clear"></div>
                <div class="signup_app_food-bg-slice-bottom-left"></div>
                <div class="signup_app_food-data-bottom-middle"></div>
                <div class="signup_app_food-bg-slice-bottom-right"></div>
            </div><!--- signup_app_food-container --->
        </div><!--- main-wrapper --->
        <!--**********************************************-->
    </div>
    <div id="ThankyouPage"  style="margin-left:148px">
        <div  style="position: absolute; margin-left: 0px; margin-top: 19px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>&width=500&height=420">Change Image</a>
        </div>
        <div style="height: 404px">
            <img src="<?=base_url()?>images/500X420/<?=$tempdata[3][2]['value'];?>"  style="width: 500px; height: 420px" />
        </div>
        <div  style="position: absolute; margin-left: -122px; margin-top: 10px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Change Text</a>
        </div>
        <br><br>
        <p><?=$tempdata[3][1]['value'];?></p>
    </div>
</div>