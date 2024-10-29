package code

/*
 * @lc app=leetcode id=1926 lang=golang
 *
 * [1926] Nearest Exit from Entrance in Maze
 */

// @lc code=start
func nearestExit(maze [][]byte, entrance []int) int {
	visited := make([][]bool, len(maze))
	distance := make([][]int, len(maze))
	for i := 0; i < len(maze); i++ {
		visited[i] = make([]bool, len(maze[i]))
		distance[i] = make([]int, len(maze[i]))
	}

	queue := make([][]int, 0)
	visited[entrance[0]][entrance[1]] = true
	distance[entrance[0]][entrance[1]] = 0
	queue = append(queue, entrance)

	directions := [][]int{{-1, 0}, {0, -1}, {1, 0}, {0, 1}}
	x := len(maze) - 1
	y := len(maze[0]) - 1

	for len(queue) > 0 {
		cur := queue[0]
		queue = queue[1:]

		paths := make([][]int, 0)
		for _, d := range directions {
			paths = append(paths, []int{cur[0] + d[0], cur[1] + d[1]})
		}

		for _, path := range paths {
			// 迷路外の場合(インデックスがマイナスの可能性があるので先にチェック)
			if path[0] > x || path[1] > y || path[0] < 0 || path[1] < 0 {
				continue
			}

			if visited[path[0]][path[1]] {
				continue
			}

			visited[path[0]][path[1]] = true
			// 行き止まりの場合
			if maze[path[0]][path[1]] == '+' {
				continue
			}

			if path[0] == x || path[1] == y || path[0] == 0 || path[1] == 0 {
				return distance[cur[0]][cur[1]] + 1
			}
			distance[path[0]][path[1]] = distance[cur[0]][cur[1]] + 1

			queue = append(queue, path)
		}
	}

	return -1
}

// @lc code=end
