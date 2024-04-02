<?php
/*
 * @lc app=leetcode id=547 lang=php
 *
 * [547] Number of Provinces
 */

// @lc code=start
class Solution {
    /**
     * @param Integer[][] $isConnected
     * @return Integer
     */
    function findCircleNum($isConnected) {
        $province = 0;
        $visited = [];
        foreach ($isConnected as $i => $_) {
            if (!isset($visited[$i])) {
                $province++;
                $this->helper($i, $visited, $isConnected);
            }
        }

        return $province;
    }

    function helper($city, &$visited, $isConnected) {
        $visited[$city] = true;
        foreach ($isConnected[$city] as $i => $v) {
            if (isset($visited[$i])) continue;
            if ($v === 0) continue;
            $this->helper($i, $visited, $isConnected);
        }
    }
}
// @lc code=end

