package code

/*
 * @lc app=leetcode id=62 lang=golang
 *
 * [62] Unique Paths
 */

// @lc code=start
func uniquePaths(m int, n int) int {

	ans := make([][]int, m+1)
	for i := 0; i < m+1; i++ {
		ans[i] = make([]int, n+1)
	}

	ans[m-1][n] = 1
	ans[m][n-1] = 0
	for i := m - 1; i >= 0; i-- {
		for j := n - 1; j >= 0; j-- {
			ans[i][j] = ans[i][j+1] + ans[i+1][j]
		}
	}

	return ans[0][0]
}

// @lc code=end
