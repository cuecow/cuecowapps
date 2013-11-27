<?php
$pid = $this->session->userdata("pid");
$ptoken = $this->session->userdata("ptoken");
?>
<!--<pre><?php print_r($page_details);?></pre>-->
<script type="text/javascript" src="<?=base_url();?>js/gs_sortable.js"></script>
<script type="text/javascript" src="<?=base_url();?>js/tablefilter.js"></script>
<script type="text/javascript">
<!--
var TSort_Data = new Array ('archivedtable', 's', 's','s','s','s');
tsRegister();
// -->
    $(function() { 
        var theTable = $('#activetable') //table.styled
        theTable.find("tbody > tr").find("td:eq(1)").mousedown(function(){});
        $("#filter").keyup(function() {
            $.uiTableFilter( theTable, this.value );
        })
        $('#filter-form').submit(function(){
            theTable.find("tbody > tr:visible > td:eq(1)").mousedown();
            return false;
        }).focus(); //Give focus to input field
    });
</script>
<div class="content-right" style="padding-left:40px; padding-top:67px;">
    <div class="setting-tab">
        <div align="right" style="border:none;">
            <div style="border:none;"><a class="middle-btn" href="<?=base_url();?>index.php/page/editpage" style="color:#FFFFFF;">Edit settings</a></div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="top-content-main" align="right">
        <div class="top-text-content">
            <div class="FB_pageprofilepicborder"><img src="<?=(isset($page_details['picture']) ? $page_details['picture'] : '/images/pgdefaultimg.jpg');?>" width="160" height="160" alt="Profile Photo" /></div>
            <div align="left" style="position:absolute;margin-left:205px;margin-top:-60px;" class="FB_page_name">
                 <strong><?=$page_details['name']?></strong><br />
                <span><?=(isset($page_details['likes']) ? $page_details['likes'] : 0 );?> like(s)</span>
            </div>					
            <div class="text-content" style="margin-top:10px;margin-left:10px;"><?=$page_details['category'];?></div>
            <div class="clear"></div>
            <div class="text-content" style="margin:2px 6px 0px 10px;text-align:left;"><?php if(isset($page_details['about'])){ echo $page_details['about']; }else{ echo "About Not updated yet";}?></div>
        </div>
        <div style="float:right">
            <div class="pic-tab">
                    <div style="position:absolute;margin-left:41px;margin-top:25px;font-family: lucida grande,tahoma,verdana,arial,sans-serif;color:#1C2A47;font-size:20px;">
                    <strong>
                    <?=(isset($page_details['likes']) ? $page_details['likes'] : '');?>
                    </strong>
                    </div>
                    <img src="<?=base_url();?>images/likesimg.jpg" width="111" height="74" />
                <div class="clear"></div>
                <span class="pic-btn-text">Likes</span></div>
                <div class="pic-tab">
                        <img src="<?=(isset($page_details['picture']) ? $page_details['picture'] : '/images/pgdefaultimg.jpg' );?>" width="111" height="74" />
                <div class="clear"></div>
                <span class="pic-btn-text">Photos</span>
                </div>
                <?php if(isset($pagetabs[1]['image_url'])){?>
                <div class="pic-tab">
                    <?php if(isset($pagetabs[1]['image_url'])){?>
                    <img src="<?=$pagetabs[1]['image_url'];?>" width="111" height="74" />
                    <?php }else{?>
                    <img src="<?=base_url();?>images/pic-tab-four_06_01_03.png" width="111" height="74" />
                    <?php }?>
                <div class="clear"></div>
                <span class="pic-btn-text"><?=$pagetabs[1]['name'];?></span></div>
                <?php } if(isset($pagetabs[2]['image_url'])){?>
                <div class="pic-tab">
                    <?php if(isset($pagetabs[2]['image_url'])){?>
                    <img src="<?=$pagetabs[2]['image_url'];?>" width="111" height="74" />
                    <?php }else{?>
                    <img src="<?=base_url();?>images/pic-tab-four_06_01_03.png" width="111" height="74" />
                    <?php }?>
                <div class="clear"></div>
                <span class="pic-btn-text"><?=$pagetabs[2]['name'];?></span></div>
                <?php }?>
                <div class="flip-btn">
                    <div class="tabs-count">
                        <div class="tabs-count-left"><strong><?=count($pagetabs);?></strong></div>
                        <div class="tabs-count-right"><img src="<?=base_url();?>images/tb-arrow_03.png" width="7" /></div>
                    </div><!---- end tabs-count ------------->		
                </div>						
            </div>
            <div class="clear"></div>
    </div>
    <div class="clear"></div>
        <div class="middle-content" align="right">
        <div class="middle-title"><?=$page_details['name']?> <span class="page">Active Apps</span></div>
        <a href="<?=base_url();?>index.php/page/app"><div class="middle-btn">Add New App</div></a>
        <div class="clear"></div>
        <div class="midddle-content-data">
            <div class="clear"></div>
            <div class="middle-content-table">
                <table class="styled" style="border:none;"> 
                    <tr>
                        <td colspan="5" align="right" style="border: none;">
                            <form id="filter-form">Filter: <input name="filter" id="filter" maxlength="30" size="30" type="text" style="height:28px;border:solid 1px #CCCCCC;"></form><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="border:none;">
                            <table  id="activetable" class="styled" cellpadding="0" cellspacing="0"> 
                                <thead> 
                                    <tr> 
                                        <th style="font-size:13px;width:45px;"><strong>Icon</strong></th>
                                        <th style="font-size:13px;width:330px;"><strong>Title</strong></th> 
                                        <th style="font-size:13px;width:130px;"><strong>App Type</strong></th> 
                                        <!--<th style="font-size:13px;width:35px;"><strong>Position</strong></th>-->
                                        <th style="font-size:13px;width:145px;"><strong>Published</strong></th>
                                        <th style="font-size:13px;width:145px;"><strong>Unpublished</strong></th>
                                        <th style="font-size:13px;width:40px;"><strong>Active</strong></th>
                                        <th style="font-size:13px;width:30px;"><strong>Action</strong></th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php 
                                    // $getappid = array(1,2,32,4);
                                    if(empty($pagetabs)){ $pagetabs = array();}
                                    foreach($pagetabs as $tabs){
                                        if(isset($tabs['flag'])){ $flag = $tabs['flag'];}else{ $flag = "";}
                                    ?>
                                    <tr>
                                        <td align="center" style="font-size:13px;">
                                        <?php if($tabs['name']=="Photos"){?>
                                        <img src="<?=base_url();?>images/photos.png" width="35" height="35" />
                                        <?php }else if($tabs['name']=="Events"){?>
                                        <img src="<?=base_url();?>images/photos.png" width="35" height="35" />
                                        <?php } else if ($tabs['name']=="Videos"){?>
                                        <img src="<?=base_url();?>images/photos.png" width="35" height="35" />
                                        <?php }else{?>
                                        <img src="<?=(isset($tabs['image_url']) ? $tabs['image_url'] : '');?>" width="60" height="60" />
                                        <?php }?>													
                                        </td> 
                                        <td align="center" style="font-size:13px;">
                                        <?php if($flag!=""){?>
                                        <a href="<?=base_url();?>index.php/page/viewtemplate?app=<?=base64_encode($tabs['id']);?>&tempid=<?=base64_encode($tabs['tempid']);?>&aid=<?=base64_encode($tabs['dbappid']);?>">
                                        <?=$tabs['name'];?>
                                        </a>
                                        <?php }else{?>
                                        <?=$tabs['name'];?>
                                        <?php }?>
                                        </td>
                                        <td align="center" style="font-size:13px;"><?php if($flag!=""){ echo $tabs['app_type']; }else{ echo "-"; }?></td>
                                        <!--<td align="center" style="font-size:13px;"><?=$tabs['position'];?></td>-->
                                        <td align="center" style="font-size:13px;"><?php if($flag!=""){ echo date('Y-m-d H:i', strtotime($tabs['published'])); }else{ echo "-";}?></td>
                                        <td align="center" style="font-size:13px;"><?php if($flag!=""){ echo date('Y-m-d H:i', strtotime($tabs['unpublish'])); }else{ echo "-";}?></td>
                                        <td align="center" style="font-size:13px;">
                                        <?php 
                                        if($flag!="")
                                        {
                                            if($flag==1){ echo "Yes";}
                                            if($flag==0){ echo "No";}
                                        }
                                        else{ echo "Yes";}
                                        ?>
                                        </td>
                                        <td align="center" style="font-size:13px;">
                                            <div class="buttons-ctr">
                                                <?php 
                                                if($flag!=""){?>
                                                <div class="edit-icon"><a href="<?=base_url();?>index.php/page/viewtemplate?app=<?=base64_encode($tabs['id']);?>&tempid=<?=base64_encode($tabs['tempid']);?>&aid=<?=base64_encode($tabs['dbappid']);?>"><img src="<?=base_url();?>images/edit-icon_07.png" width="23" /></a></div>
                                                <div class="delete-icon">
                                                    <a href="<?=base_url();?>index.php/page/clone_app?lid=<?=base64_encode($tabs['lid']);?>&dbappid=<?=base64_encode($tabs['dbappid']);?>&fbappid=<?=base64_encode($tabs['fbappid']);?>&tempid=<?=base64_encode($tabs['tempid']);?>">
                                                        <img src="<?=base_url();?>images/cloneimg.png" width="23" />
                                                    </a>
                                                </div>
                                                <!--<div class="delete-icon">
                                                    <a href="<?=base_url();?>index.php/page/delltab?appid=<?=base64_encode($tabs['id']);?>&lid=<?=base64_encode($tabs['lid']);?>&tempid=<?=base64_encode($tabs['tempid']);?>&flag=<?=$flag;?>" onclick=" return confirm('Are you sure you want to delete this tab?');">
                                                        <img src="<?=base_url();?>images/delete-icon_07.png" width="23" />
                                                    </a>
                                                </div>-->
                                                <?php }else{?>
                                                <!--<div class="delete-icon">
                                                    <a href="<?=base_url();?>index.php/page/delltabfacebook?appidurl=<?=base64_encode($tabs['id']);?>" onclick=" return confirm('Are you sure you want to delete this tab from facebook?');">
                                                        <img src="<?=base_url();?>images/delete-icon_07.png" width="23" />
                                                    </a>
                                                </div>-->
                                                <?php }?>																
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody> 
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="20" style="border:none;">
                            <div class="middle-title"><?=$page_details['name']?> <span class="page">Archived Apps</span></div>
                        </td>
                    </tr>
                    <!--<pre><?php print_r($archivedtab);?></pre>-->
                    <!--Archived App Grid-->
                    <tr>
                        <td style="border:none;">
                            <table id="archivedtable" class="styled" cellpadding="0" cellspacing="0"> 
                                <thead> 
                                    <tr> 
                                        <th style="font-size:13px;width:45px;"><strong>Icon</strong></th>
                                        <th style="font-size:13px;width:330px;"><strong>Title</strong></th> 
                                        <th style="font-size:13px;width:130px;"><strong>App Type</strong></th> 
<!--                                        <th style="font-size:13px;width:35px;"><strong>Position</strong></th>-->
                                        <th style="font-size:13px;width:145px;"><strong>Published</strong></th>
                                        <th style="font-size:13px;width:145px;"><strong>Unpublished</strong></th>
                                        <th style="font-size:13px;width:40px;"><strong>Active</strong></th>
                                        <th style="font-size:13px;width:30px;"><strong>Action</strong></th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php 
                                    // $getappid = array(1,2,32,4);
                                    if(empty($archivedtab)){ $archivedtab = array();}
                                    foreach($archivedtab as $atabs){?>
                                    <tr>
                                        <td align="center" style="font-size:13px;"><img src="<?=(isset($atabs['image_url']) ? $atabs['image_url'] : '');?>" width="60" height="60" /></td>
                                        <td align="center" style="font-size:13px;">
                                            <a href="<?=base_url();?>index.php/page/viewtemplate?app=<?=base64_encode($atabs['id']);?>&tempid=<?=base64_encode($atabs['tempid']);?>&aid=<?=base64_encode($atabs['dbappid']);?>">
                                                <?=$atabs['name'];?>
                                            </a>
                                        </td>
                                        <td align="center" style="font-size:13px;"><?=$atabs['app_type'];?></td>
<!--                                        <td align="center" style="font-size:13px;"><?=$atabs['position'];?></td>-->
                                        <td align="center" style="font-size:13px;"><?=date('Y-m-d H:i', strtotime($atabs['published']));?></td>
                                        <td align="center" style="font-size:13px;"><?=date('Y-m-d H:i', strtotime($atabs['unpublish']));?></td>
                                        <td align="center" style="font-size:13px;">No</td>
                                        <td align="center" style="font-size:13px;">
                                            <div class="buttons-ctr">
                                                <div class="edit-icon"><a href="<?=base_url();?>index.php/page/viewtemplate?app=<?=base64_encode($atabs['id']);?>&tempid=<?=base64_encode($atabs['tempid']);?>&aid=<?=base64_encode($atabs['dbappid']);?>"><img src="<?=base_url();?>images/edit-icon_07.png" width="23" /></a></div>
                                                <div class="edit-icon"><a href="<?=base_url();?>index.php/page/clone_app?lid=<?=base64_encode($atabs['lid']);?>&dbappid=<?=base64_encode($atabs['dbappid']);?>&fbappid=<?=base64_encode($atabs['fbappid']);?>&tempid=<?=base64_encode($atabs['tempid']);?>"><img src="<?=base_url();?>images/cloneimg.png" width="23" /></a></div>
                                                <div class="delete-icon">
                                                    <a href="<?=base_url();?>index.php/page/delltab?lid=<?=base64_encode($atabs['lid']);?>&tempid=<?=base64_encode($atabs['tempid']);?>&fbappid=<?=base64_encode($atabs['fbappid']);?>&dbappid=<?=base64_encode($atabs['dbappid']);?>" onclick=" return confirm('Are you sure you want to delete this tab?');">
                                                        <img src="<?=base_url();?>images/delete-icon_07.png" width="23" />
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody> 
                            </table>
                        </td>
                    </tr><!--End Archived App Grid-->
                </table>
            </div>
            <br />
        </div>
        <!-- end middle right -->
    </div>
</div>	
<div style="clear:both;"></div>