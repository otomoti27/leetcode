<?php
/*
 * @lc app=leetcode id=2336 lang=php
 *
 * [2336] Smallest Number in Infinite Set
 */

// @lc code=start
class SmallestInfiniteSet {
    private $heap;
    /**
     */
    function __construct() {
        $this->heap = new SplMinHeap();
        for ($i = 1; $i <= 1000; $i++) {
            $this->heap->insert($i);
        }
    }

    /**
     * @return Integer
     */
    function popSmallest() {
        if (!$this->heap->valid()) return null;

        $min = $this->heap->extract();
        while ($this->heap->valid() && $this->heap->top() == $min) {
            $this->heap->extract();
        }
        return $min;
    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function addBack($num) {
        $this->heap->insert($num);
    }
}

/**
 * Your SmallestInfiniteSet object will be instantiated and called as such:
 * $obj = SmallestInfiniteSet();
 * $ret_1 = $obj->popSmallest();
 * $obj->addBack($num);
 */
// @lc code=end

