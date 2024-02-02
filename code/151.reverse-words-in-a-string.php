<?php
/*
 * @lc app=leetcode id=151 lang=php
 *
 * [151] Reverse Words in a String
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        $result = "";
        foreach (array_reverse(explode(" ", trim($s))) as $value) {
            if (trim($value) !== "" ) {
                $result .= $value. ' ';
            }
        }
        return rtrim($result);
    }
}
// @lc code=end

