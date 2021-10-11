<?php
include "../include/koneksi.php";

if (isset($_GET["refid"]) && $_GET["refid"]!="") { 
	$referenceid = stripslashes($_GET["refid"]); 
} else { 
	$referenceid = md5(rand()); 
}

$bgurl = rand(1, 3); 
$im = ImageCreateFromPNG("../img/bg.png");
$chars = array("a","A","b","B","c","C","d","D","e","E","f","F","g", "G","h","H","i","I","j","J","k", "K","l","L","m","M","n","N","o","O","p","P","q","Q", "r","R","s","S","t","T","u","U","v", "V","w","W","x","X","y","Y","z","Z","1","2","3","4", "5","6","7","8","9"); 
$length = 5; 
$textstr = ""; 

for ($i=0; $i<$length; $i++) { 
	$textstr .= $chars[rand(0, count($chars)-1)]; 
}

$font = "../trebuc.ttf";
$size = rand(50, 100); 
$angle = rand(-2, 5); 
$color = ImageColorAllocate($im, rand(0, 100), rand(0, 100), rand(0, 100));
$textsize = imagettfbbox($size, $angle, $font, $textstr); 
$twidth = abs($textsize[2]-$textsize[0]);
$theight = abs($textsize[5]-$textsize[3]);
$x = (imagesx($im)/2)-($twidth/2)+(rand(-20, 20)); 
$y = (imagesy($im))-($theight/2);

ImageTTFText($im, $size, $angle, $x, $y, $color, $font, $textstr);
header("Content-Type: images/png"); 
ImagePNG($im);

imagedestroy($im);
$koneksi->query("INSERT INTO security_images (insertdate, referenceid, hiddentext) VALUES ( now(), '".$referenceid."', '".$textstr."')");

$koneksi->query("DELETE FROM security_images WHERE insertdate < date_sub(now(), interval 10 minute)");
?>