<?php
/*
 * @lc app=leetcode id=1926 lang=php
 *
 * [1926] Nearest Exit from Entrance in Maze
 */

// @lc code=start
class Solution {
    /**
     * @param String[][] $maze
     * @param Integer[] $entrance
     * @return Integer
     */
    function nearestExit($maze, $entrance) {
        $q = new SplQueue();
        $isVisited = array_map(fn($row) => array_map(fn($cell) => false, $row), $maze);
        $distance = array_map(fn($row) => array_map(fn($cell) => false, $row), $maze);

        $h = count($maze);
        $w = count($maze[0]);

        $isVisited[$entrance[0]][$entrance[1]] = true;
        $distance[$entrance[0]][$entrance[1]] = 0;
        $q->enqueue($entrance);

        $directions = [
            [-1, 0],
            [0, -1],
            [1, 0],
            [0, 1],
        ];

        while(!$q->isEmpty()) {
            $current = $q->dequeue();
            $paths = array_map(fn($dir) => [$current[0] + $dir[0], $current[1] + $dir[1]], $directions);
            foreach($paths as $p) {
                if($isVisited[$p[0]][$p[1]]
                    || $maze[$p[0]][$p[1]] === '+'
                    || $p[0] > ($h - 1)
                    || $p[1] > ($w - 1)
                    || $p[0] < 0
                    || $p[1] < 0) {
                    continue;
                }
                var_dump($p);

                if($p[0] === ($h - 1)
                    || $p[1] === ($w - 1)
                    || $p[0] === 0
                    || $p[1] === 0) {
                    return $distance[$current[0]][$current[1]] + 1;
                }
                $distance[$p[0]][$p[1]] = $distance[$current[0]][$current[1]] + 1;

                $q->enqueue($p);
                $isVisited[$p[0]][$p[1]] = true;
            }
        }

        return (-1);
    }
}
// @lc code=end

