<?php

//solution 1: recursive
function isSuperBalanced($node)
{
    echo "checking node " . $node->value . "....";
    $depths = getLeafDepths($node);
    if ($depths) {
        echo "node balanced at depths: ";
        print_r($depths);
        return;
    }
    echo "node not balanced.";
    return;
}

function getLeafDepths($node, $currentDepth = 1)
{
    $depths = array();
    // if its a leaf, return an array with it's depth pass up its depth
    if (!$node->leftNode && !$node->rightNode) {
        return array($currentDepth);
    }
    // otherwise it's not a leaf, in which case run it through recursively until it is.
    if ($node->leftNode) {
        $leftDepths = getLeafDepths($node->leftNode, $currentDepth + 1);
        $depths = $leftDepths ? array_unique(array_merge((array)$depths, $leftDepths)) : false;
    }

    if ($node->rightNode) {
        $rightDepths = getLeafDepths($node->rightNode, $currentDepth + 1);
        $depths = $rightDepths ? array_unique(array_merge((array)$depths, $rightDepths)) : false;
    }

    if (!$depths) {
        return false;
    }
    if (count($depths) < 2) {
        return $depths;
    }
    if (count($depths) > 2) {
        return false;
    }
    if (abs($depths[0] - $depths[1]) > 1) {
        return false;
    }
    return $depths;
}

// ******************************************************
// solution 2: iterative


// ******************************************************
//binary class
class BinaryNode
{
    public $value;
    public $leftNode;
    public $rightNode;

    public function __construct($value, $leftNode = null, $rightNode = null)
    {
        $this->value = $value;
        $this->leftNode = $leftNode;
        $this->rightNode = $rightNode;
    }

    public function insertLeft($node)
    {
        $this->leftNode = $node;
    }

    public function insertRight($node)
    {
        $this->rightNode = $node;
    }
}

//make nodes
$nodeA = new BinaryNode('A');
$nodeB = new BinaryNode('B');
$nodeC = new BinaryNode('C');
$nodeD = new BinaryNode('D');
$nodeE = new BinaryNode('E');
$nodeF = new BinaryNode('F');
$nodeG = new BinaryNode('G');
$nodeH = new BinaryNode('H');
$nodeI = new BinaryNode('I');
$nodeJ = new BinaryNode('J');
$nodeK = new BinaryNode('K');
$nodeL = new BinaryNode('L');
$nodeM = new BinaryNode('M');
$nodeN = new BinaryNode('N');
$nodeO = new BinaryNode('O');
$nodeP = new BinaryNode('P');
$nodeQ = new BinaryNode('Q');

//tree root $nodeA, depths = 3, 4
$nodeA->insertLeft($nodeB);
$nodeA->insertRight($nodeC);
$nodeB->insertLeft($nodeD);
$nodeB->insertRight($nodeE);
$nodeC->insertLeft($nodeF);
$nodeF->insertLeft($nodeG);
$nodeF->insertRight($nodeH);
// $nodeH->insertLeft($nodeI);

//tree root $nodeI, depths = 3, 4
$nodeI->insertLeft($nodeJ);
$nodeI->insertRight($nodeK);
$nodeJ->insertLeft($nodeL);
$nodeJ->insertRight($nodeM);
$nodeL->insertLeft($nodeP);
$nodeK->insertLeft($nodeN);
$nodeO->insertRight($nodeO);
$nodeP->insertLeft($nodeQ);


// run solution 1
isSuperBalanced($nodeA);
isSuperBalanced($nodeI);
