<?php
	$a = 'laval';
	//$a = 'lavnal';
	$revStr = null;
	$length = strlen($a);
	$check = $length;
	$flag = 0;
	for($i=0; $i < $length; $i++) {
		echo $a[$i] . " ===> ";
		echo $a[$check-1];
		echo '</br>';
		if($a[$i] != $a[$check-1]) {
			$flag = 1;
			break;
		}
		//$revStr = $revStr.$a[$check-1];
		$check--;
	}

	//echo $revStr;
	if($flag === 0) {
		echo ' palindrom';
	} else {
		echo ' not palindrom';
	}
?>