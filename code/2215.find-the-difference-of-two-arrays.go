package code

/*
 * @lc app=leetcode id=2215 lang=golang
 *
 * [2215] Find the Difference of Two Arrays
 */

// @lc code=start
func findDifference(nums1 []int, nums2 []int) [][]int {
	a, b := uniq(nums1), uniq(nums2)
	return [][]int{inOneNotInTwo(a, b), inOneNotInTwo(b, a)}
}

func uniq(x []int) map[int]bool {
	result := make(map[int]bool)
	for _, v := range x {
		result[v] = true
	}
	return result
}

func inOneNotInTwo(a, b map[int]bool) []int {
	result := make([]int, 0)
	for k := range a {
		if _, ok := b[k]; !ok {
			result = append(result, k)
		}
	}

	return result
}

// @lc code=end
