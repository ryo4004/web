<?php

  if(!isset($_COOKIE['STATUS'])) {
    setcookie('MESSAGE', '5', time()+60, '/', 'winds-n.com', false, true);
    header('Location: ../authentication.html');
    exit();
  }

  if(isset($_COOKIE['STATUS']) && $_COOKIE['STATUS'] == '0') {
    setcookie('MESSAGE', '4', time()+60, '/', 'winds-n.com', false, true);
    header('Location: ../authentication.html');
    exit();
  }elseif(isset($_COOKIE['STATUS']) && $_COOKIE['STATUS'] != 'MEMBER'){
    setcookie('MESSAGE', '6', time()+60, '/', 'winds-n.com', false, true);
    header('Location: ../authentication.html');
    exit();
  }

  // 有効期限を更新(有効期限60日)
  setcookie('STATUS', 'MEMBER', time()+60*60*24*30*2, '/', 'winds-n.com', false, true);
