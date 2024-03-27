<?php
/*
 * @lc app=leetcode id=1161 lang=php
 *
 * [1161] Maximum Level Sum of a Binary Tree
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
    private $sumMap = [];

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxLevelSum($root) {
        // $this->dfs($root, 1);
        // $max = max($this->sumMap);
        // return array_search($max, $this->sumMap);

        // BFS
        $q = new SplQueue();
        $q->enqueue($root);
        $count = 1;
        $max = $root->val;
        $l = 1;
        $level = 0;
        while(!$q->isEmpty()) {
            $num = 0;
            $j = 0;
            $level++;
            while($j < $count) {
                $node = $q->dequeue();
                $num += $node->val;

                $j++;
                if ($node->left !== null) {
                    $q->enqueue($node->left);
                }
                if ($node->right !== null) {
                    $q->enqueue($node->right);
                }
            }

            if ($num > $max) {
                $max = $num;
                $l = $level;
            }
            $count = $q->count();
        }

        return $l;
    }

    private function dfs($node, $level) {
        if (!$node) return;

        $this->sumMap[$level] += $node->val;
        $this->dfs($node->left, $level + 1);
        $this->dfs($node->right, $level + 1);
    }
}
// @lc code=end

