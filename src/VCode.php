<?php
namespace Gao\Gao;

class VCode
{
    private $width;
    private $height;
    private $counts;
    private $distrubcode;
    private $fonturl;
    private $session;
    private $name;

    function __construct($width = 120, $height = 50, $counts = 4, $distrubcode = "1235467890qwertyuipkjhgfdaszxcvbnm", $name = 'aa.jpg', $fonturl = "")
    {
        $this->width = $width;
        $this->height = $height;
        $this->counts = $counts;
        $this->distrubcode = $distrubcode;
        $this->name = $name;
        $this->fonturl = $fonturl == '' ? dirname(__FILE__) . '/fzyy.ttf' : $fonturl;
        $this->session = $this->sessioncode();
    }

    function imageout()
    {
        $im = $this->createimagesource();
        $this->setbackgroundcolor($im);
        $this->set_code($im);
        $this->setdistrubecode($im);
        Imagejpeg($im, $this->name);
        ImageDestroy($im);
        return $this->session;
    }

    private function createimagesource()
    {
        return imagecreate($this->width, $this->height);
    }

    private function setbackgroundcolor($im)
    {
        $bgcolor = ImageColorAllocate($im, rand(200, 255), rand(200, 255), rand(200, 255));//±³¾°ÑÕÉ«
        imagefill($im, 0, 0, $bgcolor);
    }

    private function setdistrubecode($im)
    {
        $count_h = $this->height;
        $cou = floor($count_h * 1);
        for ($i = 0; $i < $cou; $i++) {
            $x = rand(0, $this->width);
            $y = rand(0, $this->height);
            $jiaodu = rand(0, 90);
            $fontsize = rand(6, 8);
            $fonturl = $this->fonturl;
            $originalcode = $this->distrubcode;
            $countdistrub = strlen($originalcode);
            $dscode = $originalcode[rand(0, $countdistrub - 1)];
            $color = ImageColorAllocate($im, rand(40, 140), rand(40, 140), rand(40, 140));
            imagettftext($im, $fontsize, $jiaodu, $x, $y, $color, $fonturl, $dscode);

        }
    }

    private function set_code($im)
    {
        $width = $this->width;
        $height = $this->height;
        $scode = $this->session;
        $y = floor($height / 2) + floor($height / 4);
        $fontsize = rand(30, 35);
        $fonturl = $this->fonturl;


        $countdistrub = mb_strlen($scode, 'utf8');
        for ($i = 0; $i < $countdistrub; $i++)
            $array[] = mb_substr($scode, $i, 1, 'utf-8');

        $counts = $this->counts;
        for ($i = 0; $i < $counts; $i++) {
            $char = $array[$i];
            $x = floor($width / $counts) * $i + 8;
            $jiaodu = rand(-20, 30);
            $color = ImageColorAllocate($im, rand(0, 50), rand(50, 100), rand(100, 140));
            imagettftext($im, $fontsize, $jiaodu, $x, $y, $color, $fonturl, $char);
        }


    }

    private function sessioncode()
    {
        $originalcode = $this->distrubcode;
        $countdistrub = mb_strlen($originalcode, 'utf8');
        for ($i = 0; $i < $countdistrub; $i++)
            $array[] = mb_substr($originalcode, $i, 1, 'utf-8');
        $_dscode = "";
        $counts = $this->counts;
        for ($j = 0; $j < $counts; $j++) {
            $dscode = $array[rand(0, $countdistrub - 1)];
            $_dscode .= $dscode;
        }
        return $_dscode;

    }
}