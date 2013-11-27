<?php
if(!empty($appdataarrg['appdata'][0])){ $appdata = $appdataarrg['appdata'][0];}else{ $appdata = "";}
if(isset($appdataarrg['anslist'])){ $anslists = $appdataarrg['anslist'];}else{ $anslists = "";}

$resultcount = $appdataarrg['resultcount'];
$tempid = $this->session->userdata("tempid");
$pid = $this->session->userdata("pid");

date_default_timezone_set('Europe/Zagreb');
$date = date('Y-m-d G:i:s');
list($currdate,$currtime)= explode(' ', $date);

$attributes = array('name' => 'appsettingfrm');
echo form_open_multipart('page/save_appsettings',$attributes);?>
<div class="span9">
    <div id="contentdata">
        <div class="title-crumbs">
            <h2 style="margin-bottom:5px;">Edit your app: Select template, edit contents & settings and publish</h2>
            <h5>Remember that your content will not be visible until you save & publish</h5>
            <br />
        </div>
        <div class="content-menutemp">
            <ul class="nav nav-tabs" id="myTab"> 
                <li><a href="#">Select Template</a></li>
                <li><a href="<?=base_url()?>index.php/page/viewtemplate">Edit Contents</a></li>
                <li  class="active"><a href="<?=base_url()?>index.php/page/app_settings/">Edit Settings</a></li>
                <li><a></a></li>    
                <button type="submit" class="btn btn-success" onclick="return validatefrm()">Save</button>
           </ul> 
        </div>
        <div style="clear:both;"></div>
        <div class="tempeditpageborder">
            <!--<form action="<?=base_url();?>index.php/page/save_settings" name="appsettingfrm" method="post" enctype="multipart/form-data" onsubmit="return validatefrm();">-->
                <div style="margin-top:10px;margin-left:30px;">
                    <div class="title-crumbs">
                        <h2>Select app settings</h2>
                        <h5>Here you can edit various settins for your app.Remember to save.</h5>
                    </div>
                    <?php if($resultcount>0){?>
                        <div style="margin-right:20px;float:right;"><a href="<?=base_url();?>index.php/page/genrate_csv" target="_blank"><strong>Download participating visitors CSV file</strong></a></div>
                    <?php }?>
                    <div style="margin-top:30px;margin-bottom:15px;">
                        <p><strong>Configure how your app will appear on your Facebook page menu</strong></p>
                    </div>
                    <div id="mainraper" style="background-color:#FFFFFF;">
                        <div id="setting-page-content-main">
                            <!--<div style="width:100%; height:25px">-->
                                <div class="span6" style="float:left; width: 400px">
                                    <h4>Tab Name:</h4>
                                </div><!--- span6 --->
                                <div class="span5" style="float:right; width:215px">
                                    <div class="feild-cnt">
                                        <input type="text" name="tabname" value="<?php if(isset($appdata['tabname'])){ echo $appdata['tabname'];}?>" />
                                    </div><!--- radio btns ---->
                                </div><!--- sett-input-content --->
                            <!--</div>-->
                                <div class="span6" style="float:left; width: 400px">
                                    <h4>Tab icon image</h4>
                                </div><!--- span6 --->
                                <div class="span5" style="float:right; margin-top: 0px; margin-bottom: 2px;width:215px">
                                    <?php //if($appdata['tabicon']!=""){?>
                                    <div id="tabicon" style="margin-left:10px;">
                                    <?php 
                                    if(isset($appdata['tabicon']) && !empty($appdata['tabicon'])){?> 
                                    <img src="<?=base_url();?>images/tabicons/<?=$appdata['tabicon'];?>" width="112" height="72"  />
                                    <?php }?>
                                    </div>
                                    <div class="feild-cnt">
                                    <input type="file" name="tabicon" /></div>
                                </div><!--- span5 --->
                                <div class="clearfix"></div>
                                <div class="span3">
                                    <h4>Publish Date/Time:</h4>
                                </div><!--- span6 --->
                                <div class="span4" style="margin-left: 107px; white-space: nowrap;">
                                    <input type="text" style="float:left; width: 130px; margin-right: 5px; margin-left: 135px;" id="pubdate" class="datepicker input-cnt-44-two" name="pubdate" value="<?php if(isset($appdata['published'])){list($y,$m,$r)=  explode('-', $appdata['published']); list($d,$t)=  explode(' ', $r); echo $m.'/'.$d.'/'.$y;}?>" /><input type="text" style="float:left;" name="pubtime" id="timepick" class="timepicker input-cnt-44-one" value="<?php if(isset($appdata['published'])){list($a,$b)=  explode(' ', $appdata['published']); echo $b;}else{echo $currtime;}?>" />
                                </div><!--- span5 --->
                                <div class="clearfix"></div>
                                <div class="span3">
                                    <h4>Unpublish Date/Time:</h4>
                                </div><!--- span6 --->
                                <div class="span4" style="margin-left: 107px;  white-space: nowrap;">
                                    <input type="text" id="unpubdate" style="float:left; width: 130px; margin-right: 5px; margin-left: 135px;" class="datepicker input-cnt-44-two" name="unpubdate" value="<?php if(isset($appdata['unpublish'])){list($y,$m,$r)=  explode('-', $appdata['unpublish']); list($d,$t)=  explode(' ', $r); echo $m.'/'.$d.'/'.$y;}?>" /><input type="text" style="float:left;" name="unpubtime" class="timepicker input-cnt-44-one" value="<?php if(isset($appdata['unpublish'])){list($a,$b)=  explode(' ', $appdata['unpublish']); echo $b;}else{echo $currtime;}?>" />
                                </div><!--- span5 --->
                                <div class="clearfix"></div>
                                <div class="span6" style="float:left; width: 400px">
                                    <h4>Require users to "become a fan" in order to enter?</h4>
                                </div><!--- span6 --->
                                <div class="span5" style="float:right;width:130px; margin-right:82px">
                                    <div class="feild-cnt">
                                        <?php if(isset($appdata['becomefan'])){ $becomefan = ucwords($appdata['becomefan']);}else{ $becomefan="";}?>
                                        <div style="float:left"> <input type="radio" name="becomefan" value="Yes" <?php if($becomefan=="Yes"){?> checked="checked" <?php }else if($becomefan==""){?> checked="checked" <?php }?>/><p>Yes</p></input></div>
                                        <div style="float:right"><input type="radio" style="margin-left: 24px" name="becomefan" <?php if($becomefan=="No"){?> checked="checked" <?php }?> value="No"/><p>No</p></input></div>
                                    </div><!--- radio btns ---->
                                </div><!--- span5 --->
                                <div style="clear:both"></div>
                                <div class="span6" style="float:left; width: 400px">
                                    <h4>Select fan-gate image (use PNG for transparency)</h4>
                                </div><!--- span6 --->
                                <div class="span5" style="float:right;  margin-top: 10px; margin-bottom: 0px;width:215px">
                                    <?php if(isset($appdata['ravealimg']) && !empty($appdata['ravealimg'])){?>
                                    <div id="tabicon" style="margin-left:10px;">
                                    <img src="<?=base_url();?>images/ravealimages/<?=$appdata['ravealimg'];?>" width="112" height="72"  />
                                    </div>
                                    <?php }?>
                                    <div class="feild-cnt"><input type="file" name="ravealimage" /></div><!--- radio btns ---->
                                </div><!--- span5 --->
                                <div style="clear:both"></div>
                                <?php  if($this->session->userdata('dbappid')==2){?>
                                <div class="span6" style="float:left; width: 400px">
                                    <h4>Which is correct answer?</h4>
                                </div><!--- span6 --->
                                <div class="span5" style="float:right;  margin-top: 10px; margin-bottom: 0px;width:505px">
                                    <div class="feild-cnt">
                                        <select name="correctans" style="width:768px">
                                            <?php foreach($anslists as $anslist){?>
                                            <option <?=($anslist["is_true"]==1  ? "selected=selected" : "" )?> value="<?=$anslist['id'];?>"><?=$anslist['optiontxt']?></option>
                                            <?php }?>
                                        </select>
                                    </div><!--- radio btns ---->
                                </div><!--- span5 --->
                                <div style="clear:both"></div>
                                <div class="span6" style="float:left; width: 400px">
                                    <h4>Auto select winner?</h4>
                                </div><!--- span6 --->
                                <div class="span5" style="float:right;  margin-top: 10px; margin-bottom: 0px;width:215px">
                                    <div class="feild-cnt">
                                        <select name="autowinner">
                                            <?php if(isset($appdata['autowinner'])){ $autowinner = $appdata['autowinner'];}else{ $autowinner="";}?>
                                            <option <?php if($autowinner=="No"){?> selected="selected" <?php }?>>No</option>
                                            <option <?php if($autowinner=="Yes"){?> selected="selected" <?php }?>>Yes</option>
                                        </select>
                                    </div><!--- radio btns ---->
                                </div><!--- span5 --->
                                <div style="clear:both"></div>
                                <div class="span6" style="float:left; width: 400px">
                                    <h4>Only select winners among correct answer?</h4>
                                </div><!--- span6 --->
                                <div class="span5" style="float:right;  margin-top: 10px; margin-bottom: 0px;width:215px">
                                    <div class="feild-cnt">
                                        <select name="winnercorrectans">
                                            <?php if(isset($appdata['winnercorrectans'])){ $winnercorrectans = $appdata['winnercorrectans'];}else{ $winnercorrectans="";}?>
                                            <option <?php if($winnercorrectans=="No"){?> selected="selected" <?php }?>>No</option>
                                            <option <?php if($winnercorrectans=="Yes"){?> selected="selected" <?php }?>>Yes</option>
                                        </select>
                                    </div><!--- radio btns ---->
                                </div><!--- span5 --->
                                <div class="clearfix"></div>
                                <div class="span3">
                                        <h4>Competition End Date:</h4>
                                </div><!--- span6 --->
                                <div class="span4" style="margin-left: 107px;">
                                    <input type="text" style="float:left; width: 130px; margin-right: 5px; margin-left: 135px;" id="competitionenddate" class="datepicker input-cnt-44-two" name="competitionenddate" value="<?php if(isset($appdata['competitionenddate'])){ list($ey,$em,$er)= explode('-',$appdata['competitionenddate']); list($ed,$et)=  explode(' ', $er); echo $em.'/'.$ed.'/'.$ey;}?>" /><input type="text" style="float:left;" name="compendtime" class="timepicker input-cnt-44-one" value="<?php if(isset($appdata['competitionenddate'])){list($a,$b)=  explode(' ', $appdata['competitionenddate']); echo $b;}else{echo $currtime;}?>" />
                                </div><!--- span5 --->
                                <div class="clearfix"></div>
                                <div class="span3">
                                    <h4>Competition Admin Email:</h4>
                                </div><!--- span6 --->
                                <div class="span4" style="margin-left: 107px;">
                                    <input type="text" style="float:left; width: 207px; margin-right: 5px; margin-left: 135px;" id="comadminemail" name="comadminemail" value="<?php if(isset($appdata['comadminemail'])){ echo $appdata['comadminemail'];}?>" />
                                </div><!--- span5 --->
                                <?php }else if(in_array($this->session->userdata('dbappid'), array(4,5))){?>
                                <div class="clearfix"></div>
                                <div class="span3">
                                        <h4>Competition End Date:</h4>
                                </div><!--- span6 --->
                                <div class="span4" style="margin-left: 107px;">
                                    <input type="text" style="float:left; width: 130px; margin-right: 5px; margin-left: 135px;" id="competitionenddate" class="datepicker input-cnt-44-two" name="competitionenddate" value="<?php if(isset($appdata['competitionenddate'])){ list($ey,$em,$er)= explode('-',$appdata['competitionenddate']); list($ed,$et)=  explode(' ', $er); echo $em.'/'.$ed.'/'.$ey;}?>" /><input type="text" style="float:left;" name="compendtime" class="timepicker input-cnt-44-one" value="<?php if(isset($appdata['competitionenddate'])){list($a,$b)=  explode(' ', $appdata['competitionenddate']); echo $b;}else{echo $currtime;}?>" />
                                </div><!--- span5 --->
                                <div class="clearfix"></div>
                                <div class="span3">
                                    <h4>Competition Admin Email:</h4>
                                </div><!--- span6 --->
                                <div class="span4" style="margin-left: 107px;">
                                    <input type="text" style="float:left; width: 207px; margin-right: 5px; margin-left: 135px;" id="comadminemail" name="comadminemail"  value="<?php if(isset($appdata['comadminemail'])){ echo $appdata['comadminemail'];}?>" />
                                </div><!--- span5 --->
                                <?php }?>
                                <div style="clear:both"></div>
                                <br />									
                        </div><!-- setting-page-content-main -->
                    </div>							
            </div>					
        </div>
    </div>
    <div style="clear: both;"></div>
