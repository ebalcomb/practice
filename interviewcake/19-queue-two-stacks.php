<?php

class Queue {
	public $stack1 = array();
	public $stack2 = array();

	public function enqueue($item) {
		array_push($this->stack1, $item);
	}

	public function dequeue() {
		if (count($this->stack1)) {
			while (count($this->stack1) > 1) {
				array_push($this->stack2, array_pop($this->stack1));
			}
			return array_pop($this->stack1);
		}

		return array_pop($this->stack2);
	}
}

$my_queue = new Queue();

$items = array('a', 'b', 'c', 'd', 'e');

foreach($items as $item) {
	$my_queue->enqueue($item);
}

$dequeued = $my_queue->dequeue();

print_r($dequeued);