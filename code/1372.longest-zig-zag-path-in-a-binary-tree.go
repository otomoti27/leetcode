package code

/*
 * @lc app=leetcode id=1372 lang=golang
 *
 * [1372] Longest ZigZag Path in a Binary Tree
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
func longestZigZag(root *TreeNode) int {
	return max(zigZag(root.Left, "left", 0), zigZag(root.Right, "right", 0))
}

func zigZag(root *TreeNode, direction string, depth int) int {
	if root == nil {
		return depth
	}

	if direction == "left" {
		return max(zigZag(root.Left, "left", 0), zigZag(root.Right, "right", depth+1))
	} else {
		return max(zigZag(root.Left, "left", depth+1), zigZag(root.Right, "right", 0))
	}
}

// @lc code=end
