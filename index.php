<?php
// $imgurl=$_GET['imgurl'];
// $url=$_GET['url'];
// $title=$_GET['title'];
header('Content-Type: image/png');
putenv('GDFONTPATH=' . realpath('.'));
$img=imagecreatefromjpeg('http://pic1.chcoin.com/X/M02/01/1D/OlOH511JY5uITib0AAJZd2aHwzsAADpxQN88ZUAAlmP46.jpeg');
$bg = imagecreatefrompng('bg.png');
imagecopy($img,$bg,0,440,0,0,500,60);
imagepng($img,"hearder_imgs/hearder986141.png");
$img1=imagecreatefrompng('http://qr.liantu.com/api.php?url=https://wx.chcoin.com/pai/show-986141.html&logo=https://www.chcoin.com/static/images/icon-img/tuij.png');
imagepng($img1,"qrimgs/qrcode986141.png");
$images = imagecreatetruecolor(300,450);
$bk = imagecolorallocate($images, 255, 255, 255);
$font = "simhei.ttf";
imagefill($images, 0, 0, $bk);
imagecopyresampled($images,$img,0,0,0,0,300,300,500,500);
imagecopyresampled($images,$img1,200,340,0,0,90,90,300,300);
$black = imagecolorallocate($images, 0, 0, 0);
$gray = imagecolorallocate($images, 171, 171, 171);
$red =imagecolorallocate($images, 220, 0, 0);
$string = "商品标题撒大声地时代大厦水电费第三方";
$price = "￥88.88";
$len = mb_strlen($string);
if ($len>17) {
	$string1 = mb_substr($string,0,17);
	$string2 = mb_substr($string,17);
	imagefttext($images, 13, 0, 5, 330, $black, $font, $string1);
	imagefttext($images, 13, 0, 5, 350, $black, $font, $string2);
imagefttext($images, 13, 0, 5, 370, $red, $font, $price);
}else{
	imagefttext($images, 13, 0, 5, 330, $black, $font, $string);
imagefttext($images, 13, 0, 5, 350, $red, $font, $price);
}

$info = "长按识别二维码";
imagefttext($images, 10, 0, 200, 440, $gray, $font, $info);
imagepng($images);exit;
?>

<html lang="en"><head>
  <meta charset="UTF-8">
  <title>aaa</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
   <script src="jquery.min.js"></script>
     <script src="qrcode.min.js"></script>
 <style type="text/css">
 body{margin: 0;padding: 0}
.infobox{display:none;position:absolute;top: 50px;border: 1px solid #e4e1e1;}
#scream{display: none}
#myCanvas{display: none;width: 300px;height: 450px;}
.close{text-align: right;
    display: block;
    top: -20px;
    position: absolute;
    font-size: 12px;
    width: 100%;}
</style>
</head>
<body >
<button id="share">分享</button>
<div class="infobox">
<span class="close">关闭</span>
   <canvas id="myCanvas"  width="600" height="900"></canvas>
<img id="share_img" style="width:300px;height:450px;" src="">
</div>
<img id="scream" src="hearder_imgs/hearder986141.jpeg" alt="The Scream" width="250" height="250">
<img id="qrcode" style="display:none" src="qrimgs/qrcode986141.png"  width="180" height="180">
<img id="logo" style="display:none" src="logos.jpg">
<script>

var c=document.getElementById("myCanvas");
var ctx=c.getContext("2d");
var img=document.getElementById("scream");
var img1=document.getElementById("qrcode");
var img2 = document.getElementById("logo");
var title = "商品标题";
var price = "¥88.88";

$("#share").click(function(){
	ctx.fillStyle="#fff";
	ctx.fillRect(0,0,600,900);
	ctx.drawImage(img,0,0,600,600);
	ctx.fillStyle="#000";
	ctx.font="32px Microsoft YaHei";
ctx.fillText(title,5,640,590);
ctx.fillStyle="#FF0000";
ctx.font="bold";
ctx.fillText(price,5,690);
ctx.drawImage(img1,410,680,180,180);
ctx.drawImage(img2,30,790,215,87);
ctx.font="22px Microsoft YaHei";
ctx.fillStyle="#a3a2a2";
ctx.fillText("长按识别二维码",420,880);
$('#share_img').attr('src',c.toDataURL("image/png"));
	var width = $(window).width();
	var box = $('.infobox');
    box.css("left",width/2-150);
    box.show();
});
$(".close").click(function(){
	var box = $('.infobox');
    box.hide();
});
</script>
  



</body></html>
