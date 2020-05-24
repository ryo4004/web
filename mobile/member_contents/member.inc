<?php

	# here type page details
	$page_title = "メンバー";
	$head_title = "団員専用トップ";
	
	$title = [
		"事務局よりお知らせ",
		"団員専用掲示板",
	];

	$contents = [
<<<EOM
<input type="submit" name="manager" value="こちら"><br><br>
EOM
,
<<<EOM
<input type="submit" name="bbs" value="こちら">
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