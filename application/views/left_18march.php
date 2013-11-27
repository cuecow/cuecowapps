<div class="content-left">
<table class="styled" style="border:none;"> 
    <tbody> 
        <tr>
            <td style="border:none;">
                <table id="tablesorter-sample" class="styled" cellpadding="0" cellspacing="1"> 
                    <thead> 
                    <tr> 
                        <th style="font-size:13px;"><strong>Wall Name</strong></th> 
                        <th style="font-size:13px;"><strong>Fans</strong></th> 
                    </tr> 
                    </thead> 
                    <tbody> 
                    <?php foreach($pages as $page){?>
                    <tr> 
                        <td style="font-size:13px;"><a class="name-text" href="<?=base_url();?>index.php/page?pid=<?=$page['page']['id'];?>&tkn=<?=(isset($page['page']['access_token'])? base64_encode($page['page']['access_token']) : '');?>"><?=$page['page']["name"]?></a></td>
                        <td align="center" style="font-size:13px;"><?=(isset($page['pagedetail']['likes']) ? $page['pagedetail']['likes'] : '');?></td> 
                    </tr>
                    <?php }?>
                    </tbody> 
                </table>
	</td>
    </tr>
    </tbody> 
</table>
</div>