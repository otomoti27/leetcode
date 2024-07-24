package code

/*
 * @lc app=leetcode id=1768 lang=golang
 *
 * [1768] Merge Strings Alternately
 */

// @lc code=start
func mergeAlternately(word1 string, word2 string) string {
	word1Slice := []rune(word1)
	word2Slice := []rune(word2)

	result := ""
	for len(word1Slice) > 0 || len(word2Slice) > 0 {
		if len(word1Slice) > 0 {
			r := word1Slice[0]
			word1Slice = word1Slice[1:]

			result += string(r)
		}

		if len(word2Slice) > 0 {
			r := word2Slice[0]
			word2Slice = word2Slice[1:]

			result += string(r)
		}
	}

	return result
}

// @lc code=end
