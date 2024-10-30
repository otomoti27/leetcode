package code

import "slices"

/*
 * @lc app=leetcode id=994 lang=golang
 *
 * [994] Rotting Oranges
 */

// @lc code=start
func orangesRotting(grid [][]int) int {
	visited := make([][]bool, len(grid))
	for i := 0; i < len(visited); i++ {
		visited[i] = make([]bool, len(grid[0]))
	}

	isContainFresh := false
	queue := make([][]int, 0)
	for x, row := range grid {
		for y, value := range row {
			switch value {
			case 0:
				visited[x][y] = true
			case 1:
				isContainFresh = true
			case 2:
				visited[x][y] = true
				queue = append(queue, []int{x, y})
			}
		}
	}

	if !isContainFresh {
		return 0
	}

	directions := [4][2]int{{-1, 0}, {0, -1}, {1, 0}, {0, 1}}

	h, w := len(grid), len(grid[0])
	min := -1
	for len(queue) > 0 {
		length := len(queue)

		for i := 0; i < length; i++ {
			rotten := queue[0]
			queue = queue[1:]

			paths := [4][2]int{}
			for i, dir := range directions {
				paths[i] = [2]int{rotten[0] + dir[0], rotten[1] + dir[1]}
			}

			for _, p := range paths {
				// 範囲外
				if p[0] < 0 || p[0] > h-1 || p[1] < 0 || p[1] > w-1 {
					continue
				}
				if visited[p[0]][p[1]] {
					continue
				}

				visited[p[0]][p[1]] = true
				if grid[p[0]][p[1]] == 1 {
					queue = append(queue, []int{p[0], p[1]})
				}
			}
		}

		min++
	}

	for _, row := range visited {
		if slices.Contains(row, false) {
			return -1
		}
	}
	return min
}

// @lc code=end
