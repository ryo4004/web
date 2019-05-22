<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1.0">
  <title>ザ・ウィンド・アンサンブルへようこそ！</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="shortcut icon" href="image/favicon.ico">
  <script>
    ((d) => {
      var config = { kitId: 'wxw0kpr', scriptTimeout: 3000, async: true },
      h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document)
  </script>
</head>
<body>
  <div>
    <div class='top-background' id='video-frame'>
      <video id='video' preload='auto' autoplay loop muted playsinline>
        <source src='image/video/top.mp4' type='video/mp4'>
        <source src='image/video/top.webm' type='video/webm'>
      </video>
      <div class='overlay'></div>
      <div class='contents'>
        <div class='main-logo'>
          <?php require('image/logo/logo.svg'); ?>
          <?php require('image/logo/logo_mobile.svg'); ?>
          <q id='quote'></q>
          <div class='direct-link'><a href="#" class="tap">第32回定期演奏会の案内はこちら</a></div>
        </div>
        <span><a href="#introduction" class="guide-scroll tap">Scroll</a></span>
      </div>
      <div id='loading'>
        <div class="loading">
          <div class="loading1"></div>
          <div class="loading2"></div>
          <div class="loading3"></div>
        </div>
      </div>
    </div>
    <div class='block introduction' id="introduction">
      <div class='background map'>
        <?php require('image/svg/japan-niigata3_2.svg'); ?>
      </div>
      <div class='contents'>
        <h2 class='location' data-subttl="Location">拠点</h2>
        <!-- <p>拠点
          私たちザ・ウィンド・アンサンブル(ウィンズ)は、新潟県長岡市を中心に活動しています。<br />
          「音楽の輪が限りなく広がりますように」を標語として、年2回開かれる演奏会を通して吹奏楽の楽しさを広めて行きたいと思っております。
        </p>
        <p>
          アマチュアバンドにとって月数回の練習こそ活動目的ですが、その他の主な活動として定期演奏会、ミニコンサートを行っております。<br />
          定期演奏会では、吹奏楽のオリジナル作品やクラシックのアレンジ作品を、野外コンサートでは、アニメソング、ポップス、映画音楽などを主体に音楽を楽しんでいます。
        </p>
        <p>
          またこれらの演奏会の他に、出張、依頼演奏なども随時受け付けております。
          お気軽にお問い合わせからご連絡ください。
        </p> -->
        <p>新潟県長岡市を中心に活動しています</p>
        <a href='#' class='button'>More</a>
      </div>
    </div>
    <div class='block concert'>
      <div class='background photo'>
        <img src='image/photo/sax.jpg'>
        <div class='overlay'></div>
      </div>
      <div class='contents'>
        <h2 class='title' data-subttl="Concert">演奏会</h2>
        <p>主に年2回、演奏会を行っております</p>
      </div>
    </div>
    <div class='block schedule'>
      <div class='background'>
        <img src='image/photo/drum.jpg'>
        <div class='overlay'></div>
      </div>
      <div class='contents'>
        <h2 class='title' data-subttl="Schedule">練習日程</h2>
        <p>リリックホールにて毎週練習しております</p>
        <a href='#' class='button'>More</a>
      </div>
    </div>
  </div>
  <footer>
    <div>
      <div class='author'>
        <a href='#'><h2>ザ・ウィンド・アンサンブル</h2></a>
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
