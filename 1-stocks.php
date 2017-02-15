<?php

//solution 1 O(Nsquared)

$stock_prices = array(10, 7, 5, 8, 11, 9);
$max_buy_index = count($stock_prices) - 2;
$max_sell_index = $max_buy_index + 1;

$best_profit = null;

$buy_index = 0;
$sell_index = 1;

while ($buy_index <= $max_buy_index) {
	while ($sell_index <= $max_sell_index) {
		$buy_price = $stock_prices[$buy_index];
		$sell_price = $stock_prices[$sell_index];
		$gain = $sell_price - $buy_price;
		if ($gain > $best_profit) {
			$best_profit = $gain;
		}
		$sell_index += 1;
	}
	$buy_index += 1;
	$sell_index = $buy_index + 1;
}

print_r($best_profit);

//solution 2 O(N)

$stock_prices = array(10, 7, 5, 8, 11, 9);
$buy = $stock_prices[0];
$sell = $stock_prices[1];
$best_profit = $sell - $buy;

foreach ($stock_prices as $i => $price) {
	if ($i === 1) {
		continue;
	}

	if ($price - $buy > $profit) {
		$profit = $price - $buy;
	}

	$buy = min($buy, $price);
}

print_r($best_profit);