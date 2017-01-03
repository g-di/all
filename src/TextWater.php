<?php
/**
 * 文字水印
 * 高迪
 * gd521012@qq.com
 */
namespace Gao\Gao;

class TextWater
{
    /**
     * @param $source_path   资源链接
     * @param $text     插入的文字
     * @param $name     保存的名称
     * @param $fontSize     字体大小
     * @param $circleSize   字体倾斜角度
     * @param $left     左边距
     * @param $top  上边距
     * @param $width    文字宽度
     * @param $font     字体
     * @param $r    颜色值
     * @param $g    颜色值
     * @param $b    颜色值
     * @return bool
     */
    public static function textwater($source_path, $text, $name, $fontSize, $circleSize, $left, $top, $width, $font, $r, $g, $b)
    {
        $source_info = getimagesize($source_path);
        $source_mime = $source_info['mime'];

        $newpath = imagecreatefromstring(file_get_contents($source_path));

        $black = imagecolorallocate($newpath, $r, $g, $b); //字体颜色 RGB

        $text = self::autowrap($fontSize, $circleSize, $font, self::filterEmoji($text), $width);
        imagefttext($newpath, $fontSize, $circleSize, $left, $top, $black, $font, $text);

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
    }

    //文字自动换行
    public static function autowrap($fontsize, $angle, $fontface, $string, $width)
    {
// 这几个变量分别是 字体大小, 角度, 字体名称, 字符串, 预设宽度
        $content = "";
        // 将字符串拆分成一个个单字 保存到数组 letter 中
        for ($i = 0; $i < mb_strlen($string); $i++) {
            $letter[] = mb_substr($string, $i, 1);
        }
        foreach ($letter as $l) {
            $teststr = $content . " " . $l;
            $testbox = imagettfbbox($fontsize, $angle, $fontface, $teststr);
            // 判断拼接后的字符串是否超过预设的宽度
            if (($testbox[2] > $width) && ($content !== "")) {
                $content .= "\n";
            }
            $content .= $l;
        }
        return $content;
    }

    //过滤emoji表情
    public static function filterEmoji($str)
    {
        $str = preg_replace_callback(
            '/./u', function (array $match) {
            return strlen($match[0]) >= 4 ? '' : $match[0];
        }, $str);
        return $str;
    }
}