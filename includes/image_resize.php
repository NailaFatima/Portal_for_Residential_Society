<?php
function image_resize($file_up, $tmpfile, $newwidth, $newwidth1, $dest1, $dest2,$extension)
{	
    
                            if($extension=="jpg" || $extension=="jpeg" )
                            {
                                    
                                    $src = imagecreatefromjpeg($tmpfile);
                            }
                            else if($extension=="png")
                            {
                                    $src = imagecreatefrompng($tmpfile);
                            }
                            else 
                            {
                                    $src = imagecreatefromgif($tmpfile);
                            }
 
                            list($width,$height)=getimagesize($tmpfile);
                            
                            //$newheight=($height/$width)*$newwidth;
                            $newheight=1000;
                            $tmp=imagecreatetruecolor($newwidth,$newheight);


                            $newheight1=($height/$width)*$newwidth1;
                            $tmp1=imagecreatetruecolor($newwidth1,$newheight1);
                            $newheight1=100;
                            imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

                            imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

                            if(imagejpeg($tmp,$dest1,100))
                            {
                                if(imagejpeg($tmp1,$dest2,100))
                                {
                                    $er_msg=1;
                                }
                            }
                            else {
                                $er_msg="Error while uploading........";
                            }
                            

                            imagedestroy($src);
                            imagedestroy($tmp);
                            imagedestroy($tmp1);
            return($er_msg);
}// END FUNCTION image_resize
?>
