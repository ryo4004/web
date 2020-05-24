<?php

	# here type page details
	$page_title = "団員専用｜ザ・ウィンド・アンサンブル";
	$head_title = "団員専用ページ";
	
	$title = [
		"ログインパスワードを入力してください"
	];

	$contents = [
<<<EOM
		<center>
		<form action="member.html" method="post">
			<div id="passwdtxt"><input type="password" name="pass" value="" size="20"></div><br>
			<div id="submitbtn"><input type="submit" value="送信"></div>
			</form>
		</center>
EOM

	];

# contents head html documents
#	$contents_head_pc = <<< EOM
#	<div class="header">
#		<p>
#		<h1>$head_title</h1>
#		<h2></h2>
#		</p>
#	</div>
#
#EOM;

	$contents_head_mb = <<< EOM
        <div class="header">
	<p>
            <center><font size="5">$head_title</font></center>
	</p>
        </div>

EOM;

?>