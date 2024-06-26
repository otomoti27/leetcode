<?php
/*
 * @lc app=leetcode id=714 lang=php
 *
 * [714] Best Time to Buy and Sell Stock with Transaction Fee
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $prices
     * @param Integer $fee
     * @return Integer
     */
    function maxProfit($prices, $fee) {
        $buy = -$prices[0];
        $sell = 0;

        for ($i = 0; $i < count($prices); $i++) {
            $newBuy = max($buy, $sell - $prices[$i]);
            $newSell = max($sell, $buy + $prices[$i] - $fee);

            $buy = $newBuy;
            $sell = $newSell;
        }

        return $sell;
    }
}
// @lc code=end

