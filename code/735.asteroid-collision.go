package code

/*
 * @lc app=leetcode id=735 lang=golang
 *
 * [735] Asteroid Collision
 */

// @lc code=start
func asteroidCollision(asteroids []int) []int {
	stack := make([]int, 0)
	stack = append(stack, asteroids[0])

	for i := 1; i < len(asteroids); i++ {
		if len(stack) == 0 {
			stack = append(stack, asteroids[i])
			continue
		}

		if asteroids[i] > 0 {
			stack = append(stack, asteroids[i])
			continue
		}

		if stack[len(stack)-1] < 0 {
			stack = append(stack, asteroids[i])
			continue
		}

		for {
			if len(stack) == 0 || stack[len(stack)-1] < 0 {
				stack = append(stack, asteroids[i])
				break
			}

			if a := stack[len(stack)-1]; a+asteroids[i] > 0 {
				break
			} else if a+asteroids[i] == 0 {
				stack = stack[:len(stack)-1]
				break
			} else {
				stack = stack[:len(stack)-1]
			}
		}
	}

	return stack
}

// @lc code=end
