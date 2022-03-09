<?php
	error_reporting(0);
	#system("/usr/bin/python3 result.py ".str_replace(","," ",$_POST[num]));
	system("python result.py ".str_replace(","," ",$_POST[num]));
?>
