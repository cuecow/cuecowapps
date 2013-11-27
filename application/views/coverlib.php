<div id="mydiv" style="width: 400px;-moz-animation-delay:">
    <div class="popup-data">
        <div class="popup-top-title">Select media from your library</div>
        <div class="clear" style="clear:both"></div>
        <div class="uploadfrm">
        <form action="<?=base_url();?>index.php/page/uploadlibimg" name="libfrm" method="post" enctype="multipart/form-data">
            <input type="file" name="cover_img" />
            <input type="submit" value="Upload" class="top-green-btn" onclick="return libvalidate()"/>
        </form>
        </div>
        <div class="clear" style="clear:both"></div>
        <div class="table-top-title">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td width="80">Images</td>
                    <td width="230" align="center">Name</td>
                    <td align="center">Action</td>
                </tr>
            </table>
        </div>
        <div class="table-scroll-data">
            <table border="0">
                <?php for($i=0;$i<count($file);$i++){?>
                <tr>
                    <td width="80"><img src="<?=base_url().$path.$file[$i];?>" width="80" height="50" alt="Cover Picture" /></td>
                    <td width="223" align="center" style="overflow:hidden;"><?=$file[$i];?></td>
                    <td align="center"><a href="<?=base_url();?>index.php/page/dellibpic?file=<?=$file[$i]?>"><img src="<?=base_url();?>images/delete-btn_06.png" width="16" /></a></td>
                    <td class="grey-btn" align="center"><a href="<?=base_url();?>index.php/page/setcoverpic?file=<?=$file[$i]?>"><img src="<?=base_url();?>images/gray-btn_07.png" width="47" /></a></td></tr>
                </tr>
                <tr><td height="10"></td></tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>
<script>
function libvalidate()
{
    if(libfrm.cover_img.value=="")
    {
        alert("You didn't select image");
        libfrm.cover_img.focus();
        return false;
    }
}
</script>