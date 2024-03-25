<?php
/*
 * @lc app=leetcode id=236 lang=php
 *
 * [236] Lowest Common Ancestor of a Binary Tree
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

class Solution {
    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q) {
        return $this->helper($root, $p, $q);
    }

    private function helper($node, $p, $q) {
        if ($node == null) return null;

        $left = $this->helper($node->left, $p, $q);
        $right = $this->helper($node->right, $p, $q);

        if ($left != null && $right != null) {
            return $node;
        }
        if ($node == $p || $node == $q) {
            return $node;
        }
        if ($left != null) {
            return $left;
        }
        if ($right != null) {
            return $right;
        }
        return null;
    }
}
// @lc code=end

