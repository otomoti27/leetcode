<?php
/*
 * @lc app=leetcode id=1143 lang=php
 *
 * [1143] Longest Common Subsequence
 */

// @lc code=start
class Solution {

    /**
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    function longestCommonSubsequence($text1, $text2) {
        $dp = array_fill(0, strlen($text1), array_fill(0, strlen($text2), 0));

        for ($i = 0; $i < strlen($text1); $i++) {
            for ($j = 0; $j < strlen($text2); $j++) {
                if ($text1[$i] == $text2[$j]) {
                    $dp[$i][$j] = ($dp[$i - 1][$j - 1] ?? 0) + 1;
                } else {
                    $dp[$i][$j] = max($dp[$i - 1][$j] ?? 0, $dp[$i][$j - 1] ?? 0);
                }
            }
        }

        return $dp[strlen($text1) - 1][strlen($text2) - 1];
    }
}
// @lc code=end

