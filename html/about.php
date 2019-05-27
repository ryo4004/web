<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1.0">
  <title>ザ・ウィンド・アンサンブルへようこそ！</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/common.css">
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

  <header>
    <section id="main-logo">
      <a href='index2.php'>
        <?php require('image/logo/logo.svg'); ?>
      </a>
    </section>
  </header>

  <div class='top-title'>
    <div>
      <h1 data-subttl="About us">ウィンズについて</h1>
      <div class='bread'><a href='index2.php'>ホーム</a><i class="fas fa-chevron-right"></i><a href='index2.php'>ウィンズについて</a></div>
    </div>
  </div>

  <div>

    <div class='block introduction' id="introduction">
      <div class='contents'>
        <div class='text'>
          <p>
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
          </p>
        </div>
      </div>
    </div>

    <div class='back-to-top'>
      <h1 data-subttl="About us">トップへ戻る</h1>
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
</body>
</html>
