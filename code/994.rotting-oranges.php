<?php
/*
 * @lc app=leetcode id=994 lang=php
 *
 * [994] Rotting Oranges
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function orangesRotting($grid) {
        $q = new SplQueue();
        $isVisited = array_map(fn($row) => array_map(fn($cell) => false, $row), $grid);

        $h = count($grid);
        $w = count($grid[0]);

        $countFresh = 0;
        foreach ($grid as $key => $row) {
            foreach ($row as $column => $cell) {
                if ($cell == 2) {
                    $q->enqueue([$key, $column]);
                    $isVisited[$key][$column] = true;
                }
                if ($cell == 1) {
                    $countFresh++;
                }
            }
        }

        $directions = [
            [-1, 0],
            [0, -1],
            [1, 0],
            [0, 1],
        ];

        $minutes = 0;
        while (!$q->isEmpty()) {
            $count = $q->count();
            for ($i = 0; $i < $count; $i++) {
                $current = $q->dequeue();
                $paths = array_map(fn($dir) => [$current[0] + $dir[0], $current[1] + $dir[1]], $directions);

                foreach ($paths as $p) {
                    if ($isVisited[$p[0]][$p[1]]
                        || $grid[$p[0]][$p[1]] === 0
                        || $p[0] > ($h - 1)
                        || $p[1] > ($w - 1)
                        || $p[0] < 0
                        || $p[1] < 0
                    ) {
                        continue;
                    }

                    $grid[$p[0]][$p[1]] = 2;
                    $isVisited[$p[0]][$p[1]] = true;
                    $q->enqueue($p);
                    $countFresh--;
                }
            }

            if (!$q->isEmpty()) {
                $minutes++;
            }
        }

        return $countFresh === 0 ? $minutes : -1;
    }
}
// @lc code=end

