<?php
session_start();


$text=$_GET['rand'];
$font=20;
$width=120;
$height=45;

$image=imagecreate($width,$height);

imagecolorallocate($image,255,255,255);

$text_color=imagecolorallocate($image,255,0,0);

for($x=1;$x<=30;$x++){

$x1=rand(1,100);
$y1=rand(1,100);
$x2=rand(1,1000);

$y2=rand(1,100);
imageline($image,$x1,$y2,$y1,$x2,$text_color);
}

imagettftext($image,$font,0,15,30,$text_color,'monofont.ttf',$text);
imagejpeg($image);

?>
