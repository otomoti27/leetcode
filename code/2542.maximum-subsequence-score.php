<?php
/*
 * @lc app=leetcode id=2542 lang=php
 *
 * [2542] Maximum Subsequence Score
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer
     */
    function maxScore($nums1, $nums2, $k) {
        $n = count($nums1);

        $pairs = [];
        for ($i = 0; $i < $n; $i++) {
            $pairs[$i] = [$nums1[$i], $nums2[$i]];
        }

        // $nums2の降順でソート
        usort($pairs, fn($a, $b) => $b[1] - $a[1]);

        $topKHeep = new SplMinHeap();

        $topKSum = 0;
        for ($i = 0; $i < $k; $i++) {
            $topKSum += $pairs[$i][0];
            $topKHeep->insert($pairs[$i][0]);
        }

        $answer = $topKSum * $pairs[$k - 1][1];

        for ($i = $k; $i < $n; $i++) {
            $topKSum += $pairs[$i][0] - $topKHeep->extract();
            $topKHeep->insert($pairs[$i][0]);

            $answer = max($answer, $topKSum * $pairs[$i][1]);
        }

        return $answer;
    }
}
// @lc code=end

