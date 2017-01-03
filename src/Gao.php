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
    static private $path;
    static private $name;
    static private $width = 200;
    static private $height = 200;
    static private $text;
    static private $font;
    static private $size = 20;
    static private $circle = 0;
    static private $left;
    static private $top;
    static private $r;
    static private $g;
    static private $b;
    static private $pathnew;
    static private $filter = 100;

    public static function setName($name)
    {
        self::$name = $name;
        return new self;
    }

    public static function setPath($path)
    {
        self::$path = $path;
        return new self;
    }

    public static function setWidth($width)
    {
        self::$width = $width;
        return new self;
    }

    public static function setHeight($height)
    {
        self::$height = $height;
        return new self;
    }

    public static function setText($text)
    {
        self::$text = $text;
        return new self;
    }

    public static function setFont($font)
    {
        self::$font = $font;
        return new self;
    }

    public static function setFontSize($size)
    {
        self::$size = $size;
        return new self;
    }

    public static function setCircle($circle)
    {
        self::$circle = $circle;
        return new self;
    }

    public static function setLeft($left)
    {
        self::$left = $left;
        return new self;
    }

    public static function setTop($top)
    {
        self::$top = $top;
        return new self;
    }

    public static function setColor($r, $g, $b)
    {
        self::$r = $r;
        self::$g = $g;
        self::$b = $b;
        return new self;
    }

    public static function setPathNew($pathnew)
    {
        self::$pathnew = $pathnew;
        return new self;
    }

    public static function setFilter($filter)
    {
        self::$filter = $filter;
        return new self;
    }


    public static function SuoImage()
    {
        SuoImage::SuoImage(self::$path, self::$name, self::$width, self::$height);
    }

    public static function TextWater()
    {
        if (self::$font == '')
            self::$font = dirname(__FILE__) . '/fzyy.ttf'; //字体
        TextWater::textwater(
            self::$path,
            self::$text,
            self::$name,
            self::$size,
            self::$circle,
            self::$left,
            self::$top,
            self::$width,
            self::$font,
            self::$r,
            self::$g,
            self::$b
        );
    }

    public static function ImgWater()
    {
        ImgWater::ImgWater(
            self::$path, self::$pathnew, self::$left, self::$top, self::$name, self::$filter);
    }
}