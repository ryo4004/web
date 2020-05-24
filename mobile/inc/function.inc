<?php

function br($str) {
	echo $str."<br>";
}

function dump($array) {
	echo "<pre>";
	var_dump($array);
	echo "</pre>";
	return FALSE;
}

function getRGBdec($str) {
	$s = trim($str,'#');
	if(strlen($s) > 3){
		$r = substr($s,0,2);
		$g = substr($s,2,2);
		$b = substr($s,4,2);
		return hexdec($r).','.hexdec($g).','.hexdec($b);
	}else{
		$r = substr($s,0,1);
		$g = substr($s,1,1);
		$b = substr($s,2,1);
		return hexdec($r.$r).','.hexdec($g.$g).','.hexdec($b.$b);
	}
}

function makeRGBA($str,$opacity) {
	return 'rgba('.$str.','.$opacity.')';
}

function getRGBA($str,$opacity) {
	return 'rgba('.getRGBdec($str).','.$opacity.')';

}

function css($css) {
	$data = "";
	$files = explode('<>',$css);

	foreach($files as $each) {
		$data .= '<style>';
		$file = file($each);
		foreach($file as $line) {
			$data .= $line;
		}
		$data .= '</style>';

	}
	return 0;
}

function menu($setting){
	$menu = '<ul><li class="menu-title">MENU</li>';
	$data = readmenu($setting);
	foreach($data as $each){
		$menu .= '<li><a href="'.$each[0].'">'.$each[1]."</a></li>\n";
	}
	return $menu."</ul>";
}

function menu_mobile($setting){
	$menu = '<ul style="list-style-type: none">';
	$data = readmenu($setting);
	foreach($data as $each){
		$menu .= '<li><a href="'.$each[0].'">'.$each[1]."</a></li>\n";
	}
	return $menu."</ul>";
}

function readmenu($setting) {
	unset($menu);
	if($setting){
		$data = file("./inc/menu_list_member.inc",FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
	}else{
		$data = file("./inc/menu_list.inc",FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
	}
	foreach($data as $each){
		$menu[] = explode("<>", $each);
	}
	return $menu;
}

function show($text) {
	if(isset($text)){
		echo $text;
	}
	return TRUE;
}

function breadlist($data) {
	//$data = ページ名,URL<>ページ名,URL<>ページ名,URL
	$list = explode('<>',$data);
	$link = '<div id="bread-list">';
	foreach($list as $each) {
		$tmp = explode(',',$each);
		if(!isset($tmp[1])) {
			$link .= $tmp[0];
		}else{
			$link .= '<a href="'.$tmp[1].'">'.$tmp[0].'</a>';
		}
		if($list[count($list)-1] != $each) {
			$link .= '&nbsp;&gt;&nbsp;';
		}
	}
	$link .= '</div>';
	return $link;
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
	$link .= $page['now'] != $page['min'] ? '<a href="'.basename($_SERVER['SCRIPT_NAME']).'?page=' . $page['prev'] .'">&lt;&nbsp;前へ</a>' : '&lt;&nbsp;前へ';
	$link .= $page['now'] != $page['min'] ? '&nbsp;|&nbsp;<a href="'.basename($_SERVER['SCRIPT_NAME']).'">トップ</a>&nbsp;|&nbsp;' : '&nbsp;|&nbsp;トップ&nbsp;|&nbsp;';
	$link .= $page['now'] != $page['max'] && $page['max'] !=0 ? '<a href="'.basename($_SERVER['SCRIPT_NAME']).'?page=' . $page['next'] .'">次へ&nbsp;&gt;</a>' : '次へ&nbsp;&gt;';
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

function checkgetname($get, $list) {
	$result = TRUE;
	foreach($list as $each){
		if($get==$each){
			$result = FALSE;
		}
	}
	return $result;
}
