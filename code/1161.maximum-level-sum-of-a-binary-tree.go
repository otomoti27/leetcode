package code

/*
 * @lc app=leetcode id=1161 lang=golang
 *
 * [1161] Maximum Level Sum of a Binary Tree
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
func maxLevelSum(root *TreeNode) int {
	queue := []*TreeNode{root}
	hash := make(map[int]int, 0)

	level := 0
	for len(queue) > 0 {
		length := len(queue)
		level++

		for length > 0 {
			node := queue[0]
			queue = queue[1:]

			hash[level] += node.Val

			if node.Left != nil {
				queue = append(queue, node.Left)
			}
			if node.Right != nil {
				queue = append(queue, node.Right)
			}

			length--
		}
	}

	var maxKey, maxValue int
	for k, v := range hash {
		if v > maxValue || maxKey == 0 {
			maxKey = k
			maxValue = v
		}
	}

	return maxKey
}

// @lc code=end
