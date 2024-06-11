<?php
/*
 * @lc app=leetcode id=875 lang=php
 *
 * [875] Koko Eating Bananas
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $piles
     * @param Integer $h
     * @return Integer
     */
    function minEatingSpeed($piles, $h) {
        $sum = array_sum($piles);
        $low = ceil($sum / $h);
        $high = ceil($sum / ($h - count($piles) + 1));

        while ($low < $high) {
            $mid = floor(($low + $high) / 2);

            $count = 0;
            foreach ($piles as $pile) {
                // ceil(n/k) の合計がhになればok
                $count += ceil($pile / $mid);
                if ($count > $h) {
                    break;
                }
            }

            if ($count <= $h) {
                $high = $mid;
            } else {
                $low = $mid + 1;
            }
        }
        return (int) $low;
    }
}
// @lc code=end

