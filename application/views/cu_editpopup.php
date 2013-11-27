<html>
<head>
	<title></title>
<?php
$tselect = 1;
?>
<script>
var area1;
function toggleArea1() {
    if(!area1) {
            area1 = new nicEditor({fullPanel : true}).panelInstance('myArea1',{hasPanel : true});
    } else {
            area1.removeInstance('myArea1');
            area1 = null;
    }
}
bkLib.onDomLoaded(function() { nicEditors.allTextAreas();});
</script>	
</head>
<body>
<?php if($ftype==1){?>
    <form action="<?=base_url();?>index.php/page/do_editpopup" method="post">
        <textarea  id="myArea1" name="value"  onclick="toggleArea1();" style="width:400px;height:200px;"><?=$valr['value'];?></textarea>
        <input class="update-btn" type="submit" value="Update" />&nbsp;&nbsp;&nbsp;<p>&nbsp;<b>Hint:</b> Double Click to use Editor.</p>
        <input type="hidden" name="val_id"  value="<?=$val_id?>" />
        <input type="hidden" name="ftype"  value="<?=$ftype?>" />
        <input type="hidden" name="tselect"  value="<?=$tselect?>" />
    </form>
<?php
}if($ftype==2){?>
<script type="text/javascript" src="<?=base_url();?>js/colorpicker/jquery.miniColors.js"></script>
<link type="text/css" rel="stylesheet" href="<?=base_url();?>js/colorpicker/jquery.miniColors.css" />		
<script type="text/javascript">			
    $(document).ready( function() {
    $(".color-picker").miniColors({
        letterCase: 'uppercase',
        change: function(hex, rgb) {
                logData(hex, rgb);
        }
    });		
});
</script>
<div id='colorpicker201' class='colorpicker201'></div>
<p style="font-size:11px;margin-top:0px;margin-bottom:10px;line-height:14px;">If you wish the colour fully transparent, simply empty the colour-code from the input field.</p>
<form action="<?=base_url();?>index.php/page/do_editpopup" method="post">
    <label>Select Color: </label><input type="text" class="color-picker" name="value" style="width: 100px; margin-top:8px"size="6" autocomplete="on" maxlength="10" value="<?=$valr['value'];?>" onclick="colorpick();" />
    <input type="submit" value=" Update" align="right" /> 
    <input type="hidden" name="val_id"  value="<?=$val_id?>" />
    <input type="hidden" name="ftype"  value="<?=$ftype?>" />
    <input type="hidden" name="tselect"  value="<?=$tselect?>" />
</form>
<?php }
if($ftype==3){?>
<strong>Upload Image</strong>
<form name="imgfrm" action="<?=base_url();?>index.php/page/do_editpopup" method="post" enctype="multipart/form-data">
    <input type="file" name="newimg">
    <input type="submit" value="Update" onclick="return imgvalidate();" />
    <input type="hidden" name="val_id"  value="<?=$val_id?>" />
    <input type="hidden" name="ftype"  value="<?=$ftype?>" />
    <input type="hidden" name="tselect"  value="<?=$tselect?>" />	
</form>
<script>
function imgvalidate()
{
    if(imgfrm.newimg.value=="")
    {
        alert("you didn't select image");
        return false;
    }
}
</script>
<?php }
if($ftype==4){?>
<strong>Upload Image</strong>
<form name="imgfrm" action="<?=base_url();?>index.php/page/do_changethumbnail" method="post" enctype="multipart/form-data">
    <input type="file" name="newimg">
    <input type="submit" value="Update" onclick="return imgvalidate();" />
    <input type="hidden" name="val_id"  value="<?=$val_id?>" />
    <input type="hidden" name="ftype"  value="<?=$ftype?>" />
    <input type="hidden" name="tselect"  value="<?=$tselect?>" />	
</form>
<script>
function imgvalidate()
{
    if(imgfrm.newimg.value=="")
    {
        alert("you didn't select image");
        return false;
    }
}
</script>
<?php }if($ftype==5){?>
    <form action="<?=base_url();?>index.php/page/do_changethumbnail" method="post">
        <textarea  id="myArea1" name="value"  onclick="toggleArea1();" style="width:400px;height:200px;"><?=$valr['template_subtitle'];?></textarea>
        <input class="update-btn" type="submit" value="Update" />&nbsp;&nbsp;&nbsp;<p>&nbsp;<b>Hint:</b> Double Click to use Editor.</p>
        <input type="hidden" name="val_id"  value="<?=$val_id?>" />
        <input type="hidden" name="ftype"  value="<?=$ftype?>" />
        <input type="hidden" name="tselect"  value="<?=$tselect?>" />
    </form>
<?php
}if($ftype=="quizans"){?>
<form action="<?=base_url();?>index.php/page/do_editpopup" method="post">
    <textarea autofocus="autofocus" id="myArea1" name="value"  onclick="toggleArea1();" style="width:400px;height:200px;"><?=$valr['optiontxt'];?></textarea> 
    <input class="update-btn" type="submit" value="Update" />&nbsp;&nbsp;&nbsp;<p>&nbsp;<b>Hint:</b> Double Click to use Editor.</p>
    <input type="hidden" name="val_id"  value="<?=$val_id?>" />
    <input type="hidden" name="ftype"  value="<?=$ftype?>" />	
    <input type="hidden" name="tselect"  value="<?=$tselect?>" />	
</form>
<?php }
if($ftype=="quizhead"){?>
<form action="<?=base_url();?>index.php/page/do_editpopup" method="post">
    <textarea autofocus="autofocus" id="myArea1" name="value"  onclick="toggleArea1();" style="width:400px;height:200px;"><?=$valr['qheading'];?></textarea> 
    <input class="update-btn" type="submit" value="Update" />&nbsp;&nbsp;&nbsp;<p>&nbsp;<b>Hint:</b> Double Click to use Editor.</p>
    <input type="hidden" name="val_id"  value="<?=$val_id?>" />
    <input type="hidden" name="ftype"  value="<?=$ftype?>" />	
    <input type="hidden" name="tselect"  value="<?=$tselect?>" />	
</form>
<?php }
if($ftype=="quizdes"){?>
<form action="<?=base_url();?>index.php/page/do_editpopup" method="post">
    <textarea autofocus="autofocus" id="myArea1" name="value"  onclick="toggleArea1();" style="width:400px;height:200px;"><?=$valr['qdescription'];?></textarea>
    <input class="update-btn" type="submit" value="Update" />&nbsp;&nbsp;&nbsp;<p>&nbsp;<b>Hint:</b> Double Click to use Editor.</p>
    <input type="hidden" name="val_id"  value="<?=$val_id?>" />
    <input type="hidden" name="ftype"  value="<?=$ftype?>" />	
    <input type="hidden" name="tselect"  value="<?=$tselect?>" />	
</form>
<?php }?>	
</body>
</html>