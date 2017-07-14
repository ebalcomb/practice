<?php

class BinaryTree {
	public $root;

	public function __construct($node) {
		$this->root = $node;
	}

	public function addNode($node) {
	}

	public function removeNode() {
	}

	// for breadth use a queue (queues are long/wide);
	function breadthFirstSearch() {
		$nodes = array($this->root);
		$values = array();

		while (count($nodes)) {
			$node = array_shift($nodes);
			array_push($values, $node->getValue());
			if ($node->getLeft()) {
				array_push($nodes, $node->getLeft());
			}
			if ($node->getRight()) {
				array_push($nodes, $node->getRight());
			}
		}
		return $values;
	}

	// for depth use a stack (stacks are deep!)
	function depthFirstSearch($sought = null) {
		$nodes = array($this->root);
		$found = array();

		if (!$sought) {
				while (count($nodes)) {
				$node = array_pop($nodes);
				array_push($found, $node->getValue());
				if ($node->getRight()) {
					array_push($nodes, $node->getRight());
				}
				if ($node->getLeft()) {
					array_push($nodes, $node->getLeft());
				}
			}
			return $found;
		} else {
			return null;
		}
	}
}

