package code

/*
 * @lc app=leetcode id=2390 lang=golang
 *
 * [2390] Removing Stars From a String
 */

// @lc code=start
func removeStars(s string) string {
	stack := make([]byte, 0)

	for i := 0; i < len(s); i++ {
		if s[i] == '*' {
			stack = stack[:len(stack)-1]
		} else {
			stack = append(stack, s[i])
		}
	}

	return string(stack)
}

// @lc code=end
