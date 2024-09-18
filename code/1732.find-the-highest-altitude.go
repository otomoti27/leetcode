package code

/*
 * @lc app=leetcode id=1732 lang=golang
 *
 * [1732] Find the Highest Altitude
 */

// @lc code=start
func largestAltitude(gain []int) int {
	// prefixSum := make([]int, len(gain)+1)
	// for i := range gain {
	// 	prefixSum[i] = 0
	// }

	// for i, v := range gain {
	// 	prefixSum[i+1] = prefixSum[i] + v
	// }

	// return slices.Max(prefixSum)

	maxAltitude := 0
	currentAltitude := 0

	for _, v := range gain {
		currentAltitude += v
		if currentAltitude > maxAltitude {
			maxAltitude = currentAltitude
		}
	}
	return maxAltitude
}

// @lc code=end
