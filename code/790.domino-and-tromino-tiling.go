package code

import (
	"math"
)

/*
 * @lc app=leetcode id=790 lang=golang
 *
 * [790] Domino and Tromino Tiling
 */

// @lc code=start
func numTilings(n int) int {
	if n < 3 {
		return n
	}
	if n == 3 {
		return 5
	}

	mod := int(math.Pow(10, 9)) + 7

	dp := make([]int, n)

	dp[0] = 1
	dp[1] = 2
	dp[2] = 5
	for i := 3; i < n; i++ {
		dp[i] = (2*dp[i-1] + dp[i-3]) % mod
	}
	return dp[n-1]
}

// @lc code=end
