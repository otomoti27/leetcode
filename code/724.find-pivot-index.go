package code

/*
 * @lc app=leetcode id=724 lang=golang
 *
 * [724] Find Pivot Index
 */

// @lc code=start
func pivotIndex(nums []int) int {
	sumLeft := 0
	sumRight := 0
	for i := 1; i < len(nums); i++ {
		sumRight += nums[i]
	}

	if sumLeft == sumRight {
		return 0
	}

	for i := 1; i < len(nums); i++ {
		sumLeft += nums[i-1]
		sumRight -= nums[i]

		if sumLeft == sumRight {
			return i
		}
	}

	return -1
}

// @lc code=end
