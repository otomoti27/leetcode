<?php
/*
 * @lc app=leetcode id=790 lang=php
 *
 * [790] Domino and Tromino Tiling
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function numTilings($n) {
        $mod = 10 ** 9 + 7;
        $answers = [1,2,5];
        for ($i = 3; $i < $n; $i++) {
            $answers[$i] = ($answers[$i - 1] * 2 + $answers[$i - 3]) % $mod;
        }

        return $answers[$n - 1];

        // ↑↑1式にまとめたもの
        // $dp = [1,1,2];
        // $dpl = [0,0,2];
        // for ($i = 3; $i <= $n; $i++) {
        //     $dp[$i] = ($dp[$i - 1] + $dp[$i - 2] + $dpl[$i - 1]) % $mod;
        //     $dpl[$i] = ($dpl[$i - 1] + 2 * $dp[$i - 2]) % $mod;
        // }
        // return $dp[$n];
    }
}
// @lc code=end

