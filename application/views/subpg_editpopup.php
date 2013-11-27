<html>
<head>
    <title></title>
<script src="<?=base_url();?>js/richtxt/nicEdit.js" type="text/javascript"></script>
<script>
var area1;
function toggleArea1() {
    if(!area1){
        area1 = new nicEditor({fullPanel : true}).panelInstance('myArea1',{hasPanel : true});
    } else {
        area1.removeInstance('myArea1');
        area1 = null;
    }
}
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>	
</head>
<body>
<form name="imgfrm" action="<?=base_url();?>index.php/page/subpg_editpopup" method="post" enctype="multipart/form-data">
<table style="width:430px;">
    <?php if($ftype==1){?>
    <tr>
        <td><textarea  name="frmsubvalue"  onclick="toggleArea1();" style="width:400px;height:200px;"><?=$fval;?></textarea>
        <input class="update-btn" type="submit" value="Update" /><!--&nbsp;&nbsp;&nbsp;<p>&nbsp;<b>Hint:</b> Double Click to use Editor.</p></td>-->
    </tr>
    <?php } if($ftype==2){?>
    <tr>
        <td>
            <div id='colorpicker201' class='colorpicker201'></div>
            <p style="font-family:Arial, Helvetica, sans-serif;font-size:11px;margin-top:0px;margin-bottom:10px;auto;line-height:14px;">If you wish the colour fully transparent, simply empty the colour-code from the input field.</p>
            <label>Select Color: </label>
            <input type="text" class="color-picker" name="value" size="6" autocomplete="on" maxlength="10" value="<?=$fval;?>" />
            <input class="update-btn" type="submit" value="Update" />   
        </td>
    </tr>  
    <?php } if($ftype==3){?>
    <tr>Target Image will be displayed to 160 X 100px</tr>
    <tr>
        <td><strong>Upload Image</strong></td>
        <td><input type="file" name="subpgimg"> </td>
        <td><input type="submit" value=" Upload " /></td>
    </tr>
    <?php }?>
</table> 
<input type="hidden" name="subpgid" value="<?=$subpgid?>">
<input type="hidden" name="fname" value="<?=$fname?>">
<input type="hidden" name="fid" value="<?=$fid?>">
<input type="hidden" name="ftype" value="<?=$ftype?>">
</form>
</body>
</html>