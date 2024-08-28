package code

/*
 * @lc app=leetcode id=1456 lang=golang
 *
 * [1456] Maximum Number of Vowels in a Substring of Given Length
 */

// @lc code=start
func maxVowels(s string, k int) int {
	vowels := map[byte]bool{
		'a': true,
		'e': true,
		'i': true,
		'o': true,
		'u': true,
	}

	max := 0
	for i := 0; i < k; i++ {
		if vowels[s[i]] {
			max++
		}
	}

	cur := max
	for i := k; i < len(s); i++ {
		if vowels[s[i-k]] {
			cur--
		}
		if vowels[s[i]] {
			cur++
		}

		if cur > max {
			max = cur
		}
	}

	return max
}

// @lc code=end
