<?php

	# here type page details
	$page_title = "団員専用掲示板｜ザ・ウィンド・アンサンブル";
	$head_title = "団員専用掲示板";

	$navi = '<a href="./' . $nv['member'] . '">団員専用トップ</a> &#062; ' . $head_title;
	$navi_old = '<a href="./' . $nv['member'] . '">団員専用トップ</a> &#062; <a href="./' . $nv['bbs'] . '">'. $head_title .'</a> &#062; 過去の投稿';

	$title = [

	];

	$contents = [

	];

# contents head html documents
	$contents_head_pc = <<< EOM
	<div class="header">
		<p>
		<h1>$head_title</h1>
		<h2>　</h2>
		</p>
	</div>
EOM;

	$contents_head_mb = <<< EOM
        <div class="header">
			<p>
            <center><font size="5">$head_title</font></center>
			</p>
        </div>
EOM;

?>