package code

/*
 * @lc app=leetcode id=338 lang=golang
 *
 * [338] Counting Bits
 */

// @lc code=start
func countBits(n int) []int {
	ans := make([]int, n+1)
	for i := 1; i <= n; i++ {
		ans[i] = ans[i>>1] + (i & 1)
	}
	return ans
}

/*
0: 0
1: 1
2: 10
3: 11
4: 100
5: 101
6: 110
7: 111
8: 1000
9: 1001 <- 100(4)に01を足した数
*/

// @lc code=end
