package code

/*
 * @lc app=leetcode id=1431 lang=golang
 *
 * [1431] Kids With the Greatest Number of Candies
 */

// @lc code=start
func kidsWithCandies(candies []int, extraCandies int) []bool {
	answer := make([]bool, 0, len(candies))

	max := 0
	for _, v := range candies {
		if v > max {
			max = v
		}
	}

	for _, v := range candies {
		answer = append(answer, v+extraCandies >= max)
	}

	return answer
}

// @lc code=end
