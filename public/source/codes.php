<?php
session_start();
function random($len) 
{
    $srcstr = "1a2s3d4f5g6hj8k9qwertyupzxcvbnm";
    mt_srand();
    $strs = "";
    for ($i = 0; $i < $len; $i++) 
    {
        $strs.= $srcstr[mt_rand(0, 30)];
    }
    return $strs;
}

//
$str = random(4); 
$_SESSION["codes"]=$str;
//验证码图片的宽度
$width  = 100;      
 
//验证码图片的高度
$height = 20;     
 
//声明需要创建的图层的图片格式
header("Content-Type:image/png");
 
//创建一个图层
$im = imagecreatetruecolor($width,$height);
 
//背景色
$back = imagecolorallocate($im,0xFF,0xFF,0xFF);
$black= imagecolorallocate($im,0,0,0);
imagecolortransparent($img,$back);
//模糊点颜色
$pix  = imagecolorallocate($im,200,200,200);
//
imagefill($im,0,0,$back);
//字体色
$font = imagecolorallocate($im,255,0,0);
//绘模糊作用的点
mt_srand();
for ($i = 0; $i < 1000; $i++)
{
    imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $pix);
} 

//输出字符
imagestring($im, 5, 35, 3, $str, $font);
//ImageTTFText($im,8,0,0,0,$font,$str);
//输出矩形
imagerectangle($im, 0, 0,$width-1,$height-1,$back);
 
//输出图片
imagepng($im);
 
imagedestroy($im);
 
$strs = md5($str);
?>
