<div id="mydiv" style="width: 400px;-moz-animation-delay:">
    <div class="popup-data">
        <div class="popup-top-title">Select profile Picture</div>
        <div class="clear" style="clear:both"></div>
        <div class="uploadfrm">
        <form action="<?=base_url();?>index.php/page/upload_profile_pic" name="profilefrm" method="post" enctype="multipart/form-data">
            <input type="file" name="profile_img" />
            <input type="submit" value="Upload" class="top-green-btn" onclick="return libvalidate()"/>
        </form>
        </div>
    </div>
</div>
<script>
function libvalidate()
{
    if(profilefrm.profile_img.value=="")
    {
        alert("You didn't select image");
        profilefrm.profile_img.focus();
        return false;
    }
}
</script>