<?php
	$num = $_POST["Words"];
	echo '<a href="./main.php" style="text-decoration:none;color:red;">回到主畫面</a><br>';
	echo '<font size = 5>第'.$num.'期的號碼為: </font>';
	#exec("/usr/bin/python3 search.py ".str_replace("","",$num), $out);
	exec("python search.py ".str_replace("","",$num), $out);
	echo '<font size = 5>'.$out[0].'(特別號)</font>';
?>