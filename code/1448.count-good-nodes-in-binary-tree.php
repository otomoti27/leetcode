<?php
/*
 * @lc app=leetcode id=1448 lang=php
 *
 * [1448] Count Good Nodes in Binary Tree
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

    public function __construct(
        private int $count = 0
    ) {
    }

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function goodNodes($root, $values = []) {
        $values[] = $root->val;
        if (max($values) === $root->val) {
            $this->count++;
        }

        if ($root->left != null) {
            $this->goodNodes($root->left, $values);
        }
        if ($root->right != null) {
            $this->goodNodes($root->right, $values);
        }

        return $this->count;
    }
}
// @lc code=end

