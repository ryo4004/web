<html>
<head>
  <title>ザ・ウィンド・アンサンブルへようこそ！</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <div class='top-background' id='video-frame'>
    <video id='video' autoload autoplay loop muted controles='false' playsinline>
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
  </div>
  <script type="text/javascript" src="js/index.js"></script>
</body>
</html>
