package code

/*
 * @lc app=leetcode id=643 lang=golang
 *
 * [643] Maximum Average Subarray I
 */

// @lc code=start
func findMaxAverage(nums []int, k int) float64 {
	max := 0
	for i := 0; i < k; i++ {
		max += nums[i]
	}

	cur := max
	for i := k; i < len(nums); i++ {
		cur = cur - nums[i - k] + nums[i]
		if cur > max {
			max = cur
		}
	}

	return float64(max) / float64(k)
}
// @lc code=end

