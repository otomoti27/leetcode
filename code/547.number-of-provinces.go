package code

/*
 * @lc app=leetcode id=547 lang=golang
 *
 * [547] Number of Provinces
 */

// @lc code=start
func findCircleNum(isConnected [][]int) int {
	result := 0
	visited := make([]bool, len(isConnected))

	for k, _ := range isConnected {
		if visited[k] {
			continue
		}

		result++
		rec547(k, &visited, isConnected)
	}

	return result
}

func rec547(k int, visited *[]bool, isConnected [][]int) {
	(*visited)[k] = true
	for column, connected := range isConnected[k] {
		if (*visited)[column] {
			continue
		}
		if connected == 0 {
			continue
		}
		rec547(column, visited, isConnected)
	}
}

// @lc code=end
