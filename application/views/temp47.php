<?php $this->load->view('styles/style'.$tempid,$tempdata,$quizdata);?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		
        <li><a href="#editthankyoupage"><span>Edit Thank You page</span></a></li>
<!--        <li><a href="#EditCompetitionOverPage"><span>Edit Competition Over Page</span></a></li>-->
    </ul>
    <div id="edittemplate">
        <div class="main-wrapper">
            <form action="#" method="post"> 
            <div class="Quiz_app_fashion-container">
                <div class="Quiz_app_fashion-bg-slice-top-left"></div>
                <div class="Quiz_app_fashion-data-top-middle"></div>
                <div class="Quiz_app_fashion-bg-slice-top-right"></div>
                <div class="clear"></div>
                <div class="Quiz_app_fashion-data-middle-left"></div>
                <div class="Quiz_app_fashion-data-main">
                    <div class="Quiz_app_fashion-banner">
                    <div  style="position: absolute; margin-top: -44px; margin-left: 656px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change Color</a>
                    </div>
                    <a href="#" class="Quiz_app_fashion-logo"></a>
<!--                    <a href="#" class="Quiz_app_fashion-share"></a>-->
                    </div><!--- Quiz_app_fashion-banner --->
                    <div class="clear"></div>
                    <div  style="position: absolute; margin-top: -23px; margin-left: -83px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editquizpopup?fid=<?=$quizdata['quiz'][0]['id'];?>&ftype=1&tbl=0&fname=qheading&fval=<?=$quizdata['quiz'][0]['qheading'];?>">Change Text</a>
                    </div> 
                    <div class="Quiz_app_fashion-top-cnt">
                    <?=$quizdata['quiz'][0]['qheading'];?>
                    </div>
                    <div  style="position: absolute; margin-top: 482px; margin-left: 701px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Change Color</a>
                    </div>                 
                    <?php foreach($quizdata['options'] as $option){?>
                    <!--- Quiz_app_fashion-top-cnt --->
                    <div class="Quiz_app_fashion-tab-cnt">
                        <div class="Quiz_app_fashion-tab-cnt-left-col">
                            <div  style="position: absolute; margin-top: -23px; margin-left: -83px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$option['id'];?>&ftype=quizimg&tbl=0&fname=optionimg1&width=118&height=148">Change Image</a>
                            </div> 
                            <span class="Quiz_app_fashion-tab-cnt-left-col-image-cnt"><img src="<?=base_url()?>images/118X148/<?=$option['optionimg1'];?>" style="width:118px; height:148px" /></span>
                            <div  style="position: absolute; margin-top: -25px; margin-left: 129px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$option['id'];?>&ftype=quizimg&tbl=0&fname=optionimg2&width=118&height=148">Change Image</a>
                            </div>
                            <span class="Quiz_app_fashion-tab-cnt-left-col-image-cnt"><img src="<?=base_url()?>images/118X148/<?=$option['optionimg2'];?>" style="width:118px; height:148px" /></span>
                            <div  style="position: absolute; margin-top: -24px; margin-left: 279px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$option['id'];?>&ftype=quizimg&tbl=0&fname=optionimg3&width=118&height=148">Change Image</a>
                            </div>
                            <span class="Quiz_app_fashion-tab-cnt-left-col-image-cnt"><img src="<?=base_url()?>images/118X148/<?=$option['optionimg3'];?>" style="width:118px; height:148px" /></span>
                            <div class="clear"></div>
                        </div><!--- Quiz_app_fashion-tab-cnt-left-col --->
                        <div class="Quiz_app_fashion-tab-cnt-right-col">
                                <div  style="position: absolute; margin-top: -30px; margin-left: 272px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editquizpopup?fid=<?=$option['id'];?>&ftype=2&tbl=1&fname=optiontxt&fval=<?=$option['optiontxt'];?>">Change Text</a>
                                </div>  
                                <span class="Quiz_app_fashion-tab-cnt-right-col-one"><input type="radio" name="optionid" value="<?=$option['id'];?>" /></span>
                            <p><?=$option['optiontxt'];?></p>
                        </div><!--- Quiz_app_fashion-tab-cnt-right-col --->
                        <div class="clear"></div>
                    </div><!--- Quiz_app_fashion-tab-cnt --->
                    <div class="clear"></div>
                    <?php }?>
                    
                    <div class="Quiz_app_fashion-forms-fields">
                        <div  style="position: absolute; margin-top: -3px; margin-left: -149px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change Text</a>
                        </div>
                        <span class="Quiz_app_fashion-forms-fields-title"><?=$tempdata[3][0]['value'];?></span>
                        <div class="Quiz_app_fashion-forms-fields-left">
                        <div  style="position: absolute; margin-top: 3px; margin-left: 138px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Change Text</a>
                        </div>
                        <input type="text" class="Quiz_app_fashion-forms-text-field" value="<?=$tempdata[3][1]['value'];?>" name="name" onBlur="if(this.value==''){this.value='<?=$tempdata[3][1]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][1]['value'];?>'){this.value=''}" />
                        <div class="clear"></div>
                        <div  style="position: absolute; margin-top: 3px; margin-left: 138px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>">Change Text</a>
                        </div>
                        <input type="text" class="Quiz_app_fashion-forms-text-field" value="<?=$tempdata[3][2]['value'];?>" name="email" onBlur="if(this.value==''){this.value='<?=$tempdata[3][2]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][2]['value'];?>'){this.value=''}" />
                        </div><!--- Quiz_app_fashion-forms-fields-left --->
                        <div class="Quiz_app_fashion-forms-fields-right">
                        <div  style="position: absolute; margin-top: 3px; margin-left: 138px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][3]['id'];?>&ftype=<?=$tempdata[3][3]['typeid'];?>">Change Text</a>
                        </div>
                        <input type="text" class="Quiz_app_fashion-forms-text-field" value="<?=$tempdata[3][3]['value'];?>" name="phone" onBlur="if(this.value==''){this.value='<?=$tempdata[3][3]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][3]['value'];?>'){this.value=''}"/>
                        <div class="clear"></div>
                        <div  style="position: absolute; margin-top: 3px; margin-left: 138px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][4]['id'];?>&ftype=<?=$tempdata[3][4]['typeid'];?>">Change Text</a>
                        </div>
                        <input type="text" class="Quiz_app_fashion-forms-text-field" value="<?=$tempdata[3][4]['value'];?>" name="address" onBlur="if(this.value==''){this.value='<?=$tempdata[3][4]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][4]['value'];?>'){this.value=''}"/>
                        </div><!--- Quiz_app_fashion-forms-fields-right --->
                        <div  style="position: absolute; margin-top: 40px; margin-left: 715px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][5]['id'];?>&ftype=<?=$tempdata[3][5]['typeid'];?>">Change Text</a>
                        </div>
                        <div class="Quiz_app_fashion-forms-fields-two">
                                <input class="Quiz_app_fashion-form-submit" value="<?=$tempdata[3][5]['value'];?>"  />
                        </div><!--- Quiz_app_fashion-forms-fields-two --->
                        <div class="clear"></div>
                    </div><!--- Quiz_app_fashion-forms-fields --->
                    <div class="clear"></div>
                    <div  style="position: absolute; margin-top: 40px; margin-left: 715px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][1]['id'];?>&ftype=<?=$tempdata[4][1]['typeid'];?>">Change Text</a>
                    </div>
                    <div  style="position: absolute; margin-top: 40px; margin-left: -107px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>">Change Color</a>
                    </div>
                    <div class="Quiz_app_fashion-bottom-content">
                        <p><?=$tempdata[4][1]['value'];?></p>
                    </div><!--- Quiz_app_fashion-bottom-content --->
                </div><!--- Quiz_app_fashion-data-main --->
                <div class="Quiz_app_fashion-data-middle-right"></div>

                <div class="clear"></div>
                <div class="Quiz_app_fashion-bg-slice-bottom-left"></div>
                <div class="Quiz_app_fashion-data-bottom-middle"></div>
                <div class="Quiz_app_fashion-bg-slice-bottom-right"></div>
            </div><!--- Quiz_app_fashion-container --->
            </form>
        </div><!--- main-wrapper --->
        <div style="clear:both"></div>
    </div>
    <div id="editthankyoupage">
        <div  style="position: absolute; margin-top: -23px; margin-left: -147px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][0]['id'];?>&ftype=<?=$tempdata[5][0]['typeid'];?>">Change Text</a>
        </div>
        <?=$tempdata[5][0]['value'];?>	
    </div>	
    <div id="EditCompetitionOverPage">
    </div>
</div>    