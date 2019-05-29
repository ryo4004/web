<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1.0">
  <title>楽団紹介｜ザ・ウィンド・アンサンブル</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/about.css">
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

  <header id='top'>
    <section id="main-logo">
      <a href='index.php'>
        <?php require('image/logo/logo.svg'); ?>
      </a>
    </section>
  </header>

  <div class='top-title'>
    <div>
      <h1 data-subttl="About us">楽団紹介</h1>
      <div class='bread'><a href='index.php'>ホーム</a><i class="fas fa-chevron-right"></i><a href='about.php'>楽団紹介</a></div>
    </div>
  </div>

  <div class='block introduction' id="introduction">
    <div class='title'>
      <h2 data-subttl="The Wind Ensemble">ウィンズについて</h2>
    </div>
    <div class='contents'>
      <div class='text'>
        <p>
          ザ・ウィンド・アンサンブル(ウィンズ)は、新潟県長岡市を活動拠点とした社会人吹奏楽団です。
          1986年11月に長岡交響楽団金管奏者を中心とした長岡ブラスアンサンブルが母体となり新潟県内外の音楽好きの有志が集まって結成されました。
          「音楽の輪が限りなく広がりますように」を標語として、年2回開かれる演奏会を通して吹奏楽の楽しさを広めて行きたいと思っております。
        </p>
        <p>
          アマチュアバンドにとって月数回の練習こそ活動目的ですが、その他の主な活動として定期演奏会、ミニコンサートを行っております。
          またこれらの演奏会の他に、出張、依頼演奏なども随時受け付けております。
          お気軽にお問い合わせください。
        </p>
      </div>
    </div>
  </div>

  <div class='block location' id="location">
    <div class='title'>
      <h2 data-subttl="Location">活動拠点</h2>
    </div>
    <div class='contents'>
      <div class='text'>
        <p>ウィンズは新潟県長岡市に位置する<a href="http://www.nagaoka-caf.or.jp/" target="_blank">長岡リリックホール</a>を主な拠点としています。</p>
        <p>長岡在住のメンバーを中心とした総勢50名ほどで活動しております。</p>
      </div>
      <div id="map"></div>
      <!-- <div class='access'>
        <h3 class="access-title">JR長岡駅大手口より</h3>
        <ul class="access-list">
          <li>
            <ul class="route">
              <li class="circle">8番線 中央環状線(内回り・外回り)</li>
              <li class="circle">内回り: 近代美術館<br>外回り: ハイブ長岡</li>
              <li>徒歩3分</li>
              <li class="circle goal">長岡リリックホール</li>
            </ul>
          </li>
          <li>
            <ul class="route">
              <li class="circle">2番線 日赤病院経由 江陽団地行</li>
              <li class="circle">ハイブ長岡</li>
              <li>徒歩3分</li>
              <li class="circle goal">長岡リリックホール</li>
            </ul>
          </li>
        </ul>
        <ul class="access-list">
          <li>
            <ul class="route">
              <li class="circle">2番線 江陽環状線</li>
              <li class="circle">大手大橋先回り ハイブ長岡</li>
              <li>徒歩3分</li>
              <li class="circle goal">長岡リリックホール</li>
            </ul>
          </li>
          <li>
            <ul class="route">
              <li class="circle">2番線 日赤病院経由 出雲崎行きバス</li>
              <li class="circle">近代美術館</li>
              <li>徒歩3分</li>
              <li class="circle goal">長岡リリックホール</li>
            </ul>
          </li>
        </ul>
      </div> -->
    </div>
  </div>

  <div class='block recruit' id="recruit">
    <div class='title'>
      <h2 data-subttl="Recruit">会員募集</h2>
    </div>
    <div class='contents'>
      <div class='text'>
        <p>ウィンズは共に演奏できる仲間を募集しています。</p>
        <p>パートごとに募集状況は異なるため、一度お問い合わせください。</p>
      </div>
    </div>
  </div>

  <div class='block back-to-home'>
    <div>
      <a href='index.php'>ホームへ戻る</a>
    </div>
  </div>

  <footer>
    <div>
      <div class='author'>
        <a href='index.php'><?php require('image/logo/logo.svg'); ?></a>
        <small>&copy; The Wind Ensemble 1985-<?php echo date('Y'); ?> All Rights Reserved.</small>
      </div>
      <div class='link'>
        <ul>
          <li><a href='https://member.winds-n.com'>団員専用ページ</a></li>
          <li><a href='policy'>個人情報保護方針</a></li>
        </ul>
      </div>
    </div>
  </footer>
  <script type="text/javascript" src="js/about.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV0-BnYAJ4B3a7GG6sTh2lIh4PCtb5qZc&callback=initMap" async defer></script>
</body>
</html>
