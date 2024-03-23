<?php
/*
 * @lc app=leetcode id=1372 lang=php
 *
 * [1372] Longest ZigZag Path in a Binary Tree
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function longestZigZag($root) {
        if ($root == null) return 0;

        return max($this->maxZigZag($root->left, 'left', 1), $this->maxZigZag($root->right, 'right', 1));
    }

    private function maxZigZag($node, $direction, $depth) {
        if ($node == null) {
            return $depth - 1;
        }

        $right = $this->maxZigZag($node->left, 'left', $direction === 'right' ? $depth + 1 : 1);
        $left = $this->maxZigZag($node->right, 'right', $direction === 'left' ? $depth + 1 : 1);
        return max($right, $left);
    }
}
// @lc code=end

