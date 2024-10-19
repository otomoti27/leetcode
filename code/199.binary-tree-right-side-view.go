package code

/*
 * @lc app=leetcode id=199 lang=golang
 *
 * [199] Binary Tree Right Side View
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
func rightSideView(root *TreeNode) []int {
	if root == nil {
		return []int{}
	}

	result := make([]int, 0)
	que := make([]*TreeNode, 0)
	depths := make([]int, 0)

	que = append(que, root)
	depths = append(depths, 0)

	for len(que) > 0 {
		node := que[0]
		que = que[1:]

		depth := depths[0]
		depths = depths[1:]

		if node == nil {
			continue
		}

		if depth == len(result) {
			result = append(result, node.Val)
		} else {
			result[depth] = node.Val
		}

		que = append(que, node.Left, node.Right)
		depths = append(depths, depth+1, depth+1)
	}

	return result
}

// @lc code=end
