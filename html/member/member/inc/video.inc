<?php

  //取得許可する文字列を下記
  // $video['main'] = ['20th','21st','22nd','24th','25th','26th','27th','28th','29th','30th'];
  // $video['main'] = ['20th','21st','22nd','23rd','24th','25th','26th','27th','28th','29th','30th'];
  // $video['mini'] = ['mini2016'];

  $video['main'] = ['5th','6th','7th','8th','9th',
                    '10th','11th','12th','13th','16th','17th','18th','19th',
                    '20th','21st','22nd','23rd','24th','25th','26th','27th','28th','29th','30th'];
  $video['mini'] = ['mini2012','mini2013','mini2014','mini2015','mini2016'];
  $video['other'] = ['bandfes2018'];

  //$_GET['data']確認用配列
  $filelist['video'] = array_merge($video['main'], $video['mini'], $video['other']);

  //配列を逆順にする
  $video['main'] = array_reverse($video['main']);
  $video['mini'] = array_reverse($video['mini']);
