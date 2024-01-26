<?php
/*
 * @lc app=leetcode id=9 lang=php
 *
 * [9] Palindrome Number
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        // my solution
        $s = (string) $x;
        return $s === strrev($s);

        // e.g. with int
        // $r = 0;
        // // 数が0でないのに末尾が0であるか、負の数であれば、それは回文数ではありません。
        // if ($x % 10 === 0 && $x !== 0 || $x < 0) return false;
        // // $rが$xより小さい間、$xの末尾の数字を取り出して$rに追加し、$xは10で割って整数にします。
        // while ($r < $x) {
        //     $r = $r * 10 + $x % 10;
        //     $x = (int) ($x / 10);
        // }
        // // $xが$rと同じか、$rを10で割った整数が$xと同じであれば(中央の桁の判定)、それは回文数です。
        // return $x === $r || $x === (int) ($r / 10);
    }
}
// @lc code=end

