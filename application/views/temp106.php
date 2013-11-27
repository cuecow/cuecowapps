<?php $this->load->view('styles/style'.$tempid,$tempdata);?>
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<?php $mode = (isset($_REQUEST['mode'])? $_REQUEST['mode'] : '');?>
<div id="tabs" style="font-size:12px;background-color:#FFFFFF">
    <ul>
        <li><a href="#edittemplate"><span>Edit template</span></a></li>		
    </ul>
<div id="edittemplate">
<div class="desgin-app-main-wrapper">
	<div class="desgin-app-top-slice">
    </div><!--- desgin-app-top-slice --->
    <div class="desgin-app-data-slice">
        <div  style="position:absolute;margin-top:-60px;margin-left:680px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[0][0]['id'];?>&ftype=<?=$tempdata[0][0]['typeid'];?>">Change BG Color</a>
        </div> 
    	<div class="desgin-app-top-container">
        <div  style="position:absolute;margin-top:-30px;margin-left:-128px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][1]['id'];?>&ftype=<?=$tempdata[1][1]['typeid'];?>">Change Text</a>
        </div>
        <div  style="position:absolute;margin-top:-30px;margin-left:678px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[1][0]['id'];?>&ftype=<?=$tempdata[1][0]['typeid'];?>">Change Color</a>
        </div>
            <h2><?=$tempdata[1][1]['value'];?></h2>
        </div><!--- desgin-app-top-container --->
        <div class="clear" style="padding:5px"></div>
    	<div class="desgin-app-data-container">
        <div  style="position:absolute;margin-top:6px;margin-left:678px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[2][0]['id'];?>&ftype=<?=$tempdata[2][0]['typeid'];?>&width=830&height=420">Change Image</a>
        </div>            
        <img src="<?=  base_url();?>images/830X420/<?=$tempdata[2][0]['value'];?>" width="760" height="473" />
        	<div class="desgin-app-header-cnt">
        	<div class="desgin-app-left-col">
                <div  style="position:absolute;margin-top:6px;margin-left:-78px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[2][1]['id'];?>&ftype=<?=$tempdata[2][1]['typeid'];?>&width=320&height=196">Change Image</a>
                </div>   
            	<div class="desgin-app-left-img-cnt"><img src="<?=  base_url();?>images/320X196/<?=$tempdata[2][1]['value'];?>" width="292" height="179" /></div>
            </div><!--- desgin-app-left-col --->
            <div class="desgin-app-right-col">
                <div  style="position:absolute;margin-top:-27px;margin-left:117px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][2]['id'];?>&ftype=<?=$tempdata[2][2]['typeid'];?>">Change Text</a>
                </div>
            	<h2><?=$tempdata[2][2]['value'];?></h2>
                <div  style="position:absolute;margin-top:-20px;margin-left:278px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][3]['id'];?>&ftype=<?=$tempdata[2][3]['typeid'];?>">Change Text</a>
                </div>
                <p><?=$tempdata[2][3]['value'];?></p>
                <ul class="desgin-app-list">
                    <div  style="position:absolute;margin-top:-10px;margin-left:175px;" align="center" class="tempeditpng">
                        <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[2][4]['id'];?>&ftype=<?=$tempdata[2][4]['typeid'];?>">Change Text</a>
                    </div>
                    <?=$tempdata[2][4]['value'];?>
                </ul>
            </div><!--- desgin-app-right-col --->
            </div><!--- desgin-app-header-cnt --->
            <div class="clear"></div>
        </div><!--- desgin-app-data-container --->
        <div class="desgin-app-middle-container">

        <div  style="position:absolute;margin-top:190px;margin-left:125px;" align="center" class="tempeditpng">
            <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][0]['id'];?>&ftype=<?=$tempdata[3][0]['typeid'];?>">Change Color</a>
        </div>
        <div class="desgin-app-middle-left">
                <div  style="position:absolute;margin-top:-30px;margin-left:58px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][1]['id'];?>&ftype=<?=$tempdata[3][1]['typeid'];?>">Change Text</a>
                </div>
                <h3><?=$tempdata[3][1]['value'];?></h3>
                <div  style="position:absolute;margin-top:4px;margin-left:-145px;" align="center" class="tempeditpng">
                    <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[3][2]['id'];?>&ftype=<?=$tempdata[3][2]['typeid'];?>">Change Text</a>
                </div>
                <p><?=$tempdata[3][2]['value'];?></p>
        </div><!--- desgin-app-middle-left --->
        <div class="desgin-app-middle-right">
        	<img src="<?=  base_url();?>images/407X255/<?=$tempdata[4][2]['value'];?>" width="372" height="235" />
                <div  style="position:absolute;margin-top:-132px;margin-left:319px;" align="center" class="tempeditpng">
                  <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[4][2]['id'];?>&ftype=<?=$tempdata[4][2]['typeid'];?>&width=407&height=255">Change Image</a>
                </div> 
            <p class="desgin-app-middle-right-pera-one"><?=$tempdata[4][1]['value'];?></p>
            <div  style="position:absolute;margin-top:-249px;margin-left:-19px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][1]['id'];?>&ftype=<?=$tempdata[4][1]['typeid'];?>">Change Text</a>
            </div> 
            <div  style="position:absolute;margin-top:-226px;margin-left:333px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][0]['id'];?>&ftype=<?=$tempdata[4][0]['typeid'];?>">Change Color</a>
            </div>   
            <div class="clear"></div>
            <div class="desgin-app-middle-right-btm-cnt">
            <div  style="position:absolute;margin-top:-1px;margin-left:146px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][3]['id'];?>&ftype=<?=$tempdata[4][3]['typeid'];?>">Change Text</a>
            </div> 
            <h3><?=$tempdata[4][3]['value'];?></h3>
            <div  style="position:absolute;margin-top:-23px;margin-left:333px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[4][4]['id'];?>&ftype=<?=$tempdata[4][4]['typeid'];?>">Change Text</a>
            </div> 
            <p><?=$tempdata[4][4]['value'];?></p>
            </div><!--- desgin-app-middle-right-btm-cnt --->
        </div><!--- desgin-app-middle-right --->
        <div class="clear"></div>
        </div><!--- desgin-app-middle-container --->
        <div class="clear"></div>
        <div class="desgin-app-bottom-container">
            <div  style="position:absolute;margin-top:31px;margin-left:472px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][0]['id'];?>&ftype=<?=$tempdata[5][0]['typeid'];?>">Change Color</a>
            </div> 
            <div  style="position:absolute;margin-top:-28px;margin-left:-124px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/editpopup?val_id=<?=$tempdata[5][1]['id'];?>&ftype=<?=$tempdata[5][1]['typeid'];?>">Change Text</a>
            </div>        
            <p><?=$tempdata[5][1]['value'];?></p>
            <div  style="position:absolute;margin-top:-39px;margin-left:697px;" align="center" class="tempeditpng">
                <a class="editdiv" href="<?=base_url();?>index.php/page/edit_image?val_id=<?=$tempdata[5][2]['id'];?>&ftype=<?=$tempdata[5][2]['typeid'];?>&width=95&height=22">Change Image</a>
            </div>
            <a href="#" class="desgin-app-bottom-logo"><img src="<?=  base_url();?>images/95X22/<?=$tempdata[5][2]['value'];?>" width="93" height="20" /></a>
            <div class="clear"></div>
        </div><!--- desgin-app-bottom-container --->
    <div class="clear"></div>
    </div><!--- desgin-app-main-data --->
    <div class="desgin-app-bottom-slice">
    </div><!--- desgin-app-bottom-slice --->
</div>