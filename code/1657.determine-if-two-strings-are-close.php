<?php
/*
 * @lc app=leetcode id=1657 lang=php
 *
 * [1657] Determine if Two Strings Are Close
 */

// @lc code=start
class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return Boolean
     */
    function closeStrings($word1, $word2) {
        $countMap1 = array_count_values(str_split($word1));
        $countMap2 = array_count_values(str_split($word2));
        if (!empty(array_diff($countMap1, $countMap2))) return false;
        if (!empty(array_diff($countMap2, $countMap1))) return false;

        $keyMap1 = array_keys($countMap1);
        $keyMap2 = array_keys($countMap2);
        if (!empty(array_diff($keyMap1, $keyMap2))) return false;
        if (!empty(array_diff($keyMap2, $keyMap1))) return false;

        $countMap1 = array_values($countMap1);
        $countMap2 = array_values($countMap2);
        sort($countMap1);
        sort($countMap2);
        return $countMap1 == $countMap2;
    }
}
// @lc code=end

