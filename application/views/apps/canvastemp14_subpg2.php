<?php
$subpg2 = $subpgdata;
$this->load->view('styles/style14_subpg');
date_default_timezone_set('Europe/Zagreb');
?>
<div class="christmas-popup-two-data">
	<div class="left-col">
    	<div class="item-outer">
    	<div class="item-thumbnail">
            <div class="image-container">
                <img src="<?=base_url();?>images/images/<?=$subpg2['mainimage'];?>" class="thumbnail-image"/>
            </div><!--- image-container --->
        </div><!--- item-thumbnail --->
        </div><!--- item-outer --->
    </div><!--- left-col --->
    <div class="right-col">
        <span class="heading-one"><?=$subpg2['rheading'];?></span>
        <span class="subtitle"><?=$subpg2['rsubheading'];?></span>
        <p><?=$subpg2['description'];?></p>
        <div class="form-content">
            <form method="post" action="<?=base_url();?>index.php/chrismas_app/savevistor" name="frm" onsubmit="return validate();">
                <span class="field-name"><?=strip_tags($subpg2['labletxt1'],'');?>:</span>
                <input type="text" class="text-field" name="name" />
                <span class="field-name"><?=strip_tags($subpg2['labletxt2'],'');?> :</span>
                <input type="text" class="text-field" name="email" />
                <input type="submit" class="submit" value=" <?=strip_tags($subpg2['submitbtntxt'],'');?> " />
                
                <input type="hidden" name="signed_request" value="<?=$_REQUEST['signed_request'];?>" />
                <input type="hidden" name="appid" value="<?=$_REQUEST['appid'];?>" />
                <input type="hidden" name="subpgtype" value="<?=$subpg2['subpgtype']?>" />
                <input type="hidden" name="linkdate" value="<?=$subpg2['linkdate']?>" />
                <input type="hidden" name="competition_id" value="<?=$subpg2['id']?>" />
            </form>
        </div><!--- form-content --->
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
            <?=$subpg2['leftdaytxt'];?>
        </div>
    </div><!--- right-col --->
    <div class="clear"></div>
</div><!--- christmas-popup-one-data--->
<script language="javascript">
function validate()
{
    if(frm.name.value=="")
    {
        alert("You didn't enter name");
        frm.name.focus();
        return false;
    }
    if(frm.email.value=="")
    {
        alert("You didn't enter email");
        frm.email.focus();
        return false;
    }
}
</script>