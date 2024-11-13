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
    $timing->addPoint("startanother");
    for($something = 0; $something < 2500; $something++) {
       sleep(0.0025);
    }
    
    // Add a final point
    $timing->addPoint("alldone");

    // No output format 
    echo "Loop   " . $timing->timeDuration('startloop', 'startanother', null) . "\n";
    
    // Use default format specified earlier
    echo "Divide " . $timing->timeDuration('startanother', 'alldone') . "\n";
    
    // Use a different format for output
    echo "Total  " . $timing->timeDuration('startloop', 'alldone', "%11.6f") . "\n\n";
    
    // Clean up / dlear all points
    $timing->reset();
