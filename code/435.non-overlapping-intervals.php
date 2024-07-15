<?php
/*
 * @lc app=leetcode id=435 lang=php
 *
 * [435] Non-overlapping Intervals
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function eraseOverlapIntervals($intervals) {
        // e.g.
        if (empty($intervals)) return 0;

        usort($intervals, function($a, $b) {
            return $a[1] - $b[1];
        });

        $result = 0;
        $end = $intervals[0][1];

        for ($i = 1; $i < count($intervals); $i++) {
            // 現在のendよりstartが小さければoverlap
            if ($intervals[$i][0] < $end) {
                $result++;
            } else {
                $end = $intervals[$i][1];
            }
        }

        return $result;
    }
}
// @lc code=end

