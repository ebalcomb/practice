<?php

function bubbleSort($array) {
	$count = count($array) - 1;

	while ($count) {
		for ($i = 0; $i < $count; $i++) {
			if ($array[$i] > $array[$i + 1]) {
				$temp = $array[$i];
				$array[$i] = $array[$i + 1];
				$array[$i + 1] = $temp;
			}
		}
		$count--;
	} 
	return $array;
}

$test_array = array(5, 4, 8, 3, 1, 7, 9, 2, 6);

print_r(bubbleSort($test_array));