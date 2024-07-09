<?php
/*
 * @lc app=leetcode id=136 lang=php
 *
 * [136] Single Number
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        $count = array_count_values($nums);
        return array_search(1, $count);

        // e.g.
        // $result = 0;
        // foreach ($nums as $num) {
        //     $result ^= $num;
        // }
        // return $result;
    }
}
// @lc code=end

