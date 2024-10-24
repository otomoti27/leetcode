package code

/*
 * @lc app=leetcode id=700 lang=golang
 *
 * [700] Search in a Binary Search Tree
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
func searchBST(root *TreeNode, val int) *TreeNode {
	if root == nil {
		return root
	}

	if target := root.Val; target == val {
		return root
	} else if target > val {
		return searchBST(root.Left, val)
	} else {
		return searchBST(root.Right, val)
	}
}

// @lc code=end
