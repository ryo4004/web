<?php

	date_default_timezone_set('Asia/Tokyo');

	//実行中のスクリプト名取得
	$selfname = basename($_SERVER['SCRIPT_NAME']);

	//データディレクトリパス
	$dir['data'] = DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR;
