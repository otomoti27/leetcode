<?php
/*
 * @lc app=leetcode id=901 lang=php
 *
 * [901] Online Stock Span
 */

// @lc code=start
class StockSpanner {
    private $stack;
    /**
     */
    function __construct() {
        $this->stack = [];
    }
  
    /**
     * @param Integer $price
     * @return Integer
     */
    function next($price) {
        // $result = 0;
        // $this->stack[] = $price;

        // for ($i = count($this->stack) - 1; $i >= 0; $i--) {
        //     if ($this->stack[$i] <= $price) {
        //         $result++;
        //     } else {
        //         break;
        //     }
        // }

        // return $result;

        // e.g.
        $span = 1;
        while (!empty($this->stack) && end($this->stack)['price'] <= $price) {
            $span += array_pop($this->stack)['span'];
        }

        $this->stack[] = ['price' => $price, 'span' => $span];
        return $span;
    }
}

/**
 * Your StockSpanner object will be instantiated and called as such:
 * $obj = StockSpanner();
 * $ret_1 = $obj->next($price);
 */
// @lc code=end

