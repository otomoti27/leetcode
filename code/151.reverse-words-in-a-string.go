package code

import (
	"slices"
	"strings"
)

/*
 * @lc app=leetcode id=151 lang=golang
 *
 * [151] Reverse Words in a String
 */

// @lc code=start
func reverseWords(s string) string {
	s = strings.TrimSpace(s)
	a := strings.Fields(s)
	slices.Reverse(a)

	return strings.Join(a, " ")
}

// @lc code=end
