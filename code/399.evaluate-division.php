<?php
/*
 * @lc app=leetcode id=399 lang=php
 *
 * [399] Evaluate Division
 */

// @lc code=start
class Solution {

    /**
     * @param String[][] $equations
     * @param Float[] $values
     * @param String[][] $queries
     * @return Float[]
     */
    function calcEquation($equations, $values, $queries) {
        $map = [];
        foreach ($equations as $index => $equation) {
            $map[$equation[0]][$equation[1]] = $values[$index];
            $map[$equation[1]][$equation[0]] = 1 / $values[$index];
        }

        $answers = [];
        foreach ($queries as $query) {
            $answer = $this->helper($query, $map, []);
            $answers[] = $answer > 0 ? $answer : -1;
        }

        return $answers;
    }

    function helper($query, &$map, $visited) {
        $a = $query[0];
        $b = $query[1];

        $visited[$a] = true;

        if (!isset($map[$a])) return -1;
        if (!isset($map[$b])) return -1;
        if ($a === $b) return 1;
        if (isset($map[$a][$b])) {
            return $map[$a][$b];
        }

        $answers = [];
        foreach ($map[$a] as $a1 => $value) {
            if (!isset($visited[$a1])) {
                $answers[] = $value * $this->helper([$a1, $b], $map, $visited);
            }
        }

        if (empty($answers)) return -1;

        $answer = max($answers);
        if ($answer > 0) {
            $map[$a][$b] = $answer;
        }

        return $answer;
    }
}
// @lc code=end

