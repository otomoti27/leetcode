package code

/*
 * @lc app=leetcode id=104 lang=golang
 *
 * [104] Maximum Depth of Binary Tree
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
func maxDepth(root *TreeNode) int {
	return recursion(root, 1)
}

func recursion(node *TreeNode, depth int) int {
	if node == nil {
		return depth - 1
	}

	left := recursion(node.Left, depth+1)
	right := recursion(node.Right, depth+1)

	return max(left, right)
}

// @lc code=end
