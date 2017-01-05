
### Gao/Gao


# Installation
```
composer require guo/gao:dev-master
```

## 水印

```
use Gao\Gao\Water;
```
####缩放图片

```
    $name = 'a.jpg';
    
    $Gao = new Water();
    $Gao->setPath('http://p1.bqimg.com/581904/5ae74d1aebc4d4c5.jpg')->setName($name)->setWidth(500)->setHeight(500)->SuoImage();
    
    echo "<img src='$name' />";
```
####文字水印

```
    $name = 'a.jpg';
    
    $text = new Water();
    $text->setPath('http://4493bz.1985t.com/uploads/allimg/150127/4-15012G52133.jpg')
        ->setText('啊急急急急急急急急急急急急萨多喝点啊啊急急急急急急急急急急急急萨多喝点啊啊急急急急急急急急急急急急萨多喝点啊啊急急急急急急急急急急萨多喝点啊啊多喝点啊')
        ->setName($name)
        ->setFont(dirname(__FILE__) . '/fzyy.ttf')
        ->setFontSize(30)
        ->setCircle(0)
        ->setLeft(420)
        ->setTop(420)
        ->setWidth(600)
        ->setColor(0, 255, 36)
        ->TextWater();
   
    echo "<img src='$name' />";
```
####图片水印

```
    $name = 'a.jpg';
    
    $text = new Water();
    $text->setPath('a.jpg');
    $text->setPathNew('https://ss2.baidu.com/6ONYsjip0QIZ8tyhnq/it/u=2971880276,4004493839&fm=96');
    $text->setLeft(1315);
    $text->setTop(820);
    $text->setName($name);
    $text->setFilter(50);
    $text->ImgWater();
    
    echo "<img src='$name' />";
```

##验证码
####支持中文
```
use Gao\Gao\VCode;
```
```
$name = 'a.jpg';
$obj = new VCode(200, 50, 5, '01234567893265987451', $name ,$font='');//实例化对象，并设置验证码图片的宽、高和验证码的长度、验证码、文件名称、字体
echo $obj->imageout(); //输出验证码图片
echo "<img src='$name' />";
```