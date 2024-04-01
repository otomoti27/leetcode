<?php
/*
 * @lc app=leetcode id=841 lang=php
 *
 * [841] Keys and Rooms
 */

// @lc code=start
class Solution {
    private $visited = [];

    /**
     * @param Integer[][] $rooms
     * @return Boolean
     */
    function canVisitAllRooms($rooms) {
        $this->dfs(0, $rooms);
        return array_sum($this->visited) == count($rooms);
    }

    private function dfs($index, $rooms) {
        $this->visited[$index] = 1;
        foreach ($rooms[$index] as $key) {
            if (isset($this->visited[$key])) continue;
            $this->dfs($key, $rooms);
        }
    }

}
// @lc code=end

