<html>
<head>
	<title></title>
<?php
$ftype=$_REQUEST['ftype'];
$fid=$_REQUEST['fid'];
$tbl=$_REQUEST['tbl'];
$fname=$_REQUEST['fname'];
if(isset($_REQUEST['fval']))
{
  $fval=$_REQUEST['fval'];
}
?>
<script src="<?=base_url();?>js/richtxt/nicEdit.js" type="text/javascript"></script>
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
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>	
</head>
<body>
<?php if($ftype==1 ||$ftype==2 )
    {
    ?>
    <form action="<?=base_url();?>index.php/page/editquizpopup" method="post">
        <textarea  id="myArea1" name="fval"  onclick="toggleArea1();" style="width:400px;height:200px;"><?=$fval;?></textarea>
        <input class="update-btn" type="submit" value="Update" />&nbsp;&nbsp;&nbsp;<p>&nbsp;<b>Hint:</b> Double Click to use Editor.</p>
        <input type="hidden" name="fid"  value="<?=$fid?>" />
        <input type="hidden" name="ftype"  value="<?=$ftype?>" />
        <input type="hidden" name="tbl"  value="<?=$tbl?>" />
        <input type="hidden" name="fname"  value="<?=$fname?>" />
    </form>
<?php
}
if($ftype==3){?>
<strong>Upload Image</strong>
<form name="imgfrm" action="<?=base_url();?>index.php/page/editquizpopup" method="post" enctype="multipart/form-data">
    <input type="file" name="newimg">
    <input type="submit" value="Update" onclick="return imgvalidate();" />
        <input type="hidden" name="fid"  value="<?=$fid?>" />
        <input type="hidden" name="ftype"  value="<?=$ftype?>" />
        <input type="hidden" name="tbl"  value="<?=$tbl?>" />
        <input type="hidden" name="fname"  value="<?=$fname?>" />	
</form>
<?php } ?>
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
</body>
</html>