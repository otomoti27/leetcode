package code

/*
 * @lc app=leetcode id=933 lang=golang
 *
 * [933] Number of Recent Calls
 */

// @lc code=start
type RecentCounter struct {
	queues []int
}

func Constructor() RecentCounter {
	return RecentCounter{}
}

func (this *RecentCounter) Ping(t int) int {
	this.queues = append(this.queues, t)

	for this.queues[0] < t-3000 {
		this.queues = this.queues[1:]
	}

	return len(this.queues)
}

/**
 * Your RecentCounter object will be instantiated and called as such:
 * obj := Constructor();
 * param_1 := obj.Ping(t);
 */
// @lc code=end
