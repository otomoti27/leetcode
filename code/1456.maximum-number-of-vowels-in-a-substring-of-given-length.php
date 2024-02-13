<?php
/*
 * @lc app=leetcode id=1456 lang=php
 *
 * [1456] Maximum Number of Vowels in a Substring of Given Length
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function maxVowels($s, $k) {
        $vowelCount = 0;
        for ($i = 0; $i < $k; $i++) {
            if ($this->isVowel($s[$i])) {
                $vowelCount++;
            }
        }

        $maxCount = $vowelCount;

        for ($i = 1; $i <= strlen($s) - $k; $i++) {
            if ($this->isVowel($s[$i - 1])) {
                $vowelCount--;
            }
            if ($this->isVowel($s[$i + $k - 1])) {
                $vowelCount++;
            }
            if ($vowelCount > $maxCount) {
                $maxCount = $vowelCount;
            }
        }

        return $maxCount;
    }

    function isVowel(string $s): bool
    {
        return str_contains('aeiou', $s);
    }
}
// @lc code=end
