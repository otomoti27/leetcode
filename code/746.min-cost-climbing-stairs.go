package code

/*
 * @lc app=leetcode id=746 lang=golang
 *
 * [746] Min Cost Climbing Stairs
 */

// @lc code=start
func minCostClimbingStairs(cost []int) int {
	ans := make([]int, len(cost))
	ans[0] = cost[0]
	ans[1] = cost[1]
	for i := 2; i < len(cost); i++ {
		ans[i] = cost[i] + min(ans[i-1], ans[i-2])
	}

	return min(ans[len(cost)-1], ans[len(cost)-2])
}

func min(a, b int) int {
	if a > b {
		return b
	}
	return a
}

// @lc code=end
