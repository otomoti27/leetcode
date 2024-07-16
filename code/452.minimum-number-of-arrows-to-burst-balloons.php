<?php
/*
 * @lc app=leetcode id=452 lang=php
 *
 * [452] Minimum Number of Arrows to Burst Balloons
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function findMinArrowShots($points) {
        usort($points, fn($a, $b) => $a[1] - $b[1]);

        $result = 1;
        $start = $points[0][0];
        $end = $points[0][1];
        for ($i = 1; $i < count($points); $i++) {
            if ($points[$i][0] <= $end) {
                // 重なっている部分を更新
                if ($points[$i][0] > $start) {
                    $start = $points[$i][0];
                }
            } else {
                // ずれたので次の矢が必要
                $result++;
                $start = $points[$i][0];
                $end = $points[$i][1];
            }
        }

        return $result;
    }
}
// @lc code=end

