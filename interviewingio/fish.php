<?php
// Given two arrays
// Array 1 = fish sizes
// Array 2 = fish directions
// fish swimming in same direction never meet
// when two fish meet, bigger fish eats smaller fish

function fishies($sizes, $directions) {
	$i = 0;
	while ($i < count($sizes) - 1) {
		if ($directions[$i] == 0 || $directions[$i + 1] == 1) {
			$i++;
			continue;
		}
		if ($sizes[$i] > $sizes[$i+1]) {
			array_splice($sizes, $i+1, 1);
			array_splice($directions, $i+1, 1);
		} else {
			array_splice($sizes, $i, 1);
			array_splice($directions, $i, 1);
			$i = $i > 0 ? $i-1 : 0;
		}
	}
	return $sizes;
}

//CASE 1
$sizes =      array(3, 2, 1, 4, 5);
$directions = array(1, 0, 1, 0, 1);
$result = array(4, 5);

print_r(fishies($sizes, $directions));
print_r($result === fishies($sizes, $directions) ? 'correct' : 'failed');

//CASE 2
$sizes = array(4, 3, 1, 2, 5);
$directions = array(1, 1, 0, 1, 0);
$result = array(5);

print_r(fishies($sizes, $directions));
print_r($result === fishies($sizes, $directions) ? ', correct' : ', failed');