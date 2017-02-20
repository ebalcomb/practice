<?php

function loveRectangle($rectangle1, $rectangle2)
{
    $loveRectangle = array();
    $noLove = 'no love!';

    $leftRectangle = $rectangle1;
    $rightRectangle = $rectangle2;
    $bottomRectangle = $rectangle1;
    $topRectangle = $rectangle2;

    if ($rectangle1['leftX'] > $rectangle2['leftX']) {
        $leftRectangle = $rectangle2;
        $rightRectangle = $rectangle1;
    }

    if ($rectangle1['bottomY'] > $rectangle2['bottomY']) {
        $bottomRectangle = $rectangle2;
        $topRectangle = $rectangle1;
    }

    $leftRectangle['rightX'] = $leftRectangle['leftX'] + $leftRectangle['width'];
    if ($leftRectangle['rightX'] <= $rightRectangle['leftX']) {
        return $noLove;
    }
    
    $loveRectangle['leftX'] = $rightRectangle['leftX'];
    $loveRectangle['width'] = abs($leftRectangle['rightX'] - $rightRectangle['leftX']);

    $bottomRectangle['topY'] = $bottomRectangle['bottomY'] + $bottomRectangle['height'];
    if ($bottomRectangle['topY'] <= $topRectangle['bottomY']) {
        return $noLove;
    }

    $loveRectangle['bottomY'] = $topRectangle['bottomY'];
    $loveRectangle['height'] = abs($bottomRectangle['topY'] - $topRectangle['bottomY']);
    return $loveRectangle;
}

echo "case 1: positive rectangles";
$rectangleA = array(
    'leftX' => 1,
    'bottomY' => 1,
    'width' => 2,
    'height' =>3
    );

$rectangleB = array(
    'leftX' => 2,
    'bottomY' => 2,
    'width' => 4,
    'height' => 3
    );

$loveRectangle = array(
    'leftX' => 2,
    'bottomY' => 2,
    'width' => 1,
    'height' => 2
    );

print_r($loveRectangle);
print_r(loveRectangle($rectangleA, $rectangleB));


echo "case 2: negative rectangles";
$rectangleA = array(
    'leftX' => -3,
    'bottomY' => -3,
    'width' => 3,
    'height' => 3
    );

$rectangleB = array(
    'leftX' => -4,
    'bottomY' => -4,
    'width' => 2,
    'height' => 3
    );

$loveRectangle = array(
    'leftX' => -3,
    'bottomY' => -3,
    'width' => 1,
    'height' => 2
    );

print_r($loveRectangle);
print_r(loveRectangle($rectangleA, $rectangleB));

echo "case 3: no overlap";
$rectangleA = array(
    'leftX' => -2,
    'bottomY' => -2,
    'width' => 1,
    'height' => 1
    );

$rectangleB = array(
    'leftX' => 4,
    'bottomY' => 4,
    'width' => 2,
    'height' => 3
    );

print_r('no love!');
print_r(loveRectangle($rectangleA, $rectangleB));

echo "case 4: full overlap";
$rectangleA = array(
    'leftX' => 1,
    'bottomY' => 1,
    'width' => 1,
    'height' => 1
    );

$rectangleB = array(
    'leftX' => 1,
    'bottomY' => 1,
    'width' => 2,
    'height' => 3
    );

print_r($rectangleA);
print_r(loveRectangle($rectangleA, $rectangleB));

