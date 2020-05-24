<?php

  require('../../../secrets/bbs.php');

  // 初期設定
  // if(isset($_COOKIE['BBS'])){
  //   $message['title'] = '団員専用掲示板';
  //   if($_COOKIE['BBS'] == 'WRITE'){
  //     $message['text'] = '新しい投稿を書き込みました。';
  //   }elseif($_COOKIE['BBS'] == 'MOD'){
  //     $message['text'] = '投稿を編集しました。';
  //   }elseif($_COOKIE['BBS'] == 'MODFAIL'){
  //     $message['text'] = '編集失敗しました。<br>編集パスを確認してください。';
  //   }elseif($_COOKIE['BBS'] == 'DEL'){
  //     $message['text'] = '投稿を削除しました。';
  //   }elseif($_COOKIE['BBS'] == 'DELFAIL'){
  //     $message['text'] = '削除できません。<br>編集パスを確認してください。';
  //   }
  //   setcookie('BBS', '', time(), '/', '192.168.1.2', false, true);
  // }else{
  //   $message['title'] = '';
  //   $message['text'] = '';
  // }

  if ($_POST['api'] === $BBS_APIPASS) {

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header("Content-Type: application/json; charset=utf-8");

    header('accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8');

    unset($json);

    // データ保存場所
    $dir['data'] = DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR;

    //コンテンツ処理(bbs)
    $datapath = dirname(__FILE__).$dir['data'].'bbs_data_member.inc';
    // データ取得
    $bbs_data = file($datapath,FILE_IGNORE_NEW_LINES);

    //1ページあたりの表示数
    // $post_num = 10;

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['write'])) {
      //書き込み処理
      $postdata['name'] = $_POST['name'];
      $postdata['text'] = $_POST['text'];
      $postdata['delpass'] = $_POST['delpass'];
      if($postdata['name'] && $postdata['text']) {
        //投稿No.を取得
        $tmp = explode('<>',$bbs_data[0]);
        $postdata['no'] = (int)$tmp[0] + 1;
        $postdata['name'] = htmlspecialchars($postdata['name']);
        $postdata['text'] = htmlspecialchars($postdata['text']);
        $postdata['text'] = str_replace("\r\n", "<br>", $postdata['text']);
        $postdata['text'] = str_replace("\n", "<br>", $postdata['text']);
        $postdata['text'] = str_replace("\r", "<br>", $postdata['text']);
        $postdata['text'] = str_replace("\t", "　　　　", $postdata['text']);
        $postdata['delpass'] = htmlspecialchars($postdata['delpass']);
        $postdata['time'] = date('Y/m/d H:i');
        $postdata['post'] = $postdata['no'].'<>'.$postdata['delpass'].'<>'.$postdata['name'].'<>'.$postdata['text'].'<>'.$postdata['time'];
        array_unshift($bbs_data, $postdata['post']);
        file_put_contents($datapath,implode("\n",$bbs_data),LOCK_EX);
        // setcookie('BBS', 'WRITE', time()+60, '/', '192.168.1.2', false, true);
        // header("Location: " . $selfname);
        $json['status'] = 'true';
        if (isset($json)) {
          echo json_encode($json);
        }
        exit();
      }
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit'])) {
      if(isset($_POST['delconfirm'])){
        //削除処理
        $postdata['delpost'] = (int)$_POST['no'];
        $postdata['editpass'] = $_POST['editpass'];
        $delflag = false;
        for($i=0;$i<count($bbs_data);$i++) {
          $tmp = explode('<>',$bbs_data[$i]);
          if($tmp[0] == $postdata['delpost'] && $tmp[1] == $postdata['editpass'] && $tmp[1] != '') {
            array_splice($bbs_data, $i, 1);
            $delflag = true;
          }
        }
        file_put_contents($datapath,implode("\n",$bbs_data),LOCK_EX);
        if($delflag){
          // setcookie('BBS', 'DEL', time()+60, '/', '192.168.1.2', false, true);
        }else{
          // setcookie('BBS', 'DELFAIL', time()+60, '/', '192.168.1.2', false, true);
        }
        // header("Location: " . $selfname);
        exit();
      }else{
        //編集処理
        $postdata['no'] = (int)$_POST['no'];
        $postdata['editpass'] = $_POST['editpass'];
        $postdata['modtext'] = $_POST['modtext'];
        $postdata['modtext'] = htmlspecialchars($postdata['modtext']);
        $postdata['modtext'] = str_replace("\r\n", "<br>", $postdata['modtext']);
        $postdata['modtext'] = str_replace("\n", "<br>", $postdata['modtext']);
        $postdata['modtext'] = str_replace("\r", "<br>", $postdata['modtext']);
        $postdata['modtext'] = str_replace("\t", "　　　　", $postdata['modtext']);
        $postdata['time'] = date('Y/m/d H:i');
        $modflag = false;
        for($i=0;$i<count($bbs_data);$i++) {
          $tmp = explode('<>',$bbs_data[$i]);
          if($tmp[0] == $postdata['no'] && $tmp[1] == $postdata['editpass'] && $tmp[1] != '') {
            $bbs_data[$i] = $tmp[0].'<>'.$tmp[1].'<>'.$tmp[2].'<>'.$postdata['modtext'].'<>'.$postdata['time'].'<>modified<>'.$tmp[4];
            $modflag = true;
          }
        }
        file_put_contents($datapath,implode("\n",$bbs_data),LOCK_EX);
        if($modflag){
          // setcookie('BBS', 'MOD', time()+60, '/', '192.168.1.2', false, true);
        }else{
          // setcookie('BBS', 'MODFAIL', time()+60, '/', '192.168.1.2', false, true);
        }
        // header("Location: " . $selfname);
        exit();
      }
    }else{
      //POSTでない場合は初期化
      $postdata['name'] = "";
      $postdata['text'] = "";
      $postdata['delpass'] = "";
    }

    unset($bbs);
    foreach($bbs_data as $each){
      unset($item);
      $item['number'] = explode('<>', $each)[0];
      $item['edit'] = explode('<>', $each)[1] === '' ? false : true;
      $item['name'] = explode('<>', $each)[2];
      $item['text'] = explode('<>', $each)[3];
      $item['time'] = explode('<>', $each)[4];
      // $editlink = $item[1] != '' ? '<span id="edit'.$item[0].'" onclick="editform('.$item[0].')" title="編集"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>' : '<span></span>';
      // $editform = $item[1] != '' ? '<div class="post-edit" id="editform'.$item[0].'"><form method="post" action="'.$selfname.'"><input type="hidden" name="no" value="'.$item[0].'"><textarea name="modtext" class="text">'.str_replace("<br>", "\r\n", $item[3]).'</textarea><div class="edit-input"><label>編集パス</label><input type="password" name="editpass" class="edit-pass" value=""><label><input type="checkbox" name="delconfirm" value="delconfirm" onchange="checkChange('.$item[0].')">削除する</label></div><button type="submit" name="edit" class="send-button tap" value="edit" id="button'.$item[0].'">編集</button></form></div>' : '';
      // $editmark = isset($item[5]) ? '<p title="編集されています"><i class="fa fa-pencil" aria-hidden="true"></i></p>' : '<p></p>';
      // $article[] = '<div class="post"><div class="post-title"><span>'.$item[0].'</span><span>'.$item[2].'</span>'.$editlink.'<span>'.$editmark.$item[4].'</span></div><div id="post'.$item[0].'" class="post-text">'.$item[3].'</div>'.$editform.'</div>'."\n";

      $bbs[] = $item;
    }

    $json['list'] = $bbs;
    $json['status'] = 'true';

    if(isset($json)){
      echo json_encode($json);
    }else{
      echo '[]';
    }

    exit();
  
  }

  exit();