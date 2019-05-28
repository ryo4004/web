<?php
  // 初期設定
  date_default_timezone_set('Asia/Tokyo');
  $dir['data'] = DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR;

  // データ取得
  $list = file(dirname(__FILE__).$dir['data'].'schedule.inc',FILE_IGNORE_NEW_LINES);

  //コンテンツ処理(schedule)
  $weekjp = ['日', '月', '火', '水', '木', '金', '土'];
  $weeken = ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'];
  $timestamp['present'] = date('Y/m/d H:i');
  $timestamp['today'] = date('Y/m/d');
  $contents['next'] = '直近の練習予定はありません。';
  $nextflag = FALSE;
  $todayflag = '';
  for($i=0;$i<count($list);$i++) {
    $timestamp['end'] = date('Y/m/d H:i',strtotime(explode('<>',$list[$i]) [0].' '. explode('-', explode('<>',$list[$i])[1] ) [1] ));
    $date = explode('<>',$list[$i])[0];
    $start = explode('-',explode('<>',$list[$i])[1])[0];
    $end = explode('-',explode('<>',$list[$i])[1])[1];
    $place = explode('<>',$list[$i])[2];
    $studio = explode('<>',$list[$i])[3];
    $studio = preg_replace('/第(.*)スタジオ/','第<span>$1</span>スタジオ',$studio);
    $memo = explode('<>',$list[$i])[4];
    if($timestamp['end'] >= $timestamp['present'] && $nextflag == FALSE) {
      if(strtotime($timestamp['today']) === strtotime($date)){
        $todayflag = '<p class="todayflag">本日</p>';
      }
      $contents['next'] = $todayflag . '<p><span class="frame"><span class="month-date"><span class="month">'.preg_replace('/0([1-9])/','$1',explode('-',$date)[1]).'</span><span class="month text">月</span><span class="date">'.preg_replace('/0([1-9])/','$1',explode('-',$date)[2]).'</span><span class="date text">日</span><span class="day '.$weeken[date('w',strtotime($date))].'">'.$weekjp[date('w',strtotime($date))].'</span></span><span class="time">'.$start.'～'.$end.'</span></span>'
      .'<span class="frame"><span class="place">長岡リリックホール</span><span class="studio">'.$studio.'</span></span></p>';
      $nextflag = explode('-',$date)[1];
    }
  }

?><html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1.0">
  <title>ザ・ウィンド・アンサンブルへようこそ！</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="shortcut icon" href="image/favicon.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
  <script>
    ((d) => {
      var config = { kitId: 'wxw0kpr', scriptTimeout: 3000, async: true },
      h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document)
  </script>
</head>
<body>

  <header id="top">
    <section id="background">
      <div id="first-background"></div>
      <div id="second-background"></div>
      <div class="filter"></div>
    </section>
    <!-- <section id="member">
      <a href='https://member.winds-n.com'><ion-icon name="ios-log-in"></ion-icon>ログイン</a>
    </section> -->
    <section id="main-logo">
      <main>
        <?php require('image/logo/logo.svg'); ?>
      </main>
    </section>
    <section class="quote">
      <q id='quote'></q>
    </section>
    <!-- <section id="direct-link">
      <div><a href="mini2019" class="tap">春のミニコンサート2019を開催します！</a></div>
    </section> -->
    <span class='scroll-guide'></span>
  </header>

  <div>

    <div class='block full introduction' id="introduction">
      <div class='background map'>
        <?php require('image/svg/japan-niigata3_3.svg'); ?>
      </div>
      <div class='contents'>
        <div>
          <h2 class='location' data-subttl="About us">私たちについて</h2>
          <div class='text'>
            <p>ザ・ウィンド・アンサンブルは、新潟県長岡市を中心に活動している社会人吹奏楽団です。</p>
          </div>
          <a href='about.php' class='button'>More</a>
        </div>
      </div>
    </div>

    <div class='block concert'>
      <div class='contents'>
        <div>
          <div class='concert-introduction'>
            <div class='title'>
              <h2 class='title' data-subttl="Concert">演奏会</h2>
            </div>
            <div class='text'>
              <p>ザ・ウィンド・アンサンブルは年2回、演奏会を主催しております。</p>
              <p>これらの演奏会の他に出張依頼演奏も随時受け付けております。</p>
              <p>お気軽にお問合せからご連絡ください。</p>
            </div>
          </div>
          <div class='concert-box'>
            <div class='main-concert' style='order:1'>
              <div class='content'>
                <h3 class='title' data-subttl="Annual Concert">定期演奏会</h3>
                <div class='text'>
                  <p>秋に開催する定期演奏会では、吹奏楽のオリジナル作品やクラシックのアレンジ作品をメインに演奏いたします。</p>
                </div>
                <ul>
                  <li>
                    <a href='#' class='open'>
                      <div class='concert-detail'>
                        <div><p>2019年10月13日(日)</p><h3>第32回定期演奏会</h3></div>
                        <div class='link-arrow'><i class="fas fa-chevron-right"></i></div>
                      </div>
                      <div class='concert-close'>終了しました</div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class='mini-concert' style='order:2'>
              <div class='content'>
                <h3 class='title' data-subttl="Mini Concert">ミニコンサート</h3>
                <div class='text'>
                  <p>春に開催するミニコンサートでは、アニメソングやポップス、映画音楽などをメインに演奏いたします。</p>
                </div>
                <ul>
                  <li>
                    <a href='#' class='close'>
                      <div class='concert-detail'>
                        <div><p>2019年5月11日(土)</p><h3>春のミニコンサート</h3></div>
                        <div class='link-arrow'><i class="fas fa-chevron-right"></i></div>
                      </div>
                      <div class='concert-close'>終了しました</div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class='block full schedule'>
      <div class='background'>
        <!-- <img src='image/photo/drum.jpg'> -->
        <div class='overlay'></div>
      </div>
      <div class='contents'>
        <div>
          <h2 class='title' data-subttl="Schedule">練習日程</h2>
          <div class='text'>
            <p>主に長岡リリックホールのスタジオにて練習しております。</p>
            <p>基本的に第5スタジオにて毎週土曜日18時から22時まで練習を行います。</p>
            <p>本番が近くなると、第1スタジオやコンサートホールなどを利用して練習しています。</p>
          </div>
          <div class='schedule-next'>
            <div>
              <?php echo $contents['next']; ?>
            </div>
          </div>
          <a href='#' class='button'>More</a>
        </div>
      </div>
    </div>

    <div class='block full contact'>
      <div class='background'>
        <!-- <img src='image/photo/drum.jpg'> -->
        <div class='overlay'></div>
      </div>
      <div class='contents'>
        <h2 class='title' data-subttl="Contact">お問い合わせ</h2>
        <div class='text'>
          <p>ザ・ウィンド・アンサンブルに関するご意見、ご質問、メッセージ等々お気軽にお問い合わせください。</p>
          <p>また、出張、依頼演奏なども随時受け付けております。</p>
        </div>
        <a href='#' class='button'>More</a>
      </div>
    </div>

  </div>
  <footer>
    <div>
      <div class='author'>
        <a href='index.php'><h2>ザ・ウィンド・アンサンブル</h2></a>
        <small>&copy; The Wind Ensemble 1985-<?php echo date('Y'); ?> All Rights Reserved.</small>
      </div>
      <div class='link'>
        <a href='policy'>個人情報保護方針</a>
      </div>
    </div>
  </footer>
  <script type="text/javascript" src="js/index.js"></script>
</body>
</html>