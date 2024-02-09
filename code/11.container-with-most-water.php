<?php
/*
 * @lc app=leetcode id=11 lang=php
 *
 * [11] Container With Most Water
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $i = 0;
        $j = count($height) - 1;
        $result = 0;
        while ($i < $j) {
            $x = $j - $i;
            $y = min($height[$i], $height[$j]);
            $result = max($result, $x * $y);

            if ($height[$i] <= $height[$j]) {
                $i++;
            } else {
                $j--;
            }
        }

        return $result;
    }
}
// @lc code=end

