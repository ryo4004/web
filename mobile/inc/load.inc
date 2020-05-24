<?php

	//ページコンテンツ格納用変数初期化
	$contents['article'] = "";
	$notice = "";

	//専用データパス設定
	$dir['data'] = DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR;

	//画像ファイルパス設定
	$dir['img'] = '../';

	//データ読み込み
	$data = file($file['path'],FILE_IGNORE_NEW_LINES);

	//ページタイトル
	$contents['title'] = $data[$inc['title']];
	//CSS読み込み
	$contents['css'] = explode('<>',$data[$inc['css']]);
	//メニュー生成
	$contents['menu'] = menu_mobile($data[$inc['menu']]);
	//ヘッダーリンク
	$contents['protocol'] = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
	$contents['index'] = $contents['protocol'].'m.winds-n.com';
	//ヘッダー画像
	$contents['header_img'] = $data[$inc['header_img']] ? '<div class="top-img"><img src="'.$data[$inc['header_img']].'" id="top-img"></div>' : "";
	//ヘッダータイトル
	$tmp['header_title'] = explode('<>',$data[$inc['header_title']]);
	//パンくずリスト
	$contents['bread'] = '';
	//ログアウト用リンク
	$contents['logout'] = '';
	//コンテンツ処理
	$contents['header_title'] = $tmp['header_title'][0] == "" && $tmp['header_title'][1] == "" ? "" : ''.$tmp['header_title'][0].'<br>'.$tmp['header_title'][1].'';
