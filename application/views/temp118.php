<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<div class="main-wrapper">
    <div  style="position: absolute; margin-top: -182px; margin-left: 668px;" align="center" class="tempeditpng">
        <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>&width=810&height=auto">Change Image</a>
    </div>
	<div class="youtube-frame">
		<div class="youtube-discription">
			<p style="font-weight:bold;">Change youtube Channel id.</p>
			<p>http://www.youtube.com/user/<strong>NBCTheVoice</strong> <br /> http://www.youtube.com/channel/<strong>UCdhP9_Z58OKQIy7_dv9acCw</strong></p>
			<!--<p class="">(Channel id: <strong>NBCthevoice</strong> Or <strong>UCdhP9_Z58OKQIy7_dv9acCw</strong>)</p>-->
		</div>
	<form id="frm" name="frm" method="post" action="<?=base_url();?>index.php/page/save_youtubeurl"> 
        <div class="youtube-fields">
            <input type="text" name="yutube_url" id="yutube_url" class="text-field" value="<?=$tempdata[0][1]['value'];?>" placeholder="Write your youtube Channel id here!"/> 
            <input type="hidden" name="urlid" id="urlid" value="<?=$tempdata[0][1]['id'];?>" />
			<div class="clearfix"></div>
            <button type="submit" class="btn btn-primary sve_btn">Save</button>
        </div>
    </form>
		</div>
</div>