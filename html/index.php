<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1.0">
  <title>ザ・ウィンド・アンサンブルへようこそ！</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="shortcut icon" href="image/favicon.ico">
</head>
<body>
  <div class='top-background' id='video-frame'>
    <video id='video' preload='auto' autoplay loop muted playsinline>
      <source src='image/video/top.mp4' type='video/mp4'>
      <source src='image/video/top.webm' type='video/webm'>
    </video>
    <div class='overlay'>
      <div class='main-logo'>
        <?php require('image/logo/logo.svg'); ?>
        <?php require('image/logo/logo_mobile.svg'); ?>
        <q id='quote'></q>
      </div>
    </div>
    <div id='loading'>
      <div class="loading">
        <div class="loading1"></div>
        <div class="loading2"></div>
        <div class="loading3"></div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/index.js"></script>
</body>
</html>
