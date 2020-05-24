<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $contents['title']; ?></title>
<link rel="shortcut icon" href="../img/favicon.ico">
</head>
<body>
<div id="header">
<div id="main">
<center><img src="./img/wine_logo_mb.jpg"></center><br>
<center><font size="-2"><a href="#menu">▼メニュー</a></font></center><hr color="#860351" size="1" width="100%">
<div class="header">
<p>
<center><font size="5"><?php echo $contents['header_title']; ?></font></center>
</p>
</div>
<div class="content">
<?php
  echo $contents['article'];
?>
</div>
</div>
<hr color="#860351" size="1" width="100%">
<a name="menu"></a>
<div>
<div>
<font size="3">Winds MENU</font>
<font size="2">
<?php
	echo $contents['menu'];
?>
</font>
</div>
</div>
<div class="footer">
<hr color="#860351" size="1" width="100%">
<p><center><font size="2">Copyright (C)<br>The Wind Ensemble</font></center></p>
</div></div>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-68450946-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-68450946-3');
</script>
</body>
</html>
