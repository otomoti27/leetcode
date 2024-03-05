<?php
/*
 * @lc app=leetcode id=104 lang=php
 *
 * [104] Maximum Depth of Binary Tree
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
    function maxDepth($root) {
        if ($root == null) return 0;

        return $this->countDeps($root, 1);
    }

    function countDeps($node, $curDepth) {
        $leftDepth = $rightDepth = $curDepth;
        if ($node->left != null) {
            $leftDepth++;
            $leftDepth = $this->countDeps($node->left, $leftDepth);
        }
        if ($node->right != null) {
            $rightDepth++;
            $rightDepth = $this->countDeps($node->right, $rightDepth);
        }

        return max($leftDepth, $rightDepth);
    }
}
// @lc code=end

