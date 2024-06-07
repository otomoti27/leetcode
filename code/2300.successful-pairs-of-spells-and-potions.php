<?php
/*
 * @lc app=leetcode id=2300 lang=php
 *
 * [2300] Successful Pairs of Spells and Potions
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $spells
     * @param Integer[] $potions
     * @param Integer $success
     * @return Integer[]
     */
    function successfulPairs($spells, $potions, $success) {
        sort($potions);
        $result = [];
        for ($i = 0; $i < count($spells); $i++) {
            $count = 0;

            $low = 0;
            $high = count($potions) - 1;
            while ($low <= $high) {
                $mid = floor(($low + $high) / 2);

                if ($potions[$mid] * $spells[$i] < $success) {
                    $low = $mid + 1;
                } else {
                    $count += $high - $mid + 1;
                    $high = $mid - 1;
                }
            }

            $result[$i] = $count;
        }

        return $result;
    }
}
// @lc code=end

