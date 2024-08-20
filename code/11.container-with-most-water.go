package code

/*
 * @lc app=leetcode id=11 lang=golang
 *
 * [11] Container With Most Water
 */

// @lc code=start
func maxArea(height []int) int {
	i, j := 0, len(height) - 1

	result := 0
	for i < j {
		s := min(height[i], height[j]) * (j - i)
		if s > result {
			result = s
		}

		if height[i] < height[j] {
			i++
		} else {
			j--
		}
	}

	return result
}
// @lc code=end

