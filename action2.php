<?php
	$num = $_POST["Words"];
	$num_input = $_POST["num"];
	echo '<a href="./main.php" style="text-decoration:none;color:red;">回到主畫面</a><br>';
	echo '<font size = 5>第'.$num.'期的號碼為: </font>';
	#exec("/usr/bin/python3 search.py ".str_replace("","",$num), $out1);
	exec("python search.py ".str_replace("","",$num), $out1);
	echo '<font size = 5>'.$out1[0].'<BR></font>';
	$input_check_num = str_replace(","," ",$num_input);
	echo '<font size = 5>您選擇的號碼為: '.$input_check_num.'<BR></font>';
	echo '<font size = 5>您的中獎號碼為: </font>';
	#exec("/usr/bin/python3 check.py {$num} {$input_check_num}", $out2);
	exec("python check.py {$num} {$input_check_num}", $out2);
	if(count($out2) == 0){
		echo '<font size = 5>哈哈哈,沒中獎!</font>';
	}else{
		echo '<font size = 5>'.$out2[0].'</font>';
	}

?>