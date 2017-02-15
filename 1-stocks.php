<?php

//solution 1 O(Nsquared)

function stocks_1($input_array) {
	$max_buy_index = count($input_array) - 2;
	$max_sell_index = $max_buy_index + 1;

	$best_profit = null;

	$buy_index = 0;
	$sell_index = 1;

	while ($buy_index <= $max_buy_index) {
		while ($sell_index <= $max_sell_index) {
			$buy_price = $input_array[$buy_index];
			$sell_price = $input_array[$sell_index];
			$gain = $sell_price - $buy_price;
			if ($gain > $best_profit) {
				$best_profit = $gain;
			}
			$sell_index += 1;
		}
		$buy_index += 1;
		$sell_index = $buy_index + 1;
	}

	return $best_profit;
}

//solution 2 O(N)

function stocks_2($input_array) {
	$buy = $input_array[0];
	$sell = $input_array[1];
	$best_profit = $sell - $buy;

	foreach ($input_array as $i => $price) {
		if ($i === 1) {
			continue;
		}

		if ($price - $buy > $best_profit) {
			$best_profit = $price - $buy;
		}

		$buy = min($buy, $price);
	}

	return $best_profit;
}

$input_array = array(5, 10, 6, 4, 8, 2, 7, 11, 9);
print_r(stocks_1($input_array));
print_r(stocks_2($input_array));