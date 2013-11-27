<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<div class="main-wrapper">
<!--    <div  style="position:absolute;margin-top:-15px;margin-left:680px;" align="center" class="tempeditpng">
        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change BG Color</a>
    </div>  -->
    <div  style="position: absolute; margin-top: 36px; margin-left: 668px;" align="center" class="tempeditpng">
        <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>&width=810&height=auto">Change Image</a>
    </div>
    <img src="<?= base_url();?>images/810Xauto/<?=$tempdata[0][1]['value'];?>" style="width: 810px;" />               
</div>