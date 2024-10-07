package code

/*
 * @lc app=leetcode id=2130 lang=golang
 *
 * [2130] Maximum Twin Sum of a Linked List
 */

// @lc code=start
/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func pairSum(head *ListNode) int {
	if head.Next.Next == nil {
		return head.Val + head.Next.Val
	}

	// 後半のノードを取得
	slow, fast := head, head.Next.Next
	for fast != nil {
		slow = slow.Next
		fast = fast.Next.Next
	}
	suf := slow.Next

	// 後半のノードを反転
	var prev *ListNode
	current := suf
	for current != nil {
		next := current.Next
		current.Next = prev

		prev = current
		current = next
	}

	result := 0
	for prev != nil {
		result = max(result, head.Val+prev.Val)
		head = head.Next
		prev = prev.Next
	}

	return result
}

// @lc code=end
