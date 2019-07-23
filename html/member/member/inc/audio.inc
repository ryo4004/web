<?php

  //取得許可する文字列を下記
  // $audio['main'] = ['20th','21st','22nd','24th','25th','26th','27th','28th','29th','30th'];
  $audio['main'] = ['1st','2nd','4th','5th','6th','7th','8th','9th',
                    '10th','11th','12th','13th','14th','15th','16th','17th','18th','19th',
                    '20th','21st','22nd','23rd','24th','25th','26th','27th','28th','29th',
                    '30th','31st'];
  $audio['mini'] = ['mini2009','mini2011','mini2012','mini2013','mini2014','mini2015','mini2016','mini2017','mini2018'];
  $audio['other'] = ['source','bandfes2018'];

  //$_GET['data']確認用配列
  $filelist['audio'] = array_merge($audio['main'], $audio['mini']);

  //配列を逆順にする
  $audio['main'] = array_reverse($audio['main']);
  $audio['mini'] = array_reverse($audio['mini']);

  //player.html用
  $audio['player'] = array_merge($audio['main'], $audio['mini'],$audio['other']);
