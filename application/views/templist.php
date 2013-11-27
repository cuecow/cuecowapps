<link rel="stylesheet" href="<?=base_url();?>js/facefiles/facebox.css" />
<script src="<?=base_url();?>js/facefiles/facebox.js"></script>	
<script>
jQuery(document).ready(function($){ 
       $(".temppreview").facebox();
       //$('a[rel*=facebox]').facebox();
       $(".editdiv").facebox();
        $('a[rel*=facebox]').facebox();
})
</script>
<div class="right_content-data">
<div id="contentdata" class="templist">
    <div class="title-crumbs">
        <h2 style="margin-bottom:5px;">Edit your app: Select template, edit contents & settings and publish</h2>
        <h5>Remember that your content will not be visible until you save & publish</h5>
        <br />
    </div>
    <div class="content-menu">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="<?=base_url();?>index.php/page/templates?aid=<?=$this->session->userdata("coded_dbappid");?>">Select Template</a></li>
            <li><a href="#">Edit Contents</a></li>
            <li><a href="#">Publish Settings</a></li>
      </ul>
<!--        <div class="edittemptab" id="select-box" >Select Template</div>
        <div class="edittemptab" >Edit Contents</div>
        <div class="edittemptab" >Edit Settings</div>-->
    <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
    <div class="tempeditpage">
        <div id="rightconentdiv">							
            <p style="color: #FFFFFF;font-size: 13px;margin-left: 20px;padding: 15px 0 10px;text-align: left;">Select template you wish to use from the below list. if there is design template you would like us to add please contact us</p>
            <?php foreach($templatelist as $templist){?>
            <div class="templistbox" style="float:left;">
            <?php if($this->session->userdata('adminid')==1){ ?>
            <div  style="position:absolute;margin-top:140px;margin-left:55px;" align="center" class="tempeditpng">
                <a class="editdiv" style="font-size:12px !important" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$templist['id'];?>&ftype=4&action=<?= $_REQUEST['aid']?>">Change Image</a>
            </div> 
             <?php } ?>   
                <div class="tempname" align="center"><b><?=$templist['temp_name'];?></b>
                    <div style="font-style: italic;"><?=$templist['template_subtitle'];?></div>
                </div>
                <a href="<?=base_url();?>index.php/page/viewtemplate?tempid=<?=base64_encode($templist['id']);?>&action=<?=base64_encode("1")?>"><img src="<?=base_url();?>images/tempimgs/<?=$templist['temp_picture'];?>" width="109" height="158" /></a>
                
                <a href="<?=base_url();?>index.php/page/temppreview?tempid=<?=$templist['id'];?>" class="temppreview" >Preview</a>
                <?php if($templist['temp_isdelete']==1 && $this->session->userdata('adminid')==1){ ?> <a href="<?=base_url();?>index.php/page/deletetemp?tempid=<?=$templist['id'];?>&action=<?= $_REQUEST['aid']?>" class="temppreview delsub" >Delete Template</a> <?php } ?>
                <?php if($this->session->userdata('adminid')==1){ ?>
                <a class="editdiv delsub" style="font-size:12px !important" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$templist['id'];?>&ftype=5&action=<?= $_REQUEST['aid']?>">Change Subtitle</a>
                 <?php } ?> 
            </div>
            <?php } ?>
            <div style="clear:both;"></div>
        </div>
    </div>
    </div>
</div>
<div style="clear:both;"></div>