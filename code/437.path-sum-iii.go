package code

/*
 * @lc app=leetcode id=437 lang=golang
 *
 * [437] Path Sum III
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
func pathSum(root *TreeNode, targetSum int) int {
	if root == nil {
		return 0
	}
	return pathSumRec(root, targetSum) + pathSum(root.Left, targetSum) + pathSum(root.Right, targetSum)
}

func pathSumRec(node *TreeNode, targetSum int) int {
	if node == nil {
		return 0
	}

	count := 0
	remain := targetSum - node.Val
	if remain == 0 {
		count++
	}

	count += pathSumRec(node.Left, remain)
	count += pathSumRec(node.Right, remain)

	return count
}

// @lc code=end
