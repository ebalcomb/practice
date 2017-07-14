<?php

// recursion, come back to me :(

function makeChange($amount, $denominations) 
{
    sort($denominations);

    $max_use = array();

    // find out the maximum number of times each denomination can be used
    foreach ($denominations as $denomination) {
        if ($denomination > $amount) {
            $max_use[$denomination] = 0;
        }

        $current_amount = 0;
        $times = 0;
        while ($current_amount < $amount) {
            $current_amount += $denomination;
            if ($current_amount <= $amount) {
                $times += 1;
            }
        }
        $max_use[$denomination] = $times;
    }

    return $max_use;
}

$denominations = array(1, 2, 3, 4);

print_r(makeChange(4, $denominations));
