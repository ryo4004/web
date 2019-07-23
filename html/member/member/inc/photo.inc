<?php

  //取得許可する文字列を下記
  $photo['main'] = ['20th','21st','22nd','23rd','24th','25th','26th','27th','28th','29th','30th','31st'];
  $photo['mini'] = ['mini2011','mini2012','mini2013','mini2014','mini2015','mini2016','mini2017','mini2018'];

  //$_GET['data']確認用配列
  $filelist['photo'] = array_merge($photo['main'], $photo['mini']);

  //配列を逆順にする
  $photo['main'] = array_reverse($photo['main']);
  $photo['mini'] = array_reverse($photo['mini']);
