<?php
/*
 * @lc app=leetcode id=62 lang=php
 *
 * [62] Unique Paths
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n) {
        $maxRightCount = $m - 1;
        $maxDownCount = $n - 1;

        // $maxR + $maxD C $maxR;
        $maxCount = $maxRightCount + $maxDownCount;
        $min = min($maxRightCount, $maxDownCount);

        $a = 1;
        for ($i = $maxCount; $i > $maxCount - $min; $i--) {
            $a *= $i;
        }
        $b = 1;
        for ($i = 1; $i <= $min; $i++) {
            $b *= $i;
        }

        return (int) ($a / $b);


        // e.g. DP
        // $dp = array_fill(0, $m, array_fill(0, $n, 0));

        // // 最終行は右の1方向のみ
        // for ($j = 0; $j < $n; $j++) {
        //     $dp[$m - 1][$j] = 1;
        // }
        // // 最終列は下の1方向のみ
        // for ($i = 0; $i < $m; $i++) {
        //     $dp[$i][$n - 1] = 1;
        // }

        // // 右下から左上まで分割して計算する
        // for ($i = $m - 2; $i >= 0; $i--) {
        //     for ($j = $n - 2; $j >= 0; $j--) {
        //         $dp[$i][$j] = $dp[$i + 1][$j] + $dp[$i][$j + 1];
        //     }
        // }

        // return $dp[0][0];
    }
}
// @lc code=end

