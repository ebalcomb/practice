<?php

class Node {
	public $value;
	public $left;
	public $right;

	public function __construct($value, $left = null, $right = null) {
		$this->value = $value;
		$this->left = $left;
		$this->right = $right;
	}

	public function setLeft($node) {
		$this->left = $node;
	}

	public function getLeft() {
		return $this->left;
	}

	public function setRight($node) {
		$this->right = $node;
	}

	public function getRight() {
		return $this->right;
	}
}


// for depth use a stack (stacks are deep!)
function depthFirstSearch($tree) {
	$nodes = array($tree);

	while (count($nodes)) {
		$node = array_pop($nodes);
		echo $node->value . ", ";

		if ($node->getLeft()) {
			array_push($nodes, $node->getLeft());
		}

		if ($node->getRight()) {
			array_push($nodes, $node->getRight());
		}
	}
}


// for breadth use a queue (queues are long/wide);
function breadthFirstSearch($tree) {
	$nodes = array($tree);

	while (count($nodes)) {
		$node = array_shift($nodes);
		echo $node->value . ", ";

		if ($node->getLeft()) {
			array_push($nodes, $node->getLeft());
		}
		if ($node->getRight()) {
			array_push($nodes, $node->getRight());
		}
	}
}

//make nodes
$nodeA = new Node('A');
$nodeB = new Node('B');
$nodeC = new Node('C');
$nodeD = new Node('D');
$nodeE = new Node('E');
$nodeF = new Node('F');
$nodeG = new Node('G');
$nodeH = new Node('H');
$nodeI = new Node('I');
$nodeJ = new Node('J');
$nodeK = new Node('K');
$nodeL = new Node('L');
$nodeM = new Node('M');
$nodeN = new Node('N');
$nodeO = new Node('O');
$nodeP = new Node('P');
$nodeQ = new Node('Q');

//make tree: root $nodeA
$nodeA->setLeft($nodeB);
$nodeA->setRight($nodeC);
$nodeB->setLeft($nodeD);
$nodeB->setRight($nodeE);
$nodeC->setLeft($nodeF);
$nodeF->setLeft($nodeG);
$nodeF->setRight($nodeH);
$nodeH->setLeft($nodeI);
$nodeI->setLeft($nodeJ);
$nodeI->setRight($nodeK);
$nodeJ->setLeft($nodeL);
$nodeJ->setRight($nodeM);
$nodeL->setLeft($nodeP);
$nodeK->setLeft($nodeN);
$nodeK->setRight($nodeO);
$nodeP->setLeft($nodeQ);

breadthFirstSearch($nodeA);

echo "****************";

depthFirstSearch($nodeA);