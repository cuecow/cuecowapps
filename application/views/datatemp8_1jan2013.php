
<!--*********Photo Upload Form**************-->
<div id="overlayLight" style="display: none;"></div>
<div class="dialog" id="formDialog" style="display: none;">
    <div class="dialogTop"></div>
    <div class="dialogContent">
        <h3 class="gallery-app-right-col-heading">Submit your photo</h3>        
        <div class="header">
            Fill in the fields below and submit your own photo competition. When you press the "submit photo" you agree to the conditions of competition <a onclick="showTermsDialog(); return false;" href="#">competitive conditions</a>
        </div>

        <label for="inputName">Name</label>
        <input id="inputName" type="text" name="name" value="" maxlength="255" />

        <label for="inputEmail">E-mail</label>
        <input id="inputEmail" type="text" name="email" value="" maxlength="255" />

        <label for="inputAge">Age</label>
        <input id="inputAge" type="text" name="age" value="" maxlength="255" />

        <div class="line">
            <div class="left">
                <label for="inputImage">Select Image</label>
                <div class="uploadWrapper">
                    <img class="image" id="image" src="/images/images/noPhoto.gif" alt="" />
                    <div id="imguploadfrm">
                    <form id="uploadForm" method="post" action="gallery_app/addpic/" enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                        <input class="uploadFile" id="uploadFile" type="file" name="file" />
                    </form>
                    </div>    
                </div>
                <input id="inputImage" type="hidden" name="image" value="" />
            </div>
            <div class="right">
                <label for="inputText">Add text</label>
                <textarea id="inputText" name="text"></textarea>
            </div>
        </div>         
        
        <table class="button" cellpadding="0" cellspacing="0">
            <tr><td><a href="#" onClick="submit(); return false;"><span>Submit a photo</span></a></td></tr>
        </table>

    </div>
    <div class="dialogBottom"></div>
    <a class="dialogClose" href="#" onClick="closeFormDialog(); return false;"></a>
</div><!--End #formDialog -->

<div class="dialog" id="bigimagedialog" style="display: none;">
    <div class="dialogTop"></div>
    <div class="dialogContent">
        <img id="bigimg" src="" />        
    </div>
    <div class="dialogBottom"></div>
    <a class="dialogClose" href="#" onClick="closeFormDialog(); return false;"></a>
</div><!--End #bigimagedialog-->
  <div id="overlay" style="display: none;"></div>

    <div class="dialog" id="endDialog" style="display: none; top: 200px;">
        <div class="dialogTop"></div>
        <div class="dialogContent" style="font-size: 20px; text-align: center;"></div>
        <div class="dialogBottom"></div>
    </div><!-- #endDialog -->

    <div class="dialog" id="errorDialog" style="display: none;">
        <div class="dialogTop"></div>
        <div class="dialogContent"></div>
        <div class="dialogBottom"></div>
        <a class="dialogClose" href="#" onclick="closeDialog( 'error' ); return false;"></a>
    </div><!-- #errorDialog -->
<div class="dialog" id="thanksDialog" style="display: none;">
    <div class="dialogTop"></div>
    <div class="dialogContent">
        <div class="header"><?=$tempdata[5][0]['value'];?></div>
        <div class="header2"><?=$tempdata[5][1]['value'];?></div>
    </div>
    <div class="dialogBottom"></div>
    <a class="dialogClose" href="#" onclick="closeThanksDialog(); return false;"></a>
</div><!-- #thanksDialog -->
 <div class="dialog" id="thanks2Dialog" style="display: none;">
        <div class="dialogTop"></div>
        <div class="dialogContent">
            <div class="header">
                Your vote has been received                
            </div>
            <div class="header2">
                Thank you for voting
            </div>
        </div>
        <div class="dialogBottom"></div>
        <a class="dialogClose" href="#" onclick="closeThanks2Dialog(); return false;"></a>
    </div><!-- #thanks2Dialog -->
<div class="dialog" id="termsDialog" style="display: none;">
    <div class="dialogTop"></div>
    <div class="dialogContent">
    <div class="dialogScroll">
            <?php if($tempid==8){ ?>
            <h3><?=$tempdata[4][0]['value'];?></h3>
            <?=$tempdata[4][2]['value'];
            }
       else {?>
            <h2><?=$tempdata[3][0]['value'];?></h2>
            <?=$tempdata[3][2]['value']; ?> 
      <?php }?>
    </div>
    </div>
    <div class="dialogBottom"></div>
    <a class="dialogClose" href="#" onclick="closeDialog( 'terms' ); return false;"></a>
</div><!-- #termsDialog -->
<div class="dialog" id="viewDialog" style="display: none;">
        <div class="dialogTop"></div>
        <div class="dialogContent"></div>
        <div class="dialogBottom"></div>
        <a class="dialogClose" href="#" onclick="closeViewDialog(); return false;"></a>
</div><!-- #viewDialog -->