package code

/*
 * @lc app=leetcode id=283 lang=golang
 *
 * [283] Move Zeroes
 */

// @lc code=start
func moveZeroes(nums []int) {
	writeIndex := 0
	for i := 0; i < len(nums); i++ {
		if nums[i] != 0 {
			nums[writeIndex], nums[i] = nums[i], nums[writeIndex]
			writeIndex++
		}
	}
}

// @lc code=end
