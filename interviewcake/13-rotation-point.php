<?php

set_include_path('/Users/ellib/interview-practice/interviewcake');
include '00-tester.php';



function findRotationPoint($array) {
    $min = 0;
    $max = count($array) - 1;
    $index = (int)(($max-$min)/2);

    $first = $array[$min];
    $rotation = null;

    while (!isset($rotation)) {
        $check = $array[$index];
        if ($check < $first) {
            if ($check < $array[$index -1]) {
                $rotation = $index;
            } else {
                $max = $index - 1;
            }
        } else {
            $min = $index + 1;
        }

        $index = (int)(($max+$min)/2);
    }
    return $rotation;
}




$words = [
    'supplant',
    'undulate',
    'xenoepist',
    'asymptote', #NEW MIN// <-- rotates here!
    'babka', #NEW MAX 
    'banoffee',
    'engender',
    'karpatka',
    'othellolagkage',
    'ptolemaic',
    'retrograde'
];

$numbers = [
    7, 8, 9, 10, 1, 2, 3, 4, 5, 6
];

$tester->test(3, findRotationPoint($words), 'words');
$tester->test(3, findRotationPoint($numbers), 'numbers');