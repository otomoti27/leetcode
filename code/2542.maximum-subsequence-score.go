package code

import (
	"container/heap"
	"slices"
)

/*
 * @lc app=leetcode id=2542 lang=golang
 *
 * [2542] Maximum Subsequence Score
 */

// @lc code=start
func maxScore(nums1 []int, nums2 []int, k int) int64 {
	pairs := make([][2]int, 0)
	for i := 0; i < len(nums1); i++ {
		pairs = append(pairs, [2]int{nums1[i], nums2[i]})
	}

	slices.SortFunc(pairs, func(a, b [2]int) int {
		return b[1] - a[1]
	})

	topKHeap := &IntHeap{}

	topKSum := 0
	for i := 0; i < k; i++ {
		topKSum += pairs[i][0]
		heap.Push(topKHeap, pairs[i][0])
	}

	ans := topKSum * pairs[k-1][1]
	for i := k; i < len(nums1); i++ {
		topKSum -= heap.Pop(topKHeap).(int)
		topKSum += pairs[i][0]
		heap.Push(topKHeap, pairs[i][0])

		ans = max(ans, topKSum*pairs[i][1])
	}

	return int64(ans)
}

type IntHeap []int

func (h IntHeap) Len() int           { return len(h) }
func (h IntHeap) Less(i, j int) bool { return h[i] < h[j] }
func (h IntHeap) Swap(i, j int)      { h[i], h[j] = h[j], h[i] }

func (h *IntHeap) Push(x any) {
	*h = append(*h, x.(int))
}

func (h *IntHeap) Pop() any {
	old := *h
	n := len(old)
	x := old[n-1]
	*h = old[0 : n-1]
	return x
}

// @lc code=end
