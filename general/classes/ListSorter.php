<?php

class ListSorter {
	public function bubbleSort($array) {
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
	public function bubbleSort2($array) {
		$sorted = false;

		while (!$sorted) {
			$sorted = true;
			$i = 0;
			while ($i < count($array) - 1) {
				if ($array[$i] > $array[$i + 1]) {
					$sorted = false;
					$temp = $array[$i];
					$array[$i] = $array[$i + 1];
					$array[$i + 1] = $temp;
				}
				$i++;
			}
		} 
		return $array;
	}
}

$sorter = new ListSorter();

$unsorted_array = array(5, 2, 1, 4, 6);

print_r($sorter->bubbleSort2($unsorted_array));
