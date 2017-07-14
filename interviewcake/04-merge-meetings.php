<?php

class Meeting
{
    public $startTime = null;
    public $endTime = null;

    public function __construct($startTime, $endTime)
    {
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }
}

function mergeRanges($meetings)
{
    $sortedMeetings = $meetings;
    usort($sortedMeetings, 'sortMeetings');

    $everyoneBusy = array(array_shift($sortedMeetings));

    foreach ($sortedMeetings as $meeting)
    {
        $last_item = $everyoneBusy[count($everyoneBusy) -1];
        if ($meeting->startTime <= $last_item->endTime) {
            array_pop($everyoneBusy);
            $endTime = $meeting->endTime > $last_item->endTime ? $meeting->endTime : $last_item->endTime;
            $merged_meeting = new Meeting($last_item->startTime, $endTime);

            array_push($everyoneBusy, $merged_meeting);
        } else {
            $everyoneBusy[] = $meeting;
        }
    }

    return $everyoneBusy;
}


// usort callback: return 1 if greater th an, -1 if less than or equal
function sortMeetings($a, $b)
{
    return $a->startTime > $b->startTime ? 1: -1;
}

$meetings = array(
    new Meeting(0, 1),
    new Meeting(3, 5), 
    new Meeting(4, 8),
    new Meeting(10, 12),
    new Meeting(9, 10)
    );

print_r(mergeRanges($meetings));