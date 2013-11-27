<?php $this->load->view('styles/style'.$tempid,$tempdata);?>

<script>
function updatelink(fieldvalueid,value)
{
   var dataHTML='<input type="text" style="margin-top:8px; margin-right:10px;" value="'+value+'" name="urllink" id="urllink">';
   dataHTML +='<button type="submit" class="btn btn-primary" onclick="update_link('+fieldvalueid+'); return false;">Update</button>';
   jQuery.facebox(dataHTML);
   
}

function update_link(fieldvalueid)
{
   urllinkvalue=$('#facebox input[type=text]:first').val(); 
   $.facebox.close();
   
        $.ajax({
        type: 'POST',
                    'url': 'https://apps2.cuecow.com/index.php/page/update_link',
                    'data': {
                        'fieldvalue_id': fieldvalueid,
                        'urllink_value':urllinkvalue
                    },
                    'dataType': 'json',
        'success': function(response) {
            //console.log(response);
            window.location.href = "https://apps2.cuecow.com/index.php/page/viewtemplate";
        },
        'error': function(){
            console.log('Error');
        }
        }); 
}
</script>    
<div class="static-temp-three-wrapper" style="margin-top:20px;">
        <div  style="position:absolute;margin-top:-36px;margin-left:703px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change BG Color</a>
        </div> 
    <div class="static-temp-three-top-content" align="center">
        <div  style="position: absolute; margin-left: 700px; margin-top: 21px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>&width=790&height=526">Change image</a> 
        </div>	
        <div  style="position: absolute; margin-left: 700px; margin-top: 65px;" align="center" class="tempeditpng">
            <a class="editlink" href="#" onclick="updatelink(<?=$tempdata[1][1]['id'];?>,'<?=$tempdata[1][1]['value'];?>'); return false;">Change Link</a> 
        </div>	
        <a href="<?=$tempdata[1][1]['value'];?>" target="_blank"><img src="<?=base_url()?>images/790X526/<?=$tempdata[1][0]['value'];?>" /></a>
    </div><!----- temp-two-top-content ----->
    <div style="clear:both; padding-top:10px;"></div>
    <div class="static-temp-three-left-content" align="right">
        <div  style="position: absolute; margin-top: 21px; margin-left: -54px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>&width=250&height=180">Change image</a> 
        </div>
        <div  style="position: absolute; margin-top: 65px; margin-left: -54px;" align="center" class="tempeditpng">
            <a class="editlink" href="#" onclick="updatelink(<?=$tempdata[2][2]['id'];?>,'<?=$tempdata[2][2]['value'];?>'); return false;">Change Link</a> 
        </div>
        <a href="<?=$tempdata[2][2]['value'];?>" target="_blank"><img src="<?=base_url()?>images/250X180/<?=$tempdata[2][0]['value'];?>" /></a>
        
    </div><!----- static-temp-three-left-content ----->
    <div class="static-temp-three-right-content" align="left">
        <div  style="position: absolute; margin-top: 21px; margin-left: 300px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>&width=250&height=180">Change image</a>
        </div>
        <div  style="position: absolute; margin-top: 65px; margin-left: 300px;" align="center" class="tempeditpng">
            <a class="editlink" href="#" onclick="updatelink(<?=$tempdata[2][3]['id'];?>,'<?=$tempdata[2][3]['value'];?>'); return false;">Change Link</a> 
        </div>
        <a href="<?=$tempdata[2][3]['value'];?>" target="_blank"><img src="<?=base_url()?>images/250X180/<?=$tempdata[2][1]['value'];?>"  /></a>
    </div><!----- static-temp-three-left-content ----->
    <div style="clear:both; padding-bottom:10px;"></div>
    <div class="static-temp-three-bottom-content">
        <div  style="position: absolute;margin-left: 700px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change color</a>
        </div>
        <div  style="position: absolute; margin-left: -61px; margin-top: -29px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Change text</a>
        </div>
        <div  style="position: absolute; margin-left: -61px; margin-top: 20px;" align="center" class="tempeditpng">
            <a class="editlink" href="#" onclick="updatelink(<?=$tempdata[3][4]['id'];?>,'<?=$tempdata[3][4]['value'];?>'); return false;">Change Link</a> 
        </div>
    <a href="<?=$tempdata[3][4]['value'];?>" target="_blank"><?=$tempdata[3][1]['value'];?></a>
        <div  style="position: absolute; margin-left: 101px; margin-top: -54px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>">Change text</a>
        </div>
        <div  style="position: absolute; margin-left: 101px; margin-top: 0px;" align="center" class="tempeditpng">
            <a class="editlink" href="#" onclick="updatelink(<?=$tempdata[3][5]['id'];?>,'<?=$tempdata[3][5]['value'];?>'); return false;">Change Link</a> 
        </div>
        <a href="<?=$tempdata[3][5]['value'];?>"  target="_blank"><?=$tempdata[3][2]['value'];?></a>
        <div  style="position: absolute; margin-left: 250px; margin-top: -54px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][3]['id'];?>&ftype=<?=$tempdata[3][3]['typeid'];?>">Change text</a>
        </div>
        <div  style="position: absolute; margin-left: 250px; margin-top: -1px;" align="center" class="tempeditpng">
            <a class="editlink" href="#" onclick="updatelink(<?=$tempdata[3][6]['id'];?>,'<?=$tempdata[3][6]['value'];?>'); return false;">Change Link</a> 
        </div>
    <a href="<?=$tempdata[3][6]['value'];?>" target="_blank"><?=$tempdata[3][3]['value'];?></a>
</div><!----- static-temp-three-bottom-content ----->
    <div style="padding-bottom:10px"></div>
</div><!----- temp-two-wrapper ----->
<div style="clear: both;"></div>