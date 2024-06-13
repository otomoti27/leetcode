<?php
/*
 * @lc app=leetcode id=216 lang=php
 *
 * [216] Combination Sum III
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer[][]
     */
    function combinationSum3($k, $n) {
        return $this->recursive($k, $n, 1);
    }

    function recursive($k, $n, $start) {
        if (array_sum(range($start, $start + $k - 1)) > $n) {
            return [];
        }

        if ($k == 1) {
            if ($n >= $start && $n <= 9) {
                return [[$n]];
            } else {
                return [];
            }
        }

        $result = [];
        for ($i = $start; $i < 10; $i++) {
            $combinations = $this->recursive($k - 1, $n - $i, $i + 1);

            if ($combinations) {
                foreach ($combinations as $combination) {
                    $result[] = [
                        $i,
                        ...$combination,
                    ];
                }
            }
        }

        return $result;
    }
}
// @lc code=end

