package code

/*
 * @lc app=leetcode id=1466 lang=golang
 *
 * [1466] Reorder Routes to Make All Paths Lead to the City Zero
 */

// @lc code=start
func minReorder(n int, connections [][]int) int {
	visited := make([]bool, n)

	graph := make([][]int, n)
	for _, connection := range connections {
		graph[connection[0]] = append(graph[connection[0]], connection[1])
		graph[connection[1]] = append(graph[connection[1]], -connection[0])
	}

	return rec1466(graph, visited, 0)
}

func rec1466(graph [][]int, visited []bool, from int) int {
	visited[from] = true
	reorderCount := 0
	for _, to := range graph[from] {
		if visited[abs(to)] {
			continue
		}
		if to > 0 {
			reorderCount++
		}
		reorderCount += rec1466(graph, visited, abs(to))
	}
	return reorderCount
}

func abs(x int) int {
	if x < 0 {
		return -x
	}
	return x
}

// @lc code=end
