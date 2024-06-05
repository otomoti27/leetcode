<?php
/*
 * @lc app=leetcode id=374 lang=php
 *
 * [374] Guess Number Higher or Lower
 */

// @lc code=start
/** 
 * The API guess is defined in the parent class.
 * @param  num   your guess
 * @return 	     -1 if num is higher than the picked number
 *			      1 if num is lower than the picked number
 *               otherwise return 0
 * public function guess($num){}
 */

class Solution extends GuessGame {
    /**
     * @param  Integer  $n
     * @return Integer
     */
    function guessNumber($n) {
        // 半分ずつ最小と最大を絞っていく
        $min = 1;
        $max = $n;
        $answer = round($max / 2);
        while (true) {
            if ($this->guess($answer) === -1) {
                $max = $answer;
                $answer = round($max / 2);
            } elseif ($this->guess($answer) === 1) {
                $min = $answer;
                $answer = round(($max + $min) / 2);
            } else {
                return $answer;
            }
        }
    }
}
// @lc code=end

