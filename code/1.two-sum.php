<?php
/*
 * @lc app=leetcode id=1 lang=php
 *
 * [1] Two Sum
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        // my solution
        foreach($nums as $key => $value) {
            $diff = $target - $value;

            // キーを取得
            $diffKey = array_search($diff, $nums);
            // キーが存在し、自分自身でない場合
            if ($diffKey !== false && $diffKey !== $key) {
                return [$key, $diffKey];
            }
        }
        return [];

        // e.g O(n^2)
        // $n = count($nums);
        // for ($i = 0; $i < $n; $i++) {
        //     for ($j = $i + 1; $j < $n; $j++) {
        //         if ($nums[$i] + $nums[$j] === $target) {
        //             return [$i, $j];
        //         }
        //     }
        // }

        // e.g O(n)
        // $numToIndex = []; // Create an empty associative array to store numbers and their indices
        // foreach ($nums as $i => $num) {
        //     $complement = $target - $num;
        //     if (array_key_exists($complement, $numToIndex)) {
        //         return [$numToIndex[$complement], $i];
        //     }
        //     $numToIndex[$num] = $i; // Store the current number and its index in the associative array
        // }

    }
}
// @lc code=end

