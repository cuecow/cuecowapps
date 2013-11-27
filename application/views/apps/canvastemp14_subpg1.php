<?php
$subpg1 = $subpgdata;
$this->load->view('styles/style14_subpg');
$this->load->view('timezone');

?>

<div class="christmas-popup-one-data">
    <div class="left-col">
        <div class="item-outer">
            <div class="item-thumbnail">
                <div class="image-container">
                    <img src="<?=base_url();?>images/images/<?=$subpg1['mainimage'];?>" width="100" class="thumbnail-image" />
                </div><!--- image-container --->
                <div class="popup-separator"></div>
                <span class="item-name"><?=$subpg1['imgcaption'];?></span>
                <span class="older-price"><?=$subpg1['beforeprice'];?></span>
                <span class="new-price"><?=$subpg1['afterprice'];?></span>
            </div><!--- item-thumbnail --->
        </div><!--- item-outer --->
    </div><!--- left-col --->
    <div class="right-col">
        <span class="heading-one"><?=$subpg1['rheading'];?></span>
        <span class="subtitle"><?=$subpg1['rsubheading'];?></span>
        <p><?=$subpg1['description'];?></p>
        <span class="line-three"><a href="<?="http://".$subpg1['buytxtlink'];?>" target="_blank"><?=$subpg1['buytxt'];?></a></span>
        <div class="leftdaytochrismas" style="margin-top: 20px;">        
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
        <?=$subpg1['leftdaytxt'];?>
        </div>
    </div><!--- right-col --->
</div><!--- christmas-popup-one-data --->