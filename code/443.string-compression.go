package code

import (
	"strconv"
	"strings"
)

/*
 * @lc app=leetcode id=443 lang=golang
 *
 * [443] String Compression
 */

// @lc code=start
func compress(chars []byte) int {
	result := make([]string, 0)

	for i := 0; i < len(chars); {
		count := 1

		j := i + 1
		for j < len(chars) {
			if chars[j] == chars[i] {
				count++
				j++
			} else {
				break
			}
		}
		result = append(result, string(chars[i]))
		if count != 1 {
			result = append(result, strings.Split(strconv.Itoa(count), "")...)
		}

		i = j
	}

	compressed := strings.Join(result, "")
	for i := 0; i < len(compressed); i++ {
		chars[i] = compressed[i]
	}
	return len(result)
}

// @lc code=end
