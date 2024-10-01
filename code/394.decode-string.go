package code

import (
	"strconv"
	"strings"
)

/*
 * @lc app=leetcode id=394 lang=golang
 *
 * [394] Decode String
 */

// @lc code=start
func decodeString(s string) string {
	stack := make([]string, 0)
	var result strings.Builder

	for _, c := range s {
		if c != ']' {
			stack = append(stack, string(c))
			continue
		}

		// '[]'内の文字列を抽出
		substr := ""
		for stack[len(stack)-1] != "[" {
			substr = stack[len(stack)-1] + substr
			stack = stack[:len(stack)-1]
		}
		// '['をpop
		stack = stack[:len(stack)-1]

		// '['前の数値を抽出
		k := ""
		for len(stack) > 0 && stack[len(stack)-1] >= "0" && stack[len(stack)-1] <= "9" {
			k = stack[len(stack)-1] + k
			stack = stack[:len(stack)-1]
		}

		num, _ := strconv.Atoi(k)

		repeated := strings.Repeat(substr, num)
		stack = append(stack, repeated)
	}

	for _, s := range stack {
		result.WriteString(s)
	}

	return result.String()
}

// @lc code=end
