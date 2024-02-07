<?php
/*
 * @lc app=leetcode id=392 lang=php
 *
 * [392] Is Subsequence
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {
        // my solution
        // $offset = 0;
        // foreach (str_split($s) as $v) {
        //     $offset = strpos($t, $v, $offset ? $offset + 1 : 0);
        //     if ($offset === false) {
        //         return false;
        //     }
        // }
        // return true;

        // e.g. two pointer
        $i = 0;
        $j = 0;
        while ($i < strlen($s) && $j < strlen($t)) {
            if ($s[$i] == $t[$j]) {
                $i++;
            }
            $j++;
        }
        return $i == strlen($s);
    }
}
// @lc code=end

