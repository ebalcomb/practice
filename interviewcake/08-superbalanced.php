d<?php

//solution 1: iterative
function isSuperBalanced($root) {
    $depths = array();


    $nodes_and_depths = array(array($root, 0));

    while ($nodes_and_depths) {
        $node_and_depth = array_pop($nodes_and_depths);
        $node = $node_and_depth[0];
        $depth = $node_and_depth[1];
        if (!$node->leftNode && !$node->rightNode) {
            if (array_search($depth, $depths) === false) {
                array_push($depths,$depth);
            }
            if (count($depths) > 2 || abs($depth[0] - $depth[1]) > 1) {
                return false;
            }
        }
        if ($node->leftNode) {
            array_push($nodes_and_depths, array($node->leftNode, $depth + 1));
        }
        if ($node->rightNode) {
            array_push($nodes_and_depths, array($node->rightNode, $depth + 1));
        }
    }

    return true;
}


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
$nodeN->insertRight($nodeO);
$nodeP->insertLeft($nodeQ);

print_r(isSuperBalanced($nodeA) && !isSuperBalanced($nodeI));

