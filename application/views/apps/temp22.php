<?php
$this->load->view('styles/style'.$tempid,$tempdata);?>
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<?php $mode = (isset($_REQUEST['mode'])? $_REQUEST['mode'] : '');?>
<div style="margin-top: 21px; margin-bottom: -21px">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#edittemplate">Edit Template</a></li>
            <li><a href="#edittemplate">Edit Template</a></li>
       </ul>
    <div style="clear:both;"></div>
</div>    
<div id="edittemplate">
    <div class="food-design-main-wrapper">
            <div class="food-design-top-slice">
        </div><!--- food-design-top-slice --->
        <div class="food-design-data-slice">
            <div  style="position: absolute; margin-top: -12px; margin-left: -104px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change Text</a>
            </div>
            <div  style="position: absolute; margin-top: -17px; margin-left: 339px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change Color</a>
            </div>
            <div class="food-design-top-container">
                    <h2><?=$tempdata[1][1]['value'];?></h2>
                    <div  style="position: absolute; margin-top: -32px; margin-left: 704px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][2]['id'];?>&ftype=<?=$tempdata[1][2]['typeid'];?>">Change image</a>
                    </div>
                    <a href="#" class="food-design-logo-header"><img src="<?=  base_url();?>images/images/<?=$tempdata[1][2]['value'];?>" width="122" height="" /></a>
                <div class="clear"></div>
            </div><!--- food-design-top-container --->
            <div class="clear" style="padding:5px"></div>
            <div class="food-design-data-container">
            <div  style="position: absolute; margin-top: 5px; margin-left: -112px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Change image</a>
            </div>
            <img src="<?=  base_url();?>images/images/<?=$tempdata[2][0]['value'];?>" width="760" height="473" />
                    <div class="food-design-header-cnt">
                    <div  style="position: absolute; margin-top: -31px; margin-left: 204px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Change Color</a>
                    </div>
                    <div  style="position: absolute; margin-top: -31px; margin-left: -112px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][2]['id'];?>&ftype=<?=$tempdata[2][2]['typeid'];?>">Change Text</a>
                    </div>
                    <h2><?=$tempdata[2][2]['value'];?></h2>
                    <div  style="position: absolute; margin-top: 5px; margin-left: -149px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][3]['id'];?>&ftype=<?=$tempdata[2][3]['typeid'];?>">Change Text</a>
                    </div>
                    <p><?=$tempdata[2][3]['value'];?></p>
                    <div  style="position: absolute; margin-top: -19px; margin-left: 171px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][4]['id'];?>&ftype=<?=$tempdata[2][4]['typeid'];?>">Change Text</a>
                    </div>
                    <ul class="food-design-list">
                    <?=$tempdata[2][4]['value'];?>
                    </ul>

                </div><!--- food-design-header-cnt --->
                <div class="food-design-discription-cnt">
                    <div  style="position: absolute; margin-top: 21px; margin-left: 268px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][6]['id'];?>&ftype=<?=$tempdata[2][6]['typeid'];?>">Change Text</a>
                    </div>
                    <h3 class="food-design-discription-cnt-heading"><?=$tempdata[2][6]['value'];?></h3>
                    <div class="clear"></div>
                    <div  style="position: absolute; margin-top: -34px; margin-left: 284px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][7]['id'];?>&ftype=<?=$tempdata[2][7]['typeid'];?>">Change Text</a>
                    </div>
                    <p class="food-design-discription-cnt-ds"><?=$tempdata[2][7]['value'];?></p>
                </div><!--- food-design-discription-cnt --->
                <div class="clear"></div>
            </div><!--- food-design-data-container --->
            <div class="food-design-middle-container">

            <div class="food-design-middle-left">
                <div style="height:215px;"></div>
                <div class="food-design-left-middle-btm-cnt food-design-orng-tb">
                    <div  style="position: absolute; margin-top: 174px; margin-left: -127px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][3]['id'];?>&ftype=<?=$tempdata[3][3]['typeid'];?>">Change Color</a>
                    </div>
                    <div  style="position: absolute; margin-top: -31px; margin-left: -128px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][4]['id'];?>&ftype=<?=$tempdata[3][4]['typeid'];?>">Change Text</a>
                    </div>
                    <h3><?=$tempdata[3][4]['value'];?></h3>
                    <div  style="position: absolute; margin-top: -7px; margin-left: -148px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][5]['id'];?>&ftype=<?=$tempdata[3][5]['typeid'];?>">Change Text</a>
                    </div>
                    <p><?=$tempdata[3][5]['value'];?></p>

                </div><!--- food-design-left-middle-btm-cnt --->
            </div><!--- food-design-middle-left --->
            <div class="food-design-middle-right">
                    
                <div class="food-design-middle-right-cnt">
                <div  style="position: absolute; margin-top: -34px; margin-left: 180px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Change Text</a>
                </div>
                <div  style="position: absolute; margin-top: 4px; margin-left: 276px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>">Change Text</a>
                </div>
                    <h3><?=$tempdata[3][1]['value'];?></h3>
                    <p><?=$tempdata[3][2]['value'];?></p>
                    <div  style="position: absolute; margin-top: 4px; margin-left: 286px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][6]['id'];?>&ftype=<?=$tempdata[3][6]['typeid'];?>">Change Image</a>
                    </div>
                    <img src="<?=  base_url();?>images/images/<?=$tempdata[3][6]['value'];?>" width="335" height="235" />
                </div><!--- food-design-middle-right-cnt ---->
                <div class="clear"></div>

            </div><!--- food-design-middle-right --->
            <div class="clear"></div>
            </div><!--- food-design-middle-container --->
            <div class="clear"></div>
            <div class="food-design-bottom-container">
            <div  style="position: absolute; margin-top: -30px; margin-left: 691px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>">Change Color</a>
            </div>
            <div  style="position: absolute; margin-top: -20px; margin-left: -147px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][1]['id'];?>&ftype=<?=$tempdata[4][1]['typeid'];?>">Change Text</a>
            </div>
                    <p><?=$tempdata[4][1]['value'];?></p>

                <div class="clear"></div>
            </div><!--- food-design-bottom-container --->
        <div class="clear"></div>
        </div><!--- food-design-main-data --->
        <div class="food-design-bottom-slice">
        </div><!--- food-design-bottom-slice --->
    </div><!--- food-design-main-wrapper --->
</div><!--- edittemplate --->
<!-- </div>
    <div id="editthankyoupage"></div>	
    <div id="EditCompetitionOverPage"></div>
</div> -->