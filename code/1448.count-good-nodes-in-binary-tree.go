package code

import "math"

/*
 * @lc app=leetcode id=1448 lang=golang
 *
 * [1448] Count Good Nodes in Binary Tree
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func goodNodes(root *TreeNode) int {
	return recursion1448(root, math.MinInt)
}

func recursion1448(node *TreeNode, max int) int {
	if node == nil {
		return 0
	}

	count := 0

	if node.Val >= max {
		count++
		max = node.Val
	}

	count += recursion1448(node.Left, max)
	count += recursion1448(node.Right, max)
	return count
}

// @lc code=end
