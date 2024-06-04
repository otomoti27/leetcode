<?php
/*
 * @lc app=leetcode id=2462 lang=php
 *
 * [2462] Total Cost to Hire K Workers
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $costs
     * @param Integer $k
     * @param Integer $candidates
     * @return Integer
     */
    function totalCost($costs, $k, $candidates) {
        $count = count($costs);

        $headHeap = new SplMinHeap();
        $tailHeap = new SplMinHeap();
        for ($i = 0; $i < $candidates; $i++) {
            $headHeap->insert($costs[$i]);
        }

        for ($i = max($candidates, $count - $candidates); $i < $count; $i++) {
            $tailHeap->insert($costs[$i]);
        }

        $result = 0;
        $nextHead = $candidates;
        $nextTail = $count - 1 - $candidates;
        for ($i = 0; $i < $k; $i++) {
            if ($tailHeap->isEmpty()
            || (!$headHeap->isEmpty() && $headHeap->top() <= $tailHeap->top())
            ) {
                $result += $headHeap->extract();

                if ($nextHead <= $nextTail) {
                    $headHeap->insert($costs[$nextHead]);
                    $nextHead++;
                }
            } else {
                $result += $tailHeap->extract();

                if ($nextHead <= $nextTail) {
                    $tailHeap->insert($costs[$nextTail]);
                    $nextTail--;
                }
            }
        }

        return $result;
    }
}
// @lc code=end

