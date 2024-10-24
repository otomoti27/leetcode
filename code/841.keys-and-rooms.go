package code

import "slices"

/*
 * @lc app=leetcode id=841 lang=golang
 *
 * [841] Keys and Rooms
 */

// @lc code=start
func canVisitAllRooms(rooms [][]int) bool {
	visited := make([]bool, len(rooms))
	queue := []int{}

	visited[0] = true
	for _, v := range rooms[0] {
		queue = append(queue, v)
	}

	for len(queue) > 0 {
		key := queue[0]
		queue = queue[1:]

		if visited[key] {
			continue
		}

		visited[key] = true
		for _, v := range rooms[key] {
			queue = append(queue, v)
		}
	}

	return !slices.Contains(visited, false)
}

// @lc code=end
