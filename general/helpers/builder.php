<?php

set_include_path('/Users/ellib/interview-practice/general');
$includes = array(
   'classes/node.php',
   'classes/binarytree.php',
   'classes/linkedlist.php'
);
foreach($includes as $file) {
     include_once $file;
}

class Builder {
	public function __construct($node_count = null) {
	}

	public function makeAlphabetTree() {
		$nodeA = new Node('A');
		$nodeB = new Node('B');
		$nodeC = new Node('C');
		$nodeD = new Node('D');
		$nodeE = new Node('E');
		$nodeF = new Node('F');
		$nodeG = new Node('G');

		$nodeA->setLeft($nodeB);
		$nodeA->setRight($nodeC);
		$nodeB->setLeft($nodeD);
		$nodeB->setRight($nodeE);
		$nodeC->setLeft($nodeF);
		$nodeC->setRight($nodeG);

		return new BinaryTree($nodeA);
	}

	public function makeValidBinarySearchTree() {
		$node1 = new Node('1');
		$node2 = new Node('2');
		$node3 = new Node('3');
		$node4 = new Node('4');
		$node5 = new Node('5');
		$node6 = new Node('6');
		$node7 = new Node('7');

		$node4->setLeft($node2);
		$node4->setRight($node6);
		$node2->setLeft($node1);
		$node2->setRight($node1);
		$node6->setLeft($node5);
		$node6->setLeft($node7);

		return new BinaryTree($node4);
	}

		public function makeInvalidBinarySearchTree() {
		$node1 = new Node('1');
		$node2 = new Node('2');
		$node3 = new Node('3');
		$node4 = new Node('4');
		$node5 = new Node('5');
		$node6 = new Node('6');
		$node7 = new Node('7');

		$node1->setLeft($node2);
		$node1->setRight($node3);
		$node2->setLeft($node4);
		$node2->setRight($node5);
		$node3->setLeft($node6);
		$node3->setRight($node7);

		return new BinaryTree($node1);
	}
}