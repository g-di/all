<?php
/**
 * Created by PhpStorm.
 * User: dev001
 * Date: 17-1-3
 * Time: 上午10:41
 */
namespace Gao\Gao;

class ImgWater
{

    public static function ImgWater($patha, $pathb, $left, $top, $name ,$filter)
    {
        $source_info = getimagesize($pathb);
        $source_mime = $source_info['mime'];
        $newpath = imagecreatefromstring(file_get_contents($patha));
        $qCodeImg = imagecreatefromstring(file_get_contents($pathb));
        //
        list($qCodeWidth, $qCodeHight, $qCodeType) = getimagesize($pathb);
        // imagecopymerge使用注解
        imagecopymerge($newpath, $qCodeImg, $left, $top, 0, 0, $qCodeWidth, $qCodeHight, $filter);
        switch ($source_mime) {
            case 'image/gif':
                imagegif($newpath, $name);
                break;

            case 'image/jpeg':
                imagejpeg($newpath, $name);
                break;

            case 'image/png':
                imagepng($newpath, $name);
                break;

            default:
                return false;
                break;
        }
        imagedestroy($newpath);
        imagedestroy($qCodeImg);
    }

}