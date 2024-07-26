package code

/*
 * @lc app=leetcode id=1071 lang=golang
 *
 * [1071] Greatest Common Divisor of Strings
 */

// @lc code=start
func gcdOfStrings(str1 string, str2 string) string {
	if str1+str2 != str2+str1 {
		return ""
	}
	return str1[:gcd(len(str1), len(str2))]
}

// ユークリッドの互除法
func gcd(a, b int) int {
	for b != 0 {
		a, b = b, a%b
	}
	return a
}

// @lc code=end
