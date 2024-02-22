<?php
/*
 * @lc app=leetcode id=2352 lang=php
 *
 * [2352] Equal Row and Column Pairs
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function equalPairs($grid) {
        // my solution
        $reverse = [];
        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid); $j++) {
                $reverse[$j][] = $grid[$i][$j];
            }
        }

        $count = 0;
        foreach ($grid as $row) {
            foreach ($reverse as $rrow) {
                if ($rrow == $row) $count++;
            }
        }
        return $count;

        // e.g.hash map
        // $mapRow = [];
        // $mapCol = [];
        // for ($i = 0; $i < count($grid); $i++) {
        //     $colKey = [];
        //     for ($j = 0; $j < count($grid); $j++) {
        //         $colKey[] = $grid[$j][$i]; 
        //     }
        //     $colKey = implode('.', $colKey);
        //     $rowKey = implode('.', $grid[$i]);
        //     $mapCol[$colKey] = ($mapCol[$colKey] ?? 0) + 1;
        //     $mapRow[$rowKey] = ($mapRow[$rowKey] ?? 0) + 1;
        // }

        // $result = 0;
        // foreach ($mapRow as $k => $v) {
        //     if (!isset($mapCol[$k])) {
        //         continue;
        //     }

        //     $result += $v * $mapCol[$k];
        // }

        // return $result;
    }
}
// @lc code=end
