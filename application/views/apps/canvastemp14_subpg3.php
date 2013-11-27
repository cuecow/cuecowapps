<?php
$subpg3 = $subpgdata;
$this->load->view('styles/style14_subpg');
$this->load->view('timezone');
$pageurl = $this->session->userdata('pageurl');
?>
<script>
function subshare3() {
    u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u=<?=$pageurl."?sk=".$appid;?>&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
    return false;
}
</script>
<div class="christmas-popup-three-data">
	<div class="left-col">
    	<div class="item-outer">
    	<div class="item-thumbnail">
            <div class="image-container">
                <img src="<?=base_url();?>images/images/<?=$subpg3['mainimage'];?>" width="100" class="thumbnail-image" />
            </div><!--- image-container --->
        </div><!--- item-thumbnail --->
        </div><!--- item-outer --->
    </div><!--- left-col --->
    <div class="right-col">
        <span class="heading-one"><?=$subpg3['rheading'];?></span>
        <span class="subtitle"><?=$subpg3['rsubheading'];?></span>
        <p><?=$subpg3['description'];?></p>
        <p class="thanks-line"><?=$subpg3['thankyoutxt'];?></p>
        <div style="margin-bottom:10px;">
            <?=$subpg3['sharebtntoptxt'];?>
        </div>
        <a href="javascript:void(0);" onclick="return subshare3();" class="share-fb-btn" style="margin-top:15px;" target="_blank"><img src="<?=base_url();?>images/images/<?=$subpg3['shareimg'];?>" width="176" /></a>
        <div class="leftdaytochrismas" style="margin-top:20px;">
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
        <?=$subpg3['leftdaytxt'];?>
        </div>
    </div><!--- right-col --->
    <div class="clear"></div>
</div><!--- christmas-popup-one-data --->
