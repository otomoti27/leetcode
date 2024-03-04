<?php
/*
 * @lc app=leetcode id=2130 lang=php
 *
 * [2130] Maximum Twin Sum of a Linked List
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return Integer
     */
    function pairSum($head) {
        $max = 0;

        $slow = $head;
        $fast = $head;
        while ($fast) {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }

        $curr = $slow;
        $prev = null;
        $temp = null;
        while ($curr) {
            $temp = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $temp;
        }

        while ($prev) {
            $sum = $head->val + $prev->val;
            $max = $sum > $max ? $sum : $max;

            $prev = $prev->next;
            $head = $head->next;
        }

        return $max;
    }
}
// @lc code=end

