<?php

set_include_path('/Users/ellib/interview-practice/general');
include 'classes/node.php';

function isValid($node, $min = 0, $max = 10000) {
	if (!$node) {
		return true;
	}

	if ($node->getValue() > $max || $node->getValue() < $min) {
		return false;
	}
	$left = $node->getLeft();
	$right = $node->getRight();

	return (isValid($left, $min, $node->getValue()) && isValid($right, $node->getValue(), $max));
}

  function isBinarySearchTree($treeRoot, $lowerBound = 0, $upperBound = 100000)
{
    if (!$treeRoot) return true;

    if ($treeRoot->getValue() >= $upperBound || $treeRoot->getValue() <= $lowerBound) {
        return false;
    }

    return isBinarySearchTree($treeRoot->getLeft(), $lowerBound, $treeRoot->getValue()) &&
           isBinarySearchTree($treeRoot->getRight(), $treeRoot->getValue(), $upperBound);

}



//valid

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
$node2->setRight($node3);
$node6->setLeft($node5);
$node6->setRight($node7);

//invalid
$node11 = new Node('1');
$node12 = new Node('2');
$node13 = new Node('3');
$node14 = new Node('4');
$node15 = new Node('5');
$node16 = new Node('6');
$node17 = new Node('7');

$node11->setLeft($node12);
$node11->setRight($node13);
$node12->setLeft($node14);
$node12->setRight($node15);
$node13->setLeft($node16);
$node13->setRight($node17);

print_r(isValid($node4) && !isValid($node11));
print_r(isBinarySearchTree($node4) && !isBinarySearchTree($node11));