<?php
/*
 * @lc app=leetcode id=338 lang=php
 *
 * [338] Counting Bits
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function countBits($n) {
        // $ans = [0, 1];
        // if ($n == 0) {
        //     return [0];
        // }
        // if ($n == 1) {
        //     return $ans;
        // }

        // $range = 0;
        // $group = range(2 ** ($range), 2 ** ($range + 1) - 1);
        // for ($i = 2; $i <= $n; $i++) {
        //     if (!in_array($i, $group)) {
        //         $range++;
        //         $group = range(2 ** $range, 2 ** ($range + 1) - 1);
        //     }

        //     $ans[$i] = $ans[array_search($i, $group)] + 1;
        // }

        // return $ans;

        // e.g.
        $ans = array_fill(0, $n + 1, 0);
        $offset = 1;
        for ($i = 1; $i <= $n; $i++) {
            if ($i == $offset * 2) {
                $offset *= 2;
            }

            $ans[$i] = $ans[$i - $offset] + 1;
        }

        return $ans;
    }
}
// @lc code=end