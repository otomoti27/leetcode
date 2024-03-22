<?php
/*
 * @lc app=leetcode id=437 lang=php
 *
 * [437] Path Sum III
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
    private int $count = 0;
    private int $targetSum;

    /**
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Integer
     */
    function pathSum($root, $targetSum) {
        if ($root == null) {
            return 0;
        }

        $this->targetSum = $targetSum;
        $this->sum($root, 0, 0);

        return $this->count;
    }

    function sum($root, $current, $deps) {
        $sum = $current + $root->val;
        if ($sum === $this->targetSum) {
            $this->count++;
        }

        if ($root->left != null) {
            $this->sum($root->left, $sum, $deps + 1);
            if ($deps < 1) {
                $this->sum($root->left, 0, 0);
            }
        }
        if ($root->right != null) {
            $this->sum($root->right, $sum, $deps + 1);
            if ($deps < 1) {
                $this->sum($root->right, 0, 0);
            }
        }
    }
}
// @lc code=end

