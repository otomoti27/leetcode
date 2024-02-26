<?php
/*
 * @lc app=leetcode id=394 lang=php
 *
 * [394] Decode String
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function decodeString($s) {
        $pattern = '/(\d+)\[(\w+)\]/';
        $matches = [];
        while (preg_match($pattern, $s, $matches)) {
            $s = preg_replace('/\d+\[\w+\]/', str_repeat($matches[2], $matches[1]), $s, 1);
        }

        return $s;
    }
}
// @lc code=end

