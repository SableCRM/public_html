<?php

function AlarmEvents($eventhistories)
{
    if($eventhistories)
    {
        foreach($eventhistories as $eventhistory)
        {
            if(trim($eventhistory->zonestate_id) == 'A')
            {
                if(is_numeric(trim($eventhistory->zone_id)))
                {
                    $signal[trim($eventhistory->zone_id)] = trim($eventhistory->zonestate_id);
                }
            }
        }
    }

    return $signal;
}