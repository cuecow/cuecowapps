
<link rel="stylesheet" href="<?=base_url();?>js/facefiles/facebox.css" />
<script src="<?=base_url();?>js/facefiles/facebox.js"></script>	
<?php
if(!empty($appdataarrg['appdata'][0])){ $appdata = $appdataarrg['appdata'][0];}else{ $appdata = "";}
if(isset($appdataarrg['anslist'])){ $anslists = $appdataarrg['anslist'];}else{ $anslists = "";}

$resultcount = $appdataarrg['resultcount'];
$tempid = $this->session->userdata("tempid");
$pid = $this->session->userdata("pid");

date_default_timezone_set('Europe/Zagreb');
$date = date('Y-m-d G:i:s');
list($currdate,$currtime)= explode(' ', $date);
list($y,$m,$d)= explode('-', $currdate);
$curr_date=$m."/".$d."/".$y;
$unpublishdate = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));
list($uy,$um,$ud)= explode('-', $unpublishdate);
$unpublish_date=$um."/".$ud."/".$uy;

$date_tim = date('Y-m-d H:i:s', strtotime('-1 hour'));
list($currdate_end,$currtime_endtime)= explode(' ', $date_tim);

$attributes = array('name' => 'appsettingfrm');
echo form_open_multipart('page/save_appsettings',$attributes);?>
<div class="span9 appsetiingapn9">
    <div id="contentdata">
        <div class="title-crumbs">
            <h2 style="margin-bottom:5px;">Edit your app: Select template, edit contents & settings and publish</h2>
            <h5>Remember that your content will not be visible until you save & publish</h5>
            <br />
        </div>
        <div class="content-menutemp">
            <ul class="nav nav-tabs" id="myTab"> 
                <li><a href="#" onClick="warning_msg('<?=base_url();?>index.php/page/templates?aid=<?=$this->session->userdata("coded_dbappid");?>'); return false;">Select Template</a></li>
                <li><a href="<?=base_url()?>index.php/page/viewtemplate">Edit Contents</a></li>
                <li  class="active"><a href="<?=base_url()?>index.php/page/app_settings/">Publish Settings</a></li>
                <li><a></a></li>    
                <button type="submit" class="btn btn-success" onclick="return validatefrm()">Save</button>
           </ul> 
        </div>
        <div style="clear:both;"></div>
        <div class="tempeditpageborder">
            <!--<form action="<?=base_url();?>index.php/page/save_settings" name="appsettingfrm" method="post" enctype="multipart/form-data" onsubmit="return validatefrm();">-->
                <div style="margin-top:10px;">
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
                    <div class="clearfix"></div>
                    <div id="mainraper" style="background-color:#FFFFFF;">
    <div id="setting-page-content-main" class="setting-page-content-main">
        <!--<div style="width:100%; height:25px">-->
            <div class="span4">
                <h4>Tab Name:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <div class="feild-cnt">
                    <input type="text" name="tabname" value="<?php if(isset($appdata['tabname'])){ echo $appdata['tabname'];}?>" />
                </div><!--- radio btns ---->
            </div><!--- sett-input-content --->
        <!--</div>-->
        <div class="clearfix"></div>
            <div class="span4">
                <h4>Tab icon image</h4>
            </div><!--- span6 --->
            <div class="span4">
                <?php //if($appdata['tabicon']!=""){?>
                <div id="tabicon">
                <?php 
                if(isset($appdata['tabicon']) && !empty($appdata['tabicon'])){?> 
                <img src="<?=base_url();?>images/tabicons/<?=$appdata['tabicon'];?>" width="112" height="72"  />
                <?php }?>
                </div>
                <div class="feild-cnt">
                <input type="file" name="tabicon" /></div>
            </div><!--- span5 --->
            <div class="clearfix"></div>
            <div class="span4">
                <h4>Publish Date/Time:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <input type="text" id="pubdate" class="datepicker input-cnt-44-two" name="pubdate" value="<?php if(isset($appdata['published'])){list($y,$m,$r)=  explode('-', $appdata['published']); list($d,$t)=  explode(' ', $r); echo $m.'/'.$d.'/'.$y;} else{ echo $curr_date; }?>" /><input type="text" style="float:left;" name="pubtime" id="timepick" class="timepicker input-cnt-44-one" value="<?php if(isset($appdata['published'])){list($a,$b)=  explode(' ', $appdata['published']); echo $b;}else{echo $currtime;}?>" />
            </div><!--- span5 --->
            <div class="clearfix"></div>
            <div class="span4">
                <h4>Unpublish Date/Time:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <input type="text" id="unpubdate" class="datepicker input-cnt-44-two" name="unpubdate" value="<?php if(isset($appdata['unpublish'])){list($y,$m,$r)=  explode('-', $appdata['unpublish']); list($d,$t)=  explode(' ', $r); echo $m.'/'.$d.'/'.$y;} else {echo $unpublish_date;}?>" /><input type="text" style="float:left;" name="unpubtime" class="timepicker input-cnt-44-one" value="<?php if(isset($appdata['unpublish'])){list($a,$b)=  explode(' ', $appdata['unpublish']); echo $b;}else{echo $currtime;}?>" />
            </div><!--- span5 --->
            <div class="clearfix"></div>
            <div class="span4">
                <h4>Require users to "become a fan" in order to enter?</h4>
            </div><!--- span6 --->
            <div class="span4">
                <div class="feild-cnt">
                    <?php if(isset($appdata['becomefan'])){ $becomefan = ucwords($appdata['becomefan']);}else{ $becomefan="";}?>
                    <div class="content-dc-radio"> <input type="radio" name="becomefan" value="Yes" <?php if($becomefan=="Yes"){?> checked="checked" <?php }else if($becomefan==""){?> checked="checked" <?php }?> /><p>Yes</p></input></div>
                    <div class="content-dc-radio"><input type="radio" name="becomefan" value="No" <?php if($becomefan=="No"){?> checked="checked" <?php }?> /><p>No</p></input></div>
                </div><!--- radio btns ---->
            </div><!--- span5 --->
            <div style="clear:both"></div>
            <div class="span4">
                <h4>Select fan-gate image (use PNG for transparency)</h4>
            </div><!--- span6 --->
            <div class="span4">
                <?php if(isset($appdata['ravealimg']) && !empty($appdata['ravealimg'])){?>
                <div id="tabicon">
                <img src="<?=base_url();?>images/ravealimages/<?=$appdata['ravealimg'];?>" width="112" height="72"  />
                </div>
                <?php }?>
                <div class="feild-cnt"><input type="file" name="ravealimage" /></div><!--- radio btns ---->
            </div><!--- span5 --->
            <div class="clearfix"></div>
            <?php if($this->session->userdata('dbappid')==2){?>
            <div class="span4">
                <h4>Which is correct answer?</h4>
            </div><!--- span6 --->
            <div class="span4"  style="width:88%">
                <div class="feild-cnt">
                    <select name="correctans"  style="width:100%">
                        <?php foreach($anslists as $anslist){?>
                        <option <?=($anslist["is_true"]==1  ? "selected=selected" : "" )?> value="<?=$anslist['id'];?>"><?=$anslist['optiontxt']?></option>
                        <?php }?>
                    </select>
                </div><!--- radio btns ---->
            </div><!--- span5 --->
            <div ></div>
            <div class="span4">
                <h4>Auto select winner?</h4>
            </div><!--- span6 --->
            <div class="span4">
                <div class="feild-cnt">
                    <select name="autowinner">
                        <?php if(isset($appdata['autowinner'])){ $autowinner = $appdata['autowinner'];}else{ $autowinner="";}?>
                        <option <?php if($autowinner=="No"){?> selected="selected" <?php }?>>No</option>
                        <option <?php if($autowinner=="Yes"){?> selected="selected" <?php }?>>Yes</option>
                    </select>
                </div><!--- radio btns ---->
            </div><!--- span5 --->
            <div class="clearfix"></div>
            <div class="span4">
                <h4>Only select winners among correct answer?</h4>
            </div><!--- span6 --->
            <div class="span4">
                <div class="feild-cnt">
                    <select name="winnercorrectans">
                        <?php if(isset($appdata['winnercorrectans'])){ $winnercorrectans = $appdata['winnercorrectans'];}else{ $winnercorrectans="";}?>
                        <option <?php if($winnercorrectans=="No"){?> selected="selected" <?php }?>>No</option>
                        <option <?php if($winnercorrectans=="Yes"){?> selected="selected" <?php }?>>Yes</option>
                    </select>
                </div><!--- radio btns ---->
            </div><!--- span5 --->
            <div class="clearfix"></div>
            <div class="span4">
                    <h4>Competition End Date:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <input type="text" id="competitionenddate" class="datepicker input-cnt-44-two" name="competitionenddate" value="<?php if(isset($appdata['competitionenddate'])){ list($ey,$em,$er)= explode('-',$appdata['competitionenddate']); list($ed,$et)=  explode(' ', $er); echo $em.'/'.$ed.'/'.$ey;}  else {echo $unpublish_date;}?>" /><input type="text" style="float:left;" name="compendtime" class="timepicker input-cnt-44-one" value="<?php if(isset($appdata['competitionenddate'])){list($a,$b)=  explode(' ', $appdata['competitionenddate']); echo $b;}else{echo $currtime_endtime;}?>" />
            </div><!--- span5 --->
            <div class="clearfix"></div>
            <div class="span4">
                <h4>Competition Admin Email:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <input type="text" id="comadminemail" name="comadminemail" value="<?php if(isset($appdata['comadminemail'])){ echo $appdata['comadminemail'];}?>" />
            </div><!--- span5 --->
            <?php }else if(in_array($this->session->userdata('dbappid'), array(4,5))){?>
            <div class="clearfix"></div>
            <div class="span4">
                    <h4>Competition End Date:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <input type="text" id="competitionenddate" class="datepicker input-cnt-44-two" name="competitionenddate" value="<?php if(isset($appdata['competitionenddate'])){ list($ey,$em,$er)= explode('-',$appdata['competitionenddate']); list($ed,$et)=  explode(' ', $er); echo $em.'/'.$ed.'/'.$ey;}  else {echo $unpublish_date;}?>" /><input type="text" style="float:left;" name="compendtime" class="timepicker input-cnt-44-one" value="<?php if(isset($appdata['competitionenddate'])){list($a,$b)=  explode(' ', $appdata['competitionenddate']); echo $b;}else{echo $currtime_endtime;}?>" />
            </div><!--- span5 --->
            <div class="clearfix"></div>
            <div class="span4">
                <h4>Competition Admin Email:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <input type="text" id="comadminemail" name="comadminemail"  value="<?php if(isset($appdata['comadminemail'])){ echo $appdata['comadminemail'];}?>" />
            </div><!--- span5 --->
            <?php }else if($this->session->userdata('dbappid')==3){?>
            <div class="clearfix"></div>
            <div class="span4">
                <h4>Action Url:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <input type="text" id="actionurl" name="actionurl"  value="<?php if(isset($appdata['actionurl'])){ echo $appdata['actionurl'];}?>" />
            </div><!--- span5 --->
            <div class="clearfix"></div>
            <div class="span4">
                <h4>Admin Email:</h4>
            </div><!--- span6 --->
            <div class="span4">
                <input type="text" id="comadminemail" name="comadminemail"  value="<?php if(isset($appdata['comadminemail'])){ echo $appdata['comadminemail'];}?>" />
            </div><!--- span5 --->
            <?php } ?>
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
jQuery(document).ready(function($){    
    $(".editdiv").facebox();
    $('a[rel*=facebox]').facebox();
});    
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
        var unpubtim = appsettingfrm.unpubtime.value;
        var untm= unpubtim.split(':');
        
        var unpubdat = appsettingfrm.unpubdate.value;
        unpdate= unpubdat.split('/');
        var unpubdate=unpdate[0]+unpdate[1]+unpdate[2];
	var compendtim = appsettingfrm.compendtime.value;
        var cotm= compendtim.split(':');
        
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
//	if(unpubdate<=pubdate)
//	{
//		alert("Unpublish date must be greater than publish date");
//		appsettingfrm.unpubdate.focus();
//		return false;
//	}	
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
        if(competitionend[0] <= pdate[0] && competitionend[1] < pdate[1] && competitionend[2] <= pdate[2] || competitionend[0] <= pdate[0] && competitionend[2] <= pdate[2] && competitionend[1] <= pdate[1]  || competitionend[2] < pdate[2] || competitionend[0] == pdate[0] && competitionend[1] == pdate[1] && competitionend[2] == pdate[2])
	{
		alert("Competition End Date must be greater than Publish Date");
		appsettingfrm.competitionenddate.focus();
		return false;
	}
        if(competitionend[0] >= unpdate[0] && competitionend[1] > unpdate[1] && competitionend[2] >= unpdate[2] && cotm[0]>=untm[0] || competitionend[0] > unpdate[0] && competitionend[2] >= unpdate[2] && competitionend[1] >= pdate[1] && cotm[0]>=untm[0] || competitionend[0] == unpdate[0] && competitionend[1] == unpdate[1] && competitionend[2] == unpdate[2] && cotm[0]>=untm[0])
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
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   if( !emailPattern.test(appsettingfrm.comadminemail.value))
	{
		alert("Please Enter a Correct Email Address");
		appsettingfrm.comadminemail.focus();
		return false;
	}
}

function warning_msg(temp_url)
{
   jQuery.facebox('<h4 style="color:#000; margin-left:30px; margin-bottom:10px; margin-top:5px;">Changing the template now will make you start all over!</h4><a style="margin-left:74px;" class="btn btn-success" href="'+temp_url+'">Continue</a><input style="margin-left:66px;" class="btn" type="button" value="Close" onClick="cancelfbb()"/>');
}

function cancelfbb()
{
//    $.facebox.close = function(){
//    $(document).trigger('close.facebox')
//    return false
//   }
   $.facebox.close();   
}
</script>
