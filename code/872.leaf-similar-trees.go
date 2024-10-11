package code

import (
	"slices"
)

/*
 * @lc app=leetcode id=872 lang=golang
 *
 * [872] Leaf-Similar Trees
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
func leafSimilar(root1 *TreeNode, root2 *TreeNode) bool {
	leaves1 := make([]int, 0)
	leaves2 := make([]int, 0)

	recursion872(root1, &leaves1)
	recursion872(root2, &leaves2)

	return slices.Equal(leaves1, leaves2)
}

func recursion872(node *TreeNode, leaves *[]int) {
	if node.Left != nil {
		recursion872(node.Left, leaves)
	}

	if node.Right != nil {
		recursion872(node.Right, leaves)
	}

	if node.Left == nil && node.Right == nil {
		*leaves = append(*leaves, node.Val)
	}
	return
}

// @lc code=end
