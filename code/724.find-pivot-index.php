<?php
/*
 * @lc app=leetcode id=724 lang=php
 *
 * [724] Find Pivot Index
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function pivotIndex($nums) {
        $leftSum = 0;
        $rightSum = array_sum($nums) - $nums[0];
        if ($leftSum === $rightSum) return 0;

        for ($i = 1; $i < count($nums); $i++) {
            $leftSum += $nums[$i - 1];
            $rightSum -= $nums[$i];

            if ($leftSum === $rightSum) return $i;
        }

        return -1;
    }
}
// @lc code=end

