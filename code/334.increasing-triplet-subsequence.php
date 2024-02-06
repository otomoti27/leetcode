<?php
/*
 * @lc app=leetcode id=334 lang=php
 *
 * [334] Increasing Triplet Subsequence
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function increasingTriplet($nums) {
        // e.g.
        $length = count($nums);

        if ($length < 3) return false;

        $smallest = $secondSmallest = PHP_INT_MAX;

        foreach ($nums as $num) {
            if ($num <= $smallest) {
                $smallest = $num;
            } elseif ($num <= $secondSmallest) {
                $secondSmallest = $num;
            } else {
                return true;
            }
        }
        return false;
    }
}
// @lc code=end

