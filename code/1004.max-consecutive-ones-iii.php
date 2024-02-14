<?php
/*
 * @lc app=leetcode id=1004 lang=php
 *
 * [1004] Max Consecutive Ones III
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function longestOnes($nums, $k) {
        $max = $k;
        $length = $k;
        $current = array_sum(array_slice($nums, 0, $k));
        $useZero = $k - $current;
        for ($i = $k; $i < count($nums); $i++) {
            if ($nums[$i] !== 1) {
                if ($useZero == $k) {
                    // windowから最初の0までを削除する
                    $left = $i - $length;
                    while (true) {
                        if ($nums[$left] == 1) {
                            $length--;
                            $left++;
                        } else {
                            $length--;
                            break;
                        }
                    }
                } else {
                    $useZero++;
                }
            }

            $length++;

            $max = $length > $max ? $length : $max;
        }

        return $max;
    }
}
// @lc code=end

