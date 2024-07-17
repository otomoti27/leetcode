<?php
/*
 * @lc app=leetcode id=739 lang=php
 *
 * [739] Daily Temperatures
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $temperatures
     * @return Integer[]
     */
    function dailyTemperatures($temperatures) {
        // O(n^2)
        // $answer = array_fill(0, count($temperatures), 0);

        // for ($i = 0; $i < count($temperatures); $i++) {
        //     $t = $temperatures[$i];

        //     for ($j = $i + 1; $j < count($temperatures); $j++) {
        //         if ($temperatures[$j] > $t) {
        //             $answer[$i] = $j - $i;
        //             break;
        //         }
        //     }
        // }

        // return $answer;

        $answer = array_fill(0, count($temperatures), 0);
        $stack = [];
        for ($i = 0; $i < count($temperatures); $i++) {
            while (!empty($stack) && $temperatures[end($stack)] < $temperatures[$i]) {
                $j = array_pop($stack);
                $answer[$j] = $i - $j;
            }

            $stack[] = $i;
        }

        return $answer;
    }
}
// @lc code=end

