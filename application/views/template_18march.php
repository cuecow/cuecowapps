<!--/********************Tabs**********************************-->
<link href="<?=base_url();?>js/tabs/tabs.css" rel="stylesheet" type="text/css"/>
<script src="<?=base_url();?>js/tabs/jquery-ui.min.js"></script>
<script src="<?=base_url();?>js/manage_scroll.js"></script>
<?php $tabid = (isset($_REQUEST['tabid']) ? $_REQUEST['tabid'] : 0 );?>
<script>
$(document).ready(function() {
$("#tabs").tabs()
$("#tabs").tabs("option", "selected",<?=$tabid;?>)
});
</script>
<!--/********************End Tabs**********************************-->
<link rel="stylesheet" href="<?=base_url();?>js/facefiles/facebox.css" />
<script src="<?=base_url();?>js/facefiles/facebox.js"></script>	
<script>
jQuery(document).ready(function($){
    
    // Save scroll position on editing any field
    $('.editdiv').click( function() { saveScroll(); } );
    // Load the scroll, saved at the time of editing
    loadScroll(true);
    
    
    $(".editdiv").facebox();
    $('a[rel*=facebox]').facebox();
    
    
    
    $('#hideshow').live('click', function(event) {
        $('.tempeditpng').toggle('show');
        if($('#hideshow').text()=="Preview")
        {
            //alert('Edit');
            $(this).text("Edit");            
        }
        else if($('#hideshow').text()=="Edit")
        {
            //alert('Preview');
            $(this).text("Preview");            
        }        
    });

    //window.scrollTo(0,530)
    
})
</script>
<script>
function select_theme(tempid,tempname,dbappid,parent_id)
{       //alert(tempid);alert(tempname);alert(dbappid);alert(parent_id);
    $.ajax({
                type: 'POST',
                            'url': 'getThemes',
                            'data': {
                                'dbapp_id': dbappid
                             },
                            'dataType': 'json',
                'success': function(response) {
                    result=response['result'];
                    var dataHTML = '<h3>Please Select Theme</h3>';
                        dataHTML += '<select id="selectevent"><option selected="selected">Select Theme</option>';

                      for ( var i=0;i<result.length;i++ ) {
                          dataHTML += '<option id="'+result[i]['temp_name']+'">'+result[i]['temp_name']+'</option>';
                      }
                      dataHTML += '</select>'
                      dataHTML += '<input type="button" onClick="copytempalte('+tempid+',\''+tempname+'\','+dbappid+','+parent_id+')" value="Submit" />'
                      jQuery.facebox(dataHTML,'styleclass');
                },
                'error': function(){
                    console.log('Error');
                }
            });  
}
function copytempalte(tempid,tempname_org,dbappid,parent_id)
{
  themename_selected = $('#facebox select:first').val(); 
            $.ajax({
             type: 'POST',
                        'url': 'copytemp',
                        'data': {
                            'tempid': tempid,
                            'tempnameorg': tempname_org,
                            'dbapp_id': dbappid,
                            'parentid': parent_id,
                            'themenameselected': themename_selected
                        },
                        'dataType': 'json',
            'success': function(response) {
                jQuery.facebox('<h3>Your Template Copy is Created Sucessfully!</h3>');
            },
            'error': function(){
                alert('Error');
            }
            });
}
function saveas_default(tempid)
{
             $.ajax({
             type: 'POST',
                        'url': 'save_asdefault',
                        'data': {
                            'tempid': tempid
                        },
                        'dataType': 'json',
            'success': function(response) {
                jQuery.facebox('<h3>Your Template data is Saved Sucessfully as default!</h3>');
            },
            'error': function(){
                alert('Error');
            }
            });   
}
</script>    
<div class="content-right">
    <div id="contentdata" style="padding-left:50px;">
        <div class="title-crumbs">
            <h2 style="margin-bottom:5px;">Edit your app: Select template, edit contents & settings and publish</h2>
            <h5>Remember that your content will not be visible until you save & publish</h5>
            <br />
        </div>
        <div class="content-menu" style="float: right;margin: 10px 0px -2px 0;">
            <div class="edittemptab" style="width:150px;">Select Template</div>
            <a href="<?=base_url()?>index.php/page/viewtemplate"><div class="edittemptab" id="select-box" style="width:120px;">Edit Contents</div></a>
            <a href="<?=base_url()?>index.php/page/app_settings/"><div class="edittemptab" style="width:120px;">Edit Settings</div></a>
            <a href="<?=base_url()?>index.php/page/app_settings/"><div class="next-btn"></div></a>
        </div>
        <div style="clear:both;"></div>
        <div class="tempeditpageborder">
            <div style="margin: 10px;">
                <a href="javascript:void(0);" id='hideshow' class="preview-edit-btn">Preview</a>
               <?php if($this->session->userdata('dbappid')!=2 && $this->session->userdata('adminid')==1){ ?>
                <a href="#" id='dflt-tmplt' class="cupid-green" style="float: right;"  onclick="saveas_default(<?=$tempid;?>); return false;">Save as default template</a>
                <?php } if($this->session->userdata('adminid')==1) {?>
                <a href="#" id='dflt-tmplt' class="cupid-green" style="float: right; margin-right: 10px;" onclick="select_theme(<?=$tempid;?>,'<?=$templatedata[0][0]['temp_name'];?>',<?=$templatedata[0][0]['dbappid'];?>,<?=$templatedata[0][0]['parent_id'];?>); return false;">Save as new template</a>
                <?php } ?>
                <div style="clear:both;"></div>
            </div>
            <?php 
            $innetdata = array();
            if($this->session->userdata('dbappid')==2)
            {
                $innetdata['tempdata'] = $tempdata;
                $innetdata['quiz'] = $quizdata['quiz'][0];
                $innetdata['options'] = $quizdata['options'];
                $innetdata['quiz_tags'] = '<ul><li><a><p><b><strong><i><em><h1><h2><h3><h4><h5><h6><font><br>';
            }    
            $this->load->view('temp'.$tempid , $innetdata);
            ?>
        </div>
    </div>
</div>
<div style="clear: both;"></div>