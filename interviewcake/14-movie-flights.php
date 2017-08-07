<?php

function movieChecker($flightTime, $movieTimes) {
    return false;
}


$movieTimes = array(61, 71, 73, 65, 65);

print_r(movieChecker(130, $movieTimes) === true);
//should be true

print_r(movieChecker(120, $movieTimes) === false);
