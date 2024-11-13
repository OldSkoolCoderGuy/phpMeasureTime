<?php
    $timing = new MeasureTime();
    $timing->timeFormat("%9.4f");

    $timing->addPoint("startloop");
    for($something = 0; $something < 10000; $something++) {
       sleep(0.001);
    }

    $timing->addPoint("startdivide");
    $anumber = 12000;
    while ($anumber > 10) {
        $anumber /= 2;
    }

    $timing->addPoint("alldone");

    echo "Loop   " . $timing->timeDuration('startloop', 'startdivide') . "\n";
    echo "Divide " . $timing->timeDuration('startdivide', 'alldone') . "\n";
    echo "Total  " . $timing->timeDuration('startloop', 'alldone', "%11.6f") . "\n\n";
