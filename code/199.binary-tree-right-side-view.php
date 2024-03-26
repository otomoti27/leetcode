<?php
/*
 * @lc app=leetcode id=199 lang=php
 *
 * [199] Binary Tree Right Side View
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
     * @return Integer[]
     */
    function rightSideView($root) {
        $list = [];
        $this->helper($root, $list, 0);
        return $list;
    }

    private function helper($node, &$list, $depth) {
        if ($node == null) return;

        $list[$depth] = $node->val;
        $this->helper($node->left, $list, $depth + 1);
        $this->helper($node->right, $list, $depth + 1);
    }
}
// @lc code=end

