<?php

class Queue {
	private $queue;
	private $limit;

	public function __construct($items, $limit = null) {
		$items = is_array($items) ? $items : array($items);
		if (!$limit || count($items) <= $limit) {
			$this->queue = $items;
			$this->limit = $limit;
		} else {
			throw new Exception('attempting to initialize with too many items');
		}
	}

	public function add($items) {
		$items = is_array($items) ? $items : array($items);
		while ($items) {
			if (!$this->limit || count($this->queue) < $this->limit) {
				array_push($this->queue, array_shift($items));
			} else {
				echo "queue is full";
				return;
			}
		}
	}

	public function retrieve() {
		return array_shift($this->queue);
	}

	public function getQueue() {
		return $this->queue;
	}
}

$myGoodQueue = new Queue(array(1, 2, 3));

print_r($myGoodQueue->retrieve());

// $myBadQueue = new Queue(array(1, 2, 3), 2);
