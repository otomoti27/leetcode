package code

import "math"

/*
 * @lc app=leetcode id=334 lang=golang
 *
 * [334] Increasing Triplet Subsequence
 */

// @lc code=start
func increasingTriplet(nums []int) bool {
	smallest, secondSmallest := math.MaxInt, math.MaxInt

	for _, v := range nums {
		if v <= smallest {
			smallest = v
		} else if v <= secondSmallest {
			secondSmallest = v
		} else {
			return true
		}
	}

	return false
}

// @lc code=end
