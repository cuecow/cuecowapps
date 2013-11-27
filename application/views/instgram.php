<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
 var insat_userid = <?=$insta_user_id;?>;
 var insat_acc_tkn = '<?=$insta_acc_tkn;?>';
$.ajax({
        type: "GET",
        dataType: "jsonp",
        cache: false,
        url: "https://api.instagram.com/v1/users/"+insat_userid+"/media/recent/?access_token="+insat_acc_tkn+"",
        success: function(response)
        {
            result_pic=response.data;
            console.log(result_pic);
            for (var i = 0; i < result_pic.length; i++) 
             {
                $("#pics").append("<a target='_blank' href='" + result_pic[i].link +
                "'><img src='" + result_pic[i].images.low_resolution.url +"'></img></a>");
             }
        }
    });
</script>
</head>
    <body>
        <div id="pics">
            
        </div>
    </body>    
</html>    