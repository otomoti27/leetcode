<?php
/*
 * @lc app=leetcode id=215 lang=php
 *
 * [215] Kth Largest Element in an Array
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k) {
        // sort and select
        // rsort($nums);
        // return $nums[$k - 1];

        // heap
        // $heap = new SplMinHeap();
        // for ($i = 0; $i < $k; $i++) {
        //     $heap->insert($nums[$i]);
        // }
        // for ($i = $k; $i < count($nums); $i++) {
        //     if ($nums[$i] > $heap->current()) {
        //         $heap->extract();
        //         $heap->insert($nums[$i]);
        //     }
        // }
        // return $heap->current();

        // quick select
        $left = 0;
        $right = count($nums) - 1;
        $selectIndex = count($nums) - $k;
        while (true) {
            $pivotIndex = rand($left, $right);
            $newPivotIndex = $this->partition($nums, $left, $right, $pivotIndex);

            if ($newPivotIndex == $selectIndex) {
                return $nums[$newPivotIndex];
            } else if ($newPivotIndex > $selectIndex) {
                $right = $newPivotIndex - 1;
            } else {
                $left = $newPivotIndex + 1;
            }
        }
    }

    function partition(&$nums, $left, $right, $pivotIndex) {
        $pivot = $nums[$pivotIndex];
        $this->swap($nums, $pivotIndex, $right);

        $storedIndex = $left;
        for ($i = $left; $i < $right; $i++) {
            if ($nums[$i] < $pivot) {
                $this->swap($nums, $i, $storedIndex);
                $storedIndex++;
            }
        }
        $this->swap($nums, $right, $storedIndex);
        return $storedIndex;
    }

    function swap(&$nums, $i, $j) {
        $tmp = $nums[$i];
        $nums[$i] = $nums[$j];
        $nums[$j] = $tmp;
    }
}
// @lc code=end

