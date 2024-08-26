package code

import "slices"

/*
 * @lc app=leetcode id=1679 lang=golang
 *
 * [1679] Max Number of K-Sum Pairs
 */

// @lc code=start
func maxOperations(nums []int, k int) int {
	slices.Sort(nums)
	pair := 0
	left, right := 0, len(nums) -1
	for left < right {
		sum := nums[left] + nums[right]
		if sum == k {
			pair++
			left++
			right--
		} else if sum < k {
			left++
		} else {
			right--
		}
	}
	return pair
}
// @lc code=end

