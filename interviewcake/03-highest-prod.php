<?php

// solution 1: O(NlogN) bc of the sort
function highestProduct($arrayOfInts)
{
    rsort($arrayOfInts);
    $product = $arrayOfInts[0] * $arrayOfInts[1] * $arrayOfInts[2];

    $final_index = count($arrayOfInts) -1;
    $product2 = $arrayOfInts[0] * $arrayOfInts[$final_index] * $arrayOfInts[$final_index -1];

    return $product > $product2 ? $product : $product2;
}

//solution 2: ON 
function highestProduct2($arrayOfInts)
{
    $highest = max($arrayOfInts[0], $arrayOfInts[1]);
    $lowest = min($arrayOfInts[0], $arrayOfInts[1]);
    $highestProductOf3 = $arrayOfInts[0] * $arrayOfInts[1] * $arrayOfInts[2];
    $highestProductOf2 = $arrayOfInts[0] * $arrayOfInts[1];
    $lowestProductOf2 = $arrayOfInts[0] * $arrayOfInts[1];

    for ($i = 2; $i < count($arrayOfInts); $i++) {
        $int = $arrayOfInts[$i];
        if ($int * $highestProductOf2 > $highestProductOf3) {
            $highestProductOf3 = $int * $highestProductOf2;
        }
        if ($int * $lowestProductOf2 > $highestProductOf3) {
            $highestProductOf3 = $int * $lowestProductOf2;
        }

        // $highestProductOf3 = max($highestProductOf3, $int * $highestProductOf2, $int * $lowestProductOf2);

        if ($int * $highest > $highestProductOf2) {
            $highestProductOf2 = $int * $highest;
        }

        if ($int * $lowest > $highestProductOf2) {
            $highestProductOf2 = $int * $lowest;
        }

        // $highestProductOf2 = max($highestProductOf2, $int * $highest, $int * $lowest);

        if ($int * $highest < $lowestProductOf2) {
            $lowestProductOf2 = $int * $highest;
        }

        if ($int * $lowest < $lowestProductOf2) {
            $lowestProductOf2 = $int * $lowest;
        }

        // $lowestProductOf2 = min($lowestProductOf2, $int * $highest, $int * $lowest);

        if ($int > $highest) {
            $highest = $int;
        }
        if ($int < $lowest) {
            $lowest = $int;
        }

        // $highest = max($highest, $int);
        // $lowest = min($lowest, $int);
    }

    return $highestProductOf3;
}


$cool_array = array(5, 8, 4, 7, 1, 10);
$second_array = array(-10, -10, 1, 3, 2);

echo "[560:" . highestProduct($cool_array) . "]";
echo "[300:" . highestProduct($second_array). "]";

echo "[560:" . highestProduct2($cool_array) . "]";
echo "[300:" . highestProduct2($second_array). "]";
