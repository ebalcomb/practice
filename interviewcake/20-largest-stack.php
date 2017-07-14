<?php

class Stack {
	private $items = array();
	private $maxes = array();

	public function push($item) {
		if (!count($this->maxes) || $item > $this->maxes[count($this->maxes) -1]) {
			$this->maxes[] = $item;
		} else {
			$this->maxes[] = $this->maxes[count($this->maxes) -1];
		}
		array_push($this->items, $item);
	}

	public function pop() {

		if (!count($this->items)) {
			return null;
		}

		array_pop($this->maxes);
		return array_pop($this->items);
	}

	public function peek() {
		if (!count($this->items)) {
			return null;
		}

		return $this->items[count($this->items) -1];
	}

	public function getMax() {
		return $this->maxes[count($this->maxes) -1];
	}
}

$stack = new Stack();

$stack->push(1);
$stack->push(10);
$stack->push(5);
$stack->push(6);

print_r($stack->getMax());
print_r($stack->pop());
