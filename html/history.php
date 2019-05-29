<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <title>過去の演奏会｜ザ・ウィンド・アンサンブル</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/history.css">
  <link rel="shortcut icon" href="image/favicon.ico">
  <!-- <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script> -->
  <!-- <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script> -->
  <script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
  <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
  <!-- <script crossorigin src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script> -->
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/superagent"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
      <h1 data-subttl="History">過去の演奏会</h1>
      <div class='bread'><a href='index.php'>ホーム</a><i class="fas fa-chevron-right"></i><a href='history.php'>過去の演奏会</a></div>
    </div>
  </div>

  <div class='block history-introduction' id="history-introduction">
    <div class='contents'>
      <div class='text'>
        <p>
          ウィンズは1988年5月に第1回定期演奏会を開催してから現在に至るまで毎年定期演奏会を開催しています。
          ここではこれまでに開催した定期演奏会の記録を紹介します。
        </p>
        <p>
          また、春のミニコンサートとして恒例となったもうひとつの演奏会の記録についてもこちらで紹介しています。
        </p>
      </div>
    </div>
  </div>

  <div class='history' id="history"></div>

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
  <script type="text/babel" src="js/history.js"></script>
  <script type="text/babel" src="js/script.js"></script>
</body>
</html>
