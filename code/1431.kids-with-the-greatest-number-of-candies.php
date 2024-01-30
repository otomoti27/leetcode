<?php
/*
 * @lc app=leetcode id=1431 lang=php
 *
 * [1431] Kids With the Greatest Number of Candies
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies) {
        // my solution
        $max = max($candies);
        $result = [];
        foreach ($candies as $candy) {
            $result[] = $candy + $extraCandies >= $max;
        }
        return $result;

        // e.g.
        // $max = max($candies);
        // return array_map(fn($candy) => $candy + $extraCandies >= $max, $candies);
    }
}
// @lc code=end

