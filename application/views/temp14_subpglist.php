<div style="width: 500px;height: 50px;" align="center">
<strong>Select sub page from list</strong>
<form action="<?=base_url();?>index.php/page/chrismas_addsubpg" method="post">
    <select name="subpgid">
        <option value="1">Special offer</option>
        <option value="2">Lottery</option>
        <option value="3">Share & Win</option>
    </select>
    <input type="submit" value=" Select "  />
    <input type="hidden" name="subpgday" value="<?=$_REQUEST['subpgday'];?>" />
</form>
</div>