</div>
<div style="clear: both;"></div>
<br style="margin-top: 200px;">
<input type="hidden" name="flag" value="<?=(isset($appdata['flag']) ? $appdata['flag'] : '');?>" />
<input type="hidden" name="appid_url" value="<?=(isset($appdata['appid_url']) ? $appdata['appid_url'] : '');?>" />
</form>
<script>
function validatefrm()
{
        if(document.appsettingfrm.tabname.value=="")
	{
		alert("You didn't enter 'Tab Name'");
		appsettingfrm.tabname.focus();
		return false;
	}
	<?php if(empty($appdata['tabicon'])){?>
	if(document.appsettingfrm.tabicon.value=="")
	{
            alert("You didn't select 'Tab icon image'");
            return false;
	}
	<?php }?>
        
        var newdate;
	var dateObj;
		
	dateObj = new Date();	
	var day = dateObj.getDate();
	var month = dateObj.getMonth()+1;
	var year = dateObj.getFullYear();
        var hours = dateObj.getHours();
        var minutes = dateObj.getMinutes();
        //var minutes = dateObj.getMinutes();        
	
	if(month.length>1){}else{	month =  "0" + month;}	
	newdate = year + "-" + month + "-" + day +" "+hours+":"+minutes;
        
	//var pubdate = appsettingfrm.pubdate.value.substr(0,10);
        var pubdat = appsettingfrm.pubdate.value;
	pdate= pubdat.split('/');
        var pubdate=pdate[0]+pdate[1]+pdate[2];
        var unpubdat = appsettingfrm.unpubdate.value;
        unpdate= unpubdat.split('/');
        var unpubdate=unpdate[0]+unpdate[1]+unpdate[2];
	if(appsettingfrm.pubdate.value=="")
	{
		alert("You didn't select 'Publish Date'");
		appsettingfrm.pubdate.focus();
		return false;
	}        
	/*if(pubdate<newdate)
	{
                alert("Publish Date must be today or greater than Now");
		appsettingfrm.pubdate.focus();
		return false;
	}*/
	if(appsettingfrm.unpubdate.value=="")
	{
		alert("You didn't select 'Unpublish Date'");
		appsettingfrm.unpubdate.focus();
		return false;
	}        
	if(unpubdate<=pubdate)
	{
		alert("Unpublish date must be greater than publish date");
		appsettingfrm.unpubdate.focus();
		return false;
	}	
        if(appsettingfrm.competitionenddate.value=="")
	{
		alert("You didn't enter 'Competition End Date'");
		appsettingfrm.competitionenddate.focus();
		return false;
	}
        //var competitionenddate = appsettingfrm.competitionenddate.value.substr(0,10);
        var competitionenddat = appsettingfrm.competitionenddate.value;
        competitionend= competitionenddat.split('/');
        //var competitionenddate=competitionend[0]+competitionend[1]+competitionend[2]; 
         //alert(competitionend[0]); alert(pdate[0]); alert(competitionend[2]); alert(pdate[2]);
        if(competitionend[0] <= pdate[0] && competitionend[1] < pdate[1] && competitionend[2] <= pdate[2] || competitionend[0] <= pdate[0] && competitionend[2] <= pdate[2] || competitionend[2] < pdate[2] || competitionend[0] == pdate[0] && competitionend[1] == pdate[1] && competitionend[2] == pdate[2])
	{
		alert("Competition End Date must be greater than Publish Date");
		appsettingfrm.competitionenddate.focus();
		return false;
	}
        if(competitionend[0] >= unpdate[0] && competitionend[1] > unpdate[1] && competitionend[2] >= unpdate[2] || competitionend[0] > unpdate[0] && competitionend[2] >= unpdate[2] || competitionend[0] == unpdate[0] && competitionend[1] == unpdate[1] && competitionend[2] == unpdate[2])
	{
		alert("Competition End Date must be Less than Unpublish Date");
		appsettingfrm.competitionenddate.focus();
		return false;
	}	
	if(appsettingfrm.comadminemail.value=="")
	{
		alert("You didn't enter 'Competition Admin Email'");
		appsettingfrm.comadminemail.focus();
		return false;
	}
}
</script>