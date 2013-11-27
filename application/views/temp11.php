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
        <div  style="position:absolute;margin-top:-38px;margin-left:680px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][4]['id'];?>&ftype=<?=$tempdata[0][4]['typeid'];?>">Change BG Color</a>
        </div> 
            <div class="signup_app_fashion-container">
            <div class="signup_app_fashion-bg-slice-top-left"></div>
            <div class="signup_app_fashion-data-top-middle"></div>
            <div class="signup_app_fashion-bg-slice-top-right"></div>
            <div class="clear"></div>
            <div class="signup_app_fashion-data-middle-left"></div>
            <div class="signup_app_fashion-data-main">

                    <div class="signup_app_fashion-top-content-inner">
                            <div  style="position: absolute; margin-left: 0px; margin-top: -5px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>&width=810&height=430">Change Image</a>
                            </div>
                            <div class="signup_app_fashion-top-content-inner-heading">
                                <div  style="position: absolute; margin-top: 0px; margin-left: -127px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>&width=440&height=95">Change Image</a>
                                </div>
                                <img src="<?=base_url()?>images/440X95/<?=$tempdata[0][1]['value'];?>" />
                            </div>
                        <div style="clear:both"></div>
                            <div  style="position: absolute; margin-left: 556px; margin-top: 158px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][3]['id'];?>&ftype=<?=$tempdata[0][3]['typeid'];?>">Change Link</a>
                            </div>
                        <a href="http://<?=$tempdata[0][3]['value'];?>" class="signup_app_fashion-facebook" target="_blank"></a>

                    </div><!--- signup_app_fashion-top-content-inner --->

                <div style="clear:both"></div>
                <div class="signup_app_fashion-bottom-content">
                    <div class="left-col">
                            <div class="signup_app_fashion-top-content-inner-discription">
                                <div  style="position: absolute; margin-left: -35px; margin-top: -27px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change Text</a>
                                </div>
                            <p><?=$tempdata[1][0]['value'];?></p>
                                <div  style="position: absolute; margin-top: -5px; margin-left: -78px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change Text</a>
                                </div>
                            <p><?=$tempdata[1][1]['value'];?></p>
                        </div><!--- signup_app_fashion-top-content-inner-discription --->
                    </div><!--- left-col --->
                    <div class="signup_app_fashion-bottom-separator"></div>
                    <div class="right-col">
                        <form action="http://<?=$tempdata[1][5]['value'];?>" method="get" target="_blank" name="frm">
                            <input type="text" class="text-field" name="name" value="Name" onFocus="if(this.value=='Name'){this.value=''}" onBlur="if(this.value==''){this.value='Name'}" />
                        <div style="padding:5px 0;"></div>
                        <input type="text" class="text-field" name="email" value="Email" onFocus="if(this.value=='Email'){this.value=''}" onBlur="if(this.value==''){this.value='Email'}" />
                            <div  style="position: absolute; margin-top: -3px; margin-left: 92px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][4]['id'];?>&ftype=<?=$tempdata[1][4]['typeid'];?>">Change Text</a>
                            </div>
                        <input type="submit" class="submit" value="<?=$tempdata[1][4]['value'];?>" disabled="disabled" />
                        </form>
                    </div><!--- right-col --->
                </div><!--- signup_app_fashion-bottom-content --->
            </div><!--- signup_app_fashion-data-main --->
            <div class="signup_app_fashion-data-middle-right"></div>
            <div class="clear"></div>
            <div class="signup_app_fashion-bg-slice-bottom-left"></div>
            <div class="signup_app_fashion-data-bottom-middle"></div>
            <div class="signup_app_fashion-bg-slice-bottom-right"></div>
        </div><!--- signup_app_fashion-container --->
    </div><!--- main-wrapper --->

        <!--**********************************************-->
    </div>
    <div id="ThankyouPage" style="margin-left:148px">
        <div  style="position: absolute; margin-left: 0px; margin-top: 19px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[2][2]['id'];?>&ftype=<?=$tempdata[2][2]['typeid'];?>&width=500&height=420">Change Image</a>
        </div>
        <div style="height: 355px">
            <img src="<?=base_url()?>images/500X420/<?=$tempdata[2][2]['value'];?>" style="width: 500px; height: 420px"/>
        </div>
        <div  style="position: absolute; margin-left: -152px; margin-top: 20px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Change Text</a>
        </div> 
        <br><br>
        <p><?=$tempdata[2][1]['value'];?></p>
    </div>
</div>