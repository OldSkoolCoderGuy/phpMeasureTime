<?php
/**
 * Description of MeasureTime
 *   A performance measuring class for code
 *
 * Author
 *   OldSkoolCoderGuy
 * 
 */
class MeasureTime {
    // Variable to store time data points
    private     $slots = [];
    private     $format = null;
    
    public function __construct()
    {
        //Set start time
        $this->slots[0] = microtime(true);
    }
    
    public function addPoint($key)
    {
        // Can't use starting slot 
        if ($key !== 0) {
            $this->slots[$key] = microtime(true);
        } else {
            // Return false for error
            return (false);
        }
    }

    public function reset()
    {
        // Clear time slots
        $this->slots = [];
        $this->slots[0] = microtime(true);
    }
    
    public function timeDuration($from, $to, $format = null)
    {
        // Do the keys requested exist
        if (! array_key_exists($from, $this->slots) || !array_key_exists($to, $this->slots)) {
            return (false);
        }
        // Return an absolute value as keys could be swapped
        $duration = abs((float) $this->slots[$from] - $this->slots[$to]);
        // If format not specified check for default
        $outformat = $format ?? $this->format;
        return (empty($outformat) ? duration : sprintf($outformat, $duration));
    }
    
    public function timeFormat($format) {
        //Set a default format for timeDuration output. Using sprintf.
        $this->format = $format;
    }
    
    public function dataPoints() {
        // Return array of time data points
        return ($this->slots);
    }

    public function __destruct()
    {
        // Do clean up
        $this->slots = [];
    }
    
}
