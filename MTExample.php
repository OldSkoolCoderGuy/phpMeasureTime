<?php
    include_once 'MeasureTime.php';
    
    // Load Class
    $timing = new MeasureTime();
    // Set output format
    $timing->timeFormat("%9.4f");

    // Add a timing point
    $timing->addPoint("startloop");
    for($something = 0; $something < 10000; $something++) {
       sleep(0.001);
    }
    
    // Add another timing point
    $timing->addPoint("startdivide");
    $anumber = 1.23456e+32;
    while ($anumber > 1) {
        $anumber /= 2;
    }
    // Add a final point
    $timing->addPoint("alldone");

    // No output format 
    echo "Loop   " . $timing->timeDuration('startloop', 'startdivide', null) . "\n";
    // Use default format specified earlier
    echo "Divide " . $timing->timeDuration('startdivide', 'alldone') . "\n";
    // Use this format for output
    echo "Total  " . $timing->timeDuration('startloop', 'alldone', "%11.6f") . "\n\n";
    
    // Clean up / dlear all points
    $timing->reset();
