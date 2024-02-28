<?php
/*
 * @lc app=leetcode id=649 lang=php
 *
 * [649] Dota2 Senate
 */

// @lc code=start
class Solution {

    /**
     * @param String $senate
     * @return String
     */
    function predictPartyVictory($senate) {
        // e.g.
        $count = strlen($senate);
        $rad = [];
        $dir = [];
        for ($i = 0; $i < $count; $i++) {
            if ($senate[$i] === 'R') {
                $rad[] = $i;
            } else {
                $dir[] = $i;
            }
        }

        while (!empty($rad) && !empty($dir)) {
            $radValue = array_shift($rad);
            $dirValue = array_shift($dir);
            // 生き残ったsenatorをqueueに追加する
            if ($radValue < $dirValue) {
                $rad[] = $count++;
            } else {
                $dir[] = $count++;
            }
        }

        return empty($rad) ? 'Dire' : 'Radiant';
    }
}
// @lc code=end

