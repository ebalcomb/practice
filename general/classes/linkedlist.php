<?php 

class LinkedList {
	public $head;
	public $tail;
	public $size;
	public $nodes_array;

	public function __construct($nodes) {
		$this->size = count($nodes);

		usort($nodes, "self::sortNodes");

		$this->nodes_array = $nodes;
		// $this->head = array_shift($nodes);
		// $node = $this->head;

		// while ($nodes) {
		// 	$next_node = array_shift($nodes);
		// 	$node->setRight($next_node);
		// 	$next_node->setLeft($node);
		// 	$node = $next_node;
		// }

		// $this->tail = $node;
	}

	public function getBalancedTree() {
		$balanced_tree = $this->makeBalancedTree($this->nodes_array);
		return $balanced_tree;
	}

	public function makeBalancedTree($nodes, $right) {

		if (count($nodes) === 1) {
			return $nodes[0];
		} elseif (count($nodes) === 2) {
			if ($right) {
				$nodes[0]->setRight($nodes[1]);
				return $nodes[0];
			}else {
				$nodes[1]->setLeft($nodes[0]);
				return $nodes[1];
			}
		} else {
			$root_index = floor(count($nodes)/2);
			$left = array_slice($nodes, 0, $root_index);
			$right = array_slice($nodes, $root_index + 1);

			$head = $nodes[$root_index];
			$head->setLeft($this->makeBalancedTree($left));
			$head->setRight($this->makeBalancedTree($right, true));

			return $head;
		}
	}

	public function deconstruct() {
		$nodes = array();
		$node = $this->head;
		while ($node) {
			array_push($nodes, $node);
			$node = $node->getRight();
		}

		usort($nodes, "LinkedList::sortNodes");
		$this->nodes_array = $nodes;
	}

	public function getNodesAsArray() {
		return $this->nodes_array;
	}

	public static function sortNodes($a, $b) {
		return $a->getValue() < $b->getValue() ? -1 : 1;
	}

	public function addNode($new_node) {
		if ($new_node->getValue() < $this->head->getValue()) {
			$new_node->setRight($this->head);
			$this->head = $new_node;
		} else {
			$previous_node = $this->head;
			$next_node = $this->head->getRight();

			while ($next_node && $next_node->getValue() < $new_node->getValue()) {
				$previous_node = $next_node;
				$next_node = $next_node->getRight();
			}

			$previous_node->setRight($new_node);
			$new_node->setLeft($previous_node);
			if ($next_node) {
				$new_node->setRight($next_node);
				$next_node->setLeft($new_node);
			} else {
				$this->tail = $new_node;
			}
		}
		$this->size++;
		$this->deconstruct();
	}

	public function peekHead() {
		return $this->head->getValue();
	}

	public function removeHead() {
		if ($this->head) {
			$old_head = $this->head;
			$this->head = $old_head->getRight();
			if ($this->head) {
				$this->head->setLeft(null);
			}
			$this->size--;
			return $old_head;
		} else {
			throw new Exception("Empty Linked List");
		}
		$this->deconstruct();
	}

	public function peekTail() {
		return $this->tail->getValue();
	}

	public function removeTail() {
		if ($this->tail) {
			$old_tail = $this->tail;
			$this->tail = $old_tail->getLeft();
			if ($this->tail) {
				$this->tail->setRight(null);
			}
			$this->size--;
			return $old_tail;
		} else {
			throw new Exception("Empty Linked List");
		}
		$this->deconstruct();
	}

	public function getNodes() {
		$values = array();
		$node = $this->head;

		while ($node) {
			array_push($values, $node->getValue());
			$node = $node->getRight();
		}
		return $values;
	}

		public function getNodesBackwards() {
		$values = array();
		$node = $this->tail;
		while ($node) {
			array_push($values, $node->getValue());
			$node = $node->getLeft();
		}
		return $values;
	}
}