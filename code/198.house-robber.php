<?php
/*
 * @lc app=leetcode id=198 lang=php
 *
 * [198] House Robber
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        $answers = [];
        $answers[0] = $nums[0];
        $answers[1] = $nums[1];
        for ($i = 2; $i < count($nums); $i++) {
            $answers[$i] = $nums[$i] + max(array_slice($answers, 0, $i - 1));
        }

        return max($answers);
    }
}
// @lc code=end

