<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('image_resize'))
{
    function image_resize($imgName,$reqWidth,$reqHeight,$folderPath)
    {    
        list($a)= explode(':', $folderPath);
        $newimg = $imgName;
        $THUMB_WIDTH = $reqWidth;
        $THUMB_HEIGHT = $reqHeight;
        
        // check directry if exit ok! else create new directry
        $path = "images/".$THUMB_WIDTH."X".$THUMB_HEIGHT."/";
        if( !is_dir($path) )
        {
          mkdir($path , 0777);           
        }
            
        // Here I am sure, there is directory        
        $checkImageExitWhenUrl="images/".$THUMB_WIDTH."X".$THUMB_HEIGHT."/".$newimg;
        $imagename_path = "images/".$THUMB_WIDTH."X".$THUMB_HEIGHT."/".$newimg;
        if (file_exists($imagename_path))
            {
              return $imagename_path;
            }
        elseif(($a=="http" || $a=="https") && !file_exists($checkImageExitWhenUrl))
            {
             $copyfrmoldbigimg = $folderPath;
             $copytonewbigimg = "images/".$THUMB_WIDTH."X".$THUMB_HEIGHT."/".$newimg;
             copy($copyfrmoldbigimg, $copytonewbigimg) or die("Unable to copy $copyfrmoldbigimg to $copytonewbigimg.");
             return resizeImageMgr($newimg,$THUMB_WIDTH,$THUMB_HEIGHT);
            }
        else {
        $imagename_oldpath = $folderPath.$newimg;
        $imagename_newpath = $path.$newimg;
        copy($imagename_oldpath, $imagename_newpath) or die("Unable to copy $imagename_oldpath to $imagename_newpath.");

        // call to resize image Mgr
        return resizeImageMgr($newimg,$THUMB_WIDTH,$THUMB_HEIGHT);
        }        
    }
}  

if(!function_exists('resizeImageMgr'))
{
    function resizeImageMgr($newimg,$THUMB_WIDTH,$THUMB_HEIGHT)
    {
        $CI =& get_instance();
        // get image to resize
        $path = "images/".$THUMB_WIDTH."X".$THUMB_HEIGHT."/";
        $imagename = $path.$newimg;
        $size = getimagesize($imagename);
        $imgwidth=$size[0];
        $imgheight=$size[1];
            // if height is unlimited else normol
        if($THUMB_HEIGHT==="auto")
        {
                $CI->load->library('image_lib'); // load library 
                if( $imgwidth < $THUMB_WIDTH)
                  {
                      $config['source_image'] = $path.$newimg;
                      $config['maintain_ratio'] = FALSE;
                      $config['master_dim'] = 'width';
                      $config['width'] = $THUMB_WIDTH;
                      $CI->image_lib->clear();
                      $CI->image_lib->initialize($config);  
                      if(!$CI->image_lib->resize()){
                      echo $CI->image_lib->display_errors();}   
                  }
                if($imgwidth > $THUMB_WIDTH)
                 {
                     $config['source_image'] = $path.$newimg;
                     $config['maintain_ratio'] = FALSE;
                     $config['width'] = $THUMB_WIDTH;
                     
                     $CI->image_lib->clear();
                     $CI->image_lib->initialize($config);
                     $CI->image_lib->crop();
                 }
                $fullpath=$path.$newimg;
                return $fullpath;   
        }else {
        if($imgwidth > $THUMB_WIDTH && $imgheight > $THUMB_HEIGHT)
        {                   
           if($imgwidth > $imgheight)
           { 
                $config['image_library'] = 'gd2';
                $CI->load->library('image_lib');
                $config['source_image']	= $path.$newimg;
                $config['maintain_ratio'] = TRUE;
                $config['master_dim'] = 'height';
                $config['width'] = $THUMB_WIDTH;
                $config['height'] = $THUMB_HEIGHT;
                $CI->image_lib->clear();
                $CI->image_lib->initialize($config); 
                if(!$CI->image_lib->resize()){
                    echo $CI->image_lib->display_errors();}

           }
          elseif($imgheight > $imgwidth)
           {
                $config['image_library'] = 'gd2';
                $CI->load->library('image_lib');
                $config['source_image']	= $path.$newimg;
                $config['maintain_ratio'] = TRUE;
                $config['master_dim'] = 'width';
                $config['width'] = $THUMB_WIDTH;
                $config['height'] = $THUMB_HEIGHT;
                $CI->image_lib->clear();
                $CI->image_lib->initialize($config); 
                if(!$CI->image_lib->resize()){
                    echo $CI->image_lib->display_errors();}

           }else
           {
                $config['image_library'] = 'gd2';
                $CI->load->library('image_lib'); // load library 
                $config['source_image']	= $path.$newimg;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = $THUMB_WIDTH;
                $config['height'] = $THUMB_HEIGHT;
                $CI->image_lib->clear();
                $CI->image_lib->initialize($config); 
                if(!$CI->image_lib->resize()){
                    echo $CI->image_lib->display_errors();}   
           }
        }
//                  get image to check dimension after resizing
        $imagename = $path.$newimg;
        $size2 = getimagesize($imagename);
        $imgwidth2=$size2[0];
        $imgheight2=$size2[1];  
        $CI->load->library('image_lib'); // load library 
      if( $imgwidth2 < $THUMB_WIDTH)
        {
            $config['source_image'] = $path.$newimg;
            $config['maintain_ratio'] = TRUE;
            $config['master_dim'] = 'width';
            $config['width'] = $THUMB_WIDTH;
            $config['height'] = $imgheight2;
            $CI->image_lib->clear();
            $CI->image_lib->initialize($config);  
            if(!$CI->image_lib->resize()){
            echo $CI->image_lib->display_errors();}   
        }
        if( $imgheight2 < $THUMB_HEIGHT)
        {
            $config['source_image'] = $path.$newimg;
            $config['maintain_ratio'] = TRUE;
            $config['master_dim'] = 'height';
            $config['width'] = $imgwidth2;
            $config['height'] = $THUMB_HEIGHT;
            $CI->image_lib->clear();
            $CI->image_lib->initialize($config);  
            $CI->image_lib->resize();   
        }
//                  get image to check dimension
        $imagename = $path.$newimg;
        $size3 = getimagesize($imagename);
        $imgwidth3=$size3[0];
        $imgheight3=$size3[1];

       if($imgwidth3 > $THUMB_WIDTH)
        {
            $config['source_image'] = $path.$newimg;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = $THUMB_WIDTH;
            $config['height'] = $THUMB_HEIGHT;
            $config['x_axis'] = (($imgwidth3 / 2) - ($THUMB_WIDTH / 2));

            $CI->image_lib->clear();
            $CI->image_lib->initialize($config);
            $CI->image_lib->crop();
        }
        elseif( $imgheight3 > $THUMB_HEIGHT)
        {
            $config['source_image'] = $path.$newimg;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = $THUMB_WIDTH;
            $config['height'] = $THUMB_HEIGHT;
            $config['y_axis'] = (($imgheight3 / 2) - ($THUMB_HEIGHT / 2));

            $CI->image_lib->clear();
            $CI->image_lib->initialize($config);
            if(!$CI->image_lib->crop())
            {
                echo $CI->image_lib->display_errors();
            }   
        }
         $fullpath=$path.$newimg;
        return $fullpath;      
    }
   } 
}