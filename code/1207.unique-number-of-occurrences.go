package code

/*
 * @lc app=leetcode id=1207 lang=golang
 *
 * [1207] Unique Number of Occurrences
 */

// @lc code=start
func uniqueOccurrences(arr []int) bool {
	table := make(map[int]int)
	for _, v := range arr {
		table[v] += 1
	}

	check := make(map[int]bool)
	for _, v := range table {
		if !check[v] {
			check[v] = true
		} else {
			return false
		}
	}

	return true
}

// @lc code=end
