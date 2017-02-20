<?php

class TempTracker {

    private $mode = array('temp' => null, 'times' => 0);
    private $sum = 0;
    private $count = 0;
    private $max = null;
    private $min = null;

    private $temps = array();

    public function insert($temp)
    {
        $this->sum += $temp;
        $this->count += 1;
        $this->mean = $this->sum / $this->count;
        if (!$this->max || ($temp > $this->max)) {
            $this->max = $temp;
        }
        if (!$this->min || ($temp < $this->min)) {
            $this->min = $temp;
        }

        $this->temps[$temp] = $this->temps[$temp] ? $this->temps[$temp] + 1 : 1;

        if ($this->temps[$temp] > $this->mode['times']) {
            $this->mode['temp'] = $temp;
            $this->mode['times'] = $this->temps[$temp];
        }
    }

    public function getMax()
    {
        return $this->max;
    }

    public function getMin()
    {
        return $this->min;
    }

    public function getMean()
    {
        return $this->mean;
    }

    public function getMode()
    {
        return $this->mode['temp'];
    }
}

$tempTracker = new TempTracker();

$tempTracker->insert(100);
$tempTracker->insert(100);
$tempTracker->insert(90);
$tempTracker->insert(90);
$tempTracker->insert(90);
$tempTracker->insert(130);

echo "mean: " . $tempTracker->getMean();
echo ", mode: " . $tempTracker->getMode();
echo ", max: " . $tempTracker->getMax();
echo ", min: " . $tempTracker->getMin();
