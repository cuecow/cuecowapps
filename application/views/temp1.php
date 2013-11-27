<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<div id="pg-five-rapper">
    <div id="pg-five-header"> 
        <!--Comp1 BgColor Edit Button -->
        <div  style="position:absolute;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][2]['id'];?>&ftype=2">Edit bgcolor</a> <!--Edit bgcolor -->
        </div>
        <!--End Comp1 BgColor Edit Button -->
        <h3><?=$tempdata[0][0]['value'];?></h3>		
        <!--Comp1 Text Edit Button -->
        <div style="position:absolute;margin-left:570px;margin-top:-22px;" class="tempeditpng" align="center">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Edit text</a>
        </div> 
        <!--End Comp1 Text Edit Button -->
    </div>
    <!--------end header contetn html------------->
    <div class="clear"></div>
    <div id="pg-five-top-content">
            <div style="position:absolute;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][3]['id'];?>&ftype=2">Edit bgcolor</a>
            </div>
            <div class="top-content-inner-text-field">
            <div class="inner-left">
                <div class="line-text"><?=$tempdata[1][1]['value']?></div>
                <div style="position:absolute;margin-left:330px;margin-top:-47px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Edit heading</a>
                </div>
                <!--document.getElementById('tid').value='13'-->
                <ul>
                    <?=$tempdata[1][2]['value']?>
                </ul>
                <div style="position:absolute;margin-left:350px;margin-top:-80px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][2]['id'];?>&ftype=<?=$tempdata[1][2]['typeid'];?>">Edit text</a>
                </div>
            </div>
            <!------------end inner left---------------->
            <div class="inner-right">
            </div>
            <!-----------inner right------------->
        </div>
    </div>
    <!---------------end top content div------------------>
    <div class="clear"></div>
    <div class="page-five-middle-div">
        <div class="middle-left-tab">
            <div style="position:absolute;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][5]['id'];?>&ftype=2">Edit bgcolor</a>
            </div>
            <div class="left-title-udv">
                <?=$tempdata[2][0]['value']?>
            </div>
            <div style="position:absolute;margin-left:270px;margin-top:-42px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>">Edit heading</a>
            </div>

            <div class="left-salogan-udv"><?=$tempdata[2][1]['value']?></div>
            <div style="position:absolute;margin-left:275px;margin-top:-20px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>">Edit text</a>
            </div>
            <div class="smart-phones"><img src="<?=base_url()?>images/images/<?=$tempdata[2][2]['value']?>" width="207" height="98" ></div>
            <div style="position:absolute;margin-left:250px;margin-top:-20px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][2]['id'];?>&ftype=<?=$tempdata[2][2]['typeid'];?>">Change images</a>
            </div>

            <div class="button-udu"><?=$tempdata[2][4]['value']?></div>
            <div style="position:absolute;margin-left:105px;margin-top:-30px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][4]['id'];?>&ftype=<?=$tempdata[2][4]['typeid'];?>">Edit text</a>
            </div>
        </div>
        <!----------end middle left tab--------------------->
        <div class="middle-right-tab">
            <div style="position:absolute;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][6]['id'];?>&ftype=2">Edit bgcolor</a>
            </div>
            <div class="left-title-udv"><?=$tempdata[3][0]['value']?></div>
            <div style="position:absolute;margin-left:270px;margin-top:-35px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id']?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Edit heading</a>
            </div>

            <div class="left-salogan-udv"><?=$tempdata[3][1]['value']?></div>							
            <div style="position:absolute;margin-left:270px;margin-top:-20px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id']?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Edit text</a>
            </div>
            <div class="smart-phones-right" style="background:url(<?=base_url();?>images/images/<?=$tempdata[3][2]['value']?>) no-repeat;">
            <ul>
                <?=$tempdata[3][3]['value']?>
            </ul>
            <div style="position:absolute;margin-left:-70px;margin-top:-55px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][3]['id']?>&ftype=<?=$tempdata[3][3]['typeid'];?>">Edit text</a>
            </div>
        </div>
            <div class="button-udu"><?=$tempdata[3][5]['value']?></div>
            <div style="position:absolute;margin-left:105px;margin-top:-30px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][5]['id'];?>&ftype=<?=$tempdata[3][5]['typeid'];?>">Edit text</a>
            </div>
        </div>
                    <!----------end middle right tab--------------------->
    </div>
    <!------------end page five middle--------------->
    <div class="clear"></div>
    <div class="pg-five-bottom-div">
        <div class="bottom-div-title"><?=$tempdata[4][0]['value']?></div>
        <div style="position:absolute;margin-left:160px;margin-top:-30px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>">Edit heading</a>
        </div>

        <div class="bottom-div-salogan"><?=$tempdata[4][1]['value'];?></div>
        <div style="position:absolute;margin-left:500px;margin-top:-30px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][1]['id'];?>&ftype=<?=$tempdata[4][1]['typeid'];?>">Edit text</a>
        </div>
        <div class="bottom-pic-image"><a href="#"><img src="<?=base_url();?>images/images/<?=$tempdata[4][2]['value']?>" width="123" /></a></div>
        <div style="position:absolute;margin-left:550px;margin-top:-40px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][3]['id'];?>&ftype=<?=$tempdata[4][3]['typeid'];?>">Change Image</a>
        </div>
    </div>
    <!--------------end bottom div----------------->
</div>