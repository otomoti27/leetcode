<?php
/*
 * @lc app=leetcode id=17 lang=php
 *
 * [17] Letter Combinations of a Phone Number
 */

// @lc code=start
class Solution {
    const LETTER_MAP = [
        '2' => ['a', 'b', 'c'],
        '3' => ['d', 'e', 'f'],
        '4' => ['g', 'h', 'i'],
        '5' => ['j', 'k', 'l'],
        '6' => ['m', 'n', 'o'],
        '7' => ['p', 'q', 'r', 's'],
        '8' => ['t', 'u', 'v',], 
        '9' => ['w', 'x', 'y', 'z'],
    ];

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        if ($digits == '') return [];

        $hashTable = [];
        foreach (str_split($digits) as $key => $digit) {
            $list = self::LETTER_MAP[$digit];

            if ($key == 0) {
                $hashTable = $list;
                continue;
            }

            $temp = [];
            foreach($list as $letter) {
                foreach($hashTable as $letters) {
                    $temp[] = $letters. $letter;
                }
            }
            $hashTable = $temp;
        }

        return $hashTable;
    }
}
// @lc code=end

