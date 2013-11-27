<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<?php 
$daylist = array();
if(!isset($_REQUEST['subpgid']))
{
    foreach($chirmas_subpagesdata['subpagesdata'] as $linkdays)
    {
        $daylist[] =  $linkdays['linkdate'];
        $subpgid[] =  $linkdays['subpgtype'];
    }
}
?>
<script>
function dmove(value)
{
    if(value=="in")
    {
        $('#share').css('margin-top','0px');
    }
    if(value=="out")
    {
        $('#share').css('margin-top','-100px');
    }
}
</script>

<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>
        <li><a href="#Settings"><span>Settings</span></a></li>
        <li><a href="#winnerlist"><span>Winners List</span></a></li>
        <!--<li><a href="#editthankyoupage"><span>Thank you page</span></a></li>-->        
    </ul>
    <div id="edittemplate">
    <!--********************************************-->
    <div class="christmas-app"></div>
        <?php if(isset($_REQUEST['subpgid'])){
        $subpgid = $_REQUEST['subpgid'];
        $subdata['subpgid'] = $subpgid;
        $this->load->view('temp14_subpg'.$subpgid,$subdata);
        }else{?>
        <div class="christmas-app-main-wrapper">
            <div  style="position: absolute; margin-top: 1px; margin-left: 0px;z-index: 8;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>&width=800&height=600">Change Image</a>
            </div>
            <div class="christmas-app-data-container">
                <div style="overflow: hidden; height: 135px;position: absolute;">
                    <div id="share" onMouseOver="dmove('in');" onMouseOut="dmove('out');">
                        <ul style="margin-left:8px;">
                            <li><a class="icon-facebook" href="javascript:;" id="share-facebook">Facebook<span>&nbsp;</span></a></li>
                            <li><a class="icon-twitter" href="javascript:;" id="share-twitter">Twitter<span>&nbsp;</span></a></li>
                        </ul>    
                    </div>
                </div>
                <div  style="position: absolute; margin-left: 280px; margin-top: 26px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][5]['id'];?>&ftype=<?=$tempdata[1][5]['typeid'];?>">Change Text</a>
                </div>    
                <!--<div  style="position: absolute; margin-left: 472px; margin-top: 80px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][6]['id'];?>&ftype=<?=$tempdata[1][6]['typeid'];?>">Change Text</a>
                </div>-->
            <h1 class="christmas-app-heading-one"><?=$tempdata[1][5]['value'];?></h1> <!--<span style="color:#f00;"> <?=$tempdata[1][6]['value'];?></span>-->
            <div  style="position: absolute;margin-left: 174px; margin-top: 22px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][7]['id'];?>&ftype=<?=$tempdata[1][7]['typeid'];?>">Change Text</a>
            </div>
            <p class="christmas-app-pera-one"><?=$tempdata[1][7]['value'];?></p>
            <!--<div  style="position: absolute; margin-left: 0px; margin-top: 77px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][9]['id'];?>&ftype=<?=$tempdata[1][9]['typeid'];?>">Change Link</a>
            </div>
            <a href="<?=$tempdata[1][9]['value'];?>" class="christmas-app-fb-icon"><img src="<?=base_url();?>images/images/facebook.png" width="64" /></a>-->
            <div class="calendar-holder">
                <ul>
                    <?php
                    for($j=1;$j<25;$j++){
                        if($j==1){ echo '<li></li><li></li><li></li>';}
                        if($j<10){ $j = "0".$j;}
                        $loopday[] = $j;
                    }
                    
                    if($tempdata[1][12]['value']==0){ shuffle($loopday); }?>
                    <div  style="position: absolute; margin-left: 0px; margin-top: 84px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][10]['id'];?>&ftype=<?=$tempdata[1][10]['typeid'];?>">Change Color</a>
                    </div>
                    <?php $index = 0;
                    foreach($loopday as $i){?>
                    <li>
                        <?php if(in_array($i,$daylist)){?>
                        <a href="<?=base_url();?>index.php/page/chrismas_addsubpg?subpgday=<?=$i?>&subpgid=<?=$subpgid[$index];?>" class="syaan"><?=$i?></a>
                        <?php 
                        $index = $index+1;
                        }else{?>
                        <a href="<?=base_url();?>index.php/page/chrismas_addsubpg?subpgday=<?=$i?>" class="empty-cell" rel="facebox"><?=$i?></a>
                        <?php }?>
                    </li>
                    <?php }?>
                </ul>                              
            </div>
            </div><!--- christmas-app-data-container --->
        </div><!--- christmas-app-main-wrapper --->
        <?php }?>
    </div><!--edittemplate-->
    <div id="Settings">
       <form action="#" method="post" width="700">
        <table border="0">
            <tr><td height="10"></td></tr>
            <tr>
                <td width="160"><b>Snow falling:</b></td>
                <td width="65"><input type="radio" name="snowfall" value="80" <?=($tempdata[0][1]['value']==80 ? 'checked="checked"' : '');?> onclick="top.location.href='<?=base_url();?>index.php/page/chrismas_app_updtsettings?valid=<?=$tempdata[0][1]['id']?>&tabid=1&fvalue='+this.value" > On </td>
                <td width="65"><input type="radio" name="snowfall" value="-1" <?=($tempdata[0][1]['value']=="-1" ? 'checked="checked"' : '');?> onclick="top.location.href='<?=base_url();?>index.php/page/chrismas_app_updtsettings?valid=<?=$tempdata[0][1]['id']?>&tabid=1&fvalue='+this.value"> Off</td>
            </tr>
            <tr><td height="10"></td></tr>
            <tr>
                <td width="160"><b>Share: </b></td>
                <td width="65"><input type="radio" name="sharebutton" value="1" <?=($tempdata[1][0]['value']==1 ? 'checked="checked"' : '');?> onclick="top.location.href='<?=base_url();?>index.php/page/chrismas_app_updtsettings?valid=<?=$tempdata[1][0]['id']?>&tabid=1&fvalue='+this.value" > Show </td>
                <td width="65"><input type="radio" name="sharebutton" value="0" <?=($tempdata[1][0]['value']==0 ? 'checked="checked"' : '');?> onclick="top.location.href='<?=base_url();?>index.php/page/chrismas_app_updtsettings?valid=<?=$tempdata[1][0]['id']?>&tabid=1&fvalue='+this.value"> Hide</td>
            </tr>
            <tr><td height="10"></td></tr>
            <!--<tr>
                <td width="130"><b>Background Sound: <?=$tempdata[0][4]['value'];?></b></td>
                <td width="65"><input type="radio" name="sound" value="1" <?=($tempdata[0][4]['value']==1 ? 'checked="checked"' : '');?> onclick="top.location.href='<?=base_url();?>index.php/page/chrismas_app_updtsettings?valid=<?=$tempdata[0][4]['id']?>&tabid=1&fvalue='+this.value"> On  </td>
                <td width="65"><input type="radio" name="sound" value="0" <?=($tempdata[0][4]['value']==0 ? 'checked="checked"' : '');?> onclick="top.location.href='<?=base_url();?>index.php/page/chrismas_app_updtsettings?valid=<?=$tempdata[0][4]['id']?>&tabid=1&fvalue='+this.value"> Off </td>
            </tr>
            <tr><td height="10"></td></tr>-->
            <tr>
                <td width="160"><b>Day gates: </b></td>
                <td width="65"><input type="radio" name="sound" value="1" <?=($tempdata[1][12]['value']==1 ? 'checked="checked"' : '');?> onclick="top.location.href='<?=base_url();?>index.php/page/chrismas_app_updtsettings?valid=<?=$tempdata[1][12]['id']?>&tabid=1&fvalue='+this.value"> Grid  </td>
                <td width="100"><input type="radio" name="sound" value="0" <?=($tempdata[1][12]['value']==0 ? 'checked="checked"' : '');?> onclick="top.location.href='<?=base_url();?>index.php/page/chrismas_app_updtsettings?valid=<?=$tempdata[1][12]['id']?>&tabid=1&fvalue='+this.value"> Random </td>
            </tr>
            <tr><td height="10"></td></tr>
        </table>
        </form>
        <div>
            <table border="0" width="600">
                <tr>
                    <td width="160"><b>Message Comming Gate: </b></td>
                    <td colspan="3" width="400">
                        <div  style="position: absolute; margin-left: 152px; margin-top: -19px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][13]['id'];?>&ftype=<?=$tempdata[1][13]['typeid'];?>&tabid=1">Change Text</a>
                        </div>
                        <?=$tempdata[1][13]['value'];?>
                    </td>
                </tr>
                <tr><td height="20"></td></tr>
                <tr>
                    <td width="160"><b>Thankyou message: </b></td>
                    <td colspan="3" width="400">
                        <div  style="position: absolute; margin-left: 152px; margin-top: -19px;" align="center" class="tempeditpng">
                            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][14]['id'];?>&ftype=<?=$tempdata[1][14]['typeid'];?>&tabid=1">Change Text</a>
                        </div>
                        <?=$tempdata[1][14]['value'];?>
                    </td>
                </tr>
            </table>
        </div>
    </div><!--Settings-->
    <div id="winnerlist">
        <div style="overflow:hidden;height:500px;">
            <table border="" class="wintable">
                <?php if(count($chirmas_subpagesdata['winnerofday'])>0){?>
                <tr>
                    <th>Winner Name</th>
                    <th>Winner Email</th>
                    <th>Winner of day</th>
                </tr>
                <?php foreach($chirmas_subpagesdata['winnerofday'] as $windata){?>
                <tr>
                    <td><?=$windata['name'];?></td>
                    <td><?=$windata['email'];?></td>
                    <td><?=$windata['linkdate'];?> - December</td>
                </tr>    
                <?php }}else{?>
                <tr>
                    <td align="center">There is no records found now</td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>