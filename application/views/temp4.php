<?php $this->load->view('styles/style'.$tempid,$tempdata,$tempbgclr);?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		
        <li><a href="#editthankyoupage"><span>Edit Thank You page</span></a></li>
    </ul>
    <div id="edittemplate">
        <!--Tab One Data-->
        <div id="mainraper-white">
        <div  style="position:absolute;margin-top:-20px;margin-left:680px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempid;?>&ftype=6">Change BG Color</a>
        </div>  
            <div  style="position: absolute; margin-top: -35px; margin-left: 500px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change border</a> 
            </div>
            <div class="logo-white">
                <div  style="position:absolute;margin-top:20px;margin-left:80px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>">Change Image</a>
                </div>	
                <img src="<?=base_url()?>images/images/<?=$tempdata[0][1]['value'];?>" width="80" height="80">
            </div>
            <!--Content Div -->
            <div id="contentdiv-white"> 
                    <!--head porition -->					
                    <div id="topimage" align="center"><img src="<?=base_url();?>images/images/<?=$tempdata[1][2]['value'];?>" />
                        <div  style="position: absolute; margin-left: 600px; margin-top:-350px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][2]['id'];?>&ftype=<?=$tempdata[1][2]['typeid'];?>">Change Image</a>
                        </div>	
                    </div>						
                    <div style="clear:both"></div>
                    <div id="bannertxtbg-white"> 
                        <div  style="position: absolute; margin-top: -25px; margin-left: 600px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change color</a>
                        </div>
                        <h2><?=strip_tags($quiz['qheading'],QUIZ_TAGS);?></h2>
                        <div  style="position: absolute; margin-top: -49px; margin-left: -25px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$quiz['id'];?>&ftype=quizhead">Edit Text</a> 
                        </div>
                        <p><?=strip_tags($quiz['qdescription'],QUIZ_TAGS)?></p>
                        <div  style="position: absolute; margin-top: -49px; margin-left: -25px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$quiz['id'];?>&ftype=quizdes">Edit Text</a> 
                        </div>
                    </div>							
                    
                    <div style="clear:both"></div>
                    <?php foreach($options as $option){
                    if($option['is_hide']==1){
                    ?>
                    <div id="quizdiv-white">
                        <div class="tab-inpt-white"><input type="radio" name="quiz"></div><div class="tab-cnt-white">
                        <?=$option['optiontxt'];?> 
                            <div  style="position: absolute; margin-left: 580px; margin-top: -50px;margin-bottom:10px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$option['id'];?>&ftype=quizans">Edit Text</a> 
                                |
                                <a href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$option['id'];?>&ftype=quizans&ins=fdel">Del</a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <?php }}?>
                    <!--End Question porition -->
                    <div style="clear:both"></div>
                    <div class="middle-content-white">
                            <div class="cnt-mddl-inpt-white">
                                <span class="inpt-title-ddd"><?=$tempdata[2][0]['value']?>
                                    <div  style="position: absolute; margin-left: 50px; margin-top: -40px;" align="center" class="tempeditpng">
                                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Edit Text</a>
                                    </div>
                                </span><br>
                                <input type="text" >
                            </div><!---- end cnt-mddl-inpt ------>
                            <div class="cnt-mddl-inpt-white">
                                <span class="inpt-title-white"><?=$tempdata[2][1]['value']?>
                                <div  style="position: absolute; margin-left: 50px; margin-top: -40px;" align="center" class="tempeditpng">
                                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Edit Text</a> 
                                </div>
                                </span><br>
                                <input type="text" style="width:345px;">
                            </div><!---- end cnt-mddl-inpt ------>							
                            <div class="sb-btn-white"><input type="button" value=" Deltag "></div>
                    </div><!---- end middle content ----->	
                    <div style="clear:both"></div>
                    <div class="bottom-content-white">
                        <!--<p> -->
                        <a href="http://radio100.dk/artikler/sms-og-konkurrenceregler.9397.html" target="_blank"><?=$tempdata[3][1]['value']?></a>
                        <div  style="position:absolute;margin-left: 250px; margin-top: -20px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Edit Text</a> 
                        </div>
                        <!--</p> -->
                    </div><!--- bottom-content ----->
                    <div style="clear:both"></div>						
            </div><!--End Content Div -->				
        </div>
        <!--End Tab one Data -->
    </div>
    <div id="editthankyoupage">
        <div  style="position:absolute;margin-top:-15px;margin-left:0px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>&tselect=1">Change border</a> 
        </div>	
        <div id="mainraperthanks-white">
            <div id="container-thanks1-white">
                <!--Content Div -->
                <div id="contentdiv-thanks1-white"> 
                    <div class="title-div-thanks1-white">
                        <?=strip_tags($tempdata[4][2]['value'],$quiz_tags);?>
                    </div><!--- thnk-title-div ---->
                    <div  style="position: absolute; margin-top: -25px; margin-left: 600px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][2]['id'];?>&ftype=<?=$tempdata[4][2]['typeid'];?>&tselect=1">Edit text</a>
                    </div>
                    <div class="mdl-img-cnt-thanks1-white">
                        <div  style="position: absolute; margin-top: 0px; margin-left: 600px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][3]['id'];?>&ftype=<?=$tempdata[4][3]['typeid'];?>&tselect=1">Change Image</a>
                        </div>
                        <img src="<?=base_url();?>images/images/<?=$tempdata[4][3]['value']?>" width="740">
                    </div><!---- midle image content ---->		
                </div><!--End Content Div -->	
            </div>
        </div>
    </div>	
</div>