<?php

	//セッションの開始
	session_start();

	// User Define
	function Check($session, $ticket) {
		$thisRemote = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		if(empty($session) || empty($ticket) || empty($thisRemote)) {
			return 0;
		}
		if($_SESSION['SESSION'] != $session || $_SESSION['TICKET'] != $ticket || $_SESSION['REMOTE'] != $thisRemote) {
			return 0;
		}
		return 1;
	}
		// User Define
	function GetEscaped($s) {
		if(function_exists("mb_convert_encoding")) {
			$x = mb_convert_encoding($s, 'EUCJP-WIN', 'Windows-31J');
			$x = addslashes($x);
			$x = mb_convert_encoding($x, 'Windows-31J', 'EUCJP-WIN');
			return $x;
		}
		else return addslashes($s);
	}

	function status() {
		if($_SESSION['STATUS']){
			return TRUE;
		}
		return FALSE;
	}

	function checkgetname($get, $list) {
  	$result = TRUE;
  	foreach($list as $each){
  		if($get==$each){
  			$result = FALSE;
  		}
  	}
  	return $result;
  }

	function pregTitle($str) {
		if(strpos($str,'定期演奏会') !== false) {
			$result = preg_replace('/(定期演奏会)/','<span>$1</span>',$str);
		}elseif(strpos($str,'春のミニコンサート') !== false) {
			$result = preg_replace('/(春のミニコンサート\()(.*)(\))/','<span>$1</span>$2<span>$3</span>',$str);
		} else {
			$result = $str;
		}
		return $result;
	}

	function getCountData($path,$id,$countlist) {
		foreach($countlist as $each){
			if(explode('<>',$each)[0] == $path){
				return '<div id="count'.$id.'" class="count">'.explode('<>',$each)[1].'</div>';
			}
		}
		return '<div id="count'.$id.'" class="count"></div>';
	}

	function page($now, $all, $per) {
		$page['now'] = $now;
		$page['all'] = $all;
		$page['per'] = $per;
		$page['prev'] = $page['now'] - 1;
		$page['next'] = $page['now'] + 1;
		$page['link'] = 5;
		$page['min'] = 1;
		$page['max'] = ceil($page['all']/$page['per']);
		$link = '<div class="page">';
		$link .= $page['now'] != $page['min'] ? '<a href="'.basename($_SERVER['SCRIPT_NAME']).'?page=' . $page['prev'] .'#board"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>前へ</a>' : '<span><i class="fa fa-angle-left" aria-hidden="true"></i>前へ</span>';
		$link .= $page['now'] != $page['min'] ? '<a href="'.basename($_SERVER['SCRIPT_NAME']).'#board"><i class="fa fa-undo" aria-hidden="true"></i>最新</a>' : '<span><i class="fa fa-undo" aria-hidden="true"></i>最新</span>';
//		$link .= $page['now'] != $page['max'] && $page['max'] !=0 ? '<a href="'.basename($_SERVER['SCRIPT_NAME']).'?page=' . $page['next'] .'#board">次へ<i class="fa fa-angle-right" aria-hidden="true"></i></a>' : '<span>次へ<i class="fa fa-angle-right" aria-hidden="true"></i></span>';
		$link .= $page['now'] != $page['max'] && $page['max'] !=0 ? '<a href="'.basename($_SERVER['SCRIPT_NAME']).'?page=' . $page['next'] .'#board">次へ<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>' : '<span>次へ<i class="fa fa-angle-right" aria-hidden="true"></i></span>';
		$link .= '</div>';
		return $link;
	}

	function page_start($now, $all, $per) {
		return $now * $per - $per;
	}

	function page_end($now, $all, $per) {
		if($now*$per > $all){
			return $all;
		}
		return $now * $per;
	}

	function icon($name) {
		$filetype = mb_strtolower(mb_substr($name,-4));
		if($filetype == '.pdf'){
			$icon = '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>';
		}elseif($filetype == '.doc'){
			$icon = '<i class="fa fa-file-word-o" aria-hidden="true"></i>';
		}elseif($filetype == '.xls'){
			$icon = '<i class="fa fa-file-excel-o" aria-hidden="true"></i>';
		}elseif($filetype == '.jpg' || $filetype == 'jpeg'  || $filetype == '.png' || $filetype == '.bmp'){
			$icon = '<i class="fa fa-file-image-o" aria-hidden="true"></i>';
		}elseif($filetype == '.zip'){
			$icon = '<i class="fa fa-file-archive-o" aria-hidden="true"></i>';
		}elseif($filetype == '.txt'){
			$icon = '<i class="fa fa-file-text-o" aria-hidden="true"></i>';
		}else{
			$icon = '<i class="fa fa-file-o" aria-hidden="true"></i>';
		}
		return $icon;
	}

	function fileSizeUnit($size) {
		if($size > 999999) {
			// $result = ceil($size / 100000) / 10;
			$result = ceil($size / 1000000);
			$unit = 'MB';
		}elseif($size > 999 && $size <= 999999){
			// $result = ceil($size / 100) / 10;
			$result = ceil($size / 1000);
			$unit = 'KB';
		}else{
			$result = $size;
			$unit = 'B';
		}
		return $result.$unit;
	}

	function compare($a, $b) {
		$tmp_a = explode('<>',$a);
		$tmp_b = explode('<>',$b);
		$x = strtotime($tmp_a[0]);
		$y = strtotime($tmp_b[0]);
		if($x == $y) {
			return 0;
		}
		return ($x < $y) ? -1 : 1;
	}
