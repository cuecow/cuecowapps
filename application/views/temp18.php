<?php $this->load->view('styles/style'.$tempid,$tempdata,$quizdata);?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		
        <li><a href="#editthankyoupage"><span>Edit Thank You page</span></a></li>
<!--        <li><a href="#EditCompetitionOverPage"><span>Edit Competition Over Page</span></a></li>-->
    </ul>
<div id="edittemplate">
    <div class="quiz-food-main-wrapper">
        <div  style="position:absolute;margin-top:-20px;margin-left:680px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change BG Color</a>
        </div> 
            <div class="quiz-food-top-slice">
        </div><!--- quiz-food-top-slice --->
        <div class="quiz-food-data-slice">
            <div class="main-ssssss">
            <div class="quiz-food-data-container">
                <div  style="position: absolute; margin-top: 4px; margin-left: 668px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>&width=760&height=444">Change Image</a>
                </div>
                <img src="<?= base_url();?>images/760X444/<?=$tempdata[1][1]['value'];?>" width="760" height="473" />
                <div  style="position: absolute; margin-top: -324px; margin-left: 585px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>&width=340&height=340">Change Image</a>
                </div>
                <img src="<?= base_url();?>images/340X340/<?=$tempdata[2][0]['value'];?>" class="Quiz-app-food-heading" width="166" />
                    <div class="Quiz-app-food-discription-cnt">
                    <div  style="position: absolute; margin-top: 59px; margin-left: -78px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editquizpopup?fid=<?=$quizdata['quiz'][0]['id'];?>&ftype=1&tbl=0&fname=qheading&fval=<?=$quizdata['quiz'][0]['qheading'];?>">Change Text</a>
                    </div> 
                     <?php  $fvall = $quiz['qheading'];
                            $charactr = array("amp;");
                            $replacewith   = array("&");
                            $fval = str_replace($charactr, $replacewith, $fvall); ?>   
                    <h3 class="Quiz-app-food-discription-cnt-heading"><?=$fval;?></h3>
                    <div  style="position: absolute; margin-top: -29px; margin-left: -119px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editquizpopup?fid=<?=$quizdata['quiz'][0]['id'];?>&ftype=1&tbl=0&fname=qdescription&fval=<?=$quizdata['quiz'][0]['qdescription'];?>">Change Text</a>
                    </div> 
                    <?php  $dfvall = $quiz['qdescription'];
                            $charactr = array("amp;");
                            $replacewith   = array("&");
                            $dfval = str_replace($charactr, $replacewith, $dfvall); ?> 
                    <p class="Quiz-app-food-discription-cnt-ds"><?=$dfval;?></p>
                    </div><!--- Quiz-app-food-discription-cnt --->
                <div class="clear"></div>
            </div><!--- quiz-food-data-container --->

            <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <form method="get" action="#">
            <div class="clear"></div>
            <div class="quiz-food-middle-cnt">
            <div class="clear"></div>
            <div  style="position: absolute; margin-top: -27px; margin-left: -145px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change Text</a>
            </div>
            <div class="quiz-food-list-heading"><?=$tempdata[3][0]['value'];?></div>
                <?php foreach($options as $option){ ?>
                    <div id="quiz-food-list">
                    <div  style="position: absolute; margin-top: 12px; margin-left: -138px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$option['id'];?>&ftype=quizimg&tbl=0&fname=optionimg1&width=60&height=64">Change Image</a>
                    </div>
                    <div class="Quiz-app-food-icon"><img src="<?= base_url();?>images/60X64/<?=$option['optionimg1'];?>" width="58" /></div>
                    <div class="Quiz-app-food-form-outer">
                        <div  style="position: absolute; margin-top: -24px; margin-left: 535px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editquizpopup?fid=<?=$option['id'];?>&ftype=2&tbl=1&fname=optiontxt&fval=<?=$option['optiontxt'];?>">Change Text</a>
                        </div> 
                        <div class="quiz-food-list-radio-btn"><input type="radio" name="option" value="<?=$option['id'];?>" ></div>
                        <div class="quiz-food-list-pera food-code-txt"><?=$option['optiontxt'];?> </div>
                    </div><!--- Quiz-app-food-form-outer --->
                    <div class="clear"></div>
                    </div><!--- quiz-food-list --->
                    <?php } ?>
                    <div class="clear"></div>

                </div><!--- quiz-food-middle-cnt --->
                <div class="clear"></div>
                <div class="quiz-food-input-fields">
                <div class="quiz-food-input-fields-left">
                    <div  style="position: absolute; margin-top: 14px; margin-left: 138px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][4]['id'];?>&ftype=<?=$tempdata[3][4]['typeid'];?>">Change Text</a>
                    </div>
                    <div class="quiz-food-input-fields-inpt">
                        <input type="text" class="quiz-food-input"  value="<?=$tempdata[3][4]['value'];?>" name="name" onBlur="if(this.value==''){this.value='<?=$tempdata[3][4]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][4]['value'];?>'){this.value=''}"/>
                    </div><!---- end quiz-food-input-fields-inpt ------>
                    <div  style="position: absolute; margin-top: 0px; margin-left: 138px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][5]['id'];?>&ftype=<?=$tempdata[3][5]['typeid'];?>">Change Text</a>
                    </div>
                    <div class="quiz-food-input-fields-inpt">
                        <input type="text" class="quiz-food-input"  value="<?=$tempdata[3][5]['value'];?>" name="Email" onBlur="if(this.value==''){this.value='<?=$tempdata[3][5]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][5]['value'];?>'){this.value=''}"/>
                    </div><!---- end quiz-food-input-fields-inpt ------>
                    </div><!--- quiz-food-input-fields-left --->
                    <div  style="position: absolute; margin-top: 14px; margin-left: 484px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][6]['id'];?>&ftype=<?=$tempdata[3][6]['typeid'];?>">Change Text</a>
                    </div>
                    <div class="quiz-food-input-fields-right">
                            <div class="quiz-food-input-fields-inpt">
                        <input type="text" class="quiz-food-input"  value="<?=$tempdata[3][6]['value'];?>" name="Phone" onBlur="if(this.value==''){this.value='<?=$tempdata[3][6]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][6]['value'];?>'){this.value=''}"/>
                    </div><!---- end quiz-food-input-fields-inpt ------>
                    <div  style="position: absolute; margin-top: 0px; margin-left: 138px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][7]['id'];?>&ftype=<?=$tempdata[3][7]['typeid'];?>">Change Text</a>
                    </div>
                    <div class="quiz-food-input-fields-inpt">
                        <input type="text" class="quiz-food-input"  value="<?=$tempdata[3][7]['value'];?>" name="address" onBlur="if(this.value==''){this.value='<?=$tempdata[3][7]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][7]['value'];?>'){this.value=''}"/>
                    </div><!---- end quiz-food-input-fields-inpt ------>
                    <div  style="position: absolute; margin-top: -27px; margin-left: 323px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][8]['id'];?>&ftype=<?=$tempdata[3][8]['typeid'];?>">Change Text</a>
                    </div>
                    <input type="submit" value="<?=$tempdata[3][8]['value'];?>" name="submit" class="quiz-food-submit" />

                    </div><!--- quiz-food-input-fields-right --->
                    </form>
                </div><!--- quiz-food-input-fields --->
                <div class="clear"></div>
                <div  style="position: absolute; margin-top: -5px; margin-left: -96px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>">Change Text</a>
                </div>
                <div  style="position: absolute; margin-top: 91px; margin-left: 723px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][1]['id'];?>&ftype=<?=$tempdata[4][1]['typeid'];?>">Change Color</a>
                </div>
                <div class="food-quiz-bottom-content">
                   <?=$tempdata[4][0]['value'];?>
                </div><!--- quiz-food-bottom-content --->
                <div class="clear"></div>
        </div><!--- quiz-food-main-data --->
        <div class="quiz-food-bottom-slice">
        </div><!--- quiz-food-bottom-slice --->
    </div><!--- quiz-food-main-wrapper --->
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