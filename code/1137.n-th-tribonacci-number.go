package code

/*
 * @lc app=leetcode id=1137 lang=golang
 *
 * [1137] N-th Tribonacci Number
 */

// @lc code=start
func tribonacci(n int) int {
	if n == 0 {
		return 0
	}
	if n == 1 || n == 2 {
		return 1
	}

	a, b, c := 0, 1, 1
	for i := 3; i <= n; i++ {
		next := a + b + c
		a, b, c = b, c, next
	}
	return c
}

// @lc code=end
