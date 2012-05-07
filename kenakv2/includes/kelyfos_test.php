<?php
$vathos = $_POST["vathos"];
$katakoryfo_utb = $_POST["katakoryfo_utb"];

$stiles = get_utb($katakoryfo_utb);
$stiles1 = $stiles[0];
$stiles2 = $stiles[1];		
		
	if (!isset($stiles2)){
	$timiu = get_katakoryfo_utb($vathos, $stiles1);
	}
		
	else{
		$timiu1 = get_katakoryfo_utb($vathos, $stiles1);
		$timiu2 = get_katakoryfo_utb($vathos, $stiles2);
		$timiu = palindromisi($stiles1, $stiles2, $timiu1, $timiu2, $katakoryfo_utb);
	}
print json_encode($timiu);

?>