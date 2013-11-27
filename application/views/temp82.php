<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<pre><?php //print_r($tempdata);?></pre>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		
        <li><a href="#editthankyoupage"><span>Edit Thank You page</span></a></li>
<!--        <li><a href="#EditCompetitionOverPage"><span>Edit Competition Over Page</span></a></li>-->
    </ul>
<div id="edittemplate">
    <div class="entertain-quiz-main-wrapper">
        <div class="entertain-quiz-top-slice">
        </div><!--- entertain-quiz-top-slice --->
        <div class="entertain-quiz-data-slice">
            <div class="main-ssssss">
            <div class="entertain-quiz-data-container">
                <div  style="position: absolute; margin-left: 720px; margin-top: -13px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change Image</a>
                </div>
                <img src="<?=  base_url();?>images/images/<?=$tempdata[1][0]['value'];?>" width="760" height="473" />
                    <div class="entertain-quiz-cnt">
                    <div  style="position: absolute; margin-left: 685px; margin-top: 59px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Change Color</a>
                    </div>
                    <div  style="position: absolute; margin-top: -30px; margin-left: -149px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editquizpopup?fid=<?=$quizdata['quiz'][0]['id'];?>&ftype=1&tbl=0&fname=qheading&fval=<?=$quizdata['quiz'][0]['qheading'];?>">Change Text</a>
                    </div> 
                    <h1 class="entertain-quiz-heading"><?=$quiz['qheading'];?></h1>
                    <div  style="position: absolute; margin-top: 3px; margin-left: -149px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editquizpopup?fid=<?=$quizdata['quiz'][0]['id'];?>&ftype=1&tbl=0&fname=qdescription&fval=<?=$quizdata['quiz'][0]['qdescription'];?>">Change Text</a>
                    </div> 
                    <p class="entertain-quiz-dis"><?=$quiz['qdescription'];?></p>
                <div class="clear"></div>
                </div><!--- entertain-quiz-cnt --->
                <div class="clear"></div>
            </div><!--- entertain-quiz-data-container --->

            <div class="clear"></div>
            </div>
            <div  style="position: absolute; margin-top: -22px; margin-left: 769px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][7]['id'];?>&ftype=<?=$tempdata[3][7]['typeid'];?>">Change Text</a>
            </div>
            <span class="entertain-quiz-copyright"><?=$tempdata[3][7]['value'];?></span>
            <div class="clear"></div>
            <form method="get" action="#">
                <div class="clear"></div>
                <div class="entertain-quiz-middle-cnt">
                <div class="clear"></div>
                <div  style="position: absolute; margin-top: -29px; margin-left: -142px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change Text</a>
                </div>
                <div class="entertain-quiz-list-heading"><?=$tempdata[3][0]['value'];?></div>
                        <?php  foreach ($options as $option) { ?>
                        <div id="entertain-quiz-list">
                        <div  style="position: absolute; margin-top: -1px; margin-left: -135px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editquizpopup?fid=<?=$option['id'];?>&ftype=2&tbl=1&fname=optiontxt&fval=<?=$option['optiontxt'];?>">Change Text</a>
                        </div> 
                        <div class="entertain-quiz-list-radio-btn"><input type="radio"  name="optionid" value="<?=$option['id'];?>" /></div>
                        <div class="entertain-quiz-list-pera"><?=$option['optiontxt'];?></div>
                        <div class="clear"></div>
                        </div><!--- entertain-quiz-list --->
                        <?php }?>
                        <div class="clear"></div>
                    </div><!--- entertain-quiz-middle-cnt --->
                    <div class="clear"></div>
                    <div class="entertain-quiz-input-fields">
                    <div class="entertain-quiz-input-fields-left">
                        <div  style="position: absolute; margin-top: 15px; margin-left: 138px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Change Text</a>
                        </div>
                        <div class="entertain-quiz-input-fields-inpt">
                            <input type="text" class="entertain-quiz-input" value="<?=$tempdata[3][1]['value'];?>" name="name" onBlur="if(this.value==''){this.value='<?=$tempdata[3][1]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][1]['value'];?>'){this.value=''}"/>
                        </div><!---- end entertain-quiz-input-fields-inpt ------>
                        <div class="entertain-quiz-input-fields-inpt">
                        <div  style="position: absolute; margin-top: 0px; margin-left: 138px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>">Change Text</a>
                        </div>
                            <input type="text" class="entertain-quiz-input" value="<?=$tempdata[3][2]['value'];?>" name="email" onBlur="if(this.value==''){this.value='<?=$tempdata[3][2]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][2]['value'];?>'){this.value=''}"/>
                        </div><!---- end entertain-quiz-input-fields-inpt ------>
                        </div><!--- entertain-quiz-input-fields-left --->

                        <div class="entertain-quiz-input-fields-right">
                                <div class="entertain-quiz-input-fields-inpt">
                        <div  style="position: absolute; margin-top: 0px; margin-left: 138px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][3]['id'];?>&ftype=<?=$tempdata[3][3]['typeid'];?>">Change Text</a>
                        </div>
                            <input type="text" class="entertain-quiz-input" value="<?=$tempdata[3][3]['value'];?>" name="phone" onBlur="if(this.value==''){this.value='<?=$tempdata[3][3]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][3]['value'];?>'){this.value=''}"/>
                        </div><!---- end entertain-quiz-input-fields-inpt ------>
                        <div class="entertain-quiz-input-fields-inpt">
                        <div  style="position: absolute; margin-top: 0px; margin-left: 138px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][4]['id'];?>&ftype=<?=$tempdata[3][4]['typeid'];?>">Change Text</a>
                        </div>
                            <input type="text" class="entertain-quiz-input" value="<?=$tempdata[3][4]['value'];?>" name="address" onBlur="if(this.value==''){this.value='<?=$tempdata[3][4]['value'];?>'}" onFocus="if(this.value=='<?=$tempdata[3][4]['value'];?>'){this.value=''}"/>
                        </div><!---- end entertain-quiz-input-fields-inpt ------>
                        <div  style="position: absolute; margin-top: -23px; margin-left: 323px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][5]['id'];?>&ftype=<?=$tempdata[3][5]['typeid'];?>">Change Text</a>
                        </div>
                        <input type="submit" value="<?=$tempdata[3][5]['value'];?>"  name="submit" class="entertain-quiz-submit" />

                        </div><!--- entertain-quiz-input-fields-right --->
                    </form>
                </div><!--- entertain-quiz-input-fields --->
                <div class="clear"></div>
                <div  style="position: absolute; margin-top: -7px; margin-left: -67px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>">Change Text</a>
                </div>
                <div class="entertain-quiz-bottom-content">
                    <p><?=$tempdata[4][0]['value'];?></p>
                </div><!--- entertain-quiz-bottom-content --->
                <div class="clear"></div>
        </div><!--- entertain-quiz-main-data --->
        <div class="entertain-quiz-bottom-slice">
        </div><!--- entertain-quiz-bottom-slice --->
    </div><!--- entertain-quiz-main-wrapper --->
        <div style="clear:both"></div>
    </div>
    <div id="editthankyoupage">
        <div class="entertain-quiz-main-wrapper">
                <div class="entertain-quiz-top-slice">
            </div><!--- entertain-quiz-top-slice --->
            <div class="entertain-quiz-data-slice">
                <div class="main-ssssss">
                <div class="entertain-quiz-data-container">
                    <div  style="position: absolute; margin-top: -15px; margin-left: 702px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][3]['id'];?>&ftype=<?=$tempdata[5][3]['typeid'];?>">Change Image</a>
                    </div>
                    <img src="<?=  base_url();?>images/images/<?=$tempdata[5][3]['value'];?>" width="760" height="473" />
                        <div class="entertain-quiz-cnt-thank">
                        <div  style="position: absolute; margin-top: 9px; margin-left: 672px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][2]['id'];?>&ftype=<?=$tempdata[5][2]['typeid'];?>">Change Color</a>
                        </div>
                        <div  style="position: absolute; margin-top: -15px; margin-left: -147px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][0]['id'];?>&ftype=<?=$tempdata[5][0]['typeid'];?>">Change Text</a>
                        </div>
                        <h1 class="entertain-quiz-heading"><?=$tempdata[5][0]['value'];?></h1>
                        <div  style="position: absolute; margin-top: 18px; margin-left: -147px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][1]['id'];?>&ftype=<?=$tempdata[5][1]['typeid'];?>">Change Text</a>
                        </div>
                        <p class="entertain-quiz-dis"><?=$tempdata[5][1]['value'];?></p>
                    <div class="clear"></div>
                    </div><!--- entertain-quiz-cnt-thank --->
                    <div class="clear"></div>
                </div><!--- entertain-quiz-data-container --->

                <div class="clear"></div>
                </div>

                    <div class="clear"></div>
            </div><!--- entertain-quiz-main-data --->
            <div class="entertain-quiz-bottom-slice">
            </div><!--- entertain-quiz-bottom-slice --->
        </div><!--- entertain-quiz-main-wrapper ---> 
    </div>
<div id="EditCompetitionOverPage"></div>
</div>    
