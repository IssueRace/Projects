<?php
class Collatz {
    const MULTIPLIER = 3;
    const ADDITION = 1;
    const DIVISOR = 2;

    public function collatz($n) {
        $max_value = $n;
        $num_of_iteration = 0;
        
        while ($n != 1) {
            if ($n % self::DIVISOR == 0) {
                $n = $n / self::DIVISOR;
            } else {
                $n = self::MULTIPLIER * $n + self::ADDITION;
            }
            $max_value = max($max_value, $n);
            $num_of_iteration++;
        }
        
        return [$num_of_iteration, $max_value];
    }
}

class CollatzHistogram extends Collatz {
    public function collatz_with_range($start, $end) {
        $histogram = [];
        $results = [];
        
        for ($i = $start; $i <= $end; $i++) {
            $result = $this->collatz($i);
            $iterations = $result[0];
            $max_value = $result[1];
            $results[$i] = [$iterations, $max_value];
            
            if (!isset($histogram[$iterations])) {
                $histogram[$iterations] = 0;
            }
            $histogram[$iterations]++;
        }
        
        return [$results, $histogram];
    }
    
    public function print_results($results, $histogram, $start, $end) {
        echo "<h3>Results for Collatz sequence:</h3>";
        echo "<table border='1'><tr><th>Number</th><th>Iterations</th><th>Max Value</th></tr>";
        foreach ($results as $number => $data) {
            echo "<tr><td>$number</td><td>{$data[0]}</td><td>{$data[1]}</td></tr>";
        }
        echo "</table>";
        
        echo "<h3>Statistics for range [$start, $end]:</h3>";
        echo "<table border='1'><tr><th>Iterations</th><th>Count</th></tr>";
        foreach ($histogram as $iter => $count) {
            echo "<tr><td>$iter</td><td>$count</td></tr>";
        }
        echo "</table>";
    }
}
?>