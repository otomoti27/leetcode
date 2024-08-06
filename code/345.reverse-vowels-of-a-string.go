package code

import "slices"

/*
 * @lc app=leetcode id=345 lang=golang
 *
 * [345] Reverse Vowels of a String
 */

// @lc code=start
func reverseVowels(s string) string {
	vowels := []string{"a", "i", "u", "e", "o", "A", "I", "U", "E", "O"}
	runes := []rune(s)

	i, j := 0, len(s)-1
	for i < j {
		if !slices.Contains(vowels, string(s[i])) {
			i++
			continue
		}
		if !slices.Contains(vowels, string(s[j])) {
			j--
			continue
		}

		if slices.Contains(vowels, string(s[i])) && slices.Contains(vowels, string(s[j])) {
			tmp := rune(s[i])
			runes[i] = rune(s[j])
			runes[j] = tmp
		}

		i++
		j--
	}

	return string(runes)
}

// @lc code=end
