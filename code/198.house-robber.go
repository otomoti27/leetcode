package code

/*
 * @lc app=leetcode id=198 lang=golang
 *
 * [198] House Robber
 */

// @lc code=start
func rob(nums []int) int {
	if len(nums) == 1 {
		return nums[0]
	} else if len(nums) == 2 {
		return max(nums[0], nums[1])
	}

	ans := make([]int, len(nums))
	ans[0] = nums[0]
	ans[1] = nums[1]
	ans[2] = nums[0] + nums[2]
	for i := 3; i < len(nums); i++ {
		ans[i] = nums[i] + max(ans[i-2], ans[i-3])
	}

	return max(ans[len(nums)-2], ans[len(nums)-1])
}

func max(a, b int) int {
	if a < b {
		return b
	}
	return a
}

// @lc code=end
