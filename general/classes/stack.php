<?php

class Stack {
	private $stack;
	private $limit;

	public function __construct($items, $limit = null) {
		$items = is_array($items) ? $items : array($items);
		if (!$limit || count($items) < $limit) {
			$this->stack = $items;
			$this->limit = $limit;
		} else {
			throw new Exception('stack initialized with too many items');
		}
	}

	public function add($items) {
		$items = is_array($items) ? $items : array($items);

		while ($items) {
			if (!$this->limit || count($this->stack) < $limit) {
				array_push($this->stack, array_shift($items));
			} else {
				echo "stack is full";
				return;
			}
		}
	}

	public function retrieve() {
		return array_pop($this->stack);
	}

	public function getStack() {
		return $this->stack;
	}
}