<?php
/*
 * @lc app=leetcode id=1493 lang=php
 *
 * [1493] Longest Subarray of 1's After Deleting One Element
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestSubarray($nums) {
        $max = 0;
        $useZero = false;
        $count = 0;
        $length = count($nums);
        for ($i = 0; $i < $length; $i++) {
            if ($nums[$i] === 0) {
                if ($useZero) {
                    while (true) {
                        if ($nums[$i - $count--] === 0) {
                            break;
                        }
                    }
                } else {
                    $useZero = true;
                }
            }
            $count++;

            $max = $count > $max ? $count : $max;
        }

        // 0は除外する
        if ($useZero) $max--;

        return $length === $max ? $max - 1 : $max;
    }
}
// @lc code=end

