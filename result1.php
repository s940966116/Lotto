<?php
	error_reporting(0); 
	#exec("/usr/bin/python3 result1.py",$result);
	exec("python result1.py",$result);
    for ($i=0;$i<count($result);$i++){
        $tmp=explode(",",trim($result[$i]));
        $high_array[$i][]=$tmp[0];
        $high_array[$i][]=$tmp[1];
        $high_array[$i][]=$tmp[2];
    }
    echo json_encode($high_array);
?>