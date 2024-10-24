package code

/*
 * @lc app=leetcode id=450 lang=golang
 *
 * [450] Delete Node in a BST
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
func deleteNode(root *TreeNode, key int) *TreeNode {
	if root == nil {
		return root
	}

	if root.Val > key {
		root.Left = deleteNode(root.Left, key)
	}

	if root.Val < key {
		root.Right = deleteNode(root.Right, key)
	}

	if root.Val == key {
		// 子要素の配置によって削除方法が変わる
		if root.Left == nil && root.Right == nil {
			return nil
		}
		if root.Left == nil {
			return root.Right
		}
		if root.Right == nil {
			return root.Left
		}

		// 子要素2個
		// 削除対象の次に大きい要素を削除位置に移動させる
		leftmost := root.Right
		for leftmost.Left != nil {
			leftmost = leftmost.Left
		}

		root.Val = leftmost.Val
		root.Right = deleteNode(root.Right, leftmost.Val)
	}

	return root
}

// @lc code=end
