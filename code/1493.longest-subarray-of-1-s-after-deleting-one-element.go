package code

/*
 * @lc app=leetcode id=1493 lang=golang
 *
 * [1493] Longest Subarray of 1's After Deleting One Element
 */

// @lc code=start
func longestSubarray(nums []int) int {
	maxWindow := 0
	curSum := 0
	start := 0
	for end := 0; end < len(nums); end++ {
		curSum += nums[end]

		if end-start+1-curSum <= 1 {
			maxWindow = max(maxWindow, end-start)
		} else {
			curSum -= nums[start]
			start++
		}
	}

	return maxWindow
}

// @lc code=end
