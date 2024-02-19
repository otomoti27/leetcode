<?php
/*
 * @lc app=leetcode id=2215 lang=php
 *
 * [2215] Find the Difference of Two Arrays
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[][]
     */
    function findDifference($nums1, $nums2) {
        return [
            array_unique(array_diff($nums1, $nums2)),
            array_unique(array_diff($nums2, $nums1)),
        ];
    }
}
// @lc code=end

