<?php
/*
 * @lc app=leetcode id=1732 lang=php
 *
 * [1732] Find the Highest Altitude
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $gain
     * @return Integer
     */
    function largestAltitude($gain) {
        $max = 0;
        $current = 0;
        foreach ($gain as $val) {
            $current += $val;
            $max = $current > $max ? $current : $max;
        }
        return $max;
    }
}
// @lc code=end

