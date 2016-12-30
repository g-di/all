<?php
/**
 * Created by PhpStorm.
 * User: dev001
 * Date: 16-12-29
 * Time: 下午5:49
 */
namespace Gao\Gao;
use Gao\Gao\SuoImage;

class Gao{

    public static function Gao(){
        echo 'Hello World';
    }

    public static function SuoImage($source_path, $name , $target_width=115, $target_height=115)
    {
        SuoImage::SuoImage($source_path, $name , $target_width, $target_height);
    }

}