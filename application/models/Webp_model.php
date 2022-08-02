<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webp_model extends CI_Model
{
// ---------------------------------------
// ---------------------------------------
public function convert_to_webp_fm($imagePath,$compression_quality,$newImagePath){
    $file_type = exif_imagetype($imagePath);
    $filesize = round(filesize($imagePath) / 1024); // in KB 107 KB
    
    switch ($file_type) {
        case '1': //IMAGETYPE_GIF
            $image = imagecreatefromgif($imagePath);
            $data['info'] = 'gif->webp';
            break;
        case '2': //IMAGETYPE_JPEG
            $image = imagecreatefromjpeg($imagePath);
            $data['info'] = 'jpeg->webp';
            break;
        case '3': //IMAGETYPE_PNG
                $image = imagecreatefrompng($imagePath);
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
                $data['info'] = 'png->webp';
                break;
        case '6': // IMAGETYPE_BMP
            $image = imagecreatefrombmp($imagePath);
            $data['info'] = 'bmp->webp';
            break;
        case '18': //IMAGETYPE_Webp
            $image = imagecreatefromwebp($imagePath);
            $data['info'] = 'webp';
        //    return false;
            break;
        case '16': //IMAGETYPE_XBM
            $image = imagecreatefromxbm($imagePath);
            $data['info'] = 'xbm->webp';
            break;
        default:
        $data['info'] = 'didnt run';
            return false;
    }
    
    imagewebp($image, $newImagePath, $compression_quality);
    // return $newImagePath;
    // $data['newImagePath'] = $newImagePath;
    // return $data;
    }
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------


}