<?php
/*
 * @lc app=leetcode id=162 lang=php
 *
 * [162] Find Peak Element
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums) {
        $length = count($nums);
        if ($nums[0] > $nums[1]) {
            return 0;
        }
        if ($nums[$length - 1] > $nums[$length -1 - 1]) {
            return $length -1;
        }

        $low = 0;
        $high = $length - 1;
        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);

            // mid がpeakの場合
            if ($nums[$mid] > $nums[$mid - 1] && $nums[$mid] > $nums[$mid + 1]) {
                return $mid;
            }

            // 左右にmidより大きい値があるか
            if ($mid != $low && max(array_slice($nums, $low, $mid - $low + 1)) > $nums[$mid]) {
                $high = $mid - 1;
            } elseif ($mid != $high && max(array_slice($nums, $mid, $high - $mid + 1)) > $nums[$mid]) {
                $low = $mid + 1;
            } else {
                break;
            }
        }

        // low == highの場合チェックされないため最後にチェック
        if ($nums[$low] > $nums[$low - 1] && $nums[$low] > $nums[$low + 1]) {
            return $low;
        }

        return -1;
    }
}
// @lc code=end

