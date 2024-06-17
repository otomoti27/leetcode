<?php
/*
 * @lc app=leetcode id=746 lang=php
 *
 * [746] Min Cost Climbing Stairs
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $cost
     * @return Integer
     */
    function minCostClimbingStairs($cost) {
        $answers = [];
        $answers[count($cost)] = 0;
        $answers[count($cost) + 1] = 0;
        for ($i = count($cost) - 1; $i >= 0; $i--) {
            $answers[$i] = $cost[$i] + min($answers[$i + 1], $answers[$i + 2]);
        }

        return min($answers[0], $answers[1]);
    }
}
// @lc code=end

