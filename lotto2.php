<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		echo '<a href="./main.php" style="text-decoration:none;color:red;">回到主畫面</a><br>';
	?>
	<P><font size = 5>選擇要查詢的期別</font></P>
	<form name = "scroll" method = "post" action = "action.php">
	<?php 
		$stack = array();
		for($i = 109000008; $i <= 109000057; $i++){
			array_push($stack, $i);	
		} 
		echo'<select name="Words" style="font-size:24px;width:170px;height:40px">'; 
		foreach($stack as $word){ 
			echo'<option value="'.$word.'">'.$word.'</option>'; 
		} 
		echo'</select>';
	?>
	<BR>
	<BR>
	<input type = "submit" value = "查詢">

</form>
	
</body>
</html>

