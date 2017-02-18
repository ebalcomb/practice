<?php

// solution 1, O(N)sqaured
function getProductsOfAllIntsExceptAtIndex($array) {
	$result = array();

	foreach ($array as $i => $val) {
		$product = 1;
		foreach ($array as $i2 => $val2) {
			if ($i != $i2) {
				$product *= $val2;
			}
		}
		$result[] = $product;
	}

	return $result;
}


// solution 2, O(N)

function getProductsOfAllIntsExceptAtIndex2($intArray) {
  $productsOfAllIntsExceptIndex = [1, 1, 7, 21];

	// for each index
  	// put the product so far in the result array(initialize at 1)
  	// THEN update the "product so far" value by the value at that index
	$productSoFar = 1;
	for ($i = 0; $i < count($intArray); $i++) {
	    $productsOfAllIntsExceptIndex[$i] = $productSoFar;
	    $productSoFar *= $intArray[$i];
	}

	// for each index
  	// put the product so starting from the end and moving backwards in the result array
  	// THEN multiply the existing "product so far" value by the value at that index
	$productAfter = 1;
	for ($i = count($intArray) -1; $i >= 0; $i--) {
	    $productsOfAllIntsExceptIndex[$i] *= $productAfter;
	    $productAfter *= $intArray[$i];
	}

	return $productsOfAllIntsExceptIndex;
}

$cool_array = [1, 7, 3, 4];
$expected_array = [84, 12, 28, 21];

print_r(getProductsOfAllIntsExceptAtIndex($cool_array));
print_r(getProductsOfAllIntsExceptAtIndex2($cool_array));
