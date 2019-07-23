<?php

if (!(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') && (!empty($_SERVER['SCRIPT_FILENAME']) && basename($_SERVER['SCRIPT_FILENAME']) === 'index.php')){
  exit();
}
$referer = htmlspecialchars($_SERVER['HTTP_REFERER'], ENT_QUOTES, 'UTF-8');
if (!(isset($referer))) {
  exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])) {
  $id = $_POST['id'];

  $filename = 'audio';
  if(strpos($id, 'video') !== false){
    $filename = 'video';
  }

  //初期値
  $count = 1;
  $filepath = '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'playcount_'.$filename.'.inc';

  //データ読み込み
  $line = file($filepath,FILE_IGNORE_NEW_LINES);

  //既に記録があれば+1する
  $flag = TRUE;
  for($i=0;$i<count($line);$i++){
    if(explode('<>',$line[$i])[0] == $id){
      $count = (int)explode('<>',$line[$i])[1] + 1;
      $line[$i] = $id.'<>'.$count;
      $flag = FALSE;
    }
  }

  //記録がなければ追記する
  if($flag) {
    $line[count($line)] = $id.'<>'.$count;
  }

	file_put_contents($filepath,implode("\n",$line),LOCK_EX);

  echo $count;
}else{
  echo '';
}
