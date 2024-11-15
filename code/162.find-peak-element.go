package code

/*
 * @lc app=leetcode id=162 lang=golang
 *
 * [162] Find Peak Element
 */

// @lc code=start
func findPeakElement(nums []int) int {
	n := len(nums)

	if n == 1 {
		return 0
	}
	// 両端のチェック
	if nums[0] > nums[1] {
		return 0
	}
	if nums[n-1] > nums[n-2] {
		return n - 1
	}

	l := 1
	r := n - 2

	for l <= r {
		m := (l + r) / 2

		if nums[m] > nums[m-1] && nums[m] > nums[m+1] {
			return m
		}

		if nums[m] > nums[m-1] {
			l = m + 1
		} else {
			r = m - 1
		}
	}

	return -1
}

// @lc code=end
