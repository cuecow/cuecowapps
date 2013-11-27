<?php
$this->load->view('styles/style'.$tempid,$tempdata);?>

<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<?php $mode = (isset($_REQUEST['mode'])? $_REQUEST['mode'] : '');?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		        
    </ul>
<div id="edittemplate">
    <div class="page-design-main-wrapper">
        <div  style="position:absolute;margin-top:-20px;margin-left:680px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change BG Color</a>
        </div>     
            <div class="page-design-top-slice">
        </div><!--- page-design-top-slice --->
        <div class="page-design-data-slice">
            <div class="page-design-top-container">
                    <div  style="position:absolute;margin-top:-34px;margin-left:300px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change Color</a>
                    </div>
                    <div  style="position:absolute;margin-top:-32px;margin-left:-130px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change Text</a>
                    </div>
                    <h2><?=$tempdata[1][1]['value'];?></h2>
                    <div  style="position:absolute;margin-top:-12px;margin-left:700px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[1][2]['id'];?>&ftype=<?=$tempdata[1][2]['typeid'];?>&width=146&height=50">Change Image</a>
                    </div>
                    <a href="#" class="page-design-logo-header"><img src="<?=  base_url();?>images/146X50/<?=$tempdata[1][2]['value'];?>" width="145" height="17" /></a>
                <div class="clear"></div>
            </div><!--- page-design-top-container --->
            <div class="clear" style="padding:5px"></div>
            <div class="page-design-data-container">
            <div  style="position:absolute;margin-top:13px;margin-left:-111px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>&width=760&height=455">Change Image</a>
            </div>  
            <img src="<?=  base_url();?>images/760X455/<?=$tempdata[2][0]['value'];?>" style="width:760px; height: 455px;" />
                    <div class="page-design-header-cnt">
                        <div  style="position:absolute;margin-top:-29px;margin-left:227px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Change Color</a>
                        </div>
                        <div  style="position:absolute;margin-top:-29px;margin-left:-150px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][2]['id'];?>&ftype=<?=$tempdata[2][2]['typeid'];?>">Change Text</a>
                        </div>
                        <h2><?=$tempdata[2][2]['value'];?></h2>
                        <div  style="position:absolute;margin-top:-1px;margin-left:-150px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][3]['id'];?>&ftype=<?=$tempdata[2][3]['typeid'];?>">Change Text</a>
                        </div>
                        <p><?=$tempdata[2][3]['value'];?></p>
                    <ul class="page-design-list">
                        <div  style="position:absolute;margin-top:-16px;margin-left:174px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][4]['id'];?>&ftype=<?=$tempdata[2][4]['typeid'];?>">Change Text</a>
                        </div>
                        <?=$tempdata[2][4]['value'];?>
                    </ul>

                </div><!--- page-design-header-cnt --->
                <div class="clear"></div>
            </div><!--- page-design-data-container --->
            <div class="page-design-middle-container">

            <div class="page-design-middle-left">
                    <div class="page-design-photos-cnt">
                    <div  style="position:absolute;margin-top:-1px;margin-left:-126px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>&width=122&height=228">Change Image</a>
                    </div>
                    <img src="<?=  base_url();?>images/122X228/<?=$tempdata[3][0]['value'];?>" style="width:117px; height: 228px;" class="page-design-images-thmb" />
                    <div  style="position:absolute;margin-top:-19px;margin-left:114px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>&width=122&height=228">Change Image</a>
                    </div>
                    <img src="<?=  base_url();?>images/122X228/<?=$tempdata[3][1]['value'];?>" style="width:117px; height: 228px;" class="page-design-images-thmb" />
                    <div  style="position:absolute;margin-top:-20px;margin-left:260px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>&width=122&height=228">Change Image</a>
                    </div>
                    <img src="<?=  base_url();?>images/122X228/<?=$tempdata[3][2]['value'];?>" style="width:117px; height: 228px;" class="page-design-images-thmb" />
                    <div class="clear"></div>
                    <div  style="position:absolute;margin-top:53px;margin-left:246px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][4]['id'];?>&ftype=<?=$tempdata[3][4]['typeid'];?>">Change Color</a>
                    </div>
                    <div  style="position:absolute;margin-top:-6px;margin-left:-138px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][3]['id'];?>&ftype=<?=$tempdata[3][3]['typeid'];?>">Change Text</a>
                    </div>
                    <p><?=$tempdata[3][3]['value'];?></p>
                </div><!--- page-design-photos-cnt --->
                <div class="page-design-left-middle-btm-cnt">
                    <div  style="position:absolute;margin-top:-19px;margin-left:-146px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][5]['id'];?>&ftype=<?=$tempdata[3][5]['typeid'];?>">Change Text</a>
                    </div>
                    <h3><?=$tempdata[3][5]['value'];?></h3>
                    <div  style="position:absolute;margin-top:1px;margin-left:-146px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][6]['id'];?>&ftype=<?=$tempdata[3][6]['typeid'];?>">Change Text</a>
                    </div>
                    <p><?=$tempdata[3][6]['value'];?></p>
                </div><!--- page-design-left-middle-btm-cnt --->
            </div><!--- page-design-middle-left --->
            <div class="page-design-middle-right">
                    <div  style="position:absolute;margin-top:52px;margin-left:309px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[4][1]['id'];?>&ftype=<?=$tempdata[4][1]['typeid'];?>&width=372&height=370">Change Image</a>
                    </div>
                    <img src="<?=  base_url();?>images/372X370/<?=$tempdata[4][1]['value'];?>" style="width:372px; height: 370px;" />
                <div  style="position:absolute;margin-top:-463px;margin-left:152px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>">Change Text</a>
                </div>
                <h3><?=$tempdata[4][0]['value'];?></h3>
                <div class="clear"></div>

            </div><!--- page-design-middle-right --->
            <div class="clear"></div>
            </div><!--- page-design-middle-container --->
            <div class="clear"></div>
            <div class="page-design-bottom-container">
                    <div  style="position:absolute;margin-top:-29px;margin-left:702px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][0]['id'];?>&ftype=<?=$tempdata[5][0]['typeid'];?>">Change Color</a>
                    </div>
                    <div  style="position:absolute;margin-top:-28px;margin-left:-142px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][1]['id'];?>&ftype=<?=$tempdata[5][1]['typeid'];?>">Change Text</a>
                    </div>
                    <p><?=$tempdata[5][1]['value'];?></p>
                <div class="clear"></div>
            </div><!--- page-design-bottom-container --->
        <div class="clear"></div>
        </div><!--- page-design-main-data --->
        <div class="page-design-bottom-slice">
        </div><!--- page-design-bottom-slice --->
    </div><!--- page-design-main-wrapper --->
<!-- </div>
    <div id="editthankyoupage"></div>	
    <div id="EditCompetitionOverPage"></div>
</div> -->