package code

/*
 * @lc app=leetcode id=328 lang=golang
 *
 * [328] Odd Even Linked List
 */

// @lc code=start
/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func oddEvenList(head *ListNode) *ListNode {
	if head == nil {
		return nil
	}

	odd := head
	even, evenHead := head.Next, head.Next

	for even != nil && even.Next != nil {
		odd.Next = odd.Next.Next
		odd = odd.Next

		even.Next = even.Next.Next
		even = even.Next
	}

	odd.Next = evenHead
	return head
}

// @lc code=end
