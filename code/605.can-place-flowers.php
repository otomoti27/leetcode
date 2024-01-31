<?php
/*
 * @lc app=leetcode id=605 lang=php
 *
 * [605] Can Place Flowers
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n) {
        // e.g.
        // $count = 0;
        // $flowerbedLength = count($flowerbed);
        // for ($i = 0; $i <= $flowerbedLength; $i++) {
        //     if ($flowerbed[$i] === 0
        //     && $i < $flowerbedLength) { // 最後の要素が0の場合にfalseに行くように
        //         $count++;
        //         if ($i === 0) $count++;
        //         if ($i === $flowerbedLength - 1) $count++;
        //     } else {
        //         $n -= intdiv($count - 1, 2);
        //         if ($n <= 0) return true;
        //         $count = 0;
        //     }
        // }
        // return false;

        // e.g.
        array_unshift($flowerbed, 0);
        $flowerbed[] = 0;
        for ($i = 1; $i < count($flowerbed) - 1; $i++) {
            if ($flowerbed[$i - 1] + $flowerbed[$i] + $flowerbed[$i + 1] === 0) {
                $n--;
                $i++; // 今の要素に1が入るため1要素分飛ばしてみる
            }
            if ($n <= 0) return true;
        }
        return $n <= 0;
    }
}
// @lc code=end

