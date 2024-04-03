<?php
/*
 * @lc app=leetcode id=1466 lang=php
 *
 * [1466] Reorder Routes to Make All Paths Lead to the City Zero
 */

// @lc code=start
class Solution {
    private $count = 0;
    /**
     * @param Integer $n
     * @param Integer[][] $connections
     * @return Integer
     */
    function minReorder($n, $connections) {
        $visited = [];
        $graph = [];
        for ($i = 0; $i < $n; $i++) {
            $graph[] = [];
        }
        foreach ($connections as $connection) {
            $graph[$connection[0]][] = $connection[1];
            $graph[$connection[1]][] = -$connection[0];
        }

        $this->helper($graph, $visited, 0);
        return $this->count;
    }

    function helper($graph, &$visited, $from) {
        $visited[$from] = true;
        foreach ($graph[$from] as $to) {
            if (!$visited[abs($to)]) {
                if ($to > 0) $this->count++;
                $this->helper($graph, $visited, abs($to));
            }
        }
    }
}
// @lc code=end

