<?php
/*
 * @lc app=leetcode id=328 lang=php
 *
 * [328] Odd Even Linked List
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
    function oddEvenList($head) {
        if ($head->next == null) {
            return $head;
        }
        $odd = $head;
        $evenHead = $head->next;
        $even = $head->next;
        while ($odd->next && $even->next) {
            $odd->next = $odd->next->next;
            $odd = $odd->next;
            $even->next = $even->next->next;
            $even = $even->next;
        }

        $odd->next = $evenHead;

        return $head;
    }
}
// @lc code=end

