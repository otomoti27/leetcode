package code

import (
	"container/heap"
)

/*
 * @lc app=leetcode id=2462 lang=golang
 *
 * [2462] Total Cost to Hire K Workers
 */

// @lc code=start
func totalCost(costs []int, k int, candidates int) int64 {
	leftHeap := IntHeap{}
	rightHeap := IntHeap{}

	pop := 0
	for i := 0; i < candidates; i++ {
		pop, costs = costs[0], costs[1:]
		heap.Push(&leftHeap, pop)
	}

	for i := 0; i < candidates; i++ {
		if len(costs) > 0 {
			pop, costs = costs[len(costs)-1], costs[:len(costs)-1]
			heap.Push(&rightHeap, pop)
		}
	}

	ans := 0
	for i := 0; i < k; i++ {
		if len(leftHeap) == 0 {
			ans += heap.Pop(&rightHeap).(int)

			if l := len(costs); l > 0 {
				heap.Push(&rightHeap, costs[l-1])
				costs = costs[:l-1]
			}
			continue
		}

		if len(rightHeap) == 0 {
			ans += heap.Pop(&leftHeap).(int)

			if len(costs) > 0 {
				heap.Push(&leftHeap, costs[0])
				costs = costs[1:]
			}
			continue
		}

		left := heap.Pop(&leftHeap).(int)
		right := heap.Pop(&rightHeap).(int)
		if left <= right {
			ans += left

			heap.Push(&rightHeap, right)
			if len(costs) > 0 {
				heap.Push(&leftHeap, costs[0])
				costs = costs[1:]
			}
		} else {
			ans += right

			heap.Push(&leftHeap, left)
			if l := len(costs); l > 0 {
				heap.Push(&rightHeap, costs[l-1])
				costs = costs[:l-1]
			}
		}
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
