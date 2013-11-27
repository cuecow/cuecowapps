<div class="content-right">
    <div id="content_data" style="margin-left:50px;margin-top:3px;">
        <div class="title-crumbs">
            <h2 style="margin-bottom:5px;">Select the app you would like to install on your page from the below list</h2>
            <h5>Missing an app from the list? Feel free to contact us and we will most likely have it already - or just develop it very quickly.</h5>
            <br />
        </div>
        <div style="width:100%;" class="applistbox">
            <?php foreach($applist as $apps){?>
            <a href="<?=base_url();?>index.php/page/templates?aid=<?=base64_encode($apps['id']);?>" class="temp-thumb-content">
                    <h3 class="temp-thumb-heading"><?=$apps['app_type'];?></h3>
                <p class="temp-thumb-discription"><?=$apps['description'];?></p>
                <img src="<?=base_url();?>images/appsimgs/<?=$apps['app_pic'];?>" class="temp-thumb-image-cnt" width="193" />
            </a><!--- temp-thumb-content --->
            <!--<div class="apppic" style="float:left;">
                <a href="<?=base_url();?>index.php/page/templates?aid=<?=base64_encode($apps['id']);?>"><img src="<?=base_url();?>images/appsimgs/<?=$apps['app_pic'];?>" /></a>
            </div>-->
            <?php }?>
            <div style="clear:both;"></div>
        </div>
    </div>				
    <div style="clear:both;"></div>
</div>
<div style="clear:both;"></div>