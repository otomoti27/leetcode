package code

import "strconv"

/*
 * @lc app=leetcode id=2352 lang=golang
 *
 * [2352] Equal Row and Column Pairs
 */

// @lc code=start
func equalPairs(grid [][]int) int {
	length := len(grid)

	rows := make(map[string]int)
	columns := make(map[string]int)

	for i := 0; i < length; i++ {
		row := ""
		column := ""
		for j := 0; j < length; j++ {
			row += strconv.Itoa(grid[i][j]) + "a"
			column += strconv.Itoa(grid[j][i]) + "a"
		}

		rows[row]++
		columns[column]++
	}

	result := 0
	for k, v := range rows {
		if columns[k] > 0 {
			result += v * columns[k]
		}
	}

	return result
}

// @lc code=end
