<?php
/*
 * @lc app=leetcode id=450 lang=php
 *
 * [450] Delete Node in a BST
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
     * @param Integer $key
     * @return TreeNode
     */
    function deleteNode($root, $key) {
        if ($root == null) {
            return null;
        }
        if ($root->val > $key) {
            $root->left = $this->deleteNode($root->left, $key);
        }
        if ($root->val < $key) {
            $root->right = $this->deleteNode($root->right, $key);
        }
        if ($root->val == $key) {
            // ここで削除
            // 子要素0個
            if ($root->left == null && $root->right == null) {
                return null;
            }
            // 子要素1個
            if ($root->left == null) {
                return $root->right;
            }
            if ($root->right == null) {
                return $root->left;
            }

            // 子要素2個
            // 削除要素を削除対象の次に大きい値に置換
            $left = $this->helper($root->right);
            $root->val = $left->val;
            // 置換元を削除
            $root->right = $this->deleteNode($root->right, $left->val);
        }

        return $root;
    }

    private function helper($root) {
        while ($root->left != null) {
            $root = $root->left;
        }
        return $root;
    }
}
// @lc code=end

