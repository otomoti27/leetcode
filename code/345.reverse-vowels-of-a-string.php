<?php
/*
 * @lc app=leetcode id=345 lang=php
 *
 * [345] Reverse Vowels of a String
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseVowels($s) {
        // my solution
        $vowels = ['a', 'i', 'u', 'e', 'o', 'A', 'I', 'U', 'E', 'O'];

        $vowelsIndex = [];
        $vowelsValues = [];
        foreach (str_split($s) as $i => $v) {
            if (in_array($v, $vowels)) {
                $vowelsIndex[] = $i;
                $vowelsValues[] = $v;
            }
        }

        $len = count($vowelsValues);
        foreach ($vowelsIndex as $i => $v) {
            $s[$v] = $vowelsValues[$len - 1 - $i];
        }

        return $s;
    }

    /**
     *  e.g. two pointer
     * @param String $s
     * @return String
     */
    function otherSolution($s) {
        $left = 0;
        $right = strlen($s) - 1;
        while ($left < $right) {
            while ($this->isConsonant($s[$left]) && $left < $right) {
                $left++;
            }
            while ($this->isConsonant($s[$right]) && $left < $right) {
                $right--;
            }

            $this->swap($s, $left, $right);
            $left++;
            $right--;
        }
        return $s;
    }

    function isConsonant($letter) {
        $vowels = 'aeiouAEIOU';
        return !str_contains($vowels, $letter);
    }

    function swap(&$string, $i, $j) {
        $tmp = $string[$i];
        $string[$i] = $string[$j];
        $string[$j] = $tmp;
    }
}
// @lc code=end

