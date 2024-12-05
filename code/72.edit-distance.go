package code

import "fmt"

/*
 * @lc app=leetcode id=72 lang=golang
 *
 * [72] Edit Distance
 */

// @lc code=start
func minDistance(word1 string, word2 string) int {
	m := len(word1)
	n := len(word2)

	dp := make([][]int, m+1)
	for i := 0; i <= m; i++ {
		dp[i] = make([]int, n+1)
	}

	for i := 1; i <= m; i++ {
		dp[i][0] = i
	}
	for j := 1; j <= n; j++ {
		dp[0][j] = j
	}

	for i := 1; i <= m; i++ {
		for j := 1; j <= n; j++ {
			if word1[i-1] == word2[j-1] {
				dp[i][j] = dp[i-1][j-1]
			} else {
				dp[i][j] = min(dp[i-1][j-1], min(dp[i-1][j], dp[i][j-1])) + 1
			}
		}
	}

	fmt.Print(dp)

	return dp[m][n]
}

func min(a, b int) int {
	if a > b {
		return b
	}
	return a
}

/*
    r,o,s
	0,1,2,3
h|1,1,2,3
o|2,2,1,3
r|3,2,2,2
s|4,3,3,2
e|5,4,4,3
*/

// @lc code=end
