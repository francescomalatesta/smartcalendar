<?php
	include('includes/database.inc.php');
    include('libs/WolframAlphaEngine.php');

    // process date from this format: "8:00 pm CET  |  Monday, December 8, 2014"
    // to this format: "YYYY-mm-dd H:i:s"
    // we will assume s = 00
    function processResponse($dataString)
    {
        $date = explode('|', $dataString);
        return date('Y-m-d', strtotime($date[1])).' '.date('H:i:s', strtotime($date[0]));
    }

    function getExactDateWithWolframAlpha()
    {
        $appID = 'W99JQG-K4P9RJUPA4';

        $wolframEngine = new WolframAlphaEngine($appID);
        $response = $wolframEngine->getResults($_POST['happens_at'], array());

        foreach($response->getPods() as $pod)
        {
            if($pod->attributes['id'] == 'Result')
            {
                foreach($pod->getSubpods() as $subpod)
                {
                    if($subpod->attributes['primary'] == true)
                    {
                        return processResponse($subpod->plaintext);
                    }
                }
            }
        }
    }

	$event = new Event;

	$event->name = $_POST['name'];
	$event->notes = $_POST['notes'];
	$event->happens_at = getExactDateWithWolframAlpha();

	$event->save();

	header('Location: index.php');