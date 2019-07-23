<?php
// セッションにCAPTCHAを保存するのでセッションを開始
session_start();

// フォントファイルの指定
$fontpath = "./font.otf";
// -- (入手先) http://typingart.net/?p=40
// KodomoRounded.otf

// CAPTCHAに使う文字を指定
$chars = "あいうえおかきくけこさしすせそたちつてと".
         "なにぬねのはひふへほまみむめもやゆよわをん";

// CAPTHAの認証コードを生成 --- (*1)
$ch_list = preg_split('//u', $chars, -1, PREG_SPLIT_NO_EMPTY);
shuffle($ch_list);
$ca_result = array_slice($ch_list, 0, 5);
$ca_str = implode("", $ca_result);
$_SESSION["CAPTCHA"] = $ca_str; // セッションに保存

// 画像の生成 --- (*2)
$sx = 300; $sy = 50;
$im = imagecreate($sx, $sy);
// 背景画像
//$gray_c = imagecolorallocate($im, 230, 230, 240);
$gray_c = imagecolorallocate($im, 240, 239, 235);
// 文字の色
$blue_c = imagecolorallocate($im, 186, 0, 5);//#B60005
// ダミーの文字色
$dummy_c = imagecolorallocate($im, 255, 128, 131);

// ランダムに文字を描画(ダミーの描画) --- (*3)
shuffle($ch_list);
for ($i = 0; $i < 10; $i++) {
  $fsize = mt_rand(30, 45);
  $deg = mt_rand(-20, 20);
  $fy = mt_rand(20, 50);
  $fx = mt_rand(1, $sx);
  imagettftext($im, $fsize, $deg, $fx, $fy, $dummy_c,
    $fontpath, $ch_list[$i]);
}
// ダミーの線を描画 --- (*4)
for ($i = 0; $i < 30; $i++) {
  $dx = mt_rand(0, $sx);
  $dy = mt_rand(0, $sy);
  $ex = mt_rand(0, $sx);
  $ey = mt_rand(0, $sy);
  $c = (mt_rand(0, 3) == 0) ? $blue_c : $dummy_c;
  imageline($im, $dx,$dy, $ex,$ey, $c);
}

// 認証コードの文字を一文字ずつ描画 --- (*5)
$fx = 10;
foreach ($ca_result as $ch) {
  $fsize = mt_rand(20, 30);
  $deg = mt_rand(-40, 40);
  $fy = 40;
  imagettftext($im, $fsize, $deg, $fx, $fy, $blue_c,
    $fontpath, $ch);
  $fx += ($fsize + mt_rand(20,40));
}

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
