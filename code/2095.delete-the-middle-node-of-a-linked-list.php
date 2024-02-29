<?php
/*
 * @lc app=leetcode id=2095 lang=php
 *
 * [2095] Delete the Middle Node of a Linked List
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
    function deleteMiddle($head) {
        // e.g.
        if ($head->next === null) {
            return null;
        }

        $slow = $head;
        $fast = $head->next->next;
        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        $slow->next = $slow->next->next;

        return $head;
    }
}
// @lc code=end

