package code

import "sort"

/*
 * @lc app=leetcode id=2300 lang=golang
 *
 * [2300] Successful Pairs of Spells and Potions
 */

// @lc code=start
func successfulPairs(spells []int, potions []int, success int64) []int {
	ans := make([]int, len(spells))

	sort.Slice(potions, func(i, j int) bool {
		return potions[i] < potions[j]
	})

	for i, spell := range spells {
		minIndex := 0
		maxIndex := len(potions) - 1

		if potions[len(potions)-1]*spell < int(success) {
			ans[i] = 0
			continue
		}

		for true {
			cur := (minIndex + maxIndex) / 2

			if potions[cur]*spell >= int(success) {
				maxIndex = cur
			} else {
				minIndex = cur + 1
			}

			if maxIndex == minIndex {
				ans[i] = len(potions[minIndex:])
				break
			}
		}
	}

	return ans
}

// @lc code=end
