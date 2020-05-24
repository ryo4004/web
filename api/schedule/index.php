<?php

// データ保存場所
$dir['data'] = DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR;

// データ取得
$list = file(dirname(__FILE__).$dir['data'].'schedule.inc',FILE_IGNORE_NEW_LINES);

//コンテンツ処理(schedule)
$weekjp = ['日', '月', '火', '水', '木', '金', '土'];
$weeken = ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'];
$contents['next'] = '直近の練習予定はありません。';
$contents['article'] = '';
$timestamp['present'] = date('Y/m/d H:i');
$timestamp['today'] = date('Y/m/d');

$nextflag = FALSE;

unset($json);

$timedata['date'] = date('Y-m-d');
$timedata['time'] = date('H:i');

$timedata['year'] = date('Y');
$timedata['month'] = date('m');
$timedata['day'] = date('d');
$timedata['hour'] = date('H');
$timedata['minute'] = date('i');

$json['timestamp'] = $timedata;
$json['today'] = false;

for($i=0;$i<count($list);$i++) {
  $timestamp['end'] = date('Y/m/d H:i',strtotime(explode('<>',$list[$i]) [0].' '. explode('-', explode('<>',$list[$i])[1] ) [1] ));
  $date = explode('<>',$list[$i])[0];
  $start = explode('-',explode('<>',$list[$i])[1])[0];
  $end = explode('-',explode('<>',$list[$i])[1])[1];
  $place = explode('<>',$list[$i])[2];
  $studio = explode('<>',$list[$i])[3];
  // $studio = preg_replace('/第(.*)スタジオ/','第<span>$1</span>スタジオ',$studio);
  $memo = explode('<>',$list[$i])[4];
  if($timestamp['end'] >= $timestamp['present'] && $nextflag == FALSE) {
    if(strtotime($timestamp['today']) === strtotime($date)){
      $json['today'] = true;
    }
    $data['date'] = $date;
    $data['weekjp'] = $weekjp[date('w',strtotime($date))];
    $data['weeken'] = $weeken[date('w',strtotime($date))];
    $data['place'] = $place;
    $time['start'] = $start;
    $time['end'] = $end;
    $data['time'] = $time;
    $data['studio'] = $studio;
    $data['memo'] = $memo != '' ? $memo : false;

    $json['next'] = $data;

    $nextflag = explode('-',$date)[1];
  }
  if($nextflag) {
    if(explode('-',$date)[1] > $nextflag || ($nextflag == '12' && explode('-',$date)[1] < $nextflag)) {
      $nextflag = preg_replace('/0([1-9])/','$1',explode('-',$date)[1]);
    }

    $data['date'] = $date;
    $data['weekjp'] = $weekjp[date('w',strtotime($date))];
    $data['weeken'] = $weeken[date('w',strtotime($date))];
    $data['place'] = $place;
    $time['start'] = $start;
    $time['end'] = $end;
    $data['time'] = $time;
    $data['studio'] = $studio;
    $data['memo'] = $memo != '' ? $memo : false;

    $month = explode('-',$date)[0].'-'.explode('-',$date)[1];

    $json['list'][] = $data;
    $json['schedule'][$month][] = $data;
  }
}

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Content-Type: application/json; charset=utf-8");

header('accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8');

if(isset($json)){
  echo json_encode($json);
}else{
  echo '[]';
}

exit();
