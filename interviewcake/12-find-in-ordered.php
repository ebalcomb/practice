<?php

set_include_path('/Users/ellib/interview-practice/interviewcake');
include '00-tester.php';


function findInOrderedSet($set, $item) {
    $min = 0;
    $max = count($set) - 1;
    $index = (int)($max/2);

    while ($min <= $max) {
        if ($set[$index] === $item) {
            return true;
        } elseif ($set[$index] > $item) {
            $max = $index - 1;
        } else {
            $min = $index + 1;
        }
        $index = (int)(($max+$min)/2);
    }

    return false;
}

$ordered_set = array(1, 3, 5, 7, 9, 11);

$tester->test('findInOrderedSet', array($ordered_set, 4), true);
$tester->test('findInOrderedSet', array($ordered_set, 4), false);
