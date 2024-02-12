<?php
/*
 * @lc app=leetcode id=643 lang=php
 *
 * [643] Maximum Average Subarray I
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Float
     */
    function findMaxAverage($nums, $k) {
        // e.g. Time O(n)
        $sum = array_sum(array_slice($nums, 0, $k));
        $max = $sum;

        for ($i = 1; $i <= count($nums) - $k; $i++) {
            // 毎回配列を作成するとコストがかかるので前後の要素をスライドさせる
            $sum = $sum - $nums[$i - 1] + $nums[$i + $k - 1];
            if ($sum > $max) {
                $max = $sum;
            }
        }
        return $max / $k;
    }
}
// @lc code=end

