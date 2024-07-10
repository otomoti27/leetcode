<?php
/*
 * @lc app=leetcode id=1318 lang=php
 *
 * [1318] Minimum Flips to Make a OR b Equal to c
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $a
     * @param Integer $b
     * @param Integer $c
     * @return Integer
     */
    function minFlips($a, $b, $c) {
        $flip = 0;

        // 一桁ずつ反転が必要か確認する
        while ($a > 0 || $b > 0 || $c > 0) {
            if ($c & 1) {
                if (!($a & 1 || $b & 1)) {
                    $flip++;
                }
            } else {
                if ($a & 1) {
                    $flip++;
                }
                if ($b & 1) {
                    $flip++;
                }
            }

            $a >>= 1;
            $b >>= 1;
            $c >>= 1;
        }

        return $flip;
    }
}
// @lc code=end

