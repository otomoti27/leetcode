<?php
/*
 * @lc app=leetcode id=1207 lang=php
 *
 * [1207] Unique Number of Occurrences
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function uniqueOccurrences($arr) {
        // my solution
        $countMap = array_count_values($arr);
        $processed = [];
        foreach ($countMap as $count) {
            if (in_array($count, $processed)) {
                return false;
            }
            $processed[] = $count;
        }
        return true;

        // e.g.
        // $map = array_count_values($arr);
        // return count(array_unique($map)) === count($map);
    }
}
// @lc code=end

