<?php
/*
 * @lc app=leetcode id=238 lang=php
 *
 * [238] Product of Array Except Self
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums) {
        // e.g.
        $count = count($nums);
        $result = array_fill(0, $count, 1);

        $leftProduct = 1;
        for ($i = 0; $i < $count; $i++) {
            $result[$i] *= $leftProduct;
            $leftProduct *= $nums[$i];
        }

        $rightProduct = 1;
        for ($i = $count - 1; $i >= 0; $i--) {
            $result[$i] *= $rightProduct;
            $rightProduct *= $nums[$i];
        }
        return $result;
    }
}
// @lc code=end

