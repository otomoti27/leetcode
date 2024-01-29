<?php
/*
 * @lc app=leetcode id=1071 lang=php
 *
 * [1071] Greatest Common Divisor of Strings
 */

// @lc code=start
class Solution {

    /**
     * @param String $str1
     * @param String $str2
     * @return String
     */
    function gcdOfStrings($str1, $str2) {
        // my solution
        // 同じ文字列ではない
        if ($str1. $str2 !== $str2. $str1) return "";

        $len1 = strlen($str1);
        $len2 = strlen($str2);
        $result = '';
        for ($i = 1; $i <= min([$len1, $len2]); $i++) {
            $search = substr($str1, 0, $i);
            $count1 = substr_count($str1, $search);
            $count2 = substr_count($str2, $search);

            // 検索文字数 * マッチ回数 = 文字数になる
            if ($count1 * $i === $len1 && $count2 * $i === $len2) {
                $result = $search;
            }
        }
        return $result;

        // e.g. 数字として考える
        // if ($str1. $str2 !== $str2. $str1) return "";
        // return substr($str1, 0, $this->gcd(strlen($str1), strlen($str2)));
    }

    // function gcd($a, $b) {
    //     return ($a % $b) ? $this->gcd($b, $a % $b) : $b;
    // }
}
// @lc code=end

