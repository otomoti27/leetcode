package code

import (
	"slices"
)

/*
 * @lc app=leetcode id=1657 lang=golang
 *
 * [1657] Determine if Two Strings Are Close
 */

// @lc code=start
func closeStrings(word1 string, word2 string) bool {
	if len(word1) != len(word2) {
		return false
	}

	hashMap1 := make(map[rune]int)
	for _, s := range word1 {
		hashMap1[s]++
	}

	hashMap2 := make(map[rune]int)
	for _, s := range word2 {
		hashMap2[s]++
	}

	return slices.Equal(convertSliceKeys(hashMap1), convertSliceKeys(hashMap2)) && slices.Equal(convertSliceValues(hashMap1), convertSliceValues(hashMap2))
}

func convertSliceKeys(m map[rune]int) []rune {
	result := make([]rune, 0, len(m))
	for k := range m {
		result = append(result, k)
	}
	slices.Sort(result)
	return result
}

func convertSliceValues(m map[rune]int) []int {
	result := make([]int, 0, len(m))
	for _, v := range m {
		result = append(result, v)
	}
	slices.Sort(result)
	return result
}

// @lc code=end
