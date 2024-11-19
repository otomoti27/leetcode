package code

/*
 * @lc app=leetcode id=216 lang=golang
 *
 * [216] Combination Sum III
 */

// @lc code=start
func combinationSum3(k int, n int) [][]int {
	ans := make([][]int, 0)

	var backtracking func(combination []int, from int, remain int)
	backtracking = func(combination []int, from int, remain int) {
		if len(combination) == k && remain == 0 {
			// コピーしないと以前のスライスの中身が上書きされてしまう
			clone := make([]int, k)
			copy(clone, combination)
			ans = append(ans, clone)
			return
		}

		if len(combination) >= k || remain <= 0 {
			return
		}

		for i := from; i < 10; i++ {
			new := append(combination, i)
			backtracking(new, i+1, remain-i)
		}
	}

	backtracking([]int{}, 1, n)
	return ans
}

// @lc code=end
