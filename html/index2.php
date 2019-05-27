<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1.0">
  <title>ザ・ウィンド・アンサンブルへようこそ！</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/index2.css">
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

    <div class='block introduction' id="introduction">
      <div class='background map'>
        <?php require('image/svg/japan-niigata3_3.svg'); ?>
      </div>
      <div class='contents'>
        <div>
          <h2 class='location' data-subttl="About us">私たちについて</h2>
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
          <p>ザ・ウィンド・アンサンブルは、新潟県長岡市を中心に活動している社会人吹奏楽団です</p>
          <a href='about.php' class='button'>More</a>
        </div>
      </div>
    </div>

    <div class='not-block concert'>
      <!-- <div class='background'> -->
        <!-- <div class='cover'></div> -->
        <!-- <img src='image/photo/spring.jpg' class='spring'> -->
        <!-- <div class='cover spring'></div> -->
        <!-- <img src='image/photo/autumn.jpg' class='autumn'> -->
        <!-- <div class='cover autumn'></div> -->
        <!-- <div class='overlay'></div> -->
      <!-- </div> -->
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

    <div class='block schedule'>
      <div class='background'>
        <!-- <img src='image/photo/drum.jpg'> -->
        <div class='overlay'></div>
      </div>
      <div class='contents'>
        <h2 class='title' data-subttl="Schedule">練習日程</h2>
        <p>リリックホールにて毎週練習しております</p>
        <a href='#' class='button'>More</a>
      </div>
    </div>

    <div class='block contact'>
      <div class='background'>
        <!-- <img src='image/photo/drum.jpg'> -->
        <div class='overlay'></div>
      </div>
      <div class='contents'>
        <h2 class='title' data-subttl="Contact">お問い合わせ</h2>
        <p>ザ・ウィンド・アンサンブルに関するご意見、ご質問、メッセージ等々お気軽にお問い合わせください。</p>
        <p>また、出張、依頼演奏なども随時受け付けております。</p>
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
  <script type="text/javascript" src="js/index2.js"></script>
</body>
</html>
