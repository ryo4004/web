<?php

/*** base start ***/

	require(dirname(__FILE__)."/function.inc");

	date_default_timezone_set('Asia/Tokyo');

	define('PAGE_NAME', "ザ・ウィンド・アンサンブル");

	//テーマカラー
	define('COLOR_THEME','#B60005');

	define('COLOR_BACKGROUND','#FFFFFF');

	//初期値
	define('COLOR_BLACK', getRGBdec('#000'));
	define('COLOR_WHITE', getRGBdec('#fff'));
	define('COLOR_GRAY', getRGBdec('#808080'));
	define('COLOR_LIGHTGRAY', getRGBdec('#D3D3D3'));

	//初期設定
	//実行中のスクリプト名取得
	$selfname = basename($_SERVER['SCRIPT_NAME']);
	$file['filename'] = explode('.',$selfname);
	//データファイル置き場('-amp'の場合は削除)
	$file['data'] = str_replace('-amp','',$file['filename'][0]).'.inc';
	//データファイルパス
	$file['path'] = 'data'.DIRECTORY_SEPARATOR.$file['data'];

////////////////////////////////////////////////////////////

	//データファイル読み込み時ステータス設定

	//タイトル情報
	$inc['title'] = 0;
	//metaタグ記述
	$inc['meta'] = 1;
	//CSSファイル指定
	$inc['css'] = 2;
	//メニュー設定
	$inc['menu'] = 3;
	//パンくずリスト設定
	$inc['bread'] = 4;
	//ヘッダータイトル
	$inc['header_title'] = 5;
	//ヘッダー画像
	$inc['header_img'] = 6;
	//本文開始位置
	$inc['start'] = 7;

////////////////////////////////////////////////////////////

	//色初期設定

	//初期値設定
	$color['background'] = getRGBA('#fff', '1');
	$color['theme'] = getRGBA(COLOR_THEME, '1');
	$color['theme_light'] = getRGBA(COLOR_THEME, '0.5');
	$color['theme_verylight'] = getRGBA(COLOR_THEME, '0.1');

	//メニューボタン色
	$color['menu_button'] = getRGBA(COLOR_THEME,'1');
	//メニュー背景色
	$color['menu_background'] = getRGBA('#222','1');
	//メニューボタン背景色(透明)
	$color['menu_button_background'] = getRGBA('#fff','0');
	//メニュータイトル背景色
	$color['menu_title_background'] = getRGBA(COLOR_THEME,'1');
	//メニュータイトル文字色
	$color['menu_title_text'] = getRGBA('#ccc','1');
	//メニュー文字色
	$color['menu_text'] = getRGBA('#ccc','1');
	//メニュー文字色(hover)
	$color['menu_text_hover'] = getRGBA('#ccc','1');
	//メニュー背景色(hover)
	$color['menu_background_hover'] = getRGBA('#333','1');

	//ロゴ色
	$color['logo'] = getRGBA(COLOR_THEME, '1');
	//ロゴ背景色(レスポンシブ)
	$color['logo_background'] = getRGBA('#fff', '0.9');
	//ロゴ背景色(レスポンシブ)
	$color['logo_background_mobile'] = getRGBA('#fff', '0.9');
	//タイトル文字色
	$color['header_title'] = getRGBA('#666','1');
	//タイトル線色
	$color['header_title_border'] = getRGBA(COLOR_THEME, '1');

	//タイトル見出し色
	$color['h2_head'] = getRGBA(COLOR_THEME,"1");
	//本文文字色
	$color['text'] = getRGBA('#777','1');

	//フォーム色
	$color['form_border'] = getRGBA('#ccc','1');

	//処理結果表示
	$color['notice'] = getRGBA(COLOR_THEME, '1');
	//処理結果表示背景色
	$color['notice_background'] = getRGBA('#eee', '1');

	//掲示板投稿背景色
	$color['bbs_background'] = getRGBA('#f3f3f3',1);
	//掲示板投稿背景色(hover)
	$color['bbs_background_hover'] = getRGBA('#f5f5f5',1);

	//フッター上部境界線色
	$color['footer'] = getRGBA('#eee','1');

	//選択色
	$color['selection'] = $color['theme'];

/*** base end ***/

	require(dirname(__FILE__)."/../../html/inc/init.inc");
	//init.incにて読み込む
	//require(dirname(__FILE__)."/../../inc/function.inc");

	//初期設定
	//実行中のスクリプト名取得
	$selfname = basename($_SERVER['SCRIPT_NAME']);
	$file['filename'] = explode('.',$selfname);
	//データファイル置き場
	$file['data'] = $file['filename'][0].'.inc';
	//データファイルパス
	$file['path'] = 'data'.DIRECTORY_SEPARATOR.$file['data'];
