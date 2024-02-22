<?php
/*
 * @lc app=leetcode id=2390 lang=php
 *
 * [2390] Removing Stars From a String
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeStars($s) {
        $result = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] === '*') {
                array_pop($result);
                continue;
            }
            $result[] = $s[$i];
        }

        return implode($result);
    }
}
// @lc code=end

