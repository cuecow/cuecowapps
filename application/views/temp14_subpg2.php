<?php
$subpg2 = array(
    'id' => $this->session->userdata('pgvalid'),
    'mainimage' => $this->session->userdata('mainimage'),
    'imgcaption' => $this->session->userdata('imgcaption'),
    'beforeprice' => $this->session->userdata('beforeprice'),
    'afterprice' => $this->session->userdata('afterprice'),
    'rheading' => $this->session->userdata('rheading'),
    'rsubheading' => $this->session->userdata('rsubheading'),
    'description' => $this->session->userdata('description'),
    'buytxt' => $this->session->userdata('buytxt'),
    'buytxtlink' => $this->session->userdata('buytxtlink'),
    'leftdaytxt' => $this->session->userdata('leftdaytxt'),
    'labletxt1' => $this->session->userdata('labletxt1'),
    'txtfieldvalue1' => $this->session->userdata('txtfieldvalue1'),
    'labletxt2' => $this->session->userdata('labletxt2'),
    'txtfieldvalue2' => $this->session->userdata('txtfieldvalue2'),
    'submitbtntxt' => $this->session->userdata('submitbtntxt'),
    'thankyoutxt' => $this->session->userdata('thankyoutxt'),
    'sharebtntoptxt' => $this->session->userdata('sharebtntoptxt'),
    'shareimg' => $this->session->userdata('shareimg'),
    'shareimglink' => $this->session->userdata('shareimglink'),
    'subpgtype' => $this->session->userdata('subpgtype'),
    'linkdate' => $this->session->userdata('linkdate'),
    'subpgday' => $this->session->userdata('subpgday')
);
$subpg_id = $_REQUEST['subpgid'];
?>
<div class="christmas-popup-two-data">
	<div class="left-col">
    	<div class="item-outer">
    	<div class="item-thumbnail">
            <div class="image-container">
                <img src="<?=base_url();?>images/images/<?=$subpg2['mainimage'];?>" width="100" class="thumbnail-image"/>
                <div  style="position: absolute; margin-top: -147px; margin-left: -28px;" align="center" class="tempeditpng">
<!--                    <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg2['id'];?>&fname=mainimage&ftype=3&fval=<?=base64_encode($subpg2['mainimage']);?>&subpgid=<?=$subpgid;?>">Change image</a>-->
                    <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg2['id'];?>&fname=mainimage&ftype=3&width=160&height=100">Change image</a>
                </div>
            </div><!--- image-container --->
        </div><!--- item-thumbnail --->
        </div><!--- item-outer --->
    </div><!--- left-col --->
    <div class="right-col">
        <div  style="position: absolute; margin-top: -33px; margin-left: 16px;" align="center" class="tempeditpng">
<!--            <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg2['id'];?>&fname=rheading&ftype=1&fval=<?=base64_encode($subpg2['rheading']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg2['id'];?>&fname=rheading&ftype=1&fval=<?=base64_encode($subpg2['rheading']);?>">Change Text</a>
        </div>
    	<span class="heading-one"><?=$subpg2['rheading'];?></span>
        <div  style="position: absolute; margin-top: -4px; margin-left: 63px;" align="center" class="tempeditpng">
<!--            <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg2['id'];?>&fname=rsubheading&ftype=1&fval=<?=base64_encode($subpg2['rsubheading']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg2['id'];?>&fname=rsubheading&ftype=1&fval=<?=base64_encode($subpg2['rsubheading']);?>">Change Text</a>
        </div>
        <span class="subtitle"><?=$subpg2['rsubheading'];?></span>
        <div  style="position: absolute; margin-top: -3px; margin-left: 265px;" align="center" class="tempeditpng">
<!--            <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg2['id'];?>&fname=description&ftype=1&fval=<?=base64_encode($subpg2['description']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg2['id'];?>&fname=description&ftype=1&fval=<?=base64_encode($subpg2['description']);?>">Change Text</a>
        </div>
        <p><?=$subpg2['description'];?></p>
        <div class="form-content">
            <form method="get">
                <div  style="position: absolute; margin-top: -11px; margin-left: 44px;" align="center" class="tempeditpng">
<!--                    <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg2['id'];?>&fname=labletxt1&ftype=1&fval=<?=base64_encode($subpg2['labletxt1']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg2['id'];?>&fname=labletxt1&ftype=1&fval=<?=base64_encode($subpg2['labletxt1']);?>">Change Text</a>
                </div>
                <span class="field-name"><?=strip_tags($subpg2['labletxt1'],'');?>:</span>
                <input type="text" class="text-field" name="name" />
                <div  style="position: absolute; margin-top: -1px; margin-left: 41px;" align="center" class="tempeditpng">
<!--                    <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg2['id'];?>&fname=labletxt2&ftype=1&fval=<?=base64_encode($subpg2['labletxt2']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg2['id'];?>&fname=labletxt2&ftype=1&fval=<?=base64_encode($subpg2['labletxt2']);?>">Change Text</a>
                </div>
                <span class="field-name"><?=strip_tags($subpg2['labletxt2'],'');?>:</span>
                <input type="text" class="text-field" name="email" />
                <div  style="position: absolute; margin-top: 7px; margin-left: 66px;" align="center" class="tempeditpng">
<!--                    <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg2['id'];?>&fname=submitbtntxt&ftype=1&fval=<?=base64_encode($subpg2['submitbtntxt']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg2['id'];?>&fname=submitbtntxt&ftype=1&fval=<?=base64_encode($subpg2['submitbtntxt']);?>">Change Text</a>
                </div>
                <input type="submit" class="submit" value=" <?=strip_tags($subpg2['submitbtntxt'],'');?>" disabled="disabled" />
            </form>
        </div><!--- form-content --->
        <div class="leftdaytochrismas" style="margin-top:20px;">
        <div  style="position: absolute; margin-top: -4px; margin-left: 128px;" align="center" class="tempeditpng">
<!--            <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg2['id'];?>&fname=leftdaytxt&ftype=1&fval=<?=base64_encode($subpg2['leftdaytxt']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg2['id'];?>&fname=leftdaytxt&ftype=1&fval=<?=base64_encode($subpg2['leftdaytxt']);?>">Change Text</a>
        </div>
            <?php
            $now = time();
            $year = date('Y');
            $endTimeStamp = strtotime($year.'/12/24');
            $datediff = $now - $endTimeStamp;
            $count = floor($datediff/(60*60*24));
            
            $timeleft = strtotime('25 December 2012') - time();
            $daysleft = round((($timeleft/24)/60)/60);
            echo $count;
            ?>
            <?=$subpg2['leftdaytxt'];?>
        </div>
    </div><!--- right-col --->
    <div class="clear"></div>
</div><!--- christmas-popup-one-data --->
<div style="margin:20px 0 20px 385px;">
    <a href="<?=base_url();?>index.php/page/viewtemplate"><img src="<?=base_url();?>images/newbutton.png"></a>
    <a href="<?=base_url();?>index.php/page/chrismas_addsubpg?action=dell&pgvalid=<?=$subpg2['id'];?>" onclick="return confirm('are you sure you want to delete this?');"><img src="<?=base_url();?>images/delbutton.png"></a>
</div>