<?php
/*
 * @lc app=leetcode id=872 lang=php
 *
 * [872] Leaf-Similar Trees
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
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Boolean
     */
    function leafSimilar($root1, $root2) {
        $leafs1 = [];
        $leafs2 = [];
        $this->searchLeaf($root1, $leafs1);
        $this->searchLeaf($root2, $leafs2);
        return $leafs1 == $leafs2;
    }

    function searchLeaf($root, &$leafs) {
        if ($root->left != null) {
            $this->searchLeaf($root->left, $leafs);
        }

        if ($root->right != null) {
            $this->searchLeaf($root->right, $leafs);
        }

        if ($root->left == null && $root->right == null) {
            $leafs[] = $root->val;
        }
    }
}
// @lc code=end

