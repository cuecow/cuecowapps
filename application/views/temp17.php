<?php $this->load->view('styles/style'.$tempid,$tempdata,$tempbgclr);?>

<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		
        <li><a href="#editthankyoupage"><span>Edit Thank You page</span></a></li>
<!--        <li><a href="#EditCompetitionOverPage"><span>Edit Competition Over Page</span></a></li>-->
    </ul>
<div id="edittemplate">
    <div class="quiz-retail-main-wrapper">
        <div  style="position:absolute;margin-top:-20px;margin-left:680px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change BG Color</a>
        </div> 
        <div class="quiz-retail-top-slice">
        </div><!--- quiz-retail-top-slice --->
        <div class="quiz-retail-data-slice">
            <div class="main-ssssss">
            <div class="quiz-retail-data-container">
            <div  style="position: absolute; margin-left: 720px; margin-top: -13px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>&width=760&height=444">Change Image</a>
            </div>
            <img src="<?=base_url();?>images/760X444/<?=$tempdata[1][0]['value'];?>" width="760" height="473" />
                    <div class="quiz-app-retail-cnt">
                    <div  style="position: absolute; margin-top: -31px; margin-left: -139px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change Text</a>
                    </div>
                    <p class="quiz-app-retail-heading"><?=$tempdata[1][1]['value']?></p>
                    <div class="clear"></div>
                    <div  style="position: absolute; margin-top: 145px; margin-left: -126px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editquizpopup?fid=<?=$quiz['id'];?>&ftype=1&tbl=0&fname=qheading&fval=<?=$quiz['qheading'];?>">Change Text</a>
                    </div>
                    <div  style="position: absolute; margin-top: 238px; margin-left: -126px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Change Color</a>
                    </div>
                    <div class="quiz-app-retail-cnt-left">
                        <?php  $fvall = $quiz['qheading'];
                            $charactr = array("amp;");
                            $replacewith   = array("&");
                            $fval = str_replace($charactr, $replacewith, $fvall); ?> 
                        <?=$fval;?>
                    </div><!--- quiz-app-retail-cnt-left --->
                    <div  style="position: absolute; margin-top: 142px; margin-left: 657px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editquizpopup?fid=<?=$quiz['id'];?>&ftype=1&tbl=0&fname=qdescription&fval=<?=$quiz['qdescription'];?>">Change Text</a>
                    </div>
                    <div  style="position: absolute; margin-top: 238px; margin-left: 657px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Change Color</a>
                    </div>
                    <div class="quiz-app-retail-cnt-right">
                         <?php  $dfvall = $quiz['qdescription'];
                            $charactr = array("amp;");
                            $replacewith   = array("&");
                            $dfval = str_replace($charactr, $replacewith, $dfvall); ?> 
                        <?=$dfval;?>
                    </div><!--- quiz-app-retail-cnt-right --->
                <div class="clear"></div>
                </div><!--- quiz-app-retail-cnt --->
                <div class="clear"></div>
            </div><!--- quiz-retail-data-container --->

            <div class="clear"></div>

            </div>
            <div class="clear"></div>
            <form method="get" action="#">
                <div class="clear"></div>
                <div class="quiz-retail-middle-cnt">
                <div class="clear"></div>
                <div  style="position: absolute; margin-top: -22px; margin-left: -150px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change Text</a>
                </div>
                <div class="quiz-retail-list-heading"><?=$tempdata[3][0]['value'];?></div>
                 <?php foreach($options as $option){?>
                        <div id="quiz-retail-list">
                        <div  style="position: absolute; margin-top: -1px; margin-left: -135px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editquizpopup?fid=<?=$option['id'];?>&ftype=2&tbl=1&fname=optiontxt&fval=<?=$option['optiontxt'];?>">Change Text</a>
                        </div> 
                        <div class="quiz-retail-list-radio-btn"><input type="radio" name="optionid" value="<?=$option['id'];?>" ></div>
                        <div class="quiz-retail-list-pera"><p><?=$option['optiontxt'];?></p></div>
                        <div class="clear"></div>
                        </div><!--- quiz-retail-list --->
                    <?php } ?>
                        <div class="clear"></div>
                    </div><!--- quiz-retail-middle-cnt --->
                    <div class="clear"></div>
                    <div class="quiz-retail-input-fields">
                    <div class="quiz-retail-input-fields-left">
                        <div  style="position: absolute; margin-top: 13px; margin-left: 138px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Change Text</a>
                        </div>
                        <div class="quiz-retail-input-fields-inpt">
                            <input type="text" class="quiz-retail-input" value="<?=$tempdata[3][1]['value'];?>" name="name" onBlur="if(this.value==''){this.value='<?=$tempdata[3][1]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][1]['value'];?>'){this.value=''}"/>
                        </div><!---- end quiz-retail-input-fields-inpt ------>
                        <div class="quiz-retail-input-fields-inpt">
                        <div  style="position: absolute; margin-top: 1px; margin-left: 138px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>">Change Text</a>
                        </div>
                            <input type="text" class="quiz-retail-input" value="<?=$tempdata[3][2]['value'];?>" name="email" onBlur="if(this.value==''){this.value='<?=$tempdata[3][2]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][2]['value'];?>'){this.value=''}"/>
                        </div><!---- end quiz-retail-input-fields-inpt ------>
                        </div><!--- quiz-retail-input-fields-left --->

                        <div class="quiz-retail-input-fields-right">
                                <div class="quiz-retail-input-fields-inpt">
                        <div  style="position: absolute; margin-top: 0px; margin-left: 145px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][3]['id'];?>&ftype=<?=$tempdata[3][3]['typeid'];?>">Change Text</a>
                        </div>
                            <input type="text" class="quiz-retail-input" value="<?=$tempdata[3][3]['value'];?>" name="phone" onBlur="if(this.value==''){this.value='<?=$tempdata[3][3]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][3]['value'];?>'){this.value=''}"/>
                        </div><!---- end quiz-retail-input-fields-inpt ------>
                        <div class="quiz-retail-input-fields-inpt">
                        <div  style="position: absolute; margin-top: 0px; margin-left: 145px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][4]['id'];?>&ftype=<?=$tempdata[3][4]['typeid'];?>">Change Text</a>
                        </div>
                            <input type="text" class="quiz-retail-input"  value="<?=$tempdata[3][4]['value'];?>" name="address" onBlur="if(this.value==''){this.value='<?=$tempdata[3][4]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][4]['value'];?>'){this.value=''}"/>
                        </div><!---- end quiz-retail-input-fields-inpt ------>
                        <div  style="position: absolute; margin-top: -26px; margin-left: 319px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][5]['id'];?>&ftype=<?=$tempdata[3][5]['typeid'];?>">Change Text</a>
                        </div>
                        <input type="submit" value="<?=$tempdata[3][5]['value'];?>" name="submit" class="quiz-retail-submit"/>
                        </div><!--- quiz-retail-input-fields-right --->
                    </form>
                </div><!--- quiz-retail-input-fields --->
                <div class="clear"></div>
                <div  style="position: absolute; margin-top: -3px; margin-left: -60px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][1]['id'];?>&ftype=<?=$tempdata[4][1]['typeid'];?>">Change Text</a>
                </div>
                <div  style="position: absolute; margin-top: -4px; margin-left: 764px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>">Change Color</a>
                </div>
                <div class="quiz-app-retail-bottom-content">
                    <p><?=$tempdata[4][1]['value'];?></p>
                </div><!--- quiz-retail-bottom-content --->
                <div class="clear"></div>
        </div><!--- quiz-retail-main-data --->
        <div class="quiz-retail-bottom-slice">
        </div><!--- quiz-retail-bottom-slice --->
    </div><!--- quiz-retail-main-wrapper --->
        <div style="clear:both"></div>
    </div>
    <div id="editthankyoupage">
        <div class="quiz-retail-main-wrapper">
            <div class="quiz-retail-top-slice">
        </div><!--- quiz-retail-top-slice --->
        <div class="quiz-retail-data-slice">
            <div class="main-ssssss">
            <div class="quiz-retail-data-container">
                <div  style="position: absolute; margin-top: -7px; margin-left: 664px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][0]['id'];?>&ftype=<?=$tempdata[5][0]['typeid'];?>">Change Image</a>
                </div>
                <img src="<?=  base_url();?>images/images/<?=$tempdata[5][0]['value'];?>" width="760" height="473" />
                    <div class="quiz-app-retail-cnt">
                    <div  style="position: absolute; margin-top: -23px; margin-left: -147px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][1]['id'];?>&ftype=<?=$tempdata[5][1]['typeid'];?>">Change Text</a>
                    </div>
                    <p class="quiz-app-retail-heading"><?=$tempdata[5][1]['value'];?></p>
                    <div class="clear"></div>
                    <div  style="position: absolute; margin-top: 290px; margin-left: 221px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][3]['id'];?>&ftype=<?=$tempdata[5][3]['typeid'];?>">Change Color</a>
                    </div>
                    <div  style="position: absolute; margin-top:  141px; margin-left: -128px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][2]['id'];?>&ftype=<?=$tempdata[5][2]['typeid'];?>">Change Text</a>
                    </div>
                    <div class="quiz-app-retail-cnt-left-thank">
                           <?=$tempdata[5][2]['value'];?>
                    </div><!--- quiz-app-retail-cnt-left-thank --->
                    <div  style="position: absolute; margin-top: 151px; margin-left: 659px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][5]['id'];?>&ftype=<?=$tempdata[5][5]['typeid'];?>">Change Color</a>
                    </div>
                    <div  style="position: absolute; margin-top:  137px; margin-left: 339px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][4]['id'];?>&ftype=<?=$tempdata[5][4]['typeid'];?>">Change Text</a>
                    </div>
                    <div class="quiz-app-retail-cnt-right-thank">
                            <?=$tempdata[5][4]['value'];?>
                    </div><!--- quiz-app-retail-cnt-right-thank --->
                <div class="clear"></div>
                </div><!--- quiz-app-retail-cnt --->
                <div class="clear"></div>
            </div><!--- quiz-retail-data-container --->

            <div class="clear"></div>

            </div>

                <div class="clear"></div>
        </div><!--- quiz-retail-main-data --->
        <div class="quiz-retail-bottom-slice">
        </div><!--- quiz-retail-bottom-slice --->
     </div><!--- quiz-retail-main-wrapper --->
   </div>
<div id="EditCompetitionOverPage">
</div>
</div>    