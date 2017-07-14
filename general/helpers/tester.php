<?php

set_include_path('/Users/ellib/interview-practice');
include 'general/helpers/builder.php';

class Tester {
	public $builder;

	public function reportResult($function_name, $expected, $actual) {
		echo "***********\n";

		$outcome = $expected === $actual ? "PASSED" : "FAILED";
		echo $function_name . ": " . $outcome . "\n";

		if (!($expected === $actual)) {
			echo "EXPECTED: \n";
			var_dump($expected);
			echo "ACTUAL: \n";
			var_dump($actual);
		}
		echo "***********\n";
	}

	public function __construct() {
		$this->builder = new Builder();
	}

	public function testBreadthFirstSearch() {
		$alphabetTree = $this->builder->makeAlphabetTree();
		$actual = $alphabetTree->breadthFirstSearch();
		$expected = array("A", "B", "C", "D", "E", "F", "G");
		$this->reportResult(__FUNCTION__, $expected, $actual);
	}

	public function testDepthFirstSearch() {
		$alphabetTree = $this->builder->makeAlphabetTree();
		$actual = $alphabetTree->depthFirstSearch();
		$expected = array("A", "B", "D", "E", "C", "F", "G");
		$this->reportResult(__FUNCTION__, $expected, $actual);
	}

	public function testLinkedList() {
		$node1 = new Node("1");
		$node2 = new Node("2");
		$node3 = new Node("3");
		$node4 = new Node("4");
		$node5 = new Node("5");
		$node6 = new Node("6");
		$node7 = new Node("7");
		$node8 = new Node("8");
		$node9 = new Node("9");
		$node10 = new Node("10");
		$node11 = new Node("11");
		$node12 = new Node("12");
		$node13 = new Node("13");
		$node14 = new Node("14");
		$node15 = new Node("15");
		$linkedList = new LinkedList(array($node1, $node2, $node3, $node4, $node5, $node6, $node7, $node8, $node9, $node10, $node11, $node12, $node13, $node14, $node15));
		// $node7, $node8, $node9, $node10, $node11

		$root= $linkedList->getBalancedTree();
		$tree = new BinaryTree($root);
		return $tree->breadthFirstSearch();
		// return $tree->breadthFirstSearch();
	}
}

$tester = new Tester();

// print_r($tester->testBreadthFirstSearch());
// print_r($tester->testDepthFirstSearch());
print_r($tester->testLinkedList());








