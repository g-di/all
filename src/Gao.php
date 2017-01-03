<?php
/**
 * Created by PhpStorm.
 * User: dev001
 * Date: 16-12-29
 * Time: 下午5:49
 */
namespace Gao\Gao;

use Gao\Gao\SuoImage;
use Gao\Gao\TextWater;
use Gao\Gao\ImgWater;

class Gao
{
    
    public static function SuoImage($source_path, $name, $target_width = 115, $target_height = 115)
    {
        SuoImage::SuoImage($source_path, $name, $target_width, $target_height);
    }

    public static function TextWater($source_path, $text = '', $name, $fontSize = 14, $circleSize = 0, $left = 0, $top = 0, $width = 200, $font = '', $r = 255, $g = 255, $b = 255)
    {
        if ($font == '')
            $font = dirname(__FILE__) . '/fzyy.ttf'; //字体
        TextWater::textwater(
            $source_path, $text, $name, $fontSize, $circleSize, $left, $top, $width, $font, $r, $g, $b
        );
    }

    public static function ImgWater($path, $pathb, $left, $top, $name, $filter = 100)
    {
        ImgWater::ImgWater($path, $pathb, $left, $top, $name, $filter);
    }
}