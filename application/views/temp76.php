<?php
$this->load->view('styles/style'.$tempid,$tempdata);?>
<pre><?php //print_r($tempdata);?></pre>
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<?php $mode = (isset($_REQUEST['mode'])? $_REQUEST['mode'] : '');?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		        
    </ul>
 </div>   
<div id="edittemplate">
    <div class="design-entertain-main-wrapper">
            <div class="design-entertain-top-slice">
        </div><!--- design-entertain-top-slice --->
        <div class="design-entertain-data-slice">
            <div class="design-entertain-data-container">
            <div  style="position: absolute; margin-top: 2px; margin-left: 674px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change Image</a>
            </div>
            <img src="<?=  base_url();?>images/images/<?=$tempdata[1][0]['value'];?>" width="760" height="473" />
                    <div class="design-entertain-header-cnt">
                        <div  style="position: absolute; margin-top: -36px; margin-left: 80px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change Text</a>
                        </div>
                        <h1><?=$tempdata[1][1]['value'];?></h1>
                        <div  style="position: absolute; margin-top: 161px; margin-left: -104px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][2]['id'];?>&ftype=<?=$tempdata[1][2]['typeid'];?>">Change Text</a>
                        </div>
                        <p><?=$tempdata[1][2]['value'];?></p>
                </div><!--- design-entertain-header-cnt --->
                <div class="clear"></div>
            </div><!--- design-entertain-data-container --->
            <div style="padding:5px 0"></div>
            <div class="design-entertain-bottom-container">
                <div  style="position: absolute; margin-top: -21px; margin-left: 714px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Change Color</a>
                </div>
                <div  style="position: absolute; margin-top: -21px; margin-left: -148px;;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Change Text</a>
                </div>
                <?=$tempdata[2][1]['value'];?>
                <div class="clear"></div>
            </div><!--- design-entertain-bottom-container --->
            <div class="design-entertain-middle-container">

            <div class="design-entertain-middle-left">
                    <div  style="position: absolute; margin-top: 1px; margin-left: -138px;;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Change Text</a>
                    </div>
                    <div  style="position: absolute; margin-top: 1px; margin-left: 238px;;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change Color</a>
                    </div>
                    <span class="design-entertain-mddl-left-top-cnt"><?=$tempdata[3][1]['value'];?></span>
                <div  style="position: absolute; margin-top: 21px; margin-left: -118px;;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>">Change Image</a>
                </div>
                <img src="<?=  base_url();?>images/images/<?=$tempdata[3][2]['value'];?>" width="377" height="180" class="design-entertain-middle-left-img-two" />
                <span style="clear:both; display:block; padding:30px 0 0 10px;">
                    <div  style="position: absolute; margin-top: -11px; margin-left: -148px;;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][3]['id'];?>&ftype=<?=$tempdata[3][3]['typeid'];?>">Change Text</a>
                    </div>
                    <h3><?=$tempdata[3][3]['value'];?></h3>
                    <div  style="position: absolute; margin-top: 49px; margin-left: -148px;;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][4]['id'];?>&ftype=<?=$tempdata[3][4]['typeid'];?>">Change Text</a>
                    </div>
                    <p><?=$tempdata[3][4]['value'];?></p>
                </span>
            </div><!--- design-entertain-middle-left --->
            <div class="design-entertain-middle-right">
                    <div  style="position: absolute; margin-top: 8px; margin-left: 338px;;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][5]['id'];?>&ftype=<?=$tempdata[3][5]['typeid'];?>">Change Image</a>
                    </div>
                    <img src="<?=  base_url();?>images/images/<?=$tempdata[3][5]['value'];?>" width="372" height="454" />
                <div class="clear"></div>

            </div><!--- design-entertain-middle-right --->
            <div class="clear"></div>
            </div><!--- design-entertain-middle-container --->
            <div class="clear"></div>
            <div class="design-entertain-footer-container">
                <div  style="position: absolute; margin-top: -8px; margin-left: -138px;;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>">Change Color</a>
                </div>
                <div  style="position: absolute; margin-top: -28px; margin-left: 718px;;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][1]['id'];?>&ftype=<?=$tempdata[4][1]['typeid'];?>">Change Image</a>
                </div>
                <a href="#" class="design-entertain-bottom-logo"><img src="<?=  base_url();?>images/images/<?=$tempdata[4][1]['value'];?>" width="88" height="24" /></a>
                <div class="clear"></div>
            </div><!--- design-entertain-bottom-container --->
        <div class="clear"></div>
        </div><!--- design-entertain-main-data --->
        <div class="design-entertain-bottom-slice">
        </div><!--- design-entertain-bottom-slice --->
    </div><!--- design-entertain-main-wrapper --->
</div><!--- edittemplate --->
<!-- </div>
    <div id="editthankyoupage"></div>	
    <div id="EditCompetitionOverPage"></div>
</div> -->