<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		
        <li><a href="#editthankyoupage"><span>Edit Thank You page</span></a></li>
        <li><a href="#EditCompetitionOverPage"><span>Edit Competition Over Page</span></a></li>
    </ul>
    <div id="edittemplate">
        <!--Tab One Data-->
        <div id="mainraper">
            <!--Comp1 BgColor Edit Button -->
            <div  style="position:absolute;margin-top:-25px;margin-left:0px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Edit bgcolor</a>
            </div>
            <!--End Comp1 BgColor Edit Button -->
                <!--Content Div -->
            <div id="contentdiv"> 
                <!--head porition -->
                <div id="bannerbg">
                    <div  style="position: absolute; margin-top: -25px; margin-left: 600px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Edit bgcolor</a> 
                    </div>
                    <div id="bannertxtbg"> 
                        <div  style="position: absolute; margin-top: -25px; margin-left: 600px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change Image</a> 
                        </div>		
                        <h2><?=$quiz['qheading']?></h2>
                        <div  style="position: absolute; margin-top: -49px; margin-left: -25px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$quiz['id'];?>&ftype=quizhead">Edit Text</a> 
                        </div>
                        <p><?=$quiz['qdescription']?></p>
                        <div  style="position: absolute; margin-left: 130px; margin-top: -21px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$quiz['id'];?>&ftype=quizdes">Edit Text</a> 
                        </div>
                    </div>		
                </div>
                <!--End head porition -->
                <!--Question porition -->
                <div style="clear:both"></div>
                <?php foreach($options as $option){
                if($option['is_hide']==1){
                ?>
                <div id="quizdiv">
                    <div class="tab-inpt-ccc"><input type="radio" name="quiz"></div>
                    <div class="tab-cnt"><?=$option['optiontxt'];?>
                        <div  style="position: absolute; margin-left: 580px; margin-top: -50px;margin-bottom:10px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$option['id'];?>&ftype=quizans">Edit Text</a> 
                            |
                            <a href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$option['id'];?>&ftype=quizans&ins=fdel">Del</a>
                        </div>
                    </div>
                </div>
                <div style="clear:both"></div>
                <?php }}?>
                <div class="middle-content">
                    <div class="cnt-mddl-inpt">
                        <span class="inpt-title-ddd"><?=$tempdata[2][0]['value']?>
                            <div  style="position: absolute; margin-left: 50px; margin-top: -40px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Edit Text</a> 
                            </div>
                        </span> 
                        <br>
                        <input type="text" >
                    </div><!---- end cnt-mddl-inpt ------>
                    <div class="cnt-mddl-inpt">
                        <span class="inpt-title-ddd"><?=$tempdata[2][1]['value']?>
                            <div  style="position: absolute; margin-left: 50px; margin-top: -40px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Edit Text</a> 
                            </div>
                        </span><br>
                        <input type="text" >
                    </div><!---- end cnt-mddl-inpt ------>
                    <div class="cnt-mddl-inpt">
                        <span class="inpt-title-ddd"><?=$tempdata[2][2]['value']?>
                            <div  style="position:absolute;margin-left: 50px; margin-top: -20px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][2]['id'];?>&ftype=<?=$tempdata[2][2]['typeid'];?>">Edit Text</a> 
                            </div>
                        </span><br>
                        <input type="text" >
                    </div><!---- end cnt-mddl-inpt ------>
                    <div class="cnt-mddl-inpt">
                        <span class="inpt-title-ddd"><?=$tempdata[2][3]['value']?>
                            <div  style="position:absolute;margin-left: 50px; margin-top: -20px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][3]['id'];?>&ftype=<?=$tempdata[2][3]['typeid'];?>">Edit Text</a> 
                            </div>
                        </span><br>
                        <input type="text" >
                    </div><!---- end cnt-mddl-inpt ------>
                    <div class="sb-btn"><input type="button" value="Submit"></div>
                </div><!---- end middle content ----->	
                <div style="clear:both"></div>
                <div class="bottom-content">
                    <div  style="position:absolute;margin-left: 0px; margin-top: -20px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Edit bgcolor</a> 
                    </div>
                    <p><?=$tempdata[3][1]['value']?></p>
                    <div  style="position:absolute;margin-left: 250px; margin-top: -20px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Edit Text</a> 
                    </div>
                </div><!--- bottom-content ----->					
            </div><!--End Content Div -->
            <br>
        </div>
        <!--End Tab one Data -->
        <div style="clear: both;"></div>
    </div>
    <div id="editthankyoupage">
        <div id="mainraper">
            <div id="container-thnks">	
                <div  style="position:absolute;margin-top:-30px;margin-left:0px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>&tselect=1">Edit bgcolor</a>
                </div>	
                <!--Content Div -->
                <div id="contentdiv-thnks"> 
                    <!--head porition -->
                    <div  style="position: absolute; margin-top: -25px; margin-left: 600px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][1]['id'];?>&ftype=<?=$tempdata[4][1]['typeid'];?>&tselect=1">Edit bgcolor</a>
                    </div>
                    <div class="thnk-title-div">
                        <?=$tempdata[4][2]['value'];?>			
                    </div><!--- thnk-title-div ---->
                    <div  style="position: absolute; margin-top: -35px; margin-left: 600px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][2]['id'];?>&ftype=<?=$tempdata[4][2]['typeid'];?>&tselect=1">Edit Text</a>
                    </div>
                    <div class="mdl-img-cnt">
                        <div  style="position: absolute; margin-top: 0px; margin-left: 600px;" align="center" class="tempeditpng">
                                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][3]['id'];?>&ftype=<?=$tempdata[4][3]['typeid'];?>&tselect=1">Change Image</a>
                        </div>
                        <img src="<?=base_url();?>images/images/<?=$tempdata[4][3]['value'];?>" width="740">
                    </div><!---- midle image content---->		
                </div><!--End Content Div -->	
            </div>
        </div>	
    </div>	
    <div id="EditCompetitionOverPage">
        <div id="mainraper">
            <div id="container-cmpt-ovr">
                <div  style="position:absolute;margin-top:-35px;margin-left:0px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][0]['id'];?>&ftype=<?=$tempdata[5][0]['typeid'];?>&tselect=2">Edit bgcolor</a> 
                </div>
                <!--Content Div -->
                <div id="contentdiv-cmpt-ovr"> 
                    <!--head porition -->
                    <div class="cmpt-ovr-img-cnt">
                        <div  style="position: absolute; margin-top: 0px; margin-left: 650px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][1]['id'];?>&ftype=<?=$tempdata[5][1]['typeid'];?>&tselect=2">Change Image</a>
                        </div>
                        <img src="<?=base_url();?>images/images/<?=$tempdata[5][1]['value']?>" width="794">
                    </div><!--- compitition over page image content ----->		
                </div><!--End Content Div -->
            </div>
	</div>
    </div>