<?php
/*
 * @lc app=leetcode id=206 lang=php
 *
 * [206] Reverse Linked List
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
     * @return ListNode
     */
    function reverseList($head) {
        $prev = null;
        while (isset($head)) {
            $next = $head->next;
            $head->next = $prev;
            $prev = $head;
            $head = $next;
        }

        return $prev;
    }
}
// @lc code=end

