<?php
$this->load->view('timezone');
$subpg1 = array(
    'id' => $this->session->userdata('pgvalid'),
    'mainimage' => $this->session->userdata('mainimage'),
    'imgcaption' => $this->session->userdata('imgcaption'),
    'beforeprice' => $this->session->userdata('beforeprice'),
    'afterprice' => $this->session->userdata('afterprice'),
    'rheading' => $this->session->userdata('rheading'),
    'rsubheading' => $this->session->userdata('rsubheading'),
    'buytxtlink' => $this->session->userdata('buytxtlink'),
    'description' => $this->session->userdata('description'),
    'buytxt' => $this->session->userdata('buytxt'),
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

$b_url = 'http://'.$subpg1['buytxtlink'];


?>
<div class="christmas-popup-one-data">
    <div class="left-col">
        <div class="item-outer">
            <div class="item-thumbnail">
                <div class="image-container">
                    <img src="<?=base_url();?>images/images/<?=$subpg1['mainimage'];?>" width="100" class="thumbnail-image" />
                    <div  style="position: absolute; margin-top: -147px; margin-left: -28px;" align="center" class="tempeditpng">
<!--                        <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg1['id'];?>&fname=mainimage&ftype=3&fval=<?=base64_encode($subpg1['mainimage']);?>&subpgid=<?=$subpgid;?>">Change image</a>-->
                        <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg1['id'];?>&fname=mainimage&ftype=3&width=160&height=100">Change image</a>
                    </div>    
                </div><!--- image-container --->
                <div class="popup-separator"></div>
                <div  style="position: absolute; margin-top: -17px; margin-left: -56px;" align="center" class="tempeditpng">
<!--                    <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg1['id'];?>&fname=imgcaption&ftype=1&fval=<?=base64_encode($subpg1['imgcaption']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg1['id'];?>&fname=imgcaption&ftype=1&fval=<?=base64_encode($subpg1['imgcaption']);?>">Change Text</a>
                </div>
                <span class="item-name"><?=$subpg1['imgcaption'];?></span>
                <div  style="position: absolute; margin-top: 31px; margin-left: -57px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg1['id'];?>&fname=beforeprice&ftype=1&fval=<?=base64_encode($subpg1['beforeprice']);?>&subpgid=<?=$subpgid;?>">Change Price</a>
                </div>
                <span class="older-price"><?=$subpg1['beforeprice'];?></span>
                <div  style="position: absolute; margin-top: 27px; margin-left: 127px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg1['id'];?>&fname=afterprice&ftype=1&fval=<?=base64_encode($subpg1['afterprice']);?>&subpgid=<?=$subpgid;?>">Change Price</a>
                </div>
                <span class="new-price"><?=$subpg1['afterprice'];?></span>
            </div><!--- item-thumbnail --->
        </div><!--- item-outer --->
    </div><!--- left-col --->
    <div class="right-col">
        <div  style="position: absolute; margin-top: -28px; margin-left: 59px;" align="center" class="tempeditpng">
<!--            <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg1['id'];?>&fname=rheading&ftype=1&fval=<?=base64_encode($subpg1['rheading']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg1['id'];?>&fname=rheading&ftype=1&fval=<?=base64_encode($subpg1['rheading']);?>">Change Text</a>
        </div>
    	<span class="heading-one"><?=$subpg1['rheading'];?></span>
        <div  style="position: absolute; margin-top: -4px; margin-left: 63px;" align="center" class="tempeditpng">
<!--            <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg1['id'];?>&fname=rsubheading&ftype=1&fval=<?=base64_encode($subpg1['rsubheading']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg1['id'];?>&fname=rsubheading&ftype=1&fval=<?=base64_encode($subpg1['rsubheading']);?>">Change Text</a>
        </div>
        <span class="subtitle"><?=$subpg1['rsubheading'];?></span>
        <div  style="position: absolute; margin-top: 13px; margin-left: 290px;" align="center" class="tempeditpng">
<!--            <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg1['id'];?>&fname=description&ftype=1&fval=<?=base64_encode($subpg1['description']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg1['id'];?>&fname=description&ftype=1&fval=<?=base64_encode($subpg1['description']);?>">Change Text</a>
        </div>
        <p><?=$subpg1['description'];?></p>
        <div  style="position: absolute; margin-top: 5px; margin-left: 77px;" align="center" class="tempeditpng">
<!--            <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg1['id'];?>&fname=buytxt&ftype=1&fval=<?=base64_encode($subpg1['buytxt']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg1['id'];?>&fname=buytxt&ftype=1&fval=<?=base64_encode($subpg1['buytxt']);?>">Change Text</a>
        </div>
        <div  style="position: absolute; margin-top: 5px; margin-left: 227px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg1['id'];?>&fname=buytxtlink&ftype=1&fval=<?=base64_encode($subpg1['buytxtlink']);?>&subpgid=<?=$subpgid;?>">Change Link</a>
        </div>
        <span class="line-three"><a href="<?=$b_url;?>" target="_blank"><?=$subpg1['buytxt'];?></a></span>
        <div class="leftdaytochrismas" style="margin-top: 20px;">        
        <div  style="position: absolute; margin-top: 17px; margin-left: 118px;" align="center" class="tempeditpng">
<!--            <a class="editdiv" href="<?=base_url();?>index.php/page/subpg_editpopup?fid=<?=$subpg1['id'];?>&fname=leftdaytxt&ftype=1&fval=<?=base64_encode($subpg1['leftdaytxt']);?>&subpgid=<?=$subpgid;?>">Change Text</a>-->
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id_sp=<?=$subpg_id;?>&fid=<?=$subpg1['id'];?>&fname=leftdaytxt&ftype=1&fval=<?=base64_encode($subpg1['leftdaytxt']);?>">Change Text</a>
        </div>
        <?php
        $now = time();
        $year = date('Y');
        $endTimeStamp = strtotime($year.'/12/24');
        $datediff = $now - $endTimeStamp;
        $count = floor($datediff/(60*60*24));
        
        $year = date("Y",strtotime("-1 year"));
        
        $timeleft = strtotime('25 December'.$year) - time();
        $daysleft = round((($timeleft/24)/60)/60);
        echo $count;
        ?>
        <?=$subpg1['leftdaytxt'];?>
        </div>
    </div><!--- right-col --->
</div><!--- christmas-popup-one-data --->
<div style="margin:20px 0 20px 385px;">
    <a href="<?=base_url();?>index.php/page/viewtemplate"><img src="<?=base_url();?>images/newbutton.png"></a>
    <a href="<?=base_url();?>index.php/page/chrismas_addsubpg?action=dell&pgvalid=<?=$subpg1['id'];?>" onclick="return confirm('are you sure you want to delete this?');"><img src="<?=base_url();?>images/delbutton.png"></a>
</div>