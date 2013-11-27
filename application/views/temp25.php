<?php $this->load->view('styles/style'.$tempid,$tempbgclr);?>

<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#fan-week-app-main-wrapper_1"><span>Edit template</span></a></li>
        <li><a href="#fan-week-app-main-wrapper_2"><span>Edit Candidate template</span></a></li>
        <li><a href="#askforvote"><span>Edit Voting</span></a></li>
    </ul>
<div class="fan-week-app-main-wrapper" id="fan-week-app-main-wrapper_1">
	<div class="fan-week-app-top-conent">
        <div  style="position:absolute;margin-top:-40px;margin-left:680px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][6]['id'];?>&ftype=<?=$tempdata[0][6]['typeid'];?>">Change BG Color</a>
        </div> 
    	<div class="fan-week-app-top-left">
                <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change Text</a>
                </div>
        	<div class="fan-week-app-top-title"><?=$tempdata[0][0]['value'];?></div>
            <div style="height:10px"></div>
        	<div class="fan-week-app-top-left-image-content">
                    <div  style="position: absolute; margin-left: 420px; margin-top: 313px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[0][5]['id'];?>&ftype=<?=$tempdata[0][5]['typeid'];?>&width=580&height=385">Change Image</a>
                    </div>
                    <img src="<?=  base_url();?>images/580X385/<?=$tempdata[0][5]['value'];?>" width="530" height="355" />
                <div class="fan-week-app-top-left-thumbnail-cnt">
<!--                	<img src="images/images/thumbnail.png" width="176" height="109" />-->
                </div>
            </div><!--- fan-week-app-top-left-image-content --->
        </div><!--- fan-week-app-top-left --->
        <div class="fan-week-app-top-right">
                <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change Text</a>
                </div>
        	<div class="fan-week-app-top-title"><?=$tempdata[1][0]['value'];?></div>
            <div style="height:10px"></div>
                <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change Text</a>
                </div>
        	<p class="fan-week-app-top-right-pera-admin"><?=$tempdata[1][1]['value'];?></p>
            <div class="choose-me-btn"><a href="#" class="blue-btn">Please choose me</a></div>
            <div  style="position: absolute; margin-top: -9px; margin-left: -148px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][4]['id'];?>&ftype=<?=$tempdata[1][4]['typeid'];?>">Change Text</a>
            </div>
            <p class="fan-week-app-top-right-pera-admin"><?=$tempdata[1][4]['value'];?></p>
        </div><!--- fan-week-app-top-right --->
        <div class="clear"></div>
    </div><!--- fan-week-app-top-conent --->
</div><!--- fan-week-app-main-wrapper --->

<div class="fan-week-app-main-wrapper" id="fan-week-app-main-wrapper_2">
    <div class="show-fan-inner-content">
		<div  style="position: absolute; margin-left: -145px; margin-top: 1px; align="center" class="tempeditpng">
			<a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][8]['id'];?>&ftype=<?=$tempdata[0][8]['typeid'];?>">Change Text</a>
		</div>
    	<div class="show-fan-inner-top"><?=$tempdata[0][8]['value'];?></div>
		<div  style="position: absolute; margin-left: -145px; margin-top: 8px;" align="center" class="tempeditpng">
			<a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[0][7]['id'];?>&ftype=<?=$tempdata[0][7]['typeid'];?>&width=640&height=425">Change Image</a>
		</div>
        <div class="show-fan-inner-middle"><img src="<?=  base_url();?>images/640X425/<?=$tempdata[0][7]['value'];?>" width="640" height="425" />
        		<div class="show-fan-inner-middle-thumbnail-cnt">
                	<img src="<?=  base_url();?>images/images/thumbnail.png" width="224" height="160" />
                </div>
        </div><!-- show-fan-inner-middle -->
    </div><!-- show-fan-inner-content -->
    <div class="pick-fan-form">
    <div  style="position: absolute; margin-top: -26px; margin-left: 617px;" align="center" class="tempeditpng">
        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][4]['id'];?>&ftype=<?=$tempdata[0][4]['typeid'];?>">Change Text</a>
    </div>        
    	<div class="pick-fan-form-fields"><input type="checkbox" /> Each 
        <select>
        	<option>Sunday</option>
                <option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>                
        </select> at 
        <select>
        	<option>07:30 am</option>
                <option>08:30 am</option>
                <option>09:30 am</option>
                <option>10:30 am</option>
                <option>11:30 am</option>
                <option>12:30 pm</option>
                <option>01:30 pm</option>
                <option>02:30 pm</option>
                <option>03:30 pm</option>
                <option>04:30 pm</option>
                <option>05:30 pm</option>
        </select> </div>
        <div><?=$tempdata[0][4]['value'];?></div>
    </div><!-- pick-fan-form -->
</div><!--- fan-week-app-main-wrapper --->

<div  id="askforvote">
    <div class="choose-me-content">
            <a href="#" class="choose-me-cross">Close</a>
            <div  style="position: absolute; margin-top: -23px; margin-left: -148px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][1]['id'];?>&ftype=<?=$tempdata[0][1]['typeid'];?>">Change Text</a>
            </div>  
            <h2><?=$tempdata[0][1]['value'];?></h2>
            <form>
            <div  style="position: absolute; margin-top: 5px; margin-left: -138px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][3]['id'];?>&ftype=<?=$tempdata[0][3]['typeid'];?>">Change Text</a>
            </div>      
                    <textarea><?=$tempdata[0][3]['value'];?>
                    </textarea>
                <input type="submit" value="OK" />
            </form>
    </div><!-- choose-me-content -->
    <div class="vote-friend-content">
            <a href="#" class="choose-me-cross">Close</a>
            <h3>Vote for Anders Anderson?</h3>
            <p>You are casting a vote to get Anders Andersen Selected as the Fan of the Week.</p>
            <input type="submit" value="OK" />
    </div><!-- choose-me-content -->
</div>