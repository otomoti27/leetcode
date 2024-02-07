<?php
/*
 * @lc app=leetcode id=283 lang=php
 *
 * [283] Move Zeroes
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        // my solution
        foreach ($nums as $key => $num) {
            if ($num === 0) {
                unset($nums[$key]);
                $nums[] = 0;
            }
        }

        // e.g.
        // $writeIndex = 0;
        // for ($i = 0; $i < count($nums); $i++) {
        //     if ($nums[$i] !== 0) {
        //         // 0と0以外の数を入れ替える
        //         [$nums[$writeIndex], $nums[$i]] = [$nums[$i], $nums[$writeIndex]];
        //         $writeIndex++;
        //     }
        // }
    }
}
// @lc code=end
