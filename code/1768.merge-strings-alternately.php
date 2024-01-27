<?php
/*
 * @lc app=leetcode id=1768 lang=php
 *
 * [1768] Merge Strings Alternately
 */

// @lc code=start
class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return String
     */
    function mergeAlternately($word1, $word2) {
        // my solution
        $r = [];
        foreach (str_split($word1) as $i => $w1) {
            $r[$i * 2 + 1] = $w1;
        }
        foreach (str_split($word2) as $i => $w2) {
            $r[$i * 2 + 2] = $w2;
        }
        ksort($r);
        return implode($r);

        // e.g.
        // $result = '';
        // for ($i = 0; $i < max([strlen($word1), strlen($word2)]); $i++) {
        //     if (isset($word1[$i])) {
        //         $result .= $word1[$i];
        //     }
        //     if (isset($word2[$i])) {
        //         $result .= $word2[$i];
        //     }
        // }
        // return $result;

        // e.g.
        // $i = 0;
        // $output = '';
        // while (isset($word1[$i]) || isset($word2[$i])) {
        //     if (isset($word1[$i])) {
        //         $output .= $word1[$i];
        //     }
        //     if (isset($word2[$i])) {
        //         $output .= $word2[$i];
        //     }
        //     $i++;
        // }
        // return $output;
    }
}
// @lc code=end

