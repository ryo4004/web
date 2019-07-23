<?php

  //セッション関数を使用する
  require_once(dirname(__FILE__)."/../../inc/session.inc");

	//実行中のスクリプト名取得
	$selfname = basename($_SERVER['SCRIPT_NAME']);

	//データディレクトリパス
	$dir['data'] = DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR;

	// 初期化
	unset($contents);
