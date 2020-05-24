<?php

// データ保存場所
$dir['data'] = DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR;

// データ取得
$manager_data = file(dirname(__FILE__).$dir['data'].'manager.inc',FILE_IGNORE_NEW_LINES);

//データ順
// [0] number
// [1] title
// [2] text
// [3] time new,old,old,...
// [4] attachment title?url,title?url,...
// [5] display

unset($json);

$timedata['date'] = date('Y-m-d');
$timedata['time'] = date('H:i');

$timedata['year'] = date('Y');
$timedata['month'] = date('m');
$timedata['day'] = date('d');
$timedata['hour'] = date('H');
$timedata['minute'] = date('i');

$json['timestamp'] = $timedata;

foreach ($manager_data as $each) {
  unset($data);

  $item = explode('<>', $each);
  $data['number'] = $item[0];
  $data['title'] = $item[1];
  $data['text'] = $item[2];
  unset($time);
  for ($i=0;$i<count(explode('?', $item[3]));$i++) {
    $time[$i]['date'] = explode(' ', explode('?', $item[3])[$i])[0];
    $time[$i]['time'] = explode(' ', explode('?', $item[3])[$i])[1];
  }
  $data['time'] = $time;
  if ($item[4] !== '') {
    unset($attachment);
    for ($i=0;$i<count(explode(',',$item[4]));$i++) {
      $attachment[$i]['title'] = explode('?', explode(',', $item[4])[$i])[0];
      $attachment[$i]['filename'] = explode('?', explode(',', $item[4])[$i])[1];
      $attachment[$i]['size'] = explode('?', explode(',', $item[4])[$i])[2];
    }
    $data['attachment'] = $attachment;    
  }
  if ($item[5] === 'display') {
    $data['display'] = true;
    $json['contents'][] = $data;
  } else {
    $data['display'] = false;
  }
}

// foreach($manager_data as $each){
//   unset($item);
//   $item = explode('<>', $each);
//   $editmark = isset(explode(',',$item[3])[1]) != '' ? '<p title="編集済み"><i class="fa fa-pencil" aria-hidden="true"></i></p>' : '';
//   if($item[4] != '') {
//     $tmp = explode(',',$item[4]);
//     $attachment = '<div class="attachment">';
//     for($i=0;$i<count($tmp);$i++){
//       $attachment .= '<a href="data/'.explode('?',$tmp[$i])[1].'" class="attachment" target="_blank">'.icon(explode('?',$tmp[$i])[1]).'<span>'.explode('?',$tmp[$i])[0].'</span><span>'.fileSizeUnit(explode('?',$tmp[$i])[2]).'</span></a>';
//     }
//     $attachment .= '</div>';
//   }else{
//     $attachment = '';
//   }
//   $datetime = explode(' ',explode(',',$item[3])[0])[0] != '1970/01/01' ? explode(' ',explode(',',$item[3])[0])[0] : '';
//   if($item[5] == 'display'){
//     $article[] = '<div class="post"><div class="post-title"><span>'.$item[1].'</span><span>'.$editmark.$datetime.'</span></div><div id="post'.$item[0].'" class="post-text"><p>'.$item[2].'</p>'.$attachment.'</div></div>'."\n";
//   }
// }
// //<span>'.$item[0].'</span>
// if(isset($_GET['page'])){$page = $_GET['page'];}else{$page=1;}
// if(!empty($article)) {
//   $contents['page'] = page($page,count($article),$post_num);
//   $contents['contents'] = '';
//
//   for($i=page_start($page,count($article),$post_num);$i<page_end($page,count($article),$post_num);$i++){
//     $contents['contents'] .=	$article[$i];
//   }
// }

//
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
