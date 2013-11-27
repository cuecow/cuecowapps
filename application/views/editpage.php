<link rel="stylesheet" href="<?=base_url();?>js/facefiles/facebox.css" />
<script src="<?=base_url();?>js/facefiles/facebox.js"></script>	
<script>
<?php if(isset($_REQUEST['upload'])){?>
        $(document).ready(function() { 
        $.facebox.settings.opacity = 0.5; 
   
        $.get('<?=base_url();?>index.php/page/coverlib', function(html){
            $.facebox(html);
        });
});
<? }?>
jQuery(document).ready(function($){ 
    $('a[rel*=facebox]').facebox() 
})
</script>		
<div class="span9">
    <div id="maindiv" class="top_content_main">
        <div style="margin-top:3px;">
            <div style="position:absolute;margin-left:70px;margin-top:52px;font-family: lucida grande,tahoma,verdana,arial,sans-serif;color: #1C2A47;font-size: 13px;"><strong><?=$page_details['name']?></strong></div>
            <div style="position:absolute;margin-left:20px;margin-top:45px;"><img src="<?=(isset($page_details['picture']) ? $page_details['picture'] : '' );?>" width="36" height="36" /></div>
            <img src="<?=base_url();?>images/head.jpg" width="99%" />
        </div>
        <div style="height:350px;">
            <?php if(isset($page_details['cover']['source'])){?>
            <div style="position:absolute;margin-top:269px;">
                <div style="position:absolute;margin-left:15px;margin-top:9px;" class="FB_pageprofilepicborder"><img src="<?=(isset($page_details['picture']) ? $page_details['picture'] : '' );?>" width="135" height="135" /></div>
                <div style="position:absolute;margin-left:160px;margin-top:100px;" class="FB_page_name">
                <strong><?=$page_details['name']?></strong><br />
                <span><?=$page_details['likes']?> like(s)</span>
                </div>					
                <img src="<?=base_url();?>images/proimg.png" width="882" />
            </div>
            <a href="<?=base_url();?>index.php/page/coverlib" rel="facebox"><img  src="<?=$page_details['cover']['source'];?>" width="880" height="350" /></a>
            <?php }else{?>
            <div style="width:880px;padding-top:100px;" align="center">
                Cover Picture not uploaded yet <a href="<?=base_url();?>index.php/page/coverlib" rel="facebox">Click here to upload</a>
            </div>
            <?php }?>				
        </div>
        <div align="right" style="margin-top:69px;">
            <div class="catagry_about">
                <div  style="margin-top:10px;margin-right:150px;"><?=$page_details['category'];?></div>
                <div class="clear"></div>
                <div style="margin:2px 6px 0px 10px;text-align:left;"><?php if(isset($page_details['about'])){ echo $page_details['about']; }else{ echo "About Not updated yet";}?></div>
        </div>
         <div style="float:right">
            <div class="pic-tab" style="margin-right: 85px">
                    <div style="position:absolute;margin-left:41px;margin-top:25px;color:#1C2A47;font-size:20px;">
                    <strong>
                    <?=(isset($page_details['likes']) ? $page_details['likes'] : '');?>
                    </strong>
                    </div>
                    <img src="<?=base_url();?>images/likesimg.jpg" width="111" height="74" style="max-width: 111px; height: 90px;" />
                <div class="clear"></div>
                <span  style="margin-right: 35px">Likes</span>
            </div>
            <div class="pic-tab" style="margin-right: 85px">
                        <img src="<?=(isset($page_details['picture']) ? $page_details['picture'] : 'https://apps2.cuecow.com/images/pgdefaultimg.jpg' );?>" width="111" height="74" style="max-width: 111px; height: 90px;" />
                <div class="clear"></div>
                <span  style="margin-right: 35px">Photos</span>
            </div>
                <?php if(isset($pagetabs[1]['image_url'])){?>
            <div class="pic-tab" style="margin-right: 85px">
                    <?php if(isset($pagetabs[1]['image_url'])){?>
                    <img src="<?=$pagetabs[1]['image_url'];?>" width="111" height="90" style="max-width: 111px; height: 90px;" />
                    <?php }else{?>
                    <img src="<?=base_url();?>images/pic-tab-four_06_01_03.png" width="111" height="90" style="max-width: 111px; height: 90px;" />
                    <?php }?>
                <div class="clear"></div>
                <span style="margin-right: 35px"><?=$pagetabs[1]['name'];?></span>
            </div>
                <?php } if(isset($pagetabs[2]['image_url'])){?>
            <div class="pic-tab" style="margin-right: 85px">
                    <?php if(isset($pagetabs[2]['image_url'])){?>
                    <img src="<?=$pagetabs[2]['image_url'];?>" width="111" height="90" style="max-width: 111px; height: 90px;" />
                    <?php }else{?>
                    <img src="<?=base_url();?>images/pic-tab-four_06_01_03.png" width="111" height="90" style="max-width: 111px; height: 90px;" />
                    <?php }?>
                <div class="clear"></div>
                <span style="margin-right: 35px"><?=$pagetabs[2]['name'];?></span>
            </div>
                <?php }?>
                <div class="flip-btn" style="margin-right: 5px">
                    <div class="tabs-count">
                        <div class="tabs-count-left"><strong><?=count($pagetabs);?></strong></div>
                        <div class="tabs-count-right"><img src="<?=base_url();?>images/tb-arrow_03.png" width="7" style="width: 7px;"/></div>
                    </div><!---- end tabs-count ------------->		
                </div>						
            </div>
            <div class="clear"></div>
    </div>
    <br />
</div>
<div style="clear:both;"></div>

<div id="abouttxt" style="display:none">
    <h3>Change the text in the box below</h3>
    <form action="<?=base_url();?>index.php/page/update_about" method="post">
        <textarea name="abouttxt" id="abouttxt" style="width:432px;height:290px;"><?=(isset($page_details['about']) ? $page_details['about'] : '');?></textarea>
        <input type="submit" value="Update"/>
    </form>
</div>