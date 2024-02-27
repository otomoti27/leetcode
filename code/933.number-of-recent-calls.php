<?php
/*
 * @lc app=leetcode id=933 lang=php
 *
 * [933] Number of Recent Calls
 */

// @lc code=start
class RecentCounter {
    private array $queues = [];
    /**
     */
    function __construct() {
    }

    /**
     * @param Integer $t
     * @return Integer
     */
    function ping($t) {
        $this->queues[] = $t;
        foreach ($this->queues as $key => $time) {
            if ($time >= $t - 3000) {
                break;
            }
            unset($this->queues[$key]);
        }
        return count($this->queues);
    }
}

/**
 * Your RecentCounter object will be instantiated and called as such:
 * $obj = RecentCounter();
 * $ret_1 = $obj->ping($t);
 */
// @lc code=end

