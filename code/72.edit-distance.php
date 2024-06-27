<?php
/*
 * @lc app=leetcode id=72 lang=php
 *
 * [72] Edit Distance
 */

// @lc code=start
class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance($word1, $word2) {
        $m = strlen($word1);
        $n = strlen($word2);

        $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

        for ($i = 1; $i <= $m; $i++) {
            $dp[$i][0] = $i;
        }
        for ($j = 1; $j <= $n; $j++) {
            $dp[0][$j] = $j;
        }

        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($word1[$i - 1] == $word2[$j - 1]) {
                    // 一致するなら変更なし
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } else {
                    // 置換、削除、追加の最小値
                    $dp[$i][$j] = min($dp[$i - 1][$j - 1], $dp[$i - 1][$j], $dp[$i][$j - 1]) + 1;
                }
            }
        }

        return $dp[$m][$n];
    }
}
// @lc code=end

