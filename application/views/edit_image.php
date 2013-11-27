<html>
<head>
	<title></title>
<?php
$tselect = 1;
$subpg_id = $_REQUEST['subpgid'];
$fn = $_REQUEST['fname'];
?>	
</head>
<body>
<p style="font-size: 10.20px;">Target size of image is  <?=$width; ?> X <?=$height; ?>px. Image will be resized and cropped if needed.</p>
<p style="font-size: 10.20px;">If you want No Image then only Click Update otherwise Browse Image.</p>
<form name="imgfrm" action="<?=base_url();?>index.php/page/do_editimage" method="post" enctype="multipart/form-data">
    <input type="file" name="newimg">
    <input type="submit" value="Update" />
    <input type="hidden" name="val_id"  value="<?=$val_id?>" />
    
    <input type="hidden" name="fn" value="<?=$fn?>">
    <input type="hidden" name="fid" value="<?=$fid?>">
    <input type="hidden" name="val_id_sp"  value="<?=$val_id_sp?>" />
    
    <input type="hidden" name="ftype"  value="<?=$ftype?>" />
    <input type="hidden" name="tselect"  value="<?=$tselect?>" />
    <input type="hidden" name="width"  value="<?=$width?>" />
    <input type="hidden" name="height"  value="<?=$height?>" />
    <?php 
    if($ftype=='quizimg')
    { ?>
    <input type="hidden" name="fname"  value="<?=$fname?>" />  
   <?php }  else { ?>
    <input type="hidden" name="fname"  value="" />     
           <?php }
    ?>
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
</body>
</html>