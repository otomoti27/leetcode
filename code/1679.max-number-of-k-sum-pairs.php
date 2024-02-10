<?php
/*
 * @lc app=leetcode id=1679 lang=php
 *
 * [1679] Max Number of K-Sum Pairs
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxOperations($nums, $k) {
        // my solution
        $result = 0;
        $processed = [];
        $countedArray = array_count_values($nums);
        foreach ($countedArray as $num => $count) {
            if (in_array($num, $processed)) continue;

            if ($num == $k - $num) {
                $result += floor($countedArray[$num] / 2);
                $processed[] = $num;
            } else {
                $result += min($count, $countedArray[$k - $num]);
                $processed[] = $num;
                $processed[] = $k - $num;
            }
        }
        return $result;

        // e.g. two pointer
        // sort($nums);
        // $left = 0;
        // $right = count($nums) - 1;
        // $pair = 0;
        // while ($left < $right) {
        //     $sum = $nums[$left] + $nums[$right];
        //     if ($sum == $k) {
        //         $pair++;
        //         $left++;
        //         $right--;
        //     } elseif ($k > $sum) {
        //         $left++;
        //     } else {
        //         $right--;
        //     }
        // }
        // return $pair;
    }
}
// @lc code=end

