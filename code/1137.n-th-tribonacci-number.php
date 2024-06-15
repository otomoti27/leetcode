<?php
/*
 * @lc app=leetcode id=1137 lang=php
 *
 * [1137] N-th Tribonacci Number
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function tribonacci($n) {
        $answers = [0, 1, 1];
        for ($i = 0; $i <= $n; $i++) {
            $answers[$i + 3] = $answers[$i] + $answers[$i + 1] + $answers[$i + 2];
        }

        return $answers[$n];
    }
}
// @lc code=end